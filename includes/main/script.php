<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Simple animation on scroll
    document.addEventListener("DOMContentLoaded", function () {
    const animatedItems = document.querySelectorAll(".animate-fadeIn");
    
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = "translateY(0)";
                }
            });
        },
        {
            threshold: 0.1,
        }
    );
    
    animatedItems.forEach((item) => {
        item.style.opacity = 0;
        item.style.transform = "translateY(20px)";
        item.style.transition = "opacity 0.6s ease, transform 0.6s ease";
        observer.observe(item);
    });
    });
</script><!-- AOS for scroll animations -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({duration: 1000,once: true,easing: 'ease-out-quad',offset: 120});
</script>