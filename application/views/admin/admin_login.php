<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    
    
</head>

<body class="bg-gradient-primary text-dark bg-opacity-10">

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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Admin</h1>
                                    
                                    <?php 
                                    if(isset($error_login)){ ?>
                                        <div class='h6 text-danger'><?= $error_login; ?></div>
                                    <?php } ?>

                                    <?php if(isset($blank_login)){ ?>
                                        <div class='h6 text-danger'><?= $blank_login; ?></div>
                                    <?php }?>
                                    </div>
                                    <form action="<?= base_url('submit-admin-login'); ?>" method="POST">
                                        <div class="form-floating mb-3">
                                        
                                        <label for="floatingInput">Username</label>
                                        <input type="text" class="form-control" name="admin_username" id="username" placeholder="">
                                        
                                        </div>
                                        <label for="floatingInput">Password</label>
                                        <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="admin_password" id="floatingInput" placeholder="">
                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <!-- add class='btn-user' to make round eages -->
                                        <!-- <a href="</?= base_url(''); ?>" class="btn btn-outline-dark  btn-block"></a> -->
                                         <input type='submit' name='Login' class="btn btn-outline-primary  btn-block" value='Login'>
                                         
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                                        <a class="small" href="<?= base_url(''); ?>">Go Back to App</a>
                                    </div>                                    

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