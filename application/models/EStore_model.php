<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Staff_Model
 *
 * @author asif
 */
 class EStore_Model extends CI_Model{
     
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function fetch_categories_for_parent()
    { 

        $query = "SELECT parent_id,parent_category_name
        FROM tbl_category_patents 
        WHERE status = '1'" ;

          $q = $this->db->query($query);

         $final = [];
         if ($q->num_rows() > 0) {
            
            foreach($q->result() as $row){
                $q = "SELECT * FROM tbl_category_children WHERE 
                fk_parent_id = $row->parent_id";
                
                $q_new = $this->db->query($q);
                if ($q_new->num_rows() > 0) {
                    $row->children = $q_new->result();
                }
                array_push($final,$row);
            
           }
           return $final;          
        }
           else {
               return NULL;
           }  
    }
    
    //  Show Only Main-Categories
    public function fetch_parent_categories($parent_id)
    {
        $query = "SELECT parent_id,parent_category_name,parent_category_image
        FROM tbl_category_patents 
        WHERE status = '1' AND parent_id='$parent_id'";

          $q = $this->db->query($query);

         $final = [];
         if ($q->num_rows() > 0) {
            
            foreach($q->result() as $row){
                $q = "SELECT * FROM tbl_category_children WHERE 
                fk_parent_id = $row->parent_id";
                
                $q_new = $this->db->query($q);
                if ($q_new->num_rows() > 0) {
                    $row->children = $q_new->result_array();
                }
                array_push($final,$row);
            
           }
           return $final;          
        }
           else {
               return NULL;
           }   
    }

    // To selct Brand name with Product
    // SELECT tp.product_name,tb.brand_name FROM `tbl_products` AS tp  INNER JOIN tbl_brands AS tb ON tp.product_brand_id = tb.brand_id WHERE tp.status=1;
// ================================= Login & Registration =================================
    public function saveRegistration($data, $data_login)
    {
        $this->db->set('user_uuid','UUID()', FALSE);

        if($data && $data_login){            
            $this->db->insert('tbl_registration', $data);    
            $this->db->insert('tbl_login', $data_login);  
            
            return TRUE;
        }else{
            
            $this->db->_error_message();
            return FALSE;
        }         
    }

    public function fetchLoginDetails($login_data)
    {
        
        // $query = "SELECT login_id,phone_no,password,status 
        //           FROM tbl_login WHERE phone_no='$login_data['phone_no']' AND password='$login_data['password']' ";
        
        $query = $this->db->select('*')->from('tbl_login')->where($login_data)->get();
        $query2 = $this->db->select('user_uuid, user_name')->from('tbl_registration')->where($login_data)->get();
        
        if ($query2->num_rows() > 0) {
            $result2 = $query2->result();       
            // var_dump($result2[0]->user_uuid);
        }

        if ($query->num_rows() > 0) {
            $result = $query->result();       
            if(isset($result[0]->status))
            {
                return $data = [
                    'user_uuid' => $result2[0]->user_uuid,
                    'user_name'=> $result2[0]->user_name,
                    'is_active'=> $result[0]->status,
                    'phone_no'=> $result[0]->phone_no,
                    'password'=> $result[0]->password,
                ];
            }else{
                echo("Not Set");
            }
        }   
        else {
            return NULL;
        }
    }

    // ================ Product_details page ==========================
    public function fetchProductImages($product_uuid)
    {
        // $query = "SELECT image_id,product_id,product_uuid,
        //           prd_img_1,prd_img_2,prd_img_3,prd_img_4,prd_img_5,prd_img_6,status 
        //           FROM tbl_product_images WHERE product_uuid='$product_uuid'";

        $query = "SELECT main_image_id,
                         main_image_uuid,
                         product_id,
                         product_uuid,
                         main_product_image,
                         display_status 
        FROM tbl_main_product_images WHERE product_uuid ='$product_uuid' AND display_status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }
    }

    public function fetchSingleProduct($product_uuid)
    {
        $query = "SELECT 
                    product_id,
                    product_uuid,
                    product_name,
                    article_no,
                    product_main_image,
                    product_short_description,
                    product_long_description,
                    product_mrp,
                    product_selling_price,
                    discount_percentage                         
                FROM tbl_main_product WHERE product_uuid='$product_uuid'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }
    }

    public function checkProductStocksAviableInDB($mainProductUUID,$productColorId,$productSizeUUID)
    {
        $query = "SELECT 
                    variation_uuid,
                    product_quantity,
                    isMain        
                FROM tbl_product_variation WHERE product_uuid='$mainProductUUID' 
                AND product_color='$productColorId' AND size_uuid='$productSizeUUID'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
                return $q->result_array();       
            }   
            else {
                return NULL;
        }
    }

    public function fetchAvilableSizeVariation($product_uuid)
    {
        /*
        $query = "SELECT sz.size_id,
                         sz.size_name,
                         vr.product_size,
                         mp.product_size
                    FROM tbl_sizes AS sz INNER JOIN tbl_product_variation AS vr 
                    ON sz.size_id = vr.product_size 
                    INNER JOIN tbl_main_product AS mp ON vr.product_id = mp.product_id 
                    WHERE mp.product_uuid='$product_uuid' ORDER BY sz.size_id";
          */
                
        $query = "SELECT size_uuid,
                         product_size,
                         product_size_label 
                  FROM tbl_product_variation 
                  WHERE product_uuid='$product_uuid'
                  GROUP BY product_size HAVING COUNT(product_size) > 0";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }
    }

    public function fetchSelectedColorByDDSize($product_uuid, $size_name)
    {
        $query = "SELECT product_color, 
                         product_color_name, 
                         product_hex_code 
                FROM `tbl_product_variation` 
                WHERE `product_uuid`='$product_uuid' 
                AND `product_size`='$size_name'";
                
                $q = $this->db->query($query);        

                  if ($q->num_rows() > 0) {
                      return $q->result();       
                  }   
                  else {
                      return NULL;
                  }
    }

    public function fetchProductImagesBySelectedColor($product_uuid, $color_id)
    {
        $query = "SELECT product_color_uuid, 
                         product_color_img 
                 FROM `tbl_product_variation_colorImgs` 
                 WHERE `product_uuid`='$product_uuid' 
                 AND `variation_color_id`='$color_id' 
                 AND display_status='1'";
        
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        } else {
            return NULL;
        }
    }

    public function fetchAvilableColorVariation($product_uuid)
    {
        /*
        $query = "SELECT cl.color_id,
                         cl.color_name,
                         cl.hex_code,
                         vr.product_color,
                         mp.product_color
                    FROM tbl_colors AS cl INNER JOIN tbl_product_variation AS vr 
                    ON cl.color_id = vr.product_color 
                    INNER JOIN tbl_main_product AS mp ON vr.product_id = mp.product_id 
                    WHERE mp.product_uuid='$product_uuid' ORDER BY cl.color_id";
          */
          //Remove duplicate color for diff size (38-Black, 40-black, 42-Black)
        //   product_color is id
          $query = "SELECT product_color,
                           product_color_name,
                           product_hex_code 
                    FROM tbl_product_variation 
                    WHERE product_uuid='$product_uuid'      
                    GROUP BY product_color HAVING COUNT(product_color) > 0";
       
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }
    }

    public function fetch_cancel_order_info($product_uuid)
    {
        $query = "SELECT 
                    mp.product_uuid,
                    mp.product_name,
                    mp.article_no,
                    pv.variation_uuid,                   
                    (mp.product_mrp) AS main_mrp,
                    (mp.product_selling_price) AS main_sp,
                    (mp.discount_percentage) AS main_discount,
                    (pv.product_color_name)AS color_v,                    
                    (pv.product_size) As size_v,
                    (pv.product_quantity) AS stocks_v,
                    (pv.product_mrp) AS mrp_v,
                    (pv.product_selling_price) AS sp_v,
                    (pv.discount_percentage) AS discount_v                  
                    FROM tbl_main_product AS mp INNER JOIN
                    tbl_product_variation AS pv 
                    ON mp.product_uuid = pv.product_uuid AND mp.product_uuid ='$product_uuid'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }        
    }
