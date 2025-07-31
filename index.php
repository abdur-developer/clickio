<!DOCTYPE html>
<html lang="en" data-wf-page="8801709409266">   
   <?php include 'includes/main/head.php'; ?>
   <body>      
      <?php
         include 'includes/main/nav.php';

         if(isset($_GET['q']) && !empty($_GET['q'])){
            $q = $_GET['q'];
            if($q == 'all_courses'){
               include 'courses/index.php';
            }
         }else{
            include 'includes/main/marqee.php';
            include 'includes/main/hero.php';
            include 'includes/main/statistics.php';
            include 'includes/main/course.php';
            include 'includes/main/testimonials.php';
            include 'includes/main/partners.php';
            include 'includes/main/contact.php';
         }

         include 'includes/main/footer.php';
         include 'includes/main/script.php';
      ?>
   </body>
</html>