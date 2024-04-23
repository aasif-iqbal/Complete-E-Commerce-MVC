<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>
<div class='container'>
        <!-- </?php var_dump($selectedSizeinfo); ?> -->
    <div class="mx-auto col-6">
    <h4>Edit custom Size</h4>
    <hr>
    <form method='POST' action='<?= base_url('submit-edited-custom-size');?>'>
    <div class="form-group">
         
                <label for="custom_color">Main Menu</label>
                <input type="hidden" name="size_id" value="<?= $selectedSizeinfo[0]['size_id'] ?>"/>
                <input type="text" class="form-control" id="" name="parent_category_name" value="<?= $selectedSizeinfo[0]['parent_category_name'] ?>" readonly>
             
             
            <label for="custom_color">Sub-Menu</label>
                <input type="text" class="form-control" id="" name="" value="<?= $selectedSizeinfo[0]['child_category_name'] ?>" readonly/>
             
         
    </div>
        <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="custom_color">Custom Size</label>
                <input type="hidden" name="color_id" value=""/>
                <input type="text" class="form-control" id="" name="size_name" value="<?= $selectedSizeinfo[0]['size_name']; ?>" required/>
            </div>
            <div class="col">
            <label for="custom_color">Custom label</label>
                <input type="text" class="form-control" id="" name="label" value="<?= $selectedSizeinfo[0]['label']; ?>" required/>
            </div>
        </div>
    </div>
 
  <button type="submit" class="btn btn-primary float-right">Update</button>
</form>
    </div>
    </div>
</body>
</html>