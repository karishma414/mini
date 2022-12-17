<?php

 function pr($arr){
    echo'<pre>';
    print_r($arr);
 }
    
function prx($arr){
    
    echo'<pre>';
    print_r($arr);
    die();
    }
    function get_safe_value($con , $str){
    if($str!=''){  
        $str=trim($str);
    return mysqli_real_escape_string($con, $str);
}
}

function get_product($con, $limit='', $cat_id='',$product_id='', $search_str=''){
    $sql="SELECT product.*,categories.categories from product,categories  where product.status=1 ";
 
    if($cat_id!=''){
        $sql.=" and product.categories_id=$cat_id ";
    }
    if($product_id!=''){
        $sql.=" and product.id=$product_id";
    }
    
    if($search_str!=''){
        $sql.= "and (product.name like '%$search_str%' or product.description like '%$search_str%') ";
    }
    $sql.=" and product.categories_id=categories.id";
    $sql.=" ORDER BY product.id desc";
    if ($limit!= ''){
        $sql.="product.limit $limit";
    }
//   echo   $sql;
    $res=mysqli_query($con, $sql) or die(mysqli_error($con));
    $data=array();
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}

 function productSoldQtyByProductId($con,$pid){
     $sql="SELECT sum(order_details.qty) as qty from order_details,`orders` 
     where `orders`.id=order_details.order_id and order_details.product_id=$pid
      and `orders`.order_status!=3"; 
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res); 
        return $row['qty'];


}

function productQty($con,$pid){
    $sql="SELECT qty from product where id='$pid'"; 
       $res=mysqli_query($con,$sql);
       $row=mysqli_fetch_assoc($res); 
       return $row['qty'];


}
?>