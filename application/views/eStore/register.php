<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    
</head>

<body class="bg-secondary text-dark bg-opacity-10">
  <form action="<?= base_url('submit-registration'); ?>" method="POST">
    <div class="container">
    
        <div class="card  border-0 shadow-lg my-5">
        <div class="mx-auto mt-3 fs-3" id="heading">Create Account</div>
            <div class="card-body mx-4">
            <!-- form -->
            <div class="row g-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" name="user_name" id="floatingInputGrid" placeholder="Eg. John deo" value="">
      <label for="floatingInputGrid">Full Name</label>
    </div>
  </div>
  <div class="col-md">
  <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInputGrid" placeholder="name@example.com" value="">
      <label for="floatingInputGrid">Email</label>
    </div>
  </div>
</div>

<div class="row g-2 pt-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="password" class="form-control" name="password_val" id="floatingInputGrid" placeholder="pas" value="">
      <label for="floatingInputGrid">Password</label>
    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <div class="form-floating">
      <input type="password" class="form-control" name="" id="password_val" placeholder="re" value="">
      <label for="floatingInputGrid">Repeat Password</label>
    </div>
    </div>
  </div>
</div>

<div class="row g-2 pt-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" name="phone_no" id="floatingInputGrid" placeholder="+91-" value="">
      <label for="floatingInputGrid">Phone no</label>
    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <div class="form-floating">
      <input type="password" class="form-control" name="receivers_phone_no" id="floatingInputGrid" placeholder="900900090" value="">
      <label for="floatingInputGrid">Parcel Reviever Phone no</label>
    </div>
    </div>
  </div>
</div>

<hr>

<div class="row g-2 pt-2">  
  <div class="col-md">  
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_house_no" id="floatingInputGrid" placeholder="+91-" value="">
      <label for="floatingInputGrid">Address (House no,Street)</label>
    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_locality" id="floatingInputGrid" placeholder="locality" value="">
      <label for="floatingInputGrid">Locality / Town</label>
    </div>
    </div>
  </div>
</div>
<div class="row g-2 pt-2">  
  <div class="col-md">  
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_city" id="floatingInputGrid" placeholder="+91-" value="">
      <label for="floatingInputGrid">City / District</label>
    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <div class="form-floating">
      <input type="text" class="form-control" name="addr_pin_code" id="floatingInputGrid" placeholder="locality" value="">
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

<div class="row g-2 pt-2">  
  <div class="col-md card g-2 pt-2 pl-2">  
  <label for="floatingInputGrid">Address Type</label>
    <div class="form-floating">
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="addr_type" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">Home</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="addr_type" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">Work</label>
</div>


    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
    <!-- <button type="button" class="btn btn-outline-primary btn-lg float-right">Primary</button> -->

    </div>
    <!-- <//?= $customerInfo[0]->user_name; ?> -->
  </div> 
</div>
<!-- <hr> -->
    </div>
        <button type="submit" class="btn btn-outline-dark btn-lg mx-auto pr-5 pl-5 mt-4">Create Account</button>
        
        <div class="text-center mb-4"><a class="small" href="<?= base_url(''); ?>">Go Back</a></div>
    </div>
  </div>

    </div>
  </form>
</body>

</html>