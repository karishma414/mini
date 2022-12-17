<?php
 require('connection.inc.php');
 require('function.inc.php');
 $msg="";
 if(isset($_POST['submit'])){
    $username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con, $_POST['password']);
    $sql="SELECT *from admin_users where username='$username' and password='$password' ";
    $res=mysqli_query($con, $sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_USERNAME']=$username;
        header('location:categories.php');
        die();
    } 
    else{
        $msg="please enter correct login details";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <style>
   .form-container{
   opacity: 1;
   position: absolute;
   top: 15vh;
   padding: 30px;
   border-radius: 10px;
   box-shadow:0px, 0px,10px,0px;
   -webkit-box-shadow:1-px 4px 26px 11px rgba(0,0,0,0.75);
   -moz-box-shadow:1-px 4px 26px 11px rgba(0,0,0,0.75);
   box-shadow:-1px 4px 26px 11px rgba(0,0,0,0.75);
}
 .bg{
   background: url('images/bg.jpg.webp') no-repeat;
   width: 100%;
   height: 100vh;
   background-size: cover;
 }

 
 </style>
   </head>
<body>
   <section class="container-fluid bg">
     <section  class="row justify-content-center">
       <section  class="col-12 col-sm-6 col-md-3">
         <form  method="post" class="form-container">
           <div class="from-group text-black">
             <label  class="form-label">Username</label>
             <input type="text" class="form-control"  name="username" required placeholder=" enter user name">
             </div><br>
           <div class="from-group text-black">
             <label  class="form-label">Password</label>
             <input type="password" class="form-control" name="password" placeholder=" enter your passwpord" required>
           </div>
           <br>
           <div>
             <input type="checkbox">
             <label>Remember me</label>
           </div>
           <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
           <br>
           <div class="text-danger text-danger-50">
           <?php echo $msg?>
           </div>
         </form> 
       </section > 
     </section >
   </section >
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
