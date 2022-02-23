<?php
if (!isset($_COOKIE['PHPLGA'])) {
    header('location:login.php');
}
require_once('config.php');

$reciept= random_int(0000, 9999) +0000;
$id= $_REQUEST['id'];
// $payRecieptNo= $_REQUEST['payRecieptNo'];
$name= $_REQUEST['name'];
$payDate= $_REQUEST['date'];
$payMonth= $_REQUEST['month'];
$payYear= $_REQUEST['year'];
$paytotal= $_REQUEST['paytotal'];
$payjoma= $_REQUEST['payjoma'];
$paybokeya= $_REQUEST['paybokeya'];

if($paybokeya>0){
    $reciept= "--".$reciept; 
}
// elseif(preg_match("/\-\-[0-9]/",$payRecieptNo)){
//     $reciept= "==".$reciept; 
// }
if($payjoma>0){
$insertQuery="INSERT INTO receipt (reciept_no, type, student_id, studentName, date, month, year, total, joma, bokeya) VALUES ('$reciept','bill','$id','$name','$payDate','$payMonth','$payYear','$paytotal','$payjoma','$paybokeya')";
$runInsertQuery=mysqli_query($conn,$insertQuery);

if($runInsertQuery==true){
    

    $insertFeeListQuery="UPDATE bills SET $payMonth='$reciept'  WHERE id='$id'";
    $runFeeListQuery=mysqli_query($conn,$insertFeeListQuery);

    if($runFeeListQuery==true){
        echo "Successfully Paid";
    }else{
        echo "Something is wrong!";
    }
}else{
    echo "Something is wrong!";
}}
else{
   echo "টাকা জমার পরিমাণ ০"; 
}


?>