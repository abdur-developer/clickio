<!-- Hero Section -->
<style>
    :root {
        --primary-light: rgba(0, 174, 239, 0.15);
        --darker: #020617;
        --lighter: #f8fafc;
    }
    
    .hero-section {
        position: relative;
        padding: 2rem 1rem;
        background: linear-gradient(135deg, var(--darker), var(--dark));
        color: white;
        overflow: hidden;
        display: flex;
        align-items: center;
        min-height: 80vh;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 30%, var(--primary-light) 0%, transparent 30%),
            radial-gradient(circle at 80% 70%, rgba(226, 232, 240, 0.1) 0%, transparent 30%);
        z-index: 0;
        animation: pulse 12s infinite alternate;
    }

    @keyframes pulse {
        0% {
            opacity: 0.8;
            transform: scale(1);
        }
        100% {
            opacity: 1;
            transform: scale(1.02);
        }
    }

    .hero-section::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNCI+PHBhdGggZD0iTTAgNDBoNDBWMEgweiIvPjwvZz48L2c+PC9zdmc+') repeat;
        opacity: 0.06;
        z-index: 0;
    }

    .hero-container {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        max-width: 1400px;
        margin: 0 auto;
        width: 100%;
        padding: 0 2rem;
    }

    .hero-content {
        max-width: 600px;
        animation: fadeInUp 1s ease-out;
    }

    .animated-heading {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        line-height: 1.2;
        background: linear-gradient(90deg, #fff, var(--primary));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(0, 174, 239, 0.3);
    }

    .subheading {
        font-size: 1.5rem;
        font-weight: 500;
        margin-bottom: 1.5rem;
        color: #fff;
        display: inline-block;
        position: relative;
    }

    .subheading::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 3px;
        bottom: -5px;
        left: 0;
        background: linear-gradient(90deg, var(--primary), transparent);
        border-radius: 3px;
    }

    .description {
        font-size: 1.1rem;
        margin-bottom: 2.5rem;
        color: #fff;
        max-width: 90%;
        opacity: 0.9;
    }

    .btn-group {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .btn-hero {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: var(--primary);
        color: white;
        padding: 0.9rem 2rem;
        font-weight: 600;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 4px 15px rgba(0, 174, 239, 0.3);
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, var(--primary), var(--primary-dark));
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .btn-hero:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 174, 239, 0.4);
    }

    .btn-hero:hover::before {
        opacity: 1;
    }

    .btn-hero:active {
        transform: translateY(0);
    }

    /* Hero images */
    .hero-images {
        position: relative;
        width: 50%;
        max-width: 600px;
        perspective: 1000px;
    }

    .image-container {
        position: relative;
        width: 100%;
        min-height: 300px;
    }

    .hero-img {
        position: absolute;
        border-radius: 16px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
        transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        object-fit: cover;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.2));
        border: 1px solid rgba(255, 255, 255, 0.1);
        transform-origin: center;
    }

    .img1 {
        width: 55%;
        top: 0;
        left: 0;
        z-index: 3;
        transform: rotate(-5deg);
    }

    .img2 {
        width: 50%;
        top: 20%;
        right: 0;
        z-index: 2;
        transform: rotate(3deg);
    }

    .img3 {
        width: 45%;
        bottom: 10%;
        left: 10%;
        z-index: 1;
        transform: rotate(-2deg);
    }

    .img4 {
        width: 40%;
        bottom: 0;
        right: 10%;
        z-index: 4;
        transform: rotate(5deg);
    }

    .hero-img:hover {
        transform: scale(1.05) rotate(0deg) !important;
        z-index: 10 !important;
        box-shadow: 0 25px 50px -12px rgba(0, 174, 239, 0.25);
        border-color: rgba(0, 174, 239, 0.5);
    }

    /* Floating animation */
    @keyframes float {
        0% {
            transform: translateY(0px) rotate(-5deg);
        }
        50% {
            transform: translateY(-15px) rotate(-5deg);
        }
        100% {
            transform: translateY(0px) rotate(-5deg);
        }
    }

    .img1 {
        animation: float 6s ease-in-out infinite;
    }

    .img2 {
        animation: float 7s ease-in-out infinite 1s;
    }

    .img3 {
        animation: float 5s ease-in-out infinite 0.5s;
    }

    .img4 {
        animation: float 6.5s ease-in-out infinite 1.5s;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .hero-container {
            flex-direction: column;
            text-align: center;
            padding: 0 1.5rem;
        }
        
        .hero-content {
            max-width: 100%;
            margin-bottom: 4rem;
        }
        
        .description {
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-images {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .btn-group {
            justify-content: center;
        }
        
        .subheading::after {
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 1rem;
        }
        
        .animated-heading {
            font-size: 2rem;
        }
        
        .subheading {
            font-size: 1.2rem;
        }
        
        .description {
            font-size: 1rem;
        }
        
        .btn-group {
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .btn-hero {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }
        
        .image-container {
            max-height: 200px;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Glowing orb animation */
    .glow-orb {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0, 174, 239, 0.2) 0%, transparent 70%);
        filter: blur(30px);
        animation: orb-move 15s infinite alternate ease-in-out;
        z-index: 0;
    }

    .glow-orb:nth-child(1) {
        top: -100px;
        left: -100px;
        animation-delay: 0s;
    }

    .glow-orb:nth-child(2) {
        bottom: -50px;
        right: -100px;
        animation-delay: 2s;
    }

    @keyframes orb-move {
        0% {
            transform: translate(0, 0);
        }
        50% {
            transform: translate(50px, 50px);
        }
        100% {
            transform: translate(-30px, -30px);
        }
    }
</style>
<section class="hero-section">
    <div class="glow-orb"></div>
    <div class="glow-orb"></div>
    <div class="hero-container">
        <div class="hero-content">
            <h1 class="animated-heading">
                <span id="typed-text"></span>
            </h1>
            <p class="subheading">Click • Learn • Succeed</p>
            <p class="description">
                Join thousands of learners and get job-ready with industry-relevant courses taught by top experts. Start your journey today with our interactive learning platform.
            </p>
            <div class="btn-group">
                <a href="#" class="btn-hero">Start Learning</a>
                <a href="#" class="btn-hero" style="background: transparent; border: 2px solid var(--primary);">Explore Courses</a>
            </div>
        </div>

        <div class="hero-images">
            <div class="image-container">
                <img src="assets/img/office/1.png" alt="Students learning" class="hero-img img1" data-aos="fade-up" />
                <img src="assets/img/office/3.png" alt="Coding session" class="hero-img img2" data-aos="zoom-in" data-aos-delay="200" />
                <img src="assets/img/office/4.png" alt="Online training" class="hero-img img3" data-aos="fade-left" data-aos-delay="400" />
                <img src="assets/img/office/2.png" alt="Learning center" class="hero-img img4" data-aos="flip-left" data-aos-delay="600" />
            </div>
        </div>
    </div>
</section>
<!-- Typed.js for animated text -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    var typed = new Typed("#typed-text", {
        strings: ["Clickio", "Learn Without Limits", "Grow Your Skills"],
        typeSpeed: 80,
        backSpeed: 40,
        backDelay: 1500,
        loop: true,
        showCursor: true,
        cursorChar: '...',
        smartBackspace: true
    });
</script>