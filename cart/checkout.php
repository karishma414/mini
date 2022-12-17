<?php
    require 'config.php';
    $grand_total = 0;
    $allItems= '';
    $items = array();

    $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $grand_total += $row['total_price'];
        $items[]= $row['ItemQty'];
    }
    $allItems = implode(", ",$items);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
    
<!--first nav--><!--Same navbar-->
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center text-info p-2">Complete your order!</h4>
            <div class="jumbotron p-3 mb-2 text-center">
                <h6 class="lead"><b>Product(s) :</b><?= $allItems;?></h6>
               <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2)?>/-</h5>
            </div>
            <form action="" method="post" id="placeOrder">
                <input type="hidden" name="products" value="<?= $allItems;?>">
                <input type="hidden" name="grand_total" value="<?= $grand_total;?>">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Enter phone" required>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control" rows="3" cols="10" placeholder="enter delivery address"></textarea>
                </div>
                <h6 class="text-center lead">Select payment mode</h6>
                <div class="form-group">
                    <select name="pmode" class="form-control">
                        <option value="" selected disabled>-Select Payment MOde-</option>
                        <option value="cod">Cash on delivery</option>
                        <option value="netbanking">Net banking</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
<!--navbar ends-->





    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


<!--to add user detail in database-->
<script type="text/javascript">
    $(document).ready(function(){
        $("#placeOrder").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: $('form').serialize()+"&action=order",
                success: function(response){
                    $("#order").html(response);
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