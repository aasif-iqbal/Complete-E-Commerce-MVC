<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
 <div class="mx-auto col-6">
    <h5>Edit Custom Child Sub Category</h5>
    <hr>
    <form action="<?= base_url('submit-custom-child-category'); ?>" method="post">
                                      
      <div class="col">
          <div class="form-group">
            <div class="row">
              <div class="col">
                <!-- </?php print_r($parent_cat_details[0]); ?> -->
                <label for="">Child Id</label>
                <input type="text" class="form-control" name="child_id" id="" value="<?= $child_cat_details[0]['child_id']; ?>" readonly>                        
                <!-- <label class="mt-3" for="">SEO (Slug)</label> -->
                <!-- <input type="text" class="form-control" name="slug" id="" value="<?= $child_cat_details[0]['slug']; ?>" readonly> -->
                <label class="mt-3" for="">Edit Custom Category</label>
                <input type="text" class="form-control" name="child_category_name" id="" value="<?= $child_cat_details[0]['child_category_name']; ?>">
              </div>                
              </div>
            </div>

                        <button type="submit"  class="btn btn-primary mt-3 float-right">Update Custom Category</button>                        
                    </div>    
                </div>
            </form>
        </div> 
                      
</div> <!--end container-->     


</body>
</html>