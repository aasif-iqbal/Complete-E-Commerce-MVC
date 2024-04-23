<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// ------------------------------ UserView-section --------------------------

$route['default_controller'] = 'welcome';
// $route['default_controller'] = 'EStore/EStore_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['shops/(:any)'] = 'EStore/EStore_Controller/showProductsMainCategories/$1';

$route['shop-cat/(:any)'] = 'EStore/EStore_Controller/showProductsByCategories/$1';

$route['contact-us'] = 'EStore/EStore_Controller/contact_us';
$route['about-us'] = 'EStore/EStore_Controller/about_us';

$route['store'] = 'EStore/EStore_Controller/store';

$route['my-account'] = 'EStore/EStore_Controller/my_account';

// login
$route['login'] = 'EStore/EStore_Controller/showUserLogin';
$route['registration'] = 'EStore/EStore_Controller/showUserRegistration';
$route['submit-registration'] = 'EStore/EStore_Controller/submitRegistration';
$route['submit-login'] = 'EStore/EStore_Controller/checkForLogin';

$route['logout'] = 'EStore/EStore_Controller/logout';
// end-login

$route['cart'] = 'EStore/EStore_Controller/myCart';
$route['search'] = 'EStore/EStore_Controller/search';

//Shipping_details
$route['shipping'] = 'EStore/EStore_Controller/shippingDetails';
$route['edit-addr'] = 'EStore/EStore_Controller/editCustomerAddress';
$route['submit-edited-addr'] = 'EStore/EStore_Controller/submitEditedAddress';

$route['product/(:any)'] = 'EStore/EStore_Controller/showProductDetails/$1';

//Customer Orders view page
$route['my-orders'] = 'EStore/EStore_Controller/my_orders';
$route['customer-orders'] = 'EStore/EStore_Controller/customer_orders';

// cancellation History
$route['cancellation-history/(:any)'] = 'EStore/EStore_Controller/cancellationHistory/$1';

//Customer order cancellation without (before) shipping
$route['order-cancellation/(:any)'] = 'EStore/EStore_Controller/customerOrderCancellation/$1';

//submit cancelled order
$route['submit-order-cancel'] = 'EStore/EStore_Controller/submitCancelledOrder';

//Customer order cancellation After shipping
$route['order-return-refund/(:any)'] = 'EStore/EStore_Controller/customerOrderReturnRefund/$1';

//Submit Customer order cancellation After shipping
// $route['submit-order-return-refund'] = 'EStore/EStore_Controller/submitOrderReturnRefund'; using this submitOrderReturnRefund_ajax

$route['thanks']= 'EStore/EStore_Controller/thankYouPage';

//Rating and reviews
$route['save-ratings'] = 'EStore/EStore_Controller/saveRatings';

//-------------------------------- Customer Policies  -------------------------------
$route['refund-policy'] = 'EStore/EStore_Controller/refund_policy';
$route['tac'] = 'EStore/EStore_Controller/terms_and_conditions';
$route['shipping-delivery'] = 'EStore/EStore_Controller/shipping_and_delivery_policy';
$route['privacy-policy'] = 'EStore/EStore_Controller/privacy_policy';
// ------------------------------------ Admin-section ---------------------------------
//login
$route['submit-admin-login'] = 'Admin/Admin_Controller/submit_admin_login';

$route['admin'] = 'Admin/Admin_Controller'; //index
$route['dashboard'] = 'Admin/Admin_Controller/dashboard';

$route['banner'] = 'Admin/Admin_Controller/uploadBanner';
$route['add-categories'] = 'Admin/Admin_Controller/add_categories';

//Add Size
$route['add-size'] = 'Admin/Admin_Controller/add_custom_sizes';
$route['submit-custom-size'] = 'Admin/Admin_Controller/submit_custom_sizes';

$route['add-color'] = 'Admin/Admin_Controller/add_custom_colors';
$route['submit-custom-color'] = 'Admin/Admin_Controller/submit_custom_color';

// Product
$route['add-products'] = 'Admin/Admin_Controller/add_products';
$route['submit-product'] = 'Admin/Admin_Controller/submit_products';

$route['add-variation/(:any)'] = 'Admin/Admin_Controller/add_variation/$1';
$route['add-images/(:any)'] = 'Admin/Admin_Controller/add_images/$1';

// $route['add-colored-images/(:any)'] = 'Admin/Admin_Controller/add_colored_images/$1';
$route['add-colorVariation-images/(:any)'] = 'Admin/Admin_Controller/add_color_variation_images/$1';

$route['product-list'] = 'Admin/Admin_Controller/show_product_list';

//
$route['store-image'] = 'Admin/Admin_Controller/store_image';

$route['store-colored-image'] = 'Admin/Admin_Controller/store_colored_image';
// $route['save-variation'] = 'Admin/Admin_Controller/submit_product_variation';

$route['show-shipping'] = 'Admin/Admin_Controller/show_shipping';

$route['show-cancellation'] = 'Admin/Admin_Controller/show_cancellation';

//For delivery boy and Admin to confirm that parcel is received by customer
$route['status'] = 'Admin/Admin_Controller/show_shipping_status';
$route['update-shipping'] = 'Admin/Admin_Controller/update_shipping_status';

$route['show-stocks'] = 'Admin/Admin_Controller/show_total_stocks';

$route['show-main-product'] = 'Admin/Admin_Controller/showMainProductList';

//Edit main-product-image
$route['edit-main-image/(:any)'] = 'Admin/Admin_Controller/edit_main_product_image/$1';
//Save main-product-image
$route['store-main-image'] = 'Admin/Admin_Controller/store_main_image'; 

//Edit main-product-details
$route['edit-main-product-details/(:any)'] = 'Admin/Admin_Controller/edit_main_product_details/$1';
//Update
$route['update-main-product-details/(:any)'] = 'Admin/Admin_Controller/update_main_product_details/$1';

//Delete
$route['delete-main-product/(:any)'] = 'Admin/Admin_Controller/delete_main_product/$1';
//For Main Product
$route['confirm-delete/(:any)'] = 'Admin/Admin_Controller/confirm_delete/$1';


//Edit Parent categories
$route['edit-parent-category/(:any)'] = 'Admin/Admin_Controller/edit_parent_categories/$1';
$route['submit-custom-parent-category'] = 'Admin/Admin_Controller/submit_custom_parent_category';

//Delete Parent categories
$route['delete-parent-category/(:any)'] = 'Admin/Admin_Controller/delete_parent_category/$1';

//Edit Child Categories
$route['edit-child-category/(:any)'] = 'Admin/Admin_Controller/edit_child_category/$1';
$route['submit-custom-child-category'] = 'Admin/Admin_Controller/submit_custom_child_category';

//Delete Child categories
$route['delete-child-category/(:any)'] = 'Admin/Admin_Controller/delete_child_category/$1';


//EDIT Product variation
$route['edit-product-variant/(:any)/(:any)'] = 'Admin/Admin_Controller/edit_product_with_variation/$1/$2';

// $route['edit-product/(product_uuid)'] = 'Admin/Admin_Controller/edit_product_with_variation/$1'; $1=>$product_uuid ie function f_name($params=$product_uuid){}

// //For Main Product
// $route['update-product/(:any)'] = 'Admin/Admin_Controller/update_product_with_variation/$1';

//UPDATE Product variation (submit)
$route['update-product-variant/(:any)/(:any)'] = 'Admin/Admin_Controller/update_product_with_variation/$1/$2';

//DELETE Product variation
$route['delete-product-variant/(:any)/(:any)'] = 'Admin/Admin_Controller/delete_product_with_variation/$1/$2';

//Edit Custom Color
$route['edit-custom-color/(:any)'] = 'Admin/Admin_Controller/edit_custom_color/$1';
//Submit
$route['submit-edited-custom-color'] = 'Admin/Admin_Controller/submit_edited_custom_color';
// DELETE
$route['delete-custom-color/(:any)'] = 'Admin/Admin_Controller/delete_custom_color/$1';

//Edit Custom Size
$route['edit-custom-size/(:any)'] = 'Admin/Admin_Controller/edit_custom_size/$1';
// Submit
$route['submit-edited-custom-size'] = 'Admin/Admin_Controller/submit_edited_custom_size';
//Delete
$route['delete-custom-size/(:any)'] = 'Admin/Admin_Controller/delete_custom_size/$1';

//Print PDF of order-made-by-customer
$route['print-order/(:any)'] = 'Admin/Admin_Controller/fetchSingleProductOrderDetails/$1';
//update-order-status
$route['edit-order-status/(:any)'] = 'Admin/Admin_Controller/editOrderStatus/$1';
$route['submit-order-status'] = 'Admin/Admin_Controller/updateOrderStatus';

//RETURN ORDER BY CUSTOMER
$route['edit-return-status/(:any)'] = 'Admin/Admin_Controller/editReturnStatus/$1';

/* 
    AJAX - Routes (indirect call)
    
    pay_now_cod() | eStore/EStore_Controller/onlinePayment_ajax - shipping_details(page)
*/ 



// Work to-do
/* 
    Estore
    - [Module- Return & Refund] Save return refund data to database with updated date-time value of pickup-time(+3 days)
    - [Forgot Password]- with email
    - [Search]
    - [Wishlist]
    - [Offline - Add to cart]

    Admin
    - Fetch all details of Cancellation order
    - Fetch all details of Return and Refund order
 */
