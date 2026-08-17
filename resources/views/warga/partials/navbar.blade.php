<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('images/warga/logo.png') }}" alt="Antapani City Mas" class="img-fluid" style="max-height: 65px; height: auto; width: auto; filter: hue-rotate(10deg) saturate(0.9);">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#dashboard" class="active">Dashboard</a></li>
          <li><a href="#informasi">Informasi</a></li>
          <li><a href="#tentang">Tentang</a></li>
          <li><a href="#tagihan">Tagihan IPL</a></li>
          <li><a href="#galeri">Galeri</a></li>
          <li><a href="#pertanyaan">Pertanyaan</a></li>
          <li><a href="#kontak">Kontak</a></li>
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