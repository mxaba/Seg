<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Vuselela Clinic
    </title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
      <div class="container" style="padding-top: 10px;">
        <nav class="navbar  navbar-static-top">
          <a href="home.php" class="navbar-brand">Vuselela Clinic</a>
            <ul class="nav nav-pills">
              <li class="nav-item">
              <!-- <  a href="https://goo.gl/maps/PyT52gM87su" target="_blank"> Address: Plot no- 1, Opposite SBI, Sector 12, Kharghar, Navi Mumbai</a> -->
              </li>
              <li class="nav-item">
              <?php  if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item" style="align-items: right;"> <form action="logout.php" ">
                    <input type="submit" value="Logout"></form></a> 
                  </li>';
                  echo '<li class="nav-item" style="align-items: right;"><form action="" method="POST">
                  <input type="submit" value="Send">
              </form></a> 
                  </li>'; ?>
              </li>
              <?php
               
                }

                if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

                  $account = '931246';
                  $username = '1b57ef6b950b4fc6dbae960a662e25f815ca4057';
                  $password = 'ba5dcf52c2a8a9d24dcf0998dd7da3a0b2c35890';
                  $from = '447537149246';
                  $to = '27670062938';
                  $message = 'Hey there! a quick reminder tomorrow its your check up date and you have to pick up your medication. Thanks';
          
                  $postData = array(
                      'to' => $to,
                      'from' => $from,
                      'message' => $message
                  );
          
                  $ch = curl_init('https://api.simwood.com/v3/messaging/'.$account.'/sms');
                  curl_setopt_array($ch, array(
                      CURLOPT_POST => TRUE,
                      CURLOPT_RETURNTRANSFER => TRUE,
                      CURLOPT_POSTFIELDS => json_encode($postData),
                      CURLOPT_USERPWD => $username.':'.$password
                  ));
          
                  $response = curl_exec($ch);
          
                  ?> <?php if($response === FALSE) {
?>                    <script type="text/javascript"> 
                    alert('Failed!'); 
                </script><?php 
                  } else { ?>
                      <script type="text/javascript"> 
                    alert('Success'); 
                </script><?php
                  }
          
              }
          ?>
            </ul>
        </nav>
        </div>
