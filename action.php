<?php
require('top.inc.php');
    //checkout
 
    $cart_total=0;

    //   foreach($_SESSION['cart'] as $key=>$val){
    //     $productArr=get_product($con,'','',$key);
    //        $mrp=$productArr[0]['mrp'];
    //        $selling=$productArr[0]['selling'];
    //        $qty=$val['qty'];
    //        $cart_total=$cart_total+($selling*$qty);
    // }
    if(isset($_POST['submit'])){
        $name =get_safe_value($con, $_POST['name']);
        $email=$_POST['email'];
        $phone = $_POST['phone'];
        $products=$_POST['products'];
        $grand_total =$_SESSION['total_amount'];
        $address = $_POST['address'];
        $pmode = $_POST['pmode'];
        $user_id=$_SESSION['USER_ID'];
        if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key=>$val){
            $productArr=get_product($con,'','',$key);
               $mrp=$productArr[0]['mrp'];
               $price=$productArr[0]['selling'];
               $qty=$val['qty'];
            
        }
    }
        $payment_status="success";
        if($pmode=='cod'){
        $payment_status="pending";
        }
        $order_status=1;
        $added_on=date('Y-m-d h:i:s');
        $data = '';

        $query="INSERT INTO orders (user_id,name,email,phone,address,pmode,products,amount_paid,payment_status,order_status)VALUES('$user_id','$name', '$email','$phone','$address','$pmode','$products','$grand_total','$payment_status','$order_status')";
        $result=mysqli_query($con,$query);

        $order_id=mysqli_insert_id($con);
        if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key=>$val){
            $productArr=get_product($con,'','',$key);
            //    $mrp=$productArr[0]['mrp'];
               $price=$productArr[0]['selling'];
               $qty=$val['qty'];
            //    $cart_total=$cart_total+($selling*$qty);
               $query="INSERT INTO order_details (order_id,product_id,qty,price)VALUES('$order_id','$key', '$qty','$price')";
               $result=mysqli_query($con,$query);
             
            }
            unset($_SESSION['cart'])
            ?>
           
              <script>
          window.location.href="thankyou.php";
                  </script>
              <?php

            }
        // if($result){
        //     $data .= '<div class="text-center">
        //     <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
        //     <h2 class="text-success">Your order placed successfully</h2>
        //     <h4 class="bg-danger text-light  p-2">Items Purchased : '.$products.'</h4>
        //       <h4>Your Name: '.$name.'</h4> 
        //       <h4>Your E-mail: '.$email.'</h4>
        //       <h4>Your Phone: '.$phone.'</h4>
        //       <h4>Total amount paid: '.$grand_total.'</h4>
        //       <h4>Your Payment mode: '.$pmode.'</h4> 
        // </div?';
        $cart_obj= new add_to_cart();
         $cart_obj ->{'emptyProduct'}();
        echo $data;
      
        }else{
        echo"not inserted";
       
    }

?>
<?php
require('footer.php');
?>