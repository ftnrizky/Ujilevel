@extends('frontend.layouts.master')
@section('title', 'Street Store || Login Page')
@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="bread-inner">
                <ul class="bread-list">
                    <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                    <li class="active"><a href="javascript:void(0);">Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Login Section -->
    <section class="shop login section">
        <div class="container">
            <div class="login-form">
                <h2>Login</h2>
                <p>Login dulu untuk melakukan pesanan!</p>

                <!-- Form -->
                <form class="form" method="post" action="{{ route('login.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email<span>*</span></label>
                        <input type="email" name="email" placeholder="Masukkan Email Anda" required
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password<span>*</span></label>
                        <input type="password" name="password" placeholder="Masukkan Password Anda" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Button Container -->
                    <div class="btn-container">
                        <button type="submit" class="btn-primary">Masuk</button>
                        <div class="or-divider">OR</div>
                        <a href="{{ route('register.form') }}" class="btn-register">Daftar</a>
                    </div>

                    <!-- Social Login -->
                    <div class="social-login">
                        <a href="{{ route('login.redirect', 'facebook') }}" class="social-btn facebook">
                            <i class="ti-facebook"></i>
                        </a>
                        <a href="{{ route('login.redirect', 'google') }}" class="social-btn google">
                            <i class="ti-google"></i>
                        </a>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="form-footer">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="lost-pass">Lupa kata sandi?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        
    </style>
    
@endpush
