<!-- Partners -->
<section class="partners">
    <div class="container">
        <div class="section-header animate-fadeIn">
            <h2 class="section-title">Hiring Partners</h2>
            <p class="section-subtitle">
                We’ve had the opportunity to collaborate with industry like below...
            </p>
        </div>
        <div class="partner-logos">
            <img d-link="https://www.rcreltd.com" src="https://www.rcreltd.com/assets/img/logo.png" title="RCREL" class="partner-logo" />
            <img d-link="https://defence24bd.com" src="https://defence24bd.com/img/logo.jpg" title="defence24bd" class="partner-logo"/>
            <img d-link="https://www.facebook.com/tasteandgobd/" src="https://shorturl.at/fPPQF" title="Test and GO" class="partner-logo" />
            <img d-link="https://www.pranfoods.net" src="https://www.pranfoods.net/sites/default/files/resized_logo.gif" title="Pran Foods" class="partner-logo" />
            <img d-link="https://play.google.com/store/apps/details?id=com.abdurrahman.govtjobsexammcq&hl=en" src="https://play-lh.googleusercontent.com/AMfkIUNNayya3JDN-uPQ0D5kLXldf-Wvy0-ltYtqxLcVfABBKXLhgM3rF9VCIKQ17Drq=s256-rw" title="Job Exam" class="partner-logo"/>
            <img d-link="https://play.google.com/store/apps/details?id=com.tufancoder.agriculture&hl=en" src="https://play-lh.googleusercontent.com/iSRdFeiLiKR6I8URdmtWI-q5Y39VnuDqgLQcPB6JBVn0ttMra_Jj9MkgmLwM2oyklQ=s256-rw" title="AgriXpert" class="partner-logo"/>
            <img d-link="https://www.gadgetngadgetbd.com" src="https://www.gadgetngadgetbd.com/assets/images/backend/logoIcon/67370935616351731660085.png" title="Gadget And Gadget" class="partner-logo" />
        </div>
        <script>
            document.querySelectorAll(".partner-logo").forEach(el => {
                el.addEventListener("click", () => {
                    const link = el.getAttribute("d-link");
                    if (link) {
                        window.open(link, '_blank');
                    }
                });
            });

        </script>
    </div>
</section>