</div class="field_error"><?php echo $msg ?>

if(isset($_POST['submit'])){
      $categories=get_safe_value($con,$_POST['categories']);
     $status=get_safe_value($con,$_POST['status']);
      $res=mysqli_query($con,"SELECT *from categories where categories='$categories'"); 
       $check=mysqli_num_rows($res);
        if($check>0){
          if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }else{
              $msg="categories already exist";
            }
        }

            else{
              $msg="categories already exist";
              } 
              
        }
        if($msg==''){
            
      if(isset($_GET['id']) && $_GET['id']!='')
      {   
          mysqli_query($con, "UPDATE categories set categories='$categories' where id='$id'");
      } 
      else {
          mysqli_query($con, "INSERT INTO  categories(id, categories,status) values('','$categories', '1')");
      }  
    
       header('location:categories.php');
       die();
           }
        