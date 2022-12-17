<?php
     require('connection.inc.php');
     require('function.inc.php');
  
      if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

      }else{
          header('location:login.php');
          die();
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
</head>
<body>
    <input type="checkbox" id="check">
    <div class="header-cont">
    <header>
        <label for="check"> 
            <i class="fas fa-bars" id="sidebar_btn"> </i>
        </label>
        <div class="left_area">
           <h4> TARKARI <SPAN class="text-success">BAZZAR</SPAN></h4>
        </div>
        
        <div class="right_area">
          <h3><a href="logout.php" class="logoutbtn"> logout</a></h3> 
        </div>
    </header>
    </div>
        <nav id="sidebar">
                <ul class="list-unstyled components">
                    <li >
                        <a href="menue.php"><i class="fas fa-desktop"></i><span>Deskboard</span> </a>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fas fa-list"></i><span>Categories Master</span>  </a>
                    </li>
                    <li>
                        <a href="product.php"><i class="fab fa-product-hunt"></i><span>Product Master</span> </a>
                    </li>
                    <li>
                        <a href="order.php"> <i class="fas fa-shopping-bag"></i><span>Order</span></a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fas fa-users"></i><span>User Master</span></a>
                    </li>
                    <li>
                        <a href="contact_us.php"><i class="fas fa-address-book"></i><span>Contact Us</span></a>
                    </li>
                </ul>

        </nav>
 

</body>
</html>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>