<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FifthObject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="<?= base_url('assets/shopmax/fonts/icomoon/style.css'); ?>">
    
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico'); ?>">
    <!-- icon -->


    <!-- <link rel="stylesheet" href="</?= base_url('assets/shopmax/css/bootstrap.min.css'); ?>"> -->
    <link href="<?= base_url('assets/B-v5.1.3/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/shopmax/css/magnific-popup.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/shopmax/css/jquery-ui.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/shopmax/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/shopmax/css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/shopmax/css/aos.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/shopmax/css/style.css'); ?>">
    <!-- fancybox -->
    <link rel="stylesheet" href="<?= base_url('assets/fancybox/fancybox.css'); ?>">

    <style>
      a {
          text-decoration: none !important;
      }
      .dropbtn {
        background-color: transparent;
        color: rgb(114, 98, 98);
        /* padding: 16px; */
        font-size: 16px;
        border: none;
      }
      .signinbtn {
        background-color: #04AA6D;
        color: white;
        padding: 10px 36px 10px 36px;
        font-size: 14px;
        border: none;
      }
      .dropdown {
        position: relative;
        display: inline-block;
      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        right: 50%;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 2;
      }
      
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
      
      .dropdown-content a:hover {background-color: #ddd;}
      
      .dropdown:hover .dropdown-content {display: block;}
      
      /* .dropdown:hover .dropbtn {background-color: #3e8e41;} */
      .dropdown:hover .signinbtn {background-color: #0f1a0f;}
      
      #logo{
        /* object-fit:cover; */
        width: 170px;
        height: 60px;
      }
      </style>
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-navbar bg-white py-2">
      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>  
        </div>
      </div>
      
<!-- </?php echo("<pre/>"); var_dump($nav_categories); ?> -->
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
           
          <div class="logo">
            <div class="site-logo">
              <a href="<?= base_url('/');?>" class="js-logo-clone">FifthObject</a>
            </div>
          </div>

          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
              <?php if(!empty($nav_categories)){?>
            <?php foreach($nav_categories as $row):?>  
              <li class="has-children active">
                  <a href="<?= base_url('shops/').$row->parent_id; ?>">
                    <?= $row->parent_category_name; ?>        
                  </a>
                  <ul class="dropdown">
                  <?php if (isset($row->children)) {               
                        foreach($row->children as $child): ?>
                      <li>
                        <!-- <a href="</?= base_url('shop/').$child->slug; ?>">
                        </?= $child->child_category_name; ?></a> -->
                        <a href="<?= base_url('shop-cat/').$child->child_id; ?>">
                        <?= $child->child_category_name; ?></a>
                      </li>
                    <?php endforeach;} ?>                      
                  </ul>
                </li><!--end parent cat-->
                <?php endforeach; }?>                 
                </li>
                <li><a href="<?= base_url('store');?>">Store</a></li>
                <!-- <li><a href="#">Catalogue</a></li> -->
                <!-- <li><a href="#">New Arrivals</a></li> -->
                <li><a href="<?= base_url('contact-us');?>">Contact</a></li>
                <li><a href="<?= base_url('about-us');?>">About Us</a></li>
              </ul>
            </nav>  
          </div>
          
          <div class="icons">
            <!-- <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a> -->

            <!-- <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a> -->
            
            <a href="<?= base_url('search');?>" class=""><span class="icon-search"></span></a>
                          &nbsp;
            <div class="dropdown">
              <button class="dropbtn"><span class="icon-user-o"></span></button>
              <div class="dropdown-content">
                
                <?php 
                $userLoginData = $this->session->userdata('userLoginData'); 
                // var_dump($userLoginData);
                 $user_login_data = $userLoginData;
                if(isset($userLoginData) || $userLoginData != NULL){
                  ?>
                  <a href=''  class='text-uppercase fw-bold text-dark'>
                    <small>HI,&nbsp;<?= $userLoginData['user_name'];?></small></a>
                <?php }else{
                ?>
                <a href="<?= base_url('login');?>"><button class="signinbtn">SIGN IN</button></a>
                <?php } ?>
                <!-- My Account -->
                        <?php 
                        if(isset($userLoginData) || $userLoginData != NULL){
                        ?>      
                <a href="<?= base_url('my-account')?>"><small>My Account</small></a>
                <?php } ?>
                <!-- My Order -->
                <?php 
                      if(isset($userLoginData) || $userLoginData != NULL){
                        ?>      
                <a href="<?= base_url('my-orders')?>"><small>My Orders</small></a>
                <?php }?>

                <!-- logout -->
                <?php if(isset($userLoginData) || $userLoginData != NULL){
                  ?>
                  <a href="<?= base_url('logout')?>"><small>Sign out</small></a>
                <?php } ?>
              </div>

              <input type='hidden' id='login_user_uuid' value='<?= json_encode($user_login_data['user_uuid']); ?>'/>

            </div>
<?php

?>

            <a href="<?= base_url('cart');?>" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>                          
                <span class="number"><div id='updateItemCount'></div></span>
                              
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div><!--site-navbar ends -->
    <!-- body -->
<!-- footer will start-->
<script>
  /*
  On Page load
  */ 
  document.addEventListener("DOMContentLoaded", function() {
    
    let login_user_uuid = document.getElementById('login_user_uuid');
         
    // console.log((login_user_uuid.value));
    let result = login_user_uuid.value.replace(/"/g, '');

// console.log(result);

    let update_cart_value = {        
        updated_user_UUID: result
    };

    console.log('update_cart_value', update_cart_value);

let updateItemCount = document.getElementById('updateItemCount');
    $.ajax({
        url:'<?= base_url('EStore/EStore_Controller/update_cart_value_ajax');  ?>',
        type: 'POST',
            data: update_cart_value,
            success:function(data, textStatus, jqXHR){              
              
              var jsonData = JSON.parse(data);              
              
              console.log('jsonData',jsonData); 
              
              if(jsonData != null || jsonData != undefined){
                
              var sum = jsonData.map(function(obj) {
                      return parseInt(obj.item_count);
                    }).reduce(function(acc, curr) {
                      return acc + curr;
                    }, 0);

              console.log(sum);

              updateItemCount.innerHTML = sum;
            }else{
              updateItemCount.innerHTML = '0';
            }
        },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                console.log(textStatus);   
            }
        });        


    // count = count+1;
    // console.log('user_uuid',user_uuid.value);
    // $.ajax({

    // })
    /*
    For localstorage
    var item_count = JSON.parse(localStorage.getItem('item_count'));
    // console.log('item_count',item_count);
    if(item_count != null){
      document.getElementById('itemCount').innerHTML = item_count ? item_count : 0;
    }else{
      document.getElementById('itemCount').innerHTML = item_count ? item_count : 0;
    }  
    */
    
});
</script>
    
  
            
  