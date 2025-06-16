<style>
  .sidebar .nav-item .nav-link,
  .topbar .nav-item .nav-link {
      position: relative;
  }

  .sidebar .nav-item .nav-link .badge-counter,
  .topbar .nav-item .nav-link .badge-counter {
      position: absolute;
      transform: scale(0.7);
      transform-origin: top right;
      right: 0.25rem;
      margin-top: -0.25rem;
  }

  .sidebar i img {
      width: 30px;
      height: 30px;
      object-fit: contain;
      vertical-align: middle;
      margin-right: 5px;

  }
  .sidebar-brand-icon i img {
      width: 40px;
      height: 40px;
      object-fit: contain;
  }
  .sidebar.toggled i img {
      margin-right: 0;
  }

  .sidebar .nav-item .nav-link .img-profile,
  .topbar .nav-item .nav-link .img-profile {
      height: 2rem;
      width: 2rem;
  }

  .sidebar {
      width: 6.5rem;
      min-height: 100vh;
  }

  .sidebar .nav-item {
      position: relative;
  }

  .sidebar .nav-item:last-child {
      margin-bottom: 1rem;
  }

  .sidebar .nav-item .nav-link {
      text-align: center;
      padding: 0.75rem 1rem;
      width: 6.5rem;
  }

  .sidebar .nav-item .nav-link span {
      font-size: 1rem;
      display: block;
      font-weight: 500;
  }

  .sidebar .nav-item.active .nav-link {
      font-weight: 700;
  }

  .sidebar .nav-item .collapse {
      position: absolute;
      left: calc(6.5rem + 1.5rem / 2);
      z-index: 1;
      top: 2px;
  }

  .sidebar .nav-item .collapse .collapse-inner {
      border-radius: 0.35rem;
      box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
  }

  .sidebar .nav-item .collapsing {
      display: none;
      transition: none;
  }

  .sidebar .nav-item .collapse .collapse-inner,
  .sidebar .nav-item .collapsing .collapse-inner {
      padding: 0.5rem 0;
      min-width: 10rem;
      font-size: 0.85rem;
      margin: 0 0 1rem 0;
  }

  .sidebar .nav-item .collapse .collapse-inner .collapse-header,
  .sidebar .nav-item .collapsing .collapse-inner .collapse-header {
      margin: 0;
      white-space: nowrap;
      padding: 0.5rem 1.5rem;
      text-transform: uppercase;
      font-weight: 800;
      font-size: 0.65rem;
      color: #b7b9cc;
  }

  .sidebar .nav-item .collapse .collapse-inner .collapse-item,
  .sidebar .nav-item .collapsing .collapse-inner .collapse-item {
      padding: 0.5rem 1rem;
      margin: 0 0.5rem;
      display: block;
      color: #3a3b45;
      text-decoration: none;
      border-radius: 0.35rem;
      white-space: nowrap;
  }

  .sidebar .nav-item .collapse .collapse-inner .collapse-item:hover,
  .sidebar .nav-item .collapsing .collapse-inner .collapse-item:hover {
      background-color: #858796;
  }

  .sidebar .nav-item .collapse .collapse-inner .collapse-item:active,
  .sidebar .nav-item .collapsing .collapse-inner .collapse-item:active {
      background-color: #858796;
  }

  .sidebar .nav-item .collapse .collapse-inner .collapse-item.active,
  .sidebar .nav-item .collapsing .collapse-inner .collapse-item.active {
      color: #4e73df;
      font-weight: 700;
  }

  .sidebar #sidebarToggle {
      width: 2.5rem;
      height: 2.5rem;
      text-align: center;
      margin-bottom: 1rem;
      cursor: pointer;
  }

  .sidebar #sidebarToggle::after {
      font-weight: 900;
      content: "\f104";
      font-family: "Font Awesome 5 Free";
      margin-right: 0.1rem;
  }

  .sidebar #sidebarToggle:hover {
      text-decoration: none;
  }

  .sidebar #sidebarToggle:focus {
      outline: 0;
  }

  .sidebar.toggled {
      width: 0 !important;
      overflow: hidden;
  }

  .sidebar.toggled #sidebarToggle::after {
      content: "\f105";
      font-family: "Font Awesome 5 Free";
      margin-left: 0.25rem;
  }

  .sidebar .sidebar-brand {
      height: 4.375rem;
      text-decoration: none;
      font-size: 1rem;
      font-weight: 800;
      padding: 1.5rem 1rem;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 0.05rem;
      z-index: 1;
  }

  .sidebar .sidebar-brand .sidebar-brand-icon i imag {
      font-size: 2rem;
      width: 2rem;
      height: 2rem;
      line-height: 2rem;
      text-align: center;
      margin: 0 auto;
  }


  .sidebar .sidebar-brand .sidebar-brand-text {
      display: none;
  }

  .sidebar hr.sidebar-divider {
      margin: 0 1rem 1rem;
  }

  .sidebar .sidebar-heading {
      text-align: center;
      padding: 0 1rem;
      font-weight: 800;
      font-size: 0.65rem;
  }

  @media (min-width: 768px) {
      .sidebar {
          width: 14rem !important;
      }

      .sidebar .nav-item .collapse {
          position: relative;
          left: 0;
          z-index: 1;
          top: 0;
          -webkit-animation: none;
          animation: none;
      }

      .sidebar .nav-item .collapse .collapse-inner {
          border-radius: 0;
          box-shadow: none;
      }

      .sidebar .nav-item .collapsing {
          display: block;
          transition: height 0.15s ease;
      }

      .sidebar .nav-item .collapse,
      .sidebar .nav-item .collapsing {
          margin: 0 1rem;
      }

      .sidebar .nav-item .nav-link {
          display: block;
          width: 100%;
          text-align: left;
          padding: 1rem;
          width: 14rem;
      }

      .sidebar .nav-item .nav-link i {
          font-size: 0.85rem;
          margin-right: 0.25rem;
      }

      .sidebar .nav-item .nav-link span {
          display: inline;
      }

      .sidebar .nav-item .nav-link[data-toggle="collapse"]::after {
          width: 1rem;
          text-align: center;
          float: right;
          vertical-align: 0;
          border: 0;
          font-weight: 900;
          content: "\f107";
          font-family: "Font Awesome 5 Free";
      }

      .sidebar .nav-item .nav-link[data-toggle="collapse"].collapsed::after {
          content: "\f105";
      }

      .sidebar .sidebar-brand .sidebar-brand-icon i {
          font-size: 2rem;
      }

      .sidebar .sidebar-brand .sidebar-brand-text {
          display: inline;
      }

      .sidebar .sidebar-heading {
          text-align: left;
      }

      .sidebar.toggled {
          overflow: visible;
          width: 6.5rem !important;
      }

      .sidebar.toggled .nav-item .collapse {
          position: absolute;
          left: calc(6.5rem + 1.5rem / 2);
          z-index: 1;
          top: 2px;
          -webkit-animation-name: growIn;
          animation-name: growIn;
          -webkit-animation-duration: 0.2s;
          animation-duration: 0.2s;
          -webkit-animation-timing-function: transform cubic-bezier(0.18, 1.25, 0.4, 1),
              opacity cubic-bezier(0, 1, 0.4, 1);
          animation-timing-function: transform cubic-bezier(0.18, 1.25, 0.4, 1),
              opacity cubic-bezier(0, 1, 0.4, 1);
      }

      .sidebar.toggled .nav-item .collapse .collapse-inner {
          box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
          border-radius: 0.35rem;
      }

      .sidebar.toggled .nav-item .collapsing {
          display: none;
          transition: none;
      }

      .sidebar.toggled .nav-item .collapse,
      .sidebar.toggled .nav-item .collapsing {
          margin: 0;
      }

      .sidebar.toggled .nav-item:last-child {
          margin-bottom: 1rem;
      }

      .sidebar.toggled .nav-item .nav-link {
          text-align: center;
          padding: 0.75rem 1rem;
          width: 6.5rem;
      }

      .sidebar.toggled .nav-item .nav-link span {
          font-size: 0.65rem;
          display: block;
      }

      .sidebar.toggled .nav-item .nav-link i {
          margin-right: 0;
      }

      .sidebar.toggled .nav-item .nav-link[data-toggle="collapse"]::after {
          display: none;
      }

      .sidebar.toggled .sidebar-brand .sidebar-brand-icon i {
          font-size: 2rem;
      }

      .sidebar.toggled .sidebar-brand .sidebar-brand-text {
          display: none;
      }

      .sidebar.toggled .sidebar-heading {
          text-align: center;
      }
  }

  .sidebar-light .sidebar-brand {
      color: #6e707e;
  }

  .sidebar-light hr.sidebar-divider {
      border-top: 1px solid #eaecf4;
  }

  .sidebar-light .sidebar-heading {
      color: #b7b9cc;
  }

  .sidebar-light .nav-item .nav-link {
      color: #858796;
  }

  .sidebar-light .nav-item .nav-link i {
      color: #d1d3e2;
  }

  .sidebar-light .nav-item .nav-link:active,
  .sidebar-light .nav-item .nav-link:focus,
  .sidebar-light .nav-item .nav-link:hover {
      color: #6e707e;
  }

  .sidebar-light .nav-item .nav-link:active i,
  .sidebar-light .nav-item .nav-link:focus i,
  .sidebar-light .nav-item .nav-link:hover i {
      color: #6e707e;
  }

  .sidebar-light .nav-item .nav-link[data-toggle="collapse"]::after {
      color: #b7b9cc;
  }

  .sidebar-light .nav-item.active .nav-link {
      color: #6e707e;
  }

  .sidebar-light .nav-item.active .nav-link i {
      color: #6e707e;
  }

  .sidebar-light #sidebarToggle {
      background-color: #eaecf4;
  }

  .sidebar-light #sidebarToggle::after {
      color: #b7b9cc;
  }

  .sidebar-light #sidebarToggle:hover {
      background-color: #dddfeb;
  }

  .sidebar-dark .sidebar-brand {
      color: #000000;
      font-weight: 900;
  }

  .sidebar-dark hr.sidebar-divider {
      border-top: 1px solid rgba(255, 255, 255, 0.15);
  }

  .sidebar-dark .sidebar-heading {
      color: rgba(255, 255, 255, 0.4);
  }

  .sidebar-dark .nav-item .nav-link {
      color: #000;
      font-size: 1rem;
  }

  .sidebar-dark .nav-item .nav-link i {
      color: rgba(255, 255, 255, 0.3);
  }

  .sidebar-dark .nav-item .nav-link:active,
  .sidebar-dark .nav-item .nav-link:focus,
  .sidebar-dark .nav-item .nav-link:hover {
      color: #e74a3b;
  }

  .sidebar-dark .nav-item .nav-link:active i,
  .sidebar-dark .nav-item .nav-link:focus i,
  .sidebar-dark .nav-item .nav-link:hover i {
      color: #fff;
  }

  .sidebar-dark .nav-item .nav-link[data-toggle="collapse"]::after {
      color: rgba(255, 255, 255, 0.5);
  }

  .sidebar-dark .nav-item.active .nav-link {
      color: #ff0000;
  }

  .sidebar-dark .nav-item.active .nav-link i {
      color: #fff;
  }

  .sidebar-dark #sidebarToggle {
      background-color: rgba(255, 255, 255, 0.2);
  }

  .sidebar-dark #sidebarToggle::after {
      color: rgba(255, 255, 255, 0.5);
  }

  .sidebar-dark #sidebarToggle:hover {
      background-color: rgba(255, 255, 255, 0.25);
  }

  .sidebar-dark.toggled #sidebarToggle::after {
      color: rgba(255, 255, 255, 0.5);
  }
  .bg-gradient-primary {
  background-image: linear-gradient(180deg, #ffffffd2 10%, #ffffff 100%);
  background-size: cover;
}
</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
      <div class="sidebar-brand-icon rotate-n-15">
          <i> <img src="{{ asset('image/asset -ujilevel/logo.png') }}" alt="" /></i>
      </div>
      <div class="sidebar-brand-text mx-3">Street Striders</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin') }}">
          <i><img src="{{ asset('image/asset -ujilevel/layout.png') }}"
            alt="" /></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Nav Item - Pages Collapse Menu -->
  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="{{ route('file-manager') }}">
          <i><img src="{{ asset('image/asset -ujilevel/area-chart.png') }}"
            alt="" /></i>
          <span>Media Manajer</span></a>
  </li>

  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i> <img src="{{ asset('image/asset -ujilevel/banner.png') }}" alt="" /></i>
          <span>Banner</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Opsi Banner:</h6>
              <a class="collapse-item" href="{{ route('banner.index') }}">Banner</a>
              <a class="collapse-item" href="{{ route('banner.create') }}">Tambah Banner</a>
          </div>
      </div>
  </li>
  <!-- Divider -->
  <!-- Categories -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse"
          aria-expanded="true" aria-controls="categoryCollapse">
          <i><img src="{{ asset('image/asset -ujilevel/medal.png') }}" alt=""/></i>
          <span>Kategori</span>
      </a>
      <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('category.index') }}">Kategori</a>
              <a class="collapse-item" href="{{ route('category.create') }}">Tambah Kategori</a>
          </div>
      </div>
  </li>

  {{-- Brands --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse"
          aria-expanded="true" aria-controls="brandCollapse">
          <i><img src="{{ asset('image/asset -ujilevel/table.png') }}"
            alt="" /></i>
          <span>Brand</span>
      </a>
      <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('brand.index') }}">Brand</a>
              <a class="collapse-item" href="{{ route('brand.create') }}">Tambah Brand</a>
          </div>
      </div>
  </li>



  {{-- Products --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse"
          aria-expanded="true" aria-controls="productCollapse">
          <i><img src="{{ asset('image/asset -ujilevel/box.png') }}"
            alt="" /></i>
          <span>Produk</span>
      </a>
      <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('product.index') }}">Produk</a>
              <a class="collapse-item" href="{{ route('product.create') }}">Tambah Produk</a>
          </div>
      </div>
  </li>


  {{-- Shipping --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse"
          aria-expanded="true" aria-controls="shippingCollapse">
          <i><img src="{{ asset('image/asset -ujilevel/truk.png') }}"
            alt="" /></i>
          <span>Shipping</span>
      </a>
      <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('shipping.index') }}">Shipping</a>
              <a class="collapse-item" href="{{ route('shipping.create') }}">Tambah Shipping</a>
          </div>
      </div>
  </li>

  <!--Orders -->
  <li class="nav-item">
      <a class="nav-link" href="{{ route('order.index') }}">
          <i><img src="{{ asset('image/asset -ujilevel/medal.png') }}"
              alt="" /></i>
          <span>Orderan</span>
      </a>
  </li>

  <!-- Reviews -->
  
  <li class="nav-item">
      <a class="nav-link" href="{{ route('review.index') }}">
          <i><img src="{{ asset('image/asset -ujilevel/review.png') }}"
              alt="" /></i>
          <span>Reviews</span></a>
  </li>
  {{-- Chat  --}}
  <li class="nav-item">
      <a class="nav-link" href="{{ route('review.index') }}">
          <i><img src="{{ asset('image/asset -ujilevel/sms.png') }}"
            alt="" /></i>
          <span>pesan customer</span></a>
  </li>

  <!-- Posts -->
  {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse"
          aria-expanded="true" aria-controls="postCollapse">
          <i><img src="{{ asset('image/asset -ujilevel/folder.png') }}"
              alt="" /></i>
          <span>Postingan</span>
      </a>
      <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Opsi postingan:</h6>
              <a class="collapse-item" href="{{ route('post.index') }}">Postingan</a>
              <a class="collapse-item" href="{{ route('post.create') }}">Tambah Postingan</a>
          </div>
      </div>
  </li> --}}

  <!-- Tags -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse"
          aria-expanded="true" aria-controls="tagCollapse">
          <i><img src="{{ asset('image/asset -ujilevel/tags.png') }}" alt=""/></i>
          <span>Tag</span>
      </a>
      <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Opsi tag:</h6>
              <a class="collapse-item" href="{{ route('post-tag.index') }}">Tag</a>
              <a class="collapse-item" href="{{ route('post-tag.create') }}">Tambah Tag</a>
          </div>
      </div>
  </li>

  <!-- Comments -->
  <li class="nav-item">
      <a class="nav-link" href="{{ route('comment.index') }}">
          <i><img src="{{ asset('image/asset -ujilevel/sms.png') }}"
              alt="" /></i>
          <span>Komen</span>
      </a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Heading -->

  <li class="nav-item">
      <a class="nav-link" href="{{ route('coupon.index') }}">
          <i><img src="{{ asset('image/asset -ujilevel/coupon.png') }}"
              alt="" /></i>
          <span>Coupon</span></a>
  </li>
  <!-- Users -->
  <li class="nav-item">
      <a class="nav-link" href="{{ route('users.index') }}">
          <i><img src="{{ asset('image/asset -ujilevel/group.png') }}"
              alt="" /></i>
          <span>Users</span></a>
  </li>
  <!-- General settings -->
  <li class="nav-item">
      <a class="nav-link" href="{{ route('settings') }}">
          <i><img src="{{ asset('image/asset -ujilevel/security.png') }}"
              alt="" /></i>
          <span>Pengaturan</span></a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