// ======================== Shipping details ==========================

public function getSingleCustomerInfo($user_uuid)
{
    $query = "SELECT user_id,user_uuid,user_name,email,phone_no,receivers_phone_no, addr_house_no,addr_locality,addr_city,addr_pin_code,addr_state,addr_country,addr_type FROM tbl_registration WHERE user_uuid='$user_uuid'";

    $q = $this->db->query($query);        

    if ($q->num_rows() > 0) {
        return $q->result();       
    }   
    else {
        return NULL;
    }
}

public function updateEditedAddress($data, $user_uuid)
{
    // print_r($data['addr_house_no']);
    // print_r($user_uuid);
    // die();
 /*
    $query = "UPDATE `tbl_registration` SET 
                    `addr_house_no` = '".$data['addr_house_no']."',
                    `addr_locality` = '".$data['addr_locality']."',
                    `addr_city` = '".$data['addr_city']."',
                    `addr_pin_code` = '".$data['addr_pin_code']."',
                    `addr_type` = '".$data['addr_type']."'
                     WHERE user_uuid = '".$user_uuid."' ";
*/
/*

*/
    $data = array(
        'receivers_phone_no' => $data['receivers_phone_no'],
        'addr_house_no'      => $data['addr_house_no'],
        'addr_locality'      => $data['addr_locality'],
        'addr_city'          => $data['addr_city'],
        'addr_pin_code'      => $data['addr_pin_code'],
        'addr_type'          => $data['addr_type']
    );
    
    $this->db->where('user_uuid', $user_uuid);
    $this->db->update('tbl_registration',$data); 

    // $this->db->set('addr_house_no', $data['addr_house_no']);
    // $this->db->set('addr_locality', $data['addr_locality']);
    // $this->db->set('addr_city', $data['addr_city']);
    // $this->db->set('addr_pin_code', $data['addr_pin_code']);
    // $this->db->set('addr_type', $data['addr_type']);

    // $this->db->where('user_uuid', $user_uuid);
    // $this->db->update('tbl_registration'); 
    
    

    $afftectedRows = $this->db->affected_rows();
    // var_dump($afftectedRows);
     if ($afftectedRows == 1) {
        return TRUE;
    }else{
        return FALSE;
    }        
}

