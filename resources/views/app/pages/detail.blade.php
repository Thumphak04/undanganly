@extends('app.layouts.app')

{{-- SECTION UNTUK SEO META TAGS DINAMIS --}}
@section('meta_tags')
    <title>{{ $template->meta_title ?: $template->name }} - Undanganly</title>
    <meta name="description" content="{{ $template->meta_description ?: Str::limit(strip_tags($template->description), 160) }}">
    <meta name="keywords" content="{{ $template->meta_keywords ?: $template->category . ', undangan digital, undangan online' }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $template->og_title ?: $template->meta_title ?: $template->name }}">
    <meta property="og:description" content="{{ $template->og_description ?: $template->meta_description ?: Str::limit(strip_tags($template->description), 160) }}">
    <meta property="og:image" content="{{ $template->og_image ? asset('storage/' . $template->og_image) : asset('storage/' . $template->thumbnail) }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $template->og_title ?: $template->meta_title ?: $template->name }}">
    <meta property="twitter:description" content="{{ $template->og_description ?: $template->meta_description ?: Str::limit(strip_tags($template->description), 160) }}">
    <meta property="twitter:image" content="{{ $template->og_image ? asset('storage/' . $template->og_image) : asset('storage/' . $template->thumbnail) }}">
@endsection


@push('styles')
{{-- Custom CSS untuk halaman detail --}}
<style>
    /* Menggunakan variabel dari app.css untuk konsistensi */
    :root {
        --primary-color: #C9A961;
        --dark-color: #2C2416;
        --light-color: #F8F6F3;
        --white-color: #FFFFFF;
        --text-muted: #6c757d;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .breadcrumb-section {
        padding: 40px 0;
        background-color: var(--light-color);
        border-bottom: 1px solid #dee2e6;
    }
    .detail-section {
        padding: 60px 0;
    }

    .main-preview-image {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        background-color: var(--white-color);
        border: 1px solid #dee2e6;
        margin-bottom: 1rem;
    }
    .main-preview-image img {
        width: 100%;
        height: auto;
        aspect-ratio: 4 / 5; /* Membuat gambar sedikit lebih pendek */
        object-fit: cover;
        object-position: top;
        transition: opacity 0.3s ease;
    }
    .thumbnail-gallery {
        display: flex;
        gap: 0.75rem;
    }
    .thumbnail-item {
        border: 2px solid transparent;
        border-radius: 0.5rem;
        cursor: pointer;
        overflow: hidden;
        transition: var(--transition);
        opacity: 0.7;
    }
    .thumbnail-item:hover, .thumbnail-item.active {
        border-color: var(--primary-color);
        opacity: 1;
        transform: scale(1.05);
    }
    .thumbnail-item img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        display: block;
    }

    .action-box {
        background: var(--white-color);
        border: 1px solid #e0e0e0;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
    }
    .action-box-desktop {
        position: sticky;
        top: 100px;
    }
    .action-box .template-price {
        font-size: 2.25rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: var(--dark-color);
        line-height: 1;
    }
    .action-box .price-label {
        font-size: 0.9rem;
        color: var(--text-muted);
    }
    .action-box .btn {
        width: 100%;
        padding-top: 0.8rem;
        padding-bottom: 0.8rem;
        font-size: 1rem;
    }

    .detail-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--dark-color);
    }
    .ck-content {
        line-height: 1.8; color: var(--text-muted);
    }
    .ck-content h1, .ck-content h2, .ck-content h3 {
        font-family: 'Playfair Display', serif;
        margin-top: 2em; margin-bottom: 1em; font-weight: 600; color: var(--dark-color);
    }
    .ck-content ul {
        list-style-type: none; padding-left: 0;
    }
    .ck-content ul li {
        padding-left: 1.7em; position: relative; margin-bottom: 0.7em;
    }
    .ck-content ul li::before {
        content: '✓';
        color: var(--primary-color);
        font-weight: bold;
        position: absolute;
        left: 0;
        font-size: 1.2em;
        top: -2px;
    }
    .related-section {
        padding: 80px 0;
    }
    .modal-body { padding: 0; }
    .iframe-container {
        position: relative; width: 100%; padding-top: 56.25%; overflow: hidden;
    }
    .iframe-container iframe {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;
    }
    @media (min-width: 992px) {
        .modal-dialog.modal-xl {
            max-width: 1200px;
        }
    }
    @media (max-width: 991.98px) {
        .detail-title { font-size: 2.2rem; }
        .detail-section { padding: 40px 0; }
    }
</style>
@endpush

