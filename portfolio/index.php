<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Portfolio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --dark-color: #212529;
            --light-color: #f8f9fa;
        }
        
        body {
            background-color: var(--light-color);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--dark-color);
        }
        
        .portfolio-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        
        .section-title {
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
        .portfolio-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            background: white;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .portfolio-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.15);
        }
        
        .portfolio-card img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .portfolio-card:hover img {
            transform: scale(1.05);
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .project-category {
            display: inline-block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary-color);
            background-color: rgba(67, 97, 238, 0.1);
            padding: 4px 12px;
            border-radius: 50px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }
        
        .service-icon {
            font-size: 1.2rem;
            color: var(--primary-color);
            margin-right: 8px;
            vertical-align: middle;
        }
        
        .portfolio-filter {
            margin-bottom: 40px;
        }
        
        .filter-btn {
            border: none;
            background: none;
            font-weight: 600;
            color: var(--dark-color);
            padding: 8px 20px;
            margin: 0 5px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .filter-btn.active, .filter-btn:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .portfolio-card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <section class="portfolio-section">
        <div class="container">
            <h2 class="section-title text-center">Our Portfolio</h2>
            
            <div class="portfolio-filter text-center mb-5">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <button class="filter-btn" data-filter="website">Website Development</button>
                <button class="filter-btn" data-filter="app">App Development</button>
                <button class="filter-btn" data-filter="graphics">Graphics Design</button>
            </div>
            
            <div class="row g-4 portfolio-container">

                <?php
                    include '../db/config.php';

                    $portfolio = mysqli_query($conn, "SELECT * FROM portfolio");

                    while($row = mysqli_fetch_assoc($portfolio)) { ?>
                        <div class="col-lg-4 col-md-6 portfolio-item" data-category="<?= $row['type'] == 0 ? 'website' : ($row['type'] == 1 ? 'app' : 'graphics') ?>">
                            <div class="card portfolio-card">
                                <img src="../admin/upload/<?=$row['img']?>" class="card-img-top" alt="<?=$row['title']?>">
                                <div class="card-body">
                                    <span class="project-category"><i class="fas <?= $row['type'] == 0 ? 'fa-globe' : ($row['type'] == 1 ? 'fa-mobile-alt' : 'fa-paint-brush') ?> service-icon"></i><?= $row['type'] == 0 ? 'Website Development' : ($row['type'] == 1 ? 'App Development' : 'Graphics Design') ?></span>
                                    <h5 class="card-title"><?=$row['title']?></h5>
                                    <p class="card-text text-muted"><?=$row['description']?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                ?>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter portfolio items
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const portfolioItems = document.querySelectorAll('.portfolio-item');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    
                    const filterValue = button.getAttribute('data-filter');
                    
                    // Filter items
                    portfolioItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>