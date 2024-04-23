<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .image-preview{
          width: 95%;
          min-height: 220px;
          border: 2px solid #dddddd;
          margin-top: 10px;

          /*default text*/
          display: flex;
          align-items: center;
          justify-content: center;
          font-weight: bold;
          color: #cccccc;
        }
        .image-preview__image{
          display: none;
          width: 100%;
        }
  </style>
</head>
<body>


<!-- Begin Page Content -->
<div class="container-fluid">
 

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Add Products</h1>                     
 </div>

<!---------------------------Display Messages----------------------------> 	
<div class="col-md-12 mx-auto">
 <?php if($this->session->flashdata('delete_emp')) { ?>
     <?php echo '<p class="alert alert-danger mt-3 text-center" id="delete">' 
       .$this->session->flashdata('delete_emp') . '</p>'; ?>
       <?php } $this->session->unset_userdata('delete_emp'); //unset session ?> 

   <?php if($this->session->flashdata('add_menu')) { ?>
     <?php echo '
     <div class="alert alert-success mt-3 text-center alert-dismissible fade show" id="add" role="alert">' 
       .$this->session->flashdata('add_menu').'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button></div>'; ?>
       <?php } $this->session->unset_userdata('add_menu');  //unset session ?> 
   
   <?php if($this->session->flashdata('update_emp')) { ?>
     <?php echo '<p class="alert alert-info mt-3 text-center" id="update">'
       .$this->session->flashdata('update_emp') . '</p>'; ?>
       <?php } $this->session->unset_userdata('update_emp');  //unset session ?> 
   </div>
<!---------------------------Display Messages Ends----------------------------> 

<!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script> -->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-12">
         <div class="card shadow mb-4">
             <!-- Card Header - Dropdown --> 
             <form action="<?= base_url('submit-product'); ?>" method="POST" enctype="multipart/form-data">
             <div
                 class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Add Products</h6>
                 <div class="dropdown no-arrow">
                     <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                     </a>                      -->
                     <button type="submit"  class="btn btn-outline-primary">Save</button>
                     <button type="button" class="btn btn-outline-danger">Cancel</button>
                 </div>
             </div>
             <!-- Card Body -->
             <div class="card-body">
             <!--  -->          
                     
            <div class="form-row">
                  <!-- data-toggle="tooltip" data-placement="top" title="Minimum 3 Character." -->
                  <div class="col-8 p-3">
                    <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">Product Name</label>
                    <input type="text" class="form-control" id="product_name"   
                    name="product_name" placeholder="Eg. Denim Shirt">
                    <span id="error" style="font-size: 14px;" class="text-danger"></span>
                  </div>
                  
                  <div class="col-4 pt-3">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <input type="text" class="form-control" id="brand_name"   
                    name="brand_name" value="FifthObject" readonly/>                    
                  </div>
                </div>
                
                <div class="col-8 p-3">
                    <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">Article No</label>
                    <input type="text" class="form-control" id="article_no"   
                    name="article_no" placeholder="ART-------" readonly>
                    <span id="error" style="font-size: 14px;" class="text-danger"></span>
                  </div>
                  
                <div class="col-4 pt-3">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Main Menu</label>
                    
                    <select class="form-control" name="parent_cat_id" id="main_parent_cat">
                    <option value=''>Select-Parent-cat</option>  
                    <?php 
                    if(isset($parent_category)){
                    foreach($parent_category as $cat):
                    ?>
                    <option value='<?= $cat->parent_id; ?>'><?= $cat->parent_category_name ?></option>
                    <?php endforeach; } ?>
                  </select>
                  </div>
                </div>
                <div class="col-8 p-3">
                        
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Product Short Description</label>
                    <input class="form-control" name="product_short_description" type="text" placeholder="Eg. ">
                  </div>
                </div>
                
                <!--  Dynamic Drop down for Main parent and child (below js) -->
                <div class="col-4 pt-3">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Sub-Menu</label>
                    <select class="form-control" name="child_cat_id" id="sub_menu_cat">
                    <option value=''>Select-Child-cat</option> 
                    </select>
                  </div>
                </div>


                <div class="col-8 p-3">
                        <label for="product-title">Product Long Description</label>
                        <textarea class="form-control ckeditor" name="product_long_description" id="product_full_description" cols="" rows=""></textarea>
                        <span id="Invalid_product_description" style="font-size: 14px;" class="text-danger"></span>
                        <div id="editor"></div>
                        <small class='text-danger'>(NOTE:&nbsp;Don't use table, For better view use BULLET'S POINT)</small>
                </div>
                <div class="col-4 pt-3">
                <label for="product-title">Product Image</label>
                  <div class="card">
                  <input class="form-control-file pl-3 pt-3" type="file" name="userfile" id="file" accept="image/*">
                  <!-- <input type="file" id="files" name="files[]" multiple /> -->
                        <div class="image-preview ml-3 mb-3" id="imagePreview">
                          <img height="270px;" src="" alt="Image Preview" class="image-preview__image">
                          <span class="image-preview__default-text" data-toggle="tooltip" data-placement="bottom" title="Dim:200x300 Type:jpeg/png/jpg">Image Preview</span>
                        </div>
                      </div>
                </div>
                    </div><!-- form row end -->
                    <div class="card mx-2">
                <h6 class="card-header">Product Price</h6>
                <div class="card-body">
                   

    <!-- row 2 mrp,selling price, discount -->
    <div class="row">
      <div class="col">
      <div class="form-group">
      <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">MRP (&#8377;)</label>
                    <input type="text" class="form-control" id="mrp"   
                    name="product_mrp" placeholder="Eg. 100">
        </div>
      </div>
      <div class="col">
        <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">Discount(%)</label>
                    <input type="text" class="form-control" id="discount_percentage"   
                    name="discount_percentage" placeholder="Eg. 20">
                    
      </div>

      <div class="col">
      <div class="form-group">
        <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">Selling Price (&#8377;)</label>
        <input type="text" class="form-control" id="product_selling_price"   
                    name="product_selling_price" placeholder="Eg. 80" readonly>
                    <small>we avoid decimal for more accuracy in payment</small>
      </div>
      </div>
      
    </div>
    

  </div>
