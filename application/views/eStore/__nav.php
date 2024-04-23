<!DOCTYPE html>
<html>
    <head>
        <title>Salt</title>                
        <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0; /* remove the gap so it doesn't close */
      /* }  */
    
  
        /* .dropdown{text-align:center;} */
        /* .button, .dropdown-menu{margin:10px auto} */
        .dropdown-menu{width:200px; left:50%; margin-left:-100px;}
        @media only screen and (min-device-width: 380px){
            #offcanvas_menu{
                /* padding: 0 0 0 70%;         */
            }
         
        }

        element.style {
}
.offcanvas-body {
    padding: 1rem 2rem;
    /* font-size:24px; */
  }
.dropdown-menu {
    width: 100px!important;
    left: 0%!important;
    margin-left: 10px!important;
}

/* .dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0; 
} 
*/

/* .offcanvas { max-width:80%!important;} */
        /* .offcanvas-body{
            font-size: 39px;
        } */
        
    </style>
    </head>
    <body>
<!-- https://codepen.io/EigenDerArtige/pen/mOboLR -->

<!-- nav offcanvas -->
<!-- https://codepen.io/planetoftheweb/pen/JjNmzee?editors=1000 -->

<?php 
// echo("<pre/>");
// var_dump($nav_categories); 
?>
<nav class="navbar bg-secondary navbar-expand-xl  navbar-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?= base_url('/'); ?>">
        <img src="<?= base_url('assets/img/undraw_rocket.svg'); ?>" alt="" width="30" height="24" class="d-inline-block align-text-top">
        FifthObject
        </a>   
      
    <button class="navbar-toggler" type="button" id="offcanvas_menu"
      data-bs-toggle="offcanvas" 
      data-bs-target="#navbarOffcanvas"
      aria-controls="navbarOffcanvas"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-start bg-secondary" id="navbarOffcanvas"
        tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">
            Offcanvas</h5>
          <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">          
          <div class="navbar-nav justify-content-start flex-grow-1 pe-3">
          <!-- <a class="nav-item nav-link active" aria-current="page" href="#">Bubbles</a>
            <a class="nav-item nav-link" href="#">Cosmo</a> -->

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">            
            <!-- Product  categories dropdowns -->           
            <?php if(!empty($nav_categories)){?>
            <?php foreach($nav_categories as $row):?>
            <li class="nav-item dropdown">
          
              <a class="nav-link" href="<?= base_url('sadda'); ?>" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $row->parent_category_name; ?>              
              </a>     
              
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                <?php if (isset($row->children)) {               
                foreach($row->children as $child): ?>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('shop/').$child->slug; ?>"><?= $child->child_category_name; ?></a>
                  </li>                  
                <?php endforeach;} ?>  
              </ul>                
            </li> 
            <?php endforeach; }?> 
         </ul>

          </div>
        </div>
    </div> 
     
    <!-- user profile
    <div class="dropdown">
    <button class="btn btn-outline-danger me-2 border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-regular fa-user"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><h6 class="dropdown-header text-dark">HELLO {{user}}</h6></li>
            <li><button type="button" class="btn btn-outline-danger btn-sm ml-4">LOGIN / SIGNUP</button></li>
            <hr class="mx-2">
            <li><a class="dropdown-item" href="#">Orders</a></li>
            <li><a class="dropdown-item" href="#">Contact Us</a></li>
            <li><a class="dropdown-item" href="#">Coupons</a></li>
            <li><a class="dropdown-item" href="#">Save Address</a></li>
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
    </div>
    wishlist  
     <button class="btn btn-outline-danger me-2 border-0" type=""><i class="fa-regular fa-heart"></i></button> -->
        <!-- shopping bag 
        <button class="btn btn-outline-info border-0" type=""><i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(0)</button> -->
  </div>
  
</nav>





    <!-- 2nd nav -->
    <nav class="navbar navbar-light bg-light" style="">
   
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('admin'); ?>">
            <span><small>Ads By Company</small></span>
        <!-- <img src="<//?= base_url('assets/img/undraw_rocket.svg'); ?>" alt="" width="30" height="24" class="d-inline-block align-text-top"> -->
        
       <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>   -->
        </a>   
       

        <!-- This place is for search bar -->
