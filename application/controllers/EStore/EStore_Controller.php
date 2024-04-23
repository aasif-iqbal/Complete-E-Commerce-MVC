<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EStore_Controller extends CI_Controller {

	function __construct() {
        parent::__construct(); 
		
		$this->load->helper('url');
        $this->load->model('EStore_model');
	}


	public function index()
	{
		//Project is started with 'Welcome' controller
		// Goto-> application/controllers/Welcome.php
	}

	public function store()
	{
		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
		$this->load->view('eStore/libs');
		$this->load->view('eStore/nav', $data);
		$this->load->view('eStore/store.php', $data);
		$this->load->view('eStore/footer');		
	}

	public function contact_us()
	{
		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
		$this->load->view('eStore/libs');
		$this->load->view('eStore/nav',$data);
		$this->load->view('eStore/contact_us.php', $data);
		$this->load->view('eStore/footer');		
	}

	public function about_us()
	{
			$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
			
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav',$data);
			// $this->load->view('eStore/card_placeholder.php', $data);
			$this->load->view('eStore/about_us.php', $data);
			$this->load->view('eStore/footer');		
	}

	public function my_account()
	{
		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();

		$userLoginData = $this->session->userdata('userLoginData');
		
		if($userLoginData){
			$data['user_name'] = $userLoginData['user_name'];
		}

		if(!is_null($userLoginData)){
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav',$data);
			$this->load->view('eStore/my_account.php', $data);
			$this->load->view('eStore/footer');		
		}else{
			$this->load->view('eStore/restricted_page.php');
		}
	}

	public function showProductsMainCategories($parent_id ='')
	{
		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
		$data['main_category'] = $this->EStore_model->fetch_parent_categories($parent_id);
		
		$this->load->view('eStore/libs');
		$this->load->view('eStore/nav', $data);
		$this->load->view('eStore/main_category.php', $data);
		$this->load->view('eStore/footer');		
	}

	// public function showProductsByCategories($category_slug='')
	public function showProductsByCategories($child_id=null)
	{
		// echo('here'); 
		$data['item_count'] = $this->session->userdata('item_count');			
		// var_dump($child_id);die();
		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
		// $data['category_slug'] = $category_slug;
		$data['child_cat_id'] = $child_id;

		$this->load->view('eStore/libs');
		$this->load->view('eStore/nav', $data);
		$this->load->view('eStore/product_filter.php', $data);
		$this->load->view('eStore/footer');		
	}

//============================  User Login & Registration ============================
	public function showUserRegistration()
	{
		/* 
			1. Collect user data ie name,phone number,address (user form)
			2. Insert all, also generate uuid() for single user in Reg_table and not in login_table
			3. Fetch uuid,phone_no from  Reg_table of last_inserted_data;
			4. update login_table set uuid where phone_no, = $phone_no;

			get last_inserted_id: $mysqli->insert_id;
		*/
		
		$this->load->view('eStore/libs');
		$this->load->view('eStore/register');
	}

	public function showUserLogin()
	{
		$this->load->view('eStore/libs');		
		$this->load->view('eStore/login');		
	}

	public function checkForLogin(){
		// From localstorage
		$cartItems = $this->input->post('cartItems');
		
		$login_data['phone_no'] = $this->input->post('chk_phone_no');
		$login_data['password'] = $this->input->post('chk_password');
		
		if(isset($login_data) && !empty($login_data)){

			$isValid = $this->EStore_model->fetchLoginDetails($login_data);
			// var_dump($cartItems);
			// var_dump($isValid);die();
			if($isValid != NUll && $login_data['phone_no'] === $isValid['phone_no'] 
				&& $login_data['password'] === $isValid['password']){
					
					if($isValid['is_active'] === '1'){

						$userLoginData = $isValid;
						//Set userdata into session
						$this->session->set_userdata('userLoginData', $userLoginData);
																		
						// var_dump($userLoginData);
						$this->load->view('eStore/libs');	
						// $this->load->view('eStore/checkout', $userLoginData);

						// if user is login then save to localsession(cart items) to tbl_cart
						// and remove cart items after user is successfully login
						$this->EStore_model->saveLocalStorageCartItemsAfterLogin($cartItems, $userLoginData);

						redirect(base_url('/')); 
					}else{
						$err['msg'] = 'Inactive Username';
						$this->load->view('eStore/libs');	
						$this->load->view('eStore/login', $err);
					}
				}else{
					echo("Worng Username or Password");
					$err['msg'] = 'Worng Username or Password';
					$this->load->view('eStore/libs');	
					$this->load->view('eStore/login',$err);
				}
			}		
	}
	// send localstorage data to controller in codeigniter
	public function checkForLogin_ajax(){

	}

	public function search()
	{	
		$this->load->view('eStore/libs');	
		$this->load->view('eStore/search');
	}

	public function submitRegistration(){
		
		$data['user_name'] 			= $this->input->post('user_name');
		$data['email'] 				= $this->input->post('email');
		$data['phone_no'] 			= $this->input->post('phone_no');
		$data['password'] 			= $this->input->post('password_val');
		$data['receivers_phone_no'] = $this->input->post('receivers_phone_no');
		$data['addr_house_no'] 		= $this->input->post('addr_house_no');
		$data['addr_locality'] 		= $this->input->post('addr_locality');
		$data['addr_city'] 			= $this->input->post('addr_city');
		$data['addr_pin_code'] 		= $this->input->post('addr_pin_code');
		$data['addr_state'] 		= $this->input->post('addr_state');
		$data['addr_country'] 		= $this->input->post('addr_country');		
		$data['addr_type'] 			= $this->input->post('addr_type');

		//Login_table
		$data_login['phone_no'] = $data['phone_no'];
		$data_login['password'] = $data['password'];
		 
		$status = $this->EStore_model->saveRegistration($data, $data_login);
		if($status){

			redirect(base_url('login'));    
		}
		// var_dump($data);
	}

	public function logout(){
		//Unset session
		$this->session->unset_userdata('userLoginData');
		$this->session->unset_userdata('cart_value');
		
		// $this->load->view('eStore/libs');
		// $this->load->view('Welcome');
		redirect(base_url('/')); 
	}
//=========================== End User Login & Registration =======================
	
// ========================== Show Product Details ================================
	public function showProductDetails($product_uuid = NULL)
	{
		// print_r(current_url());
		// echo($product_uuid);
		
		$data['product_imgs'] = $this->EStore_model->fetchProductImages($product_uuid);

		$data['product_main'] = $this->EStore_model->fetchSingleProduct($product_uuid);
				
		//avilable_size_var (Price will same)
		$data['avilable_size_variation'] = $this->EStore_model->fetchAvilableSizeVariation($product_uuid);
		
		//Remove duplicate color from variation(Red-S,Red-M,Red-XLL => Red)
		$my_list = $this->EStore_model->fetchAvilableColorVariation($product_uuid);

		// $seen_color_ids = [];
		// $unique_objects = [];
		
		// foreach ($my_list as $obj) {
		// 	$color_id = $obj->color_id;
		// 	if (!isset($seen_color_ids[$color_id])) {
		// 		$seen_color_ids[$color_id] = true;
		// 		$unique_objects[] = $obj;
		// 	}
		// }
		
		// print_r($unique_objects);	

		$data['avilable_color_variation'] = $my_list;

		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();		
		
		$data['item_count'] = $this->session->userdata('item_count');			
		
		//Ratings and Reviews
		$data['rating_reviews'] = $this->EStore_model->fetch_reviews_rating_for_product($product_uuid);		
		
		$data['rateResult'] = $this->EStore_model->fetch_product_rating_number($product_uuid);

		$this->load->view('eStore/libs');
		$this->load->view('eStore/nav', $data);
		$this->load->view('eStore/product_details1', $data);
		$this->load->view('eStore/footer');
	}

	public function showDetailProductImages_ajax()
	{
		$product_uuid = $this->input->post('product_uuid');

		$data = $this->EStore_model->fetchProductImages($product_uuid);

		echo json_encode($data);
	}

	public function show_product_color_ajax(){
		
		$color_id = $this->input->post('color_id');
		$product_uuid = $this->input->post('product_uuid');

		$data = $this->EStore_model->fetch_product_color($product_uuid, $color_id);

		echo json_encode($data);
	}

	public function show_color_selected_by_dd_size_ajax()
	{
		$product_uuid = $this->input->post('product_uuid');
		$size_name = $this->input->post('size_name');

		$data = $this->EStore_model->fetchSelectedColorByDDSize($product_uuid, $size_name);

		echo json_encode($data);
	}

	public function show_product_image_by_color_ajax()
	{
		$product_uuid = $this->input->post('product_uuid');
		$color_id = $this->input->post('color_id');

		$data = $this->EStore_model->fetchProductImagesBySelectedColor($product_uuid, $color_id);

		echo json_encode($data);

	}
// ========================== End Show Product Details ===================================

// =================================== Add to Cart =======================================
	
public function checkProductQuantityAviability_Ajax()
{
	$mainProductUUID 	= $this->input->post('mainProductUUID');
	$productColorId 	= $this->input->post('productColorId');
	$productSizeUUID  	= $this->input->post('productSizeUUID');

	$productQuantityStatus = $this->EStore_model->checkProductStocksAviableInDB($mainProductUUID,$productColorId,$productSizeUUID);

	echo json_encode($productQuantityStatus);
}

//after checking product quantity, if product is avilable in db
public function add_to_cart_ajax()
	{		
	
		// let addProductToCart = {
		// 	loginUsersUUID:  user_uuid,    
		// 	productItemUUID: product_uuid,
		// 	productVariationUUID: product_variation_uuid,
		// 	productName:  product_name,
		// 	productImage: product_image,
		// 	productSizeUUID: product_size_uuid,
		// 	productSizeName: product_size_unit,
		// 	productColorID: product_color_id,
		// 	productColorName: product_color_name,
		// 	productMRP: product_mrp,
		// 	productSellingPrice: product_selling_price,
		// 	productDiscount: discount_percentage,
		// 	itemCount: 1,
		// 	totalQantityInStock:total_quantity_inStock
		//   }

		$data['user_uuid'] 	   = $this->input->post('loginUsersUUID');
		$data['product_uuid']  = $this->input->post('productItemUUID');
		$data['variation_uuid'] = $this->input->post('productVariationUUID');
		$data['product_name']  = $this->input->post('productName');				
		
		$data['product_image'] = $this->input->post('productImage');
		//for product_size and product_size_name		
		$data['product_size_id'] = $this->input->post('productSizeUUID');
		$data['product_size_name'] = $this->input->post('productSizeName');
		
		//for product_color and product_color_name
		$data['product_color_id'] = $this->input->post('productColorID');
		$data['product_color_name'] = $this->input->post('productColorName');		
		
		//price
		$data['product_mrp'] = $this->input->post('productMRP');
		$data['product_selling_price'] = $this->input->post('productSellingPrice');
		$data['product_discount'] = $this->input->post('productDiscount');
			
		$data['item_count'] = $this->input->post('itemCount');
		$data['total_quantity_inStock'] = $this->input->post('totalProductStockInDB');
		
		if($data['product_uuid']  && $data['user_uuid']){
		//send prod_uuid and user_uuid to db and check, if avilable then update,else insert
			//Also check for color and Size
			//same product have diff color and size, So it will not update 
			//same product have diff color and size, will inserted with new cart_id
			$product_status = $this->EStore_model->checkProductExistInCart(
								$data['product_uuid'], 
								$data['user_uuid'],
								$data['product_size_id'],
								$data['product_color_id']
							);	

			if($product_status == NULL)	{
				//insert new product
				// print_r('insert');die();
				$status = $this->EStore_model->saveCartDetails($data);
				$status = 'insert';
			}else{
				//update only when user_uuid,product_uuid,color_id,and size_id will same
				// print_r('update');die(); // update product_quantity
				$status = $this->EStore_model->updateCartDetails($data['product_uuid'], $data['user_uuid']);	
				$status = 'update';
			}
		}		
		//Update product when user add same product(product_uuid_same and user_uuid)
		// echo($item_count);		
		echo json_encode($status);
	}

	public function myCart()
	{
		$data['item_count'] = $this->session->userdata('item_count');			

		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
		
		//for login user
		$session_user_data = $this->session->userdata('userLoginData');
		
		if(isset($session_user_data)){
			//for login user
			$user_uuid = $session_user_data['user_uuid'];
			if(isset($user_uuid)){
				$data['cart_items'] = $this->EStore_model->fetch_cart_items_by_user($user_uuid);
			}
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav', $data);
			$this->load->view('eStore/my_cart_db.php', $data);			
			$this->load->view('eStore/footer');

		}else{
			//Data  from localstorage
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav', $data);
			$this->load->view('eStore/my_cart.php', $data);
			$this->load->view('eStore/footer');
		}						
	}

	// remove item from cart - From Database
	public function remove_item_from_cart_ajax(){
		/*
		case - if user is login then we have to use user_uuid and product_uuid
		case - if user is login and add item to card then localStorage_id will return NULL
		case - if user is Not-Login then we have to use localStorage_id and product_uuid		
		*/
		// $item_local_id = $this->input->post('item_local_id');

		$productUUID 	  = $this->input->post('productUUID');
		$userUUID 	  	  = $this->input->post('userUUID');
		$variationUUID 	  = $this->input->post('variationUUID');

		$status = $this->EStore_model->removeItemFromCart($productUUID, $userUUID, $variationUUID, $item_local_id=NULL);
				
		echo json_encode($status);
	}

	public function increment_item_from_cart_ajax(){
		/*
		case - if user is login then we have to use user_uuid and product_uuid
		case - if user is login and add item to card then localStorage_id will return NULL
		case - if user is Not-Login then we have to use localStorage_id and product_uuid		
		*/
		// $item_local_id 	  = $this->input->post('item_local_id');
		$productUUID 	  = $this->input->post('productUUID');
		$userUUID 	  	  = $this->input->post('userUUID');
		$variationUUID 	  = $this->input->post('variationUUID');
						
		$status = $this->EStore_model->incrementItemFromCart($productUUID, $userUUID, $variationUUID, $item_local_id=NULL);
		// var_dump($status);die();
		echo json_encode($status);
	}

	public function decrement_item_from_cart_ajax(){
		/*
		case - if user is login then we have to use user_uuid and product_uuid
		case - if user is login and add item to card then localStorage_id will return NULL
		case - if user is Not-Login then we have to use localStorage_id and product_uuid		
		*/

		// $item_local_id = $this->input->post('item_local_id');
		$productUUID 	  = $this->input->post('productUUID');
		$userUUID 	  	  = $this->input->post('userUUID');
		$variationUUID 	  = $this->input->post('variationUUID');
		
		$status = $this->EStore_model->decrementItemFromCart($productUUID, $userUUID, $variationUUID, $item_local_id=NULL);
		
		echo json_encode($status);
	}

	public function update_cart_value_ajax()
	{
		$user_uuid  = $this->input->post('updated_user_UUID');				

		$updateCartValue = $this->EStore_model->getUpdatedCartValue($user_uuid);		
		
		echo json_encode($updateCartValue);
	}

	public function count_cart_items_ajax()
	{		
		$user_uuid  = $this->input->post('user_uuid');
		// echo($user_uuid);
		$cart_item_count  = $this->EStore_model->countCartItems($user_uuid);
		echo json_encode($cart_item_count);
	}
//============================== End Add to Cart =======================================

// ================================= Shipping_details ======================================
/*------------------------ checkout-page(Shipping_details) -------------------- */
public function shippingDetails(){
	
	//nav cat- like Men, Women ...
	$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();

	$userLoginData = $this->session->userdata('userLoginData'); 


	$user_uuid = $userLoginData['user_uuid'] ? $userLoginData['user_uuid']: 'NULL--Login First';

	// customerInfo- name,phone,address for orders_table
	$data['customerInfo'] = $this->EStore_model->getSingleCustomerInfo($user_uuid);
	
	$data['customerCartItems'] = $this->EStore_model->fetch_cart_items_by_user($user_uuid);
	
	//For Json Data	to store in tbl_orders
	$data['customerCartItems_Json'] = $this->EStore_model->fetch_cart_items_by_user_json($user_uuid);

	$this->load->view('eStore/libs');
	$this->load->view('eStore/nav', $data);
	$this->load->view('eStore/shipping_details', $data);
	$this->load->view('eStore/footer');	
}

public function editCustomerAddress(){
	// $data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
	$userLoginData = $this->session->userdata('userLoginData'); 
	// print_r($userLoginData);
	$data['customerInfo'] = $this->EStore_model->getSingleCustomerInfo($userLoginData['user_uuid']);

	$this->load->view('eStore/libs');
	// $this->load->view('eStore/nav', $data);
	$this->load->view('eStore/edit_customer_address', $data);
	// $this->load->view('eStore/footer');	

}

public function submitEditedAddress(){

		$userLoginData = $this->session->userdata('userLoginData'); 	 	
		// $data['user_name'] = $this->input->post('user_name');		 
		// $data['phone_no'] = $this->input->post('phone_no');		 		
		$data['receivers_phone_no'] = $this->input->post('receivers_phone_no');
		$data['addr_house_no'] 		= $this->input->post('addr_house_no');
		$data['addr_locality'] 		= $this->input->post('addr_locality');
		$data['addr_city'] 			= $this->input->post('addr_city');
		$data['addr_pin_code'] 		= $this->input->post('addr_pin_code');
		// $data['addr_state'] = $this->input->post('addr_state');
		// $data['addr_country'] = $this->input->post('addr_country');		
		
		$data['addr_type'] 			= $this->input->post('addr_type');
		
		// print_r($data);die();
		$user_uuid = $userLoginData['user_uuid'];
		$updatedAddress = $this->EStore_model->updateEditedAddress($data, $user_uuid);
		
		if($updatedAddress){
			redirect(base_url('shipping')); 
		}else{
			echo('Not Edited');
		}

}

private function generateRandomNumber(){
	return mt_rand(100000,999999);
}

// ============== CASH ON DELIVERY AJAX CALL ========================
public function cashOnDelivery_ajax()
{
	$data['user_uuid'] = $this->input->post('customer_user_uuid');
	$data['productInfoJson'] = $this->input->post('product_info_json');	
	$data['customerCartItemsJson'] = $this->input->post('customer_cart_items_json');
	$data['total_quantity_inCart'] = $this->input->post('total_quantity_inCart');	
	$data['total_amount_to_pay'] = $this->input->post('total_amount_to_pay');
	
	// $cart_items_selectedByUser = json_decode($data['productInfo_json'], true);
	
	$customerCartItemsJson = json_decode($data['customerCartItemsJson'], true);
	$productInfoJson = json_decode($data['productInfoJson'], true);
	
// var_dump($productInfoJson);die();
	//  get all info of customer from tbl-registration	
	// buyer_details- name,phone,address for orders_table
	$customer_details = $this->EStore_model->getSingleCustomerInfo($data['user_uuid']);
	
	date_default_timezone_set('Asia/Kolkata'); // Set the timezone to India/New Delhi
	$currentDateTime = date('Y-m-d H:i:sa');
	

	foreach($customerCartItemsJson as $orderItems){
		$order_data['user_uuid'] = $orderItems['user_uuid'];
		$order_data['product_uuid'] = $orderItems['product_uuid'];
		$order_data['variation_uuid'] = $orderItems['variation_uuid'] ? $orderItems['variation_uuid'] : NULL;
		$order_data['product_name']      	 = $orderItems['product_name'];
		$order_data['product_image'] 		 = $orderItems['product_image'];
		$order_data['product_size_id'] 		 = $orderItems['product_size_id'];
		$order_data['product_size_name']     = $orderItems['product_size_name'];
		$order_data['product_color_id'] 	 = $orderItems['product_color_id'];
		$order_data['product_color_name']    = $orderItems['product_color_name'];
		$order_data['product_mrp'] 			 = $orderItems['product_mrp'];
		$order_data['product_selling_price'] = $orderItems['product_selling_price'];
		$order_data['product_discount'] = $orderItems['product_discount'];		 
		$order_data['product_quantity'] = $orderItems['item_count'];

		//----------- Customer details who buys product - start ------------------
		$order_data['user_name'] =  $customer_details[0]->user_name;
		$order_data['user_email'] = $customer_details[0]->email;
		$order_data['phone_no'] =   $customer_details[0]->phone_no;
		$order_data['receivers_phone_no'] = $customer_details[0]->receivers_phone_no;
		$order_data['addr_house_no'] = $customer_details[0]->addr_house_no;
		$order_data['addr_locality'] = $customer_details[0]->addr_locality;
		$order_data['addr_city'] = $customer_details[0]->addr_city;
		$order_data['addr_pin_code'] = $customer_details[0]->addr_pin_code ? $customer_details[0]->addr_pin_code : NULL;
		$order_data['addr_state'] = $customer_details[0]->addr_state;
		$order_data['addr_country'] = $customer_details[0]->addr_country;
		$order_data['addr_type'] = $customer_details[0]->addr_type;
		//----------- Customer details who buys product - end -------------------

		// Comming from POST-method
		$order_data['total_product_quantity'] = $data['total_quantity_inCart'];
		$order_data['total_amount']   = $data['total_amount_to_pay'];
		$order_data['productInfo_json'] = json_encode($productInfoJson);

		//-------------- Customer Payment Information COD - Mode ----------------
		$order_data['transaction_id'] = 'COD_offline'; //payment_id
		$order_data['transaction_status'] = 1; // 1 => COD
		$order_data['conformation_code'] = NULL;
		$order_data['payment_method'] = 'COD';		
		$order_data['transaction_datetime'] = $currentDateTime;
		$order_data['createdAt'] = $currentDateTime;
		$order_data['transaction_datetime'] = $currentDateTime;
		$order_data['status'] = 1;
		//-------------- Customer Payment Information COD - Mode -end --------------
		
		// if $order_data['order_return_status'] = 0,1,2,3
		// 0 => Return without shipping COD
		// 1 => Return without shipping Online Pay
		// 2 => Return & Refund After shipping COD
		// 3 => Return & Refund After shipping Online
		// 4 => NO RETURN

		// $order_data['updatedAt'] will update when product is return
		$order_data['order_return_status'] = 4;
		 		 
		//Save it to order tbl
		// $order_status = $this->EStore_model->saveOrderDetailsForCOD($order_data);		
	}
	
	/*
	foreach ($cart_items_selectedByUser as $item) {
		$data['user_uuid'] = $this->input->post('user_uuid');
		$data['transaction_datetime'] = date('Y-m-d H:i:s');
		$data['transaction_status'] = '1';
		$data['conformation_code'] = $this->generateRandomNumber();
		//Inserting into table orders - tbl_orders
		$status =  $this->EStore_model->saveCashOnDelivery($data);
	}
	

	// $data['user_uuid'] = $this->input->post('user_uuid');
	// $data['transaction_datetime'] = date('Y-m-d H:i:s');
	// $data['transaction_status'] = '1';
	// $data['conformation_code'] = $this->generateRandomNumber();		 

	// $status =  $this->EStore_model->saveCashOnDelivery($data);
	
	//After Payment is made, Info in send to order_shipping tbl
	if($status){
		$user_uuid = $data['user_uuid'];
		//get last inserted id
		$order_info = $this->EStore_model->fetchOrderInfoByUser($user_uuid);
		
		// print_r(count($order_info));		 
			$shipping_data['order_uuid'] = $order_info[0]->order_uuid;
			$shipping_data['user_uuid'] = $order_info[0]->user_uuid;
			$shipping_data['product_json'] = $order_info[0]->productInfo_json;
			$shipping_data['payment_mode'] = $order_info[0]->transaction_status;
			$shipping_data['shipping_status'] = 0; //Pending
			$shipping_data['conformation_code'] = $data['conformation_code'];
			
			$status2 = $this->EStore_model->saveShippingInfoByUser($shipping_data);		
		
		After, Order details is send to table - tbl_orders 
		We have to delete cart items, which is after saving it to tbl_order.		
		
		// $cart_items_delete_status = $this->EStore_model->deleteOrderedCartItems($user_uuid,$product_uuid,$variation_uuid);		

		// Mapping all shipping-product with user_uuid
		$json_string = $order_info[0]->productInfo_json;
		// Decode the JSON string to a PHP array
		$cart_items = json_decode($json_string, true);
		// var_dump($cart_items);die();
		// Loop through the array to process each cart item
		foreach ($cart_items as $item) {
			
			$mapping_data['user_uuid'] = $item['user_uuid'];
			$mapping_data['product_uuid'] = $item['product_uuid'];
			$mapping_data['product_name'] = $item['product_name'];			
			$mapping_data['shipping_status'] = $shipping_data['shipping_status'];
			$mapping_data['delivery_confirm_code'] = $shipping_data['conformation_code'];
			
			$this->EStore_model->saveMappingData($mapping_data);			
		}
		
		// die();
	 }else{
		echo json_encode("Not set");	
	}
	*/
	//if $status && $status2 is true
	echo json_encode($order_status);
}

public function onlinePayment_ajax()
{
	$data['transaction_id'] = $this->input->post('payment_id');
	
	$data['productInfo_json'] = $this->input->post('productInfo_json');
	/*
		loop each product with new order_uuid So that, 
		User will able to cancel single product with single order_uuid
		$val = $data['productInfo_json'];
	*/

	$data['total_amount'] = $this->input->post('total_amount');	
	$data['user_uuid'] = $this->input->post('user_uuid');
	
	
	$data['transaction_datetime'] = date('Y-m-d H:i:s');

	$status =  $this->EStore_model->saveOnlinePayment($data);
	echo json_encode($status);	 	
}


public function thankYouPage()
{
	$this->load->view('eStore/libs');
	return $this->load->view('eStore/thankyou');
}

public function my_orders()
{
	$userLoginData = $this->session->userdata('userLoginData'); 
	
	$data['user_uuid'] = $userLoginData['user_uuid'];

	$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();

	//  Check Order datetime - and compare it with current datetime
	/*
	There will be 3 order-status
	case:1
	- order_shipping_Status is is 1 show cancel btn and status [Pending]
	- if order_shipping_Status is 2 show cancel btn and status [Confirm]
	- if order_shipping_status is shipped(status==3) Then, user can't cancel the order - with Cancel btn (btn will blur and show notification u can cancel it at doorstep.)
	and Status [Shipped]
	- if status == 4 , Product is [delivered] and hide cancel btn and show Return btn
	 - ALso,,, 5=Cancelled, 6 = On Hold, 7 = Refunded
	
	case:2
	- if user recived order, and want to return order - with return btn (order_received_datetime + 15 days > current date time)
	- if product is deliverd and user did not cancel it, then buy again will show
	*/ 

	/*
	[button_status]
	$today = new DateTime(); // Current date and time Today is 2023/06/12
$interval = new DateInterval('P15D'); // 15 days interval
$today->add($interval); // Add the interval to the current date

echo $today->format('Y-m-d H:i:s'); // Output:2023-06-27 12:44:33

*/

	
	 

	// echo("<pre/>");
	// print_r($data['customer_orders_list']);die();

	$this->load->view('eStore/libs');
	$this->load->view('eStore/nav', $data);
	// $this->load->view('eStore/customer_orders',$data);
	$this->load->view('eStore/my_orders',$data);
	$this->load->view('eStore/footer');	
}

public function customer_orders()
{
	$userLoginData = $this->session->userdata('userLoginData'); 
	
	$user_uuid = $userLoginData['user_uuid'];

	$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();

	$data['customer_orders_list'] = $this->EStore_model->fetch_order_list_for_Customer($user_uuid);

	

	$this->load->view('eStore/libs');
	$this->load->view('eStore/nav', $data);
	$this->load->view('eStore/customer_orders',$data);
	// $this->load->view('eStore/my_orders',$data);
	$this->load->view('eStore/footer');
}

public function cancellationHistory($user_uuid)
{
	$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
	
	$data['all_cancelled_orders'] = $this->EStore_model->fetch_all_cancelled_order($user_uuid);

	$this->load->view('eStore/libs');
	$this->load->view('eStore/nav', $data);
	$this->load->view('eStore/cancellation_history', $data);	
	$this->load->view('eStore/footer');
}

//this function is call(invoke) when user want to cancel order using cancel btn
public function customerOrderCancellation($order_uuid)
{
	
	$userLoginData = $this->session->userdata('userLoginData'); 
	$user_uuid = $userLoginData['user_uuid'];

	$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();

	$data['order_cancel'] = $this->EStore_model->fetch_order_cancellation_product_info($user_uuid, $order_uuid);
	// To check, how many orders are made by single user in single order transction.
	$data['product_info_json'] =
	 $this->EStore_model->fetch_json_info_for_order_cancellation($user_uuid, $order_uuid);

	$product_uuid = $data['order_cancel'][0]['product_uuid'];
	// $variation_uuid = must have variation uuid
	//	var_dump($product_uuid);
	$data['cancel_order_info']	 = $this->EStore_model->fetch_cancel_order_info($product_uuid);
	// var_dump($data['cancel_order_info']);
	$this->load->view('eStore/libs');
	$this->load->view('eStore/nav', $data);
	$this->load->view('eStore/customer_order_cancellation', $data);
	$this->load->view('eStore/footer');	
}

public function submitCancelledOrder_ajax()
{
	// For tbl_order_cancellation
	$data['order_cancellation_detials'] = $this->input->post('order_cancellation_detials');	
	
	$order_cancelled_data = $data['order_cancellation_detials'];
	// For tbl_order_cancellation - update
	$data['product_info_json'] = $this->input->post('product_info_json');
	  
	// $data['order_cancel_datetime'] = date('Y/m/d H:i:s');
	
	$reason_for_cancellation = $this->input->post('selectedValue')?$this->input->post('selectedValue'):'NULL';
	
	$other_reason_for_cancellation = $this->input->post('other_textarea')?
	$this->input->post('other_textarea'): 'NULL';	 

	if ($data['order_cancellation_detials'] !== null) {

		// $tbl_data['product_name'] = $data['order_cancellation_detials']['product_name'];	
		// Access the values in the array
		$tbl_data['order_uuid'] 	= $order_cancelled_data['order_uuid'];
		$tbl_data['product_uuid'] 	= $order_cancelled_data['product_uuid'];
		$tbl_data['variation_uuid'] = $order_cancelled_data['variation_uuid'];
		$tbl_data['user_uuid'] 		= $order_cancelled_data['user_uuid'];		 

		$tbl_data['product_name'] 	= $order_cancelled_data['product_name'];
		$tbl_data['product_image'] 	= $order_cancelled_data['product_image'];		
		$tbl_data['product_size_name'] 	= $order_cancelled_data['product_size_name'];
		$tbl_data['product_color_name'] = $order_cancelled_data['product_color_name'];
		
		// product_quantity
		$tbl_data['product_quantity']   = $order_cancelled_data['product_quantity'];
		// Total no. of quantity user cancelled
		// $tbl_data['product_quantity']   = $order_cancelled_data['total_product_quantity'];

		$tbl_data['product_mrp'] 	= $order_cancelled_data['product_mrp'];
		$tbl_data['product_selling_price'] = $order_cancelled_data['product_selling_price'];
		$tbl_data['product_discount'] = $order_cancelled_data['product_discount'];
		
		if($order_cancelled_data['payment_method'] == 'COD')
		{
			$tbl_data['payment_mode'] = 1; //COD
		}else{
			$tbl_data['payment_mode'] = 0; //Online
		}

		$tbl_data['payment_id'] = $order_cancelled_data['transaction_id'];
		
		if($reason_for_cancellation != NULL){
			$tbl_data['reason_for_cancel'] = $reason_for_cancellation;
		}
	
		if($other_reason_for_cancellation != NULL){
			$tbl_data['reason_for_cancel'] = $other_reason_for_cancellation;
		}
		$tbl_data['order_datetime'] = $order_cancelled_data['createdAt'];
		$tbl_data['order_cancel_datetime'] = date('Y-m-d H:i:s');
		
		$tbl_data['productInfo_json'] = trim($data['product_info_json'],'"');
		
		//If COD, NO Need to refund, ONLY FOR ONLINE PAYMENT-Refund enabled
		if($order_cancelled_data['payment_method'] == 'COD')
		{
			$tbl_data['refund_status'] = 0;
			$order_return_status = 0; //FOR  Return without shipping COD 
		}else{
			$tbl_data['refund_status'] = 1;
			$order_return_status = 1; //FOR  Return without shipping Online Pay
		}		 
		$tbl_data['transaction_status'] = $order_cancelled_data['transaction_status'];
		$tbl_data['status'] = 1;		
		
 	} else {
		// Handle JSON decoding error
		echo "Error decoding JSON.";
 	}
	
	// var_dump($tbl_data);die();
	
	// save order cancel details in tbl_order_cancellation
	// update with json file same table ie tbl_order_cancellation
	// update tbl_order with order_return_status
	// update tbl_order with order_shipping_status = 5
	// update tbl_product_variation with product_quantity 
	
	// Delete order_cancelled_data from tbl_order (soft_delete)

	// $cancelledOrderDetails = $this->EStore_model->saveCancelledOrderDetails($tbl_data);	
	$cancelledOrderDetails = 1;
	if($cancelledOrderDetails){

		// update tbl_order with order_return_status
		// $update_order_return_status = 
		// $this->EStore_model->updateOrderReturnStatus(
		// 	$order_return_status, 
		// 	$tbl_data['order_uuid']
		// );

		// update tbl_product_variation with product_quantity 
		$update_product_quantity = $this->EStore_model->updateProductQuantityAfterCancellation(
			$tbl_data['variation_uuid'], 
			$tbl_data['product_uuid'],
			$tbl_data['product_quantity']
		);

		// Delete order_cancelled_data from tbl_order (soft_delete{update status with 1})
		$delete_cancelled_order = $this->EStore_model->softDeleteCanceledOrder(			
			$tbl_data['order_uuid']			
		);
		// redirect(base_url('/'));    
	}
}

public function customerOrderReturnRefund($order_uuid)
{
	$userLoginData = $this->session->userdata('userLoginData'); 
	
	if(!$userLoginData){
		redirect(base_url('login'));    
	}else{
	$user_uuid = $userLoginData['user_uuid'];

	$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();

	$data['cancelled_order'] = $this->EStore_model->fetch_order_cancellation_product_info($user_uuid, $order_uuid);
	
	$product_uuid = $data['cancelled_order'][0]['product_uuid'];
	// $variation_uuid = must have variation uuid
	//	var_dump($product_uuid);
	$data['cancel_order_info'] = $this->EStore_model->fetch_cancel_order_info($product_uuid);
	// var_dump($data['cancel_order_info']);
	$data['return_pickup_address'] = $this->EStore_model->fetch_customer_return_address($user_uuid);
	//---------------------------Create PICK-UP Date-time-------------------------------
	// Set timezone to India
	date_default_timezone_set('Asia/Kolkata');
	// Get the current date and time
	$current_datetime = date('Y-m-d H:i:s');
	// Get the current date
	$current_date = date('Y-m-d');
	// Add 1 days to the current date to get the future date
	$future_date = date('d M,Y', strtotime($current_date . '+2 days'));

	// Add 7 days and 2 hours to the current datetime to get the future datetime
	//$future_datetime = date('Y-m-d H:i:s', strtotime($current_datetime . ' +7 days +2 hours'));

	// Get the day of the week for the future date
	$future_day = date('l', strtotime($future_date));
  
    // echo "$current_datetime"; // 2023-03-27 14:45:42
    // echo "\n";
	// echo "$future_date"; // 2023-04-03
	// echo "\n";
	// echo "$future_day"; // Monday
	
	
	$data['pickup_datetime'] = $future_date;
	$future_date = date('d M,Y'); 
	$data['pickup_db_datetime'] = date('d-m-Y', strtotime($current_date . '+2 days'));
	$data['future_day'] = $future_day;
	//-------------------------------------------------------------------------------------

	$this->load->view('eStore/libs');
	$this->load->view('eStore/nav', $data);
	$this->load->view('eStore/customer_order_return_refund', $data);
	$this->load->view('eStore/footer');	
	}
}

public function submitOrderReturnRefund_ajax()
{	
	$data['product_cancellation_details'] = $this->input->post('product_cancellation_details');	
	$data['reasonForCancellation'] = $this->input->post('reasonForCancellation');	
	$data['refundingModeOfPayment'] = $this->input->post('refundingModeOfPayment');	
	$data['pickUpAddress'] = $this->input->post('pickUpAddress');	
	
	print_r($data);
	die();

	$data['order_uuid']= $data['product_cancellation_details'][0]['order_uuid'];
	$data['product_uuid']= $data['product_cancellation_details'][0]['product_uuid'];
	$data['variation_uuid']= $data['product_cancellation_details'][0]['variation_uuid'];
	$data['user_uuid'] = $data['product_cancellation_details'][0]['user_uuid'];
	$data['product_name'] = trim($this->input->post('product_name'));
	$data['product_size_name'] = $this->input->post('product_size_name');
	$data['product_color_name'] = $this->input->post('product_color_name');
	$data['product_selling_price'] = $this->input->post('product_selling_price');
	$data['product_discount'] = $this->input->post('product_discount');
	$data['payment_mode'] = $this->input->post('payment_mode');
	$data['payment_id'] = $this->input->post('payment_id');
	$data['payment_mode'] = $this->input->post('payment_mode');
	$data['order_datetime'] = $this->input->post('order_datetime');
	$data['product_json'] = $this->input->post('product_json');
	// $data['total_quantity'] 		= $this->input->post('total_quantity');

	$data['reason_for_cancel'] 		= $this->input->post('reasonForReturn');
	// $data['order_received_datetime'] 	= $this->input->post('order_received_datetime');
	$data['order_received_datetime'] 	= '03-04-2023';

	
	$data['refunding_mode_of_payment'] = $this->input->post('refunding_mode_of_payment');
	$data['refund_payment_upi'] 	= $this->input->post('refund_payment_upi');
	$data['refund_bank_name'] 		= $this->input->post('refund_bank_name');
	$data['refund_acct_holder_name'] = $this->input->post('refund_acct_holder_name');
	$data['refund_acct_num'] 		= $this->input->post('reasonForReturn');
	$data['refund_IFSC_code'] 		= $this->input->post('refund_IFSC_code');
	$data['refund_branch_name'] 	= $this->input->post('refund_branch_name');
	$data['pickup_datetime'] 		= $this->input->post('pickup_datetime');

	$pickup_addr_status		= $this->input->post('pickup_addr_status');

	if($pickup_addr_status == '1'){
		$data['return_addr_house_no'] 	= $this->input->post('return_addr_house_no_1');
		$data['return_addr_locality'] 	= $this->input->post('return_addr_locality_1');
		$data['return_addr_city'] 		= $this->input->post('return_addr_city_1');
		$data['return_addr_pin_code'] 	= $this->input->post('return_addr_pin_code_1');
		$data['return_addr_state'] 		= $this->input->post('return_addr_state_1');
		$data['return_addr_country'] 	= $this->input->post('return_addr_country_1');
		$data['return_addr_type'] 		= $this->input->post('return_addr_type_1');
		$data['receivers_phone_no'] 	= $this->input->post('receivers_phone_no_1');
	}else{
		$data['return_addr_house_no'] 	= $this->input->post('return_addr_house_no');
		$data['return_addr_locality'] 	= $this->input->post('return_addr_locality');
		$data['return_addr_city'] 		= $this->input->post('return_addr_city');
		$data['return_addr_pin_code'] 	= $this->input->post('return_addr_pin_code');
		$data['return_addr_state'] 		= $this->input->post('return_addr_state');
		$data['return_addr_country'] 	= $this->input->post('return_addr_country');
		$data['return_addr_type'] 		= $this->input->post('return_addr_type');
		$data['receivers_phone_no'] 	= $this->input->post('receivers_phone_no');
	}
	
	// $data['return_refund_status'] 		= $this->input->post('return_refund_status');
	$data['return_refund_status'] 		= '1';
	//$saveCustomerOderReturnRefundDetails = $this->EStore_model->saveCustomerOderReturnRefundDetails($data);
	
	// echo("<pre/>");
	var_dump($pickup_addr_status);
	echo("<br/>");
	var_dump($data);
	die();
}

// ============================== End Shipping_details ==================================

// ==============================

public function saveRatings()
{
	
	$data['rating_title']  = $this->input->post('title');
	$data['rating_number'] = $this->input->post('rating');
	$data['product_uuid']  = $this->input->post('product_uuid');
	$data['user_uuid'] 	   = $this->input->post('user_uuid');
	$data['user_name']     = $this->input->post('user_name');
	
	$data['rating_comment'] = $this->input->post('comment');
	
	// isVerifiedBuyer	- ie he/she purchased item
	$verifiedBuyer = $this->EStore_model->fetchVerifiedBuyer($data['user_uuid'],$data['product_uuid']);
	
	if($verifiedBuyer[0]['shipping_status'] == '1')
	{
		$data['isVerifiedBuyer'] = '1';
		// print_r($verifiedBuyer[0]['shipping_status']);die();
	}else{
		$data['isVerifiedBuyer'] = '0';
	}

	$status =  $this->EStore_model->saveUsersRatingNReviews($data);
	echo json_encode($status);	 
	// echo($title);die();
}













// ================================= Product-Details Page ==================================

	public function product_filter_ajax()
	{
		// $cat_slug = $this->input->post('cat_slug');
		$child_cat_id = $this->input->post('child_cat_id');
		//post-data
		$pageNumber = $this->input->post('pgNum');
		$per_page = $this->input->post('perPg');
		// echo json_encode($cat_slug);die();
		
		//-----------Getting total Number of  Records From database------------------
		$total_rows = $this->EStore_model->getRecordCount($child_cat_id, $color_flag=0, $price_flag=0, $discount_flag=0);

		// echo json_encode($total_rows);die();
		$linkData = $this->createLink($pageNumber, $per_page, $total_rows, $child_cat_id,$color_flag=0, $price_flag=0, $discount_flag=0);
        // print_r($linkData['total_pages']);die(); 

										// Limit-$per_page, offset-$linkData['offset']
		$tableData = $this->EStore_model->getProductData($per_page, $linkData['offset'],$child_cat_id, $color_flag=0, $price_flag=0, $discount_flag=0);
			// var_dump($tableData);
		echo json_encode(array('perPageOptions' => $linkData['perPageOptions'],
                                'pageLink' => $linkData['pageLink'],
                                'tableData' => $tableData,
                                'totalRow' => $linkData['total_pages'],
                                'currentPg'=>$linkData['current_page']
                                ));
	}	

	 // ############################ pagination library ##################################
	 private function createLink($i, $per_page, $total_rows, $child_cat_id, $color_flag=0,$price_flag=0,$discount_flag=0){ // here $i is requested Page
		// print_r($i); // 1
		// print_r($per_page); //10
		// print_r($total_rows); // 32054
		//-------------calculating total number of pages---------------------------------------
				$l = 0;  // Total Number Of Page
				if($total_rows % $per_page){
					$l=intval($total_rows/$per_page)+1;
				}
				else{
					$l=intval($total_rows/$per_page);
				}
			   
				if($l==1){ $i=1;}
		
				//------------Page Link Configuration -------------------------
				$config=[
					"full_tag_open" => "<ul class='pagination'>",
					"full_tag_close" => "</ul>",
		
					"first_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct(1 '.",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">First'.'</a></li>',
					
					//search for $link.=$config['last_tag']; and uncomment
					"last_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct('.$l.",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">Last'.'</a></li>',
		
		
					"next_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct('.($i+1).",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">>'.'</a></li>',
					"next_tag_mute" => '<li class="page-item" style="margin-left:10px;"><p class="page-link">></p></li>',
					 
		
					"prev_tag" => '<li class="page-item"><a href="javascript:void(0)" onclick="'.'showProduct('.($i-1).",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link"><'.'</a></li>',
					"prev_tag_mute" => '<li class="page-item"style="margin-right:10px;"><p class="page-link"><</p></li>',
					
		
					"num_tag_open" => '<li class="page-item"><a href="javascript:void(0)" onclick="showProduct(',
					"num_tag_mid" => ')" class="page-link">',
					"num_tag_close" =>'</a></li>',
		
					"cur_tag" => '<li class="page-item active"><a href="javascript:void(0)" onclick="showProduct('.$i.",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."')".'" class="page-link">'.$i.'</a></li>',
					
				];
		
				//--------------- Creating Page Link ---------------------------------------------
					$pageLink = $this->pageLinkFun($config,$i,$l,$child_cat_id,$color_flag,$price_flag, $discount_flag);
		
				// ---------------------Creating Per Page Options----------------------------------
					$perPageOptions = $this->perPageOptionsFun($per_page);
		
				// --------------------- Getting Offset -------------------------------------------
		
					$offset=$this->calculateOffset($i,$per_page);
				//  print_r($l);die();// total pg no
				//------Putting Page Link, Per Page Options And offset  into one array ------------
					$linkData=array(
						'pageLink' => $pageLink,
						'perPageOptions' => $perPageOptions,
						'offset' => $offset,
						'total_pages'=>$l,
						'current_page'=>$i
					);
					return $linkData;
			}
		
			private function pageLinkFun($config,$i,$l,$child_cat_id,$color_flag,$price_flag,$discount_flag){
		
				//--------------- Creating Page Link -----------------------------------
		
				$link=$config['full_tag_open'];
		
				if($i>3 && $l!=1){
					$link.=$config['first_tag'];
				}
				if($i>1 && $l!=1){
					$link.=$config['prev_tag'];
				}
		
				if($l==1){
					$link.=$config['prev_tag_mute'];
					
				}
		
				if(($i-2)>=1){
		
					$link.=$config['num_tag_open'];
					$link.=$i-2;
					$link.=",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i-2;
					$link.=$config['num_tag_close'];
		
					$link.=$config['num_tag_open'];
					$link.=$i-1;
					$link.=",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i-1;
					$link.=$config['num_tag_close'];
		
					$link.=$config['cur_tag'];
				}
				else if(($i-1)>=1){
		
					$link.=$config['num_tag_open'];
					$link.=$i-1;
					$link.=",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i-1;
					$link.=$config['num_tag_close'];
		
					$link.=$config['cur_tag'];
				}
				else{
					$link.=$config['cur_tag'];
				}
		
		
				if(($i+2)<=$l){
		
					$link.=$config['num_tag_open'];
					$link.=$i+1;
					$link.=",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i+1;
					$link.=$config['num_tag_close'];
		
					$link.=$config['num_tag_open'];
					$link.=$i+2;
					// $link.=",'".$cat_slug."','".$color_flag."'";
					$link.=",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i+2;
					$link.=$config['num_tag_close'];
				}
				else if(($i+1)<=$l){
		
					$link.=$config['num_tag_open'];
					$link.=$i+1;
					// $link.=",'".$cat_slug."','".$color_flag."'";
					$link.=",'".$child_cat_id."','".$color_flag."','".$price_flag."','".$discount_flag."'";
					$link.=$config['num_tag_mid'];
					$link.=$i+1;
					$link.=$config['num_tag_close'];
				}
		
				if(($i+2)<$l){
					$link.=$config['next_tag'];
					$link.=$config['last_tag'];
				}
				else if(($i+1)<=$l){
					$link.=$config['next_tag'];
				}
		
				if($l==1){
					$link.=$config['next_tag_mute'];
				}
		
				$link.=$config['full_tag_close'];
		
				return $link;
			}
		
		
			private function perPageOptionsFun($per_page){
		
				// ---------------------Creating Per Page Options------------------------	
		
				$perPageOptions='<select id="perPage" name="perPage">';
		
				for($k=10; $k<=100; $k+=10){
					if($per_page=="".$k){
						$perPageOptions.='<option selected value="';
						$perPageOptions.=$k;
						$perPageOptions.='">';
						$perPageOptions.=$k;
						$perPageOptions.='</option>';
					}
					else{
						$perPageOptions.='<option value="';
						$perPageOptions.=$k;
						$perPageOptions.='">';
						$perPageOptions.=$k;
						$perPageOptions.='</option>';
					}
				}
									 
				$perPageOptions.='</select>';
		
		
				return $perPageOptions;
			}
			private function calculateOffset($requestedPg,$per_page){
				// --------------------- Calculating Offset ------------------------
				$offset = ($requestedPg-1)*$per_page;
				return $offset;
			}
//=========================== CUSTOMER POLICIES ====================================
	
	// 14-Day Refund Policy.
	public function refund_policy()
	{
			$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
			
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav',$data);
			$this->load->view('eStore/refund_policy.php', $data);
			$this->load->view('eStore/footer');		
	}

	public function terms_and_conditions()
	{
			$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
			
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav',$data);
			$this->load->view('eStore/terms_and_conditions.php', $data);
			$this->load->view('eStore/footer');		
	}

	public function privacy_policy()
	{
			$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
			
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav',$data);
			$this->load->view('eStore/privacy_policy.php', $data);
			$this->load->view('eStore/footer');		
	}

	public function shipping_and_delivery_policy()
	{
			$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
			
			$this->load->view('eStore/libs');
			$this->load->view('eStore/nav',$data);
			$this->load->view('eStore/shipping_and_delivery_policy.php', $data);
			$this->load->view('eStore/footer');		
	}



}
