<?php
require('connection.inc.php');
require('function.inc.php');
if(isset($_POST['submit'])){
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$comment=get_safe_value($con,$_POST['comment']);
$added_on=date('Y-m-d h:i:s');
$result =mysqli_query($con,"INSERT into contact_us(name,email,mobile,comment,added_on)
values('$name','$email','$mobile','$comment','$added_on')");
if($result){
    echo"sucess";
}
else{
    echo"fail";
}
echo("thank you");
}
 ?>