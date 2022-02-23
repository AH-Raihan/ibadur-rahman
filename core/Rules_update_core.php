<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once('config.php');

$rules = $_REQUEST['Rule'];
$length = count($rules);
for ($i=0; $i < $length; $i++) { 
   $id = $i+1;
   $update = "UPDATE rules SET Rule='".$_REQUEST['Rule'][$i]."' WHERE id='$id'";
   $updateQuery=mysqli_query($conn,$update);
}


if($updateQuery==true){
    header('location:../studentRules.php');
}else{
    echo "So Sad! T_T <br>";
    echo "কাঁদ কাঁদ কাঁদলে চোখ পরিস্কার হয় । ";
}
?>