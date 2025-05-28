<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\User;
use App\Models\Product;
use PDF;
use Notification;
use Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
        /**
         * Display a listing of orders.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $orders = Order::orderBy('id', 'DESC')->paginate(10);
            return view('backend.order.index')->with('orders', $orders);
        }

         public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'address1' => 'string|required',
            'address2' => 'string|nullable',
            'coupon' => 'nullable|numeric',
            'phone' => 'numeric|required',
            'post_code' => 'string|nullable',
            'email' => 'string|required',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,jpg,png|max:5120'
        ]);

        $userId = auth()->user()->id;
        $carts = Cart::where('user_id', $userId)->whereNull('order_id')->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Cart is Empty!');
        }

        DB::beginTransaction();
        try {
            $order = new Order();
            $order_data = $request->all();

            $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
            $order_data['user_id'] = $userId;

            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('bukti_pembayaran', $filename, 'public');
                $order_data['bukti_pembayaran'] = $path;
            }

            if (!in_array($file->getClientOriginalExtension(),  ['jpg', 'jpeg', 'png'])) {
                return back()->with('error', 'File harus berformat JPG, JPEG, atau PNG');
            }

            if ($file->getSize() > 5120 * 1024) {
                return back()->with('error', 'Ukuran file maksimal 5MB');
            }

            $order_data['sub_total'] = Helper::totalCartPrice();
            $order_data['quantity'] = Helper::cartCount();
            $order_data['status'] = "new";

            $order->fill($order_data);
            $order->save();

            // Cek dan kurangi stok produk
            foreach ($carts as $cart) {
                $product = $cart->product;
                if (!$product || $product->stock < $cart->quantity) {
                    DB::rollBack();
                    return back()->with('error', 'Stok tidak cukup untuk produk: ' . ($product->title ?? 'Tidak diketahui'));
                }
                $product->stock -= $cart->quantity;
                $product->save();
            }

            // Update order_id di cart
            Cart::where('user_id', $userId)
                ->whereNull('order_id')
                ->update(['order_id' => $order->id]);

            DB::commit();
            session()->forget(['cart', 'coupon']);
            return redirect()->route('home')->with('success', 'Order placed successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }


    public function show($id)
    {
        $order = Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('backend.order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            // Update status
            $status = $order->fill($request->all())->save();
            
            // If order is delivered, decrease product stock
            if ($request->status == 'delivered') {
                foreach ($order->cart as $cart) {
                    $product = $cart->product;
                    if ($product) {
                        $product->stock -= $cart->quantity;
                        $product->save();
                    }
                }
            }

            if ($status) {
                request()->session()->flash('success', 'Order successfully updated');
            } else {
                request()->session()->flash('error', 'Error while updating order');
            }
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * Delete order
     * 
     * @param int $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $status = $order->delete();
            if ($status) {
                request()->session()->flash('success', 'Order successfully deleted');
            } else {
                request()->session()->flash('error', 'Order could not be deleted');
            }
            return redirect()->route('order.index');
        }
        return redirect()->back()->with('error', 'Order not found');
    }
    public function orderTrack()
    {
            return view('frontend.pages.order-track');
        }

        public function productTrackOrder(Request $request)
            {
                // return $request->all();
                $order = Order::where('user_id', auth()->user()->id)->where('order_number', $request->order_number)->first();
                if ($order) {
                    if ($order->status == "new") {
                        request()->session()->flash('success', 'Your order has been placed. please wait.');
                        return redirect()->route('home');
                    } elseif ($order->status == "process") {
                        request()->session()->flash('success', 'Your order is under processing please wait.');
                        return redirect()->route('home');
                    } elseif ($order->status == "delivered") {
                        request()->session()->flash('success', 'Your order is successfully delivered.');
                        return redirect()->route('home');
                    } else {
                        request()->session()->flash('error', 'Your order canceled. please try again');
                        return redirect()->route('home');
                    }
                } else {
                    request()->session()->flash('error', 'Invalid order numer please try again');
                    return back();
                }
            }

    // PDF generate
        public function pdf(Request $request)
        {
            $order = Order::getAllOrder($request->id);
            // return $order;
            $file_name = $order->order_number . '-' . $order->first_name . '.pdf';
            // return $file_name;
            $pdf = PDF::loadview('backend.order.pdf', compact('order'));
            return $pdf->download($file_name);
        }
        // Income chart
        public function incomeChart(Request $request)
        {
            $year = \Carbon\Carbon::now()->year;
            // dd($year);
            $items = Order::with(['cart_info'])->whereYear('created_at', $year)->where('status', 'delivered')->get()
                ->groupBy(function ($d) {
                    return \Carbon\Carbon::parse($d->created_at)->format('m');
                });
            // dd($items);
            $result = [];
            foreach ($items as $month => $item_collections) {
                foreach ($item_collections as $item) {
                    $amount = $item->cart_info->sum('amount');
                    // dd($amount);
                    $m = intval($month);
                    // return $m;
                    isset($result[$m]) ? $result[$m] += $amount : $result[$m] = $amount;
                }
            }
            $data = [];
            for ($i = 1; $i <= 12; $i++) {
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                $data[$monthName] = (!empty($result[$i])) ? number_format((float)($result[$i]), 2, '.', '') : 0.0;
            }
            return $data;
        }
}
