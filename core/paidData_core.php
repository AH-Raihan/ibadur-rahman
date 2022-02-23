<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>


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

        while ($data = mysqli_fetch_array($runSelectDataQuery)) {

?>

            <div class="modalMyContainer">
                <div class="modalMyHeader">
                    <h1 class="">দারুত তারবিয়া ছাত্রাবাস</h1>
                    <p class="addr">স্বপ্ননীড় ভবন, বালাদিল আমিন আবাসন, মিল্লাত বালিকা শাখা সংলগ্ন, উত্তর আউচপাড়া, টঙ্গী
                        গাজীপুর।</p>
                    <p class="mobile">মোবাইলঃ ০১৮৩৪-১৪৯৬২২, ০১৯৫৭-৬৮৭৪৪৪</p>
                    <div class="row">
                        <p>রশিদ নং <?php echo $data['reciept_no']; ?> </p>
                        <p class="takaAdayerRoshid">টাকা আদায়ের রশিদ</p>
                        <p>তাং <span id="paidDate"></span> <?php echo $data['date']; ?></p>
                    </div>
                    <p>ছাত্রের নামঃ- &nbsp; <?php echo $data['studentName']; ?></p>
                    <div class="row">
                        <p>শ্রেণিঃ- <?php echo $data['class']; ?></p>
                        <p>মাসঃ- <?php echo $data['month']; ?></p>
                        <p>সনঃ- <?php echo $data['year']; ?></span> </p>
                    </div>

                </div>
                <div class="modalMyBody">
                    <div class="tableBody">

                        <table border="1">
                            <thead>
                                <tr>
                                    <th>নং</th>
                                    <th>বিবরণ</th>
                                    <th>টাকা</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>০১</td>
                                    <td>ভর্তি ফরম</td>
                                    <td> <?php echo $data['addmission_form']; ?></td>
                                </tr>
                                <tr>
                                    <td>০২</td>
                                    <td>ভর্তি ফি</td>
                                    <td> <?php echo $data['addmission_fee']; ?></td>
                                </tr>
                                <tr>
                                    <td>০৩</td>
                                    <td>জামানত</td>
                                    <td> <?php echo $data['advance']; ?></td>
                                </tr>
                                <tr>
                                    <td>০৪</td>
                                    <td>খাদ্য চার্জ</td>
                                    <td> <?php echo $data['eating_fee']; ?></td>
                                </tr>
                                <tr>
                                    <td>০৫</td>
                                    <td>সংস্থাপন</td>
                                    <td> <?php echo $data['songsthapon']; ?></td>
                                </tr>
                                <tr>
                                    <td>০৬</td>
                                    <td>সীট ভাড়া</td>
                                    <td> <?php echo $data['seet_fee']; ?></td>
                                </tr>
                                <tr>
                                    <td>০৭</td>
                                    <td>টিউশন</td>
                                    <td> <?php echo $data['tiuson']; ?></td>
                                </tr>
                                <tr>
                                    <td>০৮</td>
                                    <td>অগ্রিম/বকেয়া</td>
                                    <td> <?php echo $data['ogrim_bokeya']; ?></td>
                                </tr>
                                <tr>
                                    <td>০৯</td>
                                    <td>বিবিধ</td>
                                    <td> <?php echo $data['bibid']; ?></td>
                                </tr>
                                <tr>
                                    <td class="lastRows"></td>
                                    <td class="lastRows">সর্বমোট টাকা</td>
                                    <td> <?php echo $data['total']; ?></td>
                                </tr>
                                <tr>
                                    <td style="border:none;"></td>
                                    <td class="lastRows">জমা</td>
                                    <td> <?php echo $data['joma']; ?></td>
                                </tr>
                                <tr>
                                    <td class="lastRows"></td>
                                    <td class="lastRows">বকেয়া</td>
                                    <td> <?php echo $data['bokeya']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modalMyFooter">
                    <div class="row">
                        <button class="print" onclick="window.print();">Print</button>
                        <?php
                        $recieptNo = $data['reciept_no'];
                        if (preg_match("/\-\-[0-9]/", $recieptNo)) {
                            echo "<button class='download payNot paynowbtn' id='payNot' data-month='" . $data['month'] . "' data-recieptnoPay='" . $data['reciept_no'] . "' data-id='" . $data['student_id'] . "' data-name='" . $data['studentName'] . "' onclick='payModalOpen();'>Pay Now</button>";
                        } else {
                            echo "<button class='download'>Image Download</button>";
                        }
                        ?>
                        <button class="cencel" onclick="cencel(this);">Celcel</button>
                    </div>

                </div>
            </div>

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



    
</body>
</html>