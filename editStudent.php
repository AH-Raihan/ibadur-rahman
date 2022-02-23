<?php require_once('core/config.php');
if (!isset($_COOKIE['PHPLGA'])) {
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>ছাত্রের তালিকা Edit</title>
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
    <div class="studentTableContainer" id="studentTableList">
        <table border="1" id="datatable" class="table  dataTable w-100 table-striped">
            <thead>
                <tr>
                    <th>নং</th>
                    <th>নাম</th>
                    <th>পিতার নাম</th>
                    <th>শ্রেণি </th>
                    <th>status </th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                <?php

                $selectQuery = "SELECT * FROM students ORDER BY status";
                $runQuery = mysqli_query($conn, $selectQuery);
                echo "<p>মোট ছাত্র :- " . mysqli_num_rows($runQuery) . "</p>";

                while ($student =  mysqli_fetch_array($runQuery)) {

                ?>

                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['nameBn']; ?></td>
                        <td><?php echo $student['father_name']; ?></td>
                        <td><?php echo $student['class']; ?></td>
                        </td>
                        <td><select class="btn btn-danger" onchange="changeStatus(<?php echo $student['id']; ?>,this.value);">
                                <?php
                                $status = $student['status'];
                                if ($status === "active") {
                                    echo '<option value="active" selected>Active</option>';
                                    echo '<option value="none">None</option>';
                                } else {
                                    echo '<option value="none" selected>None</option>';
                                    echo '<option value="active">Active</option>';
                                }

                                ?>

                            </select></td>
                        </td>
                        <td>
                            <a class="btn btn-info" href="./studentEditForm.php?id=<?php echo $student['id']; ?>">Edit</a>
                            
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>



    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });

        function changeStatus(id, status) {
            var conf = confirm('sure?'); 
            if(conf==true){
                axios.post(`core/changeStatus.php?id=${id}&&status=${status}`)
                .then(function(response) {
                    alert(response.data);
                })
                .catch(function(error) {
                    alert(error.data);
                })
            }else{
                return false;
            }
            
        }
    </script>
</body>

</html>