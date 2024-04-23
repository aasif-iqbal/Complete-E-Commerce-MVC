<!doctype html>
<html lang="en">
  <head>
    
    <style>
        .filter{
            height: auto;
            min-height: 100vh;
            /* max-width: 40vw; */
            overflow:auto;           
        }
         .list-group{
            font-size: small;
        }
        .products{
            height: auto;
            min-height: 100vh;
            /* max-width: 60vw; */
            overflow:auto;
        }
        #categories{                
            font-weight: 700;
            text-transform: uppercase;
            font-size: 14px;
            margin: 10px 0 2px;
            clear: both;
            color: #282c3f;
            display: block;
            padding-left: 2px;
      }
      .list-group-item {   
            padding: 0.1rem 1.25rem !important;    
      }
      #loader{ 
      /* width: 00px;
      height: 00px;  */
      /* position: absolute;
      top:25%;
      bottom: 0;
      left: 40%;
      right: 0;
      margin: auto; */
     }  
     /* #showList{
      display:flex!important;
      direction: row !important;
     } */
     .col-md-3f{
      width: 22% !important;
     }
     @media screen and (max-width:768px){
    .col-md-3{
      width: 120% !important;
   }
}
#mrp{
  text-decoration: line-through;
}
#NotFound{
  padding:30% 30% 40% 35%;
  font-size:250%;
}
/* Product card */
.card {
    background: #fff;
    box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
    transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
    border: 0;
    border-radius: 1rem;
}

.card-img,
.card-img-top {
    border-top-left-radius: calc(1rem - 1px);
    border-top-right-radius: calc(1rem - 1px);
}
.card-img-top {
    width: 100%;     
    /* object-fit: contain; */
    /* padding: 30px; */
}
.card:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
}
/* pagination */
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #E50010;
    border-color: #E50010;
}
.page-link{
  color: #E50010;
}
.page-link:hover{
  color: #E50010;
}
    </style>
      <title>FifthObject</title>
  </head>
  <body>
<!-- nav Bar -->
 

<!-- <//?php  print_r($brand_name); ?> -->
    <div class="container-fluid">
    <span class='ml-4' style='font-size:10px'>Product Images are downloaded from <a href='https://www2.hm.com/en_in/index.html'>h&m</a> website for only demo purpose.</span>
        <div class="row">
            <div class="col-md-2 border border-left-0 border-top-0 border-bottom-0">
                <!-- <div class="border border-primary filter"> -->
                <!-- <a class="btn btn-outline-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                Filter
                </a> -->
                <!-- --------------------------- offcanvas ------------------- -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="filter">
                    
                    <span class="pl-2"><strong>Filter</strong></span>
                    <a class="float-right alert-link text-decoration-none pr-2" href="">Clear All</a>
                      
                      <div class="mx-2"><hr></div>
                    <!-- Price -->
                    <div id="categories">PRICE</div>
                    <form name="priceForm" id="priceForm">
                    <ul class="list-group">
                       
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="" value="1">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 199 to Rs. 599                                
                                </label>                              
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 599 to Rs. 999                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="3">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 999 to Rs. 1999                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="4">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 1999 to Rs. 2999                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="price" id="" value="5">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rs. 2999 to Rs. 5999
                                </label>
                              </div>
                        </li>
                      </ul>
                      </form>
                      <div class="mx-2"><hr></div>
                      <!-- Color -->
                      <div id="categories">COLOR</div>
                      <form id="colorForm" name="colorForm">
                      <ul class="list-group">
                      <?php 
                    if(!empty($color_name)){
                      foreach($color_name as $row): ?>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="color_name" id="<?php echo $row['color_id']; ?>" value="<?php echo $row['color_id']; ?>">
                                <label class="form-check-label" for="exampleRadios2">
                                <?php echo $row['color_name']; ?>
                                </label>
                              </div>
                        </li>
                        <?php endforeach;} ?>
                      </ul>
                      </form>

                         <!-- SIZE 
                      <div id="categories">SIZE</div>
                      <ul class="list-group">
                      </?php foreach($size as $row): ?>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="</?php echo $row['size_id']; ?>" value="</?php echo $row['size_id']; ?>">
                                <label class="form-check-label" for="exampleRadios2">
                                </?php echo $row['size_name']; ?>
                                </label>
                              </div>
                        </li>
                        </?php endforeach; ?>
                      </ul>
                      -->
                      <div class="mx-2"><hr></div>
                      <!-- Discount -->
                    <div id="categories">DISCOUNT RANGE</div>
                    <form id="discountForm" name="discountForm">
                    <ul class="list-group">
                       
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="discount" id="" value="1">
                                <label class="form-check-label" for="exampleRadios2">
                                   20% and above                                
                                </label>                              
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                30% and above                                   
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="3">
                                <label class="form-check-label" for="exampleRadios2">
                                50% and above                                     
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="4">
                                <label class="form-check-label" for="exampleRadios2">
                                60% and above                                
                                </label>
                              </div>
                        </li>
                        <li class="list-group-item border-0">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="discount" id="" value="5">
                                <label class="form-check-label" for="exampleRadios2">
                                70% and above      
                                </label>
                              </div>
                        </li>
                      </ul>
                      </form>

                   </div>
            </div>
  </div><!---offcanvas-body--->
