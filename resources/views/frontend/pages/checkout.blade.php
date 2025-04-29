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
                <form class="form" method="POST" action="{{route('cart.order')}}">
                    @csrf
                    <div class="row"> 

                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Make Your Checkout Here</h2>
                                <p>Please register in order to checkout more quickly</p>
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
                                                <option value="AF">Jakarta</option>
                                                <option value="AX">Surabaya</option>
                                                <option value="AL">Bandung</option>
                                                <option value="DZ">Medan</option>
                                                <option value="AS">Bekasi</option>
                                                <option value="AD">Depok</option>
                                                <option value="AO">Semarang</option>
                                                <option value="AI">Tangerang</option>
                                                <option value="AQ">Palembang</option>
                                                <option value="AG">Makassar</option>
                                                <option value="AR">Bogor</option>
                                                <option value="AM">Malang</option>
                                                <option value="AW">Batam</option>
                                                <option value="AU">Pekanbaru</option>
                                                <option value="AT">Yogyakarta</option>
                                                <option value="AZ">Denpasar</option>
                                                <option value="BS">Padang</option>
                                                <option value="BH">Samarinda</option>
                                                <option value="BD">Tasikmalaya</option>
                                                <option value="BB">Pontianak</option>
                                                <option value="BY">Balikpapan</option>
                                                <option value="BE">Banjarmasin</option>
                                                <option value="BZ">Manado</option>
                                                <option value="BJ">Cimahi</option>
                                                <option value="BM">Kupang</option>
                                                <option value="BT">Cirebon</option>
                                                <option value="BO">Mataram</option>
                                                <option value="BA">Jayapura</option>
                                                <option value="BW">Kediri</option>
                                                <option value="BV">Ambon</option>
                                                <option value="BR">Probolinggo</option>
                                                <option value="IO">Padang Sidempuan</option>
                                                <option value="VG">Binjai</option>
                                                <option value="BN">Palu</option>
                                                <option value="BG">Tegal</option>
                                                <option value="BF">Kendari</option>
                                                <option value="BI">Magelang</option>
                                                <option value="KH">Blitar</option>
                                                <option value="CM">Jambi</option>
                                                <option value="CA">Serang</option>
                                                <option value="CV">Banda Aceh</option>
                                                <option value="KY">Pangkal Pinang</option>
                                                <option value="CF">Palangkaraya</option>
                                                <option value="TD">Gorontalo</option>
                                                <option value="CL">Sukabumi</option>
                                                <option value="CN">Salatiga</option>
                                                <option value="CX">Pasuruan</option>
                                                <option value="CC">Batu</option>
                                                <option value="CO">Banjarbaru</option>
                                                <option value="KM">Lubuklinggau</option>
                                                <option value="CG">Ternate</option>
                                                <option value="CD">Bau-Bau</option>
                                                <option value="CK">Tarakan</option>
                                                <option value="CR">Singkawang</option>
                                                <option value="CI">Sibolga</option>
                                                <option value="HR">Parepare</option>
                                                <option value="CU">Pagar Alam</option>
                                                <option value="CY">Tomohon</option>
                                                <option value="CZ">Prabumulih</option>
                                                <option value="DK">Bitung</option>
                                                <option value="DJ">Langsa</option>
                                                <option value="DM">Tual</option>
                                                <option value="DO">Bontang</option>
                                                <option value="EC">Metro</option>
                                                <option value="EG">Baubau</option>
                                                <option value="SV">Kotamobagu</option>
                                                <option value="GQ">Lubuklinggau</option>
                                                <option value="ER">Palopo</option>
                                                <option value="EE">Banjar</option>
                                                <option value="ET">Mojokerto</option>
                                                <option value="FK">Madiun</option>
                                                <option value="FO">Sawahlunto</option>
                                                <option value="FJ">Bukittinggi</option>
                                                <option value="FI">Lhokseumawe</option>
                                                <option value="FR">Tebing Tinggi</option>
                                                <option value="GF">Pematangsiantar</option>
                                                <option value="PF">Tanjungbalai</option>
                                                <option value="TF">Kota Sungai Penuh</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Alamat 1<span>*</span></label>
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
										    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Harga Belanja<span>${{number_format(Helper::totalCartPrice(),2)}}</span></li>
                                            <li class="shipping">
                                                Shipping Cost
                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                    <select name="shipping" class="nice-select">
                                                        <option value="">Select your address</option>
                                                        @foreach(Helper::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @else 
                                                    <span>Free</span>
                                                @endif
                                            </li>
                                            
                                            @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">You Save<span>${{number_format(session('coupon')['value'],2)}}</span></li>
                                            @endif
                                            @php
                                                $total_amount=Helper::totalCartPrice();
                                                if(session('coupon')){
                                                    $total_amount=$total_amount-session('coupon')['value'];
                                                }
                                            @endphp
                                            @if(session('coupon'))
                                                <li class="last"  id="order_total_price">Total<span>${{number_format($total_amount,2)}}</span></li>
                                            @else
                                                <li class="last"  id="order_total_price">Total<span>${{number_format($total_amount,2)}}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Pembayaran</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                            <form-group>
                                                <input name="payment_method"  type="radio" value="cod"> <label> Bank BNI</label><br>
                                            </form-group>
                                            <div class="form-group mt-3">
                                                <a href="{{ route('pembayaran') }}" class="btn btn-primary">Lakukan Pembayaran</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Button Widget -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit" class="btn">Lanjut checkout</button>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Button Widget -->
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

@endpush