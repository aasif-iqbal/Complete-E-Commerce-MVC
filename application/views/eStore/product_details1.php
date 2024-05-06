<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <style>
        .btn{
            border-radius: 0rem;
            padding: 0.6rem 0.75rem;
        }
        #product-details{
            padding: 0 2rem 0 2rem;
        }
        #product-image{
            padding: 0 2rem 0 2rem;
        }
        .page-item.active .page-link {            
        /* added css in backend using style tag */
        }
        /* For border-color selected div */
        .add-border-red {
          border-bottom: 2px solid white;
          padding: 2px;
          cursor: pointer;
        }
        .add-border-red.selected {
          border-color: red;          
        }
        /* Star rating btn */
        .btn-dark{
          color: #212529 !important;
          background-color: #fff !important;
          border:none;          
        }
        .btn-light {
          display: none !important;
        }
        #rateProduct{
          border:1px solid black;
        }
        /* Star rating btn end */
        .square{
          width: 100%;
          height: 100%;
        }
        .btn_sqr{
            height:30px;
            width:30px;
            cursor:pointer;
            border:0px;
        }        
        .form-check {         
         padding-left: 0em!important;
        }
        .form-check-inline {  
          margin-right: 0.5rem;
        }
        .form-select-lg {
          padding-top: 0.5rem;
          padding-bottom: 0.5rem;
          padding-left: 1rem;
          font-size: 0.8rem;
          border-radius: 0rem;
      }
      .form-select {
          border: 1px solid #000;
      }
      .accordion-button:not(.collapsed) {
        color: #000000;
        background-color: #e7f1ff;         
    }
    .badge {
    display: inline-block;
    padding: 0.35em 0.65em;
    font-size: 1em;
    font-weight: 700;
    line-height: 2;
    color: #000000;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0rem;
}
/* Animation placeholder */

