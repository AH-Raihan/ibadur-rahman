<?php
$pattern = "/\/core\//";
if (!isset($_COOKIE['PHPLGA']) && preg_match($pattern, $_SERVER['REQUEST_URI'])) {
  header('location:../index.php');
} else {

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "dt_hostel";

  $conn = mysqli_connect('bybmonngxlfa7u2wi12n-mysql.services.clever-cloud.com', 'u2juhbnhg6f3tqfh', 'UpKlhTpWZBnvXTISX2vh', 'bybmonngxlfa7u2wi12n');
  // $conn= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

  if ($conn == false) {
    echo "<br><h2 style='color:red;'>Database not connected</h2><p>Please message to developer <a href='mailto:web.ahraihan@gmail.com'>Mail :- web.ahraihan@gmail.com</a></p><br>";
  }
}