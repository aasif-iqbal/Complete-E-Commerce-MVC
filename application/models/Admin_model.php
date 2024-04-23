<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Model
 *
 * @author asif
 */
 class Admin_Model extends CI_Model{
     
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function fetchAdminCredentials()
    {        
        $query = "SELECT * FROM tbl_login WHERE role ='1'";
        
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }
    }

    public function fetch_categories_for_parent__()
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

    public function insertParentInfo($data)
    {
        if($data){
            $this->db->insert('tbl_category_patents', $data);    
        }else{
            $this->db->_error_message();
        }          
    }
   
    public function insertChildInfo($data)
    {
        if($data){
            $this->db->insert('tbl_category_children', $data);    
        }else{
            $this->db->_error_message();
        }          
    }

    public function showTable()
    {
        $query = "SELECT parent.parent_id,parent.parent_category_name,child.child_id,child.child_category_name,child.fk_parent_id FROM tbl_category_patents AS parent INNER JOIN tbl_category_children AS child ON parent.parent_id = child.fk_parent_id WHERE parent.status='1' ORDER BY parent.parent_category_name";

        $q = $this->db->query($query);        

         if ($q->num_rows() > 0) {
                return $q->result();       
           }   
           else {
               return array();
           }  
    }

    public function showParent()
    {
        $query = "SELECT parent_id,parent_category_name FROM tbl_category_patents WHERE status='1'";

        $q = $this->db->query($query);        

         if ($q->num_rows() > 0) {
                return $q->result();       
           }   
           else {
               return array();
           }  
    }    

    public function saveProductDetails($data)
    {
        $this->db->set('product_uuid','UUID()', FALSE);
        if($data){
            
            $this->db->insert('tbl_main_product', $data);    
        }else{
            $this->db->_error_message();
        }         
    }

    public function fetchProductList()
    {
        $query = "SELECT product_id,product_uuid,product_main_image,product_name,article_no FROM tbl_main_product WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
               return $q->result();       
          }   
          else {
              return NULL;
          }  
    }

    public function fetchMainProductDetails()
    {
        $query = "SELECT product_id,product_uuid,product_main_image,product_name,article_no FROM tbl_main_product WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
               return $q->result();       
          }   
          else {
              return NULL;
          }  
    }

    public function fetchSingleProduct($product_uuid)
    {
        $query = "SELECT product_id,
                         product_uuid,
                         parent_cat_id,
                         child_cat_id,                        
                         product_mrp,
                         product_selling_price,
                         discount_percentage,
                         product_name,
                         article_no,
                         product_main_image 
                  FROM tbl_main_product 
                  WHERE product_uuid='$product_uuid'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
               return $q->result();       
          }   
          else {
              return NULL;
          }  
    }
    
    public function fetchProductVariationDetails($product_id)
    {
        $query = "SELECT variant_id,
                         product_id,
                         product_uuid,
                         variation_uuid,
                         size_uuid,
                         product_size,
                         product_size_label,
                         product_color,
                         product_color_name,
                         product_mrp,
                         product_selling_price,
                         discount_percentage,
                         product_quantity,
                         isMain 
                FROM tbl_product_variation WHERE product_uuid='$product_id'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
               return $q->result();       
          }   
          else {
              return NULL;
          }    
    }

    public function saveProductVariationDetails($data)
    {
        // print_r($data);
        $this->db->set('variation_uuid','UUID()', FALSE);
        if($data){            
            $this->db->insert('tbl_product_variation', $data); 
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }            
    }

    public function saveImagesForMainProduct($data)
    {
        $this->db->set('main_image_uuid','UUID()', FALSE);
        if($data){            
            $this->db->insert('tbl_main_product_images', $data); 
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }            
        //
        // return $this->db->insert_batch('tbl_product_images',$image);
    }

    public function editMainProductImage($data)
    {
        // var_dump($data['product_uuid']);die();
        $update_main_image = array(
            'product_main_image' => $data['product_main_image']
        );

        if($data){            
                //update main_product_image                
                $this->db->where('product_uuid', $data['product_uuid']);        
                $this->db->update('tbl_main_product', $update_main_image);             
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }                     
    }


    public function fetchAllMainProductImages($product_uuid)
    {
        $query = "SELECT main_image_id,
                main_image_uuid,
                product_id,
                main_product_image,
                display_status             
            FROM tbl_main_product_images WHERE product_uuid='$product_uuid'";            
            
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }    
    }

    public function showColorsByVariationTable($product_uuid)
    {
        /*
            -If Product color is same for diff size 
            Red - Small
            Red - Medium
        */
        // Show how many variation have this Single Product
        // $query = "SELECT 
        //                 variant_id,
        //                 product_uuid,
        //                 product_color_name,
        //                 product_color, 
        //                 product_color, count(product_color)                        
        //         FROM tbl_product_variation WHERE product_uuid='$product_uuid'
        //         GROUP BY product_color HAVING COUNT(product_color) > 1";
       
       
       $query = "SELECT 
                        variant_id,
                        product_uuid,
                        variation_uuid,
                        product_color_name,
                        product_color,
                        size_uuid,
                        product_size
                    FROM tbl_product_variation WHERE product_uuid='$product_uuid'
                    GROUP BY product_color HAVING COUNT(product_color) > 0";
                    

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
               return $q->result();       
          }   
          else {
              return NULL;
          }    
    }
		
    public function saveColorVariationImagesForProduct($data){
        
        $this->db->set('product_color_uuid','UUID()', FALSE);
        
        if($data){            
            $this->db->insert('tbl_product_variation_colorImgs', $data); 
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }            
    }

    public function fetchParentCategories()
    {
        $query = "SELECT parent_id,parent_category_name,slug
                 FROM tbl_category_patents WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
               return $q->result();       
          }   
          else {
              return NULL;
          }      
    }

    public function fetchCategoriesByParentId($main_parent_cat)
    {
        $query = "SELECT child_id,child_category_name,slug
        FROM tbl_category_children WHERE status='1' AND  fk_parent_id='$main_parent_cat'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        } 
    }

    public function showSizes(){
        $query = "SELECT size_id,size_name FROM tbl_custom_size WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }
    }

    public function fetchAvilableSizeVariation($product_uuid)
    {       
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
        $query = "SELECT 
                         variation_uuid,
                         product_color, 
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

    public function showSizesAccordingToCategory($parent_cat_id, $child_cat_id)
    {
        $query = "SELECT size_uuid,
                         size_name,
                         label 
                    FROM tbl_custom_size 
                    WHERE parent_category_id = '$parent_cat_id' 
                    AND  child_category_id = '$child_cat_id'
                    AND status = '1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }
    }

    public function showSizes_Obj(){
        $query = "SELECT size_id,size_name FROM tbl_sizes WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }
    }

    public function showColors(){
        $query = "SELECT color_id,
                         color_name,
                         hex_code 
                FROM tbl_colors WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result();       
        }   
        else {
            return NULL;
        }
    }

    public function showOrderMadeByCustomers()
    {
        $query = "SELECT order_id,
                        order_uuid,
                        user_uuid,
                        product_uuid,
                        variation_uuid,
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
                        user_name,
                        user_email,
                        phone_no,
                        receivers_phone_no,
                        addr_house_no,
                        addr_locality,
                        addr_city,
                        addr_pin_code,
                        addr_state,
                        addr_country,
                        addr_type,
                        total_product_quantity,
                        total_amount,
                        transaction_id,
                        transaction_status,
                        conformation_code,
                        payment_method,
                        productInfo_json,
                        transaction_datetime,
                        createdAt,
                        updatedAt,                        
                        order_received_datetime,
                        order_shipping_status,
                        order_return_status                         
                FROM tbl_orders 
                WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }   
    }
    
    // Below Function return Single Product Details for PRINT-template
    public function getSingleProductOrderDetails($order_uuid)
    {
        $query = "SELECT order_id,
                        order_uuid,
                        user_uuid,
                        product_uuid,
                        variation_uuid,
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
                        user_name,
                        user_email,
                        phone_no,
                        receivers_phone_no,
                        addr_house_no,
                        addr_locality,
                        addr_city,
                        addr_pin_code,
                        addr_state,
                        addr_country,
                        addr_type,
                        total_product_quantity,
                        total_amount,
                        transaction_id,
                        transaction_status,
                        conformation_code,
                        payment_method,
                        productInfo_json,
                        transaction_datetime,
                        createdAt,
                        updatedAt,                        
                        order_received_datetime,
                        order_shipping_status,
                        order_return_status                         
                FROM tbl_orders 
                WHERE status='1' AND order_uuid='$order_uuid'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }
    }
    
    // don't know where to use
    public function showShippingInfo()
    {
        $query = "SELECT * FROM tbl_shipping_orders WHERE status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }
    }

    // don't know where to use
    public function checkForUpdateShipping($conformation_code)
    {
        if($conformation_code){    
                $this->db->set('shipping_status', '1', FALSE);
                $this->db->where('conformation_code', $conformation_code);        
                $this->db->update('tbl_shipping_orders');

                // update table:tbl_mapping_orderedProducts_user
                $this->db->set('shipping_status', '1', FALSE);
                $this->db->where('delivery_confirm_code', $conformation_code);        
                $this->db->update('tbl_mapping_orderedProducts_user');

            return TRUE;
        }else{
                echo "Error: " .  $this->db->_error_message();
            return FALSE;
        } 
    }

    public function total_stocks()
    {
        $query = "SELECT  mp.product_main_image,
                          mp.product_name,
                          mp.article_no,
                          mp.product_uuid,
                          pv.variation_uuid,
                          pv.product_size_label,
                          pv.product_color_name,
                          pv.product_selling_price,
                          pv.product_hex_code,
                          pv.product_quantity 
                    FROM tbl_main_product AS mp 
                    RIGHT JOIN tbl_product_variation AS pv 
                    ON mp.product_uuid = pv.product_uuid WHERE mp.status='1'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
            return $q->result_array();       
        }   
        else {
            return NULL;
        }        
    }

    public function fetchProductsWithVariations($product_uuid, $variation_uuid)
    {
        if($product_uuid && $variation_uuid){
            $query = "SELECT 
                mp.product_uuid,
                mp.product_name,
                mp.article_no,                
                mp.product_main_image,          
                (mp.product_mrp) AS main_mrp,
                (mp.product_selling_price) AS main_sp,
                (mp.discount_percentage) AS main_discount,        
                pv.variation_uuid,
                (pv.product_color) AS color_v_id,                    
                pv.product_hex_code,
                (pv.product_color_name) AS color_v,                    
                (pv.size_uuid) As size_v_id,
                (pv.product_size) As size_v,
                pv.product_size_label, 
                (pv.product_quantity) AS stocks_v,
                (pv.product_mrp) AS mrp_v,
                (pv.product_selling_price) AS sp_v,
                (pv.discount_percentage) AS discount_v                  
                FROM tbl_main_product AS mp INNER JOIN
                tbl_product_variation AS pv 
                ON mp.product_uuid = pv.product_uuid 
                AND mp.product_uuid = '$product_uuid' 
                AND pv.variation_uuid = '$variation_uuid'";
            
                $q = $this->db->query($query);        

                if ($q->num_rows() > 0) {
                    return $q->result_array();       
                }   
                else {
                    return NULL;
                } 
        }else{
            echo("Id's Not Found");
        }       
    }

    public function getProductVariationBySelectedId($variation_uuid)
    {
        $query = "SELECT 
            FROM tbl_main_product  
            WHERE status='1'";

            $q = $this->db->query($query);        

            if ($q->num_rows() > 0) {
            return $q->result_array();       
            }   
            else {
            return NULL;
            }        
    }
    public function update_product_with_variation($product_uuid, $variation_uuid, $product_variation)
    {
        // print_r($product_uuid);
        // echo('<br/>');
         
        // print_r($product_variation);
        // echo('<br/>');
        // print_r($variation_uuid);
        // die();        

        if($product_uuid && $product_variation){
            
            $updateData = array(
                'product_color' => $product_variation['product_color'],
                'product_color_name' => $product_variation['product_color_name'],
                'product_hex_code' => $product_variation['product_hex_code'],
                'size_uuid' => $product_variation['size_uuid'],
                'product_size' => $product_variation['product_size'],
                'product_size_label' => $product_variation['product_size_label'],
                'product_quantity' => $product_variation['product_quantity'],
                'product_selling_price' => $product_variation['product_selling_price'],
                'discount_percentage' => $product_variation['discount_percentage'],
            );
        }
        
        // var_dump($updateData);die();

        if($product_uuid && $variation_uuid && $updateData){    
            // UPDATE                             
            $this->db->where('variation_uuid', $variation_uuid);        
            $this->db->where('product_uuid', $product_uuid);        
            $this->db->update('tbl_product_variation', $updateData);            
            return TRUE;
        }else{
            echo "Error: " .  $this->db->_error_message();
        return FALSE;
        }
        
    }
    
    public function showAllColorsVariation($product_uuid)
    {
        $query = "SELECT    
                        product_color_uuid,  
                        product_uuid,
                        product_size,
                        product_size_label,
                        variation_uuid,
                        variation_color_id,
                        variation_color_name,
                        product_color_img                               
                 FROM tbl_product_variation_colorImgs WHERE product_uuid='$product_uuid'";
    
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
             return $q->result_array();       
        }   
        else {
             return NULL;
        }    
    }

    public function updateMainProductImgToChecked($id)
    {
        $id = str_replace('[', ' ', $id); // Replaces all spaces with hyphens.
        $id = str_replace(']', ' ', $id);

        $query = "UPDATE tbl_main_product_images SET display_status = '1' WHERE(main_image_uuid) IN($id)"; 
        
        $result = $this->db->query($query);
        
         if ($result) {
           return $result;        
           }   
           else {
               return NULL;
           }       
    }

    public function updateColoredVariationImgToChecked($id)
    {
        $id = str_replace('[', ' ', $id); // Replaces all spaces with hyphens.
        $id = str_replace(']', ' ', $id);

        $query = "UPDATE tbl_product_variation_colorImgs SET display_status = '1' WHERE(product_color_uuid) IN($id)"; 
        
        $result = $this->db->query($query);
        
         if ($result) {
           return $result;        
           }   
           else {
               return NULL;
           }       
    }


    public function updateColoredVariationImgToUnChecked($id)
    {
        $id = str_replace('[', ' ', $id); // Replaces all spaces with hyphens.
        $id = str_replace(']', ' ', $id);

        $query = "UPDATE tbl_product_variation_colorImgs SET display_status = '0' WHERE(product_color_uuid) IN($id)"; 
        
        $result = $this->db->query($query);
        
         if ($result) {
           return $result;        
           }   
           else {
               return NULL;
           }     
    }

    public function updateMainProductImageToUnChecked($id)
    {
        $id = str_replace('[', ' ', $id); // Replaces all spaces with hyphens.
        $id = str_replace(']', ' ', $id);

        $query = "UPDATE tbl_main_product_images SET display_status = '0' WHERE(main_image_uuid) IN($id)"; 
        
        $result = $this->db->query($query);
        
         if ($result) {
           return $result;        
           }   
           else {
               return NULL;
           }     
    }
    
    public function finalDeleteColoredVariationImg($id)
    {       
        // Replaces [] spaces with space for WHERE IN-Clause.
        $id = str_replace('[', ' ', $id); 
        $id = str_replace(']', ' ', $id);
   
        $query = "DELETE FROM tbl_product_variation_colorImgs  WHERE(product_color_uuid) IN ($id)"; 
        $result = $this->db->query($query);
        
         if ($result) {
                return $result;        
           }   
           else {
                return Null;
           }       
       }

       public function finalDeleteMainProductImage($id)
       {       
           // Replaces [] spaces with space for WHERE IN-Clause.
           $id = str_replace('[', ' ', $id); 
           $id = str_replace(']', ' ', $id);
      
           $query = "DELETE FROM tbl_main_product_images  WHERE(main_image_uuid) IN ($id)"; 
           $result = $this->db->query($query);
           
            if ($result) {
                   return $result;        
              }   
              else {
                   return Null;
              }       
          }
          
    public function fetchImageToUnlinkForImageColorVariation($id)
    {
        $id = str_replace('[', ' ', $id); 
        $id = str_replace(']', ' ', $id);
      //  var_dump($id);
        $query = "SELECT 
                        product_color_uuid,  
                        product_uuid,
                        variation_uuid,
                        variation_color_id,
                        variation_color_name,
                        product_color_img    
                FROM tbl_product_variation_colorImgs  
                WHERE(product_color_uuid) IN ($id)"; 
       
      
        
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
             return $q->result_array();       
        }   
        else {
             return NULL;
        }    

    }

    public function fetchImageToUnlinkForMainProduct($id)
    {
        $id = str_replace('[', ' ', $id); 
        $id = str_replace(']', ' ', $id);
      //  var_dump($id);
        $query = "SELECT 
                        main_image_uuid,  
                        product_id,                        
                        main_product_image,
                        product_uuid    
                FROM tbl_main_product_images  
                WHERE(main_image_uuid) IN ($id)"; 

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
             return $q->result_array();       
        }   
        else {
             return NULL;
        }    

    }

    public function showSelectedColoredImages($product_uuid)
    {
        $query = "SELECT    
                        product_color_uuid,  
                        product_uuid,
                        variation_uuid,
                        variation_color_id,
                        variation_color_name,
                        product_color_img                               
                 FROM tbl_product_variation_colorImgs WHERE product_uuid='$product_uuid' AND display_status='1'";
    
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
             return $q->result_array();       
        }   
        else {
             return NULL;
        }    
    }

    public function showSelectedMainProductImages($product_uuid)
    {
        $query = "SELECT main_image_id, 
                        main_image_uuid,  
                        product_uuid,
                        main_product_image                                                
                 FROM tbl_main_product_images WHERE product_uuid='$product_uuid' AND display_status='1'";
    
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
             return $q->result_array();       
        }   
        else {
             return NULL;
        }    
    }


    public function saveCustomSize($data)
    {
        $this->db->set('size_uuid','UUID()', FALSE);

        if($data){
            
            $this->db->insert('tbl_custom_size', $data);
            return TRUE;    
        }else{
            $this->db->_error_message();
        }   
    }

    public function displayCustomSizeWithProductCategory()
    {
        $query = "SELECT s.size_id,
                         s.size_name,
                         s.label,
                         p.parent_category_name,
                         c.child_category_name 
                  FROM `tbl_custom_size` AS s 
                  INNER JOIN  tbl_category_patents AS p ON s.parent_category_id = p.parent_id INNER JOIN tbl_category_children AS c ON s.child_category_id = c.child_id   WHERE s.status = 1";
         
         $q = $this->db->query($query);        

         if ($q->num_rows() > 0) {
              return $q->result_array();       
         }   
         else {
              return NULL;
         }                      
    }

    public function saveCustomColor($data)
    {
        //$this->db->set('size_uuid','UUID()', FALSE);

        if($data){
            
            $this->db->insert('tbl_colors', $data);
            return TRUE;    
        }else{
            $this->db->_error_message();
        }   
    }
    
    public function fetchAllColors()
    {
        $query = "SELECT color_id, 
                         color_name,  
                         hex_code                                                               
                 FROM tbl_colors WHERE status='1'";
    
        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
             return $q->result_array();       
        }   
        else {
             return NULL;
        }    
    }

    public function fetchMainProductDetails_Info($product_uuid)
    {
        $query = "SELECT product_id,
                         product_uuid,
                         parent_cat_id,
                         child_cat_id, 
                         slug_product,
                         slug_cat_child,
                         product_long_description,                                         product_short_description,
                         product_mrp,
                         product_selling_price,
                         discount_percentage,
                         product_name,
                         article_no,
                         product_main_image,
                         status 
                  FROM tbl_main_product 
                  WHERE product_uuid='$product_uuid'";

        $q = $this->db->query($query);        

        if ($q->num_rows() > 0) {
               return $q->result();       
          }   
          else {
              return NULL;
          }  
    }

    public function updateMainProductDetails($product_uuid, $data)
    {
                        
        $update_main_product_info = array(
            'product_name' => $data['product_name'],
            'slug_product' => $data['slug_product'],
            'product_short_description' => $data['product_short_description'],
            'product_mrp' => $data['product_mrp'],
            'discount_percentage' => $data['discount_percentage'],
            'product_selling_price' => $data['product_selling_price'],
            'product_long_description' => $data['product_long_description']
        );

        if($data && $update_main_product_info){            
                //Update 
                $this->db->where('product_uuid', $product_uuid);        
                $this->db->update('tbl_main_product', $update_main_product_info);             
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }                     
    
    }

    public function fetchParentCatDetails($parent_cat_id)
    {
        $query = "SELECT parent_id, 
                        parent_category_name,  
                        parent_category_image,
                        slug                                                           FROM tbl_category_patents 
                        WHERE parent_id='$parent_cat_id' AND status='1'";

            $q = $this->db->query($query);        

            if ($q->num_rows() > 0) {
            return $q->result_array();       
            }   
            else {
            return NULL;
            }   
    }

    public function saveUpdatedCustomParentCategory($data)
    {         		         
        $parent_id = $data['parent_id'];

        $update_parent_category = array(
            'parent_category_name' => $data['parent_category_name'],
            'slug' => $data['slug']            
        );

        if($update_parent_category){            
                //Update 
                $this->db->where('parent_id', $parent_id);        
                $this->db->update('tbl_category_patents', $update_parent_category);             
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }
    }

    public function deleteParentCategory($parent_cat_id)
    {
        if($parent_cat_id){
            $this->db->where('parent_id', $parent_cat_id);
            $this->db->delete('tbl_category_patents');	
            return TRUE;
        }else{
            $this->db->_error_message();
            return FALSE;
        }        	
    }

    public function fetchChildCatDetails($child_id)
    {
        $query = "SELECT child_id, 
                        child_category_name,  
                        fk_parent_id,
                        slug                                                           FROM tbl_category_children 
                        WHERE child_id='$child_id' AND status='1'";

            $q = $this->db->query($query);        

            if ($q->num_rows() > 0) {
            return $q->result_array();       
            }   
            else {
            return NULL;
            }   
    }

    public function saveUpdatedCustomChildCategory($data)
    {
        $child_id = $data['child_id'];

        $update_child_category = array(
            'child_category_name' => $data['child_category_name'],
            'slug' => $data['slug']            
        );

        if($update_child_category){            
                //Update 
                $this->db->where('child_id', $child_id);        
                $this->db->update('tbl_category_children', $update_child_category);             
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }
    }

    public function deleteChildCategory($child_cat_id)
    {
        if($child_cat_id){
            $this->db->where('child_id', $child_cat_id);
            $this->db->delete('tbl_category_children');	
            return TRUE;
        }else{
            $this->db->_error_message();
            return FALSE;
        }        	
    }

    public function fetchSelectedByColorInfo($color_id)
    {
     $query = "SELECT color_id, 
                        color_name,  
                        hex_code
                        FROM tbl_colors 
                        WHERE color_id='$color_id' AND status='1'";

            $q = $this->db->query($query);        

            if($q->num_rows() > 0){
                return $q->result_array();       
            }   
            else {
                return NULL;
            }      
    }

    public function saveUpdatedCustomColor($data)
    {
        $color_id = $data['color_id'];
    
        $update_color_category = array(
            'color_name' => $data['color_name'],
            'hex_code'   => $data['hex_code']            
        );

        if($update_color_category){            
                //Update 
                $this->db->where('color_id', $color_id);        
                $this->db->update('tbl_colors', $update_color_category);             
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }
    }

    public function deleteCustomColor($color_id)
    {
        if($color_id){
            $this->db->where('color_id', $color_id);
            $this->db->delete('tbl_colors');	
            return TRUE;
        }else{
            $this->db->_error_message();
            return FALSE;
        }        	
    }

    public function deleteProductWithVariation($product_uuid, $variation_uuid)
    {
        if($product_uuid && $variation_uuid){
            $this->db->where('product_uuid', $product_uuid);
            $this->db->where('variation_uuid', $variation_uuid);
            $this->db->delete('tbl_product_variation');	
            return TRUE;
        }else{
            $this->db->_error_message();
            return FALSE;
        }        	
    }

    public function deleteAllProductDetails($product_uuid)
    {
        if($product_uuid){
                $this->db->trans_start();

                // Main Product-details
                $this->db->where('product_uuid', $product_uuid);
                $this->db->delete('tbl_main_product');
                
                //Main Product Images
                $this->db->where('product_uuid', $product_uuid);
                $this->db->delete('tbl_main_product_images');
                
                // // Product-variation
                $this->db->where('product_uuid', $product_uuid);
                $this->db->delete('tbl_product_variation');
                
                // Product-variation-image
                $this->db->where('product_uuid', $product_uuid);
                $this->db->delete('tbl_product_variation_colorImgs');		

                $this->db->trans_complete();
            
                if ($this->db->trans_status() === FALSE) {
                    // Handle the error condition
                    $this->db->_error_message();
                    print_r("Error");
                    return FALSE;			
                } else {
                    // print_r("done");
                    return TRUE;
                }
            }
    }

    public function fetchSelectedBySizeInfo($size_id)
    {
        $query = "SELECT s.size_id,
                         s.size_name,
                         s.size_uuid,
                         s.label,
                         p.parent_category_name,
                         c.child_category_name 
                  FROM `tbl_custom_size` AS s 
                  INNER JOIN  tbl_category_patents AS p ON s.parent_category_id = p.parent_id INNER JOIN tbl_category_children AS c ON s.child_category_id = c.child_id WHERE s.size_id='$size_id' AND s.status = 1";
         
         $q = $this->db->query($query);        

         if ($q->num_rows() > 0) {
              return $q->result_array();       
         }   
         else {
              return NULL;
         }                      

            $q = $this->db->query($query);        

            if($q->num_rows() > 0){
                return $q->result_array();       
            }   
            else {
                return NULL;
            }      
    }

    public function saveUpdatedCustomSize($data)
    {
        $size_id = $data['size_id'];            

        $update_custom_size = array(
            'size_name' => $data['size_name'],
            'label'   => $data['label']            
        );

        if($update_custom_size){            
                //Update 
                $this->db->where('size_id', $size_id);        
                $this->db->update('tbl_custom_size', $update_custom_size);             
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }   
    }

    public function deleteCustomSize($size_id)
    {
        if($size_id){
            $this->db->where('size_id', $size_id);
            $this->db->delete('tbl_custom_size');	
            return TRUE;
        }else{
            $this->db->_error_message();
            return FALSE;
        }        	
    }

    public function fetchSelectedOrderStatus($order_uuid)
    {
        if($order_uuid){
        
            $query = "SELECT order_uuid,order_shipping_status FROM tbl_orders WHERE order_uuid='$order_uuid'";
            
            $q = $this->db->query($query);        

            if($q->num_rows() > 0){
                return $q->result_array();       
            }   
            else {
                return NULL;
            }                      
        }        	
    }

    public function saveUpdatedOrderStatus($data)
    {
        $order_uuid = $data['order_uuid'];            

        $update_order_status = array(
            'order_shipping_status' => $data['order_shipping_status'],            
        );

        if($update_order_status){            
                //Update 
                $this->db->where('order_uuid', $order_uuid);        
                $this->db->update('tbl_orders', $update_order_status);             
            return TRUE;   
        }else{
            $this->db->_error_message();
            return FALSE;
        }   
    }

    public function fetchSelectedOrderReturnStatus($order_uuid)
    {
        if($order_uuid){
        
            $query = "SELECT order_uuid,order_return_status FROM tbl_orders WHERE order_uuid='$order_uuid'";
            
            $q = $this->db->query($query);        

            if($q->num_rows() > 0){
                return $q->result_array();       
            }   
            else {
                return NULL;
            }                      
        }
    }

    public function order_cancellation_before_shipped()
    {
        return true;
    }

    /*
    public function update_color_variation_img1($data)
    {
        //var_dump($data);die();
        $image_name = $data['image_name'];
        $variation_uuid = $data['variation_uuid'];

        $query = "UPDATE tbl_product_colors SET prod_color_img1='$image_name' WHERE 
        variation_uuid='$variation_uuid'";
         
         $q = $this->db->query($query);        

         $afftectedRows = $this->db->affected_rows();
       
        if ($afftectedRows == 1) {
           return TRUE;
         }else{
           return FALSE;
       }
    }

    public function delete_color_variation_img($variation_uuid, $image_name)
    {
        $query = "UPDATE tbl_product_colors SET prod_color_img1='0' WHERE 
        variation_uuid='$variation_uuid' AND prod_color_img1='$image_name'";

        $q = $this->db->query($query);        

        $afftectedRows = $this->db->affected_rows();
       
        if ($afftectedRows == 1) {
           return TRUE;
         }else{
           return FALSE;
       }

        // if ($q->num_rows() >= 0) {
        //     return $q->result_array();       
        // }   
        // else {
        //     return NULL;
        // }   
    }
*/

/*



 */



} //class-ends



