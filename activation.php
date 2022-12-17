<?php
require('connection.inc.php');
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $updatequery= "update users set status='active' where token='$token'";

        $query = mysqli_query($con,$updatequery);

        if($query){
            if(isset($_SESSION['msg'])){
                $_SESSION['msg'] = "Account updated successfully";
                header('location:login.php');
            }else{
                $_SESSION['msg'] = "please login";
                header('location:login.php');
            }
        }
        else{
                $_SESSION['msg'] = "Account not updated ";
                header('location:register.php');
            }
       
    }
?>