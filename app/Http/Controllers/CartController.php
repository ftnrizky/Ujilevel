<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;

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
            return back()->with('error', 'Invalid product.');
        }

        $product = Product::where('slug', $request->slug)->first();
        if (empty($product)) {
            return back()->with('error', 'Invalid product.');
        }

        $userId = auth()->user()->id;
        $cart = Cart::where('user_id', $userId)
            ->where('order_id', null)
            ->where('product_id', $product->id)
            ->first();

        $price = $product->price - ($product->price * $product->discount / 100);
        $isPreorder = $product->is_preorder;
        $canPreorder = $product->stock < 1 && $isPreorder;

        if ($cart) {
            $newQuantity = $cart->quantity + 1;

            if ($product->stock < $newQuantity && !$isPreorder) {
                return back()->with('error', 'Stock not sufficient!');
            }

            $cart->quantity = $newQuantity;
            $cart->amount = $price * $newQuantity;
            $cart->price = $price;

            if ($canPreorder) {
                $cart->preorder_status = 'waiting';
                $cart->estimated_delivery = now()->addDays(10);
            }

            $cart->save();
        } else {
            if ($product->stock < 1 && !$isPreorder) {
                return back()->with('error', 'Stock not sufficient!');
            }

            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->product_id = $product->id;
            $cart->price = $price;
            $cart->quantity = 1;
            $cart->amount = $price;

            if ($canPreorder) {
                $cart->preorder_status = 'waiting';
                $cart->estimated_delivery = now()->addDays(10);
            }

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

        $userId = auth()->user()->id;

        $cart = Cart::where('user_id', $userId)
            ->where('order_id', null)
            ->where('product_id', $product->id)
            ->first();

        $price = $product->price - ($product->price * $product->discount / 100);
        $isPreorder = $product->is_preorder;
        $canPreorder = $product->stock < $quantity && $isPreorder;

        if ($cart) {
            $newQuantity = $cart->quantity + $quantity;

            if ($product->stock < $newQuantity && !$isPreorder) {
                return back()->with('error', 'Stock not sufficient!');
            }

            $cart->quantity = $newQuantity;
            $cart->amount = $price * $newQuantity;
            $cart->price = $price;

            if ($canPreorder) {
                $cart->preorder_status = 'waiting';
                $cart->estimated_delivery = now()->addDays(10);
            }

            $cart->save();
        } else {
            if ($product->stock < $quantity && !$isPreorder) {
                return back()->with('error', 'Stock not sufficient!');
            }

            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->product_id = $product->id;
            $cart->price = $price;
            $cart->quantity = $quantity;
            $cart->amount = $price * $quantity;

            if ($canPreorder) {
                $cart->preorder_status = 'waiting';
                $cart->estimated_delivery = now()->addDays(10);
            }

            $cart->save();
        }

        return back()->with('success', 'Product successfully added to cart.');
    }

    public function cartDelete(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            return back()->with('success', 'Cart successfully removed');
        }
        return back()->with('error', 'Error, please try again');
    }

    public function cartUpdate(Request $request)
    {
        try {
            $cart = Cart::findOrFail($request->cart_id);
            $cart->quantity = $request->quantity;
            $cart->save();

            return response()->json([
                'status' => true,
                'message' => 'Cart updated successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Cart update failed: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Cart update error'
            ], 500);
        }
    }




    public function checkout(Request $request)
    {
        return view('frontend.pages.checkout');
    }
}
