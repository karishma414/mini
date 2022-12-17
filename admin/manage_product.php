<?php
     require('top.inc.php');
    $categories="";
     $msg="";
     $name="";
     $mrp="";
     $selling="";
     $qty="";
     $image="";
     $short_desc="";
     $description="";
     $meta_title="";
     $meta_desc="";
     $meta_key="";
     $product_code="";
     $image_required='required'; 

     if(isset($_GET['id']) && $_GET['id']!='' ){
       
        $image_required=''; 
        $id=get_safe_value($con,$_GET['id']);
        $res=mysqli_query($con,"SELECT * from product where id='$id' "); 
        $check=mysqli_num_rows($res);
        if($check>0){
        $row=mysqli_fetch_assoc($res); 
        $categories_id=$row['categories_id'];
        $name=$row['name'];
        $mrp=$row['mrp'];
        $selling=$row['selling'];
        $qty=$row['qty'];
        $short_desc=$row['short_desc'];
        $description=$row['description'];
        $meta_title=$row['meta_title'];
        $meta_desc=$row['meta_desc'];
        $meta_key=$row['meta_key'];
        $product_code=$row['product_code'];
        
      }
      else {
        header('location:product.php');
        die();
      }
    }


     if(isset($_POST['submit'])){
  
      $categories_id=get_safe_value($con,$_POST['categories_id']);
      $name=get_safe_value($con,$_POST['name']);
      $mrp=get_safe_value($con,$_POST['mrp']);
      $selling=get_safe_value($con,$_POST['selling']);
      $qty=get_safe_value($con,$_POST['qty']);
      $short_desc=get_safe_value($con,$_POST['short_desc']);
      $description=get_safe_value($con,$_POST['description']);
      $meta_desc=get_safe_value($con,$_POST['meta_desc']);
      $meta_title=get_safe_value($con,$_POST['meta_title']);
      $meta_key=get_safe_value($con,$_POST['meta_key']);
      $product_code=get_safe_value($con,$_POST['product_code']);
  
  
      $res=mysqli_query($con,"SELECT *from product where name='$name'"); 
       $check=mysqli_num_rows($res);
        if($check>0){
          if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }
            else{
              $msg="product already exist";
            }
        }

            else{
              $msg="product already exist";
              } 
               
        }

        if($msg==''){     
        if(isset($_GET['id']) && $_GET['id']!=''){
          if($_FILES['image']['name']!=''){
            print_r($_FILES['image']['name']);
         $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
         move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
         $update_sql= "UPDATE product set categories_id='$categories_id',  name='$name',
            mrp='$mrp' , qty='$qty', product_code='$product_code', short_desc='$short_desc', description='$description' ,
            meta_title='$meta_title', meta_desc='$meta_desc', meta_key='$meta_key',image='$image'  where id='$id'";
    
        }else{
          
          $update_sql= "UPDATE product set categories_id='$categories_id',  name='$name',
          mrp='$mrp' , qty='$qty', product_code='$pcode', short_desc='$short_desc', description='$description' ,
          meta_title='$meta_title', meta_desc='$meta_desc', meta_key='$meta_key', where id='$id'";
  
        }
        mysqli_query($con,$update_sql);
      }

      else {
        print_r($_FILES['image']['name']);
        $image=rand(1111111,9999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
          mysqli_query($con, "INSERT INTO product(categories_id , name , mrp, selling , qty , product_code,short_desc,
          description , meta_title , meta_desc , meta_key , status ,image )
          VALUES('$categories_id' , '$name' , '$mrp', '$selling' , '$qty' ,'$product_code', '$short_desc', ' $description' , 
           '$meta_title' ,' $meta_desc' , '$meta_key', 1,'$image') ");
      
      }  
    
       header('location:product.php');
       die();
           }
  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage product</title>
<style>
 .command{
 margin-top:80px;
 margin-left:270px;
 position:absolute;
 background-size: cover;
 transition: 0.5s;
 height:auto;

 }
 #check:checked ~ .command{
          margin:80px;
        }
  
    
</style>

</head>
<body>
 
  <div class="command">
      <div class="row">
        <div class="col-lg-12">
          <div class="card " style="width: 50rem;">
              <div class="card-body">
                 <div class="card-header"><strong>Product Form</strong></div>
                 <form method="post" enctype="multipart/form-data">
                  <div class="card-body % card-block">
                    <div class="form-group">
                      <label for="categories" classs="form-contro-label">Categories</label>
                         <select class="form-control" name="categories_id">
                             <option> Select categories</option>
                                <?php
                                     $res=mysqli_query($con,"SELECT id,categories from categories order by categories asc");
                                     while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$categories_id){
                                        echo"<option  selected value=".$row['id'].">".$row['categories']."</option>";   
                                       }
                                   
                                     else {
                                        echo"<option value=".$row['id'].">".$row['categories']."</option>";                 
                             
                                     }
                                    }
     
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">Product Name</label>
                         <input type="text" class="form-control" required  name="name" placeholder="Enter categories name " value="<?php echo $name ?>"> 
                    </div>
                   
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">MRP</label>
                         <input type="text" required  class="form-control" name="mrp" placeholder="Enter categories mrp "  value="<?php echo $mrp ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-labl">Price</label>
                         <input type="text" required   class="form-control" name="selling" placeholder="Enter categories price "value="<?php echo $selling ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">Qty</label>
                         <input type="text" required class="form-control"   name="qty" placeholder="Enter Qty "  value="<?php echo $qty ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">pcode</label>
                         <input type="text" required class="form-control"   name="product_code" placeholder="Enter pcode "  value="<?php echo $product_code ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">Images</label>
                         <input type="file"   name="image"  id="image" <?php  echo $image_required; ?> > 
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">short_description</label>
                         <textarea type="text"  class="form-control"  name="short_desc" placeholder="Enter  short_description" ><?php echo $short_desc ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">description</label>
                         <textarea  type="text" class="form-control" required  name="description" placeholder="Enter  Meta Title" ><?php echo $description ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">Meta Title</label>
                         <textarea  type="text" class="form-control"  name="meta_title" placeholder="Enter  Meta Title" ><?php echo $meta_title ?> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">Meta description</label>
                         <textarea type="text"  class="form-control"  name="meta_desc" placeholder="Enter  Meta description" ><?php echo $meta_desc ?> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories" classs="form-contro-label">Meta Keyword</label>
                         <textarea type="form-control"   class="form-control"  name="meta_key" placeholder="Enter  Meta description"><?php echo $meta_key?> </textarea>
                    </div>
                  
                    <button id="payment-button" name="submit" type="submit" class="btn -btn-lg btn-info btn-block">
                    <span id="payment-button-amount"> Submit</span></button><br>
                    <?php echo $msg ?>
                   
                  
                    </div>
                 </form>

               </div>
            </div>
       </div>
    </div>
  </div>
</body>
</html>