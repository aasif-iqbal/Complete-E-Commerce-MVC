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
    <div class='container'>
        <div class="col-md-12">
        <div class="h1 text-dark" style='text-align: center;'>Shopping bag</div>
        <div class="row">
            <!-- dynamic -->
            <div class='col-md-8 col-lg-8 col-sm-6' id="myData"></div>
            <!-- dynamic -->
            <div class='col-md-4 col-lg-4 col-sm-6' id="total_price"></div>
        </div>
        </div>
    </div>
    <?php 
    // $userLoginData = isset($this->session->userdata('userLoginData'));
    
    // echo('<pre/>');
    // print_r($cart_items);
    ?>
    <script>
        var cart_items = JSON.parse(localStorage.getItem('cart_item_list'));
        
        console.log("cart_items",cart_items);

        if(cart_items){

            var output = document.getElementById('myData');
            var total_price = document.getElementById('total_price');
            
            var local_st_value = JSON.stringify(cart_items)
            
            // output.innerHTML = local_st_value;
        
            // console.log((local_st_value));
            var url = window.location.href;
            //dynamic fetch current url
            url = url.slice(0,24) //return http://localhost:83/salt/
            let current_url = 'http://localhost:83/salt/';
            // let production_url = 'https://fifthobject.com/';
        const data = JSON.parse(local_st_value);
        console.log((data));
//--------------------------------------------------------------------------------------
        var  item_count = Object.keys(cart_items).length;
        // console.log(item_count);
        localStorage.setItem('item_count', item_count);
//---------------------------------------------------------------------------------------
        
        var total_product_sum = 0.0;


        data.forEach((item) => {        
    
    let id = item.id;

    //  console.log("items",id);
        output.innerHTML += `<div class="card mb-3" style="">
                <div class="row g-0">
                    <div class="col-md-2">
                    <img src="${url}/uploads/${item.product_image}" class="img-fluid" height=""  width="">
                    </div>
                    <div class="col-md-10">
                    <div class="card-body">
                    <div class='row'>
                        <div class='col-9'>
                            <h5 class="card-title">${item.product_name}</h5>
                        </div>
                        <div class='col'>
                        <div class='float-right'>
                            <button id='${item.id}' class='cart-btn' onclick='remove(${item.id})'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg></button>
                        </div>
                        </div>
                    </div>
                        <div class='row'>
                            <div class='col'>
                            <p class="card-text">Price:Rs.${item.product_selling_price}</p>
                            </div>
                            <div class='col'>
                            <p class="card-text">Size:${item.product_size}</p>
                            </div>
                            <div class='col'>
                            <p class="card-text">Color:${item.product_color_name}</p>
                            </div>
                        </div>
                        
                        <p class="card-text"><small class="text-muted">
                        
                        <div class="d-inline"><button class='cart-btn' id='plus' value='${id}' onclick='minus("${id}")'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash" viewBox="0 0 16 16">
  <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></button></div>
                        <span class="d-inline card-text"> ${item.product_quantity} </span>
                        <div class="d-inline"><button class='cart-btn' id='plus' value='${id}' 
                        onclick='plus("${id}")'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></button></div>

                        </small></p>
                    </div>
                    </div>
                </div>
        </div>`; 
        
        var item_count = JSON.parse(localStorage.getItem('item_count'));
        total_product_sum = Number(item.product_selling_price) + Number(total_product_sum);   
        // total_product_sum = (total_product_sum * item_count);
        }); 
        
        total_price.innerHTML +=`<div class="card mt-2" style="">
        <div class='card-body'>
        <p class='text-dark'><small>Log in to use your personal offers!</small></p>
        <a href="<?= base_url('login');?>" class="btn btn-block btn-outline-dark py-2">Log in</a>
        <hr>
        </div>
            <div class="card-body text-dark">
                <h5 class="card-title">Order Summery</h5>
                <div class='row'>
                    <p class="card-text col">Item:</p>
                    <p class="card-text col">${item_count}</p>
                </div>
                <div class='row'>
                    <p class="card-text col">Amount:</p>
                    <p class="card-text col">${total_product_sum}</p>
                </div>
                <a href="<?= base_url('login');?>" class="btn btn-block btn-dark pt-2">Continue to checkout</a>
            </div>
        </div>`;    
    
        }
        // Checkout->login->(if_new)->registation (For Non-Login User)
    
    function remove(id){
        
        let itemArray = JSON.parse(localStorage.getItem('cart_item_list')) || [];
        let index = itemArray.findIndex(item => item.id === id.id); // Assuming id is the unique identifier property of the object
        // console.log(index);        
        itemArray.splice(index, 1);  //remove selected indexed item      
        // console.log(itemArray);                
        localStorage.setItem('cart_item_list', JSON.stringify(itemArray));
        window.location.reload();
    }    

    function plus(id){
        
        //1. fetch
        let itemArray = JSON.parse(localStorage.getItem('cart_item_list')) || [];
        // let index = itemArray.findIndex(item => item.id === id.id);  
        itemArray.forEach(array_elem => {
                   if(id === array_elem.id){
                    array_elem.product_quantity = Number(array_elem.product_quantity) + 1;
                    item_count = item_count + array_elem.product_quantity;                    
                    
                    // var item_count = JSON.parse(localStorage.getItem('item_count'));

                    localStorage.setItem('item_count', item_count);
                   }          
                   
        localStorage.setItem('cart_item_list', JSON.stringify(itemArray));
        }); 
        console.log(item_count);
        console.log(itemArray);       
        window.location.reload();
        // setItemCount();    
    }

    function minus(id){
        // console.log(id);
        let itemArray = JSON.parse(localStorage.getItem('cart_item_list')) || [];
        
        itemArray.forEach(array_elem => {
            
                   if(id === array_elem.id){
                        if(array_elem.product_quantity > 1){
                            
                        array_elem.product_quantity = Number(array_elem.product_quantity) - 1;
                        item_count = Math.abs(array_elem.product_quantity - item_count);
                        localStorage.setItem('item_count', item_count);
                    }
                    else{                        
                        console.log('check');
                        // array_elem.product_quantity = 1;
                    }
            }                             
            localStorage.setItem('cart_item_list', JSON.stringify(itemArray));
        }); 
        console.log(item_count);
        console.log(itemArray); 
        window.location.reload(); 
        // setItemCount();        
    }
