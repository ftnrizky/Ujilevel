@extends('frontend.layouts.master')
@section('title', 'Stret Steredirs || Profile')

@section('main-content')
<style>

  .container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
  }

  .profile-wrapper {
      display: flex;
      gap: 30px;
      min-height: calc(100vh - 40px);
      animation: fadeInUp 0.8s ease-out;
  }

  @keyframes fadeInUp {
      from {
          opacity: 0;
          transform: translateY(30px);
      }
      to {
          opacity: 1;
          transform: translateY(0);
      }
  }

  /* Enhanced Sidebar */
  .sidebar {
      width: 280px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      position: sticky;
      top: 20px;
      height: fit-content;
      margin-top: 20px;
  }

  .sidebar:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
  }

  .back-btn {
      background: linear-gradient(135deg, #ff6b6b, #ee5a5a);
      color: white;
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 15px;
      cursor: pointer;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
  }

  .back-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
  }

  .back-btn:hover {
      transform: translateX(-5px) scale(1.05);
      box-shadow: 0 10px 25px rgba(238, 90, 90, 0.4);
  }

  .back-btn:hover::before {
      left: 100%;
  }

  .back-btn svg {
      width: 24px;
      height: 24px;
  }

  /* Enhanced Menu Items */
  .sidebar ul {
      list-style: none;
      width: 100%;
  }

  .sidebar li {
      margin: 15px 0;
      border-radius: 15px;
      overflow: hidden;
      transform: translateX(0);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .sidebar li a {
      display: flex;
      align-items: center;
      padding: 18px 20px;
      text-decoration: none;
      color: #4a5568;
      font-weight: 500;
      font-size: 16px;
      background: rgba(247, 250, 252, 0.8);
      border-radius: 15px;
      position: relative;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .sidebar li a::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 4px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      transform: scaleY(0);
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .sidebar li:hover {
      transform: translateX(8px);
  }

  .sidebar li:hover a {
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
      color: #667eea;
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
  }

  .sidebar li:hover a::before {
      transform: scaleY(1);
  }

  .sidebar li span {
      margin-right: 15px;
      font-size: 20px;
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .sidebar li:hover span {
      transform: scale(1.2) rotate(5deg);
  }

  /* Logout Button Special Styling */
  .sidebar li:last-child a {
      background: rgba(255, 75, 75, 0.1);
      color: #e53e3e;
      border: 1px solid rgba(255, 75, 75, 0.2);
  }

  .sidebar li:last-child:hover a {
      background: rgba(255, 75, 75, 0.15);
      box-shadow: 0 8px 25px rgba(229, 62, 62, 0.2);
  }

  /* Profile Container */
  .profile-container {
      flex: 1;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      animation: slideInRight 0.8s ease-out 0.2s both;
  }

  @keyframes slideInRight {
      from {
          opacity: 0;
          transform: translateX(30px);
      }
      to {
          opacity: 1;
          transform: translateX(0);
      }
  }

  .profile-header {
      margin-bottom: 40px;
      text-align: center;
  }

  .profile-header h2 {
      font-size: 30px;
      font-weight: 700;
      background: linear-gradient(135deg,rgb(234, 102, 102),rgb(162, 75, 75));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
  }

  .profile-header p {
      font-size: 16px;
      color: #718096;
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.6;
  }

  /* Enhanced Form */
  .profile-form {
      display: grid;
      gap: 25px;
  }

  .form-group {
      display: grid;
      gap: 8px;
      animation: fadeInLeft 0.6s ease-out;
  }

  .form-group:nth-child(even) {
      animation: fadeInRight 0.6s ease-out;
  }

  @keyframes fadeInLeft {
      from {
          opacity: 0;
          transform: translateX(-20px);
      }
      to {
          opacity: 1;
          transform: translateX(0);
      }
  }

  @keyframes fadeInRight {
      from {
          opacity: 0;
          transform: translateX(20px);
      }
      to {
          opacity: 1;
          transform: translateX(0);
      }
  }

  .form-group label {
      font-size: 16px;
      font-weight: 600;
      color: #2d3748;
      margin-bottom: 5px;
  }

  .form-group input,
  .form-group select {
      padding: 15px 20px;
      border-radius: 12px;
      border: 2px solid #e2e8f0;
      background: rgba(247, 250, 252, 0.8);
      font-size: 16px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      backdrop-filter: blur(5px);
  }

  .form-group input:focus,
  .form-group select:focus {
      outline: none;
      border-color: #667eea;
      background: white;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      transform: translateY(-2px);
  }

  .form-group input:hover,
  .form-group select:hover {
      border-color: #cbd5e0;
      transform: translateY(-1px);
  }

  /* Gender Radio Buttons */
  .gender-options {
      display: flex;
      gap: 20px;
      margin-top: 10px;
  }

  .gender-option {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      padding: 12px 20px;
      border-radius: 12px;
      background: rgba(247, 250, 252, 0.8);
      border: 2px solid transparent;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .gender-option:hover {
      background: rgba(102, 126, 234, 0.05);
      border-color: #667eea;
  }

  .gender-option input[type="radio"] {
      appearance: none;
      width: 20px;
      height: 20px;
      border: 2px solid #cbd5e0;
      border-radius: 50%;
      position: relative;
      cursor: pointer;
  }

  .gender-option input[type="radio"]:checked {
      border-color: #667eea;
      background: #667eea;
  }

  .gender-option input[type="radio"]:checked::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
  }

  /* Address Fields */
  .address-fields {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
  }

  /* Profile Image Section */
  .profile-image-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      padding: 30px;
      background: rgba(247, 250, 252, 0.5);
      border-radius: 20px;
      border: 2px dashed #cbd5e0;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .profile-image-section:hover {
      border-color: #667eea;
      background: rgba(102, 126, 234, 0.05);
  }

  .profile-image-container {
      position: relative;
      width: 120px;
      height: 120px;
  }

  .profile-image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid white;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .profile-image-container:hover img {
      transform: scale(1.05);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
  }

  .upload-btn {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 12px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
  }

  .upload-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
  }

  .upload-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
  }

  .upload-btn:hover::before {
      left: 100%;
  }

  /* Save Button */
  .save-btn {
      background: linear-gradient(135deg, #ff6b6b, #ee5a5a);
      color: white;
      border: none;
      padding: 18px 40px;
      font-size: 18px;
      font-weight: 700;
      border-radius: 15px;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      margin-top: 30px;
      justify-self: start;
      min-width: 150px;
  }

  .save-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
  }

  .save-btn:hover {
      transform: translateY(-3px) scale(1.02);
      box-shadow: 0 15px 35px rgba(238, 90, 90, 0.4);
  }

  .save-btn:hover::before {
      left: 100%;
  }

  .save-btn:active {
      transform: translateY(-1px) scale(0.98);
  }

  /* Responsive Design */
  @media (max-width: 1024px) {
      .profile-wrapper {
          flex-direction: column;
          gap: 20px;
      }

      .sidebar {
          width: 100%;
          position: static;
      }

      .sidebar ul {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
          gap: 15px;
      }
  }

  @media (max-width: 768px) {
      .container {
          padding: 0 15px;
      }

      .profile-container {
          padding: 25px;
      }

      .profile-header h2 {
          font-size: 28px;
      }

      .address-fields {
          grid-template-columns: 1fr;
      }

      .gender-options {
          flex-direction: column;
          gap: 10px;
      }

      .sidebar ul {
          grid-template-columns: 1fr;
      }
  }

  @media (max-width: 480px) {
      .profile-wrapper {
          gap: 15px;
      }

      .profile-container {
          padding: 20px;
      }

      .profile-header h2 {
          font-size: 24px;
      }

      .save-btn {
          width: 100%;
          justify-self: stretch;
      }
  }

  /* Loading Animation */
  .loading {
      opacity: 0.7;
      pointer-events: none;
  }

  .loading::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 20px;
      height: 20px;
      margin: -10px 0 0 -10px;
      border: 2px solid #667eea;
      border-top: 2px solid transparent;
      border-radius: 50%;
      animation: spin 1s linear infinite;
  }

  @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
  }
