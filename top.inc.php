<?php
require('connection.inc.php');
require('function.inc.php');
require('add_to_cart.inc.php');
$cat_res=mysqli_query($con, "SELECT * from categories where status=1 order by categories desc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
$cat_arr[]=$row;
  }
$obj=new add_to_cart();
$totalProduct =$obj->totalProduct();
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <!--StyleSheet-->
    <!-- <link rel="stylesheet" href="./css/regstyle.css"/> -->
 <link rel="stylesheet" href="./css/stylesheet.css"/>
  <link rel="stylesheet" href="styles.css">
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
 .choose{
    padding: 4px;
    display:inline;
    margin-top:-20px;
    margin-left:30px;
    margin-right:0px;
    align-items:left;
 color:white;
  }
  .choose a{
    font-size:15px;
    decoration:none;
    text-decoration:none;
    color:white;
    padding:10px;
    font-size:1.2em;
  }
  /* .nav-item{
    text-decoration:none;
    color:black;
  } */

  /* .register{
  margin-right:20px;
  display:block;
  } */

  
.navbar-nv {
  padding: 0.8 em 0em;
}
#navbarNav ul li {
  padding: 3px;
  margin: 8px;
}

.navbar-nav .nav-link {
  font-size: 1em;
  color: rgb(31, 13, 13) !important;
}
.navbar-nav .nav-item .nav-link {
  padding: 0 1.3em;
}
.navbar-nav .basket-icon:hover {
  color: green;
}
.collapse navbar-collapse ul li {
  margin: 2px;
  padding: 3px;
}
.collapse navbar-collapse ul li a {
  text-decoration: none;
}


registratuonn 
form .user-detail .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
.user-detail .input-box .details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-detail .input-box input {
  height: 45px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-detail .input-box input:focus,
.user-detail .input-box input:valid {
  border-color: #9b59b6;
}
form .gender-details .gender-title {
  font-size: 20px;
  font-weight: 500;
}
form .gender-details .category {
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}
.gender-details .category label {
  display: flex;
  align-items: center;
}
.gender-details .category .dot {
  height: 18px;
  width: 18px;
  background: #d9d9d9;
  border-radius: 50%;
  margin-right: 10px;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
#dot-1:checked ~ .category label .one,
#dot-2:checked ~ .category label .two,
#dot-3:checked ~ .category label .three {
  border-color: #d9d9d9;
  background: #9b59b6;
}
form input[type="radio"] {
  display: none;
}
form .button {
  height: 45px;
  margin: 45px 0;
}
form .button input {
  height: 100%;
  width: 100%;
  outline: none;
  color: #fff;
  border: none;
  font-size: 18px;
  font-weight: 500;
  border-radius: 5px;
  letter-spacing: 1px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
form .button input:hover {
  cursor: pointer;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

/* @media (max-width: 584px) {
  .container {
    max-width: 100%;
  }
  form .user-detail .input-box {
    margin-bottom: 15px;
    width: 100%;
  }
  form .gender-details .category {
    width: 100%;
  }
  .container form .user-detail {
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-detail::-webkit-scrollbar {
    width: 0;
  }
}
password visibility */
#toggle {
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
  width: 30px;
  height: 30px;
  background: url(show.png);
  background-size: cover;
  cursor: pointer;
}
#toggle.hide {
  background: url(hide.png);
  background-size: cover;
}

.registra {
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px 30px;
  border-radius: 5px;
}
.registra .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
  margin-bottom: 20px;
}
.registra .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  background: #9b59b6;
}
.registra form .user-detail {
  /* display: flex; */
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12 px 0;
}
.width.p{
  width:600px;
}
.move{
  padding:10px;
  margin-top:200px;
  /* margin-right:100px; */
}
.details {
  width:150px;
  margin-left:15px;
}
.navbar-brand{
  align-items: center;
  color:red;
  justify-content: space-between;
  margin-left:300px; 
  position: relative;
  animation: mymove 5s infinite;
}

