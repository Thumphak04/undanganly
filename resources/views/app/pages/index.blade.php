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
                            <img src="https://placehold.co/280x400/C9A961/white?text=Desain+1" alt="Desain Undangan 1">
                        </div>
                        <div class="hero-card">
                            <img src="https://placehold.co/280x400/8B7355/white?text=Desain+2" alt="Desain Undangan 2">
                        </div>
                        <div class="hero-card">
                            <img src="https://placehold.co/280x400/D4AF77/white?text=Desain+3" alt="Desain Undangan 3">
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
                <button class="filter-btn active" data-filter="all">
                    <i class="bi bi-grid-3x3-gap me-2"></i>Semua
                </button>
                <button class="filter-btn" data-filter="pernikahan">
                    <i class="bi bi-heart me-2"></i>Pernikahan
                </button>
                <button class="filter-btn" data-filter="ulang_tahun">
                    <i class="bi bi-cake2 me-2"></i>Ulang Tahun
                </button>
                <button class="filter-btn" data-filter="pertunangan">
                    <i class="bi bi-gem me-2"></i>Pertunangan
                </button>
                <button class="filter-btn" data-filter="wisuda">
                    <i class="bi bi-mortarboard me-2"></i>Wisuda
                </button>
                <button class="filter-btn" data-filter="lainnya">
                    <i class="bi bi-stars me-2"></i>Lainnya
                </button>
            </div>

            <!-- Templates Grid -->
            <div class="row g-4" id="templatesGrid">
                @forelse ($templates as $template)
                    <div class="col-6 col-lg-4 col-xl-3 template-item-col" data-category="{{ $template->category ?? 'lainnya' }}">
                        <div class="template-card">
                            <div class="template-image">
                                <img src="{{ $template->thumbnail ? asset('storage/' . $template->thumbnail) : 'https://placehold.co/500x700/eee/ccc?text=No+Image' }}" alt="{{ $template->name }}" loading="lazy">
                                @if($template->badge)
                                    <span class="template-badge">{{ $template->badge }}</span>
                                @endif
                                <div class="template-overlay">
                                    <button class="preview-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#previewModal"
                                        data-preview-url="{{ $template->preview_url }}"
                                        data-template-name="{{ $template->name }}"
                                        data-template-price="{{ number_format($template->price, 0, ',', '.') }}"
                                        data-template-details='@json($template->detail_templates)'>
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="template-content">
                                <h5 class="template-title">{{ $template->name }}</h5>
                                <p class="template-description">{{ Str::limit($template->description, 50) }}</p>
                                <div class="template-footer">
                                    <div class="template-price">
                                        Rp{{ number_format($template->price, 0, ',', '.') }}
                                    </div>
                                    <button class="order-template-btn order-btn" 
                                            data-template="{{ $template->name }}" 
                                            data-price="{{ number_format($template->price, 0, ',', '.') }}">
                                        <i class="bi bi-whatsapp"></i> Pesan
                                    </button>
                                </div>
                            </div>
                        </div>
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

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Kenapa Memilih Kami?</h2>
                <p class="section-subtitle">Fitur lengkap untuk undangan digital Anda</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h5>Mobile Friendly</h5>
                        <p>Tampil sempurna di semua perangkat</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5>Mudah Disesuaikan</h5>
                        <p>Ubah teks, foto, dan warna sesuai keinginan</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-music-note-beamed"></i>
                        </div>
                        <h5>Musik Latar</h5>
                        <p>Tambahkan musik favorit Anda</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <h5>Proses Cepat</h5>
                        <p>Siap dalam 1x24 jam</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
   <section class="how-it-works-section bg-white" id="how-it-works">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="video-placeholder rounded-4 shadow-lg">
                         <i class="bi bi-play-circle-fill display-1 text-white"></i>
                         <p class="text-white mt-3 fw-bold">Lihat Contoh Undangan</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title mb-3">Website Profesional, Proses Semudah Itu</h2>
                    <p class="section-subtitle mb-4">Kami menyediakan lebih dari sekedar undangan. Dapatkan website eksklusif lengkap dengan fitur canggih untuk membagikan momen bahagia Anda.</p>
                    
                    <ul class="list-unstyled feature-list">
                        <li class="d-flex align-items-start mb-3">
                            <div class="feature-icon-sm me-3"><i class="bi bi-globe"></i></div>
                            <div>
                                <h6 class="fw-bold">Alamat Website Eksklusif</h6>
                                <p class="mb-0 text-muted">Dapatkan alamat link yang cantik dan personal, seperti <strong>undanganly.com/nama-pasangan</strong>, mudah diingat dan dibagikan.</p>
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
