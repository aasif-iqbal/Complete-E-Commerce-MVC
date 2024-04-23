<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #return_form{
            display:none;
        }
        #refund_upi_id{
            display:none;
        }
        #refund_bank_acct{
            display:none;
        }
        #change_address{
            display:none;
        }
        /* card */
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
        /* height: 30px!important; */
      }   
      #addr_lable1{
        /* padding: 0px 0px 10px 0px; */
      }
      /* Desktop */
    @media screen and (min-width: 1200px) {
    /* CSS rules for desktop devices */
    #viewframe{
        /* border:5px solid red; */
        margin:0 20% 0 20%;
      }
    }

    /* Laptop */
    @media screen and (max-width: 1199px) and (min-width: 992px) {
    /* CSS rules for laptop devices */
    #viewframe{
        /* border:5px solid red; */
        margin:0 20% 0 20%;
      }
    }

    /* Tablet */
    @media screen and (max-width: 991px) and (min-width: 768px) {
    /* CSS rules for tablet devices */
    #viewframe{
        /* border:5px solid red;/ */
        /* margin:0 20% 0 20%; */
      }
    }
    </style>
</head>
<body>
  <div id="viewframe">
    <!-- <div class="h3 p-3">Customer Order Cancellation</div> -->
    <div class="h4 p-3">Return & Refund Order</div>
    <div class="container">
    <div class="h5 ml-3">order summary</div>    
     
    <div class="row">
  <?php     
	 

    //   echo("<pre/>");
    //   print_r($return_pickup_address);
  if(isset($cancelled_order) && !is_null($cancelled_order)){     
  ?>          
    <div class="col-md-8 col-lg-8">                             
        <!-- PRODUCT CARD -->
        <div class="mt-3 ml-3">
          <!-- <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>           -->
          <span class="card-text">Order Id : #<?= $cancelled_order[0]['order_uuid']; ?></span>
          <!-- <p class="card-text">Order date :</?= $cancelled_order[0]['createdAt']; ?></p>         --><br>
          <span class="card-text">Order date : 27 May '23</span>        
          <br>
          <!-- <span class="card-text product-attribute">Recived At:&nbsp;</?= $cancelled_order[0]['order_received_datetime']; ?></span> -->
          <span class="card-text product-attribute">Recived At:&nbsp; 30 May '23</span>
        </div>

        <div class="card bg-light-subtle mt-4" id="card_id">
          <img src="<?= base_url('uploads/'.$cancelled_order[0]['product_image']); ?>" class="card-img-top">
          <div class="card-body" id="card-body-id">
          <div class="text-section" id="text-section-id">
          <!-- Order status -->
          <!-- <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>
          
          <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;In Transit</span><br/>
          
          <span class="fw-bold"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>

          <span class="card-text product-attribute border-bottom">Arrived By 19 Jun, Mon</span><br/>
           -->
            <span class="fw-bold"><?= $cancelled_order[0]['product_name']; ?></span><br/>
            <!-- <span class="card-text product-attribute">Color: </?= $cancelled_order[0]['product_color_name']; ?></span>&nbsp;|&nbsp; -->
            <span class="card-text product-attribute">Color: <?= $cancelled_order[0]['product_color_name__'] ?? 'White'; ?></span>&nbsp;|&nbsp;
            <span class="card-text product-attribute">Size: <?= $cancelled_order[0]['product_size_name']; ?></span><br/>
            <span class="card-text product-attribute">Qty: 1</span><br/>
            <span class="card-text product-attribute">Rs. <?= $cancelled_order[0]['product_selling_price']; ?></span><br/>
            <span class="card-text product-attribute">Pay mode: <?= $cancelled_order[0]['payment_method']; ?></span><br/>                              
          </div>
          <!-- <div class="cta-section">
          <div>Rs.2599</div> for new section after product-name
          <p href="#" class="" id="btn-placeholder">Qty:1</p>
          </div> -->
        </div>    
        </div>         
      </div>                                                                        
    <!-- Product card ends -->
    </div> <!--row ends-->
<? }else {
  // Handle the case when the array is null or the index is invalid
  echo("<h2>NO Order Made By you,Yet!!</h2>");
}
?>

    <!-- <form action="</?= base_url('submit-order-return-refund');?>" method="POST"> -->

    <!-- hidden inputs 
    <input type="hidden" name="order_uuid" value="</?= $order_cancel[0]['order_uuid'];?>">
    <input type="hidden" name="product_uuid" value="</?= $cancel_order_info[0]['product_uuid'];?>">
    <input type="hidden" name="variation_uuid" 
            value="</?= $cancel_order_info[0]['variation_uuid'];?>">
    <input type="hidden" name="shipping_uuid" value="</?= $order_cancel[0]['shipping_uuid'];?>">
    <input type="hidden" name="user_uuid" value="</?= $order_cancel[0]['user_uuid'];?>">

    <input type="hidden" name="product_name" value="</?= $cancel_order_info[0]['product_name'];?>">
    <input type="hidden" name="product_size_name" value="</?= $order_cancel[0]['product_size_name'];?>">
    <input type="hidden" name="product_color_name" value="</?= $order_cancel[0]['product_color_name'];?>">
    <input type="hidden" name="product_mrp" value="</?= $order_cancel[0]['product_mrp'];?>">
    <input type="hidden" name="product_selling_price" value="</?= $order_cancel[0]['product_selling_price'];?>">
    <input type="hidden" name="product_discount" value="</?= $order_cancel[0]['discount_percentage'];?>">
    
    <input type="hidden" name="total_quantity" value="</?= $order_cancel[0]['total_quantity'];?>">
    <input type="hidden" name="payment_mode" value="</?= $order_cancel[0]['payment_mode'];?>">
    <input type="hidden" name="payment_id" value="</?= $order_cancel[0]['payment_id'];?>">
    <input type="hidden" name="order_datetime" value="</?= $order_cancel[0]['ordered_datetime'];?>">
    <input type="hidden" name="product_json" value='</?= ($order_cancel[0]['product_json']);?>'>

