<?php
if(!isset($_COOKIE['PHPLGA'])){
  header('location:user.php');
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Azizul Hasan Raihan (AHR)">
  <title>Dashboard</title>
  <link rel="shortcut icon" href="images/ib-logo.png" type="image/png">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="manifest" href="manifest.json">
</head>

<body>

  <?php
  require_once("core/config.php");
  ?>

  <h2 class="jumbotron p-3 text-center title">মাদ্রাসাতু ইবাদুর রহমান</h2>
  
  <div class="container">




    <nav class="navbar navbar-expand-md">

      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./dailyInvest.php">প্রতিদিনের খরচ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./monthlyInvest.php">খরচ সমূহ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./studentsList.php">ছাত্রের তালিকা</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./studentPaymentList.php">ছাত্রদের বেতনের তালিকা</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./flatBill.php">ভাড়া সমূহ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./notice.php">নোটিশ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./studentRules.php">নিয়ম কানন</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./studyRoutine.php">পড়ার রুটিন</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./eatingtime.php">ক্লাসের সময়সূচী</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./reciptAll.php">রশিদ বই</a>
        </li>
      </ul>
    </nav>

    <hr>
    <div class="row">
      <div class="col-sm-2 my-3 text-white p-3 bg-success dashbox">
        এই মাসের আয়ঃ- <br>
        <?php
        $thisyear = date('Y');
        $thisMonth = strtolower(date('F'));
        $selectRciept = "SELECT joma FROM receipt WHERE month='$thisMonth' AND year='$thisyear' AND type='fee'";
        $runRcieptQuery = mysqli_query($conn, $selectRciept);
        $jomaTaka = 0;
        while ($data = mysqli_fetch_array($runRcieptQuery)) {
          $jomaTaka += intval($data['joma']);
        }
        echo "<br><span class='STaka'>$jomaTaka</span> টাকা";
        ?>
      </div>
      <div class="col-sm-2 my-3 text-white p-3 bg-danger dashbox">
        এই মাসের ব্যায়ঃ- <br>
        <?php
        $thismonth = date('n');
        $selectMonthInvest = "SELECT * FROM daily_invest WHERE month='$thismonth' AND year='$thisyear'";
        $runMonthInvestQuery = mysqli_query($conn, $selectMonthInvest);
        $monthInvestTaka = 0;
        while ($data = mysqli_fetch_array($runMonthInvestQuery)) {
          $monthInvestTaka += intval($data['total_price']);
        }
        
        // bills
        $MonthBillsTaka = 0; 
        $selectMonthBills = "SELECT * FROM receipt WHERE month='$thisMonth' AND year='$thisyear' AND type='bill'";
        $runMonthBillsQuery = mysqli_query($conn, $selectMonthBills);
        while ($dataBillsMonth = mysqli_fetch_assoc($runMonthBillsQuery)) {
          $MonthBillsTaka += intval($dataBillsMonth['joma']);
        }
        echo "<br><span class='STaka'>".$MonthBillsTaka+$monthInvestTaka."</span> টাকা";

        ?>
      </div>
      <div class="col-sm-2 my-3 text-white p-3 bg-secondary dashbox">
        এই মাসের লাভঃ- <br>
        <?php
        
        echo "<br><span > ".$jomaTaka-($MonthBillsTaka+$monthInvestTaka)."</span> টাকা";

        ?>
      </div>
      <div class="col-sm-2 p-3 my-3 bg-warning dashbox">
        এই মাসের বকেয়াঃ- <br>
        <?php
        $thismonth = strtolower(date('F'));
        $selectRcieptbokeya = "SELECT * FROM receipt WHERE month='$thismonth' AND year='$thisyear'";
        $runRcieptbokeyaQuery = mysqli_query($conn, $selectRcieptbokeya);
        $bokeyaTaka = 0;
        while ($data = mysqli_fetch_array($runRcieptbokeyaQuery)) {
          $bokeyaTaka += intval($data['bokeya']);
        }
        echo "<br><span class='STaka'>$bokeyaTaka</span> টাকা";
        ?>

      </div>



      <div class="col-sm-3 p-3 text-white my-3 bg-info dashbox">
        এই মাসের বেতন পরিশোদ করেনিঃ- <br>
        <?php
        $thismonth = strtolower(date('F'));
        $selectRcieptNot = "SELECT * FROM fees WHERE $thismonth='none' AND year='$thisyear'";
        $runRcieptNotQuery = mysqli_query($conn, $selectRcieptNot);

        echo "<span class='STaka'>" . mysqli_num_rows($runRcieptNotQuery) . "</span> জন";

        ?>
      </div>
    </div>

    <!-- year -->
    <hr>


    <div class="row">
      <div class="col-sm-3 my-3 text-white p-3 bg-success dashbox">
        এই বছরের আয়ঃ- <br>
        <?php
        
        $selectRcieptYear = "SELECT * FROM receipt WHERE year='$thisyear' AND type='fee'";
        $runRcieptYearQuery = mysqli_query($conn, $selectRcieptYear);
        $jomaTaka = 0;
        while ($data = mysqli_fetch_array($runRcieptYearQuery)) {
          $jomaTaka += intval($data['joma']);
        }
        echo "<br><span class='STaka'>$jomaTaka</span>";
        ?>
      </div>

      <div class="col-sm-3 my-3 text-white p-3 bg-secondary dashbox">
        এই বছরের লাভঃ- <br>
        <?php
        // daylyInvest
        $thisyear = date('Y');
        $selectYearInvest = "SELECT * FROM daily_invest WHERE year='$thisyear'";
        $runYearInvestQuery = mysqli_query($conn, $selectYearInvest);
        $yearRecieptTaka = 0;
        
        
        while ($dataYear = mysqli_fetch_array($runYearInvestQuery)) {
          $yearRecieptTaka += intval($dataYear['total_price']);
        }
        
        
        // bills
        $yearBillsTaka = 0;
        $selectYearBills = "SELECT * FROM receipt WHERE year='$thisyear' AND type='bill'";
        $runYearBillsQuery = mysqli_query($conn, $selectYearBills);
        while ($dataBills = mysqli_fetch_assoc($runYearBillsQuery)) {
          $yearBillsTaka += intval($dataBills['joma']);
        }
        $lavYear = $jomaTaka - ($yearRecieptTaka + $yearBillsTaka);
        echo "<br><span class='STakaa'>$lavYear</span> টাকা";

        ?>
      </div>

      <div class="col-sm-3 my-3 text-white p-3 bg-danger dashbox">
        এই বছরের ব্যায়ঃ- <br>
        <?php
        $thisyear = date('Y');
        $selectMonthInvest = "SELECT * FROM daily_invest WHERE year='$thisyear'";
        $runMonthInvestQuery = mysqli_query($conn, $selectMonthInvest);
        $monthInvestTaka = 0;
        while ($data = mysqli_fetch_array($runMonthInvestQuery)) {
          $monthInvestTaka += intval($data['total_price']);
        }
        echo "<br><span class='STaka'>".$monthInvestTaka+$yearBillsTaka."</span> টাকা";

        ?>
      </div>

      <div class="col-sm-2 my-3 text-white p-3 bg-danger dashbox">
        এই বছরের বকেয়াঃ- <br>
        <?php
        $thisyear = date('Y');
        $selectYearBokeya = "SELECT * FROM receipt WHERE year='$thisyear' AND type='fee'";
        $runYearBokeyaQuery = mysqli_query($conn, $selectYearBokeya);
        $monthBokeyaTaka = 0;
        while ($dataBokeya = mysqli_fetch_array($runYearBokeyaQuery)) {
          $monthBokeyaTaka += intval($dataBokeya['bokeya']);
        }
        echo "<br><span class='STaka'>".$monthBokeyaTaka."</span> টাকা";

        ?>
      </div>

    </div>



  </div>

  <a href="core/adminlogout.php" class="btn fa-pull-right" onclick="return confirm('are you sure?'); false"><i class="fas fa-sign-out-alt"></i> Logout</a>

  <script src="js/jquery.min.js"></script>
  <script src="js/init.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
