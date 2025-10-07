@extends('app.layouts.app')

@section('content')
    <!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <h1 class="hero-title mb-3">Undangan Digital Premium untuk Momen Spesial Anda</h1>
                <p class="hero-subtitle mb-4">Ciptakan undangan digital yang elegan dan berkesan dengan koleksi template premium kami</p>
                <a href="#templates" class="btn btn-primary btn-lg px-4 py-3">
                    <i class="bi bi-search me-2"></i>Lihat Template
                </a>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <div class="card-stack">
                        <div class="hero-card">
                             <img src="{{asset('/assets/hero/buat-undangan-digital.png')}}" alt="Desain Undangan 3">
                        </div>
                        <div class="hero-card">
                             <img src="{{asset('/assets/hero/buat-undangan-digital.png')}}" alt="Desain Undangan 3">
                        </div>
                        <div class="hero-card">
                            <img src="{{asset('/assets/hero/buat-undangan-digital.png')}}" alt="Desain Undangan 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

       <!-- Filter Section -->
    <section class="filter-section" id="templates">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title">Pilih Template Favorit Anda</h2>
                <p class="section-subtitle">Semua template dapat disesuaikan dengan kebutuhan Anda</p>
            </div>
            
            <div class="filter-buttons mb-5">
                {{-- ... Tombol filter tidak berubah ... --}}
            </div>

            <!-- Templates Grid -->
            <div class="row g-4" id="templatesGrid">
                @forelse ($templates as $template)
                    {{-- Kolom ini tetap memiliki data-category untuk JS Filter --}}
                    <div class="col-6 col-md-4 col-lg-3 template-item-col" data-category="{{ $template->category ?? 'lainnya' }}">
                        
                        {{-- KARTU TEMPLATE YANG DIPERBARUI --}}
                        <div class="template-card h-100">
                            {{-- Gambar dan judul sekarang menjadi link ke halaman detail --}}
                            <a href="{{ route('templates.show', $template->slug) }}" class="text-decoration-none">
                                <div class="template-image">
                                    <img src="{{ $template->thumbnail ? asset('storage/' . $template->thumbnail) : 'https://placehold.co/500x700/eee/ccc?text=No+Image' }}" alt="{{ $template->name }}" loading="lazy">
                                    @if($template->badge)
                                        <span class="template-badge">{{ $template->badge }}</span>
                                    @endif
                                </div>
                                <div class="template-content-top">
                                    <h5 class="template-title">{{ $template->name }}</h5>
                                </div>
                            </a>
                            
                            {{-- Footer sekarang terpisah untuk tombol --}}
                            <div class="template-footer">
                                <div class="template-price">
                                    Rp{{ number_format($template->price, 0, ',', '.') }}
                                </div>
                                <button class="order-btn" 
                                        data-template="{{ $template->name }}" 
                                        data-price="{{ number_format($template->price, 0, ',', '.') }}">
                                    <i class="bi bi-whatsapp"></i> Pesan
                                </button>
                            </div>
                        </div>
                        {{-- AKHIR KARTU TEMPLATE --}}

                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-inbox display-1 text-muted"></i>
                        <h4 class="mt-3 text-muted">Belum ada template yang tersedia</h4>
                        <p class="text-muted">Silakan cek kembali nanti atau hubungi kami untuk request khusus</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

   <!-- UPDATED Features Section -->
    <section class="features-section bg-white" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Fitur Unggulan Untuk Momen Tak Terlupakan</h2>
                <p class="section-subtitle">Kami memberikan lebih dari sekadar undangan, kami memberikan pengalaman dan keamanan.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="bi bi-palette-fill"></i>
                        </div>
                        <h5>Desain Eksklusif & Elegan</h5>
                        <p>Setiap template dirancang secara profesional untuk memberikan kesan pertama yang mewah dan personal.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5>Website Resmi & Aman</h5>
                        <p>Undangan Anda menggunakan domain <strong>nama.undanganly.com</strong> yang terpercaya, melindungi tamu Anda dari link phishing dan penipuan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="bi bi-gift-fill"></i>
                        </div>
                        <h5>Fitur Interaktif Lengkap</h5>
                        <p>Lengkapi undangan dengan galeri foto, musik latar, hitung mundur, navigasi lokasi, hingga amplop digital.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="bi bi-person-check-fill"></i>
                        </div>
                        <h5>Layanan Penuh & Cepat</h5>
                        <p>Anda cukup kirim materi, tim kami akan siapkan semuanya. Proses pengerjaan cepat, siap sebar dalam 1x24 jam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- How It Works Section -->
   <section class="how-it-works-section" id="how-it-works">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="video-placeholder rounded-4 shadow-lg">
                         <i class="bi bi-play-circle-fill display-1 text-white"></i>
                         <p class="text-white mt-3 fw-bold">Lihat Contoh Undangan</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title mb-3">Undangan Digital, Proses Semudah Itu</h2>
                    <p class="section-subtitle mb-4">Kami menyediakan lebih dari sekedar undangan. Dapatkan website eksklusif lengkap dengan fitur canggih untuk membagikan momen bahagia Anda.</p>
                    
                    <ul class="list-unstyled feature-list">
                        <li class="d-flex align-items-start mb-3">
                            <div class="feature-icon-sm me-3"><i class="bi bi-globe"></i></div>
                            <div>
                                <h6 class="fw-bold">Alamat Website Eksklusif</h6>
                                <p class="mb-0 text-muted">Dapatkan alamat link yang cantik dan personal, seperti <strong>nama-pasangan.undanganly.com</strong>, mudah diingat dan dibagikan.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <div class="feature-icon-sm me-3"><i class="bi bi-shield-check"></i></div>
                            <div>
                                <h6 class="fw-bold">Keamanan Terjamin</h6>
                                <p class="mb-0 text-muted">Link undangan Anda kami proteksi untuk mencegah manipulasi data dan penyalahgunaan oleh pihak tidak bertanggung jawab.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start">
                             <div class="feature-icon-sm me-3"><i class="bi bi-person-check-fill"></i></div>
                            <div>
                                <h6 class="fw-bold">Layanan Penuh oleh Admin</h6>
                                <p class="mb-0 text-muted">Anda tidak perlu pusing. Cukup kirim materi, dan tim kami akan membuatkan undangan dari awal hingga siap sebar.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


@endsection
