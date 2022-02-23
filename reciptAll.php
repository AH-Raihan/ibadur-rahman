<?php require_once('core/config.php');
if (!isset($_COOKIE['PHPLGA'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>রশিদ বই</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <style>
        .paynowbtn{
            display: none;
        }
    </style>
</head>

<body>

    <h1 class="title"><span class="backPage"></span>রশিদ বই </h1>

    <div class="tableContainer">
        <table class="table dataTable" id="datatable">
            <thead>
                <tr>
                    <td>নং</td>
                    <td>রশিদ নং</td>
                    <td>নাম</td>
                    <td>মাস</td>
                    <td>বছর</td>
                    <td>টাকা</td>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once('core/config.php');
                $select = "SELECT * FROM receipt";
                $run = mysqli_query($conn, $select);
                while ($datas = mysqli_fetch_array($run)) { ?>
                    <tr>
                        <td><?php echo $datas['id']; ?></td>
                        <td><?php echo "<p class='paymentText bg-darkblue paid' data-recieptno='". $datas['reciept_no'] . "'>". $datas['reciept_no'] . "</p>"; ?></td>
                        <td><?php echo $datas['studentName']; ?></td>
                        <td><?php echo $datas['month']; ?></td>
                        <td><?php echo $datas['year']; ?></td>
                        <td><?php echo $datas['total']; ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>


    <div class="modalMy d-none" id="paidModal"></div>




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
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
            axios.post(`./core/paidData_core.php?reciept_no=${recieptNo}`)
                .then(function(response) {
                    modalPaid.innerHTML = response.data;
                })
                .catch(function(error) {
                    alert(error);
                })
        }
    </script>
</body>

</html>