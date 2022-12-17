<?php
require('top.inc.php');
// ob_start();
if(isset($_POST['submit'])){
    $email=get_safe_value($con,$_POST['email']);
    // $emailquery = " SELECT * from users where email='$email' and status='active'";
    $query=mysqli_query($con,  " SELECT * fROM users WHERE email='$email' AND status='active'");
   
    
    if(mysqli_num_rows($query)){
    
        $userdata=mysqli_fetch_assoc($query);
        $username =$userdata['username'];
        $token=$userdata['token'];
        
          $subject = "Password reset";
          $body = "Hi, $username. Click here to reset your account http://localhost/mini/reset_password.php?token=$token";
          $sender_email = "From:tarkaribazaar143@gmail.com";
          if(mail($email, $subject, $body, $sender_email)){
             $_SESSION['msg']= "check your mail to reset your account $email";
            // header('location:login.php');
            echo"successful";
             ?>
             <script>
             location.replace('login.php');
                 </script>
             <?php
          
            }else{
            echo" Email sending fail";
          }
         }
    
        else{
          echo"No email found";
        //   header('location:register.php');
         }
    } 
    
 ?>

<section class="reg my-5">
    <div class="container">
        <div class="registr bg-light">
            <h4 class="card-title mt-3 text-center">Recover Account</h4>
            <p class="text-center">Please fill email id properly</p>
        <!-- <div class="title">Register</div> -->
        <form action="" method="post">
            <div class="user-detail">
       
                <div class="input-box ">
                    <input type="email"  name="email"  class="text-center"placeholder="Enter your email" required>
                </div>
           
                <button type="submit"  name="submit"  value="Register">Send Mail</button>
      
            <p  class="text-center">Have an account<a href="login.php"> login</a> </p>
            </div>
        </form>
    </div>
</div>
     </section>
  