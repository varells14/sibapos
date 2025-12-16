<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Posko Bantuan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f7fa;
      overflow-x: hidden;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
      position: fixed;
      inset: 0 auto 0 0;
      width: 280px;
      background: linear-gradient(180deg, #00AEEF, #0080C8);
      transition: width .3s ease, transform .3s ease;
      z-index: 1000;
      box-shadow: 4px 0 20px rgba(0,0,0,.1);
    }

    .sidebar.collapsed {
      width: 80px;
    }

    /* ===== SIDEBAR HEADER ===== */
    .sidebar-header {
      height: 70px;
      padding: 0 20px;
      display: flex;
      align-items: center;
      gap: 12px;
      background: rgba(0,0,0,.1);
      color: #fff;
    }

    .sidebar-header i {
      font-size: 26px;
      min-width: 26px;
    }

    .brand-text {
      display: flex;
      flex-direction: column;
    }

    .brand-title {
      font-size: 18px;
      font-weight: 700;
    }

    .brand-subtitle {
      font-size: 12px;
      opacity: .9;
    }

    .sidebar.collapsed .brand-text {
      display: none;
    }

    /* ===== NAV ===== */
    .sidebar-nav {
      padding: 20px 0;
    }

    .nav-item {
      list-style: none;
      margin: 6px 12px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 14px 18px;
      border-radius: 12px;
      color: rgba(255,255,255,.9);
      text-decoration: none;
      transition: .3s;
    }

    .nav-link i {
      font-size: 20px;
      min-width: 24px;
      text-align: center;
    }

    .nav-link:hover {
      background: rgba(255,255,255,.15);
      color: #fff;
    }

    .nav-link.active {
      background: #fff;
      color: #00AEEF;
      font-weight: 600;
    }

    .sidebar.collapsed .nav-link span {
      display: none;
    }

    .sidebar.collapsed .nav-link {
      justify-content: center;
      padding: 14px 0;
    }

    /* ===== MAIN ===== */
    .main-content {
      margin-left: 280px;
      min-height: 100vh;
      transition: margin-left .3s ease;
    }

    .sidebar.collapsed ~ .main-content {
      margin-left: 80px;
    }

    /* ===== HEADER ===== */
    .top-header {
      height: 70px;
      background: #fff;
      padding: 0 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 10px rgba(0,0,0,.05);
      position: sticky;
      top: 0;
      z-index: 999;
    }

    .menu-toggle {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      border: none;
      background: #f3f4f6;
      cursor: pointer;
      transition: .3s;
    }

    .menu-toggle:hover {
      background: #00AEEF;
      color: #fff;
    }

    /* ===== USER ===== */
    .user-trigger {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 6px 14px;
      border-radius: 50px;
      background: #f3f4f6;
    }

    .user-avatar {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: linear-gradient(135deg,#00AEEF,#0080C8);
      color: #fff;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
    }

    .user-name {
      font-size: 14px;
      font-weight: 600;
    }
    .user-role {
      font-size: 12px;
      color: #6b7280;
      margin-top: 2px;
    }

    /* ===== CONTENT ===== */
    .content-wrapper {
      padding: 0px;
    }

    /* ===== OVERLAY (MOBILE) ===== */
    .sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,.5);
      z-index: 998;
    }

    /* ===== MOBILE MODE ===== */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
        width: 280px;
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .sidebar.collapsed {
        width: 280px; /* disable icon mode */
      }

      .main-content {
        margin-left: 0 !important;
      }

      .sidebar-overlay.show {
        display: block;
      }
    }

    .user-dropdown {
  position: relative;
}

.user-trigger {
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  user-select: none;
}

.dropdown-menu {
  position: absolute;
  top: 110%;
  right: 0;
  min-width: 190px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 10px 25px rgba(0,0,0,.12);
  padding: 8px 0;
  display: none;
  z-index: 1000;
}

.dropdown-menu.show {
  display: block;
}

.dropdown-item {
  display: block;
  width: 100%;
  padding: 10px 16px;
  font-size: 14px;
  color: #374151;
  text-decoration: none;
  background: transparent;
  border: none;
  text-align: left;
}

.dropdown-item:hover {
  background: #f3f4f6;
}

.dropdown-item.logout {
  color: #dc2626;
}

  </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <i class="fas fa-hands-helping"></i>
    <div class="brand-text">
      <span class="brand-title">Posko Bantuan</span>
      <span class="brand-subtitle">Admin Panel</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <ul class="p-0 m-0">
      <li class="nav-item">
         <a href="{{ route('dashboard') }}"
   class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
  <i class="fas fa-home"></i>
  <span>Dashboard</span>
</a>

<a href="{{ route('posko') }}"
   class="nav-link {{ Route::is('posko') ? 'active' : '' }}">
  <i class="fas fa-map-marked-alt"></i>
  <span>Data Posko</span>
</a>
      </li>
    </ul>
  </nav>
</aside>

<!-- OVERLAY -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- MAIN -->
<main class="main-content">
  <header class="top-header">
    <button class="menu-toggle" id="menuToggle">
      <i class="fas fa-bars"></i>
    </button>

   <div class="user-dropdown">
  <div class="user-trigger" id="userTrigger">
    <div class="user-avatar">
      {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
    </div>

    <div class="user-text">
      <div class="user-name">{{ Auth::user()->name }}</div>
      <div class="user-role">{{ Auth::user()->lokasi }}</div>
    </div>
  </div>

  <div class="dropdown-menu" id="userMenu">
   <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
  Change Password
</a>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="dropdown-item logout">
         Logout
      </button>
    </form>
  </div>
</div>

  </header>

   <div class="content-wrapper">
  @yield('content')
</div>
</main>

<script>
  const sidebar = document.getElementById('sidebar');
  const menuToggle = document.getElementById('menuToggle');
  const overlay = document.getElementById('sidebarOverlay');
  const navLinks = document.querySelectorAll('.nav-link');

  menuToggle.addEventListener('click', () => {
    if (window.innerWidth <= 768) {
      sidebar.classList.add('show');
      overlay.classList.add('show');
    } else {
      sidebar.classList.toggle('collapsed');
    }
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.remove('show');
    overlay.classList.remove('show');
  });

  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth <= 768) {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
      }
    });
  });
</script>
<script>
  const trigger = document.getElementById('userTrigger');
  const menu = document.getElementById('userMenu');

  trigger.addEventListener('click', (e) => {
    e.stopPropagation();
    menu.classList.toggle('show');
  });

  document.addEventListener('click', () => {
    menu.classList.remove('show');
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="{{ route('changepassword') }}">
        @csrf

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" name="password" class="form-control" required minlength="8">
          </div>

          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            Update Password
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

</html>
