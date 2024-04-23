<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Begin Page Content -->
<div class="container">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Orders</h1>     
</div>
<!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Hi Admin!</strong> This application will expire on <strong><span id="demo"></span></strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> -->
<!-- Content Row -->
<!-- Pending Requests Card Example -->
<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        <!-- Orders -->
                        </div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                        <a href="<?= base_url('customer-orders');?>" class="text-danger stretched-link">MY ORDERS
                        </a></div>
                    </div>
                    <div class="col-auto pr-3">
                        <i class="fa fa-gift fa-2x text-gray-500 pr-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        </div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                        <a href="<?= base_url('/');?>" class="text-danger stretched-link">BUY AGAIN
                        </a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-rocket fa-2x text-gray-500 pr-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        </div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                        <a href="<?= base_url('cancellation-history/'.$user_uuid);?>" class="text-danger stretched-link">CANCELLATION
                        </a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-times fa-2x text-gray-500 pr-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        </div>
                            <div class="h6 mb-0 font-weight-bold text-success text-gray-500">
                        <a href="<?= base_url('/');?>" class="text-danger stretched-link">RETURN & REFUND
                        </a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-retweet fa-2x text-gray-500 pr-3"></i>
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
</body>
</html>