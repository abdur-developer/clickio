<!-- Courses Section -->
<section class="courses" id="courses">
    <div class="container">
        <div class="row g-4">
            
            <?php 
            $courses = mysqli_query($conn, "SELECT * FROM course");

            while ($course = mysqli_fetch_assoc($courses)): ?>
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
                            <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <del class="course-price-del">৳<?= htmlspecialchars($course['old_price']) ?></del>
                                    <div class="course-price">৳<?= htmlspecialchars($course['price']) ?></div>
                                </div>
                                <a href="courses/details.php?course=<?= htmlspecialchars($course['url_hint']) ?>" class="btn btn-primary">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>