//========================= End Shipping details ============================


//================== Product cart details selected by User =======================


public function saveCartDetails($data)
{
    if($data){                    
            $this->db->insert('tbl_cart', $data);          
        return TRUE;
    }else{        
        $this->db->_error_message();
        return FALSE;
    }      
}

// check before adding new product
public function checkProductExistInCart($product_uuid, $user_uuid, $product_size_id,$product_color_id)
{
    $query = "Select * FROM tbl_cart WHERE product_uuid='{$product_uuid}' AND user_uuid='{$user_uuid}' AND product_size_id='{$product_size_id}' AND product_color_id='{$product_color_id}'";

    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }
}

//update only when user_uuid,product_uuid,color_id,and size_id will same
public function updateCartDetails($product_uuid, $user_uuid)
{
    $this->db->set('item_count', 'item_count + 1', FALSE);
    $this->db->where('product_uuid', $product_uuid);
    $this->db->where('user_uuid', $user_uuid);
    $this->db->update('tbl_cart');

    $afftectedRows = $this->db->affected_rows();
    // var_dump($afftectedRows);
     if ($afftectedRows == 1) {
        return TRUE;
    }else{
        return FALSE;
    }        

}

//.....@ $cartItems is locatstorage data
//.....@ $userLoginData is session data
public function saveLocalStorageCartItemsAfterLogin($cartItems, $userLoginData)
{
    //  if($cartItems == NULL){
    //     echo('null');
    //  }
    // $cartItems_arr = json_decode($cartItems);
    // print(is_null($cartItems));
    // print_r($userLoginData);
    // for($i=0; $i < count($cartItems_arr); $i++)
    // {
    //     print_r(($cartItems_arr[$i]));   
    //     echo('<br/>');
    //     $data['user_uuid'] = $userLoginData['user_uuid'];
    // }

    // print_r((json_decode($cartItems)[0]->id));
    // print_r($userLoginData);
    // die();    
}

public function getUpdatedCartValue($user_uuid)
{
    $query = "SELECT `item_count` FROM tbl_cart WHERE user_uuid='$user_uuid'";

    // exit($query);
    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }  
}

public function countCartItems($user_uuid)
{
    $query = "Select COUNT(product_quantity) FROM tbl_cart WHERE user_uuid='{$user_uuid}'";

    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }  
}

