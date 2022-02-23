<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once('config.php');

for ($i=0; $i < 8; $i++) { 
   
   $update = "UPDATE study_routine SET day='".$_REQUEST['day'][$i]."', morning='".$_REQUEST['morning'][$i]."', noon='".$_REQUEST['noon'][$i]."', night='".$_REQUEST['night'][$i]."' WHERE id='".$_REQUEST['id'][$i]."'";
   $updateQuery=mysqli_query($conn,$update);
}




if($updateQuery==true){
    header('location:../studyRoutine.php');
}else{
    echo "So Sad! T_T <br>";
    echo "কাঁদ কাঁদ কাঁদলে চোখ পরিস্কার হয় । ";
}
?>