<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FifthObject</title>
    <style>
        .cart-btn{
            border:0px;
        }
    </style>
</head>
<body>
    <!-- <h2>cart from db </h2> -->
    <!-- </?php echo("<pre>"); ?> -->
     <!-- </?php print_r($cart_items); ?> -->
    <div class="container">
        <div class="h1 mt-3 mb-3 text-dark" style='text-align: center;'>
            Shopping - Bag
        </div>
                
        <div class="row">
            <!-- col-md-8 -->
            <div class='col-md-8'>
                <?php         
                $total = 0;
                $total_quantity_inCart = 0;

                if(isset($cart_items)){
                    foreach($cart_items as $item):
                        // echo("<pre/>");print_r($item);
                ?>
                <div class="card mb-3 text-dark" style="">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= base_url('uploads/'.$item->product_image); ?>" class="img-fluid" alt="..." height=""  width="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <!-- hidden tags -->
                                <input type="hidden" id="user_uuid" value="<?= isset($item->user_uuid)?($item->user_uuid):'None'; ?>" />
                                                                                    
                                <input type="hidden" id="product_count" value="<?= isset($item->item_count)?($item->item_count):'0'; ?>" />

                                <!-- hidden tags ends -->
                                <h5 class="card-title"><?= $item->product_name; ?></h5>
                                <p class="card-text">
                                    Rs.<?= ($item->product_selling_price * $item->item_count); ?>&nbsp;|
                                    &nbsp;Size:<?= $item->product_size_name; ?>&nbsp;| &nbsp;Color:<?= $item->product_color_name; ?>
                                </p>
                                <!-- <span class="card-text"> id: </?= $item->product_uuid; ?></span> -->
                                <p class="card-text">
                                <small class="text-muted">
                            
                                    <div class="d-inline">
                                        <button class='cart-btn' id='decrement_item' value='<?= $item->product_uuid.'_'.$item->variation_uuid; ?>'
                                        onclick='decrement_item(this.value)'>-</button>
                                    </div>
                                    <span class="d-inline card-text">
                                        <?= $item->item_count; ?>
                                    </span>
                                    <div class="d-inline">
                                        <button class='cart-btn' id='increment_item' value='<?= $item->product_uuid.'_'.$item->variation_uuid; ?>' onclick='increment_item(this.value)'>+</button>
                                    </div>
                                    <button class='cart-btn' id='remove_item' value='<?= $item->product_uuid.'_'.$item->variation_uuid; ?>' onclick='remove_item(this.value)'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"      height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                        </svg>
                                    </button>
                                </small>
                                <span id='msg'></span>
                                </p>
                        </div><!--end card-body-->
                        
                    </div><!--col-8 body -->

                    </div><!--row-->
                </div>
                <?php
                //total price in cart/bag
                $subtotal = $item->item_count * $item->product_selling_price;
                $total += $subtotal;

    
    // set session to maintain cart value OR WE CAN DIRECT ACCESS $total_quantity_inCart
                $total_quantity_inCart += $item->item_count;
                
                $cart_value = $this->session->set_userdata('cart_value', $total_quantity_inCart);
                //  print_r($total_quantity_inCart);
                //  print_r($total);
                endforeach;
                
                } else { ?>
                <!-- WHEN NO PRODUCT IN CART -->
                <div class="border-0 mb-5 text-dark py-5" style='background-color:rgba(0,0,0,0.02)'>
                    <div class='h2 pt-3 pl-3'>Your Shopping Bag is empty!</div>
                    <!-- <div class='mt-3 ml-3'><small>Sign in to save or access already saved items in your shopping bag.</small></div> -->
                    <div class='mt-3 ml-3'><u><a href='<?= base_url('/');?>' class='text-dark'>Continue to shopping</a></u></div>        
                </div>
            <?php } ?>                
        </div>
        <!-- end - col-md-8 -->
        <!-- col-md-4 -->
        <div class='col-md-4'>
                <div class="card" style="">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Order Summery</h5>              
                        <hr>          
                        <?php 
                        $userLoginData = $this->session->userdata('userLoginData'); 
                        
                        if(isset($userLoginData['user_uuid'])){
                        
                        if(isset($cart_items)){
                            
                        ?> 
                        <p>
                            <div class="row">
                                <div class="col">
                                    <span class="fw-bold">Item Quantity:<span>
                                    </div>    
                                <div class="col">
                                <?=  $total_quantity_inCart; ?>
                                </div>    
                            </div>                                                        
                        </p>
                                
                        <?php 
                            // print_f($val);
                        }else{?>
                        <p>
                            <div class="row">
                                <div class="col">
                                    <span class="fw-bold">Item Quantity:<span>
                                    </div>    
                                <div class="col">
                                0
                                </div>    
                            </div>                                                        
                        </p>
                        <?php } ?>
                        <hr>
                        <p class="card-text">
                        <div class="row">
                            <div class="col"><span class="fw-bold">Order value :</div>
                            <div class="col">Rs.&nbsp;<?= $total; ?></div>
                        </div>
                        </p>
                        
                        <!-- if user login, Then redirect to payment pg -->
                            <a href="<?= base_url('shipping');?>" class="btn btn-dark">Continue To Checkout</a>
                            <a href="<?= base_url('/');?>" class="btn btn-dark float-right">Continue To Payment</a>
                        <?php } else { ?>                                                
                        <!-- if user Not login, Then redirect to login pg -->
                        <a href="<?= base_url('login');?>" class="btn btn-primary">Checkout</a>
                        <?php  } ?>
                    </div><!-- end card body -->
                </div><!--end card-->
            </div><!--end-col-md-4-->                  

        </div><!-- end row-->

    </div><!-- end container -->