@section('content')
    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('index') }}#templates">Templates</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::ucfirst($template->category) }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $template->name }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Template Detail Section -->
    <section class="detail-section">
        <div class="container">
            <div class="row g-5">
                <!-- LEFT COLUMN: Content (Title, Image, Description) -->
                <div class="col-lg-7">
                    @if($template->badge)
                    <span class="template-badge mb-3 d-inline-block">{{ $template->badge }}</span>
                    @endif
                    <h1 class="detail-title mb-4">{{ $template->name }}</h1>

                    <div class="image-gallery-container mb-5">
                        <div class="main-preview-image">
                           <img id="mainPreview" src="{{ $template->thumbnail ? asset('storage/' . $template->thumbnail) : 'https://placehold.co/900x1600/eee/ccc?text=Preview' }}" alt="Preview Utama {{ $template->name }}">
                       </div>
                       <div class="thumbnail-gallery" id="thumbnailGallery">
                           <a href="#" class="thumbnail-item active" data-src="{{ $template->thumbnail ? asset('storage/' . $template->thumbnail) : 'https://placehold.co/900x1600/eee/ccc?text=Preview' }}">
                               <img src="{{ $template->thumbnail ? asset('storage/' . $template->thumbnail) : 'https://placehold.co/100x100/eee/ccc?text=1' }}" alt="Thumbnail 1">
                           </a>
                            @if($template->og_image)
                           <a href="#" class="thumbnail-item" data-src="{{ asset('storage/' . $template->og_image) }}">
                               <img src="{{ asset('storage/' . $template->og_image) }}" alt="Thumbnail 2">
                           </a>
                           @endif
                       </div>
                   </div>

                   {{-- ACTION BOX FOR MOBILE (Visible only on screens smaller than lg) --}}
                   <div class="d-lg-none mb-5">
                       <div class="action-box">
                           <div class="mb-3">
                               <div class="price-label">Harga Mulai Dari</div>
                               <div class="template-price">Rp{{ number_format($template->price, 0, ',', '.') }}</div>
                           </div>
                           <p class="text-muted small mb-4">{{ $template->description }}</p>
                           <div class="d-grid gap-3">
                               <a href="https://api.whatsapp.com/send?phone=6285159448015&text=Halo,%20saya%20tertarik%20dengan%20template%20undangan%20'{{ urlencode($template->name) }}'%20dengan%20harga%20Rp{{ number_format($template->price, 0, ',', '.') }}." class="btn btn-primary btn-lg" target="_blank">
                                   <i class="bi bi-whatsapp me-2"></i>Pesan via WhatsApp
                               </a>
                               <button class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#demoModal" data-demo-url="{{ $template->demo_url }}">
                                   <i class="bi bi-eye me-2"></i>Lihat Demo Live
                               </button>
                           </div>
                       </div>
                   </div>

                   <div class="description-section ck-content">
                       <h3 class="section-title" style="font-size: 2rem; text-align: left; margin: 0 0 1.5rem 0;">Detail & Fitur Lengkap</h3>
                       {!! $template->detail_templates !!}
                   </div>
                </div>

                <!-- RIGHT COLUMN: Sticky Action Box (Visible only on lg screens and up) -->
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="action-box action-box-desktop">
                        <div class="mb-3">
                            <div class="price-label">Harga Mulai Dari</div>
                            <div class="template-price">Rp{{ number_format($template->price, 0, ',', '.') }}</div>
                        </div>
                        <p class="text-muted small mb-4">{{ $template->description }}</p>
                        <div class="d-grid gap-3">
                            <a href="https://api.whatsapp.com/send?phone=6285159448015&text=Halo,%20saya%20tertarik%20dengan%20template%20undangan%20'{{ urlencode($template->name) }}'%20dengan%20harga%20Rp{{ number_format($template->price, 0, ',', '.') }}." class="btn btn-primary btn-lg" target="_blank">
                                <i class="bi bi-whatsapp me-2"></i>Pesan via WhatsApp
                            </a>
                            <button class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#demoModal" data-demo-url="{{ $template->demo_url }}">
                                <i class="bi bi-eye me-2"></i>Lihat Demo Live
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Templates Section -->
    <section class="related-section bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Template Serupa Lainnya</h2>
            <div class="row g-4">
                @forelse ($relatedTemplates as $related)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="template-card h-100">
                            <a href="{{ route('templates.show', $related->slug) }}" class="text-decoration-none">
                                <div class="template-image">
                                    <img src="{{ $related->thumbnail ? asset('storage/' . $related->thumbnail) : 'https://placehold.co/500x700/eee/ccc?text=No+Image' }}" alt="{{ $related->name }}" loading="lazy">
                                    @if($related->badge)
                                        <span class="template-badge">{{ $related->badge }}</span>
                                    @endif
                                </div>
                            </a>
                            <div class="template-content">
                                <a href="{{ route('templates.show', $related->slug) }}" class="text-decoration-none">
                                    <h5 class="template-title">{{ $related->name }}</h5>
                                </a>
                                <div class="template-footer mt-auto">
                                    <div class="template-price">
                                        Rp{{ number_format($related->price, 0, ',', '.') }}
                                    </div>
                                    <a href="{{ route('templates.show', $related->slug) }}" class="order-template-btn text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Tidak ada template serupa yang ditemukan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- UPDATED MODAL UNTUK LIVE DEMO --}}
    <div class="modal fade" id="demoModal" tabindex="-1" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Live Demo: {{ $template->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="iframe-container">
                        <iframe id="demoFrame" src="" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                     <a href="https://api.whatsapp.com/send?phone=6285159448015&text=Halo,%20saya%20tertarik%20dengan%20template%20undangan%20'{{ urlencode($template->name) }}'%20dengan%20harga%20Rp{{ number_format($template->price, 0, ',', '.') }}." class="btn btn-primary" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i>Pesan Template Ini
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // SCRIPT FOR IMAGE GALLERY
    const mainPreview = document.getElementById('mainPreview');
    const thumbnailGallery = document.getElementById('thumbnailGallery');
    if(mainPreview && thumbnailGallery) {
        const thumbnails = thumbnailGallery.querySelectorAll('.thumbnail-item');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function(e) {
                e.preventDefault();
                const newSrc = this.getAttribute('data-src');
                mainPreview.style.opacity = '0';
                setTimeout(() => {
                    mainPreview.src = newSrc;
                    mainPreview.style.opacity = '1';
                }, 300);
                thumbnails.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });
    }

    // SCRIPT FOR DEMO MODAL
    const demoModal = document.getElementById('demoModal');
    if (demoModal) {
        const iframe = document.getElementById('demoFrame');
        demoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const demoUrl = button.getAttribute('data-demo-url');
            if (demoUrl) {
                iframe.setAttribute('src', demoUrl);
            }
        });
        demoModal.addEventListener('hidden.bs.modal', function () {
            iframe.setAttribute('src', '');
        });
    }
});
</script>
@endpush

