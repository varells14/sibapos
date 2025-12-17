<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin | Posko Bantuan Kota Padang</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
  font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
  background: linear-gradient(135deg, #f5f7fa, #e8ecf1);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 16px;
  position: relative;
  overflow: hidden;
}

    /* Animated background */
    body::before, body::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      animation: float 20s infinite ease-in-out;
    }

    body::before {
      width: 500px;
      height: 500px;
      background: linear-gradient(135deg, rgba(0,174,239,0.1), rgba(0,128,200,0.05));
      top: -200px;
      right: -200px;
    }

    body::after {
      width: 400px;
      height: 400px;
      background: linear-gradient(135deg, rgba(0,174,239,0.08), rgba(0,128,200,0.03));
      bottom: -150px;
      left: -150px;
      animation-duration: 15s;
      animation-direction: reverse;
    }

    @keyframes float {
      0%, 100% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(30px, -30px) scale(1.1); }
    }

    /* Login Container */
    .login-container {
  background: #ffffff;
  border-radius: 20px;
  box-shadow: 0 20px 60px rgba(0,0,0,0.1);
  width: 100%;
  max-width: 400px;
  padding: 32px 24px;
  min-height: 100vh; /* isi layar penuh */
  display: flex;
  flex-direction: column;
  justify-content: center;
  overflow-y: auto; /* scroll di dalam box jika perlu */
  position: relative;
  z-index: 1;
}

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Logo */
    .logo-section { text-align: center; margin-bottom: 24px; }
    .logo-icon {
      width: 60px; height: 60px;
      background: linear-gradient(135deg, #00AEEF, #0080C8);
      border-radius: 20px;
      display: inline-flex; align-items: center; justify-content: center;
      margin-bottom: 12px;
      box-shadow: 0 8px 24px rgba(0,174,239,0.25);
      animation: pulse 2s infinite;
    }

    @keyframes pulse { 0%,100%{transform:scale(1);}50%{transform:scale(1.05);} }
    .logo-icon i { font-size: 28px; color: #fff; }

    .app-title h1 {
      font-size: 20px;
      font-weight: 800;
      background: linear-gradient(135deg, #00AEEF, #0080C8);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 6px;
      letter-spacing: -0.5px;
    }
    .app-title p { font-size: 13px; color: #6b7280; font-weight: 500; }

    /* Forms */
    .forms-container { margin-top: 16px; overflow: hidden; }
    .form-wrapper { display: flex; width: 200%; transition: transform 0.5s cubic-bezier(0.4,0,0.2,1); }
    .form-wrapper.show-register { transform: translateX(-50%); }
    .form-section { width: 50%; padding: 0 4px; }
    .form-title { text-align:center; font-size:18px; font-weight:700; color:#1f2937; margin-bottom:24px; position:relative; padding-bottom:10px; }
    .form-title::after {
      content: ''; position:absolute; bottom:0; left:50%; transform:translateX(-50%);
      width:50px; height:3px; background: linear-gradient(135deg,#00AEEF,#0080C8); border-radius:2px;
    }

    .form-group { margin-bottom:16px; position:relative; }
    .form-group label { display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px; }
    .input-wrapper { position:relative; }
    .input-icon { position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#9ca3af; font-size:13px; }
    input {
      width:100%; padding:12px 14px 12px 40px; border-radius:12px; border:2px solid #e5e7eb;
      font-size:14px; background:#f9fafb; color:#1f2937; transition: all 0.3s ease;
    }
    input:focus { outline:none; border-color:#00AEEF; background:#fff; box-shadow:0 0 0 4px rgba(0,174,239,0.1); }
    input:focus + .input-icon { color:#00AEEF; }

    .toggle-password {
      position:absolute; top:50%; right:12px; transform:translateY(-50%);
      border:none; background:transparent; font-size:12px; color:#00AEEF; cursor:pointer; font-weight:600; padding:4px 8px;
    }
    .toggle-password:hover { color:#0080C8; }

    .remember-forgot { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
    .remember-me { display:flex; align-items:center; }
    .remember-me input { width:18px;height:18px;margin-right:8px; accent-color:#00AEEF; cursor:pointer; padding:0; }
    .remember-me label { font-size:12px; color:#6b7280; cursor:pointer; }
    .forgot-link { font-size:12px; color:#00AEEF; text-decoration:none; font-weight:600; transition:color 0.3s; }
    .forgot-link:hover { color:#0080C8; text-decoration:underline; }

    .login-button {
      width:100%; padding:14px; background:linear-gradient(135deg,#00AEEF,#0080C8);
      border:none; border-radius:12px; color:#fff; font-size:14px; font-weight:700; cursor:pointer;
      transition: all 0.3s ease; box-shadow:0 4px 12px rgba(0,174,239,0.3); position:relative; overflow:hidden;
    }
    .login-button:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(0,174,239,0.4); }
    .login-button:active { transform:translateY(0); }

    .toggle-link { text-align:center; margin-top:20px; font-size:13px; color:#6b7280; }
    .toggle-link a { color:#00AEEF; font-weight:700; text-decoration:none; margin-left:4px; transition:color 0.3s; }
    .toggle-link a:hover { color:#0080C8; text-decoration:underline; }

    /* Footer */
    .footer { text-align:center; margin-top:24px; padding-top:16px; border-top:1px solid #e5e7eb; font-size:11px; color:#9ca3af; }
    .footer i { color:#ef4444; margin:0 2px; }

    /* Responsive */
    @media (max-width:360px){
      .login-container{padding:24px 16px;}
      .logo-icon{width:50px;height:50px;}
      .logo-icon i{font-size:24px;}
      .app-title h1{font-size:18px;}
      .form-title{font-size:16px;}
    }
  </style>
</head>
<body>

<div class="login-container">

  <!-- Logo & Header -->
  <div class="logo-section">
    <div class="logo-icon"><i class="fas fa-hands-helping"></i></div>
    <div class="app-title">
      <h1>Posko Bantuan Kota Padang</h1>
      <p>Sistem Manajemen Posko Bencana</p>
    </div>
  </div>

  <div class="forms-container">
    <div class="form-wrapper" id="formWrapper">

      <!-- LOGIN FORM -->
      <div class="form-section">
        <div class="form-title">Masuk ke Akun</div>
        <form action="/login" method="POST">
          @csrf
          <div class="form-group">
            <label>Username atau Email</label>
            <div class="input-wrapper">
              <i class="fas fa-user input-icon"></i>
              <input type="text" name="name" placeholder="Masukkan username atau email" required>
            </div>
          </div>

          <div class="form-group">
            <label>Password</label>
            <div class="input-wrapper">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" id="loginPassword" name="password" placeholder="Masukkan password" required>
              <button type="button" class="toggle-password" onclick="togglePassword('loginPassword', this)">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="remember-forgot">
            <div class="remember-me">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">Ingat saya</label>
            </div>
            <a href="#" class="forgot-link">Lupa password?</a>
          </div>

          <button type="submit" class="login-button">Masuk</button>
        </form>

        <div class="toggle-link">
          Belum punya akun?
          <a href="#" onclick="showRegister(); return false;">Daftar sekarang</a>
        </div>
      </div>

      <!-- REGISTER FORM -->
      <div class="form-section">
        <div class="form-title">Buat Akun Baru</div>
        <form action="/register" method="POST">
          @csrf
          <div class="form-group">
            <label>Email</label>
            <div class="input-wrapper">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" name="email" placeholder="Masukkan email" required>
            </div>
          </div>
          <div class="form-group">
            <label>Username</label>
            <div class="input-wrapper">
              <i class="fas fa-user input-icon"></i>
              <input type="text" name="name" placeholder="Masukkan username" required>
            </div>
          </div>
          <div class="form-group">
            <label>Location</label>
            <div class="input-wrapper">
                <i class="fas fa-map-marker-alt input-icon"></i>
              <input type="text" name="lokasi" placeholder="Masukkan location" required>
            </div>
          </div>
          <div class="form-group">
            <label>Password</label>
            <div class="input-wrapper">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" id="registerPassword" name="password" placeholder="Buat password" required>
              <button type="button" class="toggle-password" onclick="togglePassword('registerPassword', this)">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <button type="submit" class="login-button">Daftar</button>
        </form>

        <div class="toggle-link">
          Sudah punya akun?
          <a href="#" onclick="showLogin(); return false;">Masuk di sini</a>
        </div>
      </div>

    </div>
  </div>

  <div class="footer">
    &copy; 2025 Posko Bantuan Kota Padang
  </div>
</div>

<script>
  function togglePassword(id, button) {
    const input = document.getElementById(id);
    const icon = button.querySelector('i');
    if(input.type==="password"){ input.type="text"; icon.classList.replace('fa-eye','fa-eye-slash'); }
    else{ input.type="password"; icon.classList.replace('fa-eye-slash','fa-eye'); }
  }

  function showRegister(){ document.getElementById("formWrapper").classList.add("show-register"); }
  function showLogin(){ document.getElementById("formWrapper").classList.remove("show-register"); }
</script>

</body>
</html>
