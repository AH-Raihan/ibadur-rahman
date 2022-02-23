<?php require_once('core/config.php');
if (!isset($_COOKIE['PHPLGA'])) {
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>ছাত্রের তালিকা</title>
    <link rel="shortcut icon" href="images/dt-logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>


    <h1 class="title"><span class="backPage "></span>ছাত্রের তালিকা</h1>
    <a href="addmissionForm.php" id="addStudent" class="AddBtn printNone">Add Student</a>
    <button id="viewFullDetails" class="btn btn-info">Full Details</button>
    <a href="editStudent.php" id="editStudentBtn" class="btn btn-warning float-right">Edit Student</a>
    <button class="btn btn-success float-right" id="printBtn" onclick="printDivTable();">Print</button>
    <div class="studentTableContainer" id="studentTableList">
        <table border="1" class="table  dataTable w-100 table-striped studentListTable">
            <thead>
                <tr>
                    <th>নং</th>
                    <th>নাম</th>
                    <th class="no">নাম EN</th>
                    <th>পিতার নাম</th>
                    <th class="no">মাতার নাম </th>
                    <th>পিতার মোবাইল </th>
                    <th class="no">মাতার মোবাইল </th>
                    <th class="no">ইমু নাম্বার </th>
                    <th class="no">ঠিকানা </th>
                    <th>শ্রেণি </th>
                    <th class="no">রোল </th>
                    <th class="no">বয়স </th>
                    <th class="no">ভর্তির তারিখ</th>
                    <!-- <th>ছবি</th> -->
                    <th>অন্যান্য</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $selectQuery = "SELECT * FROM students WHERE status='active'";
                $runQuery = mysqli_query($conn, $selectQuery);
                echo "<p class='mot'>মোট ছাত্র :- " . mysqli_num_rows($runQuery) . "</p>";
                $countStudent = 1;
                while ($student =  mysqli_fetch_array($runQuery)) {

                ?>

                    <tr class="everyStudent">
                        <td><?php echo $countStudent; ?></td>
                        <td><?php echo $student['nameBn']; ?></td>
                        <td class="no"><?php echo $student['name']; ?></td>
                        <td><?php echo $student['father_name']; ?></td>
                        <td class="no"><?php echo $student['mother_name']; ?></td>
                        <td><a href="tel:<?php echo $student['mobile_father']; ?>"><?php echo $student['mobile_father']; ?></a></td>
                        <td class="no"><a href="tel:<?php echo $student['mobile_mother']; ?>"><?php echo $student['mobile_mother']; ?></a></td>
                        <td class="no"><a href="tel:<?php echo $student['mobile_imo']; ?>"><?php echo $student['mobile_imo']; ?></a></td>
                        <td class="no"><?php echo $student['address']; ?></td>
                        <td><?php echo $student['class']; ?></td>
                        <td class="no"><?php echo $student['roll']; ?></td>
                        <td class="no"><?php $dateOfBirth = $student['dateOfBirth'];
                                        $dateOfBirthYear = substr($dateOfBirth, 0, 4);
                                        $year = date('Y');
                                        echo intval($year) - intval($dateOfBirthYear);

                                        ?></td>
                        <td class="no"><?php echo $student['date_of_join']; ?></td>
                        <!-- <td><img src="<?php // echo $student['photo'];
                                            ?>"></td> -->
                        <td><a href="core/addFeeList_core.php?studentName=<?php echo $student['nameBn']; ?>&&studentId=<?php echo $student['id']; ?>&&class=<?php echo $student['class']; ?>">বেতন</a></td>
                    </tr>

                <?php $countStudent++;
                } ?>
            </tbody>
        </table>
    </div>


    <div class="d-none" id="printStudentList">
        <button class="closePrintDiv printNone btn btn-danger my-3" id="closePrintDiv" onclick="closePrintDivFunc()">Close</button>
        <button class="printNone btn btn-success" onclick="window.print();">Print</button>
        <h2 class="printNone">Print Student List</h2>
        <h2 class="onlyPrint text-center">ছাত্রের তালিকা</h2>
        <div id="tablePrintDiv">

        </div>

    </div>




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                paging: false
            });
            $('.dataTables_length').addClass('bs-select');

        });
    </script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>
    <script>
        var studentTableList = document.getElementById("studentTableList");
        var tablePrintDiv = document.getElementById("tablePrintDiv");

        tablePrintDiv.innerHTML = studentTableList.innerHTML;

        var editStudentBtn = document.getElementById('editStudentBtn');
        var viewFullDetails = document.getElementById('viewFullDetails');
        var printBtn = document.getElementById('printBtn');
        var addStudent = document.getElementById('addStudent');
        var closePrintDiv = document.getElementById('closePrintDiv');

        var printStudentList = document.getElementById('printStudentList');
        var studentTableList = document.getElementById('studentTableList');
        var studentTableList = document.getElementById('studentTableList');

        function printDivTable() {
            printStudentList.classList.remove('d-none');
            studentTableList.classList.add('d-none');

            editStudentBtn.classList.add('d-none');
            viewFullDetails.classList.add('d-none');
            printBtn.classList.add('d-none');
            addStudent.classList.add('d-none');
        }

        function closePrintDivFunc() {
            printStudentList.classList.add('d-none');
            studentTableList.classList.remove('d-none');

            editStudentBtn.classList.remove('d-none');
            viewFullDetails.classList.remove('d-none');
            printBtn.classList.remove('d-none');
            addStudent.classList.remove('d-none');
        }

        var everyTrThInner = document.querySelectorAll('#tablePrintDiv table thead tr th');

        for (let i = 0; i < everyTrThInner.length; i++) {
            everyTrThInner[i].innerHTML += "<span class='closeBtn'>X</span>";
        }


        function closeFunc() {
            var closeBtn = document.getElementsByClassName('closeBtn');
            for (let i = 0; i < closeBtn.length; i++) {

                closeBtn[i].addEventListener('dblclick', function() {
                    var everyTr = document.querySelectorAll('#tablePrintDiv table tbody tr');
                    var everyTrTh = document.querySelectorAll('#tablePrintDiv table thead tr th');
                    everyTrTh[i].classList.add('d-none');
                    for (let index = 0; index < everyTr.length; index++) {
                        let tdChild = everyTr[index].children;
                        tdChild[i].classList.add('d-none');
                    }
                });
            }
        }
        closeFunc();


        var everyTrTdClose = document.querySelectorAll('#tablePrintDiv table tbody tr');

        for (let i = 0; i < everyTrTdClose.length; i++) {
            everyTrTdClose[i].innerHTML += `<td class="printNone closeBtn" ondblclick="this.parentNode.remove();">X</td>`;
        }


        var viewFullDetails = document.getElementById('viewFullDetails');
        var everyStudent = document.getElementsByClassName('everyStudent');
        var everyStudentTd = document.querySelectorAll('.no');
        viewFullDetails.addEventListener('click', function() {
            for (let i = 0; i < everyStudentTd.length; i++) {
                everyStudentTd[i].classList.remove('no');
            }
        });
    </script>
</body>

</html>