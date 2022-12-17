<?php
 require('top.inc.php');
  $order_id=get_safe_value($con,$_GET['id']);
   if(isset($_POST['update_order_status'])){
       echo $update_order_status=$_POST['update_order_status'];
        mysqli_query($con, "update `orders` set order_status='$update_order_status' where id='$order_id'");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
    <title>product</title>
    <style>
        .content{
          margin-top:100px;
          margin-left:300px;
          position:absolute;
          background-size: cover;
          transition: 0.5s;
          transition-property:left;
          height:auto;
        }
        .table table-striped{
          height:100%;
          width:75%;

        }
        #check:checked ~ .content{
          margin:80px;
        }
        table tr td a{
          text-decoration:none;
        }
        tr:hover {
          text-decoration:none;
          transition: 0.5s;
          transition-property:left;
        }
        h4{
          color:black;
        }
        .box-link{
          
          transition:0.5s;
          transition-property:left;
        } 
        .badge a{
          padding:10px;
          color:white;
          font-size:15px;
          text-decoration:none;
        }
        .badge-complete{
          background:#00c292;
          padding:10px;
        }
        .badge-pending{
          background:orange;
          padding:10px;
        }
        .badge-delete{
          background:red;
          padding:10px;
        }
        .badge-edit{
          background:blue;
          padding:10px;
        }
    </style>
</head>
<body>
  
<div class="content">
<div class="container">
  
  <table class="table table-striped">
      <thead>
        <tr> 
        <div>
       <h2>ORDER DETAILS</h2>

          </div>
                       <th>PRODUCT NAME</th>
                        <th>PRODUCT IMAGE</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>
                        <th>TOTAL PRICE</th>
                       
                        <!-- <th>
                            <a href="action.php? clear= all" class="badge-danger badge p-2" onclick="return confirm('Are you sure you want to clear your cart?');"> <i class="fas fa-trash"></i>&nbsp;&nbsp; Clear Cart</a>
                        </th> -->
                    </tr>
                    
     </thead>

  <tbody>      <?php
                     
                        $res=mysqli_query($con, "SELECT distinct(order_details.id),order_details.*,product.name,product.image FROM  
                        order_details,product ,`orders` WHERE order_details.order_id='$order_id'
                         AND  order_details.product_id=product.id");
                           $total_price=0;
                        while($row=mysqli_fetch_assoc($res)){
                            $total_price=$total_price+($row['price']*$row['qty']);
                            // $address=$row['address'];
                        ?>
                        
                        <tr>
                        <!-- <td>
                                <a href="index.php" class="btn btn-success"> <i class="fas fa-cart-plus"></i>&nbsp;&nbsp; Continue Shopping</a>
                            </td> -->
                      <!-- <td><a hreft="#"> <?php echo $row['name'];?></a></td> -->
                      <td><a hreft="#"> <?php echo $row['name'];?></a></td>
                      <td><a hreft="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'];?>"></a></td>
                      <td><a hreft="#"> <?php echo $row['qty'];?></a></td>
                      <td><a hreft="#">  <?php echo $row['price'];?></a></td>
                      <td><a hreft="#">  <?php echo $row['price']*$row['qty'];?></a></td>
                        </tr>
                     
                        <?php } ?>
                        <tr>
                            
                            <td colspan='4'>
                                <b>Grand Total</b>
                            </td>
                            <td><?php echo $total_price?></td>
                           
                        </tr>
                    
                    </tbody>
                </table>
                <div>
                        <form method="post">
                        <select class="form-control" name="update_order_status">
                             <option> Select categories</option>
                                <?php
                                     $res=mysqli_query($con,"SELECT * from order_status ");
                                     while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$id){
                                        echo"<option  selected value=".$row['id'].">".$row['name']."</option>";   
                                       }
                                   
                                     else {
                                        echo"<option value=".$row['id'].">".$row['name']."</option>";                 
                             
                                     }
                                    }
     
                                ?>
                                
                        </select>
                        <input type="submit" class="form-control"/>
                        </form>
                        </div>
  
</div>
<div>
</body>
</html>
</script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

  