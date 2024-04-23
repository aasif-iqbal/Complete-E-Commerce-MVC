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
#upload_update_img{
  /* display: none; */
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
                <input type="hidden" id="custId" name="product_uuid" value="<?= ($selected_product[0]->product_uuid);?>">   
                               
                <div class="col">
                    <div class="form-group">
                      <!-- Choose Product Color From Variation table -->
                    
                        <label for="exampleFormControlSelect1">Avilable color variation</label>
                            <select class="form-control" name="product_color" id="exampleFormControlSelect1">
                            <option value=''>Select-Color--Select-Size</option>  
                            <?php 
                            if(isset($product_colors)){
                            foreach($product_colors as $color):
                            ?>
                            <option value='<?= $color->product_color.'_'.$color->product_color_name.'_'.$color->variation_uuid; ?>'><?= $color->product_color_name."--".$color->product_size_name; ?></option>
                            <?php endforeach; } ?>                 
                            </select>
                      </div>
                  </div>
                <hr>

                <input type="file" id="files" name="files[]"  multiple="multiple"/>
                <br>
                <input type="submit" class="btn btn-outline-info mt-1 pr-5 pl-5" value="Upload Image" />
            </form>

          </div>   
          <div class='col border-left'>        
          <h6>Product Info:</h6>
          <div class="card py-1 px-1 bg-gradient-light">
          Product-Name:<span class="card-title"><?= ($selected_product[0]->product_name);?></span>
          Product-ID:<span class="card-title"><?= ($selected_product[0]->product_uuid);?></span>
          </div>
          <h6>Instruction:</h6>
            <ul>
            <li title='hiiiiiiiiiiiiii'>Tooltip</li>
                <li title='hiii'>Upload One image at a time</li>
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
          
         <h4>Show Product-Variations</h4>
         <hr>
         <div>

         <?php
        //  echo("<pre/>");
         var_dump(($colored_images));
         for ($i=0; $i < count($colored_images); $i++) { ?>
        
          <?= $colored_images[$i]['variation_color_name'];?>
         
          <div class="row">
          <?php for ($j = 1; $j <= 5; $j++) { ?>
            <div><img src="<?= base_url('colors_img/'.$colored_images[$i]['prod_color_img'.$j]);?>" width="200" height="200"> <br>   
            
            <button id='<?= $colored_images[$i]['variation_uuid'];?>' 
            onclick='editColoredImage(this.id)'>Edit</button>

            <button value=''>Delete</button>     
               <!-- upload image -->
               <div id="upload_update_img">
                <!-- image upload -->
                <form enctype="multipart/form-data" id="submit">
                  <input type="hidden" name="v_id" value="<?= $colored_images[$i]['variation_uuid']?>">
                  <input type="file" id="image_file_<?= $j;?>" name="image_file[]">
                  <!-- image preview -->
                  <img id="output" height='200' width='200'/>
                  <br/>
                  <button type="submit"  class='mt-1 btn-sm'id='<?= $colored_images[$i]['variation_uuid'];?>'  onclick='uploadImage(this.id)'>Upload</button>
             </form>
              </div>
            </div>
            
          <?php } ?>
          </div>
         <?php } ?>

          <?php 
          // echo("<pre/>");
          // var_dump(($colored_images));
          if(isset($colored_images)){
            foreach($colored_images as $variation_info):?>
            <div class="mt-3"><h5><?= $variation_info['variation_color_name'];?></h5></div>
            <hr>
            <div class="row">
            <div>
              <img src="<?= base_url('colors_img/'.$variation_info['prod_color_img1']);?>"  width="200" height="200"><br>
              <button class='btn btn-outline-info btn-sm' id='editImage'>Edit</button>
              <button id="showDialog" class='btn btn-outline-danger btn-sm'>Delete</button>
              <!-- A modal dialog containing a form -->
              <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dialog -->
              
              <dialog id="favDialog">
                <form method="dialog">
                  <p>
                
                    <div id="delete_id" value="<?= $variation_info['variation_uuid'];?>">Are You Sure, You want to delete this image?</div>
                  
                  </p>
                  <div>
                    <button value="cancel">Cancel</button>
                    <button id="confirmBtn" value="<?= $variation_info['variation_uuid'].'_'.$variation_info['prod_color_img1']?>">Confirm</button>
                  </div>
                </form>
              </dialog>               
              <output></output>
              <hr>
              <!-- <div id="upload_update_img">
                
                <form enctype="multipart/form-data" id="submit">
                  <input type="hidden" name="v_id" value="</?= $variation_info['variation_uuid']?>">
                  <  <input type="file" name="file" id="image_file" onchange="loadFile(event)">  
                   
                  <img id="output" height='200' width='200'/>
                  <br/>
                  <button type="submit" class='btn btn-danger mt-1 btn-sm'  id="sub">Upload</button>
                </form>               
              </div> -->

            </div>
            <div>   
              <?php if($variation_info['prod_color_img2'] == '0'){ ?>
              <img src="<?= base_url('colors_img/no_img1.svg');?>" width="200" height="200"> <br>   
              <?php } else{ ?>           
              <img src="<?= base_url('colors_img/'.$variation_info['prod_color_img2']);?>"  width="200" height="200"><br>
              <?php } ?>
              <button class='btn btn-outline-danger btn-sm'>Delete</button>
            </div>
            <div>
              <img src="<?= base_url('colors_img/'.$variation_info['prod_color_img3']);?>"  width="200" height="200"><br>
              <button class='btn btn-outline-danger btn-sm'>Delete</button>
            </div>
            </div>
          <?php endforeach;}?>
         </div>
         
     </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</body>
