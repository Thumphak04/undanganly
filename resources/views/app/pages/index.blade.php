@extends('app.layouts.app')



@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="hero-headline mb-4">Buat Undangan Digital Premium, <br>Tanpa Ribet.</h1>
                    <p class="hero-subtitle mb-4">
                        Kini membuat undangan website bukan lagi hal yang sulit. Anda bisa membuatnya sendiri hanya dalam 5 menit. Butuh bantuan? Tim kami siap mengerjakan semuanya untuk Anda.
                    </p>
                    <div class="hero-buttons">
                        <a href="#templates" class="btn btn-primary btn-lg px-4 py-3">
                            <i class="bi bi-collection me-2"></i>Lihat Desain
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6285159448015&text=Halo%20admin%20Undanganly,%20saya%20butuh%20bantuan%20untuk%20pembuatan%20undangan." class="btn btn-outline-primary btn-lg px-4 py-3">
                            <i class="bi bi-whatsapp me-2"></i>Hubungi Admin
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image-cluster">
                      
                        <img src="{{asset('/assets/hero/buat-undangan-digital.png')}}" alt="Contoh Undangan Pernikahan Digital" class="hero-img-main">
                        <img src="{{asset('/assets/hero/buat-undangan-digital.png')}}" alt="Desain Undangan Online" class="hero-img-secondary">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Carousel Section -->
    <section class="category-section">
        <div class="container">
            <div class="category-carousel" id="categoryCarousel">
                <a href="#" class="category-card active" data-filter="all">
                    <div class="category-icon">✨</div>
                    <span>Semua</span>
                </a>
                <a href="#" class="category-card" data-filter="pernikahan">
                    <div class="category-icon">💍</div>
                    <span>Pernikahan</span>
                </a>
                 <a href="#" class="category-card" data-filter="pertunangan">
                    <div class="category-icon">💎</div>
                    <span>Tunangan</span>
                </a>
                <a href="#" class="category-card" data-filter="ulang_tahun">
                    <div class="category-icon">🎂</div>
                    <span>Ulang Tahun</span>
                </a>
                 <a href="#" class="category-card" data-filter="lainnya">
                    <div class="category-icon">🎉</div>
                    <span>Acara Lain</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Templates Section -->
    <section class="templates-section" id="templates">
        <div class="container">
             <div class="text-center mb-5">
                <h2 class="section-title">Pilih Desain Undangan Anda</h2>
            </div>
            <div class="row g-4" id="templatesGrid">
                @forelse ($templates as $template)
                    <div class="col-6 col-md-4 col-lg-3 template-item-col" data-category="{{ $template->category ?? 'lainnya' }}">
                        <div class="template-card-v2">
                            <div class="template-image-v2">
                                <img src="{{ $template->thumbnail ? asset('storage/' . $template->thumbnail) : 'https://placehold.co/500x700/eee/ccc?text=No+Image' }}" alt="{{ $template->name }}" loading="lazy">
                            </div>
                            <div class="template-content-v2">
                                <a href="{{ route('templates.show', $template->slug) }}" class="template-title-v2">{{ $template->name }}</a>
                                <div class="template-price-v2">Rp{{ number_format($template->price, 0, ',', '.') }}</div>
                            </div>
                            <div class="template-footer-v2">
                                <button type="button" class="btn btn-sm btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#demoModal" 
                                    data-demo-url="{{ $template->demo_url }}" 
                                    data-template-name="{{ $template->name }}"
                                    data-template-price="{{ number_format($template->price, 0, ',', '.') }}"
                                    aria-label="Lihat Demo">
                                    <i class="bi bi-camera-video"></i>
                                </button>
                                <a href="{{ route('templates.show', $template->slug) }}" class="btn btn-sm btn-icon btn-outline-primary" aria-label="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-icon btn-primary order-btn" 
                                    data-template="{{ $template->name }}" 
                                    data-price="{{ number_format($template->price, 0, ',', '.') }}"
                                    aria-label="Pesan Sekarang">
                                    <i class="bi bi-whatsapp"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Template untuk kategori ini belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Advantages (Keunggulan) Section -->
    <section class="advantages-section" id="advantages-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Keunggulan Undanganly</h2>
                <p class="section-subtitle">Fitur premium terlengkap untuk memastikan momen spesial Anda tak terlupakan.</p>
            </div>
            <div class="row g-4">
                <div class="col-6 col-lg-4">
                    <div class="advantage-card">
                        <div class="advantage-icon"><i class="bi bi-gem"></i></div>
                        <h5 class="advantage-title">Desain Eksklusif</h5>
                        <p class="text-muted d-none d-lg-block">Template modern yang dirancang oleh desainer profesional kami.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="advantage-card">
                        <div class="advantage-icon"><i class="bi bi-gift-fill"></i></div>
                        <h5 class="advantage-title">Amplop Digital</h5>
                        <p class="text-muted d-none d-lg-block">Tamu dapat mengirim hadiah secara online dengan mudah via e-wallet.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="advantage-card">
                        <div class="advantage-icon"><i class="bi bi-calendar-check-fill"></i></div>
                        <h5 class="advantage-title">RSVP Online</h5>
                        <p class="text-muted d-none d-lg-block">Dapatkan data kehadiran tamu undangan secara real-time ke WhatsApp.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="advantage-card">
                        <div class="advantage-icon"><i class="bi bi-images"></i></div>
                        <h5 class="advantage-title">Galeri Foto & Video</h5>
                        <p class="text-muted d-none d-lg-block">Bagikan momen pre-wedding Anda dalam galeri yang indah.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="advantage-card">
                        <div class="advantage-icon"><i class="bi bi-person-check-fill"></i></div>
                        <h5 class="advantage-title">Nama Tamu Unlimited</h5>
                        <p class="text-muted d-none d-lg-block">Sapa setiap tamu secara personal tanpa batasan jumlah.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="advantage-card">
                        <div class="advantage-icon"><i class="bi bi-patch-check-fill"></i></div>
                        <h5 class="advantage-title">Layanan Penuh</h5>
                        <p class="text-muted d-none d-lg-block">Anda sibuk? Tim kami yang akan kerjakan semuanya. Terima beres!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Highlight Section -->
    <section class="feature-highlight-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    
                    <img style="max-height: 600px" src="{{asset('/assets/hero/saction-undangan-digital.jpg')}}" class="img-fluid rounded-4 shadow-sm" alt="Fitur Sebar dan Ubah Nama Tamu Tanpa Batas">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title text-start mb-3">Sebar & Ubah Nama Tamu Tanpa Batas</h2>
                    <p class="section-subtitle text-start ms-0">Kirim undangan ke semua kerabat dengan mudah. Tulis nama tamu di setiap undangan yang Anda sebar untuk memberikan sentuhan yang lebih personal dan eksklusif, tanpa ada batasan jumlah.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works-section" id="how-it-works">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Penuh Tim Undanganly</h2>
                 <p class="section-subtitle">Anda sibuk? Tidak masalah. Tim profesional kami siap mengerjakan undangan Anda dari awal hingga akhir. Anda terima beres!</p>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-icon">1</div>
                        <div>
                            <h5 class="step-title">Konsultasi & Kirim Materi</h5>
                            <p class="text-muted mb-0">Diskusikan kebutuhan Anda dan kirimkan semua materi undangan kepada admin kami via WhatsApp.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-icon">2</div>
                        <div>
                            <h5 class="step-title">Proses Pembuatan</h5>
                            <p class="text-muted mb-0">Tim desainer kami akan menyusun undangan Anda dengan teliti sesuai desain yang Anda pilih.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-icon">3</div>
                        <div>
                            <h5 class="step-title">Revisi & Finalisasi</h5>
                            <p class="text-muted mb-0">Kami akan mengirimkan pratinjau untuk Anda periksa. Jika sudah sesuai, undangan Anda siap disebar!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Apa Kata Mereka?</h2>
                <p class="section-subtitle">Cerita bahagia dari pasangan yang telah memercayakan momen spesialnya pada kami.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"Prosesnya beneran sat-set! Kirim materi sore, besok pagi undangannya udah jadi dan siap sebar. Desainnya juga mewah banget, melebihi ekspektasi."</p>
                        <div class="author">- Rian & Anisa, Jakarta</div>
                    </div>
                </div>
                 <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"Sangat membantu di tengah kesibukan persiapan nikah. Nggak perlu pusing mikirin teknis, hasilnya profesional dan semua tamu suka."</p>
                        <div class="author">- Budi & Citra, Surabaya</div>
                    </div>
                </div>
                 <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"Fitur amplop digitalnya keren banget! Praktis buat tamu yang jauh. Tim Undanganly juga responsif dan sabar banget jawabin semua pertanyaan."</p>
                        <div class="author">- Dito & Sarah, Bandung</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Tanya Jawab</h2>
                <p class="section-subtitle">Beberapa pertanyaan yang sering diajukan oleh calon pelanggan kami.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Bagaimana proses pemesanannya?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sangat mudah! Anda hanya perlu memilih desain yang disukai, klik "Pesan Sekarang", lalu tim kami akan menghubungi Anda via WhatsApp untuk meminta materi (detail acara, foto, dll). Setelah itu, Anda tinggal tunggu, dan undangan Anda akan kami siapkan hingga selesai.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Berapa lama proses pengerjaannya?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami berkomitmen untuk pelayanan yang cepat. Setelah semua materi kami terima lengkap, proses pengerjaan undangan digital Anda maksimal hanya 1x24 jam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah saya bisa meminta revisi jika ada data yang salah?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Tentu saja. Setiap paket pemesanan sudah termasuk 2x kesempatan revisi minor (seperti salah ketik nama, gelar, atau jam acara) secara gratis. Kami ingin memastikan semua informasi di undangan Anda akurat.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- MODAL UNTUK LIVE DEMO --}}
    <div class="modal fade" id="demoModal" tabindex="-1" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Live Demo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="iframe-container">
                        <iframe id="demoFrame" src="" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                     <a href="#" id="orderFromModal" class="btn btn-primary" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i>Pesan Template Ini
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection



