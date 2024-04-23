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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="<?= base_url('submit-login'); ?>" method="post">
                                        <div class="form-floating mb-3">

                                        <!-- localstorage data(cart items) -->
                                        <input type="hidden" name="cartItems" value="">
                                        <!-- ends localstorage data(cartItems) -->

                                        <input type="text" class="form-control" name="chk_phone_no" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Phone no</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="chk_password" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Password</label>
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
                                         <input type='submit' name='Login' class="btn btn-outline-dark  btn-block" id='user_login' value='Login'>
                                         
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                                        <a class="small" href="<?= base_url(''); ?>">Go Back</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('registration'); ?>">Create an Account!</a>
                                    </div>

                                <!-- </div> -->
                            <!-- </div> --><!-- row end -->
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        // Case - When user is login, check user's localstorage that if user's
        // added any items or not, if products(items) is added by user, then 
        // fetch it and save it to database by using ajax

        // below code will load when you visit login-page
        var item_count = JSON.parse(localStorage.getItem('item_count'));
        console.log('item_count',item_count);
        if(item_count > 0)
        {
            let itemArray = (localStorage.getItem('cart_item_list'));
            console.log('itemArray',itemArray);
            document.querySelector('input[name="cartItems"]').value = itemArray;
        }

        
        
        //check after login
    </script>
</body>

</html>