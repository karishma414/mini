<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarkari Bazaar</title>
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
    
<!--first nav--><!--Same as before-->
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
<!--navbar ends-->


<!--code for products to show in card in main page-->
<div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
        <?php
            include'config.php';
            $stmt = $conn->prepare("SELECT * FROM product");
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()):

        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
            <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="<?= $row['product_image']?>" class="card-img-top" height="250">
                    <div class="card-body p-1">
                        <h4 class="card-title text-center text-info"><?=$row['product_name']?></h4>
                        <h5 class="card-text text-center text-danger"><?= number_format($row['product_price'],2)?>/-</h5>
                    </div>
                    <div class="card-footer p-1">
                        <form action="" class="form-submit">
                            <input type="hidden" class="pid" value="<?= $row['id']?>">
                            <input type="hidden" class="pname" value="<?= $row['product_name']?>">
                            <input type="hidden" class="pprice" value="<?= $row['product_price']?>">
                            <input type="hidden" class="pimage" value="<?= $row['product_image']?>">
                            <input type="hidden" class="pcode" value="<?= $row['product_code']?>">
                            <button class="btn btn-info btn-block addItemBtn">Add to cart</button>
                        </form>
               
           </div>
        
                </div>
            </div>
        </div>
        <?php endwhile;?>
           
    </div>
</div>


<!--card ends-->



    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


    <!--add product-->
<script type="text/javascript">
    $(document).ready(function(){
        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice= $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode},
                success: function(response){
                    $("#message").html(response);
                    window.scrollTO(0,0);
                    load_cart_item_number();
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