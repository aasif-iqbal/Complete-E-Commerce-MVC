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
        <!-- </?php var_dump($selectedColorInfo); ?> -->
    <div class="mx-auto col-6">
    <h4>Edit custom color</h4>
    <hr>
    <form method='POST' action='<?= base_url('submit-edited-custom-color');?>'>
  <div class="form-group">
    <div class="row">
        <div class="col">
            <label for="custom_color">Color Name</label>
            <input type="hidden" name="color_id" value="<?= $selectedColorInfo[0]['color_id']; ?>"/>
            <input type="text" class="form-control" id="color_name" name="color_name" value="<?= $selectedColorInfo[0]['color_name']; ?>">
        </div>
        <div class="col">
        <label for="custom_color">Hex - Code</label>
            <input type="text" class="form-control" id="color_name" name="" value="<?= $selectedColorInfo[0]['hex_code']; ?>" readonly/>
        </div>
    </div>
    
   
  </div>
  <div class="form-group">
    <label for="create_color_hex">Create color code for above selected color</label>
    <div class="row">
        <div class="col">
            <!-- <input type="color" class="form-control" value="#ff0000" id=""> -->
            <input type="color" class="form-control" value="<?php echo($selectedColorInfo[0]['hex_code']);?>" name="hex_code"  id="colorPicker" onchange="validateHexColor(this)">
            <div id='show_hex_code' class='mt-4'></div>         
        </div>
        <div class="col">
            <!-- maintain col-3 space -->
        </div>
    </div>        
  </div>
 
  <button type="submit" class="btn btn-primary float-right">Update</button>
</form>
    </div>
    </div>
<script>      
function validateHexColor(input) {
            //console.log(input.value)
  var hexColor = input.value;
  var regex = /^#[0-9A-Fa-f]{6}$/;

  //Show hex code
  let htmlTemp = '';
    htmlTemp  += `<input type='text' class='form-control' value'${hexColor}' placeholder='${hexColor}' readonly>`;

   document.getElementById('show_hex_code').innerHTML = htmlTemp;

  if (!regex.test(hexColor)) {
    input.value = '#000000'; // Set a default value or do something else
    alert('Please select a valid hexadecimal color code');
  }
}
</script>

</body>
</html>