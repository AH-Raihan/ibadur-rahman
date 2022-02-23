<?php require_once('core/config.php');
if (!isset($_COOKIE['PHPLGA'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>ছাত্রদের বেতনের তালিকা</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>

    <h1 class="title"><span class="backPage"></span>ছাত্রদের বেতনের তালিকা </h1>

    <div class="TableContainer">
        <table border="1" id="datatable" class="table dataTable table-hover table-responsive-lg table-striped table-bordered">
            <thead>
                <tr>
                    <th>নং</th>
                    <th>নাম</th>
                    <th>জানুয়ারী </th>
                    <th>ফেব্রুয়ারী </th>
                    <th>মার্চ </th>
                    <th>এপ্রিল </th>
                    <th>মে </th>
                    <th>জুন </th>
                    <th>জুলাই </th>
                    <th>আগস্ট </th>
                    <th>সেপ্টেম্বর </th>
                    <th>অক্টোবর </th>
                    <th>নবেম্বর </th>
                    <th>ডিসেম্বর </th>
                </tr>
            </thead>

            <?php
            $year = date('Y');
            $selectQuery = "SELECT * FROM fees WHERE year='$year' AND status='active'";
            $runQuery = mysqli_query($conn, $selectQuery);
            $pattern2 = "/\-\-[0-9]+/";
$count=1;
            while ($fee = mysqli_fetch_array($runQuery)) { ?>
                <tr <?php
                    if (isset($_REQUEST['studentId']) && $_REQUEST['studentId'] === $fee['student_id']) {
                        echo 'class="SelectedRow"';
                    } ?>>
                    <td><?php echo $count;$count++; ?></td>
                    <td><?php echo $fee['Name']; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='january' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['january'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='february' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['february'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='march' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['march'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='april' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['april'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='may' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['may'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='june' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['june'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='july' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['july'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='august' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['august'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='september' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['september'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='october' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['october'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='november' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['november'] . "'></p>"; ?></td>
                    <td><?php echo "<p class='paymentText' data-month='december' data-class='" . $fee['class'] . "' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['december'] . "'></p>"; ?></td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <div class="modalMy d-none" id="paidModal"></div>

    <div class="modalMy d-none" id="payModal">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <h1>মাদ্রাসাতু ইবাদুর রহমান</h1>
                <p class="addr">দারুল ইসলাম ট্রাস্ট, উত্তর আউচপাড়া, টঙ্গী
                    গাজীপুর।</p>
                <p class="mobile">মোবাইলঃ 01714-332160</p>
                <div class="row">
                    <p>রশিদ নং <input type="text" disabled value="0000" id="payRecieptNo"> </p>
                    <p class="takaAdayerRoshid">টাকা আদায়ের রশিদ</p>
                    <p>তাং <input type="text" id="payDate" value="06/11/2021"> </p>
                </div>
                <p>ছাত্রের নামঃ- &nbsp; <input type="text" id="payStudentName" value=""></p>
                <div class="row flexDiv">
                    <p>শ্রেণিঃ- <input type="text" value="" id="payStudentClass"> </p>
                    <p>মাসঃ-
                        <select id="payMonth">
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">july</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>
                    </p>
                    <p>সনঃ- <input type="text" value="0000" id="payYear"></p>
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
                                <td><input type="text" oninput="payTotal()" value="0" id="payaddmission_form"></td>
                            </tr>
                            <tr>
                                <td>০২</td>
                                <td>ভর্তি ফি</td>
                                <td><input type="text" oninput="payTotal()" value="0" id="payaddmission_fee"></td>
                            </tr>
                            <tr>
                                <td>০৩</td>
                                <td>জামানত</td>
                                <td><input type="text" oninput="payTotal()" value="0" id="payadvance"></td>
                            </tr>
                            <tr>
                                <td>০৫</td>
                                <td>সংস্থাপন</td>
                                <td><input type="text" oninput="payTotal();" value="0" id="paysongsthapon"></td>
                            </tr>
                            <tr>
                                <td>০৭</td>
                                <td>টিউশন</td>
                                <td><input type="text" oninput="payTotal();" value="1500" id="paytiuson"></td>
                            </tr>
                            <tr>
                                <td>০৮</td>
                                <td>অগ্রিম/বকেয়া</td>
                                <td><input type="text" oninput="payTotal();" value="0" id="payogrim_bokeya"></td>
                            </tr>
                            <tr>
                                <td>০৯</td>
                                <td>বিবিধ</td>
                                <td><input type="text" oninput="payTotal();" id="paybibid" value="0"></td>
                            </tr>


                            <tr>
                                <td class="lastRows"></td>
                                <td class="lastRows">সর্বমোট টাকা</td>
                                <td><input type="text" oninput="payTotal();" value="6000" id="paytotal"></td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td class="lastRows">জমা</td>
                                <td><input type="text" oninput="payTotal();" value="" id="payjoma"></td>
                            </tr>
                            <tr>
                                <td class="lastRows"></td>
                                <td class="lastRows">বকেয়া</td>
                                <td><input type="text" oninput="payTotal();" value="0" id="paybokeya"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="download" id="paySaveBtn" data-id="" onclick="submitPay();">Save</button>
                    <button class="cencel" onclick="cencel(this);">Celcel</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modalMy d-none" id="paidNotModal"></div>



    <div class="modalMy d-none" id="paidModalJson">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <h1 class="">মাদ্রাসাতু ইবাদুর রহমান</h1>
                <p class="addr">দারুল ইসলাম আবাসন, উত্তর আউচপাড়া, টঙ্গী
                    গাজীপুর।</p>
                <p class="mobile">মোবাইলঃ  01714-332160</p>
                <div class="row">
                    <p>রশিদ নং <span id="roshid_reciept_no"></span> </p>
                    <p class="takaAdayerRoshid">টাকা আদায়ের রশিদ</p>
                    <p>তাং <span id="paidDate"></span> </p>
                </div>
                <p>ছাত্রের নামঃ- &nbsp; <span id="studentName"></span> </p>
                <div class="row">
                    <p>শ্রেণিঃ- <span id="studentClass"></span></p>
                    <p>মাসঃ- <span id="month"></span></p>
                    <p>সনঃ- <span id="year"></span> </p>
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
                                <td id="addmission_form"></td>
                            </tr>
                            <tr>
                                <td>০২</td>
                                <td>ভর্তি ফি</td>
                                <td id="addmission_fee"></td>
                            </tr>
                            <tr>
                                <td>০৩</td>
                                <td>জামানত</td>
                                <td id="advance"> </td>
                            </tr>
                            <tr>
                                <td>০৫</td>
                                <td>সংস্থাপন</td>
                                <td id="songsthapon"></td>
                            </tr>
                            <tr>
                                <td>০৭</td>
                                <td>টিউশন</td>
                                <td id="tiuson"></td>
                            </tr>
                            <tr>
                                <td>০৮</td>
                                <td>অগ্রিম/বকেয়া</td>
                                <td id="ogrim_bokeya"> </td>
                            </tr>
                            <tr>
                                <td>০৯</td>
                                <td>বিবিধ</td>
                                <td id="bibid"></td>
                            </tr>
                            <tr>
                                <td class="lastRows"></td>
                                <td class="lastRows">সর্বমোট টাকা</td>
                                <td id="total"></td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td class="lastRows">জমা</td>
                                <td id="joma"></td>
                            </tr>
                            <tr>
                                <td class="lastRows"></td>
                                <td class="lastRows">বকেয়া</td>
                                <td id="bokeya"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="print" onclick="window.print();">Print</button>
                    <button class='download payNot paynowbtn' id='payNot' data-month='' data-recieptnoPay='' data-id='' data-name='' data-class='' onclick='payModalOpen();'>Pay Now</button>
                    <button class="cencel" onclick="cencel(this);">Celcel</button>
                </div>

            </div>
        </div>
    </div>


    <script>
        var paymentText = document.getElementsByClassName("paymentText");

        for (let index = 0; index < paymentText.length; index++) {
            var reciept = paymentText[index].getAttribute('data-recieptno');
            if (reciept === "none") {
                paymentText[index].classList.add('pay');
                paymentText[index].innerHTML = "বকেয়া";
            } else if (/\-\-([0-9]+)/g.test(reciept)) {
                paymentText[index].classList.add('paidNot');
                paymentText[index].innerHTML = "পরিশোধিত";
            } else if (/\=\=([0-9]+)/g.test(reciept)) {
                paymentText[index].classList.add('paidTwo');
                paymentText[index].classList.add('paidNot');
                paymentText[index].innerHTML = "পরিশোধিত";
            } else if (/\b([0-9]+)\b/.test(reciept)) {
                paymentText[index].classList.add('paid');
                paymentText[index].innerHTML = "পরিশোধিত";
            }
        }
    </script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        var beforeInnerText = "পরিশোধিত";
        var paid = document.getElementsByClassName('paid');
        for (let i = 0; i < paid.length; i++) {
            paid[i].addEventListener('click', function() {
                paidRecieptNo = paid[i].getAttribute('data-recieptno');
                getPaidDatas(paidRecieptNo, i);
                beforeInnerText = paid[i].innerHTML;
                paid[i].innerHTML += ":";
            });
        }


        $('document').ready(function() {
            var paidNot = document.getElementsByClassName('paidNot');
            for (let i = 0; i < paidNot.length; i++) {
                paidNot[i].addEventListener('click', function() {
                    paidNotRecieptNo = paidNot[i].getAttribute('data-recieptno');
                    getPaidDatas(paidNotRecieptNo, i);
                    paidNot[i].innerHTML = "<div class='spinner-border spinner-border-sm' role='status'></div>";
                });
            }
        });



        function getPaidDatas(recieptNo, paidId) {
            axios.post(`core/paidDataJson_core.php?reciept_no=${recieptNo}`)
                .then(function(response) {
                    paidModalJson.classList.remove('d-none');
                    let jsonData = response.data;
                    let payNot = document.getElementById('payNot');


                    let paidRecieptNo = document.getElementById('roshid_reciept_no').innerHTML = jsonData.reciept_no;
                    let paidDate = document.getElementById('paidDate').innerHTML = jsonData.date;
                    let paidStudentName = document.getElementById('studentName').innerHTML = jsonData.studentName;
                    let paidStudentClass = document.getElementById('studentClass').innerHTML = jsonData.class;
                    let paidMonth = document.getElementById('month').innerHTML = jsonData.month;
                    let paidYear = document.getElementById('year').innerHTML = jsonData.year;

                    let paidaddmission_form = document.getElementById('addmission_form').innerHTML = jsonData.addmission_form;
                    let paidaddmission_fee = document.getElementById('addmission_fee').innerHTML = jsonData.addmission_fee;
                    let paidadvance = document.getElementById('advance').innerHTML = jsonData.advance;
                    let paidsongsthapon = document.getElementById('songsthapon').innerHTML = jsonData.songsthapon;
        
                    let paidtiuson = document.getElementById('tiuson').innerHTML = jsonData.tiuson;
                    let paidogrim_bokeya = document.getElementById('ogrim_bokeya').innerHTML = jsonData.ogrim_bokeya;
                    let paidbibid = document.getElementById('bibid').innerHTML = jsonData.bibid;
 
                    let paidtotal = document.getElementById('total').innerHTML = jsonData.total;
                    let paidjoma = document.getElementById('joma').innerHTML = jsonData.joma;
                    let paidbokeya = document.getElementById('bokeya').innerHTML = jsonData.bokeya;

                    var pattern = /\-\-[\d]+/i;
                    if (pattern.test(paidRecieptNo)) {
                        payNot.setAttribute('data-recieptnoPay', jsonData.reciept_no);
                        payNot.setAttribute('data-month', jsonData.month);
                        payNot.setAttribute('data-id', jsonData.student_id);
                        payNot.setAttribute('data-class', jsonData.class);
                        payNot.setAttribute('data-name', jsonData.studentName);
                        payNot.style.display = 'block';
                    } else {
                        payNot.style.display = 'none';
                    }

                    

                    
                        document.getElementsByClassName('paidNot')[paidId].innerHTML = beforeInnerText;
                    


                })
                .catch(function(error) {
                    alert(error);
                })
        }
    </script>
</body>

</html>