public function fetch_product_color($product_uuid, $color_id)
{
    // $query = "SELECT * 
    //             FROM tbl_product_colors 
    //             WHERE product_uuid='{$product_uuid}' 
    //             AND variation_color_id = '{$color_id}'";
   
   $query = "SELECT product_color_uuid,
                    product_uuid,
                    variation_uuid,
                    variation_color_id,
                    variation_color_name,
                    product_color_img,
                    display_status
                FROM tbl_product_variation_colorImgs 
                WHERE product_uuid='{$product_uuid}' 
                AND variation_color_id = '{$color_id}' 
                AND display_status='1'";

    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return [];
        }  
}

// BELOW FUNCTION NOT IN USE
public function fetchTotalProductQuantity($product_uuid)
{
    $query = "Select `product_quantity` FROM tbl_main_product WHERE product_uuid='{$product_uuid}'";
    // exit($query);
    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            // print_r($q->result());
            return $q->result();       
        }   
        else {
            return NULL;
        }
}

public function currentItemCount($productUUID, $userUUID, $variationUUID, 
$item_local_id=NULL){
    
    // echo("<<<-------");
    // echo("%%%%%");
    // print_r($productUUID);
    // echo("***");
    // print_r($userUUID);
    // echo("###");
    // print_r($variationUUID);
    // echo("@@@");
    // print_r($item_local_id);
    // echo("-->>>");    

    $query = $this->db->select('item_count')->from('tbl_cart')->where('user_uuid',$userUUID)->where('product_uuid', $productUUID)->where('variation_uuid', $variationUUID)->get();
    
    // $lastQuery = $this->db->last_query();
    // echo $lastQuery;
    // print_r($query->num_rows()); die();

        if ($query->num_rows() > 0) {
           return $result = $query->result_array();                   
        }else{
            //if $query->num_rows() return = 0
            return NULL;
        }                
}

public function removeItemFromCart($productUUID, $userUUID, $variationUUID, $item_local_id=NULL)
{
    // var_dump($productUUID);
    // var_dump($userUUID);
    // var_dump($variationUUID);
    
    if($item_local_id != NULL){

        if($item_local_id && $productUUID){
            $this->db->delete('tbl_cart', array('localstorage_id' => $item_local_id,'product_uuid'=>$product_uuid));
            return TRUE;
        }else{
            echo "Error: " .  $this->db->_error_message();
            return FALSE;
        }

    }else{
        
        if($productUUID && $userUUID && $variationUUID){            
            $this->db->delete('tbl_cart', array('user_uuid' => $userUUID,               'product_uuid'=>$productUUID, 'variation_uuid' => $variationUUID));
            return TRUE;
        }else{
            echo "Error: " . $this->db->_error_message();
            return FALSE;
        }
    }   
}

public function incrementItemFromCart($productUUID, $userUUID, $variationUUID, $item_local_id=NULL)
{
    // var_dump($productUUID);
    // echo("----------");
    // var_dump($userUUID);
    // echo("****=========");
    // var_dump($variationUUID);
    
    /*
        check total_product_quantity(stocks) before adding product_quantity
        also check for 0 ie product_quantity < 0        
    */ 

    $msg1 = 'limit exiced';

    $value = $this->currentItemCount($productUUID, $userUUID, $variationUUID,$item_local_id=NULL);
    
    // echo("===val==");
    // print_r($value);
    if($value != NULL){

    $currentItemCount = (int)($value[0]['item_count']);
    // echo("==cic===");
    // print_r($currentItemCount);
    // die();
        
        if($item_local_id != NULL){
            // Before Login,Product added in Cart
            if($item_local_id && $productUUID){                        
                    $this->db->set('product_quantity', 'item_count + 1', FALSE);                
                    $this->db->where('localstorage_id', $item_local_id);        
                    $this->db->where('product_uuid', $productUUID);        
                    $this->db->update('tbl_cart');
                    return TRUE;
            }else{
                        echo "Error: " .  $this->db->_error_message();
                return FALSE;
            }
        }else{
            // After Login,Product added in Cart
            $quantityToAdd = 1; //  you want to add 1 item
                
            if($currentItemCount > 0 && $currentItemCount < 10){
            // Subtract the quantity from the current count
            $newItemCount = $currentItemCount + $quantityToAdd;
            // echo json_encode($currentItemCount);
            // After Login,Product added in Cart
            if($userUUID && $productUUID && $variationUUID){            
                // echo json_encode($currentItemCount);
                $this->db->set('item_count', $newItemCount, FALSE);
                $this->db->where('user_uuid', $userUUID);        
                $this->db->where('product_uuid', $productUUID);        
                $this->db->where('variation_uuid', $variationUUID);        
                $this->db->update('tbl_cart');
                return TRUE;
            }else{
                echo "Error: " .  $this->db->_error_message();
                return FALSE;
            }
        }
    // }else{ 
    //     return 'Product not in db';
    // }
        }
    }
}

