<?php
// connect
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once('config.php');

$id = $_REQUEST['id'];
$nameBn = $_REQUEST['nameBn'];
$name = $_REQUEST['name'];
$fathername = $_REQUEST['fathername'];
$mothername = $_REQUEST['mothername'];
$fathermobile = $_REQUEST['fathermobile'];
$mothermobile = $_REQUEST['mothermobile'];
$studentmobile = $_REQUEST['studentmobile'];
$mobile_imo = $_REQUEST['mobile_imo'];
$address = $_REQUEST['address'];
$dateOfBirth = $_REQUEST['dateOfBirth'];
$class = $_REQUEST['class'];
$division = $_REQUEST['division'];
$section = $_REQUEST['section'];
$roll = $_REQUEST['roll'];
$tmCode = $_REQUEST['tmCode'];
$tmPin = $_REQUEST['tmPin'];
$joinDate = $_REQUEST['joinDate'];

$update="UPDATE students SET nameBn='$nameBn', name='$name', father_name='$fathername', mother_name='$mothername', mobile_father='$fathermobile', mobile_mother='$mothermobile', mobile_student='$studentmobile', mobile_imo='$mobile_imo', address='$address', dateOfBirth='$dateOfBirth', class='$class', subject='$division', section='$section', roll='$roll', tmCode='$tmCode', tmPin='$tmPin', date_of_join='$joinDate' WHERE id='$id'";
$runUpdateQuery=mysqli_query($conn,$update);

if($runUpdateQuery==true){
    header('location:../studentsList.php');
}else{
    header('location:../studentEditForm.php?wrong');
}
?>