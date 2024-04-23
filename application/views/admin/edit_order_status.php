<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
    <style>
        .card-header{
            padding:0rem 1.25rem !important;
        }
    </style>
</head>
<body>
<div class="container-fluid">
 
<div class="col-8 mx-auto">
    <div class="h3">Update current shipping status</div>
    <hr>
    <div class="h6">Status Code</div>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                1.Pending
                </button>
            </h2>
            </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      1. Pending: This status indicates that the order has been received but has not yet been processed or confirmed. It typically means that the customer's payment is being verified, or the order is awaiting further action.
      </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        2. Processing
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      2. Processing: Once the payment has been successfully verified, the order moves to the processing status. It indicates that the seller is preparing the order for shipment. This may involve picking and packing items, arranging logistics, and preparing the necessary documentation.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        3. Shipped/Dispatched
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      3. Shipped/Dispatched: This status indicates that the order has been handed over to the shipping carrier or delivery service. The customer's items are en route to the designated shipping address. Typically, the tracking information is provided at this stage, allowing the customer to monitor the progress of their shipment.
      </div>
    </div>
  </div>
</div>

<div class="card">
    <div class="card-header" id="headingfour">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        4. Delivered 
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
      <div class="card-body">
      4. Delivered: This status confirms that the order has been successfully delivered to the customer's specified address. It means that the package has reached its destination and is in the customer's possession.
      </div>
    </div>
  </div>

    <div class="card">
        <div class="card-header" id="headingfive">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            5. Cancelled
            </button>
            </h2>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
            <div class="card-body">      
            5. Cancelled: If a customer decides to cancel their order before it has been shipped or delivered, the order status is updated to "Cancelled." This can occur due to various reasons, such as changes in the customer's preferences, stock unavailability, or personal circumstances.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingSix">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            6. On Hold
            </button>
            </h2>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">      
            6. On Hold: In some cases, an order may be placed on hold due to specific reasons. This status indicates a temporary delay in the processing or shipment of the order. It could be due to payment issues, address verification, or inventory discrepancies, among other factors.
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingSeven">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            7. Refunded
            </button>
            </h2>
        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">      
            7. Refunded: If a customer requests a refund for their order, the status is updated to "Refunded." This indicates that the payment has been reversed, and the customer has been reimbursed for the order.
            </div>
        </div>
    </div>



     
   
    <!-- Form started -->
    <hr>
    <div>
    <!-- 1=Pending 2=Processing 3=Shipped/Dispatched 4=delivered 5=Cancelled 6=On Hold 7=Refunded -->
    <?php 
    $status = ['1' => 'Pending','2' => 'Processing' ];
    $statusKeys = array_keys($status);
    $statusValues = array_values($status);
    
  //  var_dump($status);
    
    //var_dump($selectedOrderStatus);

    

     ?>
    </div>
    
    <form action="<?= base_url('submit-order-status'); ?>" method="POST">
    <input type="hidden" name="order_uuid" value="<?= $selectedOrderStatus[0]['order_uuid']?>">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Select current order status</label>
    <select class="form-control" id="" name='order_shipping_status'>
    <?php
    for ($i=0; $i < count($status); $i++) { 
        if($selectedOrderStatus[0]['order_shipping_status'] == $statusKeys[$i])
        {
        ?>
            <option value="<?= $selectedOrderStatus[0]['order_shipping_status']?>" selected><?= $statusValues[$i]; ?></option>              
            <?php
        }           
    }
    ?>     
    <option value="1">Pending</option>
    <option value="2">Processing</option>
    <option value="3">Shipped/Dispatched</option>
    <option value="4">Order Delivered</option>
    <option value="5">Cancelled</option>
    <option value="6">On Hold</option>
    <option value="7">Refunded</option>
    </select>
  </div>
  <button class='btn btn-primary float-right' type='submit'>Update shipping status</button>
    </form>
        </div>
    </div>

</div>
</body>
</html>