Ends hidden inputs -->

 <!-- 
1 – Public Sector Bank
State Bank Of India (SBI)
Punjab National Bank (PNB)
Indian Bank (IB)
Bank Of India (BOI)
UCO Bank
Union Bank Of India
Central Bank Of India
Bank Of Baroda
Bank Of Maharashtra
Canara Bank
Punjab And Sind Bank
Indian Overseas Bank
2 – Private Sector Bank

-->
<div class="h6 mt-2">Reason for cancellation</div>
    <div class='my-4'>        
        <p>Why are you returning this?</p>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="Received_different_Product" value="Received_different_Product">
            <label class="form-check-label" for="reasonForReturn1">
                Received different Product
            </label>
            </div>
            </li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="Size_Issue" value="Size_Issue">
            <label class="form-check-label" for="reasonForReturn1">
                Size Issue
            </label>
            </div></li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="Color_Issue" value="Color_Issue">
            <label class="form-check-label" for="reasonForReturn1">
                Color Issue
            </label>
            </div></li>
            <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="reasonForReturn" id="other_reason" value="other">
            <label class="form-check-label" for="reasonForReturn1">
                Other
            </label>
            </div>
            
            <div class="mb-3" id='return_form'>
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" id="other_textarea" rows="3"></textarea>
            </div></li>
        </ul>  
    </div>
    
    <hr>
         
    <div class='my-4'>        
    <h6>Payment status</h6>
    <p>Refund Amount:<strong>&nbsp;Rs.&nbsp;<?= $cancelled_order[0]['product_selling_price']; ?></strong></p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <label for="">Payment method of this Product is COD</label>
        <label for="">Choose, how you what to received money</label>
        <!-- IF PAYMENT MODE IS COD THEN HIDE BELOW CODE -->
        <?php if($cancelled_order[0]['payment_method'] != 'COD') {?>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="refunding_mode_of_payment" id="refund_to_same_mode" value="0" checked>
            <label class="form-check-label" for="">
                Same Mode As you pay When Product is purchesed (Not Valid for COD)            
        </div>
        <?php } ?>
             <hr>
            <!-- Refund UPI -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="refunding_mode_of_payment" id="refund_to_upi" value="1">
            <label class="form-check-label" for="">
                Refund through UPI ID
            </label><span class='float-right bg-success bg-gradient text-white pr-3 pl-3'>Faster</span>
            </div>
            <div class="mt-3 mb-3" id='refund_upi_id'>
                <input type="text" class="form-control" name="refund_payment_upi" id="refund_payment_upi" placeholder="johndeo@paytm">
            </div>
            </li>
            <li class="list-group-item">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="refunding_mode_of_payment" id="refund_to_bank" value="2">
            <label class="form-check-label" for="">
                Refund to Bank Account
            </label>
            <br>
            <p class="card-text"><small class="text-muted">Estimated refund timing: 3-5 bussiness days of receiving your return.</small></p>
        </div>
        <div id="refund_bank_acct">
            <div>
                <select class="form-select mt-2" name="refund_bank_name" aria-label="Default select example" id="refund_bank_name_id">
                    <option selected>Choose Bank</option>
                    <option value="State_Bank_Of_India">State Bank Of India (SBI)</option>
                    <option value="Punjab_National_Bank">Punjab National Bank (PNB)</option>
                    <option value="Indian_Bank">Indian Bank (IB)</option>
                    <option value="Bank_Of_India">Bank Of India (BOI)</option>
                    <option value="UCO_Bank">UCO Bank</option>
                    <option value="Union_Bank_Of_India">Union Bank Of India</option>
                    <option value="Central_Bank_Of_India">Central Bank Of India</option>
                    <option value="Bank_Of_Baroda">Bank Of Baroda</option>
                    <option value="Bank_Of_Maharashtra">Bank Of Maharashtra</option>
                    <option value="Canara_Bank">Canara Bank</option>
                    <option value="Punjab_And_Sind_Bank">Punjab And Sind Bank</option>
                    <option value="Indian_Overseas_Bank">Indian Overseas Bank</option>
                    <!-- private bank  -->
                    <option value="ICICI_Bank">ICICI Bank</option>
                    <option value="HDFC_Bank">HDFC Bank</option>
                    <option value="Axis_Bank">Axis Bank</option>
                    <option value="IDBI_Bank">IDBI Bank</option>
                    <option value="Dhanlaxmi_Bank">Dhanlaxmi Bank</option>
                    <option value="Kotak_Mahindra_Bank">Kotak Mahindra Bank</option>
                    <option value="Federal_Bank">Federal Bank</option>                     
                </select>            
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput" class="form-label">Account Holder Name</label>
                <input type="text" class="form-control" name="refund_acct_holder_name" id="refund_acct_holder_name" placeholder="eg. Ramesh Kumar">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput" class="form-label">Account no.</label>
                <input type="text" class="form-control" name="refund_acct_num" id="refund_acct_num" placeholder="">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">Account no.</label>
                <input type="text" class="form-control" id="refund_acct_num2" placeholder="Re-Enter Account no.">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">IFSC Code</label>
                <input type="text" class="form-control" name="refund_IFSC_code" id="refund_IFSC_code" placeholder="">
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">Branch Name</label>
                <input type="text" class="form-control" name="refund_branch_name" id="refund_branch_name" placeholder="">
            </div>
            </li>
    </ul>
    </div>
    <hr>
    <h6>Pickup</h6>
    </div><!--form check-->
    <!-- </?php var_dump($pickup_db_datetime);?>  -->

    <div class='my-4 mx-4' >  
          
        <p>Your package will be picked up by a courier service. Please return the item and packaging in its original condition to avoid pickup cancellation by courier service. More details..</p>
        <p>Printer not required - the carrier will bring your label.
        As we've prioritized our customers' most urgent needs, you will see longer than usual pick-up timeline.</p>
        <hr>
        <div class="h5">Pickup Date & Time</div>

        <!-- <p>Sunday, 25 Mar, 2023</p> -->
        <!-- <p></?= $future_day; ?>, </?php echo $pickup_datetime;?> - Sunday, 25 Jun,2023</p> -->
        <p>Saturday 03 Jun,2023 - Sunday, 04 Jun,2023</p>

        <p>Time: 11:00 - 19:00</p>
        <input type="hidden" name="pickup_datetime" value="<?php echo($pickup_db_datetime);?>">
        <hr>
        <div class="h5">Pickup Address</div>
        <p>K-294, k-Block, Ashok Nagar, Delhi - 110024</p>
        <p>Address type: Home</p>
        <p>Phone No: +91-9090908888</p>
        <!-- </ ?php var_dump($return_pickup_address[0]); ?> -->                
        <!-- change_address end -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="pickup_addr_status" id="pickup_addr_status1" value="1" checked>
            <label class="form-check-label" for="">
                same as above
            </label>            
        </div>
        <hr>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="pickup_addr_status" id="pickup_addr_status2" value="2">
            <label class="form-check-label" for="">
                change pickup address
            </label>            
        </div>
        <hr>
    <!-- <a class='link' onclick="changeAddress();"  role="button">change pickup address</a> -->

        <!-- <button type="button" id="change_pickup_addr" class="btn btn-secondary btn-sm">change pickup address</button> -->

    <div id='change_address'>
        <div class="mt-3 mb-3">
                <label for="formGroupExampleInput" class="form-label">Address (House no,Street)</label>
                <input type="text" class="form-control" name="return_addr_house_no" id="return_addr_house_no" placeholder="" required>
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">Locality / Town</label>
                <input type="text" class="form-control" name="return_addr_locality" id="return_addr_locality" placeholder="" required>
            </div>
            <div class="mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">City / District</label>
                <input type="text" class="form-control" id="return_addr_city" name="return_addr_city" placeholder="" required>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="formGroupExampleInput2" class="form-label">Pin Code</label>
                    <input type="text" class="form-control" id="return_addr_pin_code" name="return_addr_pin_code" placeholder="" required>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput2" class="form-label">State</label>
                    <input type="text" class="form-control" id="return_addr_state" name="return_addr_state" placeholder="" required>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput2" class="form-label">Country</label>
                    <input type="text" class="form-control" id="return_addr_country" name="return_addr_country" placeholder="" required>
                </div>
            </div>             
        
            
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3  pb-1">Address Type</label>
    <div class="col-sm-9">
         <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="return_addr_type" id="addr_type_1" value="1">
                <label class="form-check-label" id='addr_lable1' for="">Home</label>
        </div>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="return_addr_type" id="addr_type_2" value="2">
                <label class="form-check-label"  id='addr_lable2' for="">Work</label>
        </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Phone no</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="receivers_phone_no" name="receivers_phone_no" require>
    </div>
  </div>

  <hr>