.card-only{
  /* width: 18rem; */
  height:auto;
  aspect-ratio: 4 / 6;
  /* border-radius: 0.1rem; */
  background: #fff;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.3);
  /* padding: 0.5rem; */
  box-sizing: border-box;
}
.image-placeholder-only {
  aspect-ratio: 16/25;
  margin-bottom: 0rem;
  width:100%;
  height:100%;
}
.placeholder {
background: #eee;
/* border-radius: 1rem; */
position: relative;
overflow: hidden;
}
.placeholder:after {
content: '';
position: absolute;
top: 0;
left: 0;
bottom: 0;
width: 100px;
background: linear-gradient(90deg, #eee, #f4f4f4, #eee);
animation: gradient 1s infinite ease-in-out;
}
.image-placeholder-only {
aspect-ratio: 16 / 9;
margin-bottom: 0rem;
}
@keyframes gradient {
form {
left: 0%;
}

to {
left: 100%;
}
}

/* End Animation placeholder */

    </style>
<body>
<?php 
  $userLoginData = $this->session->userdata('userLoginData'); 
//  print_r($product_imgs);
?>

<div class="container-fluid">          
    <div class="col-md-12">
        <!-- dynamic image will popup when -->   
        <div id="result"></div>       
        <?php 
            // $item_count = $this->session->userdata('item_count'); 
            // echo isset($item_count)?$item_count:0;
        ?>
        <div id="result__localstr"></div>

        <div class="row"  id="product-image">
            <div class="col-md-8">
                <div class="row">
                    <div id='image_color_id'>        
                      <div id="product_detail_image_id"></div>
                        <div id="no_data_found"></div>
                          <div class='row' id='loader'>
                            <!-- loading placeholder  -->
                            <?php for($i=0; $i < 6; $i++){ ?>
                            <div class="col-md-6 col-sm-12 mt-4">
                                <!-- <div class="card">
                                    <a data-fancybox="gallery" data-src="</?= base_url('upload_img/img_placeholder.png'); ?>">
                                    <img class="img-fluid" src="</?= base_url('upload_img/img_placeholder.png'); ?>">
                                    </a>
                                </div> -->
                                <!-- Animation placeholder -->
                                <div class="card">
                               
                                <div class="card-only">
                                  <div class="image-placeholder-only placeholder">
                                  </div>       
                                </div>

                                </div>

                              </div>  
                            <?php } ?>                     
                          </div><!--row end-->  

                    </div><!--image_color_id-->
                    <!-- on page load color variation -->
                    <div id='show_image_color_id'></div>
                    <!-- on user click color variation -->
                    <div id='show_color_variation_img'></div>
                </div><!--row-->
            </div><!-- col-md-8 -->
      <!-- product image end -->
      
      <!-- </?php var_dump($product_main); ?> -->

      <!-- Product discription start -->
      <div class="col-md-4 mt-4">
        
        <!-- hidden tags -->
        <input type="hidden" id="user_uuid" value="<?= isset($userLoginData['user_uuid'])?($userLoginData['user_uuid']):'None'; ?>" />
        
        <input type="hidden" id="product_image" value="<?= $product_main[0]->product_main_image; ?>" name="<?= $product_main[0]->product_main_image; ?>" />
        
        <input type="hidden" id="product_name" value="<?= $product_main[0]->product_name; ?>" name="<?= $product_main[0]->product_name; ?>" />

        <input type="hidden" id="product_selling_price" value="<?= $product_main[0]->product_selling_price; ?>" name="<?= $product_main[0]->product_selling_price; ?>" />

        <input type="hidden" id="product_mrp" value="<?= $product_main[0]->product_mrp; ?>" name="<?= $product_main[0]->product_mrp; ?>" />

        <input type="hidden" id="discount_percentage" value="<?= $product_main[0]->discount_percentage; ?>" name="<?= $product_main[0]->discount_percentage; ?>" />

        <input type="hidden" id="product_uuid" value="<?= $product_main[0]->product_uuid; ?>" name="<?= $product_main[0]->product_uuid; ?>" />
      <!-- hidden tags ends -->

        <div class="text-dark" id="" style="font-size:1.5rem;"><?= $product_main[0]->product_name; ?></div>                        

    <div class="price-wrap">
      <span class="mt-2 text-dark" style="font-size: 22px;" id="product_selling_price">
      <label for="">Rs.</label>  <?= $product_main[0]->product_selling_price; ?>
      </span>&nbsp;
      <small><span class="mt-2 text-muted" style="font-size: 18px;" id="product_mrp">
      <label for="">Rs.</label><s><?= $product_main[0]->product_mrp; ?></s>
      </span></small>&nbsp;
      <small><span class="mt-2 text-danger" style="font-size: 18px;" id="discount_percentage">(<?= $product_main[0]->discount_percentage; ?>%OFF)</span></small>
      <!-- <span class="text-dark"><small>inclusive of all taxes</small></span> -->
    </div>
<div>
<p class="text-muted"><?= $product_main[0]->product_short_description; ?></p>
<div class="row">
    <div class="col">
    <select class="form-select form-select-lg" id='my_size' onchange="onchangeSizeShowProdColor(this.value)">
  <option value='0' selected>Select Size</option>
 
  <?php if(isset($avilable_size_variation)){  
     foreach($avilable_size_variation as $size_variation): ?>  
      <option value="<?= $size_variation->size_uuid.'_'.$size_variation->product_size; ?>"><?= $size_variation->product_size; ?></option>
      <?php endforeach; } ?>
    </select>
    </div>
    <!-- <div class='col'>
    <a class="btn btn-outline-danger btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  size chart
</a>
    </div> -->
</div>

 
<div class="mt-2" id="all_color">
  <!-- buttons -->
<?php if(isset($avilable_color_variation)){
  //  print_r($avilable_color_variation);
  foreach($avilable_color_variation as $color_variation):
    // print_r($avilable_color_variation);?>
  <div class="form-check form-check-inline">    
<div class="add-border-red">
  
      <!-- <div 
        class='square'
        id='</?= $color_variation->product_color; ?>'  
        onclick="changeProductColor(this.id)"  
        style="background-color: </?= isset($color_variation->product_hex_code)?$color_variation->product_hex_code:0; ?>;cursor: pointer;">
        </?= $color_variation->product_color_name; ?>  
      </div> -->
    
      <button class='btn_sqr' id='my_color' style="background-color: <?= isset($color_variation->product_hex_code)?$color_variation->product_hex_code:0; ?>" onclick='changeProductColor(<?= $color_variation->product_color; ?>)'></button>

  </div>
  <small><?= $color_variation->product_color_name; ?> </small>
  </div>
  <?php endforeach; } ?>
</div>
<!-- dynamic color according to product size -->
<div class='mt-2' id="showSelectedColor"></div>
         
<!-- static -->
    <div class="mt-3">
    <!-- if href='' is empty then it will reload the page as its default nature,
    to stop or prevent this we have to use  event.preventDefault() in our function
 -->
    <!-- <a href="" 
      class="btn btn-outline-dark btn-block btn-lg" 
      id="add_to_cart" 
      role="button" 
      aria-pressed="true"> -->
        <!-- <i class="fa fa-shopping-bag" aria-hidden="true"> -->
      <!-- <span class="icon-shopping-bag"></span>       -->
        <!-- </i> -->
        <!-- &nbsp;&nbsp;ADD</a>&nbsp;&nbsp; -->
        
        <!-- wishlist -->
    <!-- <a href="#" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;&nbsp;WISHLIST</a> -->
    
    <!-- <small class='text-danger'>{$isColorAvilable} - Size is Not Available</small> -->
    <!-- <small class='text-danger'>{$isSizeAvilable} - Size is Not Available</small> -->
    <?php if($userLoginData){ ?>
      <!-- SHOW WHEN USER IS LOGIN -->
    <button  class="btn btn-outline-dark btn-block btn-lg" onclick="checkProductQuantityAviability();"><span class="icon-shopping-bag"></span>  ADD</button>
    <?php }else{ ?>
      <!-- SHOW WHEN USER IS "NOT-LOGIN" -->
      <!-- <button onclick="add_to_cart_to_database__();">ADD to ls</button> -->
      <a href="<?= base_url('login'); ?>" class="btn btn-outline-dark btn-block btn-lg"><span class="icon-shopping-bag"></span>Add</a>
      <?php } ?>
      <small>&#x1F607;&nbsp;Make sure, you are login before adding product</small>
      </div>       

<!-- Product OUT of Stock -->
<div id='product_stock_InDb' style='text-align: center;color:red;'></div>

    <!-- <input type="text" class="form-control w-75 p-3" aria-label="Large" placeholder="Enter Pincode" aria-describedby="inputGroup-sizing-sm">
    <button class="pinCode-btn btn btn-white text-danger">Check</button>
    <p class="text-muted"><small>Please enter PIN code to check Delivery Availability</small></p> -->
<hr>
   <div class="text-dark mt-2 font-weight-light">
    <span>- 100% Original Products</span><br/>
    <span>- Free Delivery on order above Rs. 899</span><br/>
    <span>- Pay on delivery might be available</span><br/>
    <span>- Easy 30 days returns and exchanges</span><br/>
    <span>- Try & Buy might be available</span>
  </div>
<hr>  

  <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      <span class=""><img width="20" height="20" src="https://img.icons8.com/ios/100/jumper.png" alt="jumper"/></span> &nbsp;&nbsp;Description
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <!-- product_long_Description -->       
      <?= $product_main[0]->product_long_description; ?>          
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
        </svg>&nbsp;Free Shipping
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">      
      <p>We offer free shipping across India for all prepaid orders.For COD orders an additional fee of Rs. 899 is applicable.</p>

      <p>1-DAY DISPATCH</p>
      <p>We dispatch orders within 1-day. </p>

      <p>5-9 DAYS DELIVERY</p>
      <p>We usually take 5-9 working days depending on your location.</p>

      <p>Delivery timelines:</p>
      <p>Delhi (Our home) 5-7 days</p>
      <p>Other cities : Not Yet</p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
</svg>&nbsp;Return
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <p>14-Day Refund Policy.</p>
        <p>We want you to be completely satisfied with your purchase from our clothing brand. Therefore, we offer a 14-day refund policy to ensure your peace of mind. Please review the following terms and conditions:</p>

        <ol>
          <li>Eligibility: To be eligible for a refund, the item(s) must be purchased directly from our clothing brand, and the request must be made within 14 days of the original purchase date.</li>
          <li>Condition of the Item: The item(s) must be in its original condition, unworn, unwashed, and with all tags and labels still attached. Any signs of wear, damage, or alteration may void the refund eligibility.</li>
          <li>Return Process: To initiate a refund, please contact our customer support team within the 14-day period. They will guide you through the return process and provide you with a return authorization number.</li>
          <li>Return Shipping: The customer is responsible for the return shipping costs, unless the item received is defective, damaged, or there was an error on our part. We recommend using a trackable shipping method to ensure the safe return of the item.</li>
          <li>Refund Method: Once we receive and inspect the returned item(s), we will process the refund using the same payment method used for the original purchase. Please note that it may take several business days for the refund to reflect in your account.</li>
          <li>Non-Refundable Items: Personalized or customized products, are non-refundable unless they are defective or damaged upon receipt.</li>
          <li>Store Credit: If you prefer, we can offer store credit instead of a refund. Store credit will be issued in the form of a gift card and can be used towards future purchases.</li>
          <li>Exchanges: We currently do not offer direct exchanges. If you wish to exchange an item, we recommend returning the unwanted item for a refund and placing a new order for the desired item.</li>
          <li>Final Sale Items: Items marked as "Final Sale" or purchased during clearance sales are not eligible for a refund or return.</li>
          <li>Change of Mind: Refunds are offered for change of mind, but please note that the original shipping charges are non-refundable, and you will be responsible for the return shipping costs.</li>
        </ol>
        <p>Please feel free to contact our customer support team for any further assistance or clarification regarding our refund policy. We appreciate your understanding and look forward to providing you with an exceptional shopping experience.</p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
  <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
</svg> &nbsp;&nbsp;Delivery and Payment
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <p>Due to additional health and safety measures to protect our logistics teams, your delivery may take a little longer. Please note, that we might not be able to deliver to all areas. You will be notified about the same during checkout. We deliver all days, except bank holidays.</p>
      </div>
    </div>
  </div>
</div>

</div><!--end-row-->
</div><!-- Product discription -->
</div><!--col-md-12 row-->
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->   
<hr>
    <!-- <h3>Rating & Reviews</h3> -->
<?php
$ratingNumber = 0;
$count = 0;

$fiveStarRating = 0;
$fourStarRating = 0;
$threeStarRating = 0;
$twoStarRating = 0;
$oneStarRating = 0;

// $rateResult = [2,4,5,1,2,....];
// print_r($rateResult);
// while ($rate = mysqli_fetch_assoc($rateResult)) {
if(isset($rateResult)){
  foreach($rateResult as $rate){
	
  $ratingNumber += $rate['rating_number'];  //total ie(2+4+5+1+2+1...)
	
  $count += 1;       // count(2+4+5+1+2+1) = 6 (6's time ie total no of ele)
	
  if ($rate['rating_number'] == 5) { // 1
		$fiveStarRating += 1;  // count how many 5's  rating r there // 1 time's
	} else if ($rate['rating_number'] == 4) { //1 time's
		$fourStarRating += 1;
	} else if ($rate['rating_number'] == 3) { // 0 time's
		$threeStarRating += 1;
	} else if ($rate['rating_number'] == 2) { // 2 time's
		$twoStarRating += 1;
	} else if ($rate['rating_number'] == 1) { // 2 time's
		$oneStarRating += 1;
	}
}
}
$average = 0;

if ($ratingNumber && $count) {
	$average = $ratingNumber / $count;  //   15 / 6
}
// For Progress-bar 
$fiveStarRatingPercent = round(($fiveStarRating / 5) * 100); // 
$fiveStarRatingPercent = !empty($fiveStarRatingPercent) ? $fiveStarRatingPercent . '%' : '0%';

$fourStarRatingPercent = round(($fourStarRating / 5) * 100);
$fourStarRatingPercent = !empty($fourStarRatingPercent) ? $fourStarRatingPercent . '%' : '0%';

$threeStarRatingPercent = round(($threeStarRating / 5) * 100);
$threeStarRatingPercent = !empty($threeStarRatingPercent) ? $threeStarRatingPercent . '%' : '0%';

$twoStarRatingPercent = round(($twoStarRating / 5) * 100);
$twoStarRatingPercent = !empty($twoStarRatingPercent) ? $twoStarRatingPercent . '%' : '0%';

$oneStarRatingPercent = round(($oneStarRating / 5) * 100);
$oneStarRatingPercent = !empty($oneStarRatingPercent) ? $oneStarRatingPercent . '%' : '0%';

?>

<!--Write a Review -->
<div id="ratingSection" style="display:none;">
	<div class="container">
	<div class="card">
		<div class="row mt-4 ml-4">
			<div class="col-md-9">
				<form id="ratingForm" method="POST">
					<div class="form-group">
						<h4>Rate this product</h4>
						<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
							<i class="fa fa-star" aria-hidden="true"></i></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
							<i class="fa fa-star" aria-hidden="true"></i></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
							<i class="fa fa-star" aria-hidden="true"></i></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
							<i class="fa fa-star" aria-hidden="true"></i></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
							<i class="fa fa-star" aria-hidden="true"></i></span>
						</button>
						
            <input type="hidden" class="form-control" id="rating" name="rating" value="1">
						                         
            <input type="hidden" id="user_uuid" name="user_uuid" value="<?= isset($userLoginData['user_uuid'])?($userLoginData['user_uuid']):'None'; ?>" />

            <input type="hidden" id="user_name" name="user_name"  value="<?= isset($userLoginData['user_name'])?($userLoginData['user_name']):'User'; ?>" />
            
            <input type="hidden" id="product_uuid" name="product_uuid" value="<?= $product_main[0]->product_uuid; ?>" name="<?= $product_main[0]->product_uuid; ?>" />

					</div>
					<div class="form-group">
						<label for="usr">Title*</label>
						<input type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="form-group">
						<label for="comment">Comment*</label>
						<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info" id="saveReview">Save Review</button>
						<button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>

<!-- user's rating display -->
<div id="ratingDetails">
	<div class="container mt-4">
		<div class="card">
			<div class="row no-gutters">
				<div class="col-md-4 border-right">
					<div class="ratings text-center text-dark p-4 py-5"> <span class="badge bg-light">
              <?php printf('%.1f', $average);?> out of 5&nbsp;<i class="icon-star2 text-dark"></i>
          </span>
					 <span class="d-block about-rating">
            <?php printf('%.1f', $average);?>
             Rating & 
             <?php echo ($count); ?>
            &nbsp;Reviews
          </span>
					</div>
				</div>
      <!-- Progress bars -->
				<div class="col-md-4">
					<div class="rating-progress-bars p-3 mt-2">
						<div class="d-flex align-items-center"> <span class="stars"> <span>5 <i class="icon-star2 text-dark"></i></span> </span>
							<div class="col px-2">
								<div class="progress" style="height: 5px;">
									<div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo $fiveStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div> <span class="percent"> <span>
								<?php echo $fiveStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>4 <i class="icon-star2 text-dark"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo $fourStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $fourStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>3 <i class="icon-star2 text-dark"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo $threeStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $threeStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>2 <i class="icon-star2 text-dark"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-dark" role="progressbar" style="width: 
                    <?php echo $twoStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $twoStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>1&nbsp;<i class="icon-star2 text-dark"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo $oneStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $oneStarRating; ?></span> </span>
							</div>

						</div>
					</div>
          <!-- End Progress bar -->
          <!-- Load more -->
          <!-- https://jsfiddle.net/solodev/amuqsu9t/ -->

					<div class="col-md-4">
						<div class="p-3 mt-2 border-left">
							<div class="h3 font-weight-light">Review this product</div>
							<label style="color: gray;">Share your thoughts with other customers</label>
							<br/>
							<button type="button" id="rateProduct" class="btn btn-dark">Write a product review</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- user's review display -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<hr/>
					<div class="review-block">
  <!-- <//?php print_r($rating_reviews);?> -->
  <div class="row">
  <?php
  if(isset($rating_reviews)){
    foreach($rating_reviews as $rr):
  ?>							
							  <div class="col-sm-4 col-md-4 col-lg-4 mt-3">
                  <div class='card h-100'>
                    <div class="row">
                      <div class="col-2">
                    <img width="66" height="66" src="https://img.icons8.com/windows/256/contacts.png" alt="contacts"/>
                    </div>
                    <div class="col">
                      <!-- user-name -->
                      <span class='fs-6 text-dark'><?php 
                        if($rr['user_name'] !== 'User'){
                        echo $rr['user_name']; ?>&nbsp;&nbsp;&nbsp;<small class='text-muted'>verified <img src="<?= base_url('assets/img/icons8-verified-badge-16.png'); ?>"/></small>
                        <?php } else {?>
                          <?php echo $rr['user_name']; ?>
                          <?php }?>
                        </span>
                        <!-- end user-name -->
                        <br>
                        <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $ratingClass = "btn-default btn-light";
                        if ($i <= $rr['rating_number']) {
                          $ratingClass = "btn-default btn-dark";
                        }

                        ?>
											<button type="button" class="btn btn-xs<?php echo $ratingClass; ?>" aria-label="Left Align">
												<span><i class="fa fa-star" aria-hidden="true"></i></span>
											</button>
										<?php } //end-of-for?>
                    </div>
                    </div>
                    <div class="h5 text-dark ml-3"><?php echo $rr['rating_title']; ?></div>
                    <div class="h6 ml-3 text-dark font-weight-light"><?php echo $rr['rating_comment']; ?></div>
                    <div class="ml-3"><small class='text-muted'>Reviewed on: <?php 
                  $date = date_create($rr['createdAt']);
                  echo date_format($date,"d F Y");
                  ?></small></div>
								</div>
              </div>

							
							
						<?php endforeach; } //end-of-foreach?>
            
            </div>
            <hr/>
					</div>
				</div>
			</div><!--row-->
		</div>
	</div><!--"ratingDetails"-->
