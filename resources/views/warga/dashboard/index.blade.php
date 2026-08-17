@extends('warga.layouts.app')

@section('title', 'Dashboard')

@section('content')


    <!-- Hero Section -->
    <section id="dashboard" class="hero section pt-4 pb-5">
      <div class="container">
        
        @php
            $blok = explode('-', $resident->alamat)[0] ?? '';
            $idPelanggan = 'ACM-' . str_pad($resident->id, 6, '0', STR_PAD_LEFT);
        @endphp

        <!-- Hero Banner -->
        <div class="rounded-4 overflow-hidden shadow-sm position-relative" data-aos="fade-up" style="min-height: 280px;">
            <!-- Full Width Background Image -->
            <img src="{{ asset('images/warga/hero.jpg') }}" class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; object-position: right center;" alt="Hero">
            
            <!-- Thin Gradient Overlay for Text Readability (Fades left to right) -->
            <div class="position-absolute top-0 bottom-0 start-0 w-100" style="background: linear-gradient(to right, rgba(240, 247, 255, 0.95) 0%, rgba(240, 247, 255, 0.6) 45%, transparent 100%); z-index: 1;"></div>
            
            <!-- Text Content on Top -->
            <div class="position-relative d-flex flex-column justify-content-center p-4 p-md-5 h-100" style="z-index: 2; min-height: 280px; max-width: 600px;">
                <h1 class="display-5 fw-bold" style="color: #0F172A; text-shadow: 0 2px 10px rgba(255,255,255,0.5);">
                    Selamat Datang,<br>
                    <span style="color: var(--accent-color);">Warga Antapani</span><br>
                    <span style="color: #0d47a1;">City Mas 👋</span>
                </h1>
                <p class="fs-6 mt-3 text-secondary mb-0 fw-medium" style="text-shadow: 0 1px 2px rgba(255,255,255,0.8);">
                    Pantau tagihan dan layanan perumahan Anda dengan mudah.
                </p>
            </div>
        </div>

        <!-- Data Warga Card -->
        <div class="row mt-4 mx-0" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 p-0">
                <div class="card border-0 shadow-sm rounded-4 p-4" style="border: 1px solid #f1f5f9 !important;">
                    <div class="card-body d-flex align-items-center p-0 gap-4">
                        <!-- Icon -->
                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white flex-shrink-0 shadow-sm" style="width: 50px; height: 50px;">
                            <i class="bi bi-person-fill fs-4"></i>
                        </div>
                        
                        <!-- Data -->
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-3 text-dark">Data Perumahan</h5>
                            <div class="row g-3">
                                <div class="col-12 col-md-4 border-end">
                                    <div class="text-muted mb-1" style="font-size: 0.75rem; font-weight: 600;">Kepala Keluarga</div>
                                    <div class="fw-bold text-dark" style="font-size: 0.9rem;">125 KK</div>
                                </div>
                                <div class="col-12 col-md-4 border-end">
                                    <div class="text-muted mb-1" style="font-size: 0.75rem; font-weight: 600;">Satpam</div>
                                    <div class="fw-bold text-dark" style="font-size: 0.9rem;">8 Personel</div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="text-muted mb-1" style="font-size: 0.75rem; font-weight: 600;">Tukang Taman</div>
                                    <div class="fw-bold text-dark" style="font-size: 0.9rem;">5 Personel</div>
                                </div>
                            </div>
                        </div>

                        <!-- House Image -->
                        <div class="d-none d-lg-block flex-shrink-0 ms-4">
                            <img src="{{ asset('images/warga/house.jpg') }}" alt="House" style="height: 80px; mix-blend-mode: multiply;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- Informasi Section -->
    <section id="informasi" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Informasi</h2>
        <p>Berita dan pengumuman terbaru seputar lingkungan Antapani City Mas</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="testimonial-img d-flex align-items-center justify-content-center" style="background-color: var(--accent-color); height: 90px;">
                    <i class="bi bi-calendar-event text-white" style="font-size: 40px;"></i>
                  </div>
                  <h3>Pengumuman Rapat Warga</h3>
                  <h4>20 Agustus 2026</h4>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Rapat evaluasi keamanan bulanan akan diadakan di balai warga pada pukul 19.30 WIB. Kehadiran seluruh kepala keluarga sangat diharapkan.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="testimonial-img d-flex align-items-center justify-content-center" style="background-color: var(--accent-color); height: 90px;">
                    <i class="bi bi-lightning-charge text-white" style="font-size: 40px;"></i>
                  </div>
                  <h3>Pemadaman Listrik</h3>
                  <h4>22 Agustus 2026</h4>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>PLN akan melakukan perbaikan gardu, diperkirakan terjadi pemadaman sementara pada pukul 09.00 - 12.00 WIB. Harap maklum.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="testimonial-img d-flex align-items-center justify-content-center" style="background-color: var(--accent-color); height: 90px;">
                    <i class="bi bi-tools text-white" style="font-size: 40px;"></i>
                  </div>
                  <h3>Kerja Bakti Lingkungan</h3>
                  <h4>25 Agustus 2026</h4>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Kegiatan kerja bakti rutin untuk membersihkan saluran air dan fasilitas umum. Mari bersama jaga kebersihan lingkungan kita.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="testimonial-img d-flex align-items-center justify-content-center" style="background-color: var(--accent-color); height: 90px;">
                    <i class="bi bi-wallet2 text-white" style="font-size: 40px;"></i>
                  </div>
                  <h3>Info Iuran Bulanan</h3>
                  <h4>Akhir Bulan</h4>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Mengingatkan kembali untuk pembayaran Iuran Pengelolaan Lingkungan (IPL) paling lambat tanggal 10 bulan depan. Terima kasih.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="testimonial-img d-flex align-items-center justify-content-center" style="background-color: var(--accent-color); height: 90px;">
                    <i class="bi bi-telephone text-white" style="font-size: 40px;"></i>
                  </div>
                  <h3>Kontak Darurat</h3>
                  <h4>Keamanan & Layanan</h4>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span><strong>Satpam Komplek:</strong> 0812-3456-7890<br><strong>Polisi (Bandung):</strong> 110<br><strong>Pemadam Kebakaran:</strong> 113<br><strong>Ambulans:</strong> 118</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Informasi Section -->

    <!-- Features Section -->
    <section id="tentang" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang</h2>
        <p>Mengenal lebih dekat tujuan dan manfaat hadirnya website Antapani City Mas</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-xl-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('images/warga/house.jpg') }}" class="img-fluid" alt="Antapani City Mas">
          </div>

          <div class="col-xl-7 d-flex" data-aos="fade-up" data-aos-delay="200">

            <div class="row align-self-center gy-5">

              <div class="col-md-6 icon-box">
                <i class="bi bi-people"></i>
                <div>
                  <h4>Dari Warga, Untuk Warga</h4>
                  <p>Sarana informasi bersama yang praktis, mudah diakses, dan transparan.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-info-circle"></i>
                <div>
                  <h4>Informasi Transparan</h4>
                  <p>Membantu warga memperoleh informasi terkait tagihan air, keamanan, dan lingkungan tanpa penyampaian manual.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-clipboard-data"></i>
                <div>
                  <h4>Pengelolaan Efisien</h4>
                  <p>Mewujudkan pengelolaan kebutuhan lingkungan perumahan yang lebih tertib, transparan, dan efisien.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-house-heart"></i>
                <div>
                  <h4>Lingkungan Nyaman</h4>
                  <p>Semangat bersama membangun lingkungan Antapani City Mas yang nyaman, modern, dan saling mendukung.</p>
                </div>
              </div><!-- End Feature Item -->

            </div>

          </div>

        </div>

      </div>

    

    <!-- Tagihan IPL Section -->
    <section id="tagihan" class="tagihan section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tagihan IPL</h2>
        <p>Transparansi pengelolaan iuran lingkungan Antapani City Mas</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="table-responsive">
          <table id="tagihanTable" class="table table-striped table-bordered w-100">
            <thead>
              <tr>
                <th>Bulan</th>
                <th>Alamat Rumah</th>
                <th style="text-align: center;">Meteran (Awal - Akhir)</th>
                <th style="text-align: right;">Total</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Detail</th>
              </tr>
            </thead>
            <tbody>
              @forelse($semuaTagihan as $t)
                <tr>
                  <td style="font-weight: 500;">{{ \Carbon\Carbon::parse($t->bulan_tagihan)->format('F Y') }}</td>
                  <td>{{ $t->resident->alamat ?? '-' }}</td>
                  <td style="text-align: center; color: var(--text-muted);">{{ $t->meteran_awal }} - {{ $t->meteran_akhir }}</td>
                  <td style="text-align: right; font-weight: 600; color: var(--primary-dark);">Rp {{ number_format($t->tagihan_air + $t->ipl + $t->abodement, 0, ',', '.') }}</td>
                  <td style="text-align: center;">
                    @if($t->status === 'Paid')
                      <span class="badge bg-success">Paid</span>
                    @else
                      <span class="badge bg-danger">Unpaid</span>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#detailTagihanModal{{ $t->id }}">Detail</button>
                  </td>
                </tr>


              @empty
                <tr>
                  <td colspan="6" class="text-center">Belum ada data tagihan yang tersimpan.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </section><!-- /Tagihan IPL Section -->

    <!-- Modals Detail Tagihan -->
    @foreach($semuaTagihan as $t)
      <div class="modal fade" id="detailTagihanModal{{ $t->id }}" tabindex="-1" aria-labelledby="detailTagihanModalLabel{{ $t->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
          <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            <div class="modal-header border-0 pb-0 pt-3 px-3">
              <div class="d-flex justify-content-between align-items-start w-100">
                <div>
                  <h6 class="modal-title fw-bold" style="color: #1e293b; font-size: 1.1rem;">Rincian Tagihan</h6>
                  <small class="text-muted" style="font-size: 0.75rem;">ID Tagihan: #{{ $t->id }}</small>
                </div>
                @if($t->status === 'Paid')
                  <span class="badge rounded-pill bg-success-subtle text-success px-2 py-1 border border-success-subtle" style="font-size: 0.7rem;">Paid</span>
                @else
                  <span class="badge rounded-pill bg-danger-subtle text-danger px-2 py-1 border border-danger-subtle" style="font-size: 0.7rem;">Unpaid</span>
                @endif
              </div>
            </div>
            
            <div class="modal-body px-3 pt-3">
              <!-- BULAN TAGIHAN & RESIDENT -->
              <div class="row mb-3">
                <div class="col-6">
                  <div class="text-uppercase text-muted fw-semibold mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">BULAN TAGIHAN</div>
                  <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ \Carbon\Carbon::parse($t->bulan_tagihan)->format('F Y') }}</div>
                </div>
                <div class="col-6">
                  <div class="text-uppercase text-muted fw-semibold mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">RESIDENT</div>
                  <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $t->resident->alamat ?? '-' }}</div>
                </div>
              </div>

              <hr style="border-style: dashed; color: #cbd5e1; margin-bottom: 1rem; margin-top: 0.5rem;">

              <!-- DATA METERAN AIR -->
              <div class="mb-3">
                <div class="text-uppercase text-muted fw-semibold mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px;">DATA METERAN AIR</div>
                <div class="row">
                  <div class="col-4">
                    <div class="text-muted mb-1" style="font-size: 0.75rem;">Meteran Awal</div>
                    <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $t->meteran_awal }} m³</div>
                  </div>
                  <div class="col-4">
                    <div class="text-muted mb-1" style="font-size: 0.75rem;">Meteran Akhir</div>
                    <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $t->meteran_akhir }} m³</div>
                  </div>
                  <div class="col-4">
                    <div class="text-muted mb-1" style="font-size: 0.75rem;">Total Pemakaian</div>
                    <div class="fw-bold" style="color: var(--accent-color); font-size: 0.85rem;">{{ $t->meteran_akhir - $t->meteran_awal }} m³</div>
                  </div>
                </div>
              </div>

              <hr style="border-style: dashed; color: #cbd5e1; margin-bottom: 1rem; margin-top: 0.5rem;">

              <!-- RINCIAN BIAYA -->
              <div class="mb-3">
                <div class="text-uppercase text-muted fw-semibold mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px;">RINCIAN BIAYA</div>
                <div class="d-flex justify-content-between mb-1">
                  <div class="text-dark fw-medium" style="font-size: 0.85rem;">Tagihan Air</div>
                  <div class="text-dark fw-medium" style="font-size: 0.85rem;">Rp {{ number_format($t->tagihan_air, 0, ',', '.') }}</div>
                </div>
                <div class="d-flex justify-content-between mb-1">
                  <div class="text-dark fw-medium" style="font-size: 0.85rem;">IPL (Iuran Lingkungan)</div>
                  <div class="text-dark fw-medium" style="font-size: 0.85rem;">Rp {{ number_format($t->ipl, 0, ',', '.') }}</div>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <div class="text-dark fw-medium" style="font-size: 0.85rem;">Biaya Abodement</div>
                  <div class="text-dark fw-medium" style="font-size: 0.85rem;">Rp {{ number_format($t->abodement, 0, ',', '.') }}</div>
                </div>
              </div>
              
              <div class="d-flex justify-content-between align-items-center pt-3 pb-1 mt-3" style="border-top: 1px dashed #e2e8f0;">
                <h6 class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Total Tagihan</h6>
                <h6 class="fw-bold mb-0" style="color: var(--accent-color); font-size: 1.1rem;">Rp {{ number_format($t->tagihan_air + $t->ipl + $t->abodement, 0, ',', '.') }}</h6>
              </div>
            </div>
            
            <div class="modal-footer border-0 pb-3 px-3 justify-content-start mt-1">
              <button type="button" class="btn btn-sm btn-danger text-white px-3 py-1" style="border-radius: 6px; font-weight: 500; background-color: #ef4444; border-color: #ef4444;" data-bs-dismiss="modal">Kembali</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    <!-- Gallery Section -->
    <section id="galeri" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Galeri</h2>
        <p>Potret lingkungan dan fasilitas yang ada di perumahan Antapani City Mas.</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 3000,
                "disableOnInteraction": false
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 20
                },
                "768": {
                  "slidesPerView": 2,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 3,
                  "spaceBetween": 40
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('images/warga/galeri/agustusan.png') }}"><img src="{{ asset('images/warga/galeri/agustusan.png') }}" class="img-fluid rounded-4 shadow-sm" alt="Kegiatan Agustusan"></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('images/warga/galeri/masjid.png') }}"><img src="{{ asset('images/warga/galeri/masjid.png') }}" class="img-fluid rounded-4 shadow-sm" alt="Masjid As-Salaam"></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('images/warga/galeri/gerbang.png') }}"><img src="{{ asset('images/warga/galeri/gerbang.png') }}" class="img-fluid rounded-4 shadow-sm" alt="Gerbang Utama"></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('images/warga/galeri/rumah.png') }}"><img src="{{ asset('images/warga/galeri/rumah.png') }}" class="img-fluid rounded-4 shadow-sm" alt="Suasana Perumahan"></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Gallery Section -->


    <!-- Faq Section -->
    <section id="pertanyaan" class="faq section light-background">

      <!-- Section Title -->
      <div class="container section-title">
        <h2>Pertanyaan & Jawaban</h2>
        <p>Temukan jawaban atas pertanyaan-pertanyaan yang sering diajukan seputar lingkungan dan tagihan perumahan.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-5">
            <img src="{{ asset('images/warga/kerja_bakti.jpg') }}" class="img-fluid" style="mix-blend-mode: multiply;" alt="Ilustrasi Kerja Bakti">
          </div>

          <div class="col-lg-7">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Kapan tagihan IPL diterbitkan setiap bulannya?</h3>
                <div class="faq-content">
                  <p>Tagihan Iuran Pengelolaan Lingkungan (IPL) rutin diterbitkan pada tanggal 1 setiap bulannya. Anda diharapkan melakukan pembayaran selambat-lambatnya pada tanggal 15 bulan tersebut.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana cara melaporkan jika terjadi gangguan pasokan air?</h3>
                <div class="faq-content">
                  <p>Jika Anda mengalami kendala pasokan air, silakan hubungi bagian teknisi lingkungan kami melalui nomor darurat yang tertera pada menu Kontak atau sampaikan kepada Satpam yang sedang berjaga.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah keamanan perumahan aktif 24 jam?</h3>
                <div class="faq-content">
                  <p>Ya, tim keamanan (Satpam) berjaga selama 24 jam setiap hari dengan sistem pembagian shift untuk memastikan lingkungan Antapani City Mas selalu aman dan terkendali.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Di mana saya bisa mendapatkan informasi mengenai jadwal kerja bakti?</h3>
                <div class="faq-content">
                  <p>Informasi jadwal kerja bakti maupun rapat rutin warga akan selalu di-update melalui bagian "Informasi" di website ini serta diumumkan secara resmi lewat grup komunikasi warga (WhatsApp).</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah tamu yang menginap wajib lapor?</h3>
                <div class="faq-content">
                  <p>Sesuai dengan peraturan rukun tetangga, tamu yang menginap lebih dari 1x24 jam wajib dilaporkan kepada petugas keamanan dan/atau pengurus RT setempat dengan menyerahkan fotokopi identitas.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="kontak" class="contact section">

      <!-- Section Title -->
      <div class="container section-title">
        <h2>Kontak & Lokasi</h2>
        <p>Hubungi petugas keamanan, instansi terkait, atau kunjungi lokasi perumahan kami.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat Perumahan</h3>
                  <p>Komplek Antapani City Mas</p>
                  <p>Kel. Antapani Kidul Kec. Antapani, Kota Bandung, Jawa Barat</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item">
                  <i class="bi bi-telephone"></i>
                  <h3>Satpam (24 Jam)</h3>
                  <p>Pos Utama: 0812-3456-7890</p>
                  <p>Pos Belakang: 0812-9876-5432</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item">
                  <i class="bi bi-building"></i>
                  <h3>Instansi Terkait</h3>
                  <p>Kelurahan Antapani: (022) 7201111</p>
                  <p>Kecamatan Antapani: (022) 7202222</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item">
                  <i class="bi bi-exclamation-triangle"></i>
                  <h3>Darurat (Bandung)</h3>
                  <p>Polisi: 110</p>
                  <p>Ambulans: 118</p>
                  <p>Pemadam: 113</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <div class="h-100 shadow-sm rounded overflow-hidden">
              <iframe style="border:0; width: 100%; height: 100%; min-height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.080517904018!2d107.65342261546252!3d-6.918073860010839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7d23d83b4a5%3A0xc3b44b80b5b2ef!2sAntapani%2C%20Kec.%20Antapani%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div><!-- End Contact Map -->

        </div>

      </div>

    </section><!-- /Contact Section -->

@push('styles')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<style>
    /* Mengurangi jarak judul section ke konten */
    .section-title {
        padding-bottom: 15px !important;
        margin-bottom: 15px !important;
    }
    
    /* Penyesuaian DataTables untuk theme Bootstrap 5 */
    #tagihanTable_wrapper .row { margin-bottom: 15px; }
    #tagihanTable th { background-color: var(--accent-color); color: white; border-color: rgba(255,255,255,0.2); }
    .page-item.active .page-link { background-color: var(--accent-color); border-color: var(--accent-color); }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#tagihanTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
        },
        order: [[0, 'desc']] // Urutkan berdasarkan bulan terbaru secara default
    });
});
</script>
@endpush
  
@endsection
