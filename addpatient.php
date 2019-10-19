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

?>
<div class="container">
      <div class='alert alert-info'>
              <strong>Info!</strong> Make sure to take all the details - <?php echo date('m/d/Y h:i:s a', time()); ?>.</div>
      <h3>Enter Information</h3>
                <?php
                  if(isset($_POST['apfullname'])){
                    $i = enter_patient_info($_POST['apfullname'],$_POST['apAge'],$_POST['apweight'],$_POST['apphone_no'],$_POST['apaddress']);
                    appointment_booking($i, $_POST['apSpecialist'], $_POST['apCondition']);
                    unset($_POST['apfullname']); //unset all post variables
                    if (isset($_POST['apfullname'])){
                      echo '<script type="text/javascript">location.reload();</script>';
                    }

                  }
                ?>
            <form action="home.php" method="POST">

            <div class="form-group" >
              <label for="usr">Full Name:</label>
              <input type="text" class="form-control" id="usr" name="apfullname" required>
            </div>

            <div class="form-group">
              <label for="pwd">Age: (in years)</label>
              <input type="number" class="form-control" id="pwd" name="apAge" min="1" max="200" required>
            </div>
            <div class="form-group">
              <label for="pwd">Weight (in kgs):</label>
              <input type="tel" class="form-control" id="pwd" name="apweight" min="1" max="300" required>
            </div>
            <div class="form-group">
              <label for="pwd">Phone No:</label>
              <input type="tel" class="form-control" id="pwd" name="apphone_no" required>
            </div>
            <div class="form-group">
              <label for="pwd">Address:</label>
              <textarea class="form-control" id="pwd" name="apaddress" required></textarea>
            </div>

            <div class="form-group">
          <label for="pwd">Chronic</label>
            <select class='form-control' required value=1 name="dSpecialist">
              <option value="Audiologist" class="option">TB</option>
              <option value="Allergist" class="option">HIV&AIDS</option>
              <option value="Anesthesiologist" class="option">Diabetes</option>
              <option value="Cardiologist" class="option">Hypertension</option>
              <option value="Dentist" class="option">Obesity</option>
              <option value="Dermatologist" class="option">Pregnant Check-Up</option>
              <option value="Endocrinologist" class="option">Children</option>
            </select>
        </div>

            <div class="form-group">
              <label for="pwd">More details</label>
              <textarea class="form-control" id="pwd" name="apCondition" required></textarea>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" >
              <input type="reset" name="" class="btn btn-danger">
            </div>
          </form>
</div>
<?php
  include("footer.php");
?>