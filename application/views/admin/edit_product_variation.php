<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>
<!-- <form method="post" action="</?php echo base_url('update/'.$data->emp_id);?>">   -->
    <?php 
    // echo("<pre>");
    // print_r($productsWithVariations[0]);
    ?>
<div class="container">
      <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit / Update Product Variation</h1>                     
    </div>

    <div class="card p-5">    
    <h3>Main Product Details - Parent</h3>
<hr>
    
<div class="row">
  <div class="col-2">
  <img class='img-fluid' src="<?= base_url('').'uploads/'.$productsWithVariations[0]['product_main_image']; ?>" style="height: 200px;" />
  </div>
  <div class="col-8">
    <div class="row">
      <div class="col-4">Product Unique Id:</div>    
      <div class="col-8"><?= $productsWithVariations[0]['product_uuid'];?></div>    
    </div>
    <div class="row">
      <div class="col-4">Product Name:</div>    
      <div class="col-8"><?= $productsWithVariations[0]['product_name']?></div>    
    </div>
    <div class="row">
      <div class="col-4">Article No:</div>    
      <div class="col-8"><?= $productsWithVariations[0]['article_no']?></div>    
    </div>
    <div class="row">
      <div class="col-4">MRP:</div>    
      <div class="col-8">Rs. <?= $productsWithVariations[0]['main_mrp']?></div>    
    </div>
    <div class="row">
      <div class="col-4">Selling Price:</div>    
      <div class="col-8">Rs. <?= $productsWithVariations[0]['main_sp']?></div>    
    </div>
    <div class="row">
      <div class="col-4">Discount:</div>    
      <div class="col-8"><?= $productsWithVariations[0]['main_discount']?>&nbsp;(%)</div>    
    </div>
  </div>
</div>
  <hr>
  <h3>Edit Product Variation</h3>
  <hr>
<!-- form start -->
<form action="<?= base_url('update-product-variant/').$productsWithVariations[0]['product_uuid'].'/'.$productsWithVariations[0]['variation_uuid']?>" method="POST">

  <div class="form-row mt-2">
  <div class="col">   
    <label for="">Variation Unique Id</label>     
      <input type="text" class="form-control" placeholder="<?= $productsWithVariations[0]['variation_uuid'];?>" readonly>
    </div>

    <div class="col">        
    <label for="">Color</label>      
    <select class="form-control" name="product_color_v" id="">
      <option value='<?= $productsWithVariations[0]['color_v_id'].'_'.$productsWithVariations[0]['color_v'].'_'.$productsWithVariations[0]['product_hex_code']; ?>'><?= $productsWithVariations[0]['color_v'] ?></option>      
        <?php 
        if(isset($product_colors)){
          foreach($product_colors as $color):?>
        
          <option value='<?= $color->color_id.'_'.$color->color_name.'_'.$color->hex_code; ?>'><?= $color->color_name; ?></option>      
      <?php endforeach;}?>
    </select>
    </div>
    
  </div>

  <div class="form-row mt-2">
  <?php 
  // echo ("<pre/>");
  //var_dump($product_sizes);
  ?>
  <div class="col">
    <label for="">Size</label>     
    <select class="form-control" name="product_size_v" id="">
      <option value='<?= $productsWithVariations[0]['size_v_id'].'_'.$productsWithVariations[0]['size_v'].'_'.$productsWithVariations[0]['product_size_label']; ?>'><?= $productsWithVariations[0]['size_v'] ?></option>      
        <?php 
        
        if(isset($product_sizes)){
        foreach($product_sizes as $size):?>        
      <option value='<?= $size->size_uuid.'_'.$size->size_name.'_'.$size->label; ?>'><?= $size->size_name; ?></option>      
      <?php endforeach;}?>
    </select>
    </div>

    <div class="col">        
    <label for="">Product Quantity</label>     
    <input type="text" class="form-control" name="product_quantity_v" value="<?= $productsWithVariations[0]['stocks_v']?>" placeholder="stock">
    </div>
    

  </div>

  <div class="form-row mt-2">
  <div class="col">
    <label for="">MRP</label>     
    <input type="text" class="form-control" name="product_mrp_v" value="<?= $productsWithVariations[0]['mrp_v']?>" placeholder="mrp">
    </div>

    
    <div class="col">
    <label for="">Discount(%)</label>     
    <input type="text" class="form-control" name="discount_percentage_v" value="<?= $productsWithVariations[0]['discount_v']?>">
    </div>

    <div class="col">        
    <label for="">Selling Price</label>     
    <input type="text" class="form-control" name="product_selling_price_v" value="<?= $productsWithVariations[0]['sp_v']?>" readonly>
    </div>

  </div>


    <hr>
    <div class="float-right">
    <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
        <a class="btn btn-primary" href="<?= base_url('show-stocks');?>" role="button">Back</a>
 
    

    </div>
</form>

    </div>
    
<script>
  // Dynamic calcuate product selling price
$('input[name="discount_percentage_v"]').keyup(function() 
{ 
 var discount  = $('[name=discount_percentage_v]').val();

 var mrp = $('[name=product_mrp_v]').val();  

 var temp_percent = (discount/100) * mrp;
               //console.log("Temp:",temp_percent);
var product_selling_price = (mrp-temp_percent); 
product_selling_price = Math.round(product_selling_price);
               //console.log("1",product_selling_price);  
$('[name=product_selling_price_v]').val(product_selling_price); 
               
              // var new_price = product_selling_price; 
              // console.log(new_price);
});
</script>
    
</body>
</html>