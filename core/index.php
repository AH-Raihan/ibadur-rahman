<?php

$pattern = "/\/core\//";
if(!isset($_COOKIE['PHPLGA']) && preg_match($pattern,$_SERVER['REQUEST_URI'])){
     header('location:../index.php');
 }
?>