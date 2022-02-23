<?php 

$id = $_REQUEST['id'];
$status = $_REQUEST['status'];

require_once('config.php');

$select = "UPDATE students SET status='$status' WHERE id='$id';";
$select .= "UPDATE fees SET status='$status' WHERE student_id='$id'";

$run  = mysqli_multi_query($conn,$select);

if($run==true){
    echo "successfully updated!";
}else{
    echo "Somting Is Wrong!";
}