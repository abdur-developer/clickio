// Create animated bubbles
function createBubbles() {
    const container = document.querySelector('.bubbles-container');
    const bubbleCount = 20;

    for (let i = 0; i < bubbleCount; i++) {
        const bubble = document.createElement('div');
        const size = Math.random() * 60 + 20; // Random size between 20px and 80px
        const startPosition = Math.random() * 100; // Random starting position
        const animationDuration = Math.random() * 15 + 10; // Random duration between 10-25s
        const delay = Math.random() * -20; // Random start time

        bubble.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${startPosition}vw;
            bottom: -100px;
            background: radial-gradient(circle at 30% 30%, 
                rgba(0, 102, 255, 0.1) 0%, 
                rgba(0, 102, 255, 0.05) 60%, 
                rgba(0, 102, 255, 0.01) 100%);
            border-radius: 50%;
            pointer-events: none;
            animation: floatBubble ${animationDuration}s linear infinite;
            animation-delay: ${delay}s;
        `;

        container.appendChild(bubble);
    }
}

// Add floating bubble animation
const bubbleKeyframes = `
@keyframes floatBubble {
    0% {
        transform: translateY(0) rotate(0deg) scale(1);
        opacity: 0;
    }
    10% {
        opacity: 0.8;
    }
    90% {
        opacity: 0.8;
    }
    100% {
        transform: translateY(-100vh) rotate(360deg) scale(1.2);
        opacity: 0;
    }
}`;

// Add keyframes to document
const styleSheet = document.createElement('style');
styleSheet.textContent = bubbleKeyframes;
document.head.appendChild(styleSheet);

// Navbar functionality
const hamburger = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.mobile-menu');
const closeBtn = document.querySelector('.close-btn');
const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

// Toggle mobile menu
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobileMenu.classList.toggle('active');
});

// Close mobile menu
closeBtn.addEventListener('click', () => {
    hamburger.classList.remove('active');
    mobileMenu.classList.remove('active');
});

// Close mobile menu when clicking a link
mobileNavLinks.forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        mobileMenu.classList.remove('active');
    });
});

// Project Filtering
document.addEventListener('DOMContentLoaded', () => {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons
            filterBtns.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            projectCards.forEach(card => {
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
});

// Testimonials Slider
document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.testimonials-track');
    const cards = document.querySelectorAll('.testimonial-card');
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');
    const dotsContainer = document.querySelector('.slider-dots');

    let currentIndex = 0;
    const totalCards = cards.length;
    
    // Calculate cards per view based on screen width
    function getCardsPerView() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 1200) return 2;
        return 3;
    }

    let cardsPerView = getCardsPerView();
    let totalSlides = Math.ceil(totalCards / cardsPerView);

    // Initialize dots
    function createDots() {
        dotsContainer.innerHTML = '';
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        }
    }

    // Update active dots
    function updateDots() {
        const dots = document.querySelectorAll('.dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    // Update slider position
    function updateSlider() {
        const offset = -(currentIndex * (100 / cardsPerView));
        track.style.transform = `translateX(${offset}%)`;
        updateDots();
        
        // Update button states
        prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextBtn.style.opacity = currentIndex >= totalSlides - 1 ? '0.5' : '1';
        
        // Update active state of cards
        cards.forEach((card, index) => {
            const isInView = index >= currentIndex * cardsPerView && 
                           index < (currentIndex * cardsPerView) + cardsPerView;
            card.classList.toggle('active', isInView);
        });
    }

    // Go to specific slide
    function goToSlide(index) {
        currentIndex = index;
        updateSlider();
    }

    // Next slide
    nextBtn.addEventListener('click', () => {
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
            updateSlider();
        } else {
            // Add bounce effect
            track.style.transform = `translateX(${-(currentIndex * 100 / cardsPerView + 2)}%)`;
            setTimeout(() => {
                track.style.transform = `translateX(${-(currentIndex * 100 / cardsPerView)}%)`;
            }, 150);
        }
    });

    // Previous slide
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSlider();
        } else {
            // Add bounce effect
            track.style.transform = `translateX(2%)`;
            setTimeout(() => {
                track.style.transform = `translateX(0%)`;
            }, 150);
        }
    });

    // Handle window resize
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            const newCardsPerView = getCardsPerView();
            if (newCardsPerView !== cardsPerView) {
                cardsPerView = newCardsPerView;
                totalSlides = Math.ceil(totalCards / cardsPerView);
                currentIndex = 0;
                createDots();
                updateSlider();
            }
        }, 200);
    });

    // Touch events
    let touchStartX = 0;
    let touchEndX = 0;

    track.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
    });

    track.addEventListener('touchmove', (e) => {
        touchEndX = e.touches[0].clientX;
    });

    track.addEventListener('touchend', () => {
        const swipeDistance = touchStartX - touchEndX;
        const minSwipeDistance = 50;

        if (Math.abs(swipeDistance) > minSwipeDistance) {
            if (swipeDistance > 0 && currentIndex < totalSlides - 1) {
                currentIndex++;
            } else if (swipeDistance < 0 && currentIndex > 0) {
                currentIndex--;
            }
            updateSlider();
        }
    });

    // Initialize slider
    createDots();
    updateSlider();
});

// Contact Form Handling
function handleSubmit(event) {
    event.preventDefault();
    
    // Get form data
    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        subject: document.getElementById('subject').value,
        message: document.getElementById('message').value
    };
    
    // Here you would typically send the data to your server
    console.log('Form submitted:', formData);
    
    // Show success message (you can customize this)
    alert('Thank you for your message! We will get back to you soon.');
    
    // Reset form
    event.target.reset();
    
    return false;
}

document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', handleSubmit);
    }
});

// Intersection Observer for section headers
const observerOptions = {
    root: null,
    rootMargin: '-20% 0px', // Trigger when section is 20% in view
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Add visible class with a slight delay for the underline animation
            setTimeout(() => {
                entry.target.classList.add('visible');
            }, 300); // 300ms delay to sync with the slide-up animation
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Add animation class and start observing all section headers
document.querySelectorAll('.section-header').forEach(header => {
    header.classList.add('animate-on-scroll');
    observer.observe(header);
});

// Scroll Animation Handler
function initScrollAnimations() {
    const fadeElements = document.querySelectorAll('.fade-in');
    const staggerElements = document.querySelectorAll('.stagger-fade');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.2
    };
    
    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                scrollObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe fade-in elements
    fadeElements.forEach(element => {
        scrollObserver.observe(element);
    });
    
    // Observe stagger elements
    staggerElements.forEach(element => {
        scrollObserver.observe(element);
    });
}

// Initialize scroll animations when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    initScrollAnimations();
});

// Glass Effect on Scroll
function initGlassEffect() {
    const navbar = document.querySelector('.navbar');
    
    const addGlassEffect = () => {
        if (window.scrollY > 10) {
            navbar.classList.add('glass-effect');
        } else {
            navbar.classList.remove('glass-effect');
        }
    };

    // Add scroll event listener with passive flag for better performance
    window.addEventListener('scroll', addGlassEffect, { passive: true });
    
    // Check initial scroll position
    addGlassEffect();
}

// Initialize glass effect
document.addEventListener('DOMContentLoaded', () => {
    initGlassEffect();
});

// Active Section Highlighting
function initActiveNavigation() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    
    function highlightNavigation() {
        const scrollY = window.scrollY;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionBottom = sectionTop + section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollY >= sectionTop && scrollY < sectionBottom) {
                // Desktop nav
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
                
                // Mobile nav
                mobileNavLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }
    
    // Smooth scroll to section
    function smoothScroll(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
            const offsetTop = targetSection.offsetTop - 80;
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
            
            // Close mobile menu if open
            const mobileMenu = document.querySelector('.mobile-menu');
            const hamburger = document.querySelector('.hamburger');
            if (mobileMenu.classList.contains('active')) {
                mobileMenu.classList.remove('active');
                hamburger.classList.remove('active');
            }
        }
    }
    
    // Add click listeners to all nav links
    navLinks.forEach(link => link.addEventListener('click', smoothScroll));
    mobileNavLinks.forEach(link => link.addEventListener('click', smoothScroll));
    
    // Add scroll listener
    window.addEventListener('scroll', highlightNavigation, { passive: true });
    
    // Check initial position
    highlightNavigation();
}

// Initialize active navigation
document.addEventListener('DOMContentLoaded', () => {
    initActiveNavigation();
});

// Initialize effects when page loads
document.addEventListener('DOMContentLoaded', () => {
    createBubbles();
});
