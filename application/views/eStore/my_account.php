<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
</head>
<body>
    
    
    <div class="col-md-8 mx-auto">
        <div class="row">
            <span class="h2 col">Hi, <?= $user_name; ?> </span>
            <a class='float-right' href="<?= base_url('logout');?>" ><i class="fa fa-external-link" style='font-size:12px' aria-hidden="true"></i>&nbsp;sign out</a>
        </div>    
    <!-- <hr> -->
    <!-- <div class="card" style="">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
        </div>
    </div> -->
    <hr>
    <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">                            
                            <div class="h5 mb-0 pl-2 font-weight-bold text-gray-800">
                            <a href="<?= base_url('my-orders');?>" class="text-danger stretched-link">Your Order
                            </a></div>
                        </div>
                        <div class="col-auto pr-3">
                            <i class="fa fa-cube fa-2x text-gray-500"></i>
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
                            <div class="h5 mb-0 pl-2 font-weight-bold text-gray-800">
                            <a href="<?= base_url('edit-addr');?>" class="text-danger stretched-link">Account Setting
                            </a></div>
                        </div>
                        <div class="col-auto  pr-3">
                            <i class="fa fa-cogs fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
</body>
</html>