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
    <title>All Invest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <h1 class="title"> <span class="backPage"></span>খরচ সমূহ</h1>
    <div class="TableContainer">
        <table id="datatable" class="table table-striped table-responsive-lg table-bordered dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>T Price</th>
                    <th>Added By</th>
                </tr>
            </thead>
            <tbody id="investData">
                <?php
                require_once('core/config.php');
                $date = date('j');
                $select = "SELECT * FROM daily_invest WHERE date='$date'";
                $runQuery = mysqli_query($conn, $select);
                $total = 0;
                if ($runQuery == true) {
                    while ($data = mysqli_fetch_array($runQuery)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td class="STaka"><?php echo $data['item']; ?></td>
                            <td class=""><?php echo $data['date']."/".$data['month']."/".$data['year']; ?></td>
                            <td class="STaka"><?php echo $data['price']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td class="STaka"><?php echo $data['discount']; ?></td>
                            <td class="STaka"><?php echo $data['total_price']; ?></td>
                            <td><?php echo $data['by']; ?></td>
                        </tr>
                        <?php
                        $total += intval($data['total_price']);
                        ?>
                <?php }
                }
                echo "মোটঃ- <span class='STaka'>$total</span> টাকা"; ?>
            </tbody>
        </table>
    </div>

    </div>

    

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>
    
</body>

</html>