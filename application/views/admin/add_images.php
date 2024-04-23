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
/* Select Checkbox */
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
 <!--  message for admin -->
<div class="alert alert-success mx-4 alert-dismissible fade show" role="alert">
 <span>1. After adding details of Main Product, Add 5 Images of same product For Product Details page.</span>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
 <!-- End message for admin -->

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Add Images</h1>                     
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
    <!-- </?php var_dump($selected_product[0]);?> -->
    <div class="col-md-3">      
      <img class=""  src="<?= base_url('uploads/'.$selected_product[0]->product_main_image); ?>" height="300" width="200"  alt="...">      
   
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <div class="row">
            
        <!-- <h4 class="card-title"></?= ($selected_product[0]->product_name);?></h4> -->
        <!-- </div> -->
        <!-- <h5 class="card-title"></?= ($selected_product[0]->article_no);?></h5> -->
        
          <div class='col'> 
            
          <h4>Upload your image here</h4>
          
            <form  action="<?= base_url('store-image'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="custId" name="product_id" value="<?= ($selected_product[0]->product_id);?>">
                <input type="hidden" id="custId" name="product_uuid" value="<?= ($selected_product[0]->product_uuid);?>">
                <input type="file" id="files" name="files[]"  multiple="multiple"/>
                <br>
                <input type="submit" class="btn btn-outline-info mt-1 pr-5 pl-5" value="Upload Image" />
            </form>

          </div>   
          <div class='col border-left'>  
            <h6>Product Info</h6>      
            
      Product-Name:<span class="card-title"><?= ($selected_product[0]->product_name);?></span>
      <br>
      Product-ID:<span class="card-title"><?= ($selected_product[0]->product_uuid);?></span>   
          <h6>Note:</h6>
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
          <hr>                                 
         </div>
         <h4>Show Main Image</h4>
         <div>
          <?php 
          //echo("<pre/>");
          //var_dump($show_main_product_images);
           ?>
          <div>

<!-- </?php print_r(($colored_images)); ?> -->
<ul>
<?php if(isset($show_main_product_images) && !empty($show_main_product_images)){ ?>
<?php for($i=0; $i < count($show_main_product_images); $i++){ ?>
<li>
<input type="checkbox" name='ck1' value="<?= $show_main_product_images[$i]['main_image_uuid'] ?>"/>

<label for="myCheckbox1">
  <img src="<?php echo base_url('upload_img/'.$show_main_product_images[$i]['main_product_image']);?>" height='200' width='200' /><br>
  
</label>
</li>
<?php }; ?>  
<?php }else{ echo("<h1>No Image Found</h1>"); }?> 
</ul>
<button type="button" id="sbmt_checkedValue" class="btn btn-primary">Submit(Show User)</button>
<button type="button" id="dlt_checkedValue" class="btn btn-danger">Delete</button>
</div>
         </div>

         <!--  -->

         <hr>
        <h5>Below Images will display only to users</h5>
        <!-- </?php print_r($showSelectedMainProductImages);?> -->
        <ul>
      <?php if(isset($showSelectedMainProductImages) && !empty($showSelectedMainProductImages)){ ?>
      <?php for($i=0; $i < count($showSelectedMainProductImages); $i++){ ?>
      <li>
        <input type="checkbox" name='ck2' value="<?= $showSelectedMainProductImages[$i]['main_image_uuid'] ?>"/>
        <label for="myCheckbox1">
          <img src="<?php echo base_url('upload_img/'.$showSelectedMainProductImages[$i]['main_product_image']);?>" /><br>
         
        </label>
      </li>
        <?php }; ?>   
        <?php }else{ echo("<h1>No Image Found</h1>"); }?> 
      </ul>
      <button type="button" id="sbmt_unCheckedValue" class="btn btn-primary">Submit(Hide)</button>
 
     </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- image script -->
<script>

//1. on button click checkbox value will send to controller 
//2. controller will update checkbox value by setting status 1 inside Model
var all = [];
//on page load - Disabled Button 
document.getElementById("sbmt_checkedValue").disabled = true;
document.getElementById("sbmt_unCheckedValue").disabled = true;
document.getElementById("dlt_checkedValue").disabled = true;

  // ---------------select Checkbox value---------------------
  $(document).on('change','input[type=checkbox]' ,function(){
    
    //On checkbox checked - Enabled button

        // checkedVal={};
        all=[];
        $('input[type=checkbox]:checked').each(function(){                          
            all.push($(this).val());       
            
            // if(all.length === 0){
            //   console.log("hi",all); 
              
            //   document.getElementById("sbmt_unCheckedValue").disabled = false; 
            // }

            // console.log('val',$(this).attr('name'));
            if($(this).attr('name') == 'ck1'){
              document.getElementById("dlt_checkedValue").disabled = false;
              document.getElementById("sbmt_checkedValue").disabled = false; 
            }

            if($(this).attr('name') == 'ck2'){
              document.getElementById("dlt_checkedValue").disabled = false;
              document.getElementById("sbmt_unCheckedValue").disabled = false; 
            }

            
            
        });        
        console.log(all.length);       
});

//send image_name to controller setMainproductImageToChecked and set value 1 in table tbl_main_product_images


  $("#sbmt_checkedValue").on('click',function(){   
    
         

          $.ajax({
                  url: "<?= base_url('Admin/Admin_Controller/setMainproductImageToChecked') ?>",
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
              url: "<?= base_url('Admin/Admin_Controller/setMainProductImageToUnChecked') ?>",
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

$("#dlt_checkedValue").on('click',function(){          
    
    const response = confirm("Are you sure you want to delete this image?");

    if (response) {
        // alert("Ok was pressed");
        
          $.ajax({
                  url: "<?= base_url('Admin/Admin_Controller/deleteCheckedMainProductImage') ?>",
                  type: 'POST',
                  data: {                 
                      checked_id:all
                  },
                  success: function(data, textStatus, jqXHR) {
                    alert(data); 
                    // window.location = "<//?= base_url("delete-banner"); ?>";               
                  }
              })

    }
    // else {
        // alert("Cancel was pressed");
    //}
            
             
    });

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

</body>
</html>