</div>



              

<!----------------------------------- Main Body ---------------------------------->

            <div class="col-md-12">
            
                <!-- <div class="border border-success products"> -->
                  <div class="border border-0 products">
                  
                  <div class="container-fluid bg-trasparent" style="position: relative">
                  <!-- </?php echo($category_slug); ?> -->
                  <!-- <input type="hidden" id="cat_slug" name="product_uuid" value="</?= ($category_slug); ?>"> -->
                  <input type="hidden" id="child_cat_id" name="child_cat_id" value="<?= ($child_cat_id); ?>">
                  
                  
                        
                  <!-- For per Page Options -->
                  <!-- <div style="float: right; padding:10px;" id="perPageOption"></div> -->
                  
                  <!-- After Ajax call ,return by filter -->
                   
                    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3" id="showList"></div>
                   
                    <!-- Image loader -->
                      <div id='loader' style='display: block;'>
                        <!-- <img src='</?php echo base_url('assets/img/loading-gif.gif'); ?>' width='20%' height='25%'> -->
                        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

                         <?php for ($i=0; $i < 12 ; $i++) { ?>
                                                   
                          <div class="col my-2">
                            <div class="card h-100" aria-hidden="true">
                              <img src="<?= base_url('assets/img/img_placeholder.png');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title placeholder-glow">
                                <span class="placeholder col-10 "></span>
                              </h5>
                              <p class="card-text placeholder-glow">
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-4"></span>      
                              </p>    
                            </div>
                          </div>
                          </div>
                        <?php } ?>
                        </div>
                      </div>

                      <!-- loader -->
                      <div id="loading"></div>
                      <hr>
                      <span id="pageNum"></span>
                      <!-- For Page Page Link -->                      
                      <div id ="pglink" style="padding-left:46%;"></div>
                    </div> <!-- Container -->
                </div>
                
            </div><!--col-md-10-->
            <!-------------------------- Main Body End -------------------------->
        </div><!--row-->
    </div>

  
  </body>
  <!------------------------------------ script --------------------------------------------->

<script>
 function clearRadioButtons(){
  var ele = document.querySelectorAll("input[type=radio]");
   for(var i=0;i<ele.length;i++){
      ele[i].checked = false;
   }
}

$(document).ready(function(){

  
  var color_id = 0;
  var price_id = 0;
  var discount_id = 0;
  
  showProduct(1, color_id,  price_id, discount_id);
  
 //  alert(brand_id)
/*  
  console.log("color_id",color_id)
  console.log("price_id",price_id)
  console.log("discount_id", discount_id)

  showProduct(1, color_id,  price_id, discount_id);
 

//Get Checkbox value - Color
document.colorForm.onclick = function(){
    var color_flag = document.colorForm.color_name.value;
    
    let brand_flag = getCookie("brand_flag");
    let price_flag = getCookie("price_flag");
    let discount_flag = getCookie("discount_flag");

    showProduct(1,brand_flag,color_flag,price_flag,discount_flag);

    console.log(color_flag);
}

//Get Checkbox value - Price
document.priceForm.onclick = function(){
    var price_flag = document.priceForm.price.value;
    
    let brand_flag = getCookie("brand_flag");
    let color_flag = getCookie("color_flag");
    let discount_flag = getCookie("discount_flag");

    showProduct(1, brand_flag, color_flag, price_flag,discount_flag);

   console.log(price_flag);
}

//Get Checkbox value - Discount
document.discountForm.onclick = function(){
    var discount_flag = document.discountForm.discount.value;

    let brand_flag = getCookie("brand_flag");
    let color_flag = getCookie("color_flag");
    let price_flag = getCookie("price_flag");

    showProduct(1,brand_flag,color_flag,price_flag,discount_flag);
    console.log(discount_flag);
}
*/

});


