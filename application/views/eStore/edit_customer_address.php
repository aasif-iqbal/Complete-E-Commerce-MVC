<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body class="bg-secondary text-dark bg-opacity-10">
  <form action="<?= base_url('submit-edited-addr'); ?>" method="POST">
    <div class="container">
    
        <div class="card  border-0 shadow-lg my-5">
        <div class="mx-auto mt-3 fs-3" id="heading">Edit Address</div>
            <div class="card-body mx-4">
            <!-- form -->
            <div class="row g-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" name="user_name" id="floatingInputGrid" placeholder="Eg. John deo" value="<?= $customerInfo[0]->user_name; ?>" readonly>
      <label for="floatingInputGrid">Full Name</label>
    </div>
  </div>
  
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" name="receivers_phone_no" id="" placeholder="+91-" value="<?= $customerInfo[0]->receivers_phone_no; ?>">
      <label for="floatingInputGrid">Phone no</label>
    </div>
  </div>

</div>


<hr>

<div class="row g-2 pt-2">  
  <div class="col-md">  
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_house_no" id="floatingInputGrid" placeholder="+91-" value="<?= $customerInfo[0]->addr_house_no; ?>">
      <label for="floatingInputGrid">Address (House no,Street)</label>
    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_locality" id="floatingInputGrid" placeholder="locality" value="<?= $customerInfo[0]->addr_locality; ?>">
      <label for="floatingInputGrid">Locality / Town</label>
    </div>
    </div>
  </div>
</div>
<div class="row g-2 pt-2">  
  <div class="col-md">  
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_city" id="floatingInputGrid" placeholder="+91-" value="<?= $customerInfo[0]->addr_city; ?>">
      <label for="floatingInputGrid">City / District</label>
    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_pin_code" id="floatingInputGrid" placeholder="locality" value="<?= $customerInfo[0]->addr_pin_code; ?>">
      <label for="floatingInputGrid">Pin Code</label>
    </div>
    </div>
  </div>
</div>
<div class="row g-2 pt-2">  
  <div class="col-md">  
  <div class="form-floating">
  <!-- <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected>State</option>
    <option value="1">Delhi</option>
    <option value="2">Mumbai</option>
    <option value="3">Jharkhand</option>
  </select> -->
  <input type="text" class="form-control" name="addr_state" id="floatingInputGrid" placeholder="locality" value="Delhi" readonly>
  <label for="floatingSelect">State</label>
</div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_country" id="floatingInputGrid" placeholder="country" value="India" readonly>
      <label for="floatingInputGrid">Country</label>
    </div>
    </div>
  </div>
</div>

<div class="g-2 pt-2">  
  <div class="col-md card g-2 pt-2 pl-2">  
  <label for="floatingInputGrid">Address Type</label>
    <div class="form-floating">
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="addr_type" id="addr_type1" 
  value="1">
  <label class="form-check-label" for="inlineRadio1">Home</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="addr_type" id="addr_type2" value="2">
  <label class="form-check-label" for="inlineRadio2">Work</label>
</div>

    </div>
  </div>
  
</div>
<!-- <hr> -->
    </div>
        <button type="submit" class="btn btn-outline-dark btn-lg mx-auto pr-5 pl-5 mt-4">Save Changes</button>
        
        <div class="text-center mb-4"><a class="small" href="<?= base_url('shipping'); ?>">Go Back</a></div>
    </div>
  </div>

    </div>
  </form>
  <script>
    function checkRadioForEdit(){
      var addr_type1 = document.getElementById('addr_type1');
      var addr_type2 = document.getElementById('addr_type2');

      if(addr_type1.value == '<?= $customerInfo[0]->addr_type; ?>'){
        document.getElementById("addr_type1").checked = true;
      }

      if(addr_type2.value == '<?= $customerInfo[0]->addr_type; ?>'){
        document.getElementById("addr_type2").checked = true;
      }
  }
  checkRadioForEdit();
  </script>
</body>
</html>