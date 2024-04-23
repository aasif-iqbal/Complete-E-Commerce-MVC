<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    
    <style type="text/css">
        input[type="file"] {
        display: block;
        }
        .imageThumb {
        max-height: 200px;
        max-width:200px;
        width:195px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
        /* width: 50% !important;
        height: 200px; */
        }
        .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
        }
        .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
        }
        .remove:hover {
        background: white;
        color: black;
        }
        #output{
            background-image:url('http://localhost/salt/assets/img/img_preview.jpg');    
            background-size:     cover;                       
            background-repeat:   no-repeat;
            background-position: center center; 
        }
          /* select checkbox */
          ul {
  list-style-type: none;
  }

  li {
  display: inline-block;
  }

  input[type="checkbox"][id^="myCheckbox"] {
  display: none;
  }

  label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
  }

  label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
  }

  label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
  }

  :checked + label {
  border-color: #ddd;
  }

  :checked + label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
  }

  :checked + label img {
  transform: scale(0.9);
  /* box-shadow: 0 0 5px #333; */
  z-index: -1;
  }
    </style>
</head>
<body>


<!-- Begin Page Content -->
<div class="container-fluid">
 

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Add Color Variarion to Product</h1>                     
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
 
  <div class="col-xl-12 col-lg-12">
         <div class="card shadow mb-4">
             <!-- Card Header - Dropdown --> 
             <div
                 class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Add Images</h6>
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
                     
            <div class="form-row">
                  <!-- <form action="<//?= base_url('save-variation'); ?>" method="POST"> -->
                    
            <!-- card -->
            <div class="card mb-1" style="">
  <div class="row no-gutters">
    <!-- </?php var_dump($colored_images);?> -->
    <div class="col-md-3">      
      <img class=""  src="<?= base_url('uploads/'.$selected_product[0]->product_main_image); ?>" height="300" width="200"  alt="...">  
      <br>    
     
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <div class="row">
            
        <!-- <h4 class="card-title"></?= ($selected_product[0]->product_name);?></h4> -->
        <!-- </div>                 -->
        <!-- <h5 class="card-title"></?= ($selected_product[0]->article_no);?></h5> -->
        
          <div class='col'>        
          <!-- <h4>Upload your image here</h4> -->
          <?php
          // echo("<pre/>");
          // var_dump($product_colors);
           ?>
            <form  action="<?= base_url('store-colored-image'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="custId" name="product_id" value="<?= ($selected_product[0]->product_id);?>">
                <input type="hidden" id="product_uuid" name="product_uuid" value="<?= ($selected_product[0]->product_uuid);?>">   
                               
                <div class="col">
                    <div class="form-group">
                     
                    <select class="form-control" name="product_size" id="product_size" onchange="onchangeSizeShowProdColor(this.value)">
                    <option selected>--SELECT--SIZE--</option>
                  
                    <?php if(isset($avilable_size_variation)){  
                      foreach($avilable_size_variation as $size_variation): ?>  
                        <option value="<?= $size_variation->size_uuid.'_'.$size_variation->product_size.'_'.$size_variation->product_size_label; ?>"><?= $size_variation->product_size; ?></option>
                        <?php endforeach; } ?>
                      </select>
                      
                    <!-- dynamic color according to product size -->
                    <div class='mt-2' id="showSelectedColor"></div>
                       
                          
                      </div>
                  </div>
                <hr>

                <input type="file" id="files" name="files[]"  multiple="multiple"/>
                <br>
                <input type="submit" id="upload_btn" class="btn btn-block btn-outline-info mt-1" value="Upload Image" disabled>
            </form>

          </div>   
          <div class='col border-left'>        
          <h6>Product Info:</h6>
          <div class="card py-1 px-1">
          Product-Name:<span class="card-title"><?= ($selected_product[0]->product_name);?></span>
          Product-ID:<span class="card-title"><?= ($selected_product[0]->product_uuid);?></span>
          </div>
          <h6>Instruction:</h6>
            <ul>             
                <li>Upload One image at a time</li>
                <li>Comprase image</li>
                <li>Upload in kbs</li>
                <li><a href="https://www.duplichecker.com/reduce-image-size-in-kb.php">Reduce Image</a></li>
            </ul>
          </div>   
      </div>
    </div>
      </div><!-- row ends -->
    </div><!-- main-card  -->  
    </form>          
