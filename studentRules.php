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
    <title>Student Rules</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <h2 class="title"> <span class="backPage"></span>নিয়ম কানন</h2>
    <div class="container box-shadow Rules bg-light">
        <button class="AddBtn" onclick="modalOpen('addNewModal');">Add New</button>
        <button class="AddBtn" onclick="modalOpen('changeRulesModal');">Change</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>নং </th>
                    <th> নিয়ম </th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('core/config.php');
                $selectRules = "SELECT * FROM rules";
                $runRulesQuery = mysqli_query($conn, $selectRules);

                while ($Rules = mysqli_fetch_array($runRulesQuery)) { ?>
                    <tr>
                        <td><?php echo $Rules["id"]; ?> </td>
                        <td><?php echo $Rules["Rule"]; ?> </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>

    <form action="core/Rules_update_core.php" method="POST">
        <div class="modalMy d-none" id="changeRulesModal">
            <div class="modalMyContainer" style="max-width: 100% !important;overflow-x:auto;">
                <div class="modalMyHeader">

                </div>
                <div class="modalMyBody">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20px"> নং </th>
                                <th> নিয়ম </th>
                            </tr>
                        </thead>
                        <tbody>



                            <?php
                            $selectRules = "SELECT * FROM rules";
                            $runRulesQuery = mysqli_query($conn, $selectRules);

                            while ($Rules = mysqli_fetch_array($runRulesQuery)) { ?>
                                <tr>
                                    <td><input type="text" name="id[]" disabled style=" width: 30px;" value="<?php echo $Rules['id']; ?>"> </td>
                                    <td>
                                        <textarea name="Rule[]" style="width: 100%;" rows="2"><?php echo $Rules['Rule']; ?></textarea>
                                    </td>
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

    <div class="modalMy d-none" id="addNewModal">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <h1>Add New Rules</h1>
            </div>
            <div class="modalMyBody">
                    <input id="newrulename" class="form-control w-100"  type="text" placeholder="Rule">
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="download" type="submit" onclick="saveNewRule()" onclick="">Add</button>
                    <button class="cencel" type="button" onclick="cencel(this);">cencel</button>
                </div>
            </div>
        </div>
    </div>



    <script src="js/init.js"></script>
    <script src="js/axios.min.js"></script>

    <script>
        function saveNewRule(){
            var newRuleValue= document.getElementById('newrulename').value;
            axios.post(`core/addNewRules_core.php?rule=${newRuleValue}`)
            .then(function(response){
                alert(response.data);
                window.location.reload();
            })
            .catch(function(error){
                alert("Error : "+ error.data);
            })
        }
    </script>
</body>

</html>