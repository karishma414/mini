<?php
 function addProduct($pid,$qty){
  $_SESSION['cart'['$pid']['$qty']=$qty;
     
 }
 function updateProduct($pid,$qty){
     if(isset($_SESSION['cart']['$pid'])){
        $_SESSION['cart'['$pid']['$qty']=$qty;
     }

 } 
 function rremoveProduct($pid){

    if(isset($_SESSION['cart']['$pid'])){
       unset($_SESSION['cart']['$pid']);
     }

 }
 function emptyProduct(){
    unset($_SESSION['cart']);

 }

?>