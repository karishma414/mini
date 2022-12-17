
<?php
 require('top.inc.php');
   $order_id=get_safe_value($con,$_GET['id']);
   if(isset($_POST['update_order_status'])){
       echo $update_order_status=$_POST['update_order_status'];
        mysqli_query($con, "update `orders` set order_status='$update_order_status' where id='$order_id'");
   }
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
                    <th>PRODUCT NAME</th>
                        <!-- <th>ORDER DATE</th> -->
                        <th>PRODUCT IMAGE</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>
                        <th>TOTAL PRICE</th>
                       
                        <!-- <th>
                            <a href="action.php? clear= all" class="badge-danger badge p-2" onclick="return confirm('Are you sure you want to clear your cart?');"> <i class="fas fa-trash"></i>&nbsp;&nbsp; Clear Cart</a>
                        </th> -->
                    </tr>
                    
                    </thead>
                    <tbody>
                        <?php
                        $uid=$_SESSION['USER_ID'];
                        $res=mysqli_query($con, "SELECT distinct(order_details.id),order_details.*,product.name,
                        product.image,`orders`.address  FROM  
                        order_details,product ,`orders` WHERE order_details.order_id='$order_id'
                         AND `orders`.user_id='$uid' AND  order_details.product_id=product.id");
                        $total_price=0;
                       
                        while($row=mysqli_fetch_assoc($res)){
                       $total_price=$total_price+($row['price']*$row['qty']);
                       $address=$row['address'];
                    //    $order_status=$row['order_status'];
                       ?>
                        
                        <tr>
                        <!-- <td>
                                <a href="index.php" class="btn btn-success"> <i class="fas fa-cart-plus"></i>&nbsp;&nbsp; Continue Shopping</a>
                            </td> -->
                      <!-- <td><a hreft="#"> <?php echo $row['name'];?></a></td> -->
                      <td><a hreft="#"> <?php echo $row['name'];?></a></td>
                      <td><a hreft="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'];?>"></a></td>
                      <td><a hreft="#"> <?php echo $row['qty'];?></a></td>
                      <td><a hreft="#">  <?php echo $row['price'];?></a></td>
                      <td><a hreft="#">  <?php echo $row['price']*$row['qty'];?></a></td>
                      <!-- <th>Grand Total</th> -->
                        </tr>
                     
                        <?php } ?>
                        <tr>
                            
                            <td colspan='4'>
                                <b>Grand Total</b>
                            </td>
                            <td><?php echo $total_price?></td>
                           
                        </tr>
                    
                    </tbody>
                </table>
                <div>
                    <strong>Address</strong>
                    <?php echo $address;?>
                    <strong>Order status</strong>
                    <?php
                    $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`orders` where `orders`.id='$order_id' and `orders`.order_status=order_status.id"));
                    echo $order_status_arr['name'];
                    ?>
                    <div>
                        <form method="post">
                        <select class="form-control" name="update_order_status">
                             <option> Select categories</option>
                                <?php
                                     $res=mysqli_query($con,"SELECT * from order_status ");
                                     while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$categories_id){
                                        echo"<option  selected value=".$row['id'].">".$row['name']."</option>";   
                                       }
                                   
                                     else {
                                        echo"<option value=".$row['id'].">".$row['name']."</option>";                 
                             
                                     }
                                    }
     
                                ?>
                                
                        </select>
                        <input type="submit" class="form-control"/>
                        </form>
                        </div>
            </div>
        </div>
    </div>
</div>
<!--Table ends for products in cart-->


