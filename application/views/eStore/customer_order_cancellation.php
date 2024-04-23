<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fifthobject</title>
    <style>
      #card_id {
        max-width: 33em;
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
       
      #return_form{
        display:none;
      }
      #err_textarea{
        font-size: 12px;
        color:red;
      }
      #err_reason{
        font-size: 12px;
        color:red;
      }
    </style>
</head>
<body>
<?php 
// echo("<pre/>");
// var_dump($order_cancel[0]);
$createdAt = strtotime($order_cancel[0]['createdAt']);
$createdAt = date("d F Y", $createdAt);
?>
<!-- <div class="h5 p-3">Order Cancellation(before Shipping) 
  If Online Payment done, Refund(Razorpay payment_id)</div> -->
<div class="container">
  <div class="mx-auto col-md-6">
    <div class="h3 mt-3">Order Cancellation</div>
    <h6>order summary</h6>
      <!-- PRODUCT CARD -->        
      <div class="card bg-light-subtle mt-4" id="card_id">
        <img src="<?= base_url('uploads/'.$order_cancel[0]['product_image']); ?>" class="card-img-top">
        <div class="card-body" id="card-body-id">
        <div class="text-section" id="text-section-id">          
        <span class="fw-bold"><?= $order_cancel[0]['product_name']; ?></span><br/>
        <span class="card-text product-attribute">Color: White</span>&nbsp;|&nbsp;
        <span class="card-text product-attribute">Size: M</span><br/>
        <span class="card-text product-attribute">Qty: 1</span><br/>
        <span class="card-text product-attribute">Rs. 2334</span><br/>
        <span class="card-text product-attribute">Payment mode:<?= $order_cancel[0]['payment_method']?></span><br/>        
      </div>           
      </div>    
    </div>                                                                              
    <!-- Product card ends -->  
<hr>
    <!-- customer order status -->
  <div class="mt-3 ml-3">
    <h6>Order status</h6>
      <span class="fw-bold text-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirmed</span><br/>
      <span class="card-text product-attribute border-bottom">Arrived By 30 May, Tus</span><br/>
<!-- <p class="card-text">Order Id : #</?= $order_cancel[0]['order_uuid']; ?></p> -->
      <p class="card-text">Order at :&nbsp;<?= $createdAt; ?></p>        
  </div>
<hr>  
  <!-- customer Payment status -->
  <div class="mt-3 ml-3">
    <h6>Payment status</h6>
       <?php if($order_cancel[0]['payment_method'] == 'COD'){ ?>
        <p>No Payment Done Yet!</p>
        <p>Payment Mode: COD</p>
       <?php } else { ?>    
        <p>Payment Mode: ONLINE</p>
        <p>Refund Amount:<strong>&nbsp;<?= $order_cancel[0]['product_selling_price']; ?></strong></p>
    <?php } ?>
  </div>

  <hr>

  <div class="h6 mt-2">Reason for cancellation</div>
    <form action="<?= base_url('submit-order-cancel'); ?>" method="POST">

    <input type="hidden" name="order_uuid" value="<?= $order_cancel[0]['order_uuid'];?>">
    <input type="hidden" name="product_uuid" value="<?= $cancel_order_info[0]['product_uuid'];?>">
    <input type="hidden" name="variation_uuid" 
          value="<?= $cancel_order_info[0]['variation_uuid'];?>">
  
  <input type="hidden" name="user_uuid" value="<?= $order_cancel[0]['user_uuid'];?>">

  <input type="hidden" name="product_name" value="<?= $cancel_order_info[0]['product_name'];?>">

<div class=''>      
  <p> &#129300; &nbsp;Why are you returning this?</p>
  <span id="err_reason"></span>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="Change_My_Mind" value="Change_My_Mind">
          <label class="form-check-label" for="flexRadioDefault1">
            Change My Mind
          </label>
          </div>
        </li>
        <li class="list-group-item">
          <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="Order_By_mistake" value="Order_By_mistake">
          <label class="form-check-label" for="flexRadioDefault1">
              Order By mistake
          </label>
          </div>
        </li>
        <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="Wrong_Size" value="Wrong_Size">
            <label class="form-check-label" for="flexRadioDefault1">
                Wrong Size
            </label>
            </div>
        </li>
        <li class="list-group-item">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="other_" id="other_reason">
            <label class="form-check-label" for="flexRadioDefault1">
                Other
            </label>
            </div>
            <div class="mb-3" id='return_form'>
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" id="other_textarea" rows="3"></textarea>
            <span id='err_textarea'></span>
            </div>
        </li>
    </ul>  
