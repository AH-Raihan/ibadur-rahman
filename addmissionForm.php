<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ভর্তি ফরম</title>
    <link rel="shortcut icon" href="images/dt-logo.png" type="image/png">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="background:#d5d5d5;">
    <span class="backPage"></span>
    <h1 class="container title printNone text-white p-3 text-center">ছাত্রাবাসের ভর্তি ফরম </h1>
    <div class="container">
        <button class="btn btn-outline-success print row" onclick="window.print();">Print Form</button>
    </div>
    <div id="printCon" class="container jumbotron bg-white box-shadow">
        <?php
        if (isset($_REQUEST['wrong'])) {
            echo "<p class='text-danger'>Somthing is wrong!</p>";
        }
        ?>
        <form action="core/addmissionForm_core.php" method="POST">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">মাদ্রাসাতু ইবাদুর রহমান</h2>
                    <h4 class="text-center">ভর্তি ফরম</h4>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form mb-3">
                        <label for="nameBn">নাম (বাংলা)*</label>
                        <input class="form-control" type="text" name="nameBn" id="nameBn" required>
                    </div>
                    <div class="form mb-3">
                        <label for="name">নাম *</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form mb-3">
                        <label for="fathername">পিতার নাম</label>
                        <input class="form-control" type="text" name="fathername" id="fathername">
                    </div>
                    <div class="form">
                        <label for="mothername">মাতার নাম</label>
                        <input class="form-control" type="text" name="mothername" id="mothername">
                    </div>
                </div>
                <div class="col-sm-4  photoDiv">
                    <div class="border">
                        <img src="images/student photo.jpg" id="avatarImg" alt="">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form">
                        <label for="fathermobile">পিতার মোবাইল নং*</label>
                        <input class="form-control" type="text" name="fathermobile" id="fathermobile" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form">
                        <label for="mothermobile">মাতার মোবাইল নং</label>
                        <input class="form-control" type="text" name="mothermobile" id="mothermobile">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form">
                        <label for="mobile_imo">পিতা/মাতার ইমু নাম্বার </label>
                        <input class="form-control" type="text" name="mobile_imo" id="mobile_imo">
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="form">
                        <label for="studentmobile">ছাত্রের মোবাইল নং *</label>
                        <input class="form-control" type="text" name="studentmobile" id="studentmobile" required>
                    </div>
                </div> -->
            </div>
            <br>
            <div class="row">
                <div class="col-sm-8 form">
                    <label for="address">ঠিকানা *</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="col-sm-4 form">
                    <label for="dateOfBirth">জন্ম তারিখ</label>
                    <input type="date" pattern="dd/mm/YYYY" name="dateOfBirth" id="dateOfBirth" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3 form">
                    <label for="class">শ্রেণি *</label>
                    <input type="text" name="class" list="classList" id="class" class="form-control" required>
                    <datalist id="classList">
                        <option value="১ম">
                        <option value="২য়">
                    </datalist>
                </div>
                
               
                <div class="col-sm-3 form">
                    <label for="roll">রোল *</label>
                    <input type="text" name="roll" id="roll" class="form-control" required>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-12 form">
                    <label for="joinDate">তারিখ</label>
                    <input type="date" name="joinDate" id="joinDate" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" name="" id="chekoyada">
                    <label for="chekoyada" onclick="submitOyada();">আমি ওয়াদা করছি মাদরাসার সকল নিয়ম কানন মেনে চলব ।</label>

                </div>

            </div>
            <div class="row printNone">
                <div class="col-sm-12">
                    <input type="submit" disabled value="Submit" id="submit" class="form-control bg-light text-dark">
                </div>
            </div>
            <br>
            <div class="footerPrintContainer onlyPrint">
                <div class="footerPrintSubContainer ">
                    <div class="footerPrint">
                        <p class="">অভিভাবক স্বাক্ষর </p>
                        <img src="images/dt.png" alt="">
                        <p class=" float-right">শিক্ষক স্বাক্ষর</p>
                    </div>
                </div>
            </div>



    </div>


    </form>

    </div>


    <script>
        var chekoyada = document.getElementById('chekoyada');
        var printCon = document.getElementById('printCon');
        var submit = document.getElementById('submit');
        var joinDate = document.getElementById('joinDate');
        var dateOfBirth = document.getElementById('dateOfBirth');

        function submitOyada() {
            if (chekoyada.checked) {
                submit.setAttribute('disabled', 'disabled');
                submit.classList.add('bg-light');
                submit.classList.remove('bg-success');
                submit.classList.add('text-dark');
                submit.classList.remove('text-white');
            } else {
                submit.removeAttribute('disabled');
                submit.classList.remove('bg-light');
                submit.classList.add('bg-success');
                submit.classList.add('text-white');
                submit.classList.remove('text-dark');
            }
        }
    </script>
    <script src="js/init.js"></script>
    <script src="js/axios.min.js"></script>
    <script>
        var avatarImg = document.getElementById('avatarImg');
        var tmCode = document.getElementById('tmCode');
        tmCode.addEventListener('change', function() {
            avatarImg.src = "https://tm.edu.bd/mms/images/student/" + tmCode.value + ".jpg";
        });
    </script>
    <script src="js/custom.js"></script>


    <script>
        window.addEventListener('beforeprint', function() {
            joinDate.type = "text";
            dateOfBirth.type = "text";
            printCon.classList.remove('container');
        });
        window.addEventListener('afterprint', function() {
            joinDate.type = "date";
            dateOfBirth.type = "date";
            printCon.classList.add('container');
        });
    </script>
</body>

</html>