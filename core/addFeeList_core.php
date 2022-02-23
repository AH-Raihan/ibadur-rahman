<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once('config.php');

$studentId= $_REQUEST['studentId'];
$class= $_REQUEST['class'];
$studentName= $_REQUEST['studentName'];
$year = date('Y');

$selectFees="SELECT * FROM fees WHERE student_id='$studentId' AND year='$year'";
$selectFeesQuery=mysqli_query($conn,$selectFees);

$count = mysqli_num_rows($selectFeesQuery);
if($count===0){
    $insertFeeList="INSERT INTO fees (student_id, class, Name, year) VALUES('$studentId','$class','$studentName','$year')";
    $runFeeListMakeQuery=mysqli_query($conn,$insertFeeList);
    if($runFeeListMakeQuery==true){
        header("location:../studentPaymentList.php?studentId=$studentId");
    }else{
        header("location:../studentPaymentList.php?studentId=$studentId");
    }
}else{
    header("location:../studentPaymentList.php?studentId=$studentId");
}

?>