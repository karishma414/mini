<?php
     require('top.inc.php');
    $categories="";
     $msg="";

     if(isset($_GET['id']) && $_GET['id']!='' ){
        $id=get_safe_value($con,$_GET['id']);
        $res=mysqli_query($con,"SELECT *from categories where id='$id'"); 
        $check=mysqli_num_rows($res);
        if($check>0){
        $row=mysqli_fetch_assoc($res); 
        $categories=$row['categories'];
      }
      else {
        header('location:categories.php');
        die();
      }
    }


     if(isset($_POST['submit'])){
      $categories=get_safe_value($con,$_POST['categories']);
     mysqli_query($con,"INSERT INTO  categories(categories,status) VALUES( '$categories', '1')");
       header('location:categories.php');
     
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add categories</title>
<style>
 .command{
 margin-top:100px;
 margin-left:270px;
 position:fixed;
 background-size: cover;
 transition: 0.5s;
 }
 #check:checked ~ .command{
          margin:80px;
        }
    
</style>

</head>
<body>
    
    <div  class="command">
        <div class="container">
          <table>
           <form method="post" action="">
                  <div class="from-group  ">
                     <label for="categories" class="form-label">Categories</label>
                     <input type="text" class="form-control"  name="categories" required   value="<?php echo $categories ?>">
                </div><br>
                <div>
                    <button type="submit"  name="submit" class="btn btn-primary">Submit</button><br>
                    <?php echo $msg?>
               </div>
            </form>
      </table>
      </div>
  </div>
</body>
</html>