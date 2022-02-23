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
    <title>Daily Invest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <h1 class="title"> <span class="backPage"></span> প্রতিদিনের খরচ</h1>
    <div class="TableContainer">
        <button class="AddBtn" onclick="modalOpen('addNewInvest');">Add New</button>
        <table id="datatable" class="table table-striped table-responsive-lg table-bordered dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>T Price</th>
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
                            <td class="STaka"><?php echo $data['price']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td class="STaka"><?php echo $data['discount']; ?></td>
                            <td class="STaka"><?php echo $data['total_price']; ?></td>
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

    <div class="modalMy d-none" id="addNewInvest">
        <div class="modalMyContainer">
            <div class="modalMyHeader">

            </div>
            <div class="modalMyBody">
                <div class="row">
                    <label for="item" class="col-sm-12">
                        Item <input id="item" list="itemData" type="text" class="form-control" placeholder="Item Name">

                        <datalist id="itemData">
                            <option>আলু</option>
                            <option>ডিম</option>
                            <option>তৈল</option>
                            <option>সবজি </option>
                            <option>মুরগি </option>
                            <option>মাছ </option>
                        </datalist>
                    </label>
                </div>
                <div class="row">
                    <label for="price" oninput="calculate();" class="col-sm-4">
                        Price <input type="text" id="price" list="priceData" class="form-control" placeholder="Price">
                        <datalist id="priceData">
                            <option>10</option>
                            <option>20</option>
                            <option>30</option>
                            <option>40</option>
                            <option>50</option>
                            <option>60</option>
                            <option>70</option>
                            <option>80</option>
                            <option>90</option>
                            <option>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                            <option>500</option>
                            <option>600</option>
                            <option>700</option>
                            <option>800</option>
                            <option>900</option>
                            <option>1000</option>
                            <option>2000</option>
                        </datalist>
                    </label>
                    <label for="quantity" oninput="calculate();" class="col-sm-4">
                        Quantity <input type="text" id="quantity" list="quantityData" class="form-control" placeholder="Quantity">
                        <datalist id="quantityData">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </datalist>
                    </label>
                    <label for="discount" oninput="calculate();" class="col-sm-4">
                        Discount <input type="text" list="priceData" id="discount" class="form-control" placeholder="Discount Price">
                    </label>
                </div>
                <div class="row">
                    <label for="totalprice" class="col-sm-12">
                        Total Price <input type="text" list="priceData" id="totalprice" class="form-control" placeholder="Total Price" required>
                    </label>
                </div>
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="download" id="saveNewItem">Save</button>
                    <button class="cencel" onclick="cencel(this);">Cencel</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $('#saveNewItem').click(function() {
            var item = $("#item").val();
            var price = $("#price").val();
            var discount = $("#discount").val();
            var quantity = $("#quantity").val();
            var totalprice = $("#totalprice").val();

            // insertToDatabase(item, price, quantity, discount, totalprice);
            insertToStorage(item, price, quantity, discount, totalprice);
        });

        function calculate() {
            var price = $("#price").val();
            var discount = $("#discount").val();
            var quantity = $("#quantity").val();
            var totalprice = $("#totalprice");
            if (quantity < 1) {
                quantity = 1;
            }
            document.getElementById('totalprice').value = (price * quantity) - discount;


        }


        function insertToDatabase(item, price, quantity, discount, totalprice) {
            if (totalprice === "") {
                alert('price is empty');
            } else {
                axios.post(`core/dailyInvest_core.php?item=${item}&&
            price=${price}&&
            quantity=${quantity}&&
            discount=${discount}&&
            total_price=${totalprice}
            `)
                    .then(function(response) {
                        alert(response.data);
                        investDataGet();
                        STakaFu();
                    })
                    .catch(function(error) {
                        alert(error.data);
                    })
            }

        }

        function insertToStorage(item, price, quantity, discount, totalprice) {

            if (!localStorage.getItem('listInvest')) {
                var arr = new Array();
                localStorage.setItem('listInvest', JSON.stringify(arr));
            } else {
                var beforeList = JSON.parse(localStorage.getItem('listInvest'));
                beforeList.push({
                    item: item,
                    price: price,
                    quantity: quantity,
                    discount: discount,
                    totalprice: totalprice
                });
                console.log(beforeList);
                localStorage.setItem('listInvest', JSON.stringify(beforeList));
                ifOnlieTable();
            }


        }



        var listFromStorage = JSON.parse(localStorage.getItem('listInvest'));

        function ifOnlie() {
            if (listFromStorage.length > 0) {

                for (let i = 0; i < listFromStorage.length; i++) {
                    axios.post(`core/dailyInvest_core.php?item=${listFromStorage[i].item}&&
                        price=${listFromStorage[i].price}&&
                        quantity=${listFromStorage[i].quantity}&&
                        discount=${listFromStorage[i].discount}&&
                        total_price=${listFromStorage[i].totalprice}
                        `)
                        .then(function(response) {
                            investDataGet();
                            STakaFu();
                        })
                        .catch(function(error) {
                            alert(error.data);
                        })

                    if (i === listFromStorage.length - 1) {
                        localStorage.setItem('listInvest', JSON.stringify(new Array()));
                    }
                }

            }
        }
        function ifOnlieTable(){
            if (navigator.onLine) {
            ifOnlie();
        }else{
            document.getElementById('investData').innerHTML ='';
            var localStorageList= JSON.parse(localStorage.getItem('listInvest'));
            for (let i = 0; i < localStorageList.length; i++) {
                document.getElementById('investData').innerHTML +=`<tr>
                <td>${i}</td>
                <td>${localStorageList[i].item}</td>
                <td>${localStorageList[i].price}</td>
                <td>${localStorageList[i].quantity}</td>
                <td>${localStorageList[i].discount}</td>
                <td>${localStorageList[i].totalprice}</td>
                </tr>`;
            }
        }
        }
        ifOnlieTable();
        


        function investDataGet() {
            axios.post('core/dailyInvestGetData.php')
                .then(function(response) {
                    $('#investData').html(response.data);
                })
                .catch(function(error) {
                    alert(error.data);
                })
        }
    </script>
</body>

</html>