<script>
   // JavaScript code
window.onload = function() {
  let currentUrl = window.location.href;
    newCurrentUrl = currentUrl.substr(0,currentUrl.lastIndexOf('/'));
    newCurrent_Url = newCurrentUrl.substr(0,newCurrentUrl.lastIndexOf('/'));

// Code to be executed when the window has finished loading      
var product_uuid = document.getElementById('product_uuid').value;
      // alert(product_uuid);
let product_imgs = `<?php echo json_encode($product_imgs); ?>`;

  $.ajax({
    url: "<?= base_url('EStore/EStore_Controller/showDetailProductImages_ajax'); ?>",
            type: 'POST',
            timeout: 1000000,
            data: {
                product_uuid:product_uuid,                            
            },
            beforeSend: function(){
              // Show image container
              $("#loader").show();                   
              $("#product_detail_image_id").hide();               
            },
            complete:function(data){
              // Hide image container
              $("#loader").hide();
              $("#product_detail_image_id").show();                  
            },
            success: function(data, textStatus, jqXHR) {                
                var jsonData = JSON.parse(data);  
                console.log("JsonData::", jsonData);                  

                if(jsonData != null || jsonData != undefined){
                  var data_len = jsonData.length;   
                  console.log('data_len',data_len)                     
                }

                      // console.log(jsonData.pagination_link);
                var htmlTemp = "";
                if(data_len != null){
                  htmlTemp += `<div class='row'>`;     
                  for (var i = 0; i < data_len; i++){ 
                    // console.log(jsonData[i]['main_image_uuid']);
                    htmlTemp += `<div class="col-md-6 col-sm-12 mt-4">`;
                    htmlTemp += `<div class='card'>`;
                    htmlTemp += `<a data-fancybox="gallery" onclick='${addZIndexToNav()}' data-src="${newCurrent_Url+'/upload_img/'+jsonData[i]['main_product_image']}">`;
                    htmlTemp += `<img class='img-fluid' src='${newCurrent_Url+'/upload_img/'+jsonData[i]['main_product_image']}'>`; 
                    htmlTemp += `</a>`; 
                    htmlTemp += `</div>`; 
                    htmlTemp += `</div>`;
                  }                    
                  htmlTemp += `</div>`;    
                  document.getElementById('product_detail_image_id').innerHTML =  htmlTemp;
                  
                  }else{                                        
                    //$('#pglink').hide();
                   // $('#pageNum').hide();
                    document.getElementById('no_data_found').innerHTML = "<div id='NotFound'>No Data Found</div>";                    
                  }

                },//success-ends
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
            })
// console.log('sda',JSON.parse(product_imgs));  
};

