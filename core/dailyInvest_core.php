<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
require_once("config.php");

$item = $_REQUEST["item"];
$price = $_REQUEST["price"];
$quantity = $_REQUEST["quantity"];
$discount = $_REQUEST["discount"];
$total_price = $_REQUEST["total_price"];
$year = date("Y");
$month = date("n");
$date = date('j');

$insert="INSERT INTO daily_invest (year,month,date,item,price,quantity,discount,total_price) VALUES('$year','$month','$date','$item','$price','$quantity','$discount','$total_price')";
$runInsertQuery=mysqli_query($conn,$insert);

if($runInsertQuery==true){
    echo "Successfully added";
}else{
    echo "Faild to add";
}
?>