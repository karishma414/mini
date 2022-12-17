<?php
require('top.inc.php');


$cart_total=0;
foreach($_SESSION['cart'] as $key=>$val){
    $productArr=get_product($con,'','',$key);
       $image=$productArr[0]['image'];
       $name=$productArr[0]['name'];
       $mrp=$productArr[0]['mrp'];
       $selling=$productArr[0]['selling'];
       $qty=$val['qty'];
       $cart_total=$cart_total+($selling*$qty);
       

?>