// JavaScript code
// const myDiv = document.getElementsByClassName("color_change");
// console.log(myDiv);
// myDiv.addEventListener("click", function() {
  
//   // Toggle the "highlight" class on and off
//   this.classList.toggle("select_color");
// });

// To hide nav-bar and user will able to click close button(which is hide by navbar)
function addZIndexToNav(){
    var site_navbar = document.querySelector('.site-navbar');
    site_navbar.style.zIndex = "0";
}


// to add background-square-border for selected color
let selectedDiv = null;
const divs = document.querySelectorAll('.add-border-red');
divs.forEach(div => {
  div.addEventListener('click', () => {
    if (selectedDiv) {
      selectedDiv.classList.remove('selected');
    }
    div.classList.add('selected');
    selectedDiv = div;
  });
});

// On change Size ShowProdColor-Box
function onchangeSizeShowProdColor(value){
   
  var product_uuid = document.getElementById('product_uuid').value;
  let showSelectedColor = document.getElementById("showSelectedColor");
  
  let size_name_arr = value.split("_");
      size_name = size_name_arr[1];  //returns 38,40,S,M,L
  
  $.ajax({
    url:"<?php echo base_url('EStore/EStore_Controller/show_color_selected_by_dd_size_ajax');?>",
    type:'POST',
    data:{
        size_name:size_name,
        product_uuid:product_uuid
      },
      success:function(RespondedData) {  
                //  console.log(RespondedData);  
              jsonData = JSON.parse(RespondedData);
              // console.log(jsonData);
            if(jsonData != null){
            if(jsonData.length != 0){
                  document.getElementById('all_color').style.display = 'none';
                  var htmlTemp = '';
               // htmlTemp = 'Hello';
                 for(let i=0; i < jsonData.length; i++){                   
                  htmlTemp += `<div class="form-check form-check-inline">`;    
                  htmlTemp += `<div class="add-border-red">`;                  
                    htmlTemp += `<button class='btn_sqr' style='background-color:${jsonData[i].product_hex_code}' onclick="getProductImageByColor(${jsonData[i].product_color},'${jsonData[i].product_color_name}')"></button>`;
                    htmlTemp += `</div>`;
                    htmlTemp +=  `<small>${jsonData[i].product_color_name}</small>`;
                    htmlTemp += `</div>`;                                        
                  }
                  showSelectedColor.innerHTML = htmlTemp;                   
                  // to add background-square-border for selected color
                  let selectedDiv = null;
                  const divs = document.querySelectorAll('.add-border-red');
                  divs.forEach(div => {
                    div.addEventListener('click', () => {
                      if (selectedDiv) {
                        selectedDiv.classList.remove('selected');
                      }
                      div.classList.add('selected');
                      selectedDiv = div;
                    });
                  });
                }
              }else{
                  document.getElementById('all_color').style.display = 'display';
                }
              },  
              error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                } 
    });
}
 
