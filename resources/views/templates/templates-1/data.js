// Wedding Data Configuration
// Ubah data di bawah ini sesuai dengan informasi pernikahan Anda

const weddingData = {
    // Informasi Mempelai Wanita
    bride: {
        nickname: "Siti",
        fullname: "Siti Nurhaliza, S.Pd",
        parents: "Bapak Budi Santoso & Ibu Dewi Lestari",
        photo: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=500&h=500&fit=crop",
        instagram: "https://instagram.com/siti"
    },
    
    // Informasi Mempelai Pria
    groom: {
        nickname: "Ahmad",
        fullname: "Ahmad Dhani Prasetyo, S.T",
        parents: "Bapak Sutrisno & Ibu Siti Aminah",
        photo: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=500&fit=crop",
        instagram: "https://instagram.com/ahmad"
    },
    
    // Teks Pembuka
    opening: "Assalamu'alaikum Warahmatullahi Wabarakatuh. Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami.",
    
    // Informasi Acara
    event: {
        date: "Sabtu, 15 Maret 2025",
        countdownDate: "2025-03-15T09:00:00", // Format: YYYY-MM-DDTHH:MM:SS
        
        akad: {
            date: "Sabtu, 15 Maret 2025",
            time: "09.00 - 11.00 WIB",
            location: "Masjid Agung Jawa Tengah"
        },
        
        resepsi: {
            date: "Sabtu, 15 Maret 2025",
            time: "13.00 - 17.00 WIB",
            location: "Gedung Graha Wisata Semarang"
        }
    },
    
    // Lokasi Acara
    location: {
        address: "Gedung Graha Wisata Semarang, Jl. Pemuda No. 123, Semarang, Jawa Tengah 50132",
        mapEmbed: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2918334913657!2d110.4200275!3d-6.9824694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4d3f0d024d%3A0x1e0432b9da5cb1e2!2sSemarang!5e0!3m2!1sen!2sid!4v1234567890",
        mapLink: "https://goo.gl/maps/example"
    },
    
    // Kisah Cinta (Timeline)
    story: [
        {
            date: "Januari 2020",
            title: "Pertemuan Pertama",
            description: "Kami pertama kali bertemu di acara pernikahan teman. Perkenalan singkat yang ternyata menjadi awal dari segalanya."
        },
        {
            date: "Mei 2020",
            title: "Menjalin Hubungan",
            description: "Setelah beberapa bulan saling mengenal, kami memutuskan untuk menjalin hubungan yang serius dengan restu kedua orang tua."
        },
        {
            date: "Desember 2023",
            title: "Lamaran",
            description: "Alhamdulillah, keluarga kami telah bertemu dan melaksanakan acara lamaran. Langkah awal menuju pernikahan kami."
        },
        {
            date: "Maret 2025",
            title: "Pernikahan",
            description: "Hari yang kami nantikan telah tiba. Kami akan menikah dan memulai babak baru kehidupan bersama."
        }
    ],
    
    // Galeri Foto (Ganti dengan URL foto Anda)
    gallery: [
        "https://images.unsplash.com/photo-1519741497674-611481863552?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1543536448-d209d2d13a1c?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1606216794074-735e91aa2c92?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=600&h=600&fit=crop",
        "https://images.unsplash.com/photo-1529636798458-92182e662485?w=600&h=600&fit=crop"
    ],
    
    // Video (Embed YouTube - opsional, bisa dikosongkan jika tidak ada)
    // Format: "https://www.youtube.com/embed/VIDEO_ID"
    // Contoh: "https://www.youtube.com/embed/dQw4w9WgXcQ"
    video: "", // Kosongkan jika tidak ada video, atau isi dengan URL embed YouTube
    
    // Hadiah Digital (Rekening Bank/E-Wallet)
    gifts: [
        {
            icon: "fas fa-university",
            bank: "Bank BCA",
            account: "1234567890",
            name: "Siti Nurhaliza"
        },
        {
            icon: "fas fa-university",
            bank: "Bank Mandiri",
            account: "0987654321",
            name: "Ahmad Dhani Prasetyo"
        },
        {
            icon: "fas fa-wallet",
            bank: "GoPay",
            account: "081234567890",
            name: "Siti Nurhaliza"
        },
        {
            icon: "fas fa-wallet",
            bank: "OVO",
            account: "081234567890",
            name: "Ahmad Dhani Prasetyo"
        }
    ],
    
    // Musik Latar (URL file audio)
    // Bisa menggunakan file lokal atau URL online
    // Format yang didukung: MP3, OGG, WAV
    music: "assets/music/background-music.mp3"
};