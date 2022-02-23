<?php
if (!isset($_COOKIE['PHPLGA'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ফ্লাট ভাড়া</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <h1 class="title"><span class="backPage"></span> ফ্লাট ভাড়া সমূহ</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <button class="AddBtn" onclick="modalOpen('addnewmodal');">Add Bill</button>
                <table id="datatable" class="table dataTable table-responsive-lg table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ফ্লাট</th>
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
                    <tbody id="tbody">
                        <?php
                        require_once('core/config.php');
                        $year = date('Y');
                        $selectQuery = "SELECT * FROM bills WHERE year='$year'";
                        $runQuery = mysqli_query($conn, $selectQuery);



                        while ($fee = mysqli_fetch_array($runQuery)) { ?>
                            <tr>
                                <td><?php echo $fee['flat']; ?></td>
                                <td><?php echo $fee['name']; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='january'   data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['january'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='february'  data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['february'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='march'     data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['march'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='april'     data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['april'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='may'       data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['may'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='june'      data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['june'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='july'      data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['july'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='august'    data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['august'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='september' data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['september'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='october'   data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['october'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='november'  data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['november'] . "'></p>"; ?></td>
                                <td><?php echo "<p class='paymentText bill' data-month='december'  data-name='" . $fee['name'] . "' data-year='" . $fee['year'] . "' data-id='" . $fee['id'] . "' data-recieptno='" . $fee['december'] . "'></p>"; ?></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- start pay modal  -->

    <div class="modalMy d-none" id="payModalBill">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <!-- <h1>দারুত তারবিয়া ছাত্রাবাস</h1> -->
                <div class="row">
                    <p>রশিদ নং <input type="text" disabled value="0000" id="payRecieptNo"> </p>
                    <p class="takaAdayerRoshid">টাকা আদায়ের রশিদ</p>
                    <p>তাং <input type="text" id="payDate"> </p>
                </div>
                <p>নামঃ- &nbsp; <input type="text" id="payName"></p>
                <div class="row flexDiv">
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
                    <p>সনঃ- <input type="text" id="payYear"></p>
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
                                <td>অগ্রিম/বকেয়া</td>
                                <td><input type="text" oninput="payBillTotal();" value="0" id="payogrim_bokeya"></td>
                            </tr>
                            <tr>
                                <td>০২</td>
                                <td>বিবিধ</td>
                                <td><input type="text" oninput="payBillTotal();" id="paybibid" value="0"></td>
                            </tr>


                            <tr>
                                <td class="lastRows"></td>
                                <td class="lastRows">সর্বমোট টাকা</td>
                                <td><input type="text" oninput="payBillTotal();" value="" id="paytotalbill"></td>
                            </tr>
                            <tr>
                                <td style="border:none;"></td>
                                <td class="lastRows">জমা</td>
                                <td><input type="text" oninput="payBillTotal();" value="" id="payjomabill"></td>
                            </tr>
                            <tr>
                                <td class="lastRows"></td>
                                <td class="lastRows">বকেয়া</td>
                                <td><input type="text" oninput="payBillTotal();" value="0" id="paybokeyabill"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="download" id="payBillSaveBtn" data-id="">Save</button>
                    <button class="cencel" onclick="cencel(this);">Celcel</button>
                </div>

            </div>
        </div>
    </div>

    <!-- end pay modal -->

    <div class="modalMy d-none" id="paidModal"></div>



    <div class="modalMy d-none" id="paidNotModal"></div>

    <div class="modalMy d-none" id="addnewmodal">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <h1>Add Bill</h1>
            </div>
            <div class="modalMyBody">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" placeholder="Flat" id="newflat" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" placeholder="Name" id="newname" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="download" onclick="addNewBill();">Add</button>
                    <button class="cencel" onclick="cencel(this);">Celcel</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        paymentTextF();

        function paymentTextF() {
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
        }


        payBillClass();

        function payBillClass() {
            var payBill = document.querySelectorAll('.bill.pay');
            var modalPayBill = document.getElementById('payModalBill');
            var payBillSaveBtn = document.getElementById('payBillSaveBtn');

            var payName = document.getElementById('payName');
            var payMonth = document.getElementById('payMonth');
            var payYear = document.getElementById('payYear');
            for (let ind = 0; ind < payBill.length; ind++) {
                payBill[ind].addEventListener('click', function() {
                    let payRecieptNo = payBill[ind].getAttribute('data-id');
                    let payNameValue = payBill[ind].getAttribute('data-name');
                    let payMonthValue = payBill[ind].getAttribute('data-month');
                    let payYearValue = payBill[ind].getAttribute('data-year');
                    payBillSaveBtn.setAttribute('data-id', payRecieptNo);
                    let payName = document.getElementById('payName');
                    payName.value = payNameValue;
                    payMonth.value = payMonthValue;
                    payYear.value = payYearValue;

                    modalPayBill.classList.remove('d-none');
                });
            }
        }
    </script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>
    <script>
        var paydate = document.getElementById('payDate');
        var today = new Date();
        paydate.value = today.getDate() + "/" + today.getMonth() + "/" + today.getFullYear();






        var paid = document.getElementsByClassName('paid');
        for (let i = 0; i < paid.length; i++) {
            paid[i].addEventListener('click', function() {
                paidRecieptNo = paid[i].getAttribute('data-recieptno');
                getPaidDatas(paidRecieptNo);

                modalPaid.classList.remove('d-none');
            });
        }

        var paidNot = document.getElementsByClassName('paidNot');
        for (let i = 0; i < paidNot.length; i++) {
            paidNot[i].addEventListener('click', function() {
                paidNotRecieptNo = paidNot[i].getAttribute('data-recieptno');
                getPaidDatas(paidNotRecieptNo);
                modalPaid.classList.remove('d-none');
            });
        }


        function getPaidDatas(recieptNo) {
            axios.post(`core/paidData_core.php?reciept_no=${recieptNo}`)
                .then(function(response) {
                    modalPaid.innerHTML = response.data;
                })
                .catch(function(error) {
                    alert(error);
                })
        }


        function addNewBill() {
            let flat = document.querySelector("input#newflat").value;
            let name = document.querySelector("input#newname").value;

            if (flat.length !== 0 && name.length !== 0) {

                axios.post(`core/addnewbill_core.php?flat=${flat}&&name=${name}`)
                    .then(function(response) {

                        if (response.status == 200) {
                            alert(response.data);
                            window.location.reload();

                        }
                    })
                    .catch(function(error) {
                        document.getElementById('addnewmodal').classList.add('d-none');
                        alert(error.data);
                    })
            } else {
                alert('flat or name is empty!');
            }
        }


        var payBillSaveBtn = document.getElementById('payBillSaveBtn');


        payBillSaveBtn.addEventListener('click', function() {
            payBillSaveBtn.innerHTML = `<div class='spinner-border spinner-border-sm' role='status'></div>`;


            let id = payBillSaveBtn.getAttribute('data-id');
            let name = document.getElementById('payName');
            let date = document.getElementById('payDate');
            let month = document.getElementById('payMonth');
            let year = document.getElementById('payYear');


            let payTotalbill = document.getElementById('payTotalbill');
            let payjomabill = document.getElementById('payjomabill');
            let paybokeyabill = document.getElementById('paybokeyabill');

            axios.post(`core/billpay_core.php?paytotal=${paytotalbill.value}
            &&payjoma=${payjomabill.value}
            &&paybokeya=${paybokeyabill.value}
            &&id=${id}
            &&name=${name.value}
            &&date=${date.value}
            &&month=${month.value}
            &&year=${year.value}
            `)
                .then(function(response) {
                    payBillSaveBtn.innerHTML = `Save`;
                    toastMy(response.data);
                    // modalPayBill.classList.add('d-none');
                    window.location.reload();
                })
                .catch(function(error) {
                    alert(error.data);
                })
        });
    </script>
</body>

</html>