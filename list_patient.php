<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<link href="table.css" rel="stylesheet">

<?php 
  include("header.php");
  include("library.php");

  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();

  noAccessIfNotLoggedIn();

$result = getAllAppointments();

echo    "<table>
    <tr>
      <th>Full-Name</th>
      <th>DOB</th>
      <th>Weight</th>
      <th>Cell</th>
      <th>Address</th>
      <th>Chronic</th>
      <th>Details</th>
      <th>Dates</th>
    </tr>";

while($row = $result -> fetch_array()){   //Creates a loop to loop through results
    $t = $row['full_name'];
    $DOB = $row['DOB'];
    $w = $row['weight'];
    $p = $row['phone_no'];
    $ad = $row['address'];
    $Ch = $row['speciality'];
    $d = $row['Details'];
    $da = $row['date'];
   echo "<tr>
        <td>$t</td>
        <td>$DOB</td>
        <td>$w</td>
        <td>$p</td>
        <td>$ad</td>
        <td>$Ch</td>
        <td>$d</td>
        <td>$da</td>";

}
  echo "</table>";
  
    // echo "<tr><td>" . $row['full_name'] . "</td></tr><tr><td>" . $row['DOB'] . "</td></tr>" . $row['weight'] . "</td></tr>" . $row['phone_no'] . "</td></tr>" . $row['address'] . "</td></tr><br>";


include("footer.php"); ?>