</div>
         </div>
         </form>
     </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
  //  ClassicEditor
  //           .create( document.querySelector( '#editor' ) )
  //           .catch( error => {
  //               console.error( error );
  //           } );
 
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

$(document).ready(function() {
        const inpFile            = document.getElementById("file");
        const previewContainer   = document.getElementById("imagePreview");
        const previewImage       = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

        inpFile.addEventListener("change", function(){
          const file = this.files[0];  //console.log(file);

          if (file) {
            const reader = new FileReader();

            previewDefaultText.style.display = "none";
            previewImage.style.display       = "block";

            reader.addEventListener("load", function(){
              //console.log(this);
              previewImage.setAttribute("src", this.result);  
            });

            reader.readAsDataURL(file);

          }else{
            previewDefaultText.style.display = null;
            previewImage.style.display       = null;
            previewImage.setAttribute("src", "");  
          }

      });
 //hide message after 8sec

   var add    = document.getElementById("add");
   var update = document.getElementById("update");
   var delete_ = document.getElementById("delete");

   if(add){
         setTimeout(function() {
             add.style.display = 'none';
         }, 8000);
     }

 if(update){
     setTimeout(function() {
         update.style.display = 'none';
         }, 4000);
     
 }

 if(delete_){
     setTimeout(function() {
         delete_.style.display = 'none';
         }, 4000); 
}
});

// Dynamic Drop down for Main parent and child 

var main_parent_cat = document.getElementById('main_parent_cat');

main_parent_cat.addEventListener('change', function(){
  // console.log(main_parent_cat.value);
  $.ajax({
            url: "<?= base_url('Admin/Admin_Controller/getCategories_ajax'); ?>",
            type: 'POST',            
            data: {
              main_parent_cat:main_parent_cat.value,                
            },
            success: function(data, textStatus, jqXHR) {
                // console.log(data); 
                var jsonData = JSON.parse(data);  
                // console.log("JsonData",jsonData); 
                let len = jsonData.length;
                var htmlTemp = '';
                if(len != null){
                for(var i = 0; i<len; i++){
                   htmlTemp += `<option value='${jsonData[i].child_id}|${jsonData[i].slug}'>${jsonData[i].child_category_name}</option>`;                   
                }
              }
                $('#sub_menu_cat').html(htmlTemp);
            },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
            });
});



</script>

</body>
</html>