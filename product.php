<?php
require('top.inc.php');
$id = ''; 
if( isset( $_GET['id'])) {
    $id = $_GET['id']; 
} 
$product_id=mysqli_real_escape_string($con,$id);
$get_product=get_product($con,'','',$product_id);

?>

<nav>
<div>
  <a href="index.php">HOME </a>
      <a class="" href="categories.php?id=<?php echo $get_product['0']['categories_id'] ?>">
       <?php echo $get_product['0']['categories'];?>
      </a>
      <span><?php echo $get_product['0']['name']?>
    </div>

</nav>
<section class="htc_productb_details  py-5 ptb--100">
  <div class="product_detail">
    <div class="cat">
      <div class="container">
      <div class="row d-flex justified-conten-column">
      <div class="col-md-6 col-lg-6 col-sm-12 col-vs-12 d-flex  flex-direction-column">
      <div class="row mb-5">
        <div class="image">
        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0'] ['image']?>" alt=""/>
        </div>
      </div>
      <div class="details  ">
          <h2>Name:<?php echo $get_product['0']['name']?></h2>
          <h4>Price: :<?php echo $get_product['0']['selling']?></h4>
          <h4>Mrp:<?php echo $get_product['0']['mrp']?></h4>
          <div>
          <div class="rateYo" id="rating" data-rate-rating="4"data-rateyo-num-star="5"data-retyo-score="3">
        </div>
          <span class="result">0</span>
          <input type="hidden" name="rating">
                  <!-- <p class="star mt-3 align-items-center pt-2"> <span>Tarkaribazaar</span> <span></span> -->
                  
                </div>
                <?php
              $productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
              
              $pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
              
              
              $cart_show='yes';
                 if($get_product['0']['qty']>
                 $productSoldQtyByProductId){
                 $stock="In Stock";
              
               }else{
                 $stock="Not in Stock";
                 $cart_show='';
               }
               ?>
             <p>Avaliablity:<span><?php echo $stock; ?></span></p>         
          <div>
          <?php
         if($cart_show!=''){
           ?>
            <span>Qty</span>
            <select id="qty">
              <?php
                for($i=1;$i<=$pending_qty;$i++){
                  echo "<option>$i</option>";
                }
              ?>
            </select>
            <?php } ?>
          </div>
         
          <div class="sin__desc_align--left">
            <p><span>Categories:</span></p>
            <ul class="pro__cart__list">
              <li><a href="#"><?php echo $get_product['0']['categories']?></a></li>
</ul>
          </div>
         <?php
         if($cart_show!=''){
           ?>
      <button>
          <a href="javascript:void(0)" class="btn btn-danger" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to cart</a>
</button>
         <?php }?>
        </div>
      </div>
      </div>
    </div>
  </div>

</section>
<section class="desc ">
    <div class=" info ">
    <h5 style={font-size:bold}> Short Descriptin:</h5>
    <p style="font-size:bold"><?php echo $get_product['0']['short_desc']?><</p>
    <h2 >  Description: </h2>
    <p >  :<?php echo $get_product['0']['description']?><p>
        <div>
</section>


  <?php require('footer.php')?>

  <script src="rating.js"></script>
<script type="text/javascript">

function manage_cart(pid,type){
  if(type=='update'){
    var qty=jQuery("#"+pid+"qty").val();
  }else{
    var qty=jQuery("#qty").val();
  }
    jQuery.ajax({
                url:  'manage_cart.php',
                method: 'post',
                data:'pid='+pid+'&qty='+qty+'&type='+type ,
                success: function(result){
                  if(type=='update' || type=='remove'){
                    window.location.href='cart.php';
                  }
                  if(result =='not_avaliable'){
                    alert('Qty not avaliable');
                   
                  }else{
                    jQuery('.htc__qua').html(result);
                  }
                  
                }
            });
  }
</script>
