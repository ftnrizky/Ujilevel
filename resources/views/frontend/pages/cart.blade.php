@extends('frontend.layouts.master')
@section('title', 'Cart Page')
@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="#">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME PRODUK</th>
                                <th class="text-center">HARGA</th>
                                <th class="text-center">JUMLAH</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody id="cart_item_list">
                            @if (Helper::getAllProductFromCart())
                            @foreach (Helper::getAllProductFromCart() as $cart)
                            @php $photo = explode(',', $cart->product['photo']); @endphp
                            <tr data-id="{{ $cart->id }}" data-price="{{ $cart->price }}">
                                <td class="image">
                                    <img src="{{ $photo[0] }}" alt="{{ $cart->product['title'] }}" style="width:100px">
                                    @if($cart->product->is_preOrder)
                                        <span class="badge badge-danger">Pre Order</span>
                                    @endif
                                </td>
                                <td class="product-des">
                                    <p class="product-name">
                                        <a href="{{ route('product-detail', $cart->product['slug']) }}" target="_blank">{{ $cart->product['title'] }}</a>
                                    </p>
                                    <p class="product-des">{!! $cart['summary'] !!}</p>
                                </td>
                                <td class="price text-center">Rp{{ number_format($cart->price, 2) }}</td>
                                <td class="qty text-center">
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="minus"
                                                data-id="{{ $cart->id }}"
                                                {{ $cart->quantity <= 1 ? 'disabled' : '' }}>
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="qty_id[]" value="{{ $cart->id }}">
                                        <input type="text" name="quant[]" class="input-number quantity-input"
                                            value="{{ $cart->quantity }}"
                                            data-id="{{ $cart->id }}"
                                            data-min="1"
                                            data-max="{{ $cart->product->stock }}"
                                            readonly>
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-id="{{ $cart->id }}"
                                                {{ $cart->quantity >= $cart->product->stock ? 'disabled' : '' }}>
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if($cart->product->stock < 5)
                                        <small class="text-danger">Sisa stok: {{ $cart->product->stock }}</small>
                                        @endif
                                </td>
                                <td class="total-amount cart_single_price text-center">
                                    <span id="item-total-{{ $cart->id }}">Rp{{ number_format($cart->price * $cart->quantity) }}</span>
                                </td>
                                <td class="action text-center">
                                    <a href="{{ route('cart-delete', $cart->id) }}"><i class="ti-trash remove-icon"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    Tidak ada Produk. <a href="{{ route('product-grids') }}" style="color:blue;">Belanja Sekarang</a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <!-- Total Amount -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="{{ route('coupon-store') }}" method="POST">
                                        @csrf
                                        <input name="code" placeholder="Masukan Coupon Anda">
                                        <button class="btn">Gunakan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li class="order_subtotal">Total Belanja
                                        <span id="subtotal-text">Rp{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                                    </li>
                                    @php
                                    $couponValue = session()->has('coupon') ? Session::get('coupon')['value'] : 0;
                                    $total_amount = Helper::totalCartPrice() - $couponValue;
                                    @endphp
                                    @if (session()->has('coupon'))
                                    <li class="coupon_price">Diskon
                                        <span id="discount-text">Rp{{ number_format($couponValue, 2) }}</span>
                                    </li>
                                    @endif
                                    <li class="last" id="order_total_price">Total Semuanya  
                                        <span id="total-text">Rp{{ number_format($total_amount, 2) }}</span>
                                    </li>
                                </ul>
                                <div class="button5">
                                    <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                    <a href="{{ route('product-grids') }}" class="btn">Cusss Belanja Lagi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Shopping Cart -->

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@push('scripts')
<script>
    function updatePrice(input, price, newQty) {
        const cartId = input.data('id');
        const itemTotal = price * newQty;
        $(`#item-total-${cartId}`).text(`Rp${itemTotal.toLocaleString('id-ID')}`);

        // Update subtotal and grand total
        let subtotal = 0;
        $('.quantity-input').each(function() {
            const qty = parseInt($(this).val());
            const rowPrice = parseFloat($(this).closest('tr').data('price'));
            subtotal += qty * rowPrice;
        });

        $('#subtotal-text').text(`Rp${subtotal.toLocaleString('id-ID')}`);

        const discount = {
            $couponValue
        };
        const grandTotal = subtotal - discount;
        $('#total-text').text(`Rp${grandTotal.toLocaleString('id-ID')}`);
    }

    $(document).on('click', '.btn-number', function(e) {
        e.preventDefault();

        const button = $(this);
        const type = button.data('type');
        const id = button.data('id');
        const input = $(`.quantity-input[data-id='${id}']`);
        const currentVal = parseInt(input.val());
        const min = parseInt(input.data('min'));
        const max = parseInt(input.data('max'));
        const price = parseFloat(input.closest('tr').data('price'));

        let newVal = currentVal;
        if (type === 'minus' && currentVal > min) {
            newVal = currentVal - 1;
        } else if (type === 'plus' && currentVal < max) {
            newVal = currentVal + 1;
        }

        if (newVal !== currentVal) {
            input.val(newVal);
            $.ajax({
                url: '{{ route("cart.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_id: id,
                    quantity: newVal
                },
                success: function(response) {
                    if (response.status) {
                        updatePrice(input, price, newVal);

                        input.closest('.input-group').find('.btn-number[data-type="minus"]').prop('disabled', newVal <= min);
                        input.closest('.input-group').find('.btn-number[data-type="plus"]').prop('disabled', newVal >= max);
                    } else {
                        alert('Gagal update. Silakan coba lagi.');
                    }
                },
                error: function() {
                    input.val(currentVal);
                    alert('Terjadi kesalahan saat update keranjang.');
                }
            });
        }
    });

    $('.quantity-input').on('keydown paste', function(e) {
        e.preventDefault();
    });
</script>
@endpush