@extends('frontend.layouts.master')

@section('title', 'Stret Steredirs || Profile')

@section('main-content')
<style>

  .profile-page-container {
      min-height: 100vh;
      background:rgb(196, 104, 104);
      padding: 20px 0;
  }

  .profile-content-wrapper {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      gap: 20px;
      min-height: calc(100vh - 160px); /* Adjust for navbar and footer */
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
        margin-top: 20px;
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
      0% { transform: scale(1); }
      50% { transform: scale(1.2); }
      100% { transform: scale(1); }
  }

  .sidebar li:hover span {
      animation: pulseIcon 0.5s ease;
  }

  /* Profile Container */
  .profile-container {
      flex: 1;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s;
      height: fit-content;
  }

  .profile-container:hover {
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
  }

  .profile-container h2 {
      font-size: 24px;
      margin-bottom: 8px;
      color: #333;
  }

  .profile-container > p {
      font-size: 14px;
      color: #666;
      margin-bottom: 30px;
      line-height: 1.5;
  }

  /* Form */
  form {
      display: grid;
      gap: 20px;
  }

  .form-akun {
      display: flex;
      align-items: center;
      gap: 15px;
  }

  .form-akun label:first-child {
      width: 120px;
      font-size: 16px;
      font-weight: 500;
      color: #333;
  }

  .form-akun input[type="text"],
  .form-akun input[type="email"],
  .form-akun select {
      flex: 1;
      padding: 12px;
      border-radius: 5px;
      border: 1px solid #ddd;
      transition: border-color 0.3s, box-shadow 0.3s;
      font-size: 14px;
  }

  .form-akun input[type="text"]:focus,
  .form-akun input[type="email"]:focus,
  .form-akun select:focus {
      outline: none;
      border-color: #e74c3c;
      box-shadow: 0 0 0 2px rgba(231, 76, 60, 0.1);
  }

  .form-akun input[type="text"]:hover,
  .form-akun input[type="email"]:hover,
  .form-akun select:hover {
      border-color: #999;
  }

  /* Gender radio buttons */
  .gender-options {
      display: flex;
      gap: 20px;
      flex: 1;
  }

  .gender-options label {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
      cursor: pointer;
  }

  .gender-options input[type="radio"] {
      margin: 0;
  }

  /* Address fields */
  .address-fields {
      display: flex;
      gap: 10px;
      flex: 1;
  }

  .address-fields select,
  .address-fields input {
      flex: 1;
  }

  /* Profile Image */
  .profile-image {
      text-align: center;
      margin-top: 20px;
      padding: 20px;
      border: 2px dashed #ddd;
      border-radius: 10px;
      background: #f9f9f9;
  }

  .profile-image img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      display: block;
      margin: 0 auto 15px;
      transition: transform 0.3s;
      border: 3px solid #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .profile-image img:hover {
      transform: scale(1.05);
  }

  .upload-btn {
      background: #f8f9fa;
      border: 1px solid #ddd;
      padding: 8px 16px;
      margin-top: 10px;
      font-size: 14px;
      cursor: pointer;
      border-radius: 5px;
      transition: all 0.3s;
  }

  .upload-btn:hover {
      background: #e9ecef;
      border-color: #999;
  }

  /* Save Button */
  .save-btn {
      background: #e74c3c;
      color: white;
      border: none;
      padding: 12px 30px;
      font-size: 16px;
      font-weight: 500;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
      transition: background 0.3s, transform 0.2s;
      justify-self: start;
      min-width: 120px;
  }

  .save-btn:hover {
      background: #c0392b;
      transform: translateY(-2px);
  }

  .save-btn:active {
      transform: translateY(0);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
      .profile-content-wrapper {
          flex-direction: column;
          padding: 0 15px;
      }

      .sidebar {
          width: 100%;
          margin-bottom: 20px;
      }

      .sidebar ul {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
          margin-top: 15px;
      }

      .sidebar li {
          flex: 1;
          min-width: calc(50% - 5px);
          margin: 0;
          justify-content: center;
      }

      .form-akun {
          flex-direction: column;
          align-items: flex-start;
          gap: 8px;
      }

      .form-akun label:first-child {
          width: auto;
      }

      .gender-options {
          width: 100%;
      }

      .address-fields {
          flex-direction: column;
          gap: 10px;
      }
  }

  @media (max-width: 480px) {
      .profile-page-container {
          padding: 10px 0;
      }

      .profile-container {
          padding: 20px;
      }

      .sidebar li {
          min-width: 100%;
      }
  }
</style>

<div class="profile-page-container">
    <div class="profile-content-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <a href="{{ url('frontend/index') }}" class="back-btn">
                <img src="{{ asset('image/asset -ujilevel/back.png') }}" alt="Back">
            </a>
            <ul>
                <li class="active">
                    <span>👤</span>
                    <a href="#"> Akun Saya</a>
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

        <!-- Form Profil -->
        <main class="profile-container">
            <h2>Profil saya</h2>
            <p>Kelola informasi profil Anda untuk mengontrol, melindungi, dan mengamankan akun</p>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-akun">
                    <label>Username:</label>
                    <input type="text" name="username" value="{{ $profile->username ?? '' }}" autocomplete="off">
                </div>

                <div class="form-akun">
                    <label>Nama:</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" readonly>
                </div>

                <div class="form-akun">
                  <label>Email:</label>
                  <input type="email" name="email" value="{{ Auth::user()->email }}" readonly>
                </div>

                <div class="form-akun">
                    <label>No Telp:</label>
                    <input type="text" name="phone" value="{{ $profile->phone ?? '' }}"
                        placeholder="Masukan nomor dengan benar" autocomplete="off">
                </div>

                <div class="form-akun">
                    <label>Jenis Kelamin:</label>
                    <div class="gender-options">
                        <label>
                            <input type="radio" name="gender" value="Laki - Laki"
                                {{ ($profile->gender ?? '') == 'Laki - Laki' ? 'checked' : '' }}>
                            Laki - Laki
                        </label>
                        <label>
                            <input type="radio" name="gender" value="Perempuan"
                                {{ ($profile->gender ?? '') == 'Perempuan' ? 'checked' : '' }}>
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-akun">
                    <label>Alamat:</label>
                    <div class="address-fields">
                      <label for="province_id">Asal Provinsi</label>
                       <select name="province_name" id="province_id">
                           <option>Provinsi</option>
                       </select>
                      <label for="origin">Asal Kota</label>
                       <select name="origin" id="origin">
                           <option>Kota</option>
                       </select>
                      <input type="text" name="postal_code" value="{{ $profile->postal_code ?? '' }}"
                            placeholder="Kode pos">
                    </div>
                </div>

                <div class="profile-image">
                    <img src="{{ isset($profile) && $profile && $profile->profile_image ? asset('storage/' . $profile->profile_image) : asset('profile-placeholder.png') }}"
                        alt="Foto Profil">
                    <input type="file" name="profile_image" class="upload-btn" accept="image/*">
                </div>

                <button type="submit" class="save-btn">Simpan</button>
            </form>
        </main>
    </div>
</div>
@endsection