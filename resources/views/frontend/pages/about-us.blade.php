@extends('frontend.layouts.master')

@section('title', 'Stret Steredirs || About Us')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Beranda<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">tentang Kami</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- About Us -->
    <section class="about-us section">
        <div class="container">
            <!-- First row - Image on right -->
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <h3>Selamat Datang Di <span>Stret Steredirs </span></h3>
                        @foreach ($settings as $data)
                            @php
                                $desc = strip_tags($data->description, '');
                            @endphp

                            @if (!empty(trim($desc)))
                                <p>{{ $desc }}</p>
                            @endif
                        @endforeach

                        <div class="button">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                        <img src="@foreach ($settings as $data) {{ $data->photo }} @endforeach"
                            alt="@foreach ($settings as $data) {{ $data->photo }} @endforeach">
                    </div>
                </div>
            </div>

            <!-- Second row - Image on left -->
            <div class="row">
                <div class="col-lg-6 col-12 order-lg-2">
                    <div class="about-content">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        @foreach ($settings as $data)
                            @php
                                $desc = strip_tags($data->description, '');
                            @endphp

                            @if (!empty(trim($desc)))
                                <p>{{ $desc }}</p>
                            @endif
                        @endforeach
                        <div class="button">
                            <a href="{{ route('contact') }}" class="btn primary">Hubungi kami</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-lg-1">
                    <div class="about-img overlay">
                        <img src="@foreach ($settings as $data) {{ $data->photo }} @endforeach"
                            alt="@foreach ($settings as $data) {{ $data->photo }} @endforeach">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->


@endsection