<!-- image script -->
<script>
// https://stackoverflow.com/questions/41585537/upload-image-using-codeigniter-with-ajax-and-formdata

var v_id;      // global variable  @v_id

jQuery(document).ready(function(){
    jQuery('#editImage').on('click', function(event) {        
        jQuery('#upload_update_img').toggle('show');
    });
});
 
// For image Preview
var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
 
  function editColoredImage(id){
    alert(id);   
  }

function uploadImage(id){
 
const fileInputs = document.querySelectorAll('input[type="file"]');

for (let i = 0; i < fileInputs.length; i++) {
    const files = fileInputs[i].files;
    if (files && files.length > 0) {
      let fileName = files[0].name;
      console.log(fileName);
      var f_name = fileName;
    } else {
      //Show number of itteration
      //console.log(`No file selected for input element ${i}`);
    }
  }
  console.log(f_name);
  $.ajax({
             url:'<?= base_url('Admin/Admin_Controller/update_colored_image_ajax'); ?>',
             type:"post",
             data:{
              v_id:id,
              file_name:f_name
             },
             
              success: function(data){
                  alert(data);
           }, error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
         });
     

}

  $('#submit').submit(function(e){
    // alert('gelo');
    e.preventDefault(); 
         $.ajax({
             url:'<?= base_url('Admin/Admin_Controller/update_colored_image_ajax'); ?>',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                  alert(data);
           }, error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
         });
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
</script>

<script>
  
  // dialog box
  var showButton = document.getElementById('showDialog');
  var favDialog = document.getElementById('favDialog');
  var outputBox = document.querySelector('output');
  var selectEl = favDialog.querySelector('select');
  var confirmBtn = favDialog.querySelector('#confirmBtn');
  var image_id = document.getElementById('image_id');
  var delete_id = document.getElementById('delete_id'); 

  // "Show the dialog" button opens the <dialog> modally
  showButton.addEventListener('click', () => {  
    favDialog.showModal();
});

delete_id.addEventListener('load', (e) => {
 // alert(delete_id.value); 
  confirmBtn.value = delete_id.value;
});

 
// "Confirm" button of form triggers "close" on dialog because of [method="dialog"]
favDialog.addEventListener('close', () => {
  // outputBox.value = "Img Deleted Successfully";
  v_id_img_name = favDialog.returnValue;
  // setTimeout(location.reload(), 10000);
  //  alert(outputBox.value)
   if(outputBox.value != 'cancel'){
  //  Ajax call for delete(update with value 0) selected image
  $.ajax({
            url: "<?= base_url('Admin/Admin_Controller/delete_colored_image_ajax'); ?>",
            type: 'POST',            
            data: {
              v_id_with_img_name: v_id_img_name
            },
            success: function(data, textStatus, jqXHR) {
                console.log(data); 
                var jsonData = JSON.parse(data);  
                console.log(jsonData); 
                
            },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
            });
          }else{
            console.log('cancel');
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