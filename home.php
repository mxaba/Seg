<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<link href="sytle.css" rel="stylesheet">

<?php 
  include("header.php");
  include("library.php");

  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();

  noAccessIfNotLoggedIn();

  $time = date('m/d/Y h:i:s a', time());
  echo "<div class='alert alert-info'>
          <strong>Info!</strong> $time</div>";
        //    include('slideshow.php');

?>

    
  <div class='hero-content'>
    
  </div>
  <div class='hero-box-container'>
    <a href='addpatient.php' class='hero-box' method = 'POST'>
      <span class='hero-box__circle hero-box__circle--blue'></span>
      <h2 class='hero-box__title'>New Patient</h2>
      <!-- <p class='hero-box__body'>Get instant quote</br> and ship device for free</p> -->
    </a>
    <a href='list_patient.php' class='hero-box'>
     <span class='hero-box__circle hero-box__circle--green'></span>
     <h2 class='hero-box__title'>Existing Patient</h2>
     <!-- <p class='hero-box__body'>Give a second chance</br> to your device</p> -->
    </a>
    <a href='' class='hero-box'>
      <span class='hero-box__circle hero-box__circle--orange'></span>
      <h2 class='hero-box__title'>Updates</h2>
      <!-- <p class='hero-box__body'>Refurbished and lightly used</br> device marketplace</p> -->
    </a>
  </div>
</section>

<?php include("footer.php"); ?>