public function decrementItemFromCart($productUUID, $userUUID, $variationUUID, $item_local_id=NULL)
{        
    $msg1 = 'limit exiced';

    $value = $this->currentItemCount($productUUID, $userUUID, $variationUUID, $item_local_id=NULL);

    if($value != NULL){

    $currentItemCount = (int)($value[0]['item_count']);
    // var_dump($currentItemCount);
    // die();
            
        if($item_local_id != NULL){
            // Before Login,Product added in Cart
            if($item_local_id && $productUUID){    
                // echo('here---');        
                    $this->db->set('item_count', '(item_count) - 1', FALSE);
                    // $this->db->where('product_quantity <', $total_product_quantity);
                    // $this->db->where('product_quantity >', 0);
                    $this->db->where('localstorage_id', $item_local_id);        
                    $this->db->where('product_uuid', $productUUID);        
                    $this->db->update('tbl_cart');
                return TRUE;
            }else{
                        echo "Error: " .  $this->db->_error_message();
                return FALSE;
            }
        }else{
            // After Login,Product added in Cart
            
            if($userUUID && $productUUID && $variationUUID){            
                // echo('here in login');
                $quantityToSubtract = 1; //  you want to subtract 1 item
                
                if($currentItemCount > 0 && $currentItemCount <= 10){
                // Subtract the quantity from the current count
                $newItemCount = $currentItemCount - $quantityToSubtract;
                // print_r($currentItemCount);
                $this->db->set('item_count', $newItemCount, TRUE);                
                $this->db->where('item_count >', 1);
                $this->db->where('user_uuid', $userUUID);        
                $this->db->where('product_uuid', $productUUID);        
                $this->db->where('variation_uuid', $variationUUID);              
                $this->db->update('tbl_cart');

            return TRUE;
                }else{
                    return $msg1;
                }                
            }else{
                // echo "Invalid quantity to subtract.";
                echo "Error: " .  $this->db->_error_message();
                return FALSE;
            }
       }
    // }else{
    //     return 'Product not in db';
    // }
    }
}

//======================== my cart page =========================================

public function fetch_cart_items_by_user($user_uuid)
{
    $query = "SELECT cart_id,user_uuid,product_uuid,variation_uuid,localstorage_id,product_name,product_image,product_size_id,product_size_name,product_color_id,product_color_name,product_mrp,product_selling_price,product_discount,total_quantity_inStock,item_count,created_at,updated_at,status FROM tbl_cart WHERE user_uuid='{$user_uuid}'";

    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }  
}

public function fetch_cart_items_by_user_json($user_uuid)
{
    $query = "Select user_uuid,
                     product_uuid,
                     product_name,
                     product_image,
                     item_count,
                     product_size_name,
                     product_color_name,
                     product_selling_price 
            FROM tbl_cart WHERE user_uuid='{$user_uuid}'";

    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }  
}

public function saveOrderDetailsForCOD($order_data)
{

        $this->db->set('order_uuid','UUID()', FALSE);

        if($order_data){            

            $this->db->insert('tbl_orders', $order_data);                            
            return TRUE;
        }else{
            
            $this->db->_error_message();
            return FALSE;
        }         
}

public function saveOnlinePayment($data)
{
    // die();
        $this->db->set('order_uuid','UUID()', FALSE);

        if($data){            

            $this->db->insert('tbl_orders', $data);                            
            return TRUE;
        }else{            
            $this->db->_error_message();
            return FALSE;
        }         
}

public function fetchOrderInfoByUser($user_uuid)
{
    $query = "Select * FROM tbl_orders WHERE user_uuid = '{$user_uuid}' AND order_id=(SELECT LAST_INSERT_ID())";

    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }  
}

