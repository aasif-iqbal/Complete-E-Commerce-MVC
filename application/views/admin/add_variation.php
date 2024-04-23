<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
    <style type="text/css">
        
  </style>
</head>
<body>


<!-- Begin Page Content -->
<div class="container-fluid">
 

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Add Variation</h1>                     
 </div>
 
 <!--  message for admin -->
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hy Admin!</strong> You can add diff variation of same product like it's color, size,price and num of quantity you have(in stock).
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
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
             <div
                 class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Add Variation</h6>
                 <div class="dropdown no-arrow">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                     </a>                     
                 </div>
             </div>
             <!-- Card Body -->
             <div class="card-body">
             <!--  -->          
                     
            <div class="form">
                  <!-- <form action="<//?= base_url('save-variation'); ?>" method="POST"> -->
                    <form>
                    <!-- </?php var_dump($product_sizes);die(); ?> -->
            <!-- card -->
            <div class="card mb-1" style="">
  <div class="row no-gutters">
    <!-- </?php var_dump($selected_product[0]);?> -->
    <div class="col-md-3">
      <img class=""  src="<?= base_url('uploads/'.$selected_product[0]->product_main_image); ?>" height="300" width="200" alt="...">      
    <h6 class="card-title pl-1 pt-2">Art.no: <?= ($selected_product[0]->article_no);?></h6>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div class="row">
            <h5 class="card-title"><?= ($selected_product[0]->product_name);?></h5> &nbsp;&nbsp; | &nbsp;&nbsp;
            <h5 class="card-title"><?= ($selected_product[0]->product_uuid);?></h5>
        </div>  
        <hr>                      
        <div class="row mt-9">
          <div class='col'>        
          <div class="form-group">
                  <input type="hidden" name="product_id" id="product_id" value="<?= ($selected_product[0]->product_id);?>">
                  <input type="hidden" name="product_uuid" id="product_uuid" value="<?= ($selected_product[0]->product_uuid);?>">
                                     
              <label for="">Size</label>
                <select class="form-control"  name="product_size" id="product_size">
                    <option value='0'>Select-Size</option>  
                    <?php                    
                    if(isset($product_sizes)){
                      foreach($product_sizes as $size):                    
                    ?>                    
                      <option value='<?= $size->size_uuid.'_'.$size->size_name.'_'.$size->label; ?>'><?= $size->size_name; ?></option>
                    <?php endforeach;}?>
                  </select>                     
              </div>
          </div>
          <div class='col'>        
          <div class="form-group">
          <label for="exampleFormControlSelect1">Color</label>
                <select class="form-control" name="product_color" id="product_color">
                <option value=''>Select-Color</option>  
                <?php 
                if(isset($product_colors)){
                foreach($product_colors as $color):
                ?>
                <option value='<?= $color->color_id.'_'.$color->color_name.'_'.$color->hex_code; ?>'><?= $color->color_name; ?></option>
                <?php endforeach; } ?>                 
                </select>
              </div>
          </div>
          <div class='col'>     
              <label for="exampleFormControlSelect1">Stock</label>   
              <input class="form-control" name="product_quantity" id="product_quantity" type="text" placeholder="Default input">
          </div>
        
        </div>
        <div class="row">
          <div class='col'>        
       
              <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">MRP (&#8377;)</label>
                    <input type="text" class="form-control" id="product_mrp"   
                    name="product_mrp" value="<?= $selected_product[0]->product_mrp; ?>">
          </div>
          <div class='col'> 
          <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">Discount(%)</label>
          <input type="text" class="form-control" id="discount_percentage"   
  name="discount_percentage" value="<?= $selected_product[0]->discount_percentage; ?>">

         
          </div>
          <div class='col'>    
          <label data-toggle="tooltip" data-placement="right" title="Must be more then 5 Character">Selling Price (&#8377;)</label>
        <input type="text" class="form-control" id="product_selling_price" 
        value="<?= $selected_product[0]->product_selling_price; ?>" name="product_selling_price"  readonly>
                             
          </div>          
          
        </div>
        <div class="form-group form-check">
              <div class="col mt-3">
             <input type="checkbox" class="form-check-input" name="is_main" id="is_main">
              <label class="form-check-label" for="exampleCheck1">Add to Main Product</label>
          </div>
          </div>

  <button type="button" onclick="saveProductVariationDetails()" 
  class="btn btn-outline-dark btn-lg my-3 ml-1 float-right">Add Variation</button>
        
      </div>
    </div>
      </div><!-- row ends -->
    </div><!-- main-card  -->  
    </form>          
</div><!-- form row end -->
          <hr>          
          <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">V_Id</th>
      <th scope="col">Variation Id</th>
      <!-- <th scope="col">Size_Id</th> -->
      <th scope="col">Size</th>
      <!-- <th scope="col">color_Id</th> -->
      <th scope="col">color</th>
      <th scope="col">stocks</th>
      <th scope="col">MRP</th>
      <th scope="col">Selling_Price</th>
      <th scope="col">Discount(%)</th>
      <th scope="col">is_Main</th>
    </tr>
  </thead>
  <tbody>
    <!-- </?php var_dump($variation[0]); ?> -->

    <?php 
    // echo("<pre/>");
    // var_dump($product_sizes_obj);
    // echo("================<br/>");
    // var_dump($variation);

    if(isset($variation)){
      foreach($variation as $vari): 
    ?>
    <tr>
      <th scope="row"><?= $vari->variant_id; ?></th>
      <td><?= $vari->variation_uuid; ?></td>
      <!-- <td></?= $vari->product_size; ?></td> -->
      <td><?= $vari->product_size; ?></td>      
      <!-- <td></?= $vari->product_color; ?></td> -->
      <td><?= $vari->product_color_name; ?></td>      
      <td><?= $vari->product_quantity; ?></td>
      <td><?= $vari->product_mrp; ?></td>
      <td><?= $vari->product_selling_price; ?></td>
      <td><?= $vari->discount_percentage; ?></td>
      <td><?= $vari->isMain == 1 ? 'Yes':'No'; ?></td>
    </tr>
    <?php endforeach;} else{ ?>
      <tr>
      <td>No Data</td>
      <td>No Data</td>
      <td>No Data</td>
      <td>No Data</td>
      <td>No Data</td>
      <td>No Data</td>
      <td>No Data</td>
      <td>No Data</td>
      <td>No Data</td>
      </tr>
    <?php } ?>
  </tbody>
</table>
             
         </div>
     </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
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

// form submit using ajax
function saveProductVariationDetails(){
  
  var product_id = document.getElementById("product_id").value;
  var product_uuid = document.getElementById("product_uuid").value;
  var product_size = document.getElementById("product_size").value;
  var product_color = document.getElementById("product_color").value;
  var product_quantity = document.getElementById("product_quantity").value;
  var product_mrp = document.getElementById("product_mrp").value;
  var product_selling_price = document.getElementById("product_selling_price").value;
  var discount_percentage = document.getElementById("discount_percentage").value;
  
  var is_main = document.getElementById("is_main");
  
  if (is_main.checked == true) {
    is_main.value = 1;
    // alert("Checkbox is checked:1");
  } else {
    is_main.value = 0;
    // alert("Checkbox is not checked:0");
  }

  console.log(is_main.value);

  $.ajax({
    url:'<?= base_url('Admin/Admin_Controller/submit_product_variation_ajax');  ?>',
    type: 'POST',
    data:{
      product_id:product_id,
      product_uuid:product_uuid,
      product_size:product_size,
      product_color:product_color,
      product_quantity:product_quantity,
      product_mrp:product_mrp,
      product_selling_price:product_selling_price,
      discount_percentage:discount_percentage,
      is_main:is_main.value
    },
    success:function(data, textStatus, jqXHR){
      
      var jsonData = JSON.parse(data);
      console.log(jsonData);
    location.reload();
      // showVariationTable(jsonData);  
    },
    error:function(XMLHttpRequest, textStatus, errorThrown){}
  });
}

function showVariationTable(jsonData=0, params=null){
  
  setCookie('jsonData',jsonData, 7);
  // console.log(jsonData);
  
}
$(document).ready(function() {
  var jData = getCookie('jsonData');
  showVariationTable(jData);
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

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

</script>

</body>
</html>