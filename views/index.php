
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe19.com</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/faq.css">
</head>
<body>
    <?php include 'header.php'; ?>


<div class="slideshow-container">
  <div class="slide">
    <img src="../images/slide1.jpg" alt="Slide 1">
  </div>
  <div class="slide">
    <img src="../images/slide2.jpg" alt="Slide 2">
  </div>
  <div class="slide">
    <img src="../images/slide3.jpg" alt="Slide 2">
  </div>
</div>

<div class="slideshow-container">
  <?php
  $images = ['../images/slide1.jpg', '../images/slide2.jpg', '../images/slide3.jpg'];
  foreach ($images as $image) {
    echo "<div class='slide'><img src='$image' alt='Slide'></div>";
   }
  ?>
</div>

<script src="../js/index.js"></script>

    <div class="content">
        <h1 class="welcome">Welcome to our COVID-19 Vaccination Portal</h1>
        <p class="weldes">This is where you can find information about COVID-19 vaccination, make reservations, and get support.</p>
    </div>

    
    <?php include 'footer.php'; ?>
</body>
</html>