public function fetch_order_list_for_Customer($user_uuid)
{
    $query = "SELECT order_id,
                     order_uuid,
                     product_uuid,
                     createdAt, 
                     product_name,
                     product_image,
                     product_size_name,
                     product_color_name,
                     product_selling_price,
                     product_quantity,
                     payment_method,
                     order_shipping_status,
                     order_return_status,
                     order_received_datetime
                FROM tbl_orders
                WHERE user_uuid = '$user_uuid' AND soft_delete='0' ";

    $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }  
}
/*
    Order may cancel in main_product_table and product_variation_table
*/ 
public function fetch_order_cancellation_product_info($user_uuid, $order_uuid)
{
        $query = "SELECT product_name,
                         product_uuid,                         
                         product_image,                             
                         product_mrp,
                         product_selling_price,
                         product_discount,
                         variation_uuid,
                         user_uuid,
                         order_uuid,                         
                         transaction_id,
                         product_size_id,
                         product_size_name,
                         product_color_id,
                         product_color_name,                         
                         total_product_quantity,
                         payment_method,
                         transaction_status,                         
                         conformation_code,
                         createdAt,
                         order_received_datetime,
                         order_shipping_status,
                         order_return_status
    FROM tbl_orders        
    WHERE user_uuid = '$user_uuid' AND order_uuid='$order_uuid'";     
    
    $q = $this->db->query($query);        

    if ($q->num_rows() > 0) {
        return $q->result_array();       
    }   
    else {
        return NULL;
    }  
}

public function fetch_json_info_for_order_cancellation($user_uuid, $order_uuid)
{
    $query = "SELECT productInfo_json,
                         product_uuid,                         
                         createdAt,
                         order_received_datetime
    FROM tbl_orders        
    WHERE user_uuid = '$user_uuid' AND order_uuid='$order_uuid'";     
        
    $q = $this->db->query($query);        

    if ($q->num_rows() > 0) {
        return $q->result_array();       
    }   
    else {
        return NULL;
    }  
}

public function saveShippingInfoByUser($shipping_data){
    
    $this->db->set('shipping_uuid','UUID()', FALSE);

        if($shipping_data){            

            $this->db->insert('tbl_shipping_orders', $shipping_data);                            
            return TRUE;
        }else{
            $this->db->_error_message();
            return FALSE;
        }
}

public function saveMappingData($mapping_data){
    
    if($mapping_data){            
        $this->db->insert('tbl_mapping_orderedProducts_user', $mapping_data);                            
        return TRUE;
    }else{
        $this->db->_error_message();
        return FALSE;
    }
}

public function saveUsersRatingNReviews($rating_reviews_data){
    
    $this->db->set('rating_uuid','UUID()', FALSE);

    if($rating_reviews_data){            
        $this->db->insert('tbl_rating_reviews', $rating_reviews_data);                            
        return TRUE;
    }else{
        $this->db->_error_message();
        return FALSE;
    }
}

public function fetch_reviews_rating_for_product($product_uuid)
{
    $query = "Select * FROM tbl_rating_reviews WHERE product_uuid='{$product_uuid}'";

            $q = $this->db->query($query);        

            if ($q->num_rows() > 0) {
                return $q->result_array();       
            }   
            else {
                return NULL;
            }   
}

public function fetchVerifiedBuyer($user_uuid, $product_uuid)
{
    $query = "Select shipping_status FROM tbl_mapping_orderedProducts_user 
            WHERE user_uuid='{$user_uuid}' AND  product_uuid='{$product_uuid}'";

    $q = $this->db->query($query);        

    if ($q->num_rows() > 0) {
        return $q->result_array();       
    }   
    else {
        return NULL;
    }    
}

public function fetch_product_rating_number($product_uuid)
{
    $query = "Select rating_number FROM tbl_rating_reviews 
            WHERE product_uuid='{$product_uuid}'";

    $q = $this->db->query($query);        

    if ($q->num_rows() > 0) {
        return $q->result_array();       
    }   
    else {
        return NULL;
    }    
}

public function fetch_customer_return_address($user_uuid)
{
    $query = "Select * FROM tbl_registration WHERE user_uuid='{$user_uuid}'";

    $q = $this->db->query($query);        

    if ($q->num_rows() > 0) {
        return $q->result_array();       
    }   
    else {
        return NULL;
    }    
}

public function saveCancelledOrderDetails($data)
{
   
    $this->db->set('cancellation_uuid','UUID()', FALSE);

    if($data){            
        $this->db->insert('tbl_order_cancellation', $data);                            
        return TRUE;
    }else{
        $this->db->_error_message();
        return FALSE;
    }
}