//change product image according to color selected by user
/*
1. Select Size
2. Choose Color
*/

// ColorBox Change after size select
function getProductImageByColor(color_id, color_name){
  
  // alert('template literal:', color_name);
  console.log('color_name:::',color_name);

  var product_uuid = document.getElementById('product_uuid').value;

    let currentUrl = window.location.href;
    newCurrentUrl = currentUrl.substr(0,currentUrl.lastIndexOf('/'));
    newCurrent_Url = newCurrentUrl.substr(0,newCurrentUrl.lastIndexOf('/'));
                   
    // Storing a value in session storage
    sessionStorage.setItem('colorIdWithSize', color_id);
    sessionStorage.setItem('color_name', color_name);

    console.log('newCurrent_Url',newCurrent_Url);

    //On Product-server REPLACE IT  with newCurrent_Url => production_url
  let production_url = 'https://fifthobject.com/';

  // console.log(color_id);
  // console.log(product_uuid);

  $.ajax({
    url:"<?php echo base_url('EStore/EStore_Controller/show_product_image_by_color_ajax');?>",
    type:'POST',
    data:{
        product_uuid:product_uuid,
        color_id:color_id
      },
      success:function(RespondedData) {  
              // console.log(RespondedData);  
              jsonData = JSON.parse(RespondedData);
              console.log('result:',jsonData);
            if(jsonData != null){
                if(jsonData.length != 0){
                  //hide product first
                  document.getElementById('image_color_id').style.display = 'none';
                  document.getElementById('show_image_color_id').style.display = 'none';
                  
                  var htmlTemp = '';
                    
                  htmlTemp += `<div class="col-md-12">`;     
                  htmlTemp += `<div class='row'>`;
                
              for(let i=0 ;i < jsonData.length; i++){                                       
                    htmlTemp += `<div class='col-md-6 col-sm-12 mt-4'>`;
                    htmlTemp += `<div class='card'>`;
                    htmlTemp += `<a data-fancybox="gallery" onclick='${addZIndexToNav()}' data-src="${newCurrent_Url+'/colors_img/'+jsonData[i]['product_color_img']}">`;
                    htmlTemp += `<img class='img-fluid' src='${newCurrent_Url+'/colors_img/'+jsonData[i]['product_color_img']}'>`; 
                    htmlTemp += `</a>`; 
                    htmlTemp += `</div>`; 
                    htmlTemp += `</div>`; 
                  }    
                  htmlTemp += `</div>`; 
                  htmlTemp += `</div>`; 
                  //display colored product
                  document.getElementById('show_color_variation_img').innerHTML = htmlTemp;
                }
              }else{
                document.getElementById('show_color_variation_img').innerHTML = 'No image upload yet';
                }
              },  
              error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                } 
    });
}
// var color_id = document.getElementById('color_id'); 
// console.log(color_id);
// color_id.addEventListener("click", function() {
  
//   console.log(color_id.value);
// });


