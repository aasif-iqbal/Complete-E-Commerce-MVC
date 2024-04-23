<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
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
    </style>
</head>
<body>    
    <?php 
    // $userLoginData = $this->session->userdata('userLoginData');
    // var_dump($customerInfo[0]);
    ?>
    <?php  
    // echo("<pre>");
    // print_r(($customerCartItems));
    //error
    // https://o515678.ingest.sentry.io/api/4503925471707136/envelope/?sentry_key=faa87b9121f2449cb849f27e4d737f35&sentry_version=7 429
    ?>

<div class="container">
    <div class="h1 mt-3 mb-3 text-dark" style='text-align: center;'>
            Shopping - Bag
    </div>
    <div class="row mt-4">
        <div class="col-md-8 col-sm-12">                
            <div class="card mb-4" style="">
                <div class="card-body"> 
                    <!-- HIDDEN INPUTS STARTS-->
                    <input type='hidden' value='<?= $customerInfo[0]->user_uuid;?>' id='user_uuid' />                                           
                    <!-- END HIDDEN INPUTS  -->
                    <p class='h4' id='username' value='<?= $customerInfo[0]->user_name ?>'>Hi, <?= $customerInfo[0]->user_name ?></p>  
                    <p>Your Order Will be Delivered Here,</p>                   
                    <div class="h5 card-subtitle mb-2 text-muted">Address</div>
                    <p class="card-text">
                    <?= $customerInfo[0]->addr_house_no;?> ,
                    <?= $customerInfo[0]->addr_locality;?> ,
                    <?= $customerInfo[0]->addr_city;?> ,
                    <?= $customerInfo[0]->addr_pin_code;?>,
                    <?= $customerInfo[0]->addr_state;?>,
                    <?= $customerInfo[0]->addr_country;?>                        
                    <br>
                    Address type: <?= ($customerInfo[0]->addr_type=='1')?'Home':'Work';?>
                            <br>
                            <p class="">Phone on: +91-<?= $customerInfo[0]->receivers_phone_no;?><br>
                            <small class="text-muted">Phone no of a person who revieves parcel</small></p>
                        </p>
                        <a href="<?= base_url('edit-addr') ?>" class="card-link link-dark float-right">Edit</a>                        
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <p>Your Product will delivered on 5-7 days.</p>
                    </div>
                </div>

            <!-- PRODUCT CARD -->
                <div class="row">

                <?php 
                    $total_amount_to_pay = 0;
                    $total_quantity_inCart = 0;
                    $product_arr = [];
                    // echo("<pre/>");
                    // var_dump($customerCartItems);

                    if(isset($customerCartItems)){
                        
                    foreach($customerCartItems as $cartItem):
                        $product_arr = $cartItem->product_name;
                        // print_r($product_arr);
                    ?>    

  <div class="col-md-6">                             
  <div class="card bg-light-subtle mt-4" id="card_id">
    <img src="<?= base_url('uploads/'.$cartItem->product_image); ?>" class="card-img-top" alt="...">
    <div class="card-body" id="card-body-id">
      <div class="text-section" id="text-section-id">
        <span class="h5 fw-bold"><?= $cartItem->product_name; ?></span><br/>
        <span class="card-text product-attribute">Color: <?= $cartItem->product_color_name; ?></span>&nbsp;|&nbsp;
        <span class="card-text product-attribute">Size: <?= $cartItem->product_size_name; ?></span><br/>
        <span class="card-text product-attribute">Qty: <?= $cartItem->item_count; ?></span><br/>
        <span class="card-text product-attribute">Rs. <?= ($cartItem->product_selling_price * $cartItem->item_count); ?></span><br/>
         
        <span id='return_available'>
            <i class="fa fa-refresh"></i>&nbsp;14 days return available</span>
      </div>
      <!-- <div class="cta-section">
        <div>Rs.2599</div> for new section after product-name
        <p href="#" class="" id="btn-placeholder">Qty:1</p>
      </div> -->
    </div>    
  </div>
    </div>
    <? 
    //total price in cart/bag
    $subtotal = (($cartItem->item_count)*($cartItem->product_selling_price));
    $total_amount_to_pay += $subtotal;
    $total_quantity_inCart += $cartItem->item_count;
    endforeach; } 
    ?>                                                                       
    </div> <!--row ends--> 
    <!-- Product - card - ends -->
