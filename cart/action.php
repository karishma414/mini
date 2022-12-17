<?php
    require 'config.php';
    //checkout
    if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
        $name = $_POST['name'];
        $email=$_POST['email'];
        $phone = $_POST['phone'];
        $products = $_POST['products'];
        $grand_total = $_POST['total_amount'];
        $address = $_POST['address'];
        $pmode = $_POST['pmode'];

        $data = '';

        $stmt = $conn->prepare("INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss",$name, $email,$phone,$address,$pmode,$products,$grand_total);
        $stmt->execute();
        $data .= '<div class="text-center">
            <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
            <h2 class="text-success">Your order placed successfully</h2>
            <h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h4>
              <h4>Your Name: '.$name.'</h4> 
              <h4>Your E-mail: '.$email.'</h4>
              <h4>Your Phone: '.$phone.'</h4>
              <h4>Total amount paid: '.number_format($grand_total,2).'</h4>
              <h4>Your Payment mode: '.$pmode.'</h4> 
        
        </div?';
        echo $data;
    }

?>