</div><!-- form row end -->
        
             
         </div>
         <hr>          
          
         <h5>Show Product-Variations Images -(All)</h5>
         <hr>
        <div>

        <!-- </?php print_r(($colored_images)); ?> -->
        <ul>
      <?php if(isset($colored_images) && !empty($colored_images)){ ?>
      <?php for($i=0; $i < count($colored_images); $i++){ ?>
      <li>
        <input type="checkbox" value="<?= $colored_images[$i]['product_color_uuid'] ?>"/>
        <label for="myCheckbox1">
          <img src="<?php echo base_url('colors_img/'.$colored_images[$i]['product_color_img']);?>" height='200' width='200'/><br>
          <label><?= $colored_images[$i]['product_size']; ?> | <?= $colored_images[$i]['variation_color_name']; ?></label>
        </label>
      </li>
        <?php }; ?>  
        <?php }else{ echo("<h1>No Image Found</h1>"); }?> 
      </ul>
      <button type="button" id="sbmt_checkedValue" class="btn btn-primary">Submit(Show User)</button>
      <button type="button" id="dlt_checkedValue" class="btn btn-danger">Delete</button>
        </div>
        <hr>
        <h5>Below Images will display only to users</h5>
        <!-- </?php print_r($showSelectedColoredImages);?> -->
        <ul>
      <?php if(isset($showSelectedColoredImages) && !empty($showSelectedColoredImages)){ ?>
      <?php for($i=0; $i < count($showSelectedColoredImages); $i++){ ?>
      <li>
        <input type="checkbox" value="<?= $showSelectedColoredImages[$i]['product_color_uuid'] ?>"/>
        <label for="myCheckbox1">
          <img src="<?php echo base_url('colors_img/'.$showSelectedColoredImages[$i]['product_color_img']);?>" /><br>
          <label><?= $colored_images[$i]['product_size']; ?> | <?= $colored_images[$i]['variation_color_name']; ?></label>
        </label>
      </li>
        <?php }; ?>   
        <?php }else{ echo("<h1>No Image Found</h1>"); }?> 
      </ul>
      <button type="button" id="sbmt_unCheckedValue" class="btn btn-primary">Submit(Hide)</button>
 
 
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</body>
<!-- image script -->

<script> 

function onchangeSizeShowProdColor(value){
  
 
  var product_uuid = document.getElementById('product_uuid').value;
  var showSelectedColor = document.getElementById("showSelectedColor");
  
  let size_name_arr = value.split("_");
      size_name = size_name_arr[1];  //returns 38,40,S,M,L
  
    
  console.log(size_name);
  
  $.ajax({
    url:"<?php echo base_url('Admin/Admin_Controller/show_color_selected_by_dd_size_ajax');?>",
    type:'POST',
    data:{
        size_name:size_name,
        product_uuid:product_uuid
      },
      success:function(RespondedData) {  
                //  console.log(RespondedData);  
                jsonData = JSON.parse(RespondedData);
                 console.log(jsonData);
            if(jsonData != null){

                if(jsonData.length != 0){              
                  var htmlTemp = '';
                  htmlTemp += `<select class="form-control" name="product_color">`;
                  htmlTemp += `<option selected>--SELECT--COLOR--</option>`;
                 for(let i=0; i < jsonData.length; i++){                                     
                  htmlTemp += `<option value="${jsonData[i].product_color}_${jsonData[i].product_color_name}_${jsonData[i].variation_uuid}">${jsonData[i].product_color_name}</option>`;                      
                  }
                  htmlTemp += `</select>`;                                      

                  showSelectedColor.innerHTML = htmlTemp;                   
                }
              }else{
                  document.getElementById('all_color').style.display = 'display';
                }
              },  
              error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                } 
    });
}



 
const dropdown = document.getElementById("product_size");
const button = document.getElementById("upload_btn");

dropdown.addEventListener("change", function() {
  if (dropdown.value !== "") {
    button.disabled = false;
  } else {
    button.disabled = true;
  }
});

//1. on button click checkbox value will send to controller 
//2. controller will update checkbox value by setting status 1 inside Model
var all = [];
  // ---------------select Checkbox value---------------------
  $(document).on('change','input[type=checkbox]' ,function(){
        // checkedVal={};
        all=[];
        $('input[type=checkbox]:checked').each(function(){             
             
            all.push($(this).val());
       
        });
        
        console.log(all);
       
        });
        //send image_name to controller UpdateTokenStatus and set value 1 in table tbl_tokenMaster
     
         //  Sending Project-Admin-id with Assign token-id and toy-id
         //  table_name: tblAssignToyToProjectAdmin
         $("#sbmt_checkedValue").on('click',function(){            
          $.ajax({
                  url: "<?= base_url('Admin/Admin_Controller/setColoredVariationImgToChecked') ?>",
                  type: 'POST',
                  data: {                 
                      checked_id:all
                  },
                  success: function(data, textStatus, jqXHR) {
                    alert(data); 
                    // window.location = "<//?= base_url("viewAssignToys"); ?>";               
                  }
              })
          });


// Get Unchecked Value from array all[]
$("#sbmt_unCheckedValue").on('click',function(){            
          $.ajax({
              url: "<?= base_url('Admin/Admin_Controller/setColoredVariationImgToUnChecked') ?>",
                  type: 'POST',
                  data: {                 
                      checked_id:all
                  },
                  success: function(data, textStatus, jqXHR) {
                    alert(data); 
                    // window.location = "<//?= base_url("viewAssignToys"); ?>";               
                  }
              })
          });

// Delete selected value
          $("#dlt_checkedValue").on('click',function(){            
          $.ajax({
                  url: "<?= base_url('Admin/Admin_Controller/deleteCheckedColoredVariationImg') ?>",
                  type: 'POST',
                  data: {                 
                      checked_id:all
                  },
                  success: function(data, textStatus, jqXHR) {
                    alert(data); 
                    // window.location = "<//?= base_url("delete-banner"); ?>";               
                  }
              })
          });


//
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
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
</script>

</html>