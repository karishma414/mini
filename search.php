<?php
require('top.inc.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
    $get_product=get_product($con,'', '','',$str);
}else{
    echo"something wrong";
}

?>

<!--First part-->

<?php    
if(count($get_product)>0) {?>
        
<section id="seasonal">
          <div class="title text-center">

          </div>
<!--container for all products-->
          <div class="container mb-5 mt-5">
            <div class="row ">
<!--card-1-->
           <?php 
             foreach ($get_product as $list ){
               ?>
              <div class="col-md-4">
                <div class="card mt-3">
                  <div class="product-1 align-items-center p-2 text-left">
                  <a class="" href="product.php?id=<?php echo $list['id']?>">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>"alt="" class="rounded" >
                    <h3><?php echo $list['name'];?></h3>
             </a>
 <!--card info-->
                <div class="cost mt-3 ">
                  <p class="star mt-3 align-items-center pt-2"> <span>Tarkaribazaar</span> <span></span>
                  <i class="fa4s fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  </p>
                </div>
                                    
                  <span class="text1"> Mrp:<?php echo $list['mrp'];?></span><br/><br>
                  <span class="text1">Selling Price 😃<?php echo $list['selling'];?></span>
                    <div class="cost mt-3 ">
                      <div class="box">
                          <label for="name">Quantity:</label>
                          <div class="dec button">-</div>
                          <input type="text" name="_qty_" id="1" value="0.5" class="input-filed">
                          <div class="inc button">+</div>
                      </div>
                    </div>
                  </div>
    <!--button for cards-->
                  <div class="p-3 shoe text-center text-white mt-3 cursor">
                    <span class="text-uppercase">Add to cart</span>
                  </div>
                </div>
              </div>
<!--card-1 ends-->
   <?php } ?> 
   </div> 
 
   <?php } else{
          echo"data no found";
        }?>    
            
            </section>
      
  <!--First part end-->    
   
    <?php
    require('footer.php');

    ?>