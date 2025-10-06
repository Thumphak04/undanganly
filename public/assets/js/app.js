// ==========================================
// GLOBAL VARIABLES
// ==========================================
const whatsappNumber = '6285159448015'; // Ganti dengan nomor WhatsApp Anda

// ==========================================
// INITIALIZE APP
// ==========================================
document.addEventListener('DOMContentLoaded', function() {
    initFilterButtons();
    initOrderButtons();
    initSmoothScroll();
    initNavbarScroll();
    initPreviewModal();
});

// ==========================================
// FILTER FUNCTIONALITY
// ==========================================
function initFilterButtons() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const templateItems = document.querySelectorAll('.template-item-col');
    const templatesGrid = document.getElementById('templatesGrid');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
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

            const noResultsMessage = templatesGrid.querySelector('.no-results');
            if(noResultsMessage) {
                noResultsMessage.remove();
            }

            if(!hasVisibleItems) {
                const messageDiv = document.createElement('div');
                messageDiv.className = 'col-12 text-center py-5 no-results';
                messageDiv.innerHTML = `
                    <i class="bi bi-inbox display-1 text-muted"></i>
                    <h4 class="mt-3 text-muted">Tidak ada template untuk kategori ini</h4>
                    <p class="text-muted">Silakan pilih kategori lain.</p>
                `;
                templatesGrid.appendChild(messageDiv);
            }
        });
    });
}


// ==========================================
// PREVIEW MODAL
// ==========================================
function initPreviewModal() {
    const previewModal = document.getElementById('previewModal');
    if (!previewModal) return;

    previewModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        
        // Get data from attributes
        const previewUrl = button.getAttribute('data-preview-url');
        const templateName = button.getAttribute('data-template-name');
        const templatePrice = button.getAttribute('data-template-price');
        const templateDetailsJSON = button.getAttribute('data-template-details');

        // Target modal elements
        const modalTitle = previewModal.querySelector('#previewTitle');
        const previewFrame = previewModal.querySelector('#previewFrame');
        const orderBtn = previewModal.querySelector('#orderFromModal');
        const detailsContainer = previewModal.querySelector('#templateDetailsContainer');
        const detailsContent = previewModal.querySelector('#templateDetailsContent');

        // Populate modal with standard data
        modalTitle.textContent = "Template: " + templateName;
        previewFrame.src = previewUrl || "about:blank";

        // Handle the template details
        if (templateDetailsJSON) {
            try {
                // **THE FIX IS HERE: Parse the JSON string to get the raw HTML**
                const templateDetails = JSON.parse(templateDetailsJSON);

                if (templateDetails && templateDetails.trim() !== '') {
                    detailsContent.innerHTML = templateDetails;
                    detailsContainer.style.display = 'block'; // Show the container
                } else {
                    detailsContainer.style.display = 'none'; // Hide if content is empty
                }
            } catch (e) {
                console.error("Could not parse template details:", e, templateDetailsJSON);
                detailsContainer.style.display = 'none'; // Hide on error
            }
        } else {
            detailsContainer.style.display = 'none'; // Hide if attribute is missing
        }

        if (orderBtn) {
            orderBtn.setAttribute('data-template', templateName);
            orderBtn.setAttribute('data-price', templatePrice);
        }
    });

    previewModal.addEventListener('hidden.bs.modal', function () {
        // Reset iframe src
        const previewFrame = previewModal.querySelector('#previewFrame');
        previewFrame.src = "about:blank";

        // Reset and hide details section
        const detailsContainer = previewModal.querySelector('#templateDetailsContainer');
        const detailsContent = previewModal.querySelector('#templateDetailsContent');
        detailsContent.innerHTML = "";
        detailsContainer.style.display = 'none';
    });
}

// ==========================================
// ORDER FUNCTIONALITY
// ==========================================
function initOrderButtons() {
    document.body.addEventListener('click', function(e) {
        const orderButton = e.target.closest('.order-btn');

        if (orderButton) {
            e.preventDefault();
            
            let message = '';
            
            if (orderButton.hasAttribute('data-package')) {
                const packageName = orderButton.getAttribute('data-package');
                message = `Halo, saya tertarik dengan paket *${packageName}*. Mohon informasi lebih lanjut.`;
            } else {
                const templateName = orderButton.getAttribute('data-template');
                const price = orderButton.getAttribute('data-price');
                message = `Halo, saya tertarik dengan template *${templateName}* (Rp${price}). Mohon informasi lebih lanjut.`;
            }
            
            const encodedMessage = encodeURIComponent(message);
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            window.open(whatsappURL, '_blank');
        }
    });
}


// ==========================================
// SMOOTH SCROLL
// ==========================================
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            
            if (href === '#') return;
            
            e.preventDefault();
            
            const target = document.querySelector(href);
            if (target) {
                const offsetTop = target.offsetTop - 80;
                
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ==========================================
// NAVBAR SCROLL EFFECT
// ==========================================
function initNavbarScroll() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 50) {
            navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
        } else {
            navbar.style.boxShadow = '0 2px 8px rgba(0,0,0,0.08)'; 
        }
    });
}

