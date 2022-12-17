<?php
require('connection.inc.php');
require('function.inc.php');
if(isset($_POST['submit'])){
    $email=get_safe_value($con,$_POST['email']);
    $emailquery = " SELECT * from users where email='$email'";
    $query=mysqli_query($con, $emailquery);
    $count=mysqli_num_rows($query);
    
    if($count>0){
        $userdata=mysqli_fetch_assoc($query);
        $username =$userdata['username'];
        $token=$userdata['token'];
          $subject = "Password reset";
          $body = "Hi, $username. Click here to reset your account http://localhost/mini/reset_password.php?token=$token ";
          $sender_email = "From: tarkaribazaar143@gmail.com";
          if(mail($email, $subject, $body, $sender_email)){
             $_SESSION['msg']= "check your mail to reset your account $email";
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