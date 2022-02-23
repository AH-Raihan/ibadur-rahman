<?php
// connect
$conn = mysqli_connect('bcdkqr4c53po8h6aw382-mysql.services.clever-cloud.com', 'ulgeuzpjytw1pvcp', 'jdrS8qUrqAeJ6w5vZj4G', 'bcdkqr4c53po8h6aw382');
// $conn = mysqli_connect('localhost', 'root', '', 'dt_hostel');
if ($conn == false) {
    echo "<h2 style='color:red;text-align:center;'>Database not connected</h2>";
} else {

    $reciept_no = $_REQUEST['reciept_no'];

    $selectData = "SELECT * FROM receipt WHERE reciept_no='$reciept_no'";
    $runSelectDataQuery = mysqli_query($conn, $selectData);

    $count = mysqli_num_rows($runSelectDataQuery);
    if ($runSelectDataQuery == true && $count > 0) {

        while ($data = mysqli_fetch_assoc($runSelectDataQuery)) {
            echo json_encode($data);

?>

            

<?php }
    } else {

        echo '
    <div class="modalMyContainer">
    <div class="modalMyFooter">
    <div class="row">
        No Data Found!
        <button class="cencel" onclick="cencel(this);">Celcel</button>
    </div>
</div>
</div>';
    }
}

?>