</div>
            
            <div class="col-4" style="margin-top:30%;">
                <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title">Order Summery</h5>
                            <!-- <p class="card-text">Rs. 899</p> -->
                            <hr>
                            <p class="card-text" id='' 
                            value="<?= ($total_amount_to_pay); ?>">Total:Rs. <?= $total_amount_to_pay; ?></p>
                            <input type="hidden" name="" id='total_amount' value='<?= ($total_amount_to_pay); ?>'>
                            
                            <button class='btn btn-dark btn-block btn-sm mt-1' id="rzp-button1" value="pay" onclick="pay_now_online()">Online Payment</button>
                            <!-- captcha code for cod -->

                            <!-- <div id='show_captcha'><div>
                            <button onclick='changeCaptcha(7)'>change</button><br>
                            <input type='text' id='captcha_value' value='' name=''><br>
                            <button onclick='checkCaptcha()'>Submit</button>
                            -->

                            <!-- end captcha code for cod -->
                            <button class='btn btn-dark btn-block btn-sm mt-1' id='cod' onclick="pay_now_cod()">Cash on delivery</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- sample upi and card name -->
    <!-- https://razorpay.com/docs/payments/payment-gateway/web-integration/hosted/test-integration -->
    <script>
    var show_captcha = document.getElementById('show_captcha');

    function changeCaptcha(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
        }    
    show_captcha.innerHTML = result;
    // return result;
    }

    </script>
    <!-- 
        JSon sample
    projectInfo_Json = [{"user_uuid":"988f64b4-bc4a-11ed-bb06-98460a99789a","product_uuid":"2a76760a-fa1d-11ed-990c-98460a99789a","product_name":"Red T shirt White line","product_image":"edit-646dee4959f84.jpeg","item_count":"1","product_size_name":"M","product_color_name":"Purple","product_selling_price":"2275"},{"user_uuid":"988f64b4-bc4a-11ed-bb06-98460a99789a","product_uuid":"b012fa34-ee30-11ed-9ffa-98460a99789a","product_name":"Regular Fit Rib-knit resort shirt","product_image":"w1.jpeg","item_count":"1","product_size_name":"L","product_color_name":"Blue","product_selling_price":"2849"}]
    -->
    
        <script>
            var productInfoJSON = `<?= json_encode($customerCartItems_Json) ?>`;
            // customerCartItems is from admin_model
            var customerCartItemsJSON = `<?= json_encode($customerCartItems); ?>`;
            var totalQuantityInCart = `<?= json_encode($total_quantity_inCart); ?>`;
            var totalAmountToPay = `<?= json_encode($total_amount_to_pay); ?>`;
            
            console.log('total_quantity_inCart',totalQuantityInCart);
            // console.log('==============');
            console.log('customerCartItems', customerCartItemsJSON);

            var product_name = document.getElementById('product_name');
            let product_quantity = document.getElementById('product_quantity');
            let total_amount = document.getElementById('total_amount');
            let user_uuid = document.getElementById('user_uuid');
            total_amount = Number(total_amount.value) * 100;
            
            // console.log('total_amount', (total_amount));

            //total_amount = number(total_amount) * 100
            // For new api-key
            //https://dashboard.razorpay.com/app/website-app-settings/api-keys
            // function pay_now_online(){
            //     console.log(projectInfo_Json);
            // }

            function pay_now_online(){
                //updating pending payment when payment is completed..
                var options = {
                    "key": "rzp_test_GS4BjT8wBy1Hdo", 
                    "amount": total_amount,  // 100ps ie 1Rs
                    "currency": "INR",
                    "name": "Fifth Object",
                    "description": "Company description",
                    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                    // "callback_url": "http://localhost/Payment-Gateway-Razorpay/thank_you.php", //Your Thank-you page                    
                    
                    "handler": function (response){                        
                        jQuery.ajax({
                            type:'post',
                            url:'<?= base_url('eStore/EStore_Controller/onlinePayment_ajax'); ?>',
                            data:{
                                payment_id:response.razorpay_payment_id,productInfo_json:projectInfo_Json,
                                total_amount:total_amount.value,
                                user_uuid:user_uuid.value
                            },            
                            success:function(data){
                                //  alert(data);
                                // window.location.href="thank_you.php"
                                window.location.href = "<?= base_url('thanks');?>";
                            }
                        })
                                console.log(response); //return obj
                                 
                                console.log(response.razorpay_payment_id);
                    }
                //handler-end                    
                //    "image": "https://example.com/your_logo",
                //    "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                //  "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/", //Your Thank-you page                    
                }; //options-end

                var rzp1 = new Razorpay(options);
                //document.getElementById('rzp-button1').onclick = function(e){
                
                    rzp1.open();
                //e.preventDefault();
                //}  
//                 var rzp1 = new Razorpay(options);
//   document.getElementById('rzp-button1').onclick = function (e) {
//     rzp1.open();
//     e.preventDefault();
//   }

    }

//=======================  * PAYMENT MODE - CASH ON DELIVERY *  ==========================
    function pay_now_cod(){         
        let user_uuid = document.getElementById('user_uuid');

        let customer_order_item_list = {
            customer_user_uuid : user_uuid.value,
            total_quantity_inCart : totalQuantityInCart,
            total_amount_to_pay : totalAmountToPay,
            customer_cart_items_json : customerCartItemsJSON,
            product_info_json : productInfoJSON
        };    
        // console.log('customer_order_item_list----',customer_order_item_list);
        $.ajax({
            url:'<?= base_url('eStore/EStore_Controller/cashOnDelivery_ajax'); ?>',
            method: 'POST',
            data: customer_order_item_list,
                success:function(data){
                        console.log('data-:', data);
                        //Redirect to thanks - page
                        //window.location.href = "</?= base_url('thanks');?>";
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