// Change Product color on simply clicking on color-box
function changeProductColor(color_id){
    var product_uuid = document.getElementById('product_uuid').value;
    
    let currentUrl = window.location.href;
    newCurrentUrl = currentUrl.substr(0,currentUrl.lastIndexOf('/'));
    newCurrent_Url = newCurrentUrl.substr(0,newCurrentUrl.lastIndexOf('/'));

    // Storing a value in session storage - colorIdWithoutSize
    sessionStorage.setItem('colorIdWithoutSize', color_id);

    
    $.ajax({
      url:"<?php echo base_url('EStore/EStore_Controller/show_product_color_ajax');?>",
      type:'POST',
      data:{
        color_id:color_id,
        product_uuid:product_uuid
      },
      success:function(RespondedData) {  
                    // console.log(RespondedData);  
            jsonData = JSON.parse(RespondedData);
                  console.log('changeProductColor:',jsonData);

              if(jsonData.length != 0){
                  document.getElementById('image_color_id').style.display = 'none';
                  var htmlTemp = '';
                    
                  htmlTemp += `<div class="col-md-12">`;     
                  htmlTemp += `<div class='row'>`;
                  for(let i=0 ;i < jsonData.length; i++){                   
                    
                    htmlTemp += `<div class='col-md-6 col-sm-12 mt-4'>`;
                    htmlTemp += `<div class='card'>`;
                    htmlTemp += `<a data-fancybox="gallery" onclick='${addZIndexToNav()}' data-src="${newCurrent_Url+'/colors_img/'+jsonData[i]['product_color_img']}">`;
                    htmlTemp += `<img class='img-fluid' src='${newCurrent_Url+'/colors_img/'+jsonData[i]['product_color_img']}'>`; 
                    htmlTemp += `</a>`; 
                    htmlTemp += `</div>`; 
                    htmlTemp += `</div>`; 

                  }    
                  htmlTemp += `</div>`; 
                  htmlTemp += `</div>`; 

                    document.getElementById('show_image_color_id').innerHTML = htmlTemp;
                    
                    // document.getElementById('new_div').classList.toggle('myClickState');
                }else{
                  
                  document.getElementById('show_image_color_id').innerHTML = 'NULL';
                }
               
              },  
              error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                } 
    });
}  

// =============================== Add to Cart ==========================================
      /*
      Add to cart - 
      1. For Without login user - done by using 'localStorage'
      2. For Login user - done by 'ajax' and 'database'
      */
      
      //check for empty storage      
      if(!localStorage.getItem('cart_item_list')){
        let arr = [];
        localStorage.setItem('cart_item_list', JSON.stringify(arr));
        console.log('arr--',arr);
      }

      let existing_arr = JSON.parse(localStorage.getItem('cart_item_list'));
      
      var product_quantity = 0;
      
      // var add_to_cart = document.getElementById('add_to_cart');
      
      var my_size = document.getElementById('my_size');
       
/*
 same product_uuid | same color | same size  - Updated Product Quantity (By 1)
 same product_uuid | diff color | diff size  - Add New Card
 same product_uuid | same color | diff size  - Add New Card 
*/