public function softDeleteCanceledOrder($order_uuid)
{
    // $data = [
    //     'soft_delete' => 1,
    //     'cancelledAt' => date('Y-m-d H:i:s')
    // ]

    $this->db->set('soft_delete', 1, FALSE);
    $this->db->where('order_uuid', $order_uuid);     
    $this->db->update('tbl_orders');

    $afftectedRows = $this->db->affected_rows();
    // var_dump($afftectedRows);
     if ($afftectedRows == 1) {
        return TRUE;
    }else{
        return FALSE;
    }         
}

public function fetch_all_cancelled_order($user_uuid)
{
    $query = "SELECT product_uuid,
                     product_name,
                     product_image,
                     product_size_id,
                     product_size_name,
                     product_color_id,
                     product_color_name,
                     product_mrp,
                     product_selling_price,
                     product_discount,
                     product_quantity,
                     transaction_status,
                     payment_method,
                     order_shipping_status,
                     order_return_status,
                     soft_delete,
                     cancelledAt
            FROM tbl_orders 
            WHERE soft_delete = '0' 
            AND user_uuid='{$user_uuid}'";

    $q = $this->db->query($query);        

    if ($q->num_rows() > 0) {
        return $q->result_array();       
    }   
    else {
        return NULL;
    }    
}

public function updateOrderReturnStatus($order_return_status, $order_uuid)
{
    $data = array(
        'order_return_status' => $order_return_status,
        'order_shipping_status' => '5',
        'cancelledAt' => date('Y-m-d H:i:s')
    );

    // also update - updatedAt - also update order_shipping_status=5
    $this->db->set($data);
    $this->db->where('order_uuid', $order_uuid);     
    $this->db->update('tbl_orders');

    $afftectedRows = $this->db->affected_rows();
    // var_dump($afftectedRows);
     if ($afftectedRows == 1) {
        return TRUE;
    }else{
        return FALSE;
    }        
}

private function getTotalProductQuantity($variationUUID, $productUUID)
{
    $query = $this->db->select('product_quantity')->from('tbl_product_variation')->where('product_uuid', $productUUID)->where('variation_uuid', $variationUUID)->get();

    if ($query->num_rows() > 0) {
        $result = $query->result_array();       
        
    }
    return $result;
}

public function updateProductQuantityAfterCancellation($variationUUID, $productUUID, $product_quantity)
{
    $total_product_quantity = $this->getTotalProductQuantity($variationUUID, $productUUID);
    
    $total_product_inStock = $total_product_quantity[0]['product_quantity'];    

    $this->db->set('product_quantity', ($total_product_inStock)-($product_quantity), FALSE);
    $this->db->where('variation_uuid', $variationUUID);     
    $this->db->where('product_uuid', $productUUID);     
    $this->db->update('tbl_product_variation');

    $afftectedRows = $this->db->affected_rows();
    // var_dump($afftectedRows);
     if ($afftectedRows == 1) {
        return TRUE;
    }else{
        return FALSE;
    }        
}

public function saveCustomerOderReturnRefundDetails($data)
{
    $this->db->set('order_return_refund_uuid','UUID()', FALSE);

    if($data){            
        $this->db->insert('tbl_order_return_refund', $data);                            
        return TRUE;
    }else{
        $this->db->_error_message();
        return FALSE;
    }
}

