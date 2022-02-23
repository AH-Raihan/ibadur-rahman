<?php
if (!isset($_COOKIE['PHPLGA'])) {
  header('location:../login.php');
} else {
  require_once("config.php");

  $id = $_REQUEST['id'];
  $title = $_REQUEST["title"];

  $update = "UPDATE notice SET title='$title' WHERE id='$id'";
  $runUpdate = mysqli_query($conn, $update);

  if ($runUpdate == true) {
    echo "Successfuly Updated!";
  } else {
    echo "Somthing is Wrong!";
  }
}
