<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  /* size of product */
/* .size-choose div {
  display: inline-block;
}

.size-choose input[type="radio"] {
  display: none;
}

.size-choose input[type="radio"] + label span {
  display: inline-block;
  width: 50px;
  height: 50px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
}

.size-choose input[type="radio"] + label span {
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
}

.size-choose input[type="radio"]#size + label span {
  background-color: #F5F5F5;
}

.size-choose input[type="radio"]:checked + label span {
  background-image: url(image/ring.svg);
  background-repeat: no-repeat;
  background-position: center;
} */
/* Pin Code Button */
.pinCode-btn {
  float: right;
  margin-left: -25px;
  margin-top: -38px;
  margin-right: 100px;
  position: relative;
  z-index: 2;
}
  /* Zoom In Product */
figure {
  margin: 0;
  padding: 0;
  background: #fff;
  overflow: hidden;
}
figure:hover+span {
  bottom: -36px;
  opacity: 1;
}
.hover01 figure img {
  -webkit-transform: scale(1);
  transform: scale(1);
  -webkit-transition: .4s ease-in-out;
  transition: .4s ease-in-out;
}
.hover01 figure:hover img {
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
}
.color-box {
  background-color: <?php echo $color_variation->hex_code; ?>;
}

/*  */
.offcanvas-end {
    top: 0;
    right: 0;
    width: 800px!important;
    border-left: 1px solid rgba(0,0,0,.2);
    transform: translateX(100%);
}

/* For border-color selected div */
.add-border-red {
  border: 1px solid white;
  padding: 2px;
  cursor: pointer;
}

.add-border-red.selected {
  border-color: red;
}
 
.square{
  width: 100%;
  height: 100%;
 }

 .btn_sqr{
    height:25px;
    width:25px;
    cursor:pointer;
 }

 #add_to_cart{
  font-size:18px;
 }

</style>

<?php 
  $userLoginData = $this->session->userdata('userLoginData'); 
 // print_r($userLoginData);
?>

<body class="bg-secondary text-dark bg-opacity-10">

<div class="container-fluid">

        <!-- <h4>Product Details</h4> -->
        <?php 
        // echo('<pre/>');
        // var_dump(($product_imgs[0]));
         ?>
        <div class="container-fluid">
<div class="col-md-12">
  <!-- dynamic image -->   
        <div id="result"></div>       
<?php 
    // $item_count = $this->session->userdata('item_count'); 
    // echo isset($item_count)?$item_count:0;
?>
<div id="result__localstr"></div>

<div class="row">
      <div class="col  hover01">
  <div id='image_color_id'>
    
    <?php if(isset($product_imgs)){ ?>
      <div class="row">
        <?php for ($i=0; $i < count($product_imgs) ; $i++) { ?>
              <div class="col-6 mt-2">
                <a href="<?= base_url('upload_img/'.$product_imgs[$i]['main_product_image']); ?>" data-fancybox="gallery" data-caption="WRONG Tshirt">
                    <figure><img style="" src="<?= base_url('upload_img/'.$product_imgs[$i]['main_product_image']); ?>" alt="" width="450" height="450"></figure>
                </a>
              </div>
              <?php } ?> 
            </div>
          <?php }else{ echo("<h3>No Image Uploaded yet</h3>");} ?>
        </div><!--image_color_id-->
        <!-- on page load color variation -->
        <div id='show_image_color_id'></div>
        <!-- on user click color variation -->
        <div id='show_color_variation_img'></div>

    </div>


      <!-- Product discription -->
      <!-- </?php var_dump($product_main); ?>       -->


      <div class="col-md-4">
        <div id="" style="font-size:25px;"><?= $product_main[0]->product_name; ?></div>
        <!-- hidden tags -->
        <input type="hidden" id="user_uuid" value="<?= isset($userLoginData['user_uuid'])?($userLoginData['user_uuid']):'None'; ?>" />
        
        <input type="hidden" id="product_image" value="<?= $product_main[0]->product_main_image; ?>" name="<?= $product_main[0]->product_main_image; ?>" />
        
        <input type="hidden" id="product_name" value="<?= $product_main[0]->product_name; ?>" name="<?= $product_main[0]->product_name; ?>" />

        <input type="hidden" id="product_selling_price" value="<?= $product_main[0]->product_selling_price; ?>" name="<?= $product_main[0]->product_selling_price; ?>" />

        <input type="hidden" id="product_uuid" value="<?= $product_main[0]->product_uuid; ?>" name="<?= $product_main[0]->product_uuid; ?>" />
      <!-- hidden tags ends -->

        <p class="text-muted"><?= $product_main[0]->product_short_description; ?></p>
        
        <!-- <div class="">
            <h4><span class="sansserif text-info" style="font-size: 14px;">479 Ratings and 8 Reviews&nbsp;&nbsp;</span>
            <span style="font-size: 12px;"><i class="fa fa-star" aria-hidden="true"></i> 4.0 stars</span>
            </h4>
        </div> -->


        <div class="price-wrap">
      <span class="mt-2" style="font-size: 22px;" id=""><?= $product_main[0]->product_selling_price; ?></span>&nbsp;
      <small><span class="mt-2 text-secondary" style="font-size: 18px;" id="product_mrp"><s><?= $product_main[0]->product_mrp; ?></s></span></small>&nbsp;
      <small><span class="mt-2 text-warning" style="font-size: 18px;" id="discount_percentage">(<?= $product_main[0]->discount_percentage; ?>%OFF)</span></small>
      <p class="text-success">inclusive of all taxes</p>
    </div>
    <div>
