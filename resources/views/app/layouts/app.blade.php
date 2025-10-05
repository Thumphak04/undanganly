<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undanganly: Buat Undangan Digital Pernikahan Online Premium</title>
    <meta name="description"
        content="Buat dan bagikan undangan pernikahan digital impian Anda dengan mudah di Undanganly.com. Pilih dari ratusan template premium, modern, dan elegan. Coba sekarang!">
    <meta name="keywords"
        content="undangan digital, undangan online, undangan pernikahan, undangan web, e-invitation, undangan website, buat undangan online, jasa undangan digital, template undangan pernikahan">
    <meta name="author" content="Undanganly.com">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://undanganly.com/">
    <meta property="og:title" content="Undanganly: Buat Undangan Digital Pernikahan Online Premium">
    <meta property="og:description"
        content="Ratusan template undangan pernikahan digital premium, modern, dan elegan. Buat dan sebarkan undangan impian Anda dengan mudah bersama Undanganly.">
    <meta property="og:image" content="https://undanganly.com/assets/images/social-share.jpg">
    <meta property="og:url" content="https://undanganly.com/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Undanganly.com">
    <meta property="og:locale" content="id_ID">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Undanganly: Buat Undangan Digital Pernikahan Online Premium">
    <meta name="twitter:description"
        content="Ratusan template undangan pernikahan digital premium, modern, dan elegan. Buat dan sebarkan undangan impian Anda dengan mudah bersama Undanganly.">
    <meta name="twitter:image" content="https://undanganly.com/assets/images/social-share.jpg">
    <meta name="twitter:site" content="@username_twitter_anda">
    <meta name="theme-color" content="#A88F5A">
    <meta name="referrer" content="origin-when-cross-origin">
    <link rel="icon" type="image/png" href="{{ asset('/assets/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('/assets/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('/assets/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('/assets/favicon/site.webmanifest') }}" />
    <!-- Bootstrap 5.3.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/detail.css') }}">
</head>

<body>

    {{-- nav --}}
    @include('app.assets.header')

    @yield('content')
    <!-- Footer -->
    @include('app.assets.footer')

    <!-- Preview Modal -->
    @include('app.assets.preview')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('/assets/js/app.js') }}"></script>
</body>

</html>