</div>
    
<div class="">   
  <button type="button" style='margin-left:40%;margin-top:5%;' onclick="submit_cancellation_form()" class="btn btn-outline-primary">CONFIRM CANCELLATION</button>
</div>

</form>
<!-- form ends -->
</div>
</div>
</div>    
</div>
<script>
  // Below code will Open textarea when 'other' radio btn clicked
    let other_reason = document.getElementById('other_reason');
    let Wrong_Size = document.getElementById('Wrong_Size');
    let Change_My_Mind = document.getElementById('Change_My_Mind');
    let Order_By_mistake = document.getElementById('Order_By_mistake');

    other_reason.addEventListener('click', function(event){
        if (event.target && event.target.matches("input[type='radio']")) {
            document.getElementById('return_form').style.display = 'block';
            document.getElementById('err_reason').style.display = 'none';            
        }
    });

    Wrong_Size.addEventListener('click', function(event){
        if (event.target && event.target.matches("input[type='radio']")) {
            document.getElementById('return_form').style.display = 'none';
            document.getElementById('other_textarea').value = '';
            document.getElementById('err_reason').style.display = 'none';            
        }
    });

    Change_My_Mind.addEventListener('click', function(event){
        if (event.target && event.target.matches("input[type='radio']")) {
            document.getElementById('return_form').style.display = 'none';
            document.getElementById('other_textarea').value = '';
            document.getElementById('err_reason').style.display = 'none';            
        }
    });

    Order_By_mistake.addEventListener('click', function(event){
        if (event.target && event.target.matches("input[type='radio']")) {
            document.getElementById('return_form').style.display = 'none';
            document.getElementById('other_textarea').value = '';
            document.getElementById('err_reason').style.display = 'none';            
        }
    });



function submit_cancellation_form()
{  
  let order_cancellation_detials = `<?= json_encode($order_cancel[0]); ?>`;
  let product_info_json = `<?= json_encode($product_info_json[0]['productInfo_json']); ?>`;
  // console.log('product_info_json::',product_info_json);

  let radioButtons = document.getElementsByName('flexRadioDefault');
  var selectedValue = "";

  for (var i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      selectedValue = radioButtons[i].value;
      break;
    }
  }

  //If selectedValue is Other and user didn't fill anything in textarea
  if(selectedValue == ''){
    let other_textarea = document.getElementById('other_textarea');    
    
    // When user check radio btn -other, then click submit without any text in textarea
    if(other_textarea.value == ''){
        document.getElementById('err_textarea').innerHTML = 'Please Enter valid reason for returning this order';
        document.getElementById('err_reason').innerHTML = 'Please Enter valid reason for returning this order';        
      }
      // When user check radio btn -other, then click submit without any text in textarea but later user enter valid reason for return, error msg remain shows-Invalid Input,
      // to solve this, we have to use addEventListener - keyup
      document.getElementById('other_textarea').addEventListener("keypress", function(event){
        const text = event.target.value;
        console.log(text);
        if(text == ''){
          console.log('eeppp');
        } 
        
        

        // if(other_textarea.value == ''){
        //   document.getElementById('err_textarea').innerHTML = 'Please Enter valid reason for returning this order';
        // }
        
        // document.getElementById('err_reason').style.display = 'none';            
        // document.getElementById('err_textarea').style.display = 'none';            
        // document.getElementById('err_textarea').innerHTML = '';
      });
      
    console.log("other_textarea::", other_textarea.value);  
  }

  
  if(selectedValue == '' || other_textarea.value == ''){
    document.getElementById('err_textarea').innerHTML = 'Please Enter valid reason for returning this order';
  }
  console.log(selectedValue);
      
  let customer_order_cancellation = {
            selectedValue: selectedValue,
            other_textarea: other_textarea.value,
            order_cancellation_detials: JSON.parse(order_cancellation_detials),
            product_info_json: product_info_json
        };    
        // console.log('customer_order_item_list----',customer_order_item_list);
        
        $.ajax({
            url:'<?= base_url('eStore/EStore_Controller/submitCancelledOrder_ajax'); ?>',
            method: 'POST',
            data: customer_order_cancellation,
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