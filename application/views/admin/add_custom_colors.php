<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #color_box{
            height:25px;
            width: 25px;
        }
    </style>
    <title>FifthObject</title>
</head>
<body>
    
    <div class='container'>
    <div class="mx-auto col-6">
    <h4>Create custom color</h4>
    <hr>
    <form method='POST' action='<?= base_url('submit-custom-color');?>'>
  <div class="form-group">
    <label for="custom_color">Add Color Name</label>
    <input type="text" class="form-control" id="color_name" name="color_name">
   
  </div>
  <div class="form-group">
    <label for="create_color_hex">Create color code</label>
    <div class="row">
        <div class="col">
            <!-- <input type="color" class="form-control" value="#ff0000" id=""> -->
            <input type="color" class="form-control" name="colorPicker"  id="colorPicker" onchange="validateHexColor(this)">
            <div id='show_hex_code' class='mt-4'></div>         
        </div>
        <div class="col">
            
        </div>
    </div>        
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<hr>
<h5>Show avilable color</h5>
    <div>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Color_id</th>
            <th scope="col">Color_name</th>
            <th scope="col">Color</th>
            <th scope="col">Hex_code</th>           
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
           
                <?php if(isset($show_avilable_color)){ ?>
                    <?php foreach($show_avilable_color as $color){ ?>
                <tr>
                    <th scope="row"><?= $color['color_id']?></th>
                    <td><?= $color['color_name']?></td>
                    <td> <div id='color_box' style='background-color:<?= $color['hex_code']?>' ></div></td>
                    <td><?= $color['hex_code']?></td>
                    <td>
                        <!-- Edit -->
                        <a href="<?= base_url('edit-custom-color/'.$color['color_id']); ?>" class="btn btn-outline-info btn-sm">Edit</a>
                        <!-- Delete -->
                        <a href="<?= base_url('delete-custom-color/'.$color['color_id']); ?>">
                        <button class="btn btn-outline-secondary btn-sm" onclick="return doconfirm();">Delete</button></a>
                    </td>
                </tr>                                     
                    <?php } ?>
                <?php } ?>
            
        </tbody>
        </table>
    </div>
    </div>
    </div>
<script>      
function validateHexColor(input) {
            //console.log(input.value)
  var hexColor = input.value;
  var regex = /^#[0-9A-Fa-f]{6}$/;

  //Show hex code
  let htmlTemp = '';
    htmlTemp  += `<input type='text' class='form-control' value'${hexColor}' placeholder='${hexColor}'>`;

   document.getElementById('show_hex_code').innerHTML = htmlTemp;

  if (!regex.test(hexColor)) {
    input.value = '#000000'; // Set a default value or do something else
    alert('Please select a valid hexadecimal color code');
  }
}
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