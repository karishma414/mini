
<?php  
 require('top.inc.php');
 if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con, $_GET['type']);
   if($type=='delete'){
    $id=get_safe_value($con,$_GET['id']);
    $delete_sql="DELETE from orders  where id='$id'";
    mysqli_query($con,$delete_sql);
 }
}
 $sql=" SELECT  *from orders order by id asc";
 $res=mysqli_query($con ,$sql);

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
    <title>ORDER US</title>
    <style>
        .content{
          margin-top:100px;
         margin-left:280px;
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
     
        .badge-delete{
          background:red;
          padding:10px;
        }
    
    </style>
</head>
<body>
  
<div class="content">
<div class="container">
  
  <table class="table table-striped table-hover">
      <thead>
        <tr> 
       <h2> Order Us</h2>
        </tr>
         <tr>
           <th scope="col">#</th>
           <th scope="col">ID</th>
           <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">PMODE</th>
            <th scope="col">PAYMENT STATUS</th>
            <th scope="col">ORDER STATUS</th>
       </tr>
     </thead>
  <tbody>
  <tbody>
         <?php 
            $i=1;
            $res=mysqli_query($con,"SELECT `orders`.*,order_status.name as order_status_str FROM `orders`,order_status 
            where order_status.id=`orders`.order_status");
          while ($row=mysqli_fetch_assoc($res)){?>
     <tr>
        <td class="serial"><?php echo $i ?></td>
        <td><a href="order_details.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['phone']?></td>
        <td><?php echo $row['address']?></td> 
        <td><?php echo $row['pmode']?></td> 
        <td><?php echo $row['payment_status']?></td> 
        <td><?php echo $row['order_status_str']?></td> 
        <td>
          <?php 
          echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</span></a>";
         ?>
      
        </td>
      </tr>
      <?php
      $i++;
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

    