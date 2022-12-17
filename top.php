<?php

require('connection.inc.php');
require('function.inc.php');
$cat_res=mysqli_query($con, "SELECT * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
$cat_arr[]=$row;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarkari Bazaar</title>

    <!--Bootstrap section-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--Font awesme kit-->
    <script src="https://kit.fontawesome.com/81186a9118.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">


    <!--StyleSheet-->
    <link rel="stylesheet" href="./css/regstyle.css"/>
    <link rel="stylesheet" href="./css/stylesheet.css"/>
    <link rel="stylesheet" href="styles.css">
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
  .rounded{
    width:200px;
    height:200px;
  }

   .details {
  margin-top:5px;
  } 
  /* .info,h2{
    font-size:30px;
    font:bold;
  } */
  
</style>

</head>
<body>
    <!--header start-->
   <header>
<!--first nav-->
      <nav class="bg-success"  data-spy="affix" data-offset-top="197">
          <div class="row" >
              
              <div class="col-md-4 col-12 img-left">
                  <img src="./veggies/onlinelogomaker-041921-1211-0605-500.jpg" alt="Logo">
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
                
                      <a href="login.php" class="px-8"><i class="fas fa-sign-in-alt"></i><span>Log Out</span></a>
                      <a href="#" class="px-8"><i class="fas fa-cart-arrow-down"></i><span>My cart</span></a>
                
                      
                  </p>
              </div>
          </div>
        </nav>
        <!--first nav end-->
        <!--Second nav-->
  <div class="container-fluid p-0 ">
    
      <div class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
          <div class="row">
            <a class="navbar-brand" href="#">Shop by categories</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <?php
                     foreach($cat_arr as $list){
                         ?>
                            <li><a href="categories.php?id=<?php echo $list['id']?>">
                            <?php echo $list['categories']?></a></li>

                     <?php
                     }
                ?>
                    <li  class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contact.php">contact</a>
                    </li>
               
              </ul>
            </div>
          </div>
      </div>
  </div>
        
  </div>    
  </header>