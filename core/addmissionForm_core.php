<?php
// connect
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
  $conn = mysqli_connect('bybmonngxlfa7u2wi12n-mysql.services.clever-cloud.com', 'u2juhbnhg6f3tqfh', 'UpKlhTpWZBnvXTISX2vh', 'bybmonngxlfa7u2wi12n');
//   $conn = mysqli_connect('localhost', 'root', '', 'dt_hostel');

$nameBn = $_REQUEST['nameBn'];
$name = $_REQUEST['name'];
$fathername = $_REQUEST['fathername'];
$mothername = $_REQUEST['mothername'];
$fathermobile = $_REQUEST['fathermobile'];
$mothermobile = $_REQUEST['mothermobile'];
$mobile_imo = $_REQUEST['mobile_imo'];
$address = $_REQUEST['address'];
$dateOfBirth = $_REQUEST['dateOfBirth'];
$class = $_REQUEST['class'];
$roll = $_REQUEST['roll'];
$joinDate = $_REQUEST['joinDate'];

$insert="INSERT INTO students (`nameBn`,`name`, `father_name`, `mother_name`, `mobile_father`, `mobile_mother`, `mobile_imo`, `address`, `dateOfBirth`, `class`, `roll`, `date_of_join`) VALUES('$nameBn','$name','$fathername','$mothername','$fathermobile','$mothermobile','$mobile_imo','$address','$dateOfBirth','$class','$roll','$joinDate')";
$runInsertQuery=mysqli_query($conn,$insert);

if($runInsertQuery==true){
    header('location:../studentsList.php');
}else{
    header('location:../addmissionForm.php?wrong');
}
?>