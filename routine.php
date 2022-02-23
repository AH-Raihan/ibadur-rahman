<?php
if(!isset($_COOKIE['PHPLGA'])){
  header('location:login.php');
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>খাবার রুটিন</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <h2 class="title"> <span class="backPage"></span>খাবার রুটিন</h2>
    <div class="container box-shadow routine bg-light">
    <h1 class="onlyPrint text-center">দারুত তারবিয়া ছাত্রাবাস</h1>
    <h2 class="onlyPrint text-center">খাবার রুটিন</h2>
        <button class="AddBtn printNone" onclick="modalOpen('changeRoutineModal');">Change</button>
        <table class="table table-bordered">
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
                require_once('core/config.php');
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
    </div>

    <form action="core/routine_update_core.php" method="POST">
        <div class="modalMy d-none" id="changeRoutineModal">
            <div class="modalMyContainer" style="max-width: 100% !important;overflow-x:auto;">
                <div class="modalMyHeader">

                </div>
                <div class="modalMyBody">
                    <table class="table table-bordered">
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
                                    <input type="hidden" name="id[]" value="<?php echo $routine['id']; ?>"> 
                                    <td><input type="text" name="day[]" value="<?php echo $routine['day']; ?>"> </td>
                                    <td><input type="text" name="morning[]" value="<?php echo $routine['morning']; ?>"> </td>
                                    <td><input type="text" name="noon[]" value="<?php echo $routine['noon']; ?>"> </td>
                                    <td><input type="text" name="night[]" value="<?php echo $routine['night']; ?>"> </td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
                <div class="modalMyFooter">
                    <div class="row">
                        <button class="download" type="submit">Save</button>
                        <button class="cencel" type="button" onclick="cencel(this);">cencel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="js/init.js"></script>
</body>

</html>