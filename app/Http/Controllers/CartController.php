<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    protected $product = null;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart(Request $request)
    {
        if (empty($request->slug)) {
            return back()->with('error', 'Invalid Products');
        }

        $product = Product::where('slug', $request->slug)->first();

        if (empty($product)) {
            return back()->with('error', 'Invalid Products');
        }

        $userId = auth()->user()->id;
        $cart = Cart::where('user_id', $userId)
            ->where('order_id', null)
            ->where('product_id', $product->id)
            ->first();

        $price = $product->price - ($product->price * $product->discount / 100);

        if ($cart) {
            $newQuantity = $cart->quantity + 1;

            if ($product->stock < $newQuantity) {
                return back()->with('error', 'Stock not sufficient!');
            }

            $cart->quantity = $newQuantity;
            $cart->amount = $price * $newQuantity;
            $cart->price = $price;
            $cart->save();
        } else {
            if ($product->stock < 1) {
                return back()->with('error', 'Stock not sufficient!');
            }

            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->product_id = $product->id;
            $cart->price = $price;
            $cart->quantity = 1;
            $cart->amount = $price * 1;
            $cart->save();

            Wishlist::where('user_id', $userId)
                ->where('cart_id', null)
                ->where('product_id', $product->id)
                ->update(['cart_id' => $cart->id]);
        }

        return back()->with('success', 'Product successfully added to cart');
    }
    public function singleAddToCart(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'quant' => 'required|array',
        ]);
    
        $quantity = is_array($request->quant) ? (int) ($request->quant[1] ?? 1) : 1;
    
        if ($quantity < 1) {
            return back()->with('error', 'Invalid quantity');
        }
    
        $product = Product::where('slug', $request->slug)->first();
        if (!$product) {
            return back()->with('error', 'Invalid product');
        }
    
        if ($product->stock < $quantity) {
            return back()->with('error', 'Out of stock');
        }
    
        $userId = auth()->user()->id;
    
        $cart = Cart::where('user_id', $userId)
            ->where('order_id', null)
            ->where('product_id', $product->id)
            ->first();
    
        $price = $product->price - ($product->price * $product->discount / 100);
    
        if ($cart) {
            $newQuantity = $cart->quantity + $quantity;
    
            if ($product->stock < $newQuantity) {
                return back()->with('error', 'Stock not sufficient!');
            }
    
            $cart->quantity = $newQuantity;
            $cart->amount = $price * $newQuantity;
            $cart->price = $price;
            $cart->save();
        } else {
            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->product_id = $product->id;
            $cart->price = $price;
            $cart->quantity = $quantity;
            $cart->amount = $price * $quantity;
            $cart->save();
        }
    
        return back()->with('success', 'Product successfully added to cart.');
    }

    

    public function cartDelete(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success', 'Cart successfully removed');
            return back();
        }
        request()->session()->flash('error', 'Error please try again');
        return back();
    }

    
    public function cartUpdate(Request $request)
    {
        try {
            if (!$request->has('quant')) {
                return back()->with('error', 'Cart Invalid!');
            }

            $success = '';
            $error = [];

            foreach ($request->quant as $k => $quant) {
                if (!isset($request->qty_id[$k])) {
                    continue;
                }

                $id = $request->qty_id[$k];
                $cart = Cart::find($id);

                if (!$cart || !$cart->product) {
                    $error[] = 'Cart item not found!';
                    continue;
                }

                if ($quant <= 0) {
                    $error[] = 'Invalid quantity!';
                    continue;
                }

                // Cek stok
                if ($cart->product->stock < $quant) {
                    $error[] = "Out of stock for {$cart->product->title}!";
                    continue;
                }

                // Update quantity
                $cart->quantity = min($quant, $cart->product->stock);
                
                // Hitung harga setelah diskon
                $after_price = ($cart->product->price - ($cart->product->price * $cart->product->discount) / 100);
                $cart->amount = $after_price * $cart->quantity;
                
                $cart->save();
                $success = 'Cart successfully updated!';
            }

            if (!empty($error)) {
                return back()->with('error', implode('<br>', $error));
            }

            return back()->with('success', $success);

        } catch (\Exception $e) {
            \Log::error('Cart Update Error: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating cart');
        }
    }

    // public function addToCart(Request $request){
    //     // return $request->all();
    //     if(Auth::check()){
    //         $qty=$request->quantity;
    //         $this->product=$this->product->find($request->pro_id);
    //         if($this->product->stock < $qty){
    //             return response(['status'=>false,'msg'=>'Out of stock','data'=>null]);
    //         }
    //         if(!$this->product){
    //             return response(['status'=>false,'msg'=>'Product not found','data'=>null]);
    //         }
    //         // $session_id=session('cart')['session_id'];
    //         // if(empty($session_id)){
    //         //     $session_id=Str::random(30);
    //         //     // dd($session_id);
    //         //     session()->put('session_id',$session_id);
    //         // }
    //         $current_item=array(
    //             'user_id'=>auth()->user()->id,
    //             'id'=>$this->product->id,
    //             // 'session_id'=>$session_id,
    //             'title'=>$this->product->title,
    //             'summary'=>$this->product->summary,
    //             'link'=>route('product-detail',$this->product->slug),
    //             'price'=>$this->product->price,
    //             'photo'=>$this->product->photo,
    //         );

    //         $price=$this->product->price;
    //         if($this->product->discount){
    //             $price=($price-($price*$this->product->discount)/100);
    //         }
    //         $current_item['price']=$price;

    //         $cart=session('cart') ? session('cart') : null;

    //         if($cart){
    //             // if anyone alreay order products
    //             $index=null;
    //             foreach($cart as $key=>$value){
    //                 if($value['id']==$this->product->id){
    //                     $index=$key;
    //                 break;
    //                 }
    //             }
    //             if($index!==null){
    //                 $cart[$index]['quantity']=$qty;
    //                 $cart[$index]['amount']=ceil($qty*$price);
    //                 if($cart[$index]['quantity']<=0){
    //                     unset($cart[$index]);
    //                 }
    //             }
    //             else{
    //                 $current_item['quantity']=$qty;
    //                 $current_item['amount']=ceil($qty*$price);
    //                 $cart[]=$current_item;
    //             }
    //         }
    //         else{
    //             $current_item['quantity']=$qty;
    //             $current_item['amount']=ceil($qty*$price);
    //             $cart[]=$current_item;
    //         }

    //         session()->put('cart',$cart);
    //         return response(['status'=>true,'msg'=>'Cart successfully updated','data'=>$cart]);
    //     }
    //     else{
    //         return response(['status'=>false,'msg'=>'You need to login first','data'=>null]);
    //     }
    // }

    // public function removeCart(Request $request){
    //     $index=$request->index;
    //     // return $index;
    //     $cart=session('cart');
    //     unset($cart[$index]);
    //     session()->put('cart',$cart);
    //     return redirect()->back()->with('success','Successfully remove item');
    // }

    public function checkout(Request $request)
    {
        // $cart=session('cart');
        // $cart_index=\Str::random(10);
        // $sub_total=0;
        // foreach($cart as $cart_item){
        //     $sub_total+=$cart_item['amount'];
        //     $data=array(
        //         'cart_id'=>$cart_index,
        //         'user_id'=>$request->user()->id,
        //         'product_id'=>$cart_item['id'],
        //         'quantity'=>$cart_item['quantity'],
        //         'amount'=>$cart_item['amount'],
        //         'status'=>'new',
        //         'price'=>$cart_item['price'],
        //     );

        //     $cart=new Cart();
        //     $cart->fill($data);
        //     $cart->save();
        // }
        return view('frontend.pages.checkout');
    }
}
