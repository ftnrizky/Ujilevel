@extends('frontend.layouts.master')

@section('title', 'Stret Steredirs || Pesanan Saya')
@section('main-content')
    <style>
        /* Main Container */
        .main-container {
            display: flex;
            min-height: 100vh;
            gap: 0;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            height: fit-content;
            transition: background 0.3s;
        }

        .sidebar:hover {
            background: #f0f0f0;
        }

        .back-btn {
            background: red;
            color: white;
            border: none;
            font-size: 24px;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-btn:hover {
            background: darkred;
        }

        .back-btn img {
            width: 20px;
        }

        /* Enhanced Sidebar Menu Styling */
        .sidebar ul {
            list-style: none;
            width: 100%;
            margin-top: 20px;
        }

        .sidebar li {
            display: flex;
            align-items: center;
            padding: 15px;
            margin: 8px 0;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            color: #333;
            position: relative;
            overflow: hidden;
        }

        .sidebar li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: #e74c3c;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar li:hover {
            background: #f8f9fa;
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar li:hover::before {
            transform: scaleY(1);
        }

        .sidebar li span {
            margin-right: 12px;
            font-size: 18px;
            display: flex;
            align-items: center;
            color: #e74c3c;
            transition: transform 0.3s ease;
        }

        .sidebar li:hover span {
            transform: scale(1.2);
        }

        .sidebar li a {
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
            width: 100%;
        }

        /* Special styling for logout */
        .sidebar li:last-child {
            margin-top: auto;
            background: rgba(231, 76, 60, 0.1);
            border: 1px solid rgba(231, 76, 60, 0.2);
        }

        .sidebar li:last-child:hover {
            background: rgba(231, 76, 60, 0.15);
        }

        .sidebar li:last-child span {
            color: #c0392b;
        }

        /* Responsive nav link styling */
        .x-responsive-nav-link {
            color: inherit;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .x-responsive-nav-link:hover {
            color: #e74c3c;
        }

        /* Animation for active state */
        .sidebar li.active {
            background: #f8f9fa;
            transform: translateX(5px);
        }

        .sidebar li.active::before {
            transform: scaleY(1);
        }

        /* Additional hover effects */
        @keyframes pulseIcon {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .sidebar li:hover span {
            animation: pulseIcon 0.5s ease;
        }

        /* Content Area */
        .content-area {
            flex: 1;
            margin-left: 280px;
            padding: 25px;
            min-height: 100vh;
        }

        /* Tabs */
        .tabs-container {
            margin-bottom: 25px;
            background: white;
            border-radius: 12px;
            padding: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .tabs {
            display: flex;
            gap: 4px;
        }

        .tab {
            flex: 1;
            padding: 12px 20px;
            border: none;
            background: transparent;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            color: #7f8c8d;
            transition: all 0.3s ease;
            text-align: center;
        }

        .tab.active {
            background: #e74c3c;
            color: white;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
        }

        .tab:hover:not(.active) {
            background: #f8f9fa;
            color: #2c3e50;
        }

        /* Order Cards */
        .orders-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f1f3f4;
        }

        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .order-item {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .product-image-container {
            flex-shrink: 0;
        }

        .product-image {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-image.placeholder {
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bdc3c7;
            font-size: 12px;
            text-align: center;
            border: 2px dashed #dee2e6;
        }

        .order-details {
            flex: 1;
            min-width: 0;
        }

        .product-name {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .order-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 12px;
        }

        .meta-item {
            font-size: 13px;
            color: #7f8c8d;
        }

        .meta-label {
            font-weight: 600;
            color: #95a5a6;
        }

        .order-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f1f3f4;
        }

        .price-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .total-price {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 4px;
        }

        .unit-info {
            font-size: 12px;
            color: #95a5a6;
        }

        /* Status Badge */
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-new {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .status-process {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .status-delivered {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Action Buttons */
        .order-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            justify-content: flex-end;
        }

        .action-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-width: 100px;
        }

        .btn-primary {
            background: #667eea;
            color: white;
            border: 1px solid #667eea;
        }

        .btn-primary:hover {
            background: #5a6fd8;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-danger {
            background: transparent;
            color: #e74c3c;
            border: 1px solid #e74c3c;
        }

        .btn-danger:hover {
            background: #e74c3c;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
        }

        .btn-success {
            background: #27ae60;
            color: white;
            border: 1px solid #27ae60;
        }

        .btn-success:hover {
            background: #219a52;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .empty-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #bdc3c7;
        }

        .empty-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .empty-subtitle {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.6;
            max-width: 400px;
            margin: 0 auto;
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .content-area {
                margin-left: 0;
            }

            .mobile-sidebar-toggle {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 101;
                background: #e74c3c;
                color: white;
                border: none;
                padding: 12px;
                border-radius: 8px;
                cursor: pointer;
            }
        }

        @media (min-width: 993px) {
            .mobile-sidebar-toggle {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .content-area {
                padding: 15px;
            }

            .tabs {
                flex-wrap: wrap;
                gap: 8px;
            }

            .tab {
                flex: 1 1 calc(50% - 4px);
                padding: 10px 15px;
                font-size: 13px;
            }

            .order-item {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .product-image {
                width: 120px;
                height: 120px;
                margin: 0 auto;
            }

            .order-meta {
                justify-content: center;
                gap: 15px;
            }

            .order-info {
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }

            .price-section {
                align-items: center;
            }

            .order-actions {
                justify-content: center;
                flex-wrap: wrap;
            }

            .action-btn {
                flex: 1;
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .tabs {
                flex-direction: column;
                gap: 4px;
            }

            .tab {
                flex: none;
                width: 100%;
            }

            .order-card {
                padding: 15px;
            }

            .user-profile {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .sidebar {
                width: 100%;
                padding: 20px;
            }

            .content-area {
                padding: 10px;
            }
        }
    </style>

    <body>
        <!-- Mobile Sidebar Toggle -->
        <button class="mobile-sidebar-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>

        <div class="main-container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <a href="{{ url('frontend/index') }}" class="back-btn">
                    <img src="{{ asset('image/asset -ujilevel/back.png') }}" alt="Back">
                </a>
                <ul>
                    <li class="active">
                        <span>👤</span>
                        <a href="{{ route('user-profile') }}"> Akun Saya</a>
                    </li>
                    <li>
                        <span>📦</span>
                        <a href="{{ route('user.order.index') }}">Pesanan Saya</a>
                    </li>
                    <li>
                        <span>🎟</span>
                        <a href="#">Voucher Saya</a>
                    </li>
                    <li>
                        <span>🚪</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                         this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <div class="content-area">
                <!-- Tabs -->
                <div class="tabs-container">
                    <div class="tabs">
                        <button class="tab active" data-status="all">Semua</button>
                        <button class="tab" data-status="new">Dikemas</button>
                        <button class="tab" data-status="process">Dikirim</button>
                        <button class="tab" data-status="delivered">Kasih Rating</button>
                    </div>
                </div>

                <!-- Orders List -->
                <div class="orders-list">
                    @if (count($orders) > 0)
                        @foreach ($orders as $order)
                            <div class="order-card" data-status="{{ $order->status }}">
                                <div class="order-item">
                                    <div class="product-image-container">
                                        @if ($order->photo)
                                            <img src="{{ asset('storage/' . $order->photo) }}" alt="Produk"
                                                class="product-image">
                                        @else
                                            <div class="product-image placeholder">
                                                Tidak ada foto
                                            </div>
                                        @endif
                                    </div>

                                    <div class="order-details">
                                        <h4 class="product-name">{{ $order->first_name }} {{ $order->last_name }} - Order
                                            #{{ $order->order_number }}</h4>

                                        <div class="order-meta">
                                            <div class="meta-item">
                                                <span class="meta-label">Jumlah:</span> {{ $order->quantity }}
                                            </div>
                                            <div class="meta-item">
                                                <span class="meta-label">Email:</span> {{ $order->email }}
                                            </div>
                                            <div class="meta-item">
                                                <span class="meta-label">Size:</span> {{ $order->size }}
                                            </div>
                                        </div>

                                        <div class="order-pricing">
                                            <div class="price-info">
                                                <div class="total-price">Rp
                                                    {{ number_format($order->total_amount, 0, ',', '.') }}
                                                </div>
                                                <div class="unit-info">Total 1 produk: Rp
                                                    {{ number_format($order->total_amount, 0, ',', '.') }}</div>
                                            </div>

                                            <div class="status-container">
                                                @if ($order->status == 'new')
                                                    <span class="status-badge status-new">Sedang dikemas</span>
                                                @elseif($order->status == 'process')
                                                    <span class="status-badge status-process">Sedang dikirim</span>
                                                @elseif($order->status == 'delivered')
                                                    <span class="status-badge status-delivered">Selesai</span>
                                                @else
                                                    <span class="status-badge status-cancelled">{{ $order->status }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- 
                            @if ($order->bukti_pembayaran)
                                <div class="payment-proof">
                                    <small class="meta-label">Bukti Pembayaran:</small><br>
                                    <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $order->bukti_pembayaran) }}" alt="Bukti" class="proof-image">
                                    </a>
                                </div>
                            @else
                                <div class="payment-proof">
                                    <span class="no-proof">Belum ada bukti pembayaran</span>
                                </div>
                            @endif --}}

                                        <div class="order-actions">
                                            @if ($order->status == 'new')
                                                <button class="action-btn btn-primary">Beli Lagi</button>
                                                <button class="action-btn btn-danger">Nilai</button>
                                            @elseif($order->status == 'process')
                                                <button class="action-btn btn-primary">Beli Lagi</button>
                                                <button class="action-btn btn-danger">Nilai</button>
                                            @elseif($order->status == 'delivered')
                                                <button class="action-btn btn-success">Lihat pesanan</button>
                                            @else
                                                <a href="{{ route('user.order.show', $order->id) }}"
                                                    class="action-btn btn-primary">
                                                    <svg width="16" height="16" viewBox="0 0 24 24"
                                                        fill="currentColor">
                                                        <path
                                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                                    </svg>
                                                    Lihat Detail
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('user.order.delete', [$order->id]) }}"
                                                    style="flex: 1;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="action-btn btn-danger dltBtn"
                                                        data-id="{{ $order->id }}" style="width: 100%;">
                                                        <svg width="16" height="16" viewBox="0 0 24 24"
                                                            fill="currentColor">
                                                            <path
                                                                d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="pagination-wrapper">
                            {{ $orders->links() }}
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">📦</div>
                            <h3 class="empty-title">Tidak ada pesanan</h3>
                            <p class="empty-subtitle">Anda belum memiliki pesanan.<br>Silakan pesan beberapa produk untuk
                                melihat
                                riwayat pesanan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <script>
            // Tab functionality
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('.tab');
                const orders = document.querySelectorAll('.order-card');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        // Remove active class from all tabs
                        tabs.forEach(t => t.classList.remove('active'));
                        // Add active class to clicked tab
                        this.classList.add('active');

                        const status = this.dataset.status;

                        // Filter orders
                        orders.forEach(order => {
                            if (status === 'all' || order.dataset.status === status) {
                                order.style.display = 'block';
                                setTimeout(() => {
                                    order.style.opacity = '1';
                                    order.style.transform = 'translateY(0)';
                                }, 100);
                            } else {
                                order.style.opacity = '0';
                                order.style.transform = 'translateY(20px)';
                                setTimeout(() => {
                                    order.style.display = 'none';
                                }, 300);
                            }
                        });
                    });
                });

                // Add transition styles
                orders.forEach(order => {
                    order.style.transition = 'all 0.3s ease';
                });
            });
        </script>
    </body>
@endsection