function showProduct(pgNum, color_flag, price_flag, discount_flag)
{
  setCookie("selectedPage", pgNum, 1);        //1-Day expire
  setCookie("color_flag", color_flag, 1);
  setCookie("price_flag", price_flag, 1);
  setCookie("discount_flag", discount_flag, 1);
  
  //var cat_slug = document.getElementById('cat_slug').value;
  
  var child_cat_id = document.getElementById('child_cat_id').value;
  
  console.log(child_cat_id);


  let perPg = $('#perPage').find(":selected").val();
     
    if(perPg === undefined){
        perPg = 12;
    }

  $.ajax({
            url: "<?= base_url('EStore/EStore_Controller/product_filter_ajax'); ?>",
            type: 'POST',
            timeout: 1000000,
            data: {
                child_cat_id:child_cat_id,            
                color_flag:color_flag,
                price_flag:price_flag,
                discount_flag:discount_flag,
                pgNum:pgNum,
                perPg:perPg
                // searchText:searchText
            },
            beforeSend: function(){
              // Show image container
              $("#loader").show();                   
              $("#showList").hide();               
            },
            complete:function(data){
              // Hide image container
              $("#loader").hide();
              $("#showList").show();                  
            },
            success: function(data, textStatus, jqXHR) {
                // console.log(data); 
                var jsonData = JSON.parse(data);  
                console.log("JsonData::",jsonData); 

                $('#pglink').html(jsonData['pageLink']);
                $('#perPageOption').html(jsonData['perPageOptions']);

                   
                   let currentUrl = window.location.href;
                   newCurrentUrl = currentUrl.substr(0,currentUrl.lastIndexOf('/'));
                   newCurrent_Url = newCurrentUrl.substr(0,newCurrentUrl.lastIndexOf('/'));
                   
                   console.log(newCurrent_Url);

                      if(jsonData.tableData != null || jsonData.tableData != undefined){
                         var data_len = jsonData.tableData.length;   
                       //  console.log(data_len)                     
                      }

                      // console.log(jsonData.pagination_link);
                    var htmlTemp = "";
                    var pageNum = '';

                    if(data_len != null){
                    
                    for (var i = 0; i < data_len; i++){ 
                      htmlTemp += `<div class='col'>`;     
                      htmlTemp += `<div class="card h-100 shadow-sm">`;
                      htmlTemp += `<div class="card-img-overlay d-flex justify-content-end">
                                    <a href="#" class="card-link text-danger like">
                                      <i class="fa fa-heart-o"></i>
                                    </a>
                                  </div>`;
                                htmlTemp += `<a href='<?= base_url('product/${jsonData.tableData[i].product_uuid}') ?>' onclick='getProduct(this)' class="stretched-link"></a>`;		  
                                htmlTemp += `<img class="card-img-top"  src="${newCurrent_Url}/uploads/${jsonData.tableData[i].product_main_image}" width="350px" height="450px" />`;		  
                                htmlTemp += `<div class="card-body">`;
                                htmlTemp += `<h6 class="card-title text-dark fw-normal"><small>${jsonData.tableData[i].product_name}</small></h6>`;                                    
                                htmlTemp += `<div class="price">
                                <span class="mt-2 text-dark"><small>Rs. ${jsonData.tableData[i].product_selling_price}</span></small> &nbsp;
                                <span class="mt-2 text-secondary" id="mrp"><small>Rs. ${jsonData.tableData[i].product_mrp}</small></span>`; 
                        htmlTemp +=  `</div>                                                 
                        </div>
                      </div>
                    </div>`;                       
                    }
                    
                    /*
                    For Showing Discount
                     &nbsp;
                                <span class="mt-2 text-danger"><small>(${jsonData.tableData[i].discount_percentage}%OFF)</small></span>
                    */ 
                    pageNum += `<span class="mt-2 text-muted"><small>Page ${jsonData.currentPg} of ${jsonData.totalRow}<small></span>`;
                  // document.getElementById('showList').innerHTML = htmlTemp;
                   $('#showList').html(htmlTemp);
                   $('#pageNum').html(pageNum);
                  }else{                                        
                    $('#pglink').hide();
                    $('#pageNum').hide();
                    document.getElementById('showList').innerHTML = "<div id='NotFound'>No Data Found</div>";                    
                  }

                },//success-ends
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log(XMLHttpRequest);
                    console.log(errorThrown);
                }
            })
}

function getProduct(obj){
  // alert(obj)
}
// -------------------------  Cookie setup  -------------------

function setCookie(cname, cvalue, exdays) {
                const d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                let expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }
function getCookie(cname){
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
                }
function deleteCookie(cname) {
                    document.cookie = cname+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }

</script>

</html>