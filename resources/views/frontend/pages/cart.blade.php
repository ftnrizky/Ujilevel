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
                                    @foreach (Helper::getAllProductFromCart() as $key => $cart)
                                        @php $photo = explode(',', $cart->product['photo']); @endphp
                                        <tr>
                                            <td class="image"><img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                            </td>
                                            <td class="product-des">
                                                <p class="product-name">
                                                    <a href="{{ route('product-detail', $cart->product['slug']) }}"
                                                        target="_blank">{{ $cart->product['title'] }}</a>
                                                </p>
                                                <p class="product-des">{!! $cart['summary'] !!}</p>
                                            </td>
                                            <td class="price text-center">Rp{{ number_format($cart['price'], 2) }}</td>
                                            <td class="qty text-center">
                                                <div class="input-group">

                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="minus" data-field="quant[{{ $key }}]"
                                                            data-price="{{ $cart['price'] }}"
                                                            {{ $cart->quantity <= 1 ? 'disabled' : '' }}>
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="qty_id[]" value="{{ $cart->id }}"
                                                        hidden>
                                                    <input type="text" name="quant[]" class="input-number quantity-input"
                                                        data-min="1" data-max="{{ $cart->product->stock }}"
                                                        value="{{ $cart->quantity }}" data-price="{{ $cart['price'] }}"
                                                        data-id="{{ $cart->id }}" readonly>
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[{{ $key }}]"
                                                            data-price="{{ $cart['price'] }}"
                                                            {{ $cart->quantity >= $cart->product->stock ? 'disabled' : '' }}>
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @if ($cart->product->stock < 5)
                                                    <small class="text-danger">Sisa stok:
                                                        {{ $cart->product->stock }}</small>
                                                @endif
                                            </td>
                                            <td class="total-amount cart_single_price text-center">
                                                <span
                                                    class="money">Rp{{ number_format($cart->product->price * $cart->quantity) }}</span>
                                            </td>
                                            <td class="action text-center">
                                                <a href="{{ route('cart-delete', $cart->id) }}"><i
                                                        class="ti-trash remove-icon"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Tidak ada Produk. <a href="{{ route('product-grids') }}"
                                                style="color:blue;">Belanja Sekarang</a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="text-right mt-2">
                            <button type="submit" class="btn btn-success">Update Cart</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Total Amount -->
            <div class="row">
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
                                    <div class="checkbox">
                                        @php
                                            $shipping = DB::table('shippings')
                                                ->where('status', 'active')
                                                ->limit(1)
                                                ->get();
                                        @endphp
                                        <label class="checkbox-inline"><input type="checkbox"
                                                onchange="showMe('shipping');"> Shipping</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">Total
                                            Belanja
                                            <span>Rp{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                                        </li>

                                        @if (session()->has('coupon'))
                                            <li class="coupon_price" data-price="{{ Session::get('coupon')['value'] }}">
                                                Diskon
                                                <span>Rp{{ number_format(Session::get('coupon')['value'], 2) }}</span>
                                            </li>
                                        @endif

                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session()->has('coupon')) {
                                                $total_amount -= Session::get('coupon')['value'];
                                            }
                                        @endphp

                                        <li class="last" id="order_total_price">Total Semuanya
                                            <span>Rp{{ number_format($total_amount, 2) }}</span>
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

@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #E94B4B !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Flag untuk mencegah double click
        let isProcessing = false;

        $(document).on('click', '.btn-number', function(e) {
            e.preventDefault();

            // Jika sedang proses, hentikan
            if (isProcessing) return;

            let button = $(this);
            let type = button.data('type');
            let input = $("input[name='quant[]'][data-id='" + button.closest('.input-group').find('.quantity-input')
                .data('id') + "']");
            let currentVal = parseInt(input.val());
            let maxVal = parseInt(input.data('max'));
            let minVal = parseInt(input.data('min'));
            let price = parseFloat(button.data('price'));

            // Set flag processing
            isProcessing = true;
            button.prop('disabled', true);

            if (!isNaN(currentVal)) {
                let newVal = currentVal;

                if (type === 'minus' && currentVal > minVal) {
                    newVal = currentVal - 1;
                } else if (type === 'plus' && currentVal < maxVal) {
                    newVal = currentVal + 1;
                }

                if (newVal !== currentVal) {
                    input.val(newVal);

                    // Update via AJAX
                    $.ajax({
                        url: '{{ route('cart.update') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            cart_id: input.data('id'),
                            quantity: newVal
                        },
                        success: function(response) {
                            if (response.status) {
                                updatePrice(input, price, newVal);

                                // Update button states
                                input.closest('.input-group').find('.minus button')
                                    .prop('disabled', newVal <= minVal);
                                input.closest('.input-group').find('.plus button')
                                    .prop('disabled', newVal >= maxVal);
                            }
                        },
                        error: function(xhr, status, error) {
                            // Revert on error
                            input.val(currentVal);
                            console.error('Update failed:', error);
                        },
                        complete: function() {
                            // Reset flags
                            isProcessing = false;
                            button.prop('disabled', false);
                        }
                    });
                } else {
                    isProcessing = false;
                    button.prop('disabled', false);
                }
            }
        });

        // Prevent direct input
        $('.quantity-input').on('keydown paste', function(e) {
            e.preventDefault();
        });
        // Fungsi untuk format angka ke Rupiah
        function formatRupiah(angka) {
            return 'Rp' + angka.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

        function updatePrice(input, price, quantity) {
        let itemTotal = price * quantity;
        input.closest('tr').find('.cart_single_price .money').text(formatRupiah(itemTotal));

        let total = 0;
        $('.quantity-input').each(function () {
            let qty = parseInt($(this).val());
            let harga = parseFloat($(this).data('price'));
            total += qty * harga;
        });

        $('.order_subtotal').attr('data-price', total);
        $('.order_subtotal span').text(formatRupiah(total));

        let diskon = $('.coupon_price').length ? parseFloat($('.coupon_price').attr('data-price')) : 0;
        let totalSetelahDiskon = total - diskon;
        $('#order_total_price span').text(formatRupiah(totalSetelahDiskon));
    }

    function formatRupiah(angka) {
        return 'Rp' + angka.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    $('.quantity-input').on('keydown paste', function (e) {
        e.preventDefault();
    });
    </script>
@endpush
