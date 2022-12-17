<?php
    session_start();
?>
<!--Extracted from index.php for navbar-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    
    <!--Bootstrap section-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--Font awesme kit-->
    <script src="https://kit.fontawesome.com/81186a9118.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">



    <!--StyleSheet-->
    <link rel="style" href="./css/stylesheet.css"/>
    
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
    
<!--first nav-->
      <nav class="bg-success"  data-spy="affix" data-offset-top="197">
          <div class="row" >
              
              <div class="col-md-4 col-12 img-left" >
              <a href="index.php" >
                  <img src="./images/onlinelogomaker-041921-1211-0605-500.jpg" alt="Logo" >
                </a>
              </div>
              <div class="col-md-4 col-12 text-right">
                <div class="navbar navbar-expand-sm 8 navbar-dark">
                  
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                  
                </div>
                <br>
                
              </div>
              <div class="col-md-4 col-12 text-right">
                  <p class="my-md-4 rej text-right">
                      <a href="register.html" class="px-8 text-center pt-2"><i class="fas fa-user badge-light"></i> <span>Register</span></a>
                      <a href="#" class="px-8"><i class="fas fa-sign-in-alt"></i> <span>Log in</span></a>
                      
                      <a href="checkout.php" class="px-8"> <span>Checkout</span></a>
                      <a href="cart.php" class="px-8"><i class="fas fa-cart-arrow-down"></i> <span id="cart-item"class="badge badge-danger"></span></a>
                  </p>
              </div>
          </div>

</nav>
<!--navbar extraction completed-->

<!--Table to show products added to cart-->
<div class="container">
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
                        <th>ID</th>
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
                            require 'config.php';
                            $stmt = $conn->prepare("select * FROM cart");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grand_total = 0;
                            while($row = $result->fetch_assoc()):
                        
                        ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                            <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                            <td><?= $row['product_name']?></td>
                            <td>Rs &nbsp;&nbsp;<?= number_format($row['product_price'],2); ?></td>
                            <input type="hidden" class="pprice" value="<?= $row['product_price']?>">
                            <td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;"></td>
                            <td>Rs &nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                            <td>
                                <a href="action.php?remove=<?= $row['id']?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove this product');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $grand_total +=$row['total_price'];?>
                        <?php endwhile;?>
                        <tr>
                            <td colspan="3">
                                <a href="index.php" class="btn btn-success"> <i class="fas fa-cart-plus"></i>&nbsp;&nbsp; Continue Shopping</a>
                            </td>
                            <td colspan='2'>
                                <b>Grand Total</b>
                            </td>
                            <td><b>Rs &nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                            <td>
                                <a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"": "disabled"?>"> <i class="far fa-credit-card"></i>&nbsp;&nbsp; Checkout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Table ends for products in cart-->





    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <!--use of ajax-->
<script type="text/javascript">
    $(document).ready(function(){
        $(".itemQty").on('change',function(){
            var $el = $(this).closest('tr');

            var pid = $el.find(".pid").val();
            var pprice = $el.find(".pprice").val();
            var qty = $el.find(".itemQty").val();
            location.reload(true);
            $.ajax({
                url: 'action.php',
                method: 'post',
                cache: false,
                data: {qty:qty, pid:pid, pprice:pprice},
                success: function(response){
                    
                    console.log(response);
                }
            });
        });
       
        load_cart_item_number();

        function load_cart_item_number(){
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: {cartItem:"cart_item"},
                success: function(response){
                    $("#cart-item").html(response);
                }
            });
        }
    });
</script>
</body>
</html>