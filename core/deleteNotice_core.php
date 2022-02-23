<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once("config.php");
$id = $_REQUEST['id'];
$delete= "DELETE FROM notice WHERE id='$id'";
$runDelete = mysqli_query($conn,$delete);

if($runDelete==true){
    echo "Deleted Successfully!";
}else{
    echo "Delete Failed!";
}

?>