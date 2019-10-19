<?php
session_start();
?>
<link href="bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<?php 
  include("header.php");
  include("library.php");
  noAccessIfLoggedIn();
?>
<div class="container">

 	<h1>Welcome to Vuselela Clinic</h1>
    <p class="block-quote">Our aim has always been to bring world–class medical care within the reach of the disadvantaged kasi(Townships).</p>
    <p><?php include('slideshow.php');?></p>
  <?php 
    if(isset($_POST['lemail'])){
      $i = login($_POST['lemail'],$_POST['lpassword'],"users");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "add_patient.php" </script>';
      }
    }else if(isset($_POST['remail'])){
      $i = register($_POST['remail'],$_POST['rpassword'],$_POST['rfullname'],"users");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "add_patient.php"</script>';
      }
    }else{
      $time = date('m/d/Y h:i:s a', time());
      echo "<div class='alert alert-info'>
              <strong>Info!</strong> $time</div>";
    }
    unset($_POST);
  ?>
<div class="container">
    
 	<h1 align=center>Admin Login</h1>

    <?php
      if (isset($_POST['email'])){
        $type = $_POST['type'];
        $i = login($_POST['email'],$_POST['password'],$type);
        if ($i == 1){
          noAccessIfLoggedIn();
        }
      }
    ?>

<div class="row">

  <div class="col col-xl-6" align="center">
      
      <form action="hms-staff.php" method="POST">
        <div class="form-group">
          <label for="usr">Employee ID</label>
          <input type="text" class="form-control" name="email" style="width: 500;" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" name="password" style="width: 500;" required>
        </div>
        <div class="form-group">
          <select required value=1 class ='form-control' name="type" style="width: 500;">
                <option value="admin" class="option">Admin</option>
                <option value="clerks" class="option">Clerk</option>
                <option value="doctors" class="option">Doctor</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
          <input type="reset" name="" class="btn btn-danger">
        </div>
          
      </form>
  </div>
        
</div>
</div>

<?php include("footer.php"); ?>


