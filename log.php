<?php
require('connection.inc.php');
require('function.inc.php');
if(isset($_POST['submit'])){

$email=get_safe_value($con,$_POST['email']);
$password=get_safe_value($con,$_POST['password']);
$res=mysqli_query($con,"SELECT * from users where email='$email' and status='active' ");

if(mysqli_num_rows($res)>0){
    $email_pass=mysqli_fetch_assoc($res);
    $db_pass=$email_pass['password'];
    $pass_decode=password_verify($password,$db_pass);
    if($pass_decode){
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_ID']=$email_pass['id'];
         $_SESSION['USER_NAME']=$email_pass['name'];
      echo "login success";
        ?>
       
       <script>
           location.replace("index.php");
       </script>
       <?php
       
    }else{
        echo"incorrect password";
        
    }
}
    else{
        echo "invalid email";
    }
    
  
}
?>