// below code is for localstorage - to store cart item without login mode
/*
var updated_array = [];
add_to_cart.addEventListener('click', function(e){    
  e.preventDefault(); //
      
  if(item_count < 10){
    alert('maximum');
    return false;
  }
    // console.log('clicks');    
    // alert(my_size.value);
    // alert(color_global);
    
    if(my_size.value == 0){
      alert('Select Size')
      my_size.style.border = '2px solid red';
      my_size.focus();  
      return false;          
    }

    // Retrieving the value from session storage colorIdWithoutSize
    var colorIdWithoutSize__ = sessionStorage.getItem('colorIdWithoutSize');
    // alert(colorIdWithoutSize__); 

    // Retrieving the value from session storage
    var colorIdWithSize = sessionStorage.getItem('colorIdWithSize');
    // clear it when user visit my_cart page.

    var color_name = sessionStorage.getItem('color_name');
    // alert(colorIdWithSize); 

    if(colorIdWithSize == null){
        alert('Choose color');
        return false;
    }
      
    // product_color_name = 

    var user_uuid = document.getElementById('user_uuid').value;
    var product_uuid = document.getElementById('product_uuid').value;
    var product_name = document.getElementById('product_name').value;
    // product_size + product_size_name
    var product_size = my_size.value;
    //              
    let product_color = colorIdWithSize;

    var product_image = document.getElementById('product_image').value;
    // var product_mrp = document.getElementById('product_mrp').value;
    
    var product_selling_price = document.getElementById('product_selling_price').value;
    // var discount_percentage = document.getElementById('discount_percentage').value;
    var discount_percentage = '10';
    // window.localstorage.clear();  
    // console.log(product_size);


    if(user_uuid =='None' || user_uuid == 'undefined'){
      // alert('user_not_login')
      product_quantity += 1;

      let product_size_result = '';
      let product_size_unit = '';

      product_size_result = product_size.split('_');
      product_size_unit = product_size_result[1];
      // 1. Fetch existing array 
      // 2. Check for product_uuid ,if exist then check for size and color , if all match then update product_quantity by One , if NOT then add new card with diff value.
      
      var cart_items = JSON.parse(localStorage.getItem('cart_item_list'));
      console.log('cart_items',cart_items);
      console.log('954::', (Object.keys(cart_items)));
      
      //Case 1: First time, when cart is empty
      if(cart_items.length === 0){
        //save data to localstorage
        console.log('Case 1: First time, when cart is empty')
        var cart_item_obj = {
            id:'id_' + (new Date()).getTime(), 
            product_uuid:product_uuid,           
            product_image:product_image,
            product_name:product_name,
            product_selling_price:product_selling_price,
            product_size:product_size_unit, 
            product_color:product_color,
            product_color_name:color_name,
            product_quantity:product_quantity
        };

        existing_arr.push(cart_item_obj);     //[{obj1},{obj2}]        

        localStorage.setItem("cart_item_list", JSON.stringify(existing_arr));          
      }

      // Case 2: When Cart is not empty.
      if(cart_items.length > 0){
        console.log('Case 2: When Cart is not empty')
        let  total_items = Object.keys(cart_items).length;                     
        
        for(let i=0; i < total_items; i++)
        {
          //Case 3: When Product is already in cart
          
          if(cart_items[i].product_uuid === product_uuid){
            
            for(let j= i+1; j < total_items; j++){
                  
              console.log('Case 3: When Product is already in cart');
              // Case 4: When we find same product(size and color is same).
                  
              console.log('product_size_unit:',(product_size_unit));
              console.log('cart_items[i].product_size:',(cart_items[i].product_size));

              console.log('product_color:',(product_color));
              console.log('cart_items[i].product_color:',cart_items[i].product_color);

              if(cart_items[i].product_size == cart_items[j].product_size){alert('got it');}
              if(cart_items[i].product_color == cart_items[j].product_color){alert('got it');}

              if(cart_items[i].product_size === product_size_unit 
              && cart_items[i].product_color === product_color){

                if(cart_items[i].product_color == product_color){
                  console.log('Case 4: When we find same product-size and color is same'); 
                  // console.log(cart_items[i].product_quantity);                      
                  // cart_items[i].product_quantity += 1;                      
                  // console.log(cart_items[i].product_quantity);   

                  //Push - Cart-item-Object to existing Array
                  // updated_array.concat(cart_items);     //[{obj1},{obj2}]        
                  //DO-NOTHING
                  console.log(cart_items);
                    
                    // Step 3: Store the updated array back into localStorage
                    // localStorage.setItem('cart_item_list', JSON.stringify(updated_array));
                    // window.location.reload();
                    return 0;
                  }
                } else {
                  //Case 5: if product_uuid is same but size and color is diff.             
                  console.log('Case 5: if product_uuid is same but size and color is diff.')
                  var cart_item_obj = {
                    id:'id_' + (new Date()).getTime(), 
                    product_uuid:product_uuid,           
                    product_image:product_image,
                    product_name:product_name,
                    product_selling_price:product_selling_price,
                    product_size:product_size_unit, 
                    product_color:product_color,
                    product_color_name:color_name,
                    product_quantity:product_quantity
                  };
                  //Push - Cart-item-Object to existing Array
                  existing_arr.push(cart_item_obj);     //[{obj1},{obj2}]        
                  //Save - Existing array to localstorage.
                  localStorage.setItem("cart_item_list", JSON.stringify(existing_arr));          
                  return 0;
                }
              // return 0;
            } //end-of-for -j
          } else {
            // Case 6: If Product_uuid Does not match with items present in cart,Add New Item
            console.log('Case 6: If Product_uuid Does not match with items present in cart,Add New Item');
            var cart_item_obj = {
                id:'id_' + (new Date()).getTime(), 
                product_uuid:product_uuid,           
                product_image:product_image,
                product_name:product_name,
                product_selling_price:product_selling_price,
                product_size:product_size_unit, 
                product_color:product_color,
                product_color_name:color_name,
                product_quantity:product_quantity
            };

            existing_arr.push(cart_item_obj);     //[{obj1},{obj2}]        

            localStorage.setItem("cart_item_list", JSON.stringify(existing_arr));          
            return 0;
          }
        }//for-loop end 
      }//end-if cart is not empty
                            
      document.getElementById('result__localstr').innerHTML = JSON.parse(localStorage.getItem('cart_item_list'));                   
    
      var item_count = JSON.parse(localStorage.getItem('item_count'));
      // window.location.reload();

      // ---------------     COUNTER    -----------------------------
      // if (localStorage.clickcount) {
      //     localStorage.clickcount = Number(localStorage.clickcount)+1;
      //   } else {
      //     localStorage.clickcount = 1;
      //   }
      //   document.getElementById("result").innerHTML = "" + localStorage.clickcount + "-items in Bag";
      
      // console.log("bag"+localStorage.clickcount);
      // --------------- COUNTER END -----------------------------
      //After clicking add to cart button, all data save to localstroage and refresh


    } else { 
      //=================================  When USER LOGIN  ====================================
      // alert('user is login')
      if (localStorage.clickcount) {
        localStorage.clickcount = Number(localStorage.clickcount)+1;
      } else {
        localStorage.clickcount = 1;
      }
      document.getElementById("result").innerHTML = "" + localStorage.clickcount + "-items in Bag";
          
      console.log("bag"+localStorage.clickcount);
      //save data to database using Ajax
      // alert('login user,,welcome');
      console.log('data:',user_uuid, product_uuid,product_name,product_size,product_color,product_image,product_mrp,product_selling_price,discount_percentage);
                    
      $.ajax({
        url:"</?php echo base_url('EStore/EStore_Controller/add_to_cart_ajax');?>",
        type:"POST",
        data:{
              item_count:localStorage.clickcount,
              product_uuid:product_uuid,
              user_uuid:user_uuid,
              product_name:product_name,
              // product_size:product_size,
              // product_color:product_color,
              product_quantity:product_quantity,
              product_image:product_image,
              product_mrp:product_mrp,
              product_selling_price:product_selling_price,
              discount_percentage:discount_percentage
            },                
        success:function(RespondedData) {  
            console.log(RespondedData);      
            location.reload();                              
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            console.log(XMLHttpRequest);
            console.log(errorThrown);
        }
      });       

// NOT IN USE
        //     $.ajax({
        //       url:'<//?= base_url('EStore/EStore_Controller/add_to_cart_ajax');  ?>',
        //       type: 'POST',
        //       data:{
                
        //         // item_count:localStorage.clickcount,
        //         product_uuid:product_uuid,
        //         user_uuid:user_uuid,
        //         product_size:product_size,
        //         product_color:product_color,
        //         product_quantity:product_quantity,
        //         product_image:product_image,
        //         product_mrp:product_mrp,
        //         product_selling_price:product_selling_price,
        //         discount_percentage:discount_percentage
        //       },
        //       // success:function(data, textStatus, jqXHR){
        //       success:function(data){
              
        //         var jsonData = JSON.parse(data);
                
        //         console.log(jsonData); 
        //         // </?php redirect('cart'); ?>
        //         //location.reload();   
        //       },
        //       error:function(XMLHttpRequest, textStatus, errorThrown){
        //         alert(errorThrown);
        //         console.log(XMLHttpRequest); 
        //         console.log(textStatus); 
        //         console.log(errorThrown); 
        //       }
        // });
  }
        // var product_color = document.getElementById("product_color");
        // var value = product_color.value;
        // var text = product_color.options[product_color.selectedIndex].text;
        // console.log(user_uuid);
        // alert(value);
        // alert(text);

});// add to cart event listener end 
*/
   
// $(function() {
  // A $( document ).ready() block.