</div>

If you facing any problem while return order, please, dont hasitate to call / email to our customer support team, we will reach you shortly.
<div class="d-grid gap-2 col-6 mx-auto">   
    <button type="button" class="btn btn-outline-primary" 
    onclick="submitOrderReturnRefund()">CONFIRM YOUR RETURN</button>
</div>
    </div>
    </div>
    
<!-- </form> -->
<!-- form ends -->
    </div>
  </div>      
    <script>
        
        
        let refund_to_same_mode = document.getElementById('refund_to_same_mode');  
          
        let refund_to_upi = document.getElementById('refund_to_upi');
        let refund_to_bank = document.getElementById('refund_to_bank');

        let pickup_addr_status1 = document.getElementById('pickup_addr_status1');
        let pickup_addr_status2 = document.getElementById('pickup_addr_status2');
        
        
        // -------------- Reason for return product ----------------------------
        // var reason_for_cancellation = '';

        let other_reason = document.getElementById('other_reason'); 
        let Received_different_Product = document.getElementById('Received_different_Product');        
        let Size_Issue = document.getElementById('Size_Issue');
        let Color_Issue = document.getElementById('Color_Issue');
        let textarea_reason = document.getElementById('other_textarea').value;
                        
        other_reason.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('return_form').style.display = 'block';
                document.getElementById('other_textarea').value = '';  
                
            }
        });

        Received_different_Product.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('return_form').style.display = 'none';
                document.getElementById('other_textarea').value = '';                
            }
        });

        Size_Issue.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('return_form').style.display = 'none';
                document.getElementById('other_textarea').value = '';
            }
        });

        Color_Issue.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('return_form').style.display = 'none';
                document.getElementById('other_textarea').value = '';
            }
        });