@keyframes mymove {
  from {left: 0px;}
  to {left: 800px;}
}
.htc__qua{
  padding:0px;
  align-items:left;
}
.htc__shopping_cart{
  margin-top:-22px;
  margin-right:-90px;
}
#num{
  margin-top:-20px;
}
.card1{
  width:300px;
  height:300px;
}
.card-img-top{
  width:300px;
  height:300px;
}
.move{
  position:relative;
  margin-top:-45px;
  color:white;
  font-size:30px;
  padding:0px;
}




.show {display: block;}
.btn1{
  background-color: #008CBA;
  color:black;
  width:100%;
  padding:10px;
  border-radius:20px;
  font-size:15px;
  margin:10px 0;
  border:none;
  outline:none;
  cursor:pointer;
}
.btn2{
 
  background-color: #008CBA;
  color:black;
  width:100%;
  padding:10px;
  border-radius:20px;
  font-size:15px;
  margin:10px 0;
  border:none;
  outline:none;
  cursor:pointer;

}
.link{
  text-decoration:none;
  color:black;
}
hr{
  border:1px solid black;
}
.or{
  padding:0px;
  text-align:center;
  font-size:13px;
}
.cat{
  text-align:center;
  color:black;
  font-size:16px;
}
.con{
  color:black;
  font-size:16px;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  color:black;
  display: none;
  position: absolute;
  background-color: gray;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 5px 5px;
  z-index: 1;
 text-align:center;
}

.dropdown:hover .dropdown-content {
  display: block;
  
}
.order{
  color:black;
}

</style>

</head>
<body>
    <!--header start-->
   <header>
<!--first nav-->
      <nav class=" container-fluid bg-success"  data-spy="affix" data-offset-top="197">
          <div class="row" >
              <div class="col-md-4 col-12 img-left">
                  <a href="index.php"><img src="./veggies/onlinelogomaker-041921-1211-0605-500.jpg" alt="Logo"></a>
              </div>
              <div class="col-md-4 col-12 text-right">
              
                <form action="search.php" method="get">
                <div class="navbar navbar-expand-sm 8 navbar-dark">
                    <input class="form-control mr-sm-2" type="text"  name="str" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                    </div>
                  </form>
               
                <br>
              </div>
              <div class="col-md-3 col-6 text-right">
                  <p class="my-md-3 rej text-right">
                      <div class="choose ">
                      <?php
                       if(isset($_SESSION['USER_LOGIN'])){
                        echo'    <a href="logout.php"><i class="fas fa-sign-in-alt"></i><span>Log out</span></a>
                        <div class="dropdown">
                        <span><a href="#">myProfile</a></span>
                        <div class="dropdown-content">
                        <p class="order"><a href="myorder.php">order placed </a></p>

                        <p class="order"><a href="profile.php">My Profile</a></p>
                        </div>
                      </div>';
                     
                      }
                     else{
                      echo '<a href="login.php"><i class="fas fa-sign-in-alt"></i><span>Log In</span></a>';
                      echo '<a href="register.php" class=" text-center pt-2"><i class="fas fa-user badge-light"> 
                      </i><span>Register</span></a>';
                     }
                     ?>
                     <div class="htc__shopping_cart">
                      <a href="cart.php" class=" cart_menu"><i class="fas fa-cart-arrow-down"></i><span>cart</span></a>
                     <a href="cart.php"><span  id="num" class="htc__qua"><?php echo $totalProduct ?></span></a>
                    </div>
                    </div>                   
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
              <ul class="navbar-nav ">
                <li class="nav-item">
                   <p > <a class="nav-link active" aria-current="page" href="index.php"><span class="con">Home</span></a>
                    <?php
                        foreach($cat_arr as $list){
                            ?>
                                <li><a href="categories.php?id=<?php echo $list['id'] ?>" class="cat">
                                <?php echo $list['categories']?></a></li>

                        <?php
                        }
                    ?>
                    <a class="nav-link active" aria-current="page" href="contact.php"><span class="con">Contact</span></a>
                    
                   </li>
              </ul>
            </div>
          </div>
      </div>
  </div>
  </div>    
  </header>
  