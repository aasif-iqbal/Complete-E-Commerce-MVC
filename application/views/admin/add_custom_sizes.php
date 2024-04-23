<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>
<div class="container-fluid">
 <div class="mx-auto col-6">
    <h5>Add Custom Product Size</h5>
    <hr>
    <form action="<?= base_url('submit-custom-size'); ?>" method="post">
            
            <div class="col">
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

                    <!--  Dynamic Drop down for Main parent and child (below js) -->
                    <div class="col">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Sub-Menu</label>
                    <select class="form-control" name="child_cat_id" id="sub_menu_cat">
                    <option value=''>Select-Child-cat</option> 
                    </select>
                  </div>
                </div>

                <div class="col">
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                        <label for="">Add Custom Size</label>
                        <input type="text" class="form-control" name="custom_size_name" id="" required>
                        </div>
                        <div class="col">
                        <label for="">Add Label</label>
                        <input type="text" class="form-control" name="custom_size_label" id="" required>
                        </div>
                      </div>

                        <button type="submit"  class="btn btn-primary mt-3">Add Custom Size</button>                        
                    </div>    
                </div>
            </form>
        </div> 
                      
     <!-- dislay size -->

     <!-- </?php print_r($showCustomSizeByProductCategory);?> -->
                <div class='mx-auto col-8'>     <hr>
                <h5>Show Avilable Size w.r.t Category</h5>
                       <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Size_id</th>
                            <th scope="col">Main_category</th>
                            <th scope="col">Sub_category</th>
                            <th scope="col">Size_name</th>
                            <th scope="col">Size_label</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php if(isset($showCustomSizeByProductCategory)) {?>
                          <?php foreach($showCustomSizeByProductCategory as $size) { ?>
                          <tr>
                            <th scope="row"><?= $size['size_id']?></th>
                            <td><?= $size['parent_category_name']?></td>
                            <td><?= $size['child_category_name']?></td>
                            <td><?= $size['size_name']?></td>
                            <td><?= $size['label']?></td>
                            <td>
                              <a href="<?= base_url('edit-custom-size/'.$size['size_id']);?>">Edit</a>
                              <a href="<?= base_url('delete-custom-size/'.$size['size_id']);?>">
                                <button class="btn btn-outline-dark btn-sm" onclick="return doconfirm();">Delete</button>
                              </a>
                            </td>
                          </tr>
                            <?php } ?>
                           <?php }else{ ?>
                              <h6>No Data Found</h6>
                           <? } ?>
                        </tbody>
                      </table>
                      </div>
</div> <!--end container-->     

<script>
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