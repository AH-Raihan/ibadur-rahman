<!-- connect -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Azizul Hasan Raihan (AHR)">
    <title>Darut Tarbia</title>
    <link rel="shortcut icon" href="images/dt-logo.jpg" type="image/png">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="manifest" href="manifestUser.json">
    <style>
        .paynowbtn {
            display: none;
        }
    </style>
</head>

<body>
    <h1 class="title">দারুত তারবিয়া ছাত্রাবাস </h1>
    <div class="container box-shadow notice bg-light printNone">
        <span class="shape-wrap">
            <h2 class="title shape">নোটিশ বোর্ড</h2>
        </span>
        <br>
        <div class="row ">
            <div class="col-sm-12 noticeBoard">
                <ul class="notice">
                    <?php
                    $conn = mysqli_connect('bcdkqr4c53po8h6aw382-mysql.services.clever-cloud.com', 'ulgeuzpjytw1pvcp', 'jdrS8qUrqAeJ6w5vZj4G', 'bcdkqr4c53po8h6aw382');
                    // $conn = mysqli_connect('localhost', 'root', '', 'dt_hostel');
                    $selectNotice = "SELECT * FROM notice";
                    $runNoticeQuery = mysqli_query($conn, $selectNotice);

                    while ($notice = mysqli_fetch_array($runNoticeQuery)) { ?>
                        <li><span><img src="images/notice-pin-clipart_18x18.png" width="18px" alt=""><?php echo $notice['title'] ?></span></li>
                    <?php }  ?>
                </ul>
            </div>
        </div>
        <br>
    </div>
    <br>
    <div class="container box-shadow routine bg-light printNone">
        <span class="shape-wrap">
            <h2 class="title shape">ছাত্রাবাসের নিয়ম কানন সমূহ</h2>
        </span>
        <br>
        <table class="table table-bordered">
            <thead>
            </thead>
            <tbody>
                <?php
                $selectRules = "SELECT * FROM rules";
                $runRulesQuery = mysqli_query($conn, $selectRules);

                while ($rules = mysqli_fetch_array($runRulesQuery)) { ?>
                    <tr>
                        <td><?php echo $rules["id"]; ?> </td>
                        <td><?php echo $rules["Rule"]; ?> </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
        <br>
    </div>

    <div class="container box-shadow routine bg-light">
        <h1 class="onlyPrint text-center">দারুত তারবিয়া ছাত্রাবাস</h1>
        <h2 class="onlyPrint text-center">পড়ার রুটিন</h2>
        <span class="shape-wrap">
            <h2 class="title shape">পড়ার রুটিন</h2>
        </span>
        <table class="table table-bordered studyRoutine">
            <?php

            $selectRoutine = "SELECT * FROM study_routine";
            $runRoutineQuery = mysqli_query($conn, $selectRoutine);

            while ($routine = mysqli_fetch_array($runRoutineQuery)) { ?>
                <tr>
                    <td><?php echo $routine["day"]; ?> </td>
                    <td><?php echo $routine["morning"]; ?> </td>
                    <td><?php echo $routine["noon"]; ?> </td>
                    <td><?php echo $routine["night"]; ?> </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <br>
    <div class="container box-shadow routine bg-light">
        <h1 class="onlyPrint text-center">দারুত তারবিয়া ছাত্রাবাস</h1>
        <h2 class="onlyPrint text-center">খাবারের সময়সূচি</h2>
        <span class="shape-wrap">
            <h2 class="title shape">খাবারের সময়সূচি</h2>
        </span>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>সকাল</th>
                    <th>দুপুর</th>
                    <th>রাত</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $selectEatingTime = "SELECT * FROM eatingtime";
                $runEatingTimeQuery = mysqli_query($conn, $selectEatingTime);

                while ($eatingTime = mysqli_fetch_array($runEatingTimeQuery)) { ?>
                    <tr>
                        <td><?php echo $eatingTime["morning"]; ?> </td>
                        <td><?php echo $eatingTime["noon"]; ?> </td>
                        <td><?php echo $eatingTime["night"]; ?> </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
        <p style="font-size: 24px;text-align:center;display:block;">উক্ত সময়ের পর এসে খাবার না পাইলে কর্তৃপক্ষ দায়ি নহে ।</p>
        <br>
    </div>

    <br>
    <div class="container box-shadow routine bg-light">
        <h2 class="onlyPrint text-center">খাবার রুটিন</h2>
        <span class="shape-wrap">
            <h2 class="title shape">খাবার রুটিন</h2>
        </span>
        <br>
        <table class="table routine-table table-bordered">
            <thead>
                <tr>
                    <th>বার </th>
                    <th>সকাল </th>
                    <th>দুপুর </th>
                    <th>রাত </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectRoutine = "SELECT * FROM routine";
                $runRoutineQuery = mysqli_query($conn, $selectRoutine);

                while ($routine = mysqli_fetch_array($runRoutineQuery)) { ?>
                    <tr>
                        <td><?php echo $routine["day"]; ?> </td>
                        <td><?php echo $routine["morning"]; ?> </td>
                        <td><?php echo $routine["noon"]; ?> </td>
                        <td><?php echo $routine["night"]; ?> </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
        <br>
        <p style="font-size: 24px;text-align:center;display:block;"><b>বিঃদ্রঃ প্রতি মাসে ৩য় শুক্রবার বিশেষ খাবারের ব্যাবস্থা আছে ।</b></p>

    </div>
    <br>

    <div class="container  box-shadow bg-light printNone">
        <span class="shape-wrap">
            <h2 class="title shape" onclick="paymentUser();" style="cursor:pointer">বেতন <span class="fas fa-arrow-alt-circle-down"></span></h2>
        </span>
        <br>
        <div id="paymentUser" class="row" style="height:0px;overflow:auto;transition:.4s;">

            <?php
            // $year = date('Y');

            if (!isset($_REQUEST['studentId'])) {
                echo "<form method='GET' class='col-sm-6 mx-auto'>";
                echo "Id : <input class='my-3 form-control' placeholder='Enter TM ID Or Hostel ID ..' type='text' name='studentId'>";
                echo "<input type='submit' class='btn btn-block btn-success text-white'>";
                echo "</form>";
            } else {
                $studentId = $_REQUEST['studentId'];
                $selectQuery = "SELECT * FROM fees WHERE student_id='$studentId' OR tmCode='$studentId' ";
                $runQuery = mysqli_query($conn, $selectQuery);

                while ($fee = mysqli_fetch_array($runQuery)) { ?>
                    <div class="col-sm-6">
                        <div class="row border">
                            <div class="bg-info col-sm-6">নং</div>
                            <div class="bg-info col-sm-6"><?php echo $fee['student_id']; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">নাম</div>
                            <div class="col-sm-6"><?php echo $fee['Name']; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">বছর </div>
                            <div class="col-sm-6"><?php echo $fee['year']; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">জানুয়ারী </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='january' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['january'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">ফেব্রুয়ারী </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='february' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['february'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">মার্চ </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='march' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['march'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">এপ্রিল </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='april' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['april'] . "'></p>"; ?></div>

                        </div>
                        <div class="row border">
                            <div class="col-sm-6">মে </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='may' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['may'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">জুন </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='june' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['june'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">জুলাই </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='july' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['july'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">আগস্ট </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='august' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['august'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">সেপ্টেম্বর </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='september' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['september'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">অক্টোবর </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='october' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['october'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">নবেম্বর </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='november' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['november'] . "'></p>"; ?></div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-6">ডিসেম্বর </div>
                            <div class="col-sm-6"><?php echo "<p class='paymentText' data-month='december' data-name='" . $fee['Name'] . "' data-id='" . $fee['student_id'] . "' data-recieptno='" . $fee['december'] . "'></p>"; ?></div>
                        </div>
                    </div>
            <?php }
            } ?>

        </div>
        <br>
    </div>

    <div class="row onlyPrint">
        <div class="col-sm-12">
            <img style="width: 100px;margin:auto;display:block;" src="images/dt.png" alt="">
            <p style="font-size: 18px;text-align:center;display:block;">hosteldt.herokuapp.com</p>
        </div>
    </div>

    <br>
    <div class="container box-shadow bg-light printNone">
        <h1 class="text-center onlyPrint">যোগাযোগ</h1>
        <span class="shape-wrap">
            <h2 class="title shape">যোগাযোগ</h2>
        </span>
        <div class="row ">
            <div class="col-sm-12">
                <p style="font-size: 18px;text-align:center;display:block;">মাওঃ শাহাদাত হোসাইন (পরিচালক):- <br><a href="tel:01834149622">01834-149622</a> (বিকাশ) , <br> <a href="tel:01957687444">01957-687444</a></p>
                <p style="font-size: 18px;text-align:center;display:block;">মাহমুদুল হাসান আরমান (শিক্ষক):- <br><a href="tel:01849945080">01849-945080</a> , <br> <a href="tel:01849805381">01849-805381</a> (বিকাশ)</p>
                <p style="font-size: 18px;text-align:center;display:block;">নাজমুল হাসান (শিক্ষক):- <a href="tel:01792600078">01792-600078</a></p>
                <p style="font-size: 18px;text-align:center;display:block;">জোবায়ের আহমদ (শিক্ষক):- <a href="tel:01611329498">01611-329498</a></p>

            </div>
        </div>
    </div>



    <div class="modalMy d-none" id="paidModal"></div>

    <div class="modalMy d-none" id="paidNotModal"></div>







    <div class="modalMy d-none" id="paidModalJson">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <h1 class="">দারুত তারবিয়া ছাত্রাবাস</h1>
                <p class="addr">স্বপ্ননীড় ভবন, বালাদিল আমিন আবাসন, মিল্লাত বালিকা শাখা সংলগ্ন, উত্তর আউচপাড়া, টঙ্গী
                    গাজীপুর।</p>
                <p class="mobile">মোবাইলঃ ০১৮৩৪-১৪৯৬২২, ০১৯৫৭-৬৮৭৪৪৪</p>
                <div class="row">
                    <p>রশিদ নং <span id="roshid_reciept_no"></span> </p>
                    <p class="takaAdayerRoshid">টাকা আদায়ের রশিদ</p>
                    <p>তাং <span id="paidDate"></span> </p>
                </div>
                <p>ছাত্রের নামঃ- &nbsp; <span id="studentName"></span> </p>
                <div class="row">
                    <p>শ্রেণিঃ- <span id="class"></span></p>
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
                                <td>০৪</td>
                                <td>খাদ্য চার্জ</td>
                                <td id="eating_fee"></td>
                            </tr>
                            <tr>
                                <td>০৫</td>
                                <td>সংস্থাপন</td>
                                <td id="songsthapon"></td>
                            </tr>
                            <tr>
                                <td>০৬</td>
                                <td>সীট ভাড়া</td>
                                <td id="seet_fee"></td>
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
                    <a href="#" target="_blank" id="shareBtn" class="btn btn-dark" >Share</a>
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
    <script src="js/axios.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/init.js"></script>
    <!-- <script src="js/custom.js"></script> -->

    <script>
        var paidModalJson = document.getElementById('paidModalJson');
        var beforeInnerText = "";
        var paid = document.getElementsByClassName('paid');
        for (let i = 0; i < paid.length; i++) {
            paid[i].addEventListener('click', function() {
                paidRecieptNo = paid[i].getAttribute('data-recieptno');
                getPaidDatas(paidRecieptNo, i);
                beforeInnerText = paid[i].innerHTML;
                paymentText[i].innerHTML = "<div class='spinner-border spinner-border-sm' role='status'></div>";
            });
        }

        var paidNot = document.getElementsByClassName('paidNot');
        for (let i = 0; i < paidNot.length; i++) {
            paidNot[i].addEventListener('click', function() {
                paidNotRecieptNo = paidNot[i].getAttribute('data-recieptno');
                getPaidDatas(paidNotRecieptNo, i);
                beforeInnerText = paidNot[i].innerHTML;
                paymentText[i].innerHTML = "<div class='spinner-border spinner-border-sm' role='status'></div>";
            });
        }


        function getPaidDatas(recieptNo, paidId) {
            axios.post(`core/paidDataJson_core.php?reciept_no=${recieptNo}`)
                .then(function(response) {
                    paidModalJson.classList.remove('d-none');
                    //  modalPaid.innerHTML = response.data;
                    let jsonData = response.data;

                    paymentText[paidId].innerHTML = beforeInnerText;



                    document.getElementById('roshid_reciept_no').innerHTML = jsonData.reciept_no;
                    document.getElementById('shareBtn').href = "core/paidData_core.php?reciept_no="+jsonData.reciept_no;
                    document.getElementById('paidDate').innerHTML = jsonData.date;
                    document.getElementById('studentName').innerHTML = jsonData.studentName;
                    document.getElementById('class').innerHTML = jsonData.class;
                    document.getElementById('month').innerHTML = jsonData.month;
                    document.getElementById('year').innerHTML = jsonData.year;

                    document.getElementById('addmission_form').innerHTML = jsonData.addmission_form;
                    document.getElementById('addmission_fee').innerHTML = jsonData.addmission_fee;
                    document.getElementById('advance').innerHTML = jsonData.advance;
                    document.getElementById('eating_fee').innerHTML = jsonData.eating_fee;
                    document.getElementById('songsthapon').innerHTML = jsonData.songsthapon;
                    document.getElementById('seet_fee').innerHTML = jsonData.seet_fee;
                    document.getElementById('tiuson').innerHTML = jsonData.tiuson;
                    document.getElementById('ogrim_bokeya').innerHTML = jsonData.ogrim_bokeya;
                    document.getElementById('bibid').innerHTML = jsonData.bibid;

                    document.getElementById('total').innerHTML = jsonData.total;
                    document.getElementById('joma').innerHTML = jsonData.joma;
                    document.getElementById('bokeya').innerHTML = jsonData.bokeya;
                })
                .catch(function(error) {
                    alert(error);
                    console.log(error);
                })
        }

        function paymentUser() {
            var paymentUser = document.getElementById('paymentUser');
            if (paymentUser.style.height === "0px") {
                paymentUser.style.height = "100vh";
            } else {
                paymentUser.style.height = "0px";
            }
        }
    </script>
</body>

</html>