</style>

<div class="container">
    <div class="profile-wrapper">
        <!-- Enhanced Sidebar -->
        <aside class="sidebar">
            <a href="{{ url('user/home') }}" class="back-btn">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <ul>
                <li>
                    <a href="">
                        <span>👤</span>
                        Akun Saya
                    </a>
                </li>
                <li>
                    <a href="">
                        <span>📦</span>
                        Pesanan Saya
                    </a>
                </li>
                <li>
                    <a href="">
                        <span>🎟</span>
                        Voucher Saya
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <span>🚪</span>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Enhanced Profile Container -->
        <main class="profile-container">
            <div class="profile-header">
                <h2>Profil Saya</h2>
                <p>Kelola informasi profil Anda untuk mengontrol, melindungi, dan mengamankan akun</p>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="profile-form">
                @csrf
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ $profile->username ?? '' }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ $profile->name ?? '' }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" id="phone" name="phone" value="{{ $profile->phone ?? '' }}" 
                           placeholder="Masukan nomor dengan benar" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="gender-options">
                        <label class="gender-option">
                            <input type="radio" name="gender" value="Laki - Laki"
                                   {{ ($profile->gender ?? '') == 'Laki - Laki' ? 'checked' : '' }}>
                            <span>Laki - Laki</span>
                        </label>
                        <label class="gender-option">
                            <input type="radio" name="gender" value="Perempuan"
                                   {{ ($profile->gender ?? '') == 'Perempuan' ? 'checked' : '' }}>
                            <span>Perempuan</span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <div class="address-fields">
                        <select name="province">
                            <option>Pilih Provinsi</option>
                        </select>
                        <select name="city">
                            <option>Pilih Kota</option>
                        </select>
                        <select name="district">
                            <option>Pilih Kecamatan</option>
                        </select>
                        <input type="text" name="postal_code" value="{{ $profile->postal_code ?? '' }}" 
                               placeholder="Kode Pos">
                    </div>
                </div>

                <div class="profile-image-section">
                    <div class="profile-image-container">
                        <img src="{{ isset($profile) && $profile && $profile->profile_image ? asset('storage/' . $profile->profile_image) : asset('profile-placeholder.png') }}"
                             alt="Foto Profil" id="profilePreview">
                    </div>
                    <input type="file" name="profile_image" class="upload-btn" accept="image/*" 
                           onchange="previewImage(event)">
                </div>

                <button type="submit" class="save-btn">
                    Simpan Perubahan
                </button>
            </form>
        </main>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('profilePreview');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    // Add form validation and loading states
    document.querySelector('.profile-form').addEventListener('submit', function(e) {
        const button = document.querySelector('.save-btn');
        button.classList.add('loading');
        button.textContent = 'Menyimpan...';
    });

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

@endsection