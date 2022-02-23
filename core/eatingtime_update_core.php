<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once('config.php');


   $update = "UPDATE eatingtime SET morning='".$_REQUEST['morning']."', noon='".$_REQUEST['noon']."', night='".$_REQUEST['night']."' WHERE id='".$_REQUEST['id']."'";
   $updateQuery=mysqli_query($conn,$update);





if($updateQuery==true){
    header('location:../eatingtime.php');
}else{
    echo "So Sad! T_T <br>";
    echo "কাঁদ কাঁদ কাঁদলে চোখ পরিস্কার হয় । ";
}
?>