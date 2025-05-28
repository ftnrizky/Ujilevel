@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="POST" action="{{ route('cart.order') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 

                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Lakukan Pembayaran Anda di Sini</h2>
                                <p>Harap Untuk Memasukan Biodata Diri</p>
                                <!-- Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Awal<span>*</span></label>
                                            <input type="text" name="first_name" placeholder="Masukan Nama Awal " value="{{old('first_name')}}" value="{{old('first_name')}}">
                                            @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Akhir<span>*</span></label>
                                            <input type="text" name="last_name" placeholder="Masukan Nama Akhir " value="{{old('lat_name')}}">
                                            @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email <span>*</span></label>
                                            <input type="email" name="email" placeholder="Masukan Alamat Email Yang Benar" value="{{old('email')}}">
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Number <span>*</span></label>
                                            <input type="number" name="phone" placeholder="Masukan Nomor Telepon" required value="{{old('phone')}}">
                                            @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Kota<span>*</span></label>
                                            <select name="country" id="country">
                                                <option value="jakarta">Jakarta</option>
                                                <option value="surabaya">Surabaya</option>
                                                <option value="bandung">Bandung</option>
                                                <option value="medan">Medan</option>
                                                <option value="bekasi">Bekasi</option>
                                                <option value="depok">Depok</option>
                                                <option value="semarang">Semarang</option>
                                                <option value="tangerang">Tangerang</option>
                                                <option value="palembang">Palembang</option>
                                                <option value="makassar">Makassar</option>
                                                <option value="bogor">Bogor</option>
                                                <option value="malang">Malang</option>
                                                <option value="batam">Batam</option>
                                                <option value="pekanbaru">Pekanbaru</option>
                                                <option value="yogyakarta">Yogyakarta</option>
                                                <option value="denpasar">Denpasar</option>
                                                <option value="padang">Padang</option>
                                                <option value="samarinda">Samarinda</option>
                                                <option value="tasikmalaya">Tasikmalaya</option>
                                                <option value="pontianak">Pontianak</option>
                                                <option value="balikpapan">Balikpapan</option>
                                                <option value="banjarmasin">Banjarmasin</option>
                                                <option value="manado">Manado</option>
                                                <option value="cimahi">Cimahi</option>
                                                <option value="kupang">Kupang</option>
                                                <option value="cirebon">Cirebon</option>
                                                <option value="mataram">Mataram</option>
                                                <option value="jayapura">Jayapura</option>
                                                <option value="kediri">Kediri</option>
                                                <option value="ambon">Ambon</option>
                                                <option value="probolinggo">Probolinggo</option>
                                                <option value="padangsidempuan">Padang Sidempuan</option>
                                                <option value="binjai">Binjai</option>
                                                <option value="palu">Palu</option>
                                                <option value="tegal">Tegal</option>
                                                <option value="kendari">Kendari</option>
                                                <option value="magelang">Magelang</option>
                                                <option value="blitar">Blitar</option>
                                                <option value="jambi">Jambi</option>
                                                <option value="serang">Serang</option>
                                                <option value="bandaaceh">Banda Aceh</option>
                                                <option value="pangkalpinang">Pangkal Pinang</option>
                                                <option value="palangkaraya">Palangkaraya</option>
                                                <option value="gorontalo">Gorontalo</option>
                                                <option value="sukabumi">Sukabumi</option>
                                                <option value="salatiga">Salatiga</option>
                                                <option value="pasuruan">Pasuruan</option>
                                                <option value="batu">Batu</option>
                                                <option value="banjarbaru">Banjarbaru</option>
                                                <option value="lubuklinggau">Lubuklinggau</option>
                                                <option value="ternate">Ternate</option>
                                                <option value="baubau">Bau-Bau</option>
                                                <option value="tarakan">Tarakan</option>
                                                <option value="singkawang">Singkawang</option>
                                                <option value="sibolga">Sibolga</option>
                                                <option value="parepare">Parepare</option>
                                                <option value="pagaralam">Pagar Alam</option>
                                                <option value="tomohon">Tomohon</option>
                                                <option value="prabumulih">Prabumulih</option>
                                                <option value="bitung">Bitung</option>
                                                <option value="langsa">Langsa</option>
                                                <option value="tual">Tual</option>
                                                <option value="bontang">Bontang</option>
                                                <option value="metro">Metro</option>
                                                <option value="kotamobagu">Kotamobagu</option>
                                                <option value="palopo">Palopo</option>
                                                <option value="banjar">Banjar</option>
                                                <option value="mojokerto">Mojokerto</option>
                                                <option value="madiun">Madiun</option>
                                                <option value="sawahlunto">Sawahlunto</option>
                                                <option value="bukittinggi">Bukittinggi</option>
                                                <option value="lhokseumawe">Lhokseumawe</option>
                                                <option value="tebingtinggi">Tebing Tinggi</option>
                                                <option value="pematangsiantar">Pematangsiantar</option>
                                                <option value="tanjungbalai">Tanjungbalai</option>
                                                <option value="sungaipenuh">Kota Sungai Penuh</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Patokan<span>*</span></label>
                                            <input type="text" name="address1" placeholder="Masukan Alamat " value="{{old('address1')}}">
                                            @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Alamat 2</label>
                                            <input type="text" name="address2" placeholder="Masukan Detail Rumah" value="{{old('address2')}}">
                                            @error('address2')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Code Post</label>
                                            <input type="text" name="post_code" placeholder="Masukan Code Post" value="{{old('post_code')}}">
                                            @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--/ End Form -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Total Belanja</h2>
                                    <div class="content">
                                        <ul>
										    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Harga Belanja<span>Rp{{number_format(Helper::totalCartPrice(),2)}}</span></li>
                                            <li class="shipping">
                                                Biaya Pengiriman
                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                    <select name="shipping" class="nice-select">
                                                        <option value="">Pilih jasa</option>
                                                        @foreach(Helper::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: Rp{{$shipping->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @else 
                                                    <span>Free</span>
                                                @endif
                                            </li>
                                            
                                            @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">Kamu Simpan<span>${{number_format(session('coupon')['value'],2)}}</span></li>
                                            @endif
                                            @php
                                                $total_amount=Helper::totalCartPrice();
                                                if(session('coupon')){
                                                    $total_amount=$total_amount-session('coupon')['value'];
                                                }
                                            @endphp
                                            @if(session('coupon'))
                                                <li class="last"  id="order_total_price">Total<span>Rp{{number_format($total_amount,2)}}</span></li>
                                            @else
                                                <li class="last"  id="order_total_price">Total<span>Rp{{number_format($total_amount,2)}}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Ringkasan Pesanan</h2>
                                    <div class="content">
                                        <ul>
                                            @foreach(Helper::getAllProductFromCart() as $cart)
                                            <li class="cart-item" data-quantity="{{ $cart->quantity }}" data-stock="{{ $cart->product->stock }}" data-name="{{ $cart->product->title }}">
                                                {{ $cart->product->title }} 
                                                <span>({{ $cart->quantity }} x Rp{{ number_format($cart->price,2) }})</span>
                                                @if($cart->product->is_preOrder)
                                                <p class="text-danger text-md ">Produk akan selesai dan dikirim dalam {{$cart->product->estimated_days}} Hari</p>
                                                @endif
                                                @if($cart->product->stock < 5)
                                                    <small class="text-danger d-block">
                                                        Sisa stok: {{ $cart->product->stock }}
                                                    </small>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <div class="payment-container">
                                    <div class="payment-instructions">
                                        <h2>Petunjuk Pembayaran:</h2>
                                        <ol>
                                            <li>Transfer ke rekening bank di bawah ini sesuai dengan total pembayaran.</li>
                                            <li>Gunakan ATM, Mobile Banking, atau Internet Banking untuk melakukan transfer.</li>
                                            <li>Upload bukti transfer pada form di bawah ini.</li>
                                            <li>Klik tombol "Lanjut Checkout" untuk menyelesaikan pesanan.</li>
                                        </ol>
                                        <p class="deadline">Harap selesaikan pembayaran dalam 24 jam.</p>
                                    </div>
                                    
                                    <form class="form" method="post" action="{{route('order.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="bank-details">
                                            <div class="field">
                                                <div class="field-label">Nama Rekening</div>
                                                <div class="field-value">PT Stret Straidrs</div>
                                            </div>
                                            
                                            <div class="field">
                                                <div class="field-label">Nomor Rekening BNI</div>
                                                <div class="field-value">
                                                    2233 4455 6666 8855
                                                    <button type="button" class="copy-btn" onclick="copyText('2233 4455 6666 8855')">Salin</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="upload-section">
                                            <div class="field-label">Bukti Pembayaran</div>
                                            <div class="file-upload">
                                                <input type="file" 
                                                       id="bukti_pembayaran" 
                                                       name="bukti_pembayaran" 
                                                       accept=".jpg,.jpeg,.png,.pdf"
                                                       class="form-control @error('bukti_pembayaran') is-invalid @enderror"
                                                       required>
                                                <small class="text-muted">Format yang diizinkan: JPG, JPEG, PNG, PDF (Max: 10MB)</small>
                                                @error('bukti_pembayaran')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="total-amount">
                                            <div class="field-label">Total Jumlah: Rp{{number_format($total_amount,2)}}</div>
                                            <input type="hidden" name="total_amount" value="{{$total_amount}}">
                                        </div>
                                        <!-- Button Widget -->
                                        <div class="single-widget get-button">
                                            <div class="content">
                                                <div class="button">
                                                    <button type="submit" class="btn">Lanjut checkout</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ End Button Widget -->
                                    </form>
                                </div>
                                <!--/ End Order Widget -->
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
    <!--/ End Checkout -->
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
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
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#E94B4B !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
        .file-upload {
            margin: 15px 0;
        }

        .file-upload input[type="file"] {
            display: block;
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>
    <script>
    $(document).ready(function() {
        // Validate before submit
        $('form').on('submit', function(e) {
            let hasError = false;
            
            // Check each cart item
            $('.cart-item').each(function() {
                const quantity = parseInt($(this).data('quantity'));
                const stock = parseInt($(this).data('stock'));
                const productName = $(this).data('name');
                
                if(quantity > stock) {
                    hasError = true;
                    toastr.error(`Stok tidak cukup untuk produk ${productName}! Tersedia: ${stock}`);
                }
            });
            
            if(hasError) {
                e.preventDefault();
                return false;
            }
        });
    });
    </script>
@endpush