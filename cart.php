<?php
  require('top.inc.php');
  
?>
   
<!--fixed nav-->
<style>
  .affix {
    top: 0;
    width: 100%;
    z-index: 9999 !important;
  }

  .affix + .container-fluid {
    padding-top: 70px;
  }
</style>





</head>
<body>
    

 <!--header start-->
 <header>
    
<!--navbar extraction completed-->

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
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <a href="action.php? clear= all" class="badge-danger badge p-2" onclick="return confirm('Are you sure you want to clear your cart?');"> <i class="fas fa-trash"></i>&nbsp;&nbsp; Clear Cart</a>
                        </th>
                    </tr>
                    
                    </thead>
                    <tbody>
                        <?php
                        $cart_total=0;
                        if(isset($_SESSION['cart'])){
                         
                          foreach($_SESSION['cart'] as $key=>$val){
                            $productArr=get_product($con,'','',$key);
                               $image=$productArr[0]['image'];
                               $name=$productArr[0]['name'];
                               $mrp=$productArr[0]['mrp'];
                               $selling=$productArr[0]['selling'];
                               $qty=$val['qty'];
                               $cart_total=$cart_total+($selling*$qty);
                               $_SESSION['total_amount']=$cart_total; 
                            

                        ?>
                        
                        <tr>
                        <td> <a  href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" width="100px" alt=""/></a></td>
                        <td> <span><?php echo $name?></span></td>
                        <td> <span><?php echo $selling?></span></td>
    
                       <td> <span><input type="number"  value=<?php echo $qty?> id="<?php echo $key?>qty" width="10px"></span><br>
                       <a href="#" onclick="manage_cart('<?php echo $key?>','update')"> <span>update</span></a> 
                      
                      </td>
                       <td> <span><?php echo $qty*$selling ?></span>
                       <td> <a href="#" onclick="manage_cart('<?php echo $key?>', 'remove')"><span>remove</span></a></td>
                        </tr>
                        <!--  -->
                        <?php }} ?>
                        <tr>
                            <td colspan="2">
                                <a href="index.php" class="btn btn-success"> <i class="fas fa-cart-plus"></i>&nbsp;&nbsp; Continue Shopping</a>
                            </td>
                            <td colspan='2'>
                                <b>Grand Total</b>
                            </td>
                            <td><?php echo $cart_total?></td>
                            <td>
                            <?php
                       if(isset($_SESSION['USER_LOGIN'])){
                        echo' <a href="checkout.php" class="btn btn-info "> <i class="far fa-credit-card"></i>&nbsp;&nbsp; Checkout</a>';
                     
                      }
                   
                    else{
                        echo'<a href="login.php"><i class="fas fa-sign-in-alt"></i><span>For checkout login</span></a>';
                              
                      }  ?>
                                </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Table ends for products in cart-->


  

</body>
</html>
<script>

function manage_cart(pid,type){
  if(type=='update'){
    var qty=jQuery("#"+pid+"qty").val();
  }else{
    var qty=jQuery("#qty").val();
  }
    jQuery.ajax({
                url: 'manage_cart.php',
                method: 'post',
                data:'pid='+pid+'&qty='+qty+'&type='+type ,
                success: function(result){
                  if(type=='update' || type=='remove'){
                    window.location.href='cart.php';
                  }
                  jQuery('.htc__qua').html(result);
                }
            });
  }
</script>