$( document ).ready(function() {
  


// var rateProduct = document.getElementById('rateProduct'); //rateProduct
// rateProduct.addEventListener('click', function(){
//   console.log("button clicked");
// })

// rating form hide/show
$( "#rateProduct" ).click(function() {   
	$("#ratingDetails").hide();
	$("#ratingSection").show();
});

$( "#cancelReview" ).click(function() {
	$("#ratingSection").hide();
	$("#ratingDetails").show();
});
// implement start rating select/deselect
$( ".rateButton" ).click(function() {
	if($(this).hasClass('btn-grey')) {
		$(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
		$(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
		$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
	} else {
		$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
	}
	$("#rating").val($('.star-selected').length);
});
// save review using Ajax
$('#ratingForm').on('submit', function(event){
	event.preventDefault();
	var formData = $(this).serialize();
	// alert(formData);
  $.ajax({
		type : 'POST',
		url : '<?= base_url('save-ratings'); ?>',
		data : formData,
		success:function(data, status, response){
			// alert(data);
			$("#ratingForm")[0].reset();
			window.setTimeout(function(){window.location.reload()},1000)
		},error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("Status: " + textStatus);
			alert("Error: " + errorThrown);
		}
	});

});

});

// https://adnan-tech.com/shopping-cart-php-cookies#:~:text=php%20%24conn%20%3D%20mysqli_connect(%22,products%20WHERE%20productCode%20%3D%20'%22%20.
// https://www.javatpoint.com/javascript-localstorage


/*
function findDuplicateObjects(array, property) {
  const duplicates = [];

  for (let i = 0; i < array.length; i++) {
    for (let j = i + 1; j < array.length; j++) {
      if (array[i][property] === array[j][property] && !duplicates.includes(array[i])) {
        duplicates.push(array[i]);
      }
    }
  }

  return duplicates;
}

const myArray = [
  { id: 1, name: 'John' },
  { id: 2, name: 'Jane' },
  { id: 3, name: 'John' },
  { id: 4, name: 'Jane' },
  { id: 5, name: 'David' }
];

const duplicateObjects = findDuplicateObjects(myArray, 'name');

console.log(duplicateObjects);

 */

 function checkProductQuantityAviability(){
  // let product_quantity = 1;
  var product_uuid = document.getElementById('product_uuid').value;
  var colorIdWithSize = sessionStorage.getItem('colorIdWithSize');
  var my_size = document.getElementById('my_size');
  // product_size + product_size_name
  var product_size = my_size.value;
  //              
  let product_color_id = colorIdWithSize;
  let product_size_result = '';
  let product_size_unit = '';

      product_size_result = product_size.split('_');
      product_size_uuid = product_size_result[0];
      product_size_unit = product_size_result[1];

      // console.log('product_uuid:',product_uuid);
      // console.log('product_color_id:',product_color_id);
      // console.log('product_size_uuid:',product_size_uuid);

      let productVariationCombination = {
                        mainProductUUID: product_uuid,
                        productColorId: product_color_id,
                        productSizeUUID: product_size_uuid
    }

    // Ajax 
    $.ajax({
            url:"<?php echo base_url('EStore/EStore_Controller/checkProductQuantityAviability_Ajax');?>",
            type:"POST",
            data: productVariationCombination,                                  
            success:function(RespondedData) {  
                console.log((JSON.parse(RespondedData)));      
                
                var productQuantity = JSON.parse(RespondedData);
                let totalProductStockInDB = productQuantity[0]['product_quantity'];
                let product_variation_uuid = productQuantity[0]['variation_uuid'];

                console.log(product_variation_uuid);
                
                if(totalProductStockInDB > 1){
                  addToCartItemsInDatabase(totalProductStockInDB,product_variation_uuid);
                }else{
                  document.getElementById('product_stock_InDb').innerHTML = 'Out of Stock';
                }
                // location.reload();                              
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                console.log(XMLHttpRequest);
                console.log(errorThrown);
            }
            });   

}

 function addToCartItemsInDatabase(total_quantity_inStock, product_variation_uuid){
    // alert('here');

    let user_uuid = document.getElementById('user_uuid').value;
    let product_uuid = document.getElementById('product_uuid').value;
    let product_name = document.getElementById('product_name').value;
        
    //for Product color
    let product_color_id = sessionStorage.getItem('colorIdWithSize');
    let product_color_name = sessionStorage.getItem('color_name');

    // for Product size
    let my_size = document.getElementById('my_size');    
    let product_size = my_size.value;      
    let product_size_result = '';
    let product_size_unit = '';
        product_size_result = product_size.split('_');

        product_size_uuid = product_size_result[0]; 
        product_size_unit = product_size_result[1];  // S,M,L,XL    

    let product_image = document.getElementById('product_image').value;
    let product_mrp = document.getElementById('product_mrp').value;    
    let product_selling_price = document.getElementById('product_selling_price').value;
    let discount_percentage = document.getElementById('discount_percentage').value;
    
     /*
    console.log('user_uuid',user_uuid);
    console.log('product_uuid',product_uuid);
    console.log('product_name',product_name);
    console.log('product_size_uuid',product_size_uuid);
    console.log('product_size_unit',product_size_unit);
    console.log('product_color_id',product_color_id);
    console.log('product_color_name',product_color_name);
    console.log('product_image', product_image);
    console.log('product_mrp', product_mrp);
    console.log('product_selling_price', product_selling_price);
    console.log('discount_percentage', discount_percentage); 
    console.log('totalProductStockInDB',total_quantity_inStock);
     */
   
   // let product_details1 = { dummy_value: any_val } both variable_name should be diff.


  let addProductToCart = {
              loginUsersUUID:  user_uuid,    
              productItemUUID: product_uuid,
              productVariationUUID: product_variation_uuid,
              productName:  product_name,
              productImage: product_image,
              productSizeUUID: product_size_uuid,
              productSizeName: product_size_unit,
              productColorID: product_color_id,
              productColorName: product_color_name,
              productMRP: product_mrp,
              productSellingPrice: product_selling_price,
              productDiscount: discount_percentage,
              itemCount: 1,
              totalProductStockInDB:total_quantity_inStock
            }
            

          $.ajax({
                url: "<?php echo base_url('EStore/EStore_Controller/add_to_cart_ajax');?>",
                type: "POST",
                data: addProductToCart,                                  
                success:function(RespondedData) {  
                    console.log(RespondedData);      
                    // location.reload();   
                    // JavaScript code
                  window.location.href = '<?php echo base_url("cart"); ?>';
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
            });       


      //  
 }
    </script>
</body>

</html>