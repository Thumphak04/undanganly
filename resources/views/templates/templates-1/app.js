// Global Variables
let musicPlaying = false;
const wishes = [];

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeData();
    setupEventListeners();
    getGuestNameFromURL();
});

// Initialize Data from data.js
function initializeData() {
    // Set Cover Names
    document.getElementById('coverNames').textContent = `${weddingData.bride.nickname} & ${weddingData.groom.nickname}`;
    
    // Set Hero Names
    document.getElementById('heroNames').textContent = `${weddingData.bride.nickname} & ${weddingData.groom.nickname}`;
    document.getElementById('heroDate').textContent = weddingData.event.date;
    
    // Set Opening Text
    document.getElementById('openingText').textContent = weddingData.opening;
    
    // Set Bride Info
    document.getElementById('bridePhoto').src = weddingData.bride.photo;
    document.getElementById('brideName').textContent = weddingData.bride.nickname;
    document.getElementById('brideFullname').textContent = weddingData.bride.fullname;
    document.getElementById('brideParents').innerHTML = `Putri dari:<br>${weddingData.bride.parents}`;
    document.getElementById('brideInstagram').href = weddingData.bride.instagram;
    
    // Set Groom Info
    document.getElementById('groomPhoto').src = weddingData.groom.photo;
    document.getElementById('groomName').textContent = weddingData.groom.nickname;
    document.getElementById('groomFullname').textContent = weddingData.groom.fullname;
    document.getElementById('groomParents').innerHTML = `Putra dari:<br>${weddingData.groom.parents}`;
    document.getElementById('groomInstagram').href = weddingData.groom.instagram;
    
    // Set Event Details
    document.getElementById('akadDate').textContent = weddingData.event.akad.date;
    document.getElementById('akadTime').textContent = weddingData.event.akad.time;
    document.getElementById('akadLocation').textContent = weddingData.event.akad.location;
    
    document.getElementById('resepsiDate').textContent = weddingData.event.resepsi.date;
    document.getElementById('resepsiTime').textContent = weddingData.event.resepsi.time;
    document.getElementById('resepsiLocation').textContent = weddingData.event.resepsi.location;
    
    // Set Location
    document.getElementById('locationAddress').textContent = weddingData.location.address;
    document.getElementById('mapFrame').src = weddingData.location.mapEmbed;
    document.getElementById('openMaps').href = weddingData.location.mapLink;
    
    // Set Video
    if (weddingData.video) {
        document.getElementById('videoFrame').src = weddingData.video;
    } else {
        document.getElementById('videoSection').style.display = 'none';
    }
    
    // Set Music
    document.getElementById('backgroundMusic').src = weddingData.music;
    
    // Set Footer Names
    document.getElementById('footerNames').textContent = `${weddingData.bride.nickname} & ${weddingData.groom.nickname}`;
    
    // Initialize Gallery
    initializeGallery();
    
    // Initialize Story
    initializeStory();
    
    // Initialize Gift Cards
    initializeGiftCards();
    
    // Initialize Countdown
    initializeCountdown();
}

// Setup Event Listeners
function setupEventListeners() {
    // Open Invitation
    document.getElementById('openInvitation').addEventListener('click', openInvitation);
    
    // Music Control
    document.getElementById('musicControl').addEventListener('click', toggleMusic);
    
    // RSVP Form
    document.getElementById('rsvpForm').addEventListener('submit', handleRSVP);
    
    // Add to Calendar
    document.getElementById('addToCalendar').addEventListener('click', addToCalendar);
    
    // Modal
    const modal = document.getElementById('galleryModal');
    const modalClose = document.querySelector('.modal-close');
    modalClose.addEventListener('click', () => {
        modal.style.display = 'none';
    });
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
}

// Get Guest Name from URL
function getGuestNameFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const guestName = urlParams.get('kpd') || urlParams.get('to') || 'Tamu Undangan';
    document.getElementById('guestName').textContent = guestName;
}

// Open Invitation
function openInvitation() {
    const cover = document.getElementById('cover');
    const mainContent = document.getElementById('mainContent');
    
    cover.style.opacity = '0';
    setTimeout(() => {
        cover.style.display = 'none';
        mainContent.classList.remove('hidden');
        playMusic();
        animateOnScroll();
    }, 500);
}

// Toggle Music
function toggleMusic() {
    const music = document.getElementById('backgroundMusic');
    const musicControl = document.getElementById('musicControl');
    
    if (musicPlaying) {
        music.pause();
        musicControl.classList.add('paused');
        musicControl.innerHTML = '<i class="fas fa-pause"></i>';
    } else {
        music.play();
        musicControl.classList.remove('paused');
        musicControl.innerHTML = '<i class="fas fa-music"></i>';
    }
    musicPlaying = !musicPlaying;
}

// Play Music
function playMusic() {
    const music = document.getElementById('backgroundMusic');
    music.play().then(() => {
        musicPlaying = true;
    }).catch(err => {
        console.log('Auto-play prevented:', err);
    });
}

