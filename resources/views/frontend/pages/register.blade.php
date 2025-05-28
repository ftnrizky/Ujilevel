@extends('frontend.layouts.master')

@section('title','Stret Steredirs || Register Page')

@section('main-content')
	<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Shop Login -->
    <section class="shop login section">
        <div class="container">
            <div class="login-form">
                <h2>Register</h2>
                <p>Please register untuk membuat akun</p>
    
                <!-- Form -->
                <form class="form" method="post" action="{{ route('register.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama<span>*</span></label>
                        <input type="text" name="name" placeholder="Masukan Nama Kamu" required value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Email<span>*</span></label>
                        <input type="text" name="email" placeholder="Masukan Email Kamu" required value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Password<span>*</span></label>
                        <input type="password" name="password" placeholder="Masukan Password" required value="{{ old('password') }}">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Konfirmasi Password<span>*</span></label>
                        <input type="password" name="password_confirmation" placeholder="Pastikan Password sama" required value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Button Container -->
                    <div class="btn-container">
                        <button type="submit" class="btn-primary">Register</button>
                        <div class="or-divider">OR</div>
                        <a href="{{ route('login.form') }}" class="btn-register">Login</a>
                    </div>
    
                    <!-- Social Login -->
                    <div class="social-login">
                        <a href="{{ route('login.redirect','facebook') }}" class="social-btn facebook">
                            <i class="ti-facebook"></i>
                        </a>
                        <a href="{{ route('login.redirect','google') }}" class="social-btn google">
                            <i class="ti-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <!--/ End Login -->
@endsection

@push('styles')

@endpush