//  ===============================================================================
        if(refund_to_same_mode != null){
        refund_to_same_mode.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('refund_bank_acct').style.display = 'none';
                document.getElementById('refund_upi_id').style.display = 'none';
                }
            });
        }
        refund_to_upi.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('refund_bank_acct').style.display = 'none';
                document.getElementById('refund_upi_id').style.display = 'block';
            }
        });

        refund_to_bank.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                document.getElementById('refund_upi_id').style.display = 'none';
                document.getElementById('refund_bank_acct').style.display = 'block';
            }
        });

        pickup_addr_status1.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                
                document.getElementById('change_address').style.display = 'none';
            }
        });

        pickup_addr_status2.addEventListener('click', function(event){
            if (event.target && event.target.matches("input[type='radio']")) {
                
                document.getElementById('change_address').style.display = 'block';
            }
        });

        // change_pickup_addr.addEventListener('click', function(event){            
            function changeAddress(){
            // event.preventDefault();
            console.log('btn ck');
            const change_address = document.getElementById('change_address');
            if(change_address.style.display == 'none'||change_address.style.display == ''){
                change_address.style.display = 'block';            
            }else{
                change_address.style.display = 'none';            
            }            
        }
        // });
// Send product-details to database using ajax





function submitOrderReturnRefund(){
    
    product_cancellation_details = `<?= json_encode($cancelled_order); ?>`;
    console.log(product_cancellation_details);

    //============= Reason for cancellation ================     
    var selectedRadioButton = document.querySelector('input[name="reasonForReturn"]:checked');

    let reasonForCancellation = '';

    if (selectedRadioButton) {
    var selectedValue = selectedRadioButton.value;
    reasonForCancellation = selectedValue;
    console.log(selectedValue);
        if(selectedValue == 'other'){
            let other_textarea = document.getElementById('other_textarea');    
            // console.log(other_textarea.value); 
            reasonForCancellation = other_textarea.value;
        }
    } else {
    console.log("No radio button selected.");
    } 
    
    //===================== Refunding Mode of payment =========================
    
    var refunding_mode_of_payment = document.querySelector('input[name="refunding_mode_of_payment"]:checked');

    let refundingModeOfPayment = '';

    if (refunding_mode_of_payment) {
    var selectedValueForPaymentRefund = refunding_mode_of_payment.value;
    // console.log(selectedValueForPaymentRefund);
        
        if(selectedValueForPaymentRefund == '0'){
            let other_textarea = document.getElementById('other_textarea');    
            console.log(other_textarea.value);  
            refundingModeOfPayment = other_textarea.value;
        }

        if(selectedValueForPaymentRefund == '1'){
            let refund_payment_upi = document.getElementById('refund_payment_upi');    
            console.log('refund_payment_upi:',refund_payment_upi.value);   
            refundingModeOfPayment = refund_payment_upi.value;   
        }

        if(selectedValueForPaymentRefund == '2'){
            let refund_bank_name_id = document.getElementById('refund_bank_name_id').value;    
            let refund_acct_holder_name = document.getElementById('refund_acct_holder_name').value;    
            let refund_acct_num = document.getElementById('refund_acct_num').value;    
            let refund_acct_num2 = document.getElementById('refund_acct_num2').value;    
            let refund_IFSC_code = document.getElementById('refund_IFSC_code').value;    
            let refund_branch_name = document.getElementById('refund_branch_name').value;    
            
            refundingModeOfPayment = {
                refund_bank_name_id : refund_bank_name_id,
                refund_acct_holder_name : refund_acct_holder_name,
                refund_acct_num:refund_acct_num,
                refund_acct_num2:refund_acct_num2,
                refund_IFSC_code:refund_IFSC_code,
                refund_branch_name:refund_branch_name
            }
            console.log(refundingModeOfPayment);
           
            /*
            console.log(refund_bank_name_id);      
            console.log(refund_acct_holder_name);
            console.log(refund_acct_num);
            console.log(refund_acct_num2);
            console.log(refund_IFSC_code);
            console.log(refund_branch_name);
            */
        }
    } else {
        console.log("No radio button selected.");
    } 

    //======================== pickup address ==========================
    
    var pickup_addr_status = document.querySelector('input[name="pickup_addr_status"]:checked');
    
    let pickUpAddress = {};

    if (pickup_addr_status) {
    var selectedValueForPickUpAddr = pickup_addr_status.value;
    console.log(selectedValueForPickUpAddr);
        
        if(selectedValueForPickUpAddr == '1'){
           let ReturnpickUpAddress = `<?= json_encode($return_pickup_address); ?>`;
        
           //Convert to array for json string
           ReturnpickUpAddress = JSON.parse(ReturnpickUpAddress);                
                
                pickUpAddress = {
                    receivers_phone_no: ReturnpickUpAddress[0].receivers_phone_no,
                    addr_house_no: ReturnpickUpAddress[0].addr_house_no,
                    addr_locality: ReturnpickUpAddress[0].addr_locality,
                    addr_city: ReturnpickUpAddress[0].addr_city,
                    addr_pin_code: ReturnpickUpAddress[0].addr_pin_code,
                    addr_state: ReturnpickUpAddress[0].addr_state,                    
                    addr_country: ReturnpickUpAddress[0].addr_country,
                    addr_type: ReturnpickUpAddress[0].addr_type
                }

            
        } else {
            console.log("No radio button selected.");
        }    

        if(selectedValueForPickUpAddr == '2'){
            let return_addr_house_no = document.getElementById('return_addr_house_no').value;    
            let return_addr_locality = document.getElementById('return_addr_locality').value;    
            let return_addr_city = document.getElementById('return_addr_city').value;    
            let return_addr_pin_code = document.getElementById('return_addr_pin_code').value;    
            let return_addr_state = document.getElementById('return_addr_state').value;    
            let return_addr_country = document.getElementById('return_addr_country').value;    
            // For radio button
            var return_addr_type = document.querySelector('input[name="return_addr_type"]:checked');
            // console.log(return_addr_type.value);
            if(return_addr_type.value == '1'){
                let addr_type_1 = document.getElementById('addr_type_1').value;   
                // console.log('adr',addr_type_1);       
            }
            if(return_addr_type.value == '2'){
                let addr_type_2 = document.getElementById('addr_type_2').value;  
                // console.log('adr',addr_type_2);    
            }            
             
            let receivers_phone_no = document.getElementById('receivers_phone_no').value;    

            pickUpAddress = {                                       
                addr_house_no: return_addr_house_no,
                addr_locality: return_addr_locality,
                addr_city: return_addr_city,
                addr_pin_code: return_addr_pin_code,
                addr_state: return_addr_state,
                addr_country: return_addr_country,
                addr_type: return_addr_type.value=='1'?addr_type_1.value:addr_type_2.value,
                receivers_phone_no: receivers_phone_no
            }

            /*
            console.log(return_addr_house_no);      
            console.log(return_addr_locality);      
            console.log(return_addr_city);      
            console.log(return_addr_state);      
            console.log(return_addr_pin_code);      
            console.log(return_addr_country);                                  
            console.log(receivers_phone_no);  
            console.log('adr',addr_type_1);   
            console.log('adr',addr_type_2);            
            */      
        } else {
            console.log("No radio button selected.");
        }

        console.log('pickUpAddress:',pickUpAddress);
    }
        //  submit all details to controller

        let customer_order_return_refund = {
            product_cancellation_details: JSON.parse(product_cancellation_details),            
            reasonForCancellation:reasonForCancellation,    
            refundingModeOfPayment: refundingModeOfPayment,
            pickUpAddress: pickUpAddress
        };   

        // console.log('customer_order_item_list----',customer_order_item_list);
        
    $.ajax({
        url:'<?= base_url('eStore/EStore_Controller/submitOrderReturnRefund_ajax'); ?>',
            method: 'POST',
            data: customer_order_return_refund,
            success:function(data){
                    console.log('data-:', data);
                    //refresh                        
                },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
              }
        });            
    
}
    </script>
</body>
</html>