// Initialize Gallery
function initializeGallery() {
    const galleryGrid = document.getElementById('galleryGrid');
    
    weddingData.gallery.forEach((photo, index) => {
        const item = document.createElement('div');
        item.className = 'gallery-item';
        item.innerHTML = `
            <img src="${photo}" alt="Photo ${index + 1}">
            <div class="gallery-overlay">
                <i class="fas fa-search-plus"></i>
            </div>
        `;
        
        item.addEventListener('click', () => openGalleryModal(photo));
        galleryGrid.appendChild(item);
    });
}

// Open Gallery Modal
function openGalleryModal(photo) {
    const modal = document.getElementById('galleryModal');
    const modalImg = document.getElementById('modalImage');
    modal.style.display = 'block';
    modalImg.src = photo;
}

// Initialize Story
function initializeStory() {
    const timeline = document.getElementById('storyTimeline');
    
    weddingData.story.forEach((item, index) => {
        const timelineItem = document.createElement('div');
        timelineItem.className = 'timeline-item';
        timelineItem.innerHTML = `
            <div class="timeline-content">
                <div class="timeline-date">${item.date}</div>
                <h3 class="timeline-title">${item.title}</h3>
                <p class="timeline-desc">${item.description}</p>
            </div>
            <div class="timeline-dot"></div>
        `;
        timeline.appendChild(timelineItem);
    });
}

// Initialize Gift Cards
function initializeGiftCards() {
    const giftCards = document.getElementById('giftCards');
    
    weddingData.gifts.forEach(gift => {
        const card = document.createElement('div');
        card.className = 'gift-card';
        card.innerHTML = `
            <div class="gift-icon"><i class="${gift.icon}"></i></div>
            <h3 class="gift-bank">${gift.bank}</h3>
            <p class="gift-account">${gift.account}</p>
            <p class="gift-name">${gift.name}</p>
            <button class="copy-btn" onclick="copyToClipboard('${gift.account}', this)">
                <i class="fas fa-copy"></i> Salin Nomor
            </button>
        `;
        giftCards.appendChild(card);
    });
}

// Copy to Clipboard
function copyToClipboard(text, button) {
    const tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-check"></i> Tersalin!';
    button.classList.add('copied');
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.classList.remove('copied');
    }, 2000);
}

// Initialize Countdown
function initializeCountdown() {
    const countdownDate = new Date(weddingData.event.countdownDate).getTime();
    
    const countdown = setInterval(() => {
        const now = new Date().getTime();
        const distance = countdownDate - now;
        
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        document.getElementById('days').textContent = days;
        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;
        
        if (distance < 0) {
            clearInterval(countdown);
            document.getElementById('countdown').innerHTML = '<p style="font-size: 24px;">Acara Sedang Berlangsung!</p>';
        }
    }, 1000);
}

// Handle RSVP
function handleRSVP(e) {
    e.preventDefault();
    
    const name = document.getElementById('rsvpName').value;
    const attendance = document.getElementById('rsvpAttendance').value;
    const guests = document.getElementById('rsvpGuests').value;
    const message = document.getElementById('rsvpMessage').value;
    
    const wish = {
        name: name,
        attendance: attendance,
        guests: guests,
        message: message,
        timestamp: new Date()
    };
    
    wishes.unshift(wish);
    displayWishes();
    
    // Reset form
    e.target.reset();
    
    // Show success message
    alert('Terima kasih atas konfirmasi dan ucapan Anda! 🙏');
}

// Display Wishes
function displayWishes() {
    const wishesList = document.getElementById('wishesList');
    wishesList.innerHTML = '';
    
    wishes.forEach(wish => {
        const wishItem = document.createElement('div');
        wishItem.className = 'wish-item animate-in';
        
        const statusText = wish.attendance === 'hadir' ? 'Hadir' : 'Tidak Hadir';
        const statusClass = wish.attendance === 'hadir' ? 'hadir' : 'tidak-hadir';
        
        wishItem.innerHTML = `
            <div class="wish-header">
                <span class="wish-name">${wish.name}</span>
                <span class="wish-status ${statusClass}">${statusText}</span>
            </div>
            <p class="wish-message">${wish.message}</p>
        `;
        
        wishesList.appendChild(wishItem);
    });
}

// Add to Calendar
function addToCalendar(e) {
    e.preventDefault();
    
    const event = {
        title: `Pernikahan ${weddingData.bride.nickname} & ${weddingData.groom.nickname}`,
        description: weddingData.opening,
        location: weddingData.location.address,
        start: weddingData.event.countdownDate,
        end: weddingData.event.countdownDate
    };
    
    // Create Google Calendar link
    const startDate = new Date(event.start).toISOString().replace(/-|:|\.\d\d\d/g, '');
    const endDate = new Date(event.end).toISOString().replace(/-|:|\.\d\d\d/g, '');
    
    const googleCalendarUrl = `https://www.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(event.title)}&dates=${startDate}/${endDate}&details=${encodeURIComponent(event.description)}&location=${encodeURIComponent(event.location)}`;
    
    window.open(googleCalendarUrl, '_blank');
}

// Animate on Scroll
function animateOnScroll() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, {
        threshold: 0.1
    });
    
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
}

// Smooth Scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});