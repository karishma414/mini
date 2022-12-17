<?php
require('connection.inc.php');
require('function.inc.php');
if(isset($_POST['submit'])){
//  $success="";
$username=get_safe_value($con,$_POST['username']);
$password=get_safe_value($con,$_POST['password']);
$cpassword=get_safe_value($con,$_POST['cpassword']);
$mobile=get_safe_value($con,$_POST['mobile']);
$gender=get_safe_value($con,$_POST['gender']);
$email=get_safe_value($con,$_POST['email']);
$added_on=date('Y-m-d h:i:s');
$pattern = "/^[(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4}$/";
if(empty($_POST['mobile'])){
  $_SESSION['error']="please enter mobile number";
  return false;
}else if(strlen($_POST['mobile'])>=11){
  $_SESSION['error'] ="mobile number should be 10 digit";
  return false;
}
//  else if(!preg_match($pattern,'moblie'){
//   $_SESSION['error']="please valid number";
//   return false;
// }

$pass= password_hash($password, PASSWORD_BCRYPT);
$cpass=password_hash($cpassword,PASSWORD_BCRYPT);

$token = bin2hex(random_bytes(15));

$emailquery = " SELECT * from users where email='$email'";
$query=mysqli_query($con, $emailquery);
$emailcount =mysqli_num_rows($query);

if($emailcount>0){
    echo"email alreday exist";
}
else{
    if ($password === $cpassword){
        $iquery="INSERT INTO  users(username, password, cpassword, mobile , gender,email, added_on, token, status)
        values('$username','$pass', '$cpass','$mobile', '$gender', '$email','$added_on','$token','inactive')";
    $result =mysqli_query($con,$iquery);
    
        if($iquery){
          ?>
          <script>
            alert("inserted");
            </script>
          <?php
        }
        else{
          ?>
          <script>
            alert(" no inserted");
            </script>
          <?php

        }
    if($result){
    
     $subject = "Email Activation";
     $body = "Hi, $username. Click here to activate your account http://localhost/mini/activation.php?token=$token ";
      $sender_email = "From: tarkaribazaar143@gmail.com";

      if(mail($email, $subject, $body, $sender_email)){
         $_SESSION['msg']= "check your mail to activate your account $email";
         header('location:login.php');
        echo"not done:";
            }else{
        echo" Email failed";
      }
     
          }
     
    else{
      echo"fail";
      header('location:register.php');
     }
} 
else{
    echo "password not match";
   }
}

}
 ?>