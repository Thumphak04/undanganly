/* ==========================================
   GLOBAL VARIABLES
   ========================================== */
const whatsappNumber = '6285159448015'; // Ganti dengan nomor WhatsApp Anda

/* ==========================================
   INITIALIZE APP
   ========================================== */
document.addEventListener('DOMContentLoaded', function() {
    initCategoryFilter();
    initOrderButtons();
    initSmoothScroll();
    initNavbarScroll();
    initDemoModal();
});

/* ==========================================
   CATEGORY FILTER FUNCTIONALITY
   ========================================== */
function initCategoryFilter() {
    const categoryLinks = document.querySelectorAll('.category-card');
    const templateItems = document.querySelectorAll('.template-item-col');
    const templatesGrid = document.getElementById('templatesGrid');

    if (categoryLinks.length > 0 && templateItems.length > 0) {
        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                categoryLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                let hasVisibleItems = false;
                
                templateItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    if (filterValue === 'all' || filterValue === itemCategory) {
                        item.style.display = 'block';
                        hasVisibleItems = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Handle no results message
                let noResultsMessage = templatesGrid.querySelector('.no-results-message');
                if (noResultsMessage) {
                    noResultsMessage.remove();
                }

                if (!hasVisibleItems) {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = 'col-12 text-center py-5 no-results-message';
                    messageDiv.innerHTML = `<p class="text-muted">Template untuk kategori ini belum tersedia.</p>`;
                    templatesGrid.appendChild(messageDiv);
                }
            });
        });
    }
}

/* ==========================================
   DEMO MODAL FUNCTIONALITY
   ========================================== */
function initDemoModal() {
    const demoModal = document.getElementById('demoModal');
    if (demoModal) {
        const iframe = document.getElementById('demoFrame');
        const modalTitle = document.getElementById('demoModalLabel');
        const orderFromModalBtn = document.getElementById('orderFromModal');

        demoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; 

            const demoUrl = button.getAttribute('data-demo-url');
            const templateName = button.getAttribute('data-template-name');
            const templatePrice = button.getAttribute('data-template-price');
            
            modalTitle.textContent = 'Live Demo: ' + templateName;
            if (demoUrl) {
                iframe.setAttribute('src', demoUrl);
            }

            if(orderFromModalBtn && templateName && templatePrice) {
                const message = `Halo, saya tertarik dengan template *${templateName}* (Rp${templatePrice}). Mohon informasi lebih lanjut.`;
                const encodedMessage = encodeURIComponent(message);
                const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
                orderFromModalBtn.setAttribute('href', whatsappURL);
            }
        });

        demoModal.addEventListener('hidden.bs.modal', function () {
            iframe.setAttribute('src', '');
        });
    }
}

/* ==========================================
   ORDER FUNCTIONALITY
   ========================================== */
function initOrderButtons() {
    document.body.addEventListener('click', function(e) {
        const orderButton = e.target.closest('.order-btn');

        if (orderButton) {
            e.preventDefault();
            
            const templateName = orderButton.getAttribute('data-template');
            const price = orderButton.getAttribute('data-price');
            const message = `Halo, saya tertarik dengan template *${templateName}* (Rp${price}). Mohon informasi lebih lanjut.`;
            
            const encodedMessage = encodeURIComponent(message);
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            window.open(whatsappURL, '_blank');
        }
    });
}

/* ==========================================
   SMOOTH SCROLL
   ========================================== */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const offsetTop = target.offsetTop - 80; // Navbar offset
                
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/* ==========================================
   NAVBAR SCROLL EFFECT
   ========================================== */
function initNavbarScroll() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
}
