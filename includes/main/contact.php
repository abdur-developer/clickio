<!-- Contact Section -->
<style>
    :root{
    --primary-blue: #0066ff;
    --secondary-blue: #4d94ff;
    --light-blue: #e5efff;
    --white: #ffffff;
    --text-dark: #2c3e50;
    --text-light: #7f8c8d;
    }
    /* Contact Section Styles */
    .contact-section {
    padding: 100px 0;
    background: linear-gradient(135deg, var(--white) 0%, var(--light-blue) 100%);
    position: relative;
    overflow: hidden;
    }

    .contact-container {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 50px;
    margin-top: 50px;
    position: relative;
    z-index: 1;
    }

    /* Contact Info Styles */
    .contact-info {
    background: var(--white);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 102, 255, 0.1);
    display: flex;
    flex-direction: column;
    gap: 30px;
    }

    .info-card {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 15px;
    }

    .info-card h3 {
    font-size: 1.2rem;
    color: var(--text-dark);
    margin: 0;
    }

    .info-card p {
    font-size: 1rem;
    color: var(--text-light);
    margin: 0;
    }

    /* Contact Form Styles */
    .contact-form {
    background: var(--white);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 102, 255, 0.1);
    }

    .form-group {
    position: relative;
    margin-bottom: 30px;
    }

    .form-group input,
    .form-group textarea {
    width: 100%;
    padding: 15px;
    border: 2px solid var(--light-blue);
    border-radius: 10px;
    background: transparent;
    outline: none;
    font-size: 1rem;
    color: var(--text-dark);
    transition: all 0.3s ease;
    }

    .form-group textarea {
    height: 150px;
    resize: none;
    }

    .form-group label {
    position: absolute;
    left: 15px;
    top: 15px;
    color: var(--text-light);
    pointer-events: none;
    transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
    border-color: var(--primary-blue);
    }

    .form-group input:focus ~ label,
    .form-group textarea:focus ~ label,
    .form-group input:valid ~ label,
    .form-group textarea:valid ~ label {
    top: -12px;
    left: 10px;
    font-size: 0.85rem;
    padding: 0 5px;
    background: var(--white);
    color: var(--primary-blue);
    }

    .submit-btn {
    width: 100%;
    padding: 15px 30px;
    background: var(--primary-blue);
    color: var(--white);
    border: none;
    border-radius: 10px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
    }

    .submit-btn:hover {
    background: var(--secondary-blue);
    transform: translateY(-2px);
    }

    .submit-btn i {
    transition: all 0.3s ease;
    }

    .submit-btn:hover i {
    transform: translateX(5px);
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
    .contact-container {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .contact-info {
        padding: 30px;
    }
    
    .contact-form {
        padding: 30px;
    }
    }

    @media (max-width: 768px) {
    .contact-section {
        padding: 60px 0;
    }
    
    .info-card {
        align-items: center;
        text-align: center;
    }
    
    .form-group input, .form-group textarea {
        padding: 12px;
        font-size: 0.95rem;
    }
    
    .submit-btn {
        padding: 12px 25px;
        font-size: 1rem;
    }
    }

    @media (max-width: 480px) {
    .contact-info,
    .contact-form {
        padding: 20px;
    }
    }

</style>
<section class="contact-section" id="contact">
    <div class="con-container">
        <div class="section-header animate-on-scroll" style="max-width: 100%;">
            <h2 style="background: black;color: white;padding: 10px;">Get in Touch</h2>
            <p>Let's discuss your project and bring your ideas to life</p>
        </div>

        <div class="contact-container">
            <div class="contact-info stagger-fade fade-in">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d216.06216407402198!2d88.89631365608835!3d25.781964351821717!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e35100749f5a01%3A0xa188497cdde6a662!2sClickio!5e1!3m2!1sen!2sbd!4v1753798460692!5m2!1sen!2sbd" style="border:0; width: 100%; height: 100%; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="contact-form fade-in">
                <form method="post" name="contact"><input type="hidden" name="form-name" value="contact">
                    <div class="form-group">
                        <input type="text" id="name" name="name" required="">
                        <label for="name">Your Name</label>
                        <span class="focus-border"></span>
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" required="">
                        <label for="email">Your Email</label>
                        <span class="focus-border"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" id="subject" name="subject" required="">
                        <label for="subject">Subject</label>
                        <span class="focus-border"></span>
                    </div>

                    <div class="form-group">
                        <textarea id="message" name="message" required=""></textarea>
                        <label for="message">Your Message</label>
                        <span class="focus-border"></span>
                    </div>

                    <button type="submit" class="submit-btn">
                        <span>Send Message</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- WhatsApp Button -->
<style>
    /* WhatsApp Button Styles */
    .whatsapp-btn {
        position: fixed;
        bottom: 25px;
        right: 25px;
        display: flex;
        align-items: center;
        background: #25D366;
        color: white;
        border-radius: 50px;
        padding: 8px 20px 8px 12px;
        font-weight: 500;
        font-size: 0.9rem;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 999;
    }

    .whatsapp-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
    }

    .whatsapp-icon {
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 8px;
    }

    .whatsapp-icon i {
        font-size: 1.2rem;
    }

    .whatsapp-text {
        margin-right: 5px;
    }

    /* WhatsApp Button Animation */
    @keyframes whatsappPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }

    .whatsapp-btn {
        animation: whatsappPulse 2s infinite;
    }

    /* Responsive Styles for WhatsApp Button */
    @media (max-width: 768px) {
        .whatsapp-btn {
            bottom: 20px;
            right: 20px;
            padding: 8px;
            font-size: 0.9rem;
        }

        .whatsapp-icon {
            width: 30px;
            height: 30px;
        }

        .whatsapp-icon i {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        .whatsapp-btn {
            padding: 8px;
            border-radius: 50%;
        }

        .whatsapp-text {
            display: none;
        }

        .whatsapp-icon {
            margin-right: 0;
        }
    }

    /* Add hover pause for animation */
    .whatsapp-btn:hover {
        animation-play-state: paused;
    }
</style>
<a href="https://wa.me/+8801750074990" class="whatsapp-btn" target="_blank" rel="noopener noreferrer"
    aria-label="Chat on WhatsApp">
    <div class="whatsapp-icon">
        <i class="fab fa-whatsapp"></i>
    </div>
    <span class="whatsapp-text">Chat with us</span>
</a>