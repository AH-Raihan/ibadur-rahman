<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
if (isset($_REQUEST['flat']) && isset($_REQUEST['name'])) {

    require_once('config.php');

    $flat = $_REQUEST['flat'];
    $name = $_REQUEST['name'];

    $year = date('Y');
    $month = date('n');
    $date = date('j') . "/" . $month . "/" . $year;

    $insert = "INSERT INTO bills(flat,name,year,date) VALUES('$flat','$name','$year','$date')";
    $runInsertQuery = mysqli_query($conn, $insert);

    if($runInsertQuery==true){
        echo "Succesfully Added New Bill";
    }else{
        echo "Failed To Add New Bill";
    }
} else {
    header('location:../index.php');
}
