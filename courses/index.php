<!-- Courses Section -->
<section class="courses" id="courses">
    <div class="container">
        <div class="row g-4">
            
            <?php 
            $courses = [
                [
                    'id' => 'office_application',
                    'img' => 'assets/img/office_application.png',
                    'alt' => 'Office Application',
                    'title' => 'Computer Basic & Office Application',
                    'joined' => 15,
                    'lessons' => 40,
                    'duration' => '3 Months',
                    'desc' => 'Computer Fundamental, Microsoft Word, Excel, Powerpoint, Email & Internet Browsi...',
                    'old_price' => '৳4500',
                    'price' => '৳3500',
                ],
                [
                    'id'=> 'graphics_design',
                    'img' => 'assets/img/graphics.png',
                    'alt' => 'Graphics Design',
                    'title' => 'Graphics Design with Freelancing',
                    'joined' => 19,
                    'lessons' => 40,
                    'duration' => '3 Months',
                    'desc' => 'Adobe Photoshop, Illustrator, XD, AI Education, Clients Hunting, Spoken English',
                    'old_price' => '৳8000',
                    'price' => '৳7000',
                ],
                [
                    'id'=> 'web_design',
                    'img' => 'assets/img/coading.png',
                    'alt' => 'Website Design',
                    'title' => 'Web Design with Freelancing',
                    'joined' => 13,
                    'lessons' => 40,
                    'duration' => '3.5 Months',
                    'desc' => 'HTML, CSS (Bootstrap), JavaScript, AI Education, Clients Hunting,, Spoken English',
                    'old_price' => '৳9000',
                    'price' => '৳7000',
                ],
            ];

            foreach ($courses as $course): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <div class="position-relative">
                            <img src="<?= htmlspecialchars($course['img']) ?>" class="card-img-top" alt="<?= htmlspecialchars($course['alt']) ?>"/>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                            <div class="course-meta">
                                <span><i class="fas fa-user-graduate me-1"></i> <?= $course['joined'] ?> Joined</span>
                                <span><i class="fas fa-book me-1"></i> <?= $course['lessons'] ?> Lessons</span>
                                <span><i class="fas fa-clock me-1"></i> <?= htmlspecialchars($course['duration']) ?></span>
                            </div>
                            <p class="card-text"><?= htmlspecialchars($course['desc']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <del class="course-price-del"><?= htmlspecialchars($course['old_price']) ?></del>
                                    <div class="course-price"><?= htmlspecialchars($course['price']) ?></div>
                                </div>
                                <a href="courses/details.php?course=<?= htmlspecialchars($course['id']) ?>" class="btn btn-primary">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>