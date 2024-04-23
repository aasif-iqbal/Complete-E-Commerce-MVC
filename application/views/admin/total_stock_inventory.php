<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <p class="h2 ml-4">Product Variant</p>
    <hr>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    
    <style>
        #color_box{
            height:40px;
            width: 40px;
            border-radius:13px;
        }
    </style>

    
</head>
<body>
  

<div class='container-fluid'>
<div class="table-responsive">

<table class="table  table-bordered"  id="example" style="width:100%">

  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Article</th>
      <th scope="col">Size</th>      
      <th scope="col">Color</th>   
      <th scope="col">Label</th>          
      <th scope="col">Quantity</th>
      <th scope="col">Sell-Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    // echo('<pre/>');
    // print_r($total_stocks);

    if(isset($total_stocks)){
        foreach($total_stocks as $stock):
    ?>
    <tr>
      <td>             
          <img src="<?= base_url('').'uploads/'.$stock['product_main_image']; ?>" alt="" style='height:60px;width:60px;'>
      </td>
      <td><?= $stock['product_name']; ?></td>
      <td><?= $stock['article_no']; ?></td>
      <td><?= $stock['product_size_label']; ?></td>
      <td><?= $stock['product_color_name']; ?></td>      
      <td>
         <div id='color_box' style='background-color:<?= $stock['product_hex_code']?>'></div>
      </td>      
      <td><?= $stock['product_quantity']; ?></td>      
      <td><?= $stock['product_selling_price']; ?></td>
      <td>
        <!-- Edit Product Variant -->
        <a href="<?= base_url('edit-product-variant/').$stock['product_uuid'].'/'.$stock['variation_uuid']; ?>" role="button" class="btn btn-info btn-sm">E</a>
        
        <!-- Delete Product Variant -->
        <a href="<?= base_url('delete-product-variant/').$stock['product_uuid'].'/'.$stock['variation_uuid']; ?>">
          <button type="button" onclick="return doconfirm();" class="btn btn-outline-dark btn-sm">X</button>
        </a>
      </td> 
    </tr>
    <?php endforeach; } ?>
  </tbody>
</table>
</div>
</div>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
});

// 
function doconfirm()
{
    job = confirm("Are you sure to delete permanently?");
    // Job True will redirect to delete controller
    if(job!=true)
    {
        return false;
    }
}
  </script>
</body>
</html>