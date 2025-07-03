// Initialize AOS
AOS.init({
    duration: 1000,
    once: true
});

// Hide loader after page load
window.addEventListener('load', function() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.style.opacity = '0';
        setTimeout(() => {
            loader.style.display = 'none';
        }, 500);
    }
});

// GSAP Animations
gsap.from('[data-gsap="hero-title"]', {
    opacity: 0,
    y: 50,
    duration: 1.5,
    delay: 0.5
});

gsap.from('[data-gsap="hero-subtitle"]', {
    opacity: 0,
    y: 50,
    duration: 1.5,
    delay: 1
});

// Mobile Menu Toggle
const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}

// Smooth Scroll
document.querySelectorAll('.smooth-scroll').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    });
});

// Modal Functions
function openModal() {
    const modal = document.getElementById('contactModal');
    const modalContent = document.getElementById('modalContent');
    if (modal && modalContent) {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-0');
            modalContent.classList.add('scale-100');
        }, 10);
    }
}

function closeModal() {
    const modal = document.getElementById('contactModal');
    const modalContent = document.getElementById('modalContent');
    if (modal && modalContent) {
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
}











// Close modal on outside click
document.getElementById('contactModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Initialize music player
    const musicToggle = document.getElementById('musicToggle');
    const bgMusic = document.getElementById('bgMusic');
    const playIcon = document.getElementById('playIcon');
    const pauseIcon = document.getElementById('pauseIcon');
    
    let isPlaying = false;
    
    musicToggle.addEventListener('click', function() {
        if (isPlaying) {
            bgMusic.pause();
            playIcon.classList.remove('hidden');
            pauseIcon.classList.add('hidden');
        } else {
            bgMusic.play().catch(e => console.log("Autoplay prevented:", e));
            playIcon.classList.add('hidden');
            pauseIcon.classList.remove('hidden');
        }
        isPlaying = !isPlaying;
    });

    // Create flower petals
    function createFlowerPetals() {
        const container = document.getElementById('flowerContainer');
        const petalCount = 15;
        const petalTypes = 5;
        
        for (let i = 0; i < petalCount; i++) {
            const petal = document.createElement('div');
            petal.className = 'flower-petal';
            
            const petalType = Math.floor(Math.random() * petalTypes) + 1;
            petal.style.backgroundImage = `url('assets/images/petal-${petalType}.png')`;
            
            const size = Math.random() * 30 + 20;
            petal.style.width = `${size}px`;
            petal.style.height = `${size}px`;
            petal.style.left = `${Math.random() * 100}%`;
            
            const duration = Math.random() * 10 + 10;
            const delay = Math.random() * 5;
            petal.style.animationDuration = `${duration}s`;
            petal.style.animationDelay = `${delay}s`;
            
            container.appendChild(petal);
        }
    }

    // Image gallery functionality (support external wedding image URLs)
    function initImageGallery() {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('[data-target]');
        
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                const newImage = this.getAttribute('data-target');
                if (!mainImage) return;

                mainImage.style.opacity = '0';

                setTimeout(() => {
                    mainImage.style.backgroundImage = `url('${newImage}')`;
                    mainImage.style.opacity = '1';
                }, 300);
            });

            // Hover effect - uses inline styles directly
            thumb.addEventListener('mouseenter', function() {
                this.style.opacity = '1';
                this.style.transform = 'scale(1.05)';
            });

            thumb.addEventListener('mouseleave', function() {
                this.style.opacity = '0.7';
                this.style.transform = 'scale(1)';
            });
        });
    }

    // Scroll animations
    function initScrollAnimations() {
        const scrollElements = document.querySelectorAll('[data-scroll]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animationType = element.getAttribute('data-scroll');
                    const delay = element.getAttribute('data-scroll-delay') || 0;
                    
                    setTimeout(() => {
                        element.classList.add('animated');
                    }, delay * 1000);
                    
                    observer.unobserve(element);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        scrollElements.forEach(el => observer.observe(el));
    }

    // Smooth scrolling
    function initSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Initialize all
    createFlowerPetals();
    initImageGallery();
    initScrollAnimations();
    initSmoothScrolling();

    // Hero section parallax effect
    window.addEventListener('scroll', function() {
        const scrollPosition = window.pageYOffset;
        const heroSection = document.querySelector('#home');
        heroSection.style.backgroundPositionY = `${scrollPosition * 0.5}px`;
    });
});
