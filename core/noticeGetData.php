<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
}else{
    
}
require_once("config.php");

$selectNotice="SELECT * FROM notice";
$runNotice = mysqli_query($conn,$selectNotice);

while($notice = mysqli_fetch_array($runNotice)){
    $editNotice= "editNotice";
    echo "<tr>";
    echo "<td>".$notice['id']."</td>";
    echo "<td>".$notice['title']."</td>";
    echo "<td>".$notice['date']."</td>";
    echo "<td><button class='btn btn-info noticeEditBtn' onclick='modalOpen(\"$editNotice\"); editModal(this);' data-id='".$notice['id']."' data-editTitle='".$notice['title']."'>Edit</button>";
    echo "<button class='btn btn-info bg-danger' onclick='deleteModal(this);' data-id='".$notice['id']."'>Delete</button></td>";
    echo "</tr>";
}

?>