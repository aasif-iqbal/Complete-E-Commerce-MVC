<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fifthobject</title>
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
      .product-attribute{
          /* font-size:12px;  */
      }
      .btn {
        height: 30px!important;
      }
    </style>
</head>
<body>    
  <div class="container">
  <div class="h3 my-3">My Orders</div>        
      <!-- <div class="h3 my-3">Return & Refund</div>       -->

    <!-- Arriving Orders -->
  <div class="row">
  <?php     
  // echo("<pre/>");
  // print_r($customer_orders_list);
  if(isset($customer_orders_list) && !is_null($customer_orders_list)){
    
    $total_orders = count($customer_orders_list);
    
    for($i=0; $i<$total_orders; $i++){
  ?>          
    <div class="col-md-6 col-lg-6">                             
        <!-- PRODUCT CARD -->
        <div class="mt-3 ml-3">
          <!-- <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>
          <span class="card-text product-attribute border-bottom">Arrived By : &nbsp;30 May, Tus</span><br/> -->
          <span class="card-text">Order Id : #<?= $customer_orders_list[$i]['order_uuid']; ?>
        </span>
          <!-- <p class="card-text">Order date :</?= $customer_orders_list[$i]['createdAt']; ?></p>         -->
          <p class="card-text">Order date : 27 May '23</p>        
        </div>

        <div class="card bg-light-subtle mt-4" id="card_id">
          <img src="<?= base_url('uploads/'.$customer_orders_list[$i]['product_image']); ?>" class="card-img-top">
          <div class="card-body" id="card-body-id">
          <div class="text-section" id="text-section-id">
          <!-- Order status -->
          <!-- <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>
          
          <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;In Transit</span><br/>
          
          <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>

          <span class="card-text product-attribute border-bottom">Arrived By 19 Jun, Mon</span><br/>
           -->
            <span class="fw-bold"><?= $customer_orders_list[$i]['product_name']; ?></span><br/>
            <span class="card-text product-attribute">Color: White</span>&nbsp;|&nbsp;
            <span class="card-text product-attribute">Size: M</span><br/>
            <span class="card-text product-attribute">Qty: <?= $customer_orders_list[$i]['product_quantity']; ?></span><br/>
            <span class="card-text product-attribute">Rs. 2334</span><br/>
            <!-- <span class="card-text product-attribute">Pay mode:cod</span><br/> -->
            <!-- <p>Cancel Order before delivered</p> -->
            <br><br>
            <a class="btn btn-dark btn-sm" id="cancel_order" 
                href="<?= base_url('order-cancellation/'.$customer_orders_list[$i]['order_uuid']); ?>" role="button">Cancel Order</a>

            <!-- <p>Show only when order is delivered</p> -->
            <a class="btn btn-outline-danger btn-small" id="cancel_order" href="<?= base_url('order-return-refund/'.$customer_orders_list[$i]['order_uuid']); ?>" role="button">Order Return</a>
           
            <!-- <p>After 14 days</p>    -->
            <a class="btn btn-outline-danger btn-small" id="cancel_order" href="<?= base_url('/'); ?>" role="button">Buy Again</a>
        
          </div>
          <!-- <div class="cta-section">
          <div>Rs.2599</div> for new section after product-name
          <p href="#" class="" id="btn-placeholder">Qty:1</p>
          </div> -->
        </div>    
        </div>
        <p class="card-text"><small class="text-muted">Please note that you have the option to cancel this order within a 14-day period.</small></p>
      </div>                                                                        
    <!-- Product card ends -->
<?php
  } 
?>
    </div> <!--row ends-->
<?}else {
  // Handle the case when the array is null or the index is invalid
  echo("<h2>NO Order Made By you,Yet!!</h2>");
}
?>
</div>
<!-- Orders ends -->  
<script>
      /*
      bug- it will work only when window is refresh or page reload.if user will remain active or page is open, is does not able to disabled cancel button
      */ 
     
//self-invoke function to check current date then after 5days it will disabled-cancel order.
(function () {
  
// Get current date and time
const now = new Date();

// Calculate date and time 1 days from now
// const fiveDaysFromNow = new Date(now.getTime() + (1 * 24 * 60 * 60 * 1000));
const fiveDaysFromNow = new Date(now.getTime() + (1 * 1/12 * 60 * 60 * 1000)); //5min diff
console.log(now);
console.log(typeof(fiveDaysFromNow));
// Disable button if current date and time is equal to or greater than 1 days from now
if (now >= new Date('Tue Jun 11 2023 11:06:04')) {
    // console.log('true')
   // document.getElementById("cancel_order").style.visibility = 'hidden';
}else{
  // alert('show cancel btn');
}

// ================================ Method 2 ========================================
/*
1. Fetch order_date from database- (tbl_orders)
2. Get current_date using js.
3. compare and disabled button if time expires
*/
})();
</script>
</body>
</html>