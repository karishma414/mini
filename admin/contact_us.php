
<?php  
 require('top.inc.php');
 if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con, $_GET['type']);
   if($type=='delete'){
    $id=get_safe_value($con,$_GET['id']);
    $delete_sql="DELETE from contact_us  where id='$id'";
    mysqli_query($con,$delete_sql);
 }
}
 $sql=" SELECT  *from contact_us order by id asc";
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
    <title>Contact us</title>
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
       <h2> Contact Us</h2>
        </tr>
         <tr>
           <th scope="col">#</th>
           <th scope="col">ID</th>
           <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Query</th>
            <th scope="col">Date</th>
       </tr>
     </thead>
  <tbody>
  <tbody>
         <?php 
          $i=1;
          while ($row=mysqli_fetch_assoc($res)){?>
     <tr>
        <td class="serial"><?php echo $i ?></td>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['mobile']?></td>
        <td><?php echo $row['comment']?></td> 
        <td><?php echo $row['added_on']?></td> 
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

    