//Self-invoke function     
(function () {
    let empty_cart = JSON.parse(localStorage.getItem('cart_item_list')) || [];
    
        if(empty_cart.length === 0){
            let shopping_bag_template = '';
            shopping_bag_template += `<div class='card border-0 h-100 mb-5 py-5 text-dark' style='background-color:rgba(0,0,0,0.02)'>
                                        <div class='h2 mt-3 ml-3'>Your Shopping Bag is empty!</div>
                                        <div class='mt-3 ml-3'><small>Sign in to save or access already saved items in your shopping bag.</small></div>
                                        <div class='mt-3 ml-3'><u><a href='<?= base_url('login');?>' class='text-dark'>Sign in</a></u></div>
                                </div>`;
            output.innerHTML = shopping_bag_template;
        }else{
            console.log(empty_cart.length); // cart length
        }    
})();


//================================ bag item count ======================================
/*
function setItemCount(){
        var item_count = JSON.parse(localStorage.getItem('item_count'));
        console.log(item_count);
        var bag = document.getElementById('bag');
        if(item_count){
            bag.innerHTML = `<i class="fa-solid fa-bag-shopping"></i>&nbsp;Bag(${item_count})`;
        }else{
            bag.style.display = "none";
        }
    }
    setItemCount();
    */
//=============================== bag item count end ===================================
    </script>
</body>
</html>