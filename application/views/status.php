<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Status</title>

    
    
</head>

<body class="bg-secondary text-dark bg-opacity-10">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <!-- <div class="row"> -->
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <!-- <div class="col-lg-6"> -->
                                <div class="p-5">
                                    
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Delivery Status!</h1>
                        </div>
                        <form action="<?= base_url('update-shipping'); ?>" method="post">
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Confirmation Code</label>
                                <input type="text" class="form-control" name="conformation_code" id="conformation_code" placeholder="">                                        
                            </div>                                                        
                                <input type='submit' name='' class="btn btn-outline-dark  btn-block" value='Submit'>                                
                        </form>
                    <!-- </div> -->
                            <!-- </div> --><!-- row end -->
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    
</body>

</html>