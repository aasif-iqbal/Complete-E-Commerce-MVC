<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
    <style>
        .status{
            color:red;
        }
    </style>
</head>
<body>
    <div class="container-fluid"> 
        <div class="col-8 mx-auto mt-5">
            <div class="h3">Update Order Return status</div>
            <hr>
            <div class="h5">Status Code</div>            
            <div class='status'>No Refund Required - COD</div>
            <div><span class='status'>0  =></span> Case : Order Cancel before shipped -> No Refund -> Because COD </div>
            
            <br>
            <div class='status'>Instant Refund - No Return</div>
            <div><span class='status'>1  =></span> Case:Order Cancel before shipping -> Online Pay Done By Customer -> do instant refund</div>
                <p>Click here to visit Razorpay Dashboard Refund Section -
                    <a href="https://razorpay.com/instant-refunds/">instant-refunds</a>
                </p>
            
            <!-- 2 => case: Customer want to Cancel Order After shipping [ If status is SHIPPED, Cancel button will disabled From Customer-side And Return & Refund Button Enabled] - So collect Order at doorsteps by delivery boy (Ask customer for OTP) -> If COD &nbsp;-> No Refund Needed. -->
            <div class='status'>Return and Refund Required</div>
            <div><span class='status'>2  =></span> Case: Customer want to Cancel Order After shipping [ If status is SHIPPED, Cancel button will disabled From Customer-side And Return & Refund Button Enabled] - So collect Order at doorsteps by delivery boy (Ask customer for OTP) -> If ONLINE PAYMENT DONE OR COD -> (Delivery Boy will just check the Product Quality and update RETURN status).
            </div>

            Check "<a href='http://localhost:83/salt/show-cancellation'>Order cancellection" </a> section to know How Customer want to recive Refund Amount<br>
<!-- <h5>MODE OF RETURN PAYMENT avilable</h5>  -->
A) If Same mode - In same mode use payment_id/transaction_id, Copy it -> goto razorpay dashboard and Raise Refund<br>
B) If in Bank account,check for bank details like Acct no, IFSC code And Branch name.<br>
C) If UPI, transfer through UPI (Fastest)
    <!-- Form started -->
    <hr>
    <div>    
    <?php 
    $status = ['0' => 'Pending','1' => 'Processing' ];    
     ?>
    </div>    
    <form action="<?= base_url('submit-order-status'); ?>" method="POST">
    <!-- <input type="hidden" name="order_uuid" value="</?= $selectedOrderStatus[0]['order_uuid']?>"> -->
    <div class="form-group">
    <label for="exampleFormControlSelect1">select order return and refund status</label>
    <select class="form-control" id="" name='order_shipping_status'>
    <?php ?>
        <option value="0" selected><?php echo("No Refund Required - COD"); ?></option>              
    <?php ?>     
    <option value="0">No Refund Required - COD</option>
    <option value="2">Instant Refund - No Return</option>
    <option value="3">Return and Refund Required</option>    
    </select>
  </div>
  <button class='btn btn-primary float-right' type='submit'>Update Return Status</button>
    </form>
        </div>
    </div>
</body>
</html>