</body>
<script>
    /*
        - if user add item to cart without login then he/she will get localStorage_id
        - if user login,then add item to cart then he/she will get user_uuid(from session)
    */
    
    // var product_uuid     = document.getElementById('product_uuid');
    // var user_uuid        = document.getElementById('user_uuid');
    // var product_count    = document.getElementById('product_count');
    
function increment_item(product_uuid_variation_uuid){
    
    // let alert(product_uuid_variation_uuid);
    let user_uuid = document.getElementById('user_uuid');
    let value_uuid =   product_uuid_variation_uuid.split("_");
    const product_uuid = value_uuid[0];
    const variation_uuid = value_uuid[1];

    let product_info_to_increment = {
        // item_local_id:item_local_id,
        productUUID : product_uuid,
        userUUID : user_uuid.value,
        variationUUID : variation_uuid
    }

    // console.log('product_inc',product_info_to_increment);

    $.ajax({
        url:'<?= base_url('EStore/EStore_Controller/increment_item_from_cart_ajax');  ?>',
        type: 'POST',
            data: product_info_to_increment,
            success:function(data, textStatus, jqXHR){              
              var jsonData = JSON.parse(data);              
              
              console.log('data_value::',jsonData);
              
              if(jsonData === 'Product not in db'){
                document.getElementById('msg').innerHTML = jsonData;
              }else{
                location.reload();              
              }              
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                console.log(textStatus);   
            }
        });        
}

function decrement_item(product_uuid_variation_uuid){
    // alert(product_uuid_variation_uuid);     
    let user_uuid = document.getElementById('user_uuid');
    let value_uuid =   product_uuid_variation_uuid.split("_");
    const product_uuid = value_uuid[0];
    const variation_uuid = value_uuid[1];

    let product_info_to_decrement = {
        // item_local_id:item_local_id,
        productUUID : product_uuid,
        userUUID : user_uuid.value,
        variationUUID : variation_uuid
    }        
    // console.log('product_dec',product_info_to_decrement);
    $.ajax({
        url:'<?= base_url('EStore/EStore_Controller/decrement_item_from_cart_ajax'); ?>',
            type:'POST',
            data:product_info_to_decrement,
            success:function(data, textStatus, jqXHR){              
              var jsonData = JSON.parse(data);                            
              location.reload();             
              console.log(jsonData);  
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                console.log(textStatus);   
            }
        });
}

function remove_item(product_uuid_variation_uuid){

    let user_uuid = document.getElementById('user_uuid');
    let value_uuid =   product_uuid_variation_uuid.split("_");
    const product_uuid = value_uuid[0];
    const variation_uuid = value_uuid[1];

    let product_info_to_delete = {
        // item_local_id:item_local_id,
        productUUID : product_uuid,
        userUUID : user_uuid.value,
        variationUUID : variation_uuid
    }        

    
    $.ajax({
            url:'<?= base_url('EStore/EStore_Controller/remove_item_from_cart_ajax');  ?>',
            type: 'POST',
            data:product_info_to_delete,
            success:function(data, textStatus, jqXHR){              
              var jsonData = JSON.parse(data);                            
              location.reload();   
              console.log(jsonData); 
            //   <//?php $this->session->unset_userdata('cart_value'); ?>            
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                console.log(textStatus);   
            }
        });
}
</script>
</html>