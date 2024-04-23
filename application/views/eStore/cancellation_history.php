<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>        
      #card_id {
        max-width: 30em;
        flex-direction: row;
        /* background-color: #696969; */
        border: 0;
        box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
        margin: 3em auto;
      }
      #card_id.dark {
        color: #fff;
      }
      #card_id#card_id.bg-light-subtle .card-title {
        color: dimgrey;
      }
      #card_id img {
        max-width: 35%;
        /* margin: auto; */
        padding: 0.2em;
        border-radius: 0.7em;
      }
      #card-body-id {
        display: flex;
        justify-content: space-between;
      }
      #text-section-id {
        max-width: 100%;
      }
      .cta-section {
        max-width: 40%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-between;
      }
      .cta-section #btn-placeholder {
        padding: 0.3em 0.5em;
        /* color: #696969; */
      }
      #card_id.bg-light-subtle .cta-section #btn-placeholder {
        /* background-color: #898989; */
        /* border-color: #898989; */
      }
      @media screen and (max-width: 475px) {
      #card_id {
          font-size: 0.9em;
        }
      }
      #return_available{
          font-size:12px;    
      }                
    </style>
</head>
<body>
    <!-- </?php print_r($all_cancelled_orders); ?>      -->
    <!-- order_shipping_status == 5 -->
    <!-- </?php echo('<pre/>'); ?> -->
    <!-- </?php print_r($all_cancelled_orders); ?> -->
    <div class="h3 ml-5" id="">Cancellation</div>
<div class="row">
  <?php       
  if(isset($all_cancelled_orders) && !is_null($all_cancelled_orders)){
      $total_orders = count($all_cancelled_orders);
      for($i=0; $i<$total_orders; $i++){
  ?>    
      
      <div class="col-md-6 col-lg-6">                             
        <!-- PRODUCT CARD -->
        <div class="mt-3 ml-3">                               
          <!-- <p class="card-text">Order date :</?= $all_cancelled_orders[$i]['createdAt']; ?></p>         -->
        </div>

        <div class="card bg-light-subtle mt-4 border border-danger" id="card_id">
          <img src="<?= base_url('uploads/'.$all_cancelled_orders[$i]['product_image']); ?>" class="card-img-top">
          <div class="card-body" id="card-body-id">
          <div class="text-section" id="text-section-id">          
            <span class="fw-bold"><?= $all_cancelled_orders[$i]['product_name']; ?></span><br/>
            <span class="card-text product-attribute">Color: White</span>&nbsp;|&nbsp;
            <span class="card-text product-attribute">Size: M</span><br/>
            <!-- <span class="card-text product-attribute">Qty: <?= $all_cancelled_orders[$i]['product_quantity']; ?></span><br/> -->
            <span class="card-text product-attribute">Rs. 2334</span><br/>
            <span class="card-text product-attribute">Pay mode:&nbsp: COD</span><br/>
            <br><br>
            <span class="card-text product-attribute">Order At: 27 May'23</span><br/>
          </div>
          <div class="cta-section">            
          <p href="#" class="" id="btn-placeholder">Qty:1</p>
          </div> 
        </div>    
        </div>        
      </div>                                                                     
    <!-- Product card ends -->
<?php
  } 
?>
</div> <!--row ends-->
<?}else {
  // Handle the case when the array is null or the index is invalid
  echo("<h2>NO Cancellation Made By you, Yet!!</h2>");
}
?>


  



</body>
</html>