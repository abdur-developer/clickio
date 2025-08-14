<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    
    <link rel="stylesheet" href="../assets/css/details.css">
</head>
<body>
    <?php
        include '../db/config.php';
        $get_hint = $_GET['course'] ?? '';

        $sql = "SELECT * FROM course WHERE url_hint = '$get_hint'";
        $course = mysqli_fetch_assoc(mysqli_query($conn, $sql));

        ?>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="enrolled-count">
                    <i class="fas fa-users"></i>
                    <span><?=$course['joined']?> Students Enrolled</span>
                </div>
                <h1 class="course-title"><?=$course['title']?></h1>
                <p class="course-description"><?=$course['description']?></p>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Tabs -->
                    <div class="tab-container">
                        <div class="tab active" data-tab="curriculum">কোর্স পাঠ্যক্রম</div>
                        <div class="tab" data-tab="overview">কোর্স ওভারভিউ</div>
                        <!-- <div class="tab" data-tab="instructor">প্রশিক্ষক</div>
                        <div class="tab" data-tab="reviews">কোর্স রিভিউ</div> -->
                    </div>
                    
                    <!-- Tab Contents -->
                    <div class="tab-content active" id="curriculum">
                        <!-- Curriculum Section -->
                        <div class="section-header">
                            <h2 class="section-title">কোর্স পাঠ্যক্রম</h2>
                        </div>
                        
                        <div class="course-stats">
                            <div class="course-stat">
                                <i class="fas fa-list-ul"></i>
                                <span><?= $course['section'] ?> সেকশন</span>
                            </div>
                            <div class="course-stat">
                                <i class="fas fa-play-circle"></i>
                                <span><?= $course['lessons'] ?> লেকচার</span>
                            </div>
                        </div>
                        <div class="accordion" id="courseAccordion">
                            <?php
                                $sql = "SELECT * FROM course_module WHERE course_id = '{$course['id']}'";
                                $result_module = mysqli_query($conn, $sql);
                                while ($course_module = mysqli_fetch_assoc($result_module)) { ?>
                                    <!-- ================================================== -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section1">
                                                <div class="section-header-inner">
                                                    <h3 class="section-title-text"><?=$course_module['title']?></h3>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="section1" class="accordion-collapse collapse" data-bs-parent="#courseAccordion">
                                            <div class="accordion-body p-0">
                                                <ul class="lecture-list">
                                                    <!-- ////////////////////////////////////////////////////////// -->
                                                    <?php
                                                        $sql = "SELECT * FROM module_details WHERE module_id = '{$course_module['id']}'";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($module_details = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <li class="lecture-item">
                                                        <div class="lecture-icon">
                                                            <i class="fas fa-play-circle"></i>
                                                        </div>
                                                        <div class="lecture-content">
                                                            <div class="lecture-title"><?=$module_details['title']?></div>
                                                        </div>
                                                        <?php
                                                            echo "<i class='fas fa-lock lecture-status'></i>";
                                                        ?>                                          
                                                    </li>
                                                    <?php } ?>
                                                    <!-- ////////////////////////////////////////////////////////// -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ================================================== -->
                            <?php } ?>
                        </div>                    
                    </div>
                    
                    <!-- Overview Tab Content (hidden by default) -->
                    <div class="tab-content" id="overview" style="display: none;">
                        <div class="section-header">
                            <h2 class="section-title">কোর্স ওভারভিউ</h2>
                        </div>
                        <div class="course-overview"><?=$course['overview']?></div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="course-sidebar">                        
                        <h3 class="includes-title">এই কোর্সে যা পাচ্ছেন :</h3>
                        <ul class="includes-list">
                            <?php 
                                $decoded = json_decode($course['ki_thakbe'], true);
                                foreach ($decoded as $item) {
                            ?>
                            <li class="includes-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span><?=$item?></span>
                            </li>
                            <?php } ?>
                        </ul>
                        
                        <div class="price-container">
                            <span class="current-price"><?=$course['price']?>৳</span>
                            <span class="original-price"><?=$course['old_price']?>৳</span>
                        </div>
                        
                        <a class="btn-enroll" href = 'https://api.whatsapp.com/send/?phone=8801750074990&text=<?=$course['title']?>&type=phone_number&app_absent=0'>
                            <i class="fas fa-arrow-right-to-bracket me-2"></i>এনরোল করুন
                        </a>
                        
                        <div class="share-title">কোর্স শেয়ার করুন</div>
                        <div class="share-buttons">
                            <a href="#" class="share-button copy">
                                <i class="fas fa-link"></i>
                            </a>
                            <a href="#" class="share-button facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="share-button twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="share-button email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="#" class="share-button whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Enroll Button -->
        <div class="mobile-enroll d-lg-none">
            <div class="mobile-price">
                <span class="current"><?= $course['price']?>৳</span>
                <span class="original"><?=$course['old_price']?>৳</span>
            </div>
            <a class="btn-mobile-enroll" href='https://api.whatsapp.com/send/?phone=8801750074990&text=<?=$course['title']?>&type=phone_number&app_absent=0'>এনরোল করুন</a>
        </div>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Auto-expand first section
                const firstSection = document.querySelector('.accordion-item');
                if (firstSection) {
                    const collapse = new bootstrap.Collapse(firstSection.querySelector('.accordion-collapse'));
                    collapse.show();
                }
                
                // Tab functionality
                const tabs = document.querySelectorAll('.tab');
                const tabContents = document.querySelectorAll('.tab-content');
                
                tabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        // Remove active class from all tabs
                        tabs.forEach(t => t.classList.remove('active'));
                        
                        // Add active class to clicked tab
                        this.classList.add('active');
                        
                        // Hide all tab contents
                        tabContents.forEach(content => {
                            content.style.display = 'none';
                        });
                        
                        // Show the corresponding tab content
                        const tabId = this.getAttribute('data-tab');
                        document.getElementById(tabId).style.display = 'block';
                    });
                });
                
                // Copy link functionality
                const copyButton = document.querySelector('.share-button.copy');
                if (copyButton) {
                    copyButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        const url = window.location.href;
                        navigator.clipboard.writeText(url).then(() => {
                            alert('লিংক কপি করা হয়েছে!');
                        });
                    });
                }
            });
        </script>
</body>
</html>