//======================== product filter page =========================================
    public function getRecordCount($child_cat_id, $color_flag, $price_flag, $discount_flag)
    {
       
        $query = "SELECT COUNT(product_uuid) as count From tbl_main_product WHERE status='1' AND child_cat_id='$child_cat_id' "; 
          
        
           
    //    exit($query);
        if($color_flag != 0){
         
             $query .= "AND product_color_id  LIKE '$color_flag%'";
        }

         //For price-flag = 1 ie Rs. 199 to Rs. 599 
         if($price_flag == 1){
            
            $query .= "AND product_actual_price >= '199' AND  product_actual_price <= '599'";            
        }
        
        //For price-flag = 2 ie Rs. 599 to Rs. 999
         if($price_flag == 2){
            
            $query .= "AND product_actual_price >= '599' AND  product_actual_price <= '999'";            
        }

        //For price-flag = 3 ie Rs. 999 to Rs. 1999
        if($price_flag == 3){
                    
            $query .= "AND product_actual_price >= '999' AND  product_actual_price <= '1999'";            
        }

        //For price-flag = 4 ie Rs. 1999 to Rs. 2999
        if($price_flag == 4){
                            
            $query .= "AND product_actual_price >= '1999' AND  product_actual_price <= '2999'";            
        }

        //For price-flag = 5 ie Rs. 2999 to Rs. 5999
        if($price_flag == 5){
                            
            $query .= "AND product_actual_price >= '2999' AND  product_actual_price <= '5999'";            
        }

          //For discount-flag = 1 ie 20% and above
          if($discount_flag == 1){
            
            $query .= "AND product_discount >= '20' AND  product_discount <= '100'";            
        }

        //For discount-flag = 2 ie 20% and above
        if($discount_flag == 2){
            
            $query .= "AND product_discount >= '30' AND  product_discount <= '100'";            
        }

        //For discount-flag = 3 ie 20% and above
        if($discount_flag == 3){
            
            $query .= "AND product_discount >= '50' AND  product_discount <= '100'";            
        }

        //For discount-flag = 4 ie 20% and above
        if($discount_flag == 4){
            
            $query .= "AND product_discount >= '60' AND  product_discount <= '100'";            
        }

        //For discount-flag = 5 ie 20% and above
        if($discount_flag == 5){
            
            $query .= "AND product_discount >= '70' AND  product_discount <= '100'";            
        }


        $q = $this->db->query($query);
        
        return $q->result_array()[0]['count']; 
    }


// Product-filter
public function getProductData($limit, $offset, $child_cat_id, $color_flag, $price_flag, $discount_flag)
{
    
    $query = "SELECT * FROM tbl_main_product WHERE status ='1' AND child_cat_id='$child_cat_id' ";
    //$query = "SELECT TP.product_name,TB.brand_name,TP.product_image,TP.product_brand_id,TP.product_actual_price,TP.product_mrp,TP.product_discount FROM `tbl_products` AS TP INNER JOIN tbl_brands
    //          AS TB ON TP.status = TB.status WHERE TP.status ='1'";   

    
    //    exit($query);
    if($color_flag != 0){
        
            $query .= "AND product_color_id  LIKE '$color_flag%'";
    }
 
    //For price-flag = 1 ie Rs. 199 to Rs. 599 
    if($price_flag == 1){
        
        $query .= "AND product_actual_price >= '199' AND  product_actual_price <= '599'";            
    }
    
    //For price-flag = 2 ie Rs. 599 to Rs. 999
     if($price_flag == 2){
        
        $query .= "AND product_actual_price >= '599' AND  product_actual_price <= '999'";            
    }

    //For price-flag = 3 ie Rs. 999 to Rs. 1999
    if($price_flag == 3){
                
        $query .= "AND product_actual_price >= '999' AND  product_actual_price <= '1999'";            
    }

    //For price-flag = 4 ie Rs. 1999 to Rs. 2999
    if($price_flag == 4){
                        
        $query .= "AND product_actual_price >= '1999' AND  product_actual_price <= '2999'";            
    }

    //For price-flag = 5 ie Rs. 2999 to Rs. 5999
    if($price_flag == 5){
                        
        $query .= "AND product_actual_price >= '2999' AND  product_actual_price <= '5999'";            
    }

   
   
    //For discount-flag = 1 ie 20% and above
     if($discount_flag == 1){
        
        $query .= "AND product_discount >= '20' AND  product_discount <= '100'";            
    }

    //For discount-flag = 2 ie 20% and above
    if($discount_flag == 2){
        
        $query .= "AND product_discount >= '30' AND  product_discount <= '100'";            
    }

    //For discount-flag = 3 ie 20% and above
    if($discount_flag == 3){
        
        $query .= "AND product_discount >= '50' AND  product_discount <= '100'";            
    }

    //For discount-flag = 4 ie 20% and above
    if($discount_flag == 4){
        
        $query .= "AND product_discount >= '60' AND  product_discount <= '100'";            
    }

    //For discount-flag = 5 ie 20% and above
    if($discount_flag == 5){
        
        $query .= "AND product_discount >= '70' AND  product_discount <= '100'";            
    }

        $query .= "LIMIT $offset, $limit"; //offset->No. of records to skip and it will chnge after every click to nxt pg.
        //  exit($query);
      $q = $this->db->query($query);
    
     if ($q->num_rows() > 0) {
            return $q->result_array();       
       }   
       else {
           return NULL;
       }  
}




} //class-ends

