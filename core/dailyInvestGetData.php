<?php
if(!isset($_COOKIE['PHPLGA'])){
    header('location:../login.php');
  }
                require_once('config.php');
                $date=date('j');
                $select = "SELECT * FROM daily_invest  WHERE date='$date'";
                $runQuery = mysqli_query($conn, $select);

                while ($data = mysqli_fetch_array($runQuery)) { ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['item']; ?></td>
                        <td><?php echo $data['price']; ?></td>
                        <td><?php echo $data['quantity']; ?></td>
                        <td><?php echo $data['discount']; ?></td>
                        <td><?php echo $data['total_price']; ?></td>
                        <td><?php echo $data['addedBy']; ?></td>
                    </tr>
                <?php } ?>