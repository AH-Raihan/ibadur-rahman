<?php

$rule =$_REQUEST['rule'];

require_once('./config.php');
$insert= "INSERT INTO rules(Rule) VALUES('$rule')";
$runQuery = mysqli_query($conn,$insert);

if($runQuery==true){
    echo "Successfully Added";
}else{
    echo "something is wrong!";
}
?>