<?php
require('connection.inc.php');
require('function.inc.php');
if(isset($_POST['submit'])){
$username=get_safe_value($con,$_POST['username']);
$password=get_safe_value($con,$_POST['password']);
$cpassword=get_safe_value($con,$_POST['cpassword']);
$mobile=get_safe_value($con,$_POST['mobile']);
$gender=get_safe_value($con,$_POST['gender']);
$email=get_safe_value($con,$_POST['email']);
$added_on=date('Y-m-d h:i:s');

$pass= password_hash($password, PASSWORD_BCRYPT);
$cpass=password_hash($cpassword,PASSWORD_BCRYPT);
$emailquery = " SELECT * from users where email='$email'";
$query=mysqli_query($con, $emailquery);
$emailcount =mysqli_num_rows($query);

if($emailcount>0){
    echo"email alreday exist";
}
else{
    if ($password === $cpassword){
        $iquery="INSERT INTO  users(username, password, cpassword, mobile , gender,email, added_on)
        values('$username','$pass', '$cpass','$mobile', '$gender', '$email','$added_on')";
    $result =mysqli_query($con,$iquery);
    if($result){
      echo "<script>
      alert ('Registration succesfully')
      </script>";
        // header('location:index.php');
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