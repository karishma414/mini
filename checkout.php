<?php
    require('top.inc.php');
   
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- <style>
  .affix {
    top: 0;
    width: 100%;
    z-index: 9999 !important;
  }

  .affix + .container-fluid {
    padding-top: 70px;
  }
</style> -->
</head>
<body>
    

 <!--header start-->
 <header>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center text-info p-2">Complete your order!</h4>
            <div class="jumbotron p-3 mb-2 text-center">
                <h6 class="lead"><b>Product(s) :</b></h6>
               <h5><b>Total Amount Payable</h5><br>
               <h2> <?php echo $_SESSION['total_amount'];?></h2>
            </div>
            <form action="action.php" method="post" id="placeOrder">
                <input type="hidden" name="products" value="<?php echo $totalProduct ?>">
                <input type="hidden" name="grand_total" value="<?php echo $_SESSION['total_amount'];?>">
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
                        <option value="netbanking"><a href="esewa.php">Net banking</a></option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
 require('footer.php');
?>
<!--to add user detail in database-->
<!--to add user detail in database--
</body>
</html>