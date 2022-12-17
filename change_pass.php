<?php
require('top.inc.php');
// ob_start();

if(isset($_POST['submit'])){

 $oldpassword=get_safe_value($con,$_POST['oldpassword']);
$newpassword=get_safe_value($con,$_POST['password']);
$cpassword=get_safe_value($con,$_POST['cpassword']);
$uid=$_SESSION['USER_ID'];
$pass= password_hash($newpassword, PASSWORD_BCRYPT);
$cpass=password_hash($cpassword,PASSWORD_BCRYPT);
$query=mysqli_query($con,"SELECT password from users where id='$uid'");
$row=mysqli_fetch_assoc($query);
if($row>0){
    $cof=$password_verify($oldpassword,$row['password']);
    if($cof){
       $result=mysqli_query($con,"UPDATE users SET password='$pass' where id='$uid'");
       if($result){
           echo"updated";
       }
    }

    }
}
  
    // $result =$updatequery);
    // if($result){
 
    ?>
    <!-- <script>
    location.replace('login.php');
        </script> -->
    <?php
        
 

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
                    <span class="details">Old password</span>
                    <input type="password" name="oldpassword" placeholder="Enter your  old password" required>
                    
                </div>
                <div class="input-box">
                    <span class="details">New password</span>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    
                </div>

                <div class="input-box">
                    <span class="details">Confirm password</span>
                    <input type="password" name="cpassword" placeholder="Enter your password" class="widthp">
                </div>
            </div>
            <button type="submit"  name="submit" clas="btn2" value="Register">Update</button>
            </div>

        </form>
    </div>
</div>
     </section>
    <?php
    require('footer.php');
    ?>