<!-- Navbar -->
<style>
    /* Navbar */
    .navbar {
        background-color: #fff;
        transition: all 0.3s ease;
        z-index: 1000;
        padding: 0;
    }

    .navbar-brand img {
        height: 48px;
        transition: transform 0.3s ease;
    }
    .navbar-brand:hover img {
        transform: scale(1.05);
    }

    .nav-link {
        position: relative;
        color: var(--dark) !important;
        font-weight: 500;
        margin: 0 0.9rem;
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 0%;
        height: 2px;
        background-color: var(--primary);
        transition: width 0.3s ease;
        border-radius: 4px;
    }

    .nav-link:hover {
        color: var(--primary) !important;
    }
    .nav-link:hover::after {
        width: 100%;
    }

    /* Buttons */
    .btn {
        border-radius: 6px;
        padding: 0.45rem 1.1rem;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .btn-login {
        background-color: transparent;
        color: var(--primary);
        border: 1px solid var(--primary);
    }
    .btn-login:hover {
        background-color: var(--primary);
        color: #fff;
    }

    .btn-signup {
        background-color: var(--primary);
        color: #fff;
        border: 1px solid var(--primary);
    }
    .btn-signup:hover {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    /* Mobile spacing */
    @media (max-width: 991.98px) {
        .navbar-nav .nav-link {
            margin: 0.5rem 0;
        }
        .d-flex.gap-2 {
            flex-direction: column;
            gap: 0.5rem !important;
            margin-top: 1rem;
        }
    }
</style>
<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="assets/img/logo.png" alt="Clickio" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Career</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <div class="d-flex ms-lg-4 gap-2">
            <button class="btn btn-login">Log In</button>
            <button class="btn btn-signup">Sign Up</button>
        </div>
    </div>
    </div>
</nav>