<div class="row">
    <div class="col">
    <select class="form-select form-select-sm" onchange="onchangeSizeShowProdColor(this.value)" aria-label=".form-select-sm example">
  <option selected>SELECT SIZE</option>
 
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

<!-- <select class="form-select mt-3" id="product_color" aria-label="Default select example">
<option selected>Select-Color</option>
</?php if(isset($avilable_color_variation)){
          foreach($avilable_color_variation as $color_variation): ?>  
  <option value="</?= $color_variation->color_id.'_'.$color_variation->color_name; ?>"></?= $color_variation->color_name; ?></option>  
  </?php endforeach; } ?>
</select> -->

<div class="mt-2" id="all_color">
  <!-- buttons -->
<?php if(isset($avilable_color_variation)){
   
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
    
      <button class='btn_sqr' style="background-color: <?= isset($color_variation->product_hex_code)?$color_variation->product_hex_code:0; ?>" onclick='changeProductColor(<?= $color_variation->product_color; ?>)'></button>

  </div>
  <!-- <small></?= $color_variation->product_color_name; ?> </small> -->
  </div>
  <?php endforeach; } ?>
</div>
<!-- dynamic color according to product size -->
<div class='mt-2' id="showSelectedColor"></div>
<!-- offcanvas for size-guide -->


<!-- 
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    </div>
    
  </div>
</div> -->

<!-- static -->
    <div class="mt-3">
    <!-- if href='' is empty then it will reload the page as its default nature,
    to stop or prevent this we have to use  event.preventDefault() in our function
    
 -->
    <a href="" 
      class="btn btn-outline-dark btn-block btn-lg" 
      id="add_to_cart" 
      role="button" 
      aria-pressed="true">
      <!-- <i class="fa fa-shopping-bag" aria-hidden="true">         -->
      <span class="icon-shopping-bag"></span>      
    <!-- </i> -->
    &nbsp;&nbsp;ADD</a>&nbsp;&nbsp;
          <!-- <a href="#" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;&nbsp;WISHLIST</a> -->
      </div>

      <!-- <div class="mt-4">DELIVERY OPTIONS <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></div> -->

 <!-- <input type="text" class="form-control w-75 p-3" aria-label="Large" placeholder="Enter Pincode" aria-describedby="inputGroup-sizing-sm">
 <button class="pinCode-btn btn btn-white text-danger">Check</button>
 <p class="text-muted"><small>Please enter PIN code to check Delivery Availability</small></p> -->

   <div class="text-muted mt-2 font-weight-light">
    <span>100% Original Products</span><br/>
    <span>Free Delivery on order above Rs. 899</span><br/>
    <span>Pay on delivery might be available</span><br/>
    <span>Easy 30 days returns and exchanges</span><br/>
    <span>Try & Buy might be available</span>
  </div>
  



<!-- <div class="mt-4">
<span class="font-weight-bold">BEST OFFERS <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z"/>
  <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
</svg></span>
 <ul class="font-weight-light" style="font-size: 14px;">
    <li>Coupon code: <strong>FASHION250</strong></li>
    <li >Coupon Discount: Rs. 250 off (check cart for final savings)</li>
    <li>Applicable on: Orders above Rs. 1249 (only on first purchase)</li>
  </ul>
</div> -->

<br>
<div class="mt-2">
<!-- <span class="font-weight-bold">Specifications</span>
<table class="table">

  <tbody>
    <tr>
      <td>
        <p class="text-muted" style="font-size: 12px;">Fabric</p>
        <p class="font-weight-light">Cotten</p>
      </td>
      <td>
        <p class="text-muted" style="font-size: 12px;">Fit</p>
        <p class="font-weight-light">Slim Fit</p>
      </td>
    </tr>

        <tr>
      <td>
        <p class="text-muted" style="font-size: 12px;">Length</p>
        <p class="font-weight-light">Regular</p>
      </td>
      <td>
        <p class="text-muted" style="font-size: 12px;">Main Trend</p>
        <p class="font-weight-light">New Basics</p>
      </td>
    </tr>

    <tr>
      <td>
        <p class="text-muted" style="font-size: 12px;">Pattern</p>
        <p class="font-weight-light">Solid</p>
      </td>
      <td>
        <p class="text-muted" style="font-size: 12px;">Neck</p>
        <p class="font-weight-light">Round</p>
      </td>
    </tr>
        <tr>
      <td>
        <p class="text-muted" style="font-size: 12px;">Wash Care</p>
        <p class="font-weight-light">Machine Wash</p>
      </td>
      <td>
        <p class="text-muted" style="font-size: 12px;">Occasion</p>
        <p class="" ass="font-weight-light">Casual</p>
      </td>
    </tr>
  </tbody>
</table> -->
</div>
<hr>
    <div>
          <span>Product Code:&nbsp;<strong>W2N53182</strong></span><br>
          <span>Sold by:&nbsp;<strong>Flashstar Commerce</strong></span><br>
          <span>Country of origin:&nbsp;<strong>India</strong></span><br>
    </div>
<!-- static  end -->
<div>
<?= $product_main[0]->product_long_description; ?>
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
					<div class="ratings text-center p-4 py-5"><span class="badge bg-success">
              <?php printf('%.1f', $average);?>/ 5&nbsp;<i class="fa fa-star"></i>
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
						<div class="d-flex align-items-center"> <span class="stars"> <span>5 <i class="fa fa-star text-success"></i></span> </span>
							<div class="col px-2">
								<div class="progress" style="height: 5px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $fiveStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div> <span class="percent"> <span>
								<?php echo $fiveStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>4 <i class="fa fa-star text-custom"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-custom" role="progressbar" style="width: <?php echo $fourStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $fourStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>3 <i class="fa fa-star text-primary"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $threeStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $threeStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>2 <i class="fa fa-star text-warning"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 
                    <?php echo $twoStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $twoStarRating; ?></span> </span>
							</div>
							<div class="d-flex align-items-center"> <span class="stars"> <span>1 <i class="fa fa-star text-danger"></i></span> </span>
								<div class="col px-2">
									<div class="progress" style="height: 5px;">
										<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $oneStarRatingPercent; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> <span class="percent"> <span><?php echo $oneStarRating; ?></span> </span>
							</div>

						</div>
					</div>
          <!-- End Progress bar -->

					<div class="col-md-4">
						<div class="p-3 mt-2 border-left">
							<h3>Review this product</h3>
							<label style="color: gray;">Share your thoughts with other customers</label>
							<br/>
							<button type="button" id="rateProduct" class="btn btn-primary">Write a product review</button>
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
  <?php
  if(isset($rating_reviews)){
    foreach($rating_reviews as $rr):
  
  ?>
							<div class="row">
								<div class="col-sm-2">
									<img src="<?= base_url('assets/img/user.png'); ?>" class="img-rounded" height="50" width="55">
									<div class="review-block-name">By <a href="#">User</a></div>
									<div class="review-block-date">
                    <!-- </?php echo $reviewDate; ?> -->
                  </div>
								</div>

								<div class="col-sm-9">
									<div class="review-block-rate">
                  <div class="review-block-title">

                    <?php 
                    if($rr['user_name'] !== 'User'){
                    echo $rr['user_name']; ?>&nbsp;&nbsp;&nbsp;<small class='text-muted'>verified <img src="<?= base_url('assets/img/icons8-verified-badge-16.png'); ?>"/></small>
                    <?php } else {?>
                      <?php echo $rr['user_name']; ?>
                      <?php }?>
                  </div>
										<?php
                    for ($i = 1; $i <= 5; $i++) {
                        $ratingClass = "btn-default btn-success";
                        if ($i <= $rr['rating_number']) {
                          $ratingClass = "btn-default btn-dark";
                        }
                        ?>
											<button type="button" class="btn btn-xs<?php echo $ratingClass; ?>" aria-label="Left Align">
												<span><i class="fa fa-star" aria-hidden="true"></i></span>
											</button>
										<?php } //end-of-for?>
									</div>
									<div class="review-block-title"><?php echo $rr['rating_title']; ?></div>
									<div class="review-block-description"><?php echo $rr['rating_comment']; ?></div>
                  <small class='text-muted'>Reviewed on: <?php 
                  $date = date_create($rr['createdAt']);
                  echo date_format($date,"d F Y");
                  ?></small>
								</div>
							</div>
							<hr/>
						<?php endforeach; } //end-of-foreach?>
					</div>
				</div>
			</div><!--row-->
		</div>
	</div><!--"ratingDetails"-->



    <script>

// JavaScript code
// const myDiv = document.getElementsByClassName("color_change");
// console.log(myDiv);
// myDiv.addEventListener("click", function() {
  
//   // Toggle the "highlight" class on and off
//   this.classList.toggle("select_color");
// });

 
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
                 console.log(jsonData);
            if(jsonData != null){
            if(jsonData.length != 0){
                  document.getElementById('all_color').style.display = 'none';
                  var htmlTemp = '';
               // htmlTemp = 'Hello';
                 for(let i=0; i < jsonData.length; i++){
                  htmlTemp += `<div class="form-check form-check-inline">`;    
                  htmlTemp += `<div class="add-border-red">`;                  
                    htmlTemp += `<button class='btn_sqr' style='background-color:${jsonData[i].product_hex_code}' onclick='getProductImageByColor(${jsonData[i].product_color})'></button>`;
                    htmlTemp += `</div>`;
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
function getProductImageByColor(color_id){
  var product_uuid = document.getElementById('product_uuid').value;

  console.log(color_id);
  console.log(product_uuid);

  $.ajax({
    url:"<?php echo base_url('EStore/EStore_Controller/show_product_image_by_color_ajax');?>",
    type:'POST',
    data:{
        product_uuid:product_uuid,
        color_id:color_id
      },
      success:function(RespondedData) {  
              console.log(RespondedData);  
              jsonData = JSON.parse(RespondedData);
              console.log(jsonData);
            if(jsonData != null){
                if(jsonData.length != 0){
                  //hide product first
                  document.getElementById('image_color_id').style.display = 'none';
                  document.getElementById('show_image_color_id').style.display = 'none';
                       var htmlTemp = '';
                    
                  
                  htmlTemp += `<div class='row'>`;
                  for(let i=0 ;i < jsonData.length; i++){                   
                    htmlTemp += "<div class='col-6 mt-2'><figure><img src='<?= base_url(); ?>colors_img/"+jsonData[i]['product_color_img']+"' width='450' height='450'></figure></div>";                                           
                    }    
                  htmlTemp += `</div>`; 
                  //display colored producted
                  document.getElementById('show_color_variation_img').innerHTML = htmlTemp;
                }
              }else{
                document.getElementById('show_color_variation_img').innerHTML = 'No';
                }
              },  
              error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                } 
    });
}

               


$(function() {
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
 

var color_id = document.getElementById('color_id'); 
console.log(color_id);

color_id.addEventListener("click", function() {
  
  console.log(color_id.value);
});

//change Product color on simple clicking on color-box
function changeProductColor(color_id){
    // alert(color_id);
  
    
    var url = window.location.href;
    url = url.slice(0,21) //return http://localhost/salt/

    var product_uuid = document.getElementById('product_uuid').value;
    
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
                   console.log(jsonData);
                 if(jsonData.length != 0){
                    document.getElementById('image_color_id').style.display = 'none';
                    var htmlTemp = '';
                    
                    htmlTemp += "<div class='row'>";
                    // htmlTemp += "<a href='' data-fancybox='gallery' data-caption='WRONG Tshirt'>";
                    for(let i=0 ;i < jsonData.length; i++){
                   
                      htmlTemp += "<div class='col-6 mt-2'><figure><img src='<?= base_url(); ?>colors_img/"+jsonData[i]['product_color_img']+"' width='450' height='450'></figure></div>";
                    }               
                    
                    htmlTemp +="</div>";                        
                    document.getElementById('show_image_color_id').innerHTML = htmlTemp;
                    
                    document.getElementById('new_div').classList.toggle('myClickState');
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

      //============ bag item count ========================
      // var item_count__ = JSON.parse(localStorage.getItem('item_count'));
          
      // var bag = document.getElementById('bag');
      //       if(item_count__){
      //           bag.innerHTML = `<i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(${item_count__})`;
      //         }
      //============ bag item count end ====================

      // product_quantity counter
      
      // var item_count = 0;
      // cart_item_list = [];
      
      
      //check for empty storage
      if(!localStorage.getItem('cart_item_list')){
        let arr = [];
        localStorage.setItem('cart_item_list', JSON.stringify(arr));
      }

      let existing_arr = JSON.parse(localStorage.getItem('cart_item_list'));
      
      var product_quantity = 1;
      
      var add_to_cart = document.getElementById('add_to_cart');
      
      add_to_cart.addEventListener('click', function(e){    
        e.preventDefault();

        // console.log('clicks');    
          
              var user_uuid = document.getElementById('user_uuid').value;
              var product_uuid = document.getElementById('product_uuid').value;
              var product_name = document.getElementById('product_name').value;
              // product_size + product_size_name
              var product_size = document.getElementById('product_size').value;
              //              
              var product_color = document.getElementById('product_color').value;              
              var product_image = document.getElementById('product_image').value;
              // var product_mrp = document.getElementById('product_mrp').value;
              var product_mrp = '999';
              var product_selling_price = document.getElementById('product_selling_price').value;
              // var discount_percentage = document.getElementById('discount_percentage').value;
              var discount_percentage = '10';
          // window.localstorage.clear();  
          console.log(product_size);


        if(user_uuid =='None' || user_uuid == 'undefined'){
          // alert('user_not_login')
          
          product_quantity += 1;
          
          //save data to localstorage
          var cart_item_obj = {
              id:'id_' + (new Date()).getTime(),            
              product_image:product_image,
              product_name:product_name,
              product_selling_price:product_selling_price,
              product_size:product_size, 
              product_color:product_color,
              product_quantity:product_quantity
          };
          // alert(JSON.stringify(cart_item_obj));
          
          existing_arr.push(cart_item_obj);         //[{obj1},{obj2}]
          
        //  alert(existing_arr);

          localStorage.setItem("cart_item_list", JSON.stringify(existing_arr));
          
          document.getElementById('result__localstr').innerHTML = JSON.parse(localStorage.getItem('cart_item_list'));                   
          
          var item_count = JSON.parse(localStorage.getItem('item_count'));
          
          // ---------------     COUNTER    -----------------------------
          // if (localStorage.clickcount) {
          //     localStorage.clickcount = Number(localStorage.clickcount)+1;
          //   } else {
          //     localStorage.clickcount = 1;
          //   }
          //   document.getElementById("result").innerHTML = "" + localStorage.clickcount + "-items in Bag";
          
          // console.log("bag"+localStorage.clickcount);
          // --------------- COUNTER END -----------------------------
        }else{
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
                url:"<?php echo base_url('EStore/EStore_Controller/add_to_cart_ajax');?>",
                type:"POST",
                data:{
                      item_count:localStorage.clickcount,
                      product_uuid:product_uuid,
                      user_uuid:user_uuid,
                      product_name:product_name,
                      product_size:product_size,
                      product_color:product_color,
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

      });

     
  
// https://adnan-tech.com/shopping-cart-php-cookies#:~:text=php%20%24conn%20%3D%20mysqli_connect(%22,products%20WHERE%20productCode%20%3D%20'%22%20.
// https://www.javatpoint.com/javascript-localstorage

    </script>
</body>

</html>