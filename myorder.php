
<?php
    require('top.inc.php');
   
?>


<!--Table to show products added to cart-->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
        <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];} else {echo 'none';} unset($_SESSION['showAlert']); ?>"class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td colspan="7">
                            <h4 class="text-center text-info m-0">Products in your cart</h4>
                        </td>
                    </tr>
                    <tr>
                    <th>USER ID</th>
                        <!-- <th>ORDER DATE</th> -->
                        <th>ADDRESS</th>
                        <th>PAYMENT TYPE</th>
                        <th>PAYMENT STATUS</th>
                        <th>ORDER STATUS</th>
                        <!-- <th>
                            <a href="action.php? clear= all" class="badge-danger badge p-2" onclick="return confirm('Are you sure you want to clear your cart?');"> <i class="fas fa-trash"></i>&nbsp;&nbsp; Clear Cart</a>
                        </th> -->
                    </tr>
                    
                    </thead>
                    <tbody>
                        <?php
                        $uid=$_SESSION['USER_ID'];
                        $res=mysqli_query($con,"SELECT `orders`.*,order_status.name as order_status_str FROM `orders`,order_status 
                         where `orders`.user_id='$uid' and  order_status.id=`orders`.order_status");
                        while($row=mysqli_fetch_assoc($res)){
                        ?>
                        
                        <tr>
                        <!-- <td>
                                <a href="index.php" class="btn btn-success"> <i class="fas fa-cart-plus"></i>&nbsp;&nbsp; Continue Shopping</a>
                            </td> -->
                      <td><a href="order_detail.php?id=<?php echo $row['id'];?>"> Product--<?php echo $row['id'];?></a></td>
                      <td><a hreft="#"> <?php echo $row['address'];?></a></td>
                      <td><a hreft="#"> <?php echo $row['pmode'];?></a></td>
                      <td><a hreft="#"> <?php echo $row['payment_status'];?></a></td>
                      <td><a hreft="#">  <?php echo $row['order_status_str'];?></a></td>
                        </tr>
                     
                        <?php } ?>
                        <!-- <tr>
                            
                            <td colspan='2'>
                                <b>Grand Total</b>
                            </td>
                            <td><?php echo $cart_total?></td>
                           
                        </tr> -->
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Table ends for products in cart-->


<?php 
 require('footer.php');
?>