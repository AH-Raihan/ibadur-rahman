<?php 
if(isset($_COOKIE['PHPLGA'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto jumbotron bg-dark text-white">
                <h1 class="">Admin Login</h1>
                <form action="core/login_core.php" method="POST">
                    <label class="form-label d-block">
                        User Name : 
                        <input type="text" name="username" placeholder="Enter Your User Name" class="form-control">
                    </label>
                    <label class="form-label  d-block">
                        User Password : 
                        <input type="password" name="userpassword" placeholder="Enter Your User Password" class="form-control">
                    </label >
                    <input type="submit" class="btn bg-success btn-block">
                </form>
            </div>
        </div>
    </div>
</body>

</html>