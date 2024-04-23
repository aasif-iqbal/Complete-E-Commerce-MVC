<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script> -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
    <!-- Begin Page Content -->
<div class="container">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit/Update Main Product Details<h1>                     
    </div>

    <div class='card shadow mb-4'>
        <!-- Card Header - Dropdown --> 
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>                     
            </div>
        </div>
             <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img class=""  src="<?= base_url('uploads/'.$selected_product_details[0]->product_main_image); ?>" height="350" width="250" alt="...">  
                </div>
                <div class="col-md-8">
                    <label>Product Name : </label><?= $selected_product_details[0]->product_name;?>
                    <br>
                    <label>Article No. : </label><?= $selected_product_details[0]->article_no;?>
                    <br>                    
                    <label>Product Mrp: Rs.</label><?= $selected_product_details[0]->product_mrp;?>
                    <br>
                    <label>Selling Price: Rs.</label><?= $selected_product_details[0]->product_selling_price;?>
                    <br>
                    <label>Discount: </label><?= $selected_product_details[0]->discount_percentage;?>(%)
                    <br>
                    <label><u>Short Description: </u></label>&nbsp;<?= $selected_product_details[0]->product_short_description;?>
                    <br>
                    <label><u>Product Long Description: </u>&nbsp;</label>
                    <div class="border border-info px-3">
                    <?= $selected_product_details[0]->product_long_description;?>
                    </div>
                </div>
            </div>
            <!-- end row -->            
            <div>
                <hr>
                <div class="h3">Edit Product Details</div>
                <!-- Form Start -->
                <form action="<?= base_url('update-main-product-details/').$selected_product_details[0]->product_uuid; ?>" method="POST">
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="">Product Name</label>
                            <input type="text" class="form-control" id=""   
                            name="product_name"  value='<?= $selected_product_details[0]->product_name; ?>'>
                        </div>
                        <div class="col-6">
                            <label for="">Product Short Description</label>
                            <input type="text" class="form-control" id=""   
                            name="product_short_description" value='<?= $selected_product_details[0]->product_short_description; ?>'>
                        </div>
                    </div>
                    <!-- for price -->
                    <div class="row mt-4">
                        <div class="col-4">
                        <label>MRP (&#8377;)</label>
                            <input type="text" class="form-control" id="mrp"   
                            name="product_mrp"
                            value="<?= $selected_product_details[0]->product_mrp; ?>">
                        </div>
                        <div class="col-4">
                            <label>Discount(%)</label>
                            <input type="text" class="form-control" id="discount_percentage"   
                            name="discount_percentage"
                            value="<?= $selected_product_details[0]->discount_percentage; ?>">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Selling Price (&#8377;)</label>
                                <input type="text" class="form-control" id="product_selling_price"   
                                name="product_selling_price"
                                value="<?= $selected_product_details[0]->product_selling_price; ?>"
                                readonly>
                                <small>we avoid decimal for more accuracy in payment</small>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="product-title">Product Long Description</label>
                        <textarea class="form-control ckeditor" name="product_long_description" 
                        id="product_full_description"                        
                        cols="" rows=""><?= $selected_product_details[0]->product_long_description; ?></textarea>                        
                        <small class='text-danger'>(NOTE:&nbsp;Don't use table, For better view use BULLET'S POINT Only)</small>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                                <a href="<?= base_url('show-main-product')?>" class="btn btn-outline-danger">Cancel</a>
                            </div>
                        </div>                        
                    </div>
                </form>
                <!-- Form Ends -->
            </div>
        </div>
    </div>
</div>
    <?php 
    // echo('<pre/>');
    // var_dump($selected_product_details); 
    ?>

<script>
// Dynamic calcuate product selling price
$('input[name="discount_percentage"]').keyup(function() 
{ 
 var discount  = $('[name=discount_percentage]').val();

 var mrp = $('[name=product_mrp]').val();  

 var temp_percent = (discount/100) * mrp;
               //console.log("Temp:",temp_percent);
var product_selling_price = (mrp-temp_percent); 
product_selling_price = Math.round(product_selling_price);
               //console.log("1",product_selling_price);  
$('[name=product_selling_price]').val(product_selling_price); 
               
              // var new_price = product_selling_price; 
              // console.log(new_price);
});
</script>
</body>

</html>