<?php 
  $userLoginData = $this->session->userdata('userLoginData');  
  // var_dump($userLoginData['user_uuid']);
  $cart_value = $this->session->userdata('cart_value');
  // echo('cart_value:');
  // print_r($cart_value);
?>
        <!-------------------- right icons ---------------------->
        <form class="d-flex">
        <div class="dropdown">
            <!--- user profile --->
        <button class="btn btn-outline-dark me-2 border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-regular fa-user"></i>&nbsp;&nbsp;Profile
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><h6 class="dropdown-header text-dark">
              HELLO 
               <?= (isset($userLoginData['phone_no']))?($userLoginData['phone_no']):'User'; ?>
            </h6></li>
            <li><a type="button" href="<?= base_url('login'); ?>" class="btn btn-outline-danger btn-sm ml-4">LOGIN / SIGNUP</a></li>
            <hr class="mx-2">
            <!-- <li><a class="dropdown-item" href="<?= base_url('orders'); ?>">Orders</a></li> -->
            <li><a class="dropdown-item" href="#">Contact Us</a></li>
            <!-- <li><a class="dropdown-item" href="#">Coupons</a></li> -->
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a></li>
        </ul>
        </div>
        <!-- wishlist -->
        <!-- <button class="btn btn-outline-dark me-2 border-0" type="submit"><i class="fa-regular fa-heart"></i></button> -->
        
        <!-- shopping bag -->
        <?php $item_quantity = $this->session->userdata('item_quantity');
        // item_count
         ?>
         <!-- user_uuid -->
<input type="hidden" id="user_uuid" name="" value="<?= isset($userLoginData['user_uuid'])?$userLoginData['user_uuid']:'0';?>">

        <a class="btn btn-outline-dark border-0" 
          href="<?= base_url('cart');?>" role="button">
          
                  <?php 
                  
                  if(isset($userLoginData)){ ?>
                  <!-- for login user -->
                  <span><i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(<?= isset($cart_value) ? $cart_value:'0'; ?>)</span>
                  (<span id='cart_value'></span>)
                  <?php }else{?>
                    <!-- for non-login user -->
                    <span><i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(<?= isset($item_count)?$item_count:'0'; ?>)</span>
                  <?php } ?>
        <!--
          </?php if($userLoginData != NULL){?>
            <span id="bag_db"><i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(</?= isset($item_count)?$item_count:'0'; ?>)</span>
          </?php }else{ ?>
            <span id="bag"><i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(</?= $cart_value; ?>)</span>
          </?php } ?> 
        -->

        </a>
      </form>
      
    </div>
    </nav>

    <script>    
    //  var item_count = JSON.parse(localStorage.getItem('item_count'));
    //  var bag = document.getElementById('bag');
    //  if(item_count){
    //     bag.innerHTML = `<i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(${item_count})`;
    //    }
      
    //  alert(item_count); 
    // codeigniter3
    // https://stackoverflow.com/questions/28946105/how-to-create-dynamic-navigation-menu-select-from-database-using-codeigniter

    var user_uuid_for_cart = document.getElementById('user_uuid');
    // var user_uuid_for_cart = '</?= $this->session->userdata('userLoginData');  ?>';
  $(document).ready(function() { 
    console.log('id:',user_uuid_for_cart.value);
    //var item_count = "</?= ($userLoginData); ?>";
    // console.log('s',item_count);
    if(user_uuid_for_cart != 'undefined'){
    
    $.ajax({
            url:'<?= base_url('EStore/EStore_Controller/count_cart_items_ajax');  ?>',
            type: 'POST',
            data:{                              
                user_uuid:user_uuid_for_cart.value,                
            },
            success:function(data, textStatus, jqXHR){              
              var jsonData = JSON.parse(data);              
              // console.log(jsonData[0]['COUNT(product_quantity)']);  
              document.getElementById('cart_value').innerHTML = jsonData[0]['COUNT(product_quantity)'];
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                console.log(textStatus);   
            }
        });        
      }else{
        document.getElementById('cart_value').innerHTML = 'log';
      }        
  });

//  $(function() { console.log('bb') });

</script>
    
  </body>
    </html>