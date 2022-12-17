<?php
require('top.inc.php');
ob_start();
if(isset($_POST['submit'])){
    if(isset($_GET['token'])){
 $token= $_GET['token'];
$newpassword=get_safe_value($con,$_POST['password']);
$cpassword=get_safe_value($con,$_POST['cpassword']);


$pass= password_hash($newpassword, PASSWORD_BCRYPT);
$cpass=password_hash($cpassword,PASSWORD_BCRYPT);

if($newpassword === $cpassword){
     $updatequery="update users set password='$pass' where token='$token'";
    $result =mysqli_query($con,$updatequery);
    if($result){
    $_SESSION['msg']="your password has been updated";
    ?>
    <script>
    location.replace('login.php');
        </script>
    <?php
        }
     
    else{
        $_SESSION['passmsg']="your password is not updated";
        header('location:rest_password.php');
   
     }
} else{
    $_SESSION['passmsg']="password are not matching";
    echo"password are not matching";
}
}else{
    echo"no token found";

}
}
 ?>
    

<section class="reg my-5">
    <div class="container">
        <div class="registra bg-light">
        <h4 class="card-title mt-3 text-center">Recover Account</h4>
            <p class="text-center"> Get your account </p>
            
            <p class="bg-info text-white px-5"><?php 
            if(isset($_SESSION['passmsg'])){
                echo $_SESSION['passmsg'];
            }else{
                echo $_SESSION['passmsg']="";
            }

            ?></p>
        <!-- <div class="title">Register</div> -->
        <form action="" method="post">
            <div class="user-detail">
            
                <div class="input-box">
                    <span class="details">New password</span>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    
                </div>
                <div class="input-box">
                    <span class="details">Conform password</span>
                    <input type="password" name="cpassword" placeholder="Enter your password" class="widthp">
                </div>
            </div>
            <button type="submit"  name="submit" clas="btn2" value="Register">Send Mail</button>
            </div>

        </form>
    </div>
</div>
     </section>
    <?php
    require('footer.php');
    ?>