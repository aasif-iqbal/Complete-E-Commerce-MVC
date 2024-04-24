<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    
</head>
<body>

  <div class="h3 ml-3">Order Details</div>    
    <hr>
    <?php 
  //  echo("<pre/>");
  //  print_r(($order_details)); 
    ?>
    <div class="container-fluid">
    <div class='float-right mb-3'>

        <!-- Check this libs in header file - "assets/data-table/js/export.js" -->        
        <button type="button" class="btn btn-sm btn-outline-primary dataExport float-right" data-type="txt">Download text</button>         
         <button type="button" class="btn btn-sm btn-outline-primary dataExport float-right mx-2" data-type="csv">Download csv</button>
         <button type="button" class="btn btn-sm btn-outline-primary dataExport float-right" data-type="excel">Download xls</button>
         <!-- For pdf dom converter [PRINT] -->            
         <!-- Check application/libraries/dompdf ->pdf.php(for autoload) -->
         <!-- @Admin_controller/fetchSingleProductOrderDetails -->

         <!-- https://www.w3schools.com/colors/colors_2021.asp -->
  <style>
    .pending_status{
      background-color:#FF3838;
      color:white;
      padding:12px 12px;
      border-radius:25px;
    }
    .process_status{

    }
    .shipped_status{
      background-color:green;
      color:white;
      padding:12px 12px;
      border-radius:25px;
    }
    .delivered_status{

    }
    .cancel_status{

    }
    .on_hold_status{

    }
    .refunded_status{

    }
    .no_return_status{
      background-color:green;
      color:white;
      padding:12px 12px;
      border-radius:25px;
    }
  </style>
  <!-- 
0 =>(Due to order cancel before shipped) Return without shipping - COD 
1 => Return without shipping - Online Pay 
2 => Return & Refund After shipping - COD 
3 => Return & Refund After shipping - Online 
4 => NO RETURN
 -->
      </div>
    <div class="table-responsive">
      
    <table class="table  table-bordered table-striped"  id="dataTable" style="width:100%">
  <thead>
    <tr>
      <th scope="col">S.no</th>      
      <th scope="col">Product image</th>      
      <th scope="col">Product_name</th>
      <th scope="col">Color</th>
      <th scope="col">Size</th>
      <th scope="col">Price</th>
      <th scope="col">Customer name</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Phone no</th>
      <th scope="col">Order_shipping_address</th>
      <th scope="col">Address type</th>
      <th scope="col">Total order(quantity)</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Transaction_Id</th>
      <th scope="col">transaction_status</th>
      <th scope="col">Order__Id</th>
      <th scope="col">Order_datetime</th>
      <th scope="col">order_received_datetime</th>
      <th scope="col">order_shipping_status</th>
      <th scope="col">order_return_status</th>
      <th scope="col">Shipping___Action</th>
    </tr>
  </thead>
  <tbody>    
    <?php
    if(isset($order_details)){
      $order_count = count($order_details);
      for($i=1; $i < $order_count; $i++){ ?>
      <tr>
        <th scope="row"><?= $i ?></th>        
        <td><img src="<?= base_url('').'uploads/'.$order_details[$i]['product_image']; ?>" alt="" style='height:70px;width:60px;'></td>
        <td><?= $order_details[$i]['product_name']; ?></td>
        <td><?= $order_details[$i]['product_color_name']; ?></td>
        <td><?= $order_details[$i]['product_size_name']; ?></td>
        <td>Rs.<?= $order_details[$i]['product_selling_price']; ?>/-</td>
        <td><?= $order_details[$i]['user_name']; ?></td>
        <td><?= $order_details[$i]['user_email']; ?></td>
        <td><?= $order_details[$i]['receivers_phone_no']; ?></td>
        <td>
          <?= $order_details[$i]['addr_house_no']; ?>, 
          <?= $order_details[$i]['addr_locality']; ?>,
          <?= $order_details[$i]['addr_city']; ?>,
          <?= $order_details[$i]['addr_pin_code']; ?>,
          <?= $order_details[$i]['addr_state']; ?>,
          <?= $order_details[$i]['addr_country']; ?>        
      </td>
        <td>
          <?php if($order_details[$i]['addr_type'] == '1'){echo "Home";}else{echo"Work";}?>
        </td>
        <td><?= $order_details[$i]['total_product_quantity']; ?></td>
        <td><?= $order_details[$i]['total_amount']; ?></td>
        <td><?= $order_details[$i]['transaction_id']; ?></td>
        <td>
          <?php if($order_details[$i]['transaction_status']=='1'){echo"COD";}else{echo"Online";} ?>
        </td>
        <td><?= $order_details[$i]['order_uuid']; ?></td>
        <td><?= str_replace('.000000', '', $order_details[$i]['createdAt']); ?></td>
        <td><?= str_replace('.000000', '', $order_details[$i]['order_received_datetime']); ?></td>
        <td>        
          <?php
           $order_details[$i]['order_shipping_status']; 
           switch($order_details[$i]['order_shipping_status']){
            case '1':
              echo "<span class='pending_status'>Pending</span>";
              break;
            case '2':
              echo "<span class='process_status'>Processing</span>";
              break; 
            case '3':
              echo "<span class='shipped_status'>Shipped/Dispatched</span>";
              break;    
            case '4':
              echo "<span class='delivered_status'>Delivered</span>";
              break; 
            case '5':
              echo "<span class='cancel_status'>Cancelled</span>";
              break; 
            case '6':
              echo "<span class='on_hold_status'>On Hold</span>";
              break;   
            case '7':
              echo "<span class='refunded_status'>Refunded</span>";
              break; 
        }
          ?>
        </td>
        <td>
          <?php
          $order_details[$i]['order_return_status']; 
          switch($order_details[$i]['order_return_status']){
            case '0':
              echo "<span class='pending_status'>Pending</span>";
              break;
            case '4':
              echo "<span class='no_return_status'>NO Return Raised</span>";
              break; 
            }
          ?>
        </td>
        <td>
          <a class='btn btn-outline-danger btn-sm' data-toggle="tooltip" data-placement="top" title="Print Order Info."
          href="<?= base_url('print-order/'.$order_details[$i]['order_uuid']); ?>">Print Order Info</a>  
          
          <a class='btn btn-outline-info btn-sm mt-2' data-toggle="tooltip" data-placement="top" title="Print Order Info."
          href="<?= base_url('edit-order-status/'.$order_details[$i]['order_uuid']); ?>">Update Order Status</a>  
          <a class='btn btn-outline-success btn-sm mt-2' data-toggle="tooltip" data-placement="top" title="Print Order Info."
          href="<?= base_url('edit-return-status/'.$order_details[$i]['order_uuid']); ?>">Update Return Status</a>  
        </td>
      </tr>
      <?php } 
    } ?>
  </tbody>
</table>
</div>
</div>
<script>
  $(document).ready(function () {
    $('#dataTable').DataTable();    
  });

  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>