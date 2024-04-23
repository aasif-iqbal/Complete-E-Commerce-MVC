<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Hi Admin !</strong> 
  <!-- This application will expire on<strong><span id="demo"></span></strong> -->
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <!-- Content Row -->
    <!-- Pending Requests Card Example -->
    <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            FifthObject</div>
                                <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                            <a href="<?= base_url('/');?>" class="text-danger stretched-link">Our Web-Application 
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-rocket fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            FifthObject</div>
                                <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                            <a href="https://dashboard.razorpay.com/app/dashboard" class="text-danger stretched-link">Razorpay
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-desktop fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
<hr>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Add Custom Category</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <a href="<?= base_url('add-categories');?>" class="text-primary stretched-link">Menu/Sub-menu
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-sitemap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Add Custom Color</div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                            <a href="<?= base_url('add-color');?>" class="text-success stretched-link">#hex-code
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-paint-brush fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Add Custom Size
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                            <a href="<?= base_url('add-size');?>" class="text-info stretched-link">S/M/L/XL
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-text-height fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Add Products</div>
                                <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                            <a href="<?= base_url('add-products');?>" class="text-warning stretched-link">Name/Art./Image
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!--  New Row -->

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Product List</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <a href="<?= base_url('product-list');?>" class="card-link stretched-link">Main Img/Variation/Color Variation
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-address-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Inventory</div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                            <a href="<?= base_url('show-stocks');?>" class="text-success stretched-link">Product-list/stocks
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Shipping
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                            <a href="<?= base_url('show-shipping');?>" class="text-info stretched-link">Orders/Shipping status
                            </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    
        </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jun 4, 2023 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>


