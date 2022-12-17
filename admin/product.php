
<?php  
 require('top.inc.php');
 if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con, $_GET['type']);
   if($type=='status'){
    $operation=get_safe_value($con,$_GET['operation']);
    $id=get_safe_value($con,$_GET['id']);
    if($operation=='active'){
        $status='1';
    } else {
      $status='0';
    }
    $update_status="UPDATE product set status='$status' where id='$id'";
    mysqli_query($con,$update_status);
   }
   if($type=='delete'){
    $id=get_safe_value($con,$_GET['id']);
    $delete_sql="DELETE from product where id='$id'";
    mysqli_query($con,$delete_sql);
 }
}
 $sql=" SELECT  product.*,categories.categories from  product,categories where product.categories_id=categories.id  order by product.id  desc";
 $res=mysqli_query($con ,$sql);
 print_r($res);

 
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
       <h2>Products</h2>
       <h4class="box-link" colspan="4"><a href="manage_product.php"> Add Products</a></h4>
          </div>
        </tr>
         <tr>
           <th scope="col">#</th>
           <th scope="col">ID</th>
            <th scope="col">CATEGORIES</th>
            <th scope="col">NAME</th>
            <th scope="col">IMAGE</th>
            <th scope="col">MRP</th>
            <th scope="col">PRICE</th>
            <th scope="col">QTY</th>
            <th scope="col">pcode</th>
            <th></th>
       </tr>
     </thead>
  <tbody>
  <tbody>
         <?php 
         if(mysqli_num_rows($res)>0){
          $i=1;
          while ($row=mysqli_fetch_assoc($res)){?>
     <tr>
        <td class="serial"><?php echo $i; ?></td>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['categories'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'];?>" width='100px' height="100px"/></td>
        <td><?php echo $row['mrp'];?></td>
        <td><?php echo $row['selling'];?></td>
        <td><?php echo $row['qty'];?></br></br>
      <?php
      $productSoldQtyByProductId=productSoldQtyByProductId($con,$row['id']);
      $pending_qty=$row['qty']-$productSoldQtyByProductId;
  
     ?><p><?php echo $pending_qty?></p>
     Pending
      </td>

        <td><?php echo $row['product_code'];?></td>
        <td>
          <?php 
          if($row['status']==1){
            echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;"; 
          }
          else{
            echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;"; 
          }
          echo "&nbsp<span class='badge badge-edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp";    
          echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</span></a>";
         

         ?>
      
        </td>
      </tr>
  
      <?php

    }
  }else{
     echo "<h2>No product added</h2>";
  }
        ?>
    </tbody>
  </table>
</div>
<div>
</body>
</html>
</script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

  