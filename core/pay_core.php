<?php
if(!isset($_COOKIE['PHPLGA'])){
  header('location:../login.php');
}
require_once('config.php');

$reciept= random_int(0000, 9999) +0000;
$payRecieptNo= $_REQUEST['payRecieptNo'];
$studentId= $_REQUEST['studentid'];

$studentName = $_REQUEST['studentName'];
$payDate = $_REQUEST['payDate'];
$payStudentClass = $_REQUEST['payStudentClass'];
$payMonth = $_REQUEST['payMonth'];
$payYear = $_REQUEST['payYear'];
$payaddmission_form = $_REQUEST['payaddmission_form'];
$payaddmission_fee = $_REQUEST['payaddmission_fee'];
$payadvance = $_REQUEST['payadvance'];
$paysongsthapon = $_REQUEST['paysongsthapon'];
$paytiuson = $_REQUEST['paytiuson'];
$payogrim_bokeya = $_REQUEST['payogrim_bokeya'];
$paybibid = $_REQUEST['paybibid'];
$paytotal = $_REQUEST['paytotal'];
$payjoma = $_REQUEST['payjoma'];
$paybokeya = $_REQUEST['paybokeya'];



if($paybokeya>0){
    $reciept= "--".$reciept; 
}elseif(preg_match("/\-\-[0-9]/",$payRecieptNo)){
    $reciept= "==".$reciept; 
}
if($payjoma>0){
$insertQuery="INSERT INTO receipt (reciept_no, student_id, studentName, date, class, month, year, addmission_form, addmission_fee, advance, songsthapon, tiuson, ogrim_bokeya, bibid, total, joma, bokeya) VALUES ('$reciept','$studentId','$studentName','$payDate','$payStudentClass','$payMonth','$payYear','$payaddmission_form','$payaddmission_fee','$payadvance','$paysongsthapon','$paytiuson','$payogrim_bokeya','$paybibid','$paytotal','$payjoma','$paybokeya')";
$runInsertQuery=mysqli_query($conn,$insertQuery);

if($runInsertQuery==true){
    

    $insertFeeListQuery="UPDATE fees SET $payMonth='$reciept'  WHERE student_id='$studentId'";
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
   echo "টাকা জমার পরিমাণ ০ টাকা"; 
}
?>

 