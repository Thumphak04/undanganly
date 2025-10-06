<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ============ APP.CSS ============ */
        :root {
            --primary-color: #be123c;
            --secondary-color: #fda4af;
            --accent-color: #fb923c;
            --text-dark: #881337;
            --bg-light: #fff1f2;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #fff1f2 0%, #fed7aa 100%);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Cormorant Garamond', serif;
        }

        /* Cover/Landing Page */
        .cover-page {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, rgba(190, 18, 60, 0.9), rgba(251, 146, 60, 0.9)), 
                        url('https://images.unsplash.com/photo-1519741497674-611481863552?w=1200') center/cover;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s, visibility 0.5s;
        }

        .cover-page.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .cover-content {
            text-align: center;
            color: white;
            padding: 20px;
        }

        .cover-ornament {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            border-radius: 50%;
            border: 5px solid white;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .cover-ornament img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .cover-couple {
            font-size: 3rem;
            font-weight: 700;
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .cover-guest {
            font-size: 1.2rem;
            margin: 20px 0;
            opacity: 0.9;
        }

        .btn-open {
            background: white;
            color: var(--primary-color);
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            margin-top: 20px;
        }

        .btn-open:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        /* Main Content */
        .main-content {
            opacity: 0;
            transition: opacity 0.5s;
        }

        .main-content.visible {
            opacity: 1;
        }

        /* Music Button */
        .music-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            border: 3px solid var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1000;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
        }

        .music-btn:hover {
            transform: scale(1.1);
        }

        .music-btn i {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .music-btn.playing i {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(190, 18, 60, 0.1), rgba(251, 146, 60, 0.1)),
                        url('https://images.unsplash.com/photo-1519741497674-611481863552?w=1600') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.85);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .hero-title {
            font-size: 5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 20px 0;
        }

        .hero-photos {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin: 40px 0;
        }

        .hero-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 8px solid white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .hero-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-date {
            font-size: 2rem;
            color: var(--primary-color);
            font-weight: 600;
            margin-top: 20px;
        }

        /* Section Styling */
        section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            color: var(--text-dark);
            margin-bottom: 60px;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--primary-color);
            margin: 20px auto 0;
        }

        /* Quote Section */
        .quote-section {
            background: white;
            padding: 80px 0;
        }

        .quote-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 40px;
        }

        .quote-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 30px;
        }

        .quote-text {
            font-size: 1.3rem;
            font-style: italic;
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .quote-source {
            font-size: 1.1rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Couple Section */
        .couple-section {
            background: var(--bg-light);
        }

        .couple-card {
            text-align: center;
            padding: 40px 20px;
        }

        .couple-photo {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            border: 10px solid var(--secondary-color);
            margin: 0 auto 30px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .couple-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .couple-name {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .couple-parents {
            color: #666;
            margin-bottom: 15px;
        }

        .couple-social {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s;
        }

        .couple-social:hover {
            color: var(--accent-color);
        }

        /* Countdown Section */
        .countdown-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .countdown-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .countdown-box {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            min-width: 120px;
            text-align: center;
        }

        .countdown-number {
            font-size: 3.5rem;
            font-weight: 700;
            display: block;
            margin-bottom: 10px;
        }

        .countdown-label {
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Story Section */
        .story-timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--secondary-color);
            transform: translateX(-50%);
        }

        .story-item {
            position: relative;
            margin-bottom: 80px;
            display: flex;
            align-items: center;
        }

        .story-item:nth-child(odd) .story-content {
            text-align: right;
            padding-right: 60px;
        }

        .story-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .story-item:nth-child(even) .story-content {
            text-align: left;
            padding-left: 60px;
        }

        .story-content {
            flex: 1;
        }

        .story-icon {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background: var(--primary-color);
            border: 5px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            z-index: 2;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .story-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .story-date {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .story-text {
            color: #666;
            line-height: 1.6;
        }

        /* Gallery Section */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            aspect-ratio: 4/5;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            cursor: pointer;
            transition: all 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Modal Gallery */
        .modal-gallery {
            background: rgba(0,0,0,0.95) !important;
        }

        .modal-gallery .modal-content {
            background: transparent;
            border: none;
        }

        .modal-gallery img {
            max-height: 80vh;
            width: auto;
            margin: 0 auto;
        }

        /* Event Section */
        .event-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 100%;
        }

        .event-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 30px;
        }

        .event-detail {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .event-detail i {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-right: 15px;
            margin-top: 5px;
        }

        .event-detail-content strong {
            display: block;
            margin-bottom: 5px;
            color: var(--text-dark);
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 40px;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
        }

        /* Gift Section */
        .gift-section {
            background: var(--bg-light);
        }

        .gift-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .gift-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .gift-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .gift-bank {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .gift-number {
            font-family: 'Courier New', monospace;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-color);
            background: var(--bg-light);
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .btn-copy {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-copy:hover {
            background: var(--text-dark);
            transform: translateY(-2px);
        }

        /* RSVP Section */
        .rsvp-section {
            background: white;
        }

        .rsvp-form {
            max-width: 700px;
            margin: 0 auto 60px;
            background: var(--bg-light);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .form-control, .form-select {
            border: 2px solid #e5e5e5;
            border-radius: 10px;
            padding: 12px 20px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(190, 18, 60, 0.1);
        }

        .btn-submit {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 15px 50px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-submit:hover {
            background: var(--text-dark);
            transform: translateY(-2px);
        }

        /* Wishes Display */
        .wishes-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .wish-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-left: 5px solid var(--primary-color);
        }

        .wish-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .wish-name {
            font-weight: 700;
            color: var(--text-dark);
        }

        .wish-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .wish-status.hadir {
            background: #dcfce7;
            color: #166534;
        }

        .wish-status.tidak-hadir {
            background: #fee2e2;
            color: #991b1b;
        }

        .wish-message {
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .footer-heart {
            color: var(--secondary-color);
            animation: heartbeat 1.5s infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-photos {
                gap: 15px;
            }
            
            .hero-photo {
                width: 120px;
                height: 120px;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .story-item {
                display: block !important;
            }
            
            .story-item:nth-child(odd) .story-content,
            .story-item:nth-child(even) .story-content {
                text-align: center;
                padding: 0 20px;
                margin-top: 80px;
            }
            
            .timeline-line {
                left: 30px;
            }
            
            .story-icon {
                left: 30px;
            }
            
            .countdown-box {
                min-width: 100px;
            }
            
            .countdown-number {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Audio Player (Hidden) -->
    <audio id="bgMusic" loop>
        <source src="" type="audio/mpeg">
    </audio>

    <!-- Music Control Button -->
    <div class="music-btn" id="musicBtn">
        <i class="fas fa-music"></i>
    </div>

    <!-- Cover Page -->
    <div class="cover-page" id="coverPage">
        <div class="cover-content">
            <div class="cover-ornament">
                <img src="" alt="Wedding" id="coverImage">
            </div>
            <p class="cover-title">The Wedding Of</p>
            <h1 class="cover-couple" id="coverCouple"></h1>
            <p class="cover-guest">Kepada Yth.</p>
            <h2 class="cover-guest" id="guestName" style="font-size: 2rem; font-weight: 700;"></h2>
            <p style="color: white; margin: 20px 0; opacity: 0.9;">Tanpa mengurangi rasa hormat, kami mengundang Bapak/Ibu/Saudara/i untuk hadir di acara pernikahan kami</p>
            <button class="btn-open" onclick="openInvitation()">
                <i class="fas fa-envelope-open"></i> Buka Undangan
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-overlay"></div>
            <div class="hero-content" data-aos="fade-up">
                <p class="hero-subtitle">The Wedding Of</p>
                <h1 class="hero-title" id="heroCouple"></h1>
                <div class="hero-photos">
                    <div class="hero-photo" data-aos="zoom-in" data-aos-delay="100">
                        <img src="" alt="Bride" id="heroBridePhoto">
                    </div>
                    <div class="hero-photo" data-aos="zoom-in" data-aos-delay="200">
                        <img src="" alt="Groom" id="heroGroomPhoto">
                    </div>
                </div>
                <p class="hero-date" id="heroDate"></p>
            </div>
        </section>

        <!-- Quote Section -->
        <section class="quote-section">
            <div class="container">
                <div class="quote-content" data-aos="fade-up">
                    <div class="quote-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <p class="quote-text" id="quoteText"></p>
                    <p class="quote-source" id="quoteSource"></p>
                </div>
            </div>
        </section>

        <!-- Couple Section -->
        <section class="couple-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Mempelai</h2>
                <div class="row">
                    <div class="col-md-6 mb-4" data-aos="fade-right">
                        <div class="couple-card">
                            <div class="couple-photo">
                                <img src="" alt="Bride" id="bridePhoto">
                            </div>
                            <h3 class="couple-name" id="brideName"></h3>
                            <p class="couple-parents" id="brideParents"></p>
                            <a href="" class="couple-social" id="brideInstagram" target="_blank">
                                <i class="fab fa-instagram"></i> <span id="brideIg"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4" data-aos="fade-left">
                        <div class="couple-card">
                            <div class="couple-photo">
                                <img src="" alt="Groom" id="groomPhoto">
                            </div>
                            <h3 class="couple-name" id="groomName"></h3>
                            <p class="couple-parents" id="groomParents"></p>
                            <a href="" class="couple-social" id="groomInstagram" target="_blank">
                                <i class="fab fa-instagram"></i> <span id="groomIg"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Countdown Section -->
        <section class="countdown-section">
            <div class="container">
                <h2 class="section-title text-white" data-aos="fade-up">Menghitung Hari</h2>
                <div class="countdown-container" id="countdownContainer"></div>
            </div>
        </section>

        <!-- Story Section -->
        <section>
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Kisah Cinta Kami</h2>
                <div class="story-timeline" id="storyTimeline">
                    <div class="timeline-line"></div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="gallery-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Galeri Foto</h2>
                <div class="gallery-grid" id="galleryGrid"></div>
            </div>
        </section>

        <!-- Event Section -->
        <section>
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Detail Acara</h2>
                <div class="row">
                    <div class="col-md-6 mb-4" data-aos="fade-right">
                        <div class="event-card">
                            <h3 class="event-title">Akad Nikah</h3>
                            <div id="akadDetails"></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4" data-aos="fade-left">
                        <div class="event-card">
                            <h3 class="event-title">Resepsi</h3>
                            <div id="resepsiDetails"></div>
                        </div>
                    </div>
                </div>
                <div class="map-container" data-aos="fade-up">
                    <iframe id="mapFrame" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>

        <!-- Gift Section -->
        <section class="gift-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Kirim Hadiah</h2>
                <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">
                    Doa restu Anda adalah hadiah terindah bagi kami. Namun jika memberi adalah ungkapan kasih, 
                    Anda dapat memberi kado secara cashless.
                </p>
                <div class="row" id="giftContainer"></div>
            </div>
        </section>

        <!-- RSVP Section -->
        <section class="rsvp-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Konfirmasi Kehadiran</h2>
                <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">
                    Mohon konfirmasi kehadiran Anda
                </p>
                
                <form class="rsvp-form" id="rsvpForm" data-aos="fade-up">
                    <div class="mb-4">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="rsvpName" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Kehadiran</label>
                        <select class="form-select" id="rsvpAttendance" required>
                            <option value="">Pilih</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                            <option value="Masih Ragu">Masih Ragu</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Ucapan & Doa</label>
                        <textarea class="form-control" id="rsvpMessage" rows="4" placeholder="Tulis ucapan dan doa untuk kami..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Kirim Konfirmasi
                    </button>
                </form>

                <div class="wishes-container">
                    <h3 class="text-center mb-4" style="font-size: 2rem; color: var(--text-dark);">
                        Ucapan & Doa (<span id="wishCount">0</span>)
                    </h3>
                    <div id="wishesContainer"></div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <p style="font-size: 1.2rem; margin-bottom: 20px;">
                    Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i 
                    berkenan hadir untuk memberikan doa restu kepada kami.
                </p>
                <h3 style="font-size: 2rem; font-weight: 700; margin: 30px 0;">
                    Terima Kasih
                </h3>
                <p style="font-size: 1.5rem; font-weight: 600;">
                    <span id="footerCouple"></span>
                </p>
                <div style="margin-top: 30px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.2);">
                    <p>Made with <i class="fas fa-heart footer-heart"></i> by Wedding Template</p>
                </div>
            </div>
        </footer>

    </div>

    <!-- Modal for Gallery -->
    <div class="modal fade modal-gallery" id="galleryModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
                    <img src="" alt="Gallery" id="modalImage" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // ============ DATA.JS ============
        const weddingData = {
            bride: {
                fullName: "Siti Aisyah Rahmawati, S.Pd",
                nickName: "Aisyah",
                father: "Bapak Sukirman",
                mother: "Ibu Siti Aminah",
                instagram: "@aisyah.rahma",
                photo: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=400&fit=crop"
            },
            groom: {
                fullName: "Raden Ahmad Darmawan, S.T",
                nickName: "Ahmad",
                father: "Bapak Darmono Wibowo",
                mother: "Ibu Supartini",
                instagram: "@ahmad.darmawan",
                photo: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop"
            },
            event: {
                akad: {
                    date: "2025-12-15",
                    time: "08:00 - 10:00 WIB",
                    venue: "Kediaman Mempelai Wanita",
                    address: "Jl. Mawar No. 45, Sleman, Yogyakarta"
                },
                resepsi: {
                    date: "2025-12-15",
                    time: "11:00 - 14:00 WIB",
                    venue: "Gedung Graha Wisata",
                    address: "Jl. Kaliurang KM 5, Sleman, Yogyakarta"
                },
                mapUrl: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0!2d110.37!3d-7.78!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDYnNDguMCJTIDExMMKwMjInMTIuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
            },
            quotes: {
                text: "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.",
                source: "QS. Ar-Rum: 21"
            },
            story: [
                {
                    title: "Pertama Bertemu",
                    date: "Januari 2020",
                    text: "Takdir mempertemukan kami di acara pernikahan teman. Senyum pertamanya membuat waktu seolah berhenti."
                },
                {
                    title: "Pendekatan",
                    date: "Maret 2020",
                    text: "Komunikasi yang terjalin membuat kami semakin dekat. Setiap obrolan selalu berakhir dengan senyuman."
                },
                {
                    title: "Lamaran",
                    date: "Agustus 2024",
                    text: "Akhirnya dia datang melamar dengan membawa keluarga. Moment yang sangat membahagiakan bagi kedua keluarga."
                },
                {
                    title: "Pernikahan",
                    date: "Desember 2025",
                    text: "Kami akan memulai babak baru kehidupan. Doakan agar menjadi keluarga yang sakinah, mawaddah, warahmah."
                }
            ],
            gallery: [
                "https://images.unsplash.com/photo-1519741497674-611481863552?w=600&h=800&fit=crop",
                "https://images.unsplash.com/photo-1606800052052-a08af7148866?w=600&h=800&fit=crop",
                "https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=600&h=800&fit=crop",
                "https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=600&h=800&fit=crop",
                "https://images.unsplash.com/photo-1609424739131-c8f8f4c7a6a1?w=600&h=800&fit=crop",
                "https://images.unsplash.com/photo-1606216794079-e4df2e9e0b85?w=600&h=800&fit=crop"
            ],
            gifts: [
                { bank: "BCA", accountNumber: "1234567890", accountName: "Ahmad Darmawan" },
                { bank: "Mandiri", accountNumber: "9876543210", accountName: "Siti Aisyah Rahmawati" },
                { bank: "GoPay", accountNumber: "081234567890", accountName: "Ahmad Darmawan" }
            ],
            music: {
                url: "https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3",
                title: "Perfect - Ed Sheeran"
            }
        };

        // ============ APP.JS ============
        
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Get Guest Name from URL
        function getGuestName() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('kpd') || 'Tamu Undangan';
        }

        // Format Date
        function formatDate(dateString) {
            const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }

        // Open Invitation
        function openInvitation() {
            document.getElementById('coverPage').classList.add('hidden');
            document.getElementById('mainContent').classList.add('visible');
            
            const audio = document.getElementById('bgMusic');
            audio.play().catch(e => console.log('Audio play failed:', e));
            document.getElementById('musicBtn').classList.add('playing');
            
            document.body.style.overflow = 'auto';
        }

        // Music Control
        document.getElementById('musicBtn').addEventListener('click', function() {
            const audio = document.getElementById('bgMusic');
            const btn = this;
            
            if (audio.paused) {
                audio.play();
                btn.classList.add('playing');
            } else {
                audio.pause();
                btn.classList.remove('playing');
            }
        });

        // Initialize Cover Page
        function initCoverPage() {
            const guestName = getGuestName();
            document.getElementById('guestName').textContent = guestName;
            document.getElementById('coverCouple').textContent = `${weddingData.bride.nickName} & ${weddingData.groom.nickName}`;
            document.getElementById('coverImage').src = weddingData.bride.photo;
            document.getElementById('bgMusic').src = weddingData.music.url;
        }

        // Initialize Hero Section
        function initHeroSection() {
            document.getElementById('heroCouple').textContent = `${weddingData.bride.nickName} & ${weddingData.groom.nickName}`;
            document.getElementById('heroBridePhoto').src = weddingData.bride.photo;
            document.getElementById('heroGroomPhoto').src = weddingData.groom.photo;
            document.getElementById('heroDate').textContent = formatDate(weddingData.event.akad.date);
        }

        // Initialize Quote Section
        function initQuoteSection() {
            document.getElementById('quoteText').textContent = weddingData.quotes.text;
            document.getElementById('quoteSource').textContent = weddingData.quotes.source;
        }

        // Initialize Couple Section
        function initCoupleSection() {
            // Bride
            document.getElementById('bridePhoto').src = weddingData.bride.photo;
            document.getElementById('brideName').textContent = weddingData.bride.fullName;
            document.getElementById('brideParents').textContent = `Putri dari ${weddingData.bride.father} & ${weddingData.bride.mother}`;
            document.getElementById('brideIg').textContent = weddingData.bride.instagram;
            document.getElementById('brideInstagram').href = `https://instagram.com/${weddingData.bride.instagram.replace('@', '')}`;
            
            // Groom
            document.getElementById('groomPhoto').src = weddingData.groom.photo;
            document.getElementById('groomName').textContent = weddingData.groom.fullName;
            document.getElementById('groomParents').textContent = `Putra dari ${weddingData.groom.father} & ${weddingData.groom.mother}`;
            document.getElementById('groomIg').textContent = weddingData.groom.instagram;
            document.getElementById('groomInstagram').href = `https://instagram.com/${weddingData.groom.instagram.replace('@', '')}`;
        }

        // Countdown Timer
        function updateCountdown() {
            const eventDate = new Date(weddingData.event.akad.date + 'T08:00:00').getTime();
            
            setInterval(() => {
                const now = new Date().getTime();
                const distance = eventDate - now;
                
                if (distance > 0) {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    document.getElementById('countdownContainer').innerHTML = `
                        <div class="countdown-box" data-aos="zoom-in" data-aos-delay="0">
                            <span class="countdown-number">${days}</span>
                            <span class="countdown-label">Hari</span>
                        </div>
                        <div class="countdown-box" data-aos="zoom-in" data-aos-delay="100">
                            <span class="countdown-number">${hours}</span>
                            <span class="countdown-label">Jam</span>
                        </div>
                        <div class="countdown-box" data-aos="zoom-in" data-aos-delay="200">
                            <span class="countdown-number">${minutes}</span>
                            <span class="countdown-label">Menit</span>
                        </div>
                        <div class="countdown-box" data-aos="zoom-in" data-aos-delay="300">
                            <span class="countdown-number">${seconds}</span>
                            <span class="countdown-label">Detik</span>
                        </div>
                    `;
                }
            }, 1000);
        }

        // Initialize Story Section
        function initStorySection() {
            const storyContainer = document.getElementById('storyTimeline');
            
            weddingData.story.forEach((item, index) => {
                const storyItem = document.createElement('div');
                storyItem.className = 'story-item';
                storyItem.setAttribute('data-aos', 'fade-up');
                storyItem.setAttribute('data-aos-delay', index * 100);
                
                storyItem.innerHTML = `
                    <div class="story-content">
                        <h3 class="story-title">${item.title}</h3>
                        <p class="story-date">${item.date}</p>
                        <p class="story-text">${item.text}</p>
                    </div>
                    <div class="story-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div style="flex: 1;"></div>
                `;
                
                storyContainer.appendChild(storyItem);
            });
        }

        // Initialize Gallery
        function initGallery() {
            const galleryGrid = document.getElementById('galleryGrid');
            
            weddingData.gallery.forEach((img, index) => {
                const galleryItem = document.createElement('div');
                galleryItem.className = 'gallery-item';
                galleryItem.setAttribute('data-aos', 'zoom-in');
                galleryItem.setAttribute('data-aos-delay', index * 100);
                
                galleryItem.innerHTML = `<img src="${img}" alt="Gallery ${index + 1}">`;
                
                galleryItem.addEventListener('click', () => {
                    document.getElementById('modalImage').src = img;
                    new bootstrap.Modal(document.getElementById('galleryModal')).show();
                });
                
                galleryGrid.appendChild(galleryItem);
            });
        }

        // Initialize Event Details
        function initEventDetails() {
            // Akad
            document.getElementById('akadDetails').innerHTML = `
                <div class="event-detail">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="event-detail-content">
                        <strong>${formatDate(weddingData.event.akad.date)}</strong>
                    </div>
                </div>
                <div class="event-detail">
                    <i class="fas fa-clock"></i>
                    <div class="event-detail-content">
                        <span>${weddingData.event.akad.time}</span>
                    </div>
                </div>
                <div class="event-detail">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="event-detail-content">
                        <strong>${weddingData.event.akad.venue}</strong>
                        <p class="mb-0 text-muted">${weddingData.event.akad.address}</p>
                    </div>
                </div>
            `;
            
            // Resepsi
            document.getElementById('resepsiDetails').innerHTML = `
                <div class="event-detail">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="event-detail-content">
                        <strong>${formatDate(weddingData.event.resepsi.date)}</strong>
                    </div>
                </div>
                <div class="event-detail">
                    <i class="fas fa-clock"></i>
                    <div class="event-detail-content">
                        <span>${weddingData.event.resepsi.time}</span>
                    </div>
                </div>
                <div class="event-detail">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="event-detail-content">
                        <strong>${weddingData.event.resepsi.venue}</strong>
                        <p class="mb-0 text-muted">${weddingData.event.resepsi.address}</p>
                    </div>
                </div>
            `;
            
            // Map
            document.getElementById('mapFrame').src = weddingData.event.mapUrl;
        }

        // Initialize Gift Section
        function initGiftSection() {
            const giftContainer = document.getElementById('giftContainer');
            
            weddingData.gifts.forEach((gift, index) => {
                const giftCard = document.createElement('div');
                giftCard.className = 'col-md-4 mb-4';
                giftCard.setAttribute('data-aos', 'fade-up');
                giftCard.setAttribute('data-aos-delay', index * 100);
                
                giftCard.innerHTML = `
                    <div class="gift-card">
                        <div class="gift-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h3 class="gift-bank">${gift.bank}</h3>
                        <p class="mb-0 text-muted">${gift.accountName}</p>
                        <div class="gift-number">${gift.accountNumber}</div>
                        <button class="btn-copy" onclick="copyToClipboard('${gift.accountNumber}', '${gift.bank}')">
                            <i class="fas fa-copy"></i> Salin Nomor
                        </button>
                    </div>
                `;
                
                giftContainer.appendChild(giftCard);
            });
        }

        // Copy to Clipboard
        function copyToClipboard(text, bankName) {
            navigator.clipboard.writeText(text).then(() => {
                alert(`Nomor rekening ${bankName} berhasil disalin!`);
            });
        }

        // RSVP Form Submit
        document.getElementById('rsvpForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('rsvpName').value;
            const attendance = document.getElementById('rsvpAttendance').value;
            const message = document.getElementById('rsvpMessage').value;
            
            const wish = {
                name: name,
                attendance: attendance,
                message: message,
                timestamp: new Date().toISOString()
            };
            
            // Get existing wishes
            let wishes = JSON.parse(localStorage.getItem('wedding_wishes') || '[]');
            wishes.unshift(wish);
            localStorage.setItem('wedding_wishes', JSON.stringify(wishes));
            
            // Reset form
            this.reset();
            
            // Reload wishes
            loadWishes();
            
            alert('Terima kasih atas konfirmasi dan doa Anda!');
        });

        // Load Wishes
        function loadWishes() {
            const wishes = JSON.parse(localStorage.getItem('wedding_wishes') || '[]');
            const wishesContainer = document.getElementById('wishesContainer');
            document.getElementById('wishCount').textContent = wishes.length;
            
            wishesContainer.innerHTML = '';
            
            wishes.slice(0, 10).forEach((wish, index) => {
                const wishCard = document.createElement('div');
                wishCard.className = 'wish-card';
                wishCard.setAttribute('data-aos', 'fade-up');
                wishCard.setAttribute('data-aos-delay', index * 50);
                
                const statusClass = wish.attendance === 'Hadir' ? 'hadir' : 
                                   wish.attendance === 'Tidak Hadir' ? 'tidak-hadir' : '';
                
                wishCard.innerHTML = `
                    <div class="wish-header">
                        <span class="wish-name">${wish.name}</span>
                        <span class="wish-status ${statusClass}">${wish.attendance}</span>
                    </div>
                    <p class="wish-message">${wish.message}</p>
                `;
                
                wishesContainer.appendChild(wishCard);
            });
        }

        // Initialize Footer
        function initFooter() {
            document.getElementById('footerCouple').textContent = `${weddingData.bride.nickName} & ${weddingData.groom.nickName}`;
        }

        // Initialize All
        function init() {
            initCoverPage();
            initHeroSection();
            initQuoteSection();
            initCoupleSection();
            updateCountdown();
            initStorySection();
            initGallery();
            initEventDetails();
            initGiftSection();
            loadWishes();
            initFooter();
        }

        // Run on page load
        document.addEventListener('DOMContentLoaded', init);
    </script>

</body>
</html>