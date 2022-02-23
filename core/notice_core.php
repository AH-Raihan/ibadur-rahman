<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once("config.php");
$title = $_REQUEST['title'];
$date = date('d')." ". date('F'). " ". date('Y') ." (". date('g') .":". date('i')." ". date('A').")";
$insertNotice = "INSERT INTO notice (title, date) VALUES('$title','$date')";
$runInsertNotice = mysqli_query($conn,$insertNotice);
if($runInsertNotice==true){
    echo "Successfully Added!";
}else{
    echo "Something is wrong!";
}
