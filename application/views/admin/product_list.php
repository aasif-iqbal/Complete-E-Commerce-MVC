<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--  message for admin -->
<div class="alert alert-success mx-4 alert-dismissible fade show" role="alert">
 
<span>1. After adding details of Main Product, Add 5 Images of same product using [Add Images] btn.</span><br/>
<span>2. Add variations like it's color, size wrt price.</span><br/>
<span>3. After adding variation - color, Add its different color options.</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <div class="container">
      <h4>Product-List</h4>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Article No.</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- <//?php var_dump($product_list); ?> -->
    <?php 
    if(isset($product_list)){
    foreach($product_list as $row):?>
    <tr>
      <th><?= $row->product_id; ?></th>
      <td><img src="<?= base_url('').'uploads/'.$row->product_main_image; ?>" alt="" style='height:60px;width:60px;'></td> 
      <td><?= $row->product_name; ?></td>
      <td><?= $row->article_no; ?></td>
      <td>
      <a href="<?= base_url('add-images/').$row->product_uuid; ?>" class="btn btn-info" role="button" aria-pressed="true">Add Main Images</a>

      <a href="<?= base_url('add-variation/').$row->product_uuid; ?>" class="btn btn-primary" role="button" aria-pressed="true">Add Variation</a>
      
      <a href="<?= base_url('add-colorVariation-images/').$row->product_uuid; ?>" class="btn btn-success" role="button" aria-pressed="true">Add Color Variation</a>
      </td>
    </tr>
    <?php endforeach;}else{ ?>
      <tr>
        <td>No Data</td>
        <td>No Data</td>
        <td>No Data</td>
        <td>No Data</td>
      </tr>
      <?php } ?>
    
  </tbody>
</table>
    </div>
    
</head>
<body>
    
</body>
</html>