<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('images/warga/logo.png') }}" alt="Antapani City Mas" class="img-fluid" style="max-height: 65px; height: auto; width: auto; filter: hue-rotate(10deg) saturate(0.9);">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Dashboard</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#gallery">Galeri</a></li>
          <li><a href="#tagihan">Tagihan saya</a></li>
          <li><a href="#informasi">Informasi</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @auth
        <a class="btn-getstarted" href="{{ route('dashboard') }}" style="background-color: #0F172A;">Dashboard Admin</a>
      @else
        <a class="btn-getstarted" href="/login">Login</a>
      @endauth

    </div>
  </header>