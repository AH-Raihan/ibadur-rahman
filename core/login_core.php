<?php
// connect
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "dt_hostel";

  $conn = mysqli_connect('bybmonngxlfa7u2wi12n-mysql.services.clever-cloud.com', 'u2juhbnhg6f3tqfh', 'UpKlhTpWZBnvXTISX2vh', 'bybmonngxlfa7u2wi12n');
  // $conn= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

  if ($conn == false) {
    echo "Database not connected";
  }

if (isset($_REQUEST['username']) && isset($_REQUEST['userpassword'])) {


    $loginUser = md5(sha1($_REQUEST['username']));
    $loginPassword = md5(sha1($_REQUEST['userpassword']));

    $selectAdmin = "SELECT * FROM `admin` WHERE `username`='$loginUser' AND `userpassword`='$loginPassword'";
    $runAdminQuery = mysqli_query($conn, $selectAdmin);

    $count = mysqli_num_rows($runAdminQuery);
    if ($count === 1) {
        echo $auth = md5(sha1("AHR" . $loginUser . $loginPassword));
        setcookie('PHPLGA', $auth, time() + (86400 * 30), "/");
        header('location:../index.php');
    } else {
        header('location:../login.php?wrong');
    }
} else {
    header('location:../login.php?wrong');
}
