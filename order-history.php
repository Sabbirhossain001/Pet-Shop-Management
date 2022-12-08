<?php
require 'include/header.php';
include 'include/mysqlConnection.php';
?>

<script>
    window.addEventListener("load", function(){
        header_function("Order History");
    });
</script>

<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/order-history.css">
<script src="js/order-history.js"></script>
    <section id ="main">
        <div class="side-nav">
        <a href="order-history.php">Order History</a>
            <a href="vet-appointment-history.php">Vet Appointment History</a>
        </div>
        <div id="table-container">
            <table>
                <tr>
                <td colspan="6" id="table-caption"> Latest Orders</td>
                </tr>
                <tr>
                    <th class="order">Order</th>
                    <?php 
                        echo '<th class="customer">Customer</th>';
                    ?>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th class="details"></th>
                </tr>
                <?php
                    $orderQuery = mysqli_query($dbCon, "SELECT u.username, o.order_id, o.date_created, o.status, o.total 
                                FROM user as u INNER JOIN order_history as o ON u.user_id = o.user");
                    $rows = 0;
                    while($row = mysqli_fetch_array($orderQuery)){
                        
                        if ($rows%2==0)
                            echo '
                                <tr class="even-row">';
                        else 
                            echo '<tr class="odd-row">';
                        echo'       
                                <td class="order">'.$row['order_id'].'</td>
                                <td class="customer">'.$row['username'].'</th>
                                <td class="date">'.$row['date_created'].'</td>
                                <td class="total">$'.$row['total'].'</td>
                                <td class="status">
                                    <select>
                                        <option value = "Processing">Processing</option>
                                        <option value = "Ongoing">Ongoing</option>
                                        <option value = "Completed">Completed</option>
                                    </select>
                                    <span>'.$row['status'].'</span></td>
                                <td class="details"><button>View Details</button>&nbsp;
                                    <span class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</span>
                                    <i class="fa fa-check" aria-hidden="true"></i><i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                                </tr>
                        ';
                        $rows++;    
                    }
                ?>        
            </table>
        </div>
        
    </section>

<?php
require 'include/footer.html';
?>