<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	function __construct() {
        parent::__construct(); 
		
		$this->load->helper('url');
        $slug = '';
        $this->load->model('Admin_model');
	}

	// Slug-generator-with-unique-id
	public static function slugify($text, string $divider = '-')
	{
	// replace non letter or digits by divider
	$text = preg_replace('~[^\pL\d]+~u', $divider, $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, $divider);

	// remove duplicate divider
	$text = preg_replace('~-+~', $divider, $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}
	
	$uniqueString = uniqid();
	//Add Random String or uniqueNo. to remove duplicate entry
		return $text.'-'.$uniqueString;
	}

	// Slug-generator-without unique-id
	public static function slugifyMain($text, string $divider = '-')
	{
		// replace non letter or digits by divider
		$text = preg_replace('~[^\pL\d]+~u', $divider, $text);
	
		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
	
		// trim
		$text = trim($text, $divider);
	
		// remove duplicate divider
		$text = preg_replace('~-+~', $divider, $text);
	
		// lowercase
		$text = strtolower($text);
	
		if (empty($text)) {
			return 'n-a';
		}
				
			return $text;
	}


	public function index($data=0)
	{	
		$this->load->view('admin/header');		
		$this->load->view('admin/admin_login', $data);		
	}	

	public function dashboard()
	{
		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');	
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

	// upload image for ads on main page of website i.e banner
	public function uploadBanner()
	{
		$this->load->view('admin/banner');
	}

	
	public function submit_admin_login()
	{
		$data['username'] = $this->input->post('admin_username');
		$data['password'] = $this->input->post('admin_password');

		// $admin_details = $this->Admin_model->fetchAdminCredentials();
		
		$err['error_login'] = 'Error Username or Password';
		// $err2['blank_login'] = 'Invalid Username or Password';

		 
	if($data['username'] != '' && $data['password'] != ''){
		if($data['username'] == 'admin' && $data['password'] == '1111'){			
				// print_r('welcome');
				redirect(base_url('dashboard'));
			}else{
				$this->index($err);				
			}			
		}
		else{				
				$this->index($err);				
			}
	}

	public function add_categories()
	{
		
		// $data['categories_all'] = $this->Admin_model->fetch_categories_for_parent__();
		$data['categories_all'] = $this->Admin_model->showTable();
		$data['showParent'] = $this->Admin_model->showParent();
		 
		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_categories', $data);

		$this->load->view('admin/footer');
	}

	public function getParentInfo()
	{
		$parent_name = $this->input->post('parent_cat_name');
		$data['parent_category_name'] = $parent_name;
		$slug = Admin_Controller::slugify($parent_name);
		$data['slug'] = $slug;		
		$data['status'] = 1;

		$this->Admin_model->insertParentInfo($data);

		$this->session->set_flashdata('add_menu', 'Record has been added');
		redirect(base_url('add-categories'));    
	}

	public function getChildInfo()
	{		
		$child_name = $this->input->post('child_category_name');
		$data['child_category_name'] = $child_name;
		$slug = Admin_Controller::slugify($child_name);
		$data['slug'] = $slug;
		$data['fk_parent_id'] = $this->input->post('fk_parent_id');
		$data['status'] = 1;
		// print_r($data);die();
		$this->Admin_model->insertChildInfo($data);
		
		$this->session->set_flashdata('add_menu', 'Record has been added');
		redirect(base_url('add-categories'));    		
	}

	public function add_products()
	{
		$data['parent_category'] = $this->Admin_model->fetchParentCategories();
		//$data['product_sizes'] = $this->Admin_model->showSizes();
		//$data['product_colors'] = $this->Admin_model->showColors();

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_products', $data);

		$this->load->view('admin/footer');
	}

	public function getCategories_ajax()
	{
		$main_parent_cat = $this->input->post('main_parent_cat');
		$categoriesList = $this->Admin_model->fetchCategoriesByParentId($main_parent_cat);
		
		echo (json_encode($categoriesList));
	}

	public function add_custom_sizes()
	{
		$data['parent_category'] = $this->Admin_model->fetchParentCategories();
		$data['showCustomSizeByProductCategory'] = $this->Admin_model->displayCustomSizeWithProductCategory();

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_custom_sizes', $data);

		$this->load->view('admin/footer');
	}

	public function submit_custom_sizes()
	{
		$data['parent_category_id'] = $this->input->post('parent_cat_id');
		$data['child_category_id'] = $this->input->post('child_cat_id');
		$data['size_name'] =  $this->input->post('custom_size_name');
		$data['label'] =  $this->input->post('custom_size_label');

		$size_status = $this->Admin_model->saveCustomSize($data);
		
		if($size_status){
			redirect(base_url('add-size'));   
		}
	}

	public function add_custom_colors()
	{		 
		$data['show_avilable_color'] = $this->Admin_model->fetchAllColors();
		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_custom_colors', $data);

		$this->load->view('admin/footer');
	}

	public function submit_custom_color()
	{
		$data['color_name'] = $this->input->post('color_name');
		$data['hex_code'] = strtoupper($this->input->post('colorPicker'));

		$color_status = $this->Admin_model->saveCustomColor($data);
				
		if($color_status){
			redirect(base_url('add-color'));   
		}
	}

	public function show_product_list()
	{
		$data['product_list'] = $this->Admin_model->fetchProductList();

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/product_list', $data);

		$this->load->view('admin/footer');
	}

	public function showMainProductList()
	{
		$data['product_list'] = $this->Admin_model->fetchMainProductDetails();

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/main_product_list', $data);

		$this->load->view('admin/footer');
	}

	public function add_variation($product_uuid)
	{
		// print_r($product_uuid);
		$data['selected_product'] = $this->Admin_model->fetchSingleProduct($product_uuid);
		
		// print_r($data['selected_product'][0]);

		$parent_cat_id = $data['selected_product'][0]->parent_cat_id;
		$child_cat_id =  $data['selected_product'][0]->child_cat_id;
		
		$data['product_sizes'] = $this->Admin_model->showSizesAccordingToCategory($parent_cat_id, $child_cat_id);
	//	print_r($data['product_sizes']);
		//$data['product_sizes'] = $this->Admin_model->showSizes();
		
		$data['product_colors'] = $this->Admin_model->showColors();
		
		$data['variation'] = $this->Admin_model->fetchProductVariationDetails($product_uuid);

		// $data['product_sizes_obj'] = $this->Admin_model->showSizes_Obj();
		// $value = $data['product_sizes_obj'];

		// $obj = [];

		// foreach($value as $val){
			
		// 	$size_id = $val['size_id'];
			
		// 	$obj.array_push($val['size_id'],$val['size_id']);
		// }
		// var_dump($obj);
		// die();
		
		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_variation', $data);

		$this->load->view('admin/footer');
	}
// ============================= Add Product Images =================================

	public function add_images($product_uuid)
	{
		// print_r($product_uuid);
		$data['selected_product'] = $this->Admin_model->fetchSingleProduct($product_uuid);
		$data['show_main_product_images'] = $this->Admin_model->fetchAllMainProductImages($product_uuid);
		
		$data['showSelectedMainProductImages'] = $this->Admin_model->showSelectedMainProductImages($product_uuid);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_images', $data);

		$this->load->view('admin/footer');

	}

	 // Store image for add_image to each product(for product details page)
		public function store_image()
		{
			$tmp_file = '';
			try{
				$imgId="img";
				$tmp_file=$_FILES["files"]["tmp_name"];
				$file_name=$_FILES["files"]["name"];
			
				if($tmp_file!=null){
					
					$length=count($tmp_file);
					
					$uploadedlength=0;
					
					for($i=0; $i<count($tmp_file); $i++){
	
						$filename = explode(".",$file_name[$i]);
	
						$ext = end($filename);
	
						$newfileName = $imgId."-".uniqid().".".$ext;
						$path = "upload_img/".$newfileName;
	
						if(in_array($ext,array('jpeg','jpg','png','gif'))){
	
							if(move_uploaded_file($tmp_file[$i],"./".$path)){
							   $uploadedlength++;
							}
							else{
								// failed to upload
								echo "failed to upload";
							}
						}
						else{
								echo "Wrong file format";
						}
					}
	
					if($uploadedlength == $length){
						//echo($newfileName);die();							 

			$data = array(									
				//for product_color and product_color_name	
				'product_id' => $this->input->post('product_id'),
				'product_uuid' => $this->input->post('product_uuid'),
				'main_product_image' => isset($newfileName)?$newfileName:0
				);
				// var_dump($data);die();
				//sending image file to model						
				$result_set =  $this->Admin_model->saveImagesForMainProduct($data);
				if($result_set){
					redirect(base_url('product-list')); 
				}							 
					}
					else{
						echo "Failed to upload file";
					}
				}
				else{
					echo "File NOT found to upload";
				}
			}
			catch(Exception $e){
				echo "Internal Server Error";
			}	
		}

		// EDIT---Storing main image for edit-main-image
		public function store_main_image()
		{
			$tmp_file = '';
			
			try{
				var_dump(array_key_exists('uploadedFile', $_FILES)); 

				// var_dump(($_FILES['files']['name']));die();
			$fileStatus = array_key_exists('uploadedFile', $_FILES);

			// echo "File Status: ".$fileStatus." <-";
			// die();
			if($fileStatus){
				$imgId="edit";
				$tmp_file = $_FILES["uploadedFile"]["tmp_name"];				
				$file_name = $_FILES["uploadedFile"]["name"];
			
				if($tmp_file != null){
					
					// $length=count($tmp_file);
					// var_dump($length);
					// var_dump($tmp_file);die();
					$uploadedlength=0;
					
					// for($i=0; $i<count($tmp_file); $i++){
	
						$filename = explode(".",$file_name);
	
						$ext = end($filename);
	
						$newfileName = $imgId."-".uniqid().".".$ext;
						$path = "uploads/".$newfileName;
	
						if(in_array($ext,array('jpeg','jpg','png','gif'))){
	
							if(move_uploaded_file($tmp_file,"./".$path)){
							   $uploadedlength++;
							}else{
								// failed to upload
								echo "failed to upload";
							}
						}else{
								echo "Wrong file format";
						}
						
	
		if($uploadedlength == 1){
						// echo($uploadedlength);die();							 
			$data = array(									
				// For Main Product images
				'product_id' => $this->input->post('product_id'),
				'product_uuid' => $this->input->post('product_uuid'),
				'product_main_image' => ($newfileName != null) ? $newfileName : 0
				);
				// var_dump($data);die();
				//sending image file to model						
				$result_set =  $this->Admin_model->editMainProductImage($data);
				// var_dump($result_set);die();
				
			if($result_set){
					redirect(base_url('product-list')); 
					}else{
						echo("Error");
						//redirect(base_url('product-list')); 
					}
			}else{
				echo "Failed to upload file";
			}
		}else{		
				echo "FILE NOT found to upload";
			}
		}else{//key exist
			echo "files Key Not exist...";
		}
	}
		catch(Exception $e){
			echo "Internal Server Error";
		}	
	}


		public function store_image___notusing()
		{
			$data = [];		
	
			$count_img = count($_FILES['files']['name']);
			// print_r($count_img);
			if($count_img <= 6){
	
			for($i=0; $i < $count_img; $i++)
			{   
				if(!empty($_FILES['files']['name'][$i])){
				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type']= $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name']= $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error']= $_FILES['files']['error'][$i];
				$_FILES['file']['size']= $_FILES['files']['size'][$i];  
				
				$config['upload_path']   = './upload_img/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = '10000000';
				$config['file_name'] 	 = $_FILES['files']['name'][$i];
				// $config['overwrite']     = FALSE;			
	
				$this->upload->initialize($config);
				//$this->load->library('upload', $config);
	
					if($this->upload->do_upload('file')){
						$uploadedData = $this->upload->data();
						$filename = $uploadedData['file_name'];
	
						$data['totalFiles'][] = $filename;
						// print_r($data['totalFiles']);
					}else{
						$error = array('error' => $this->upload->display_errors());						   
						print_r($error);
						
					}
				}
			}
		}else{
			print_r("mx=6");die();
		}
			// var_dump($_FILES);
			echo("<pre/>");
			// print_r($data['totalFiles']);
			$dataInfo = $data['totalFiles'];
			// print_r($dataInfo[0]);
			// die();
			$data = array(
				'product_id' => $this->input->post('product_id'),
				'product_uuid' => $this->input->post('product_uuid'),
				'prd_img_1' => isset($dataInfo[0])?$dataInfo[0]:0,
				'prd_img_2' => isset($dataInfo[1])?$dataInfo[1]:0,
				'prd_img_3' => isset($dataInfo[2])?$dataInfo[2]:0,
				'prd_img_4' => isset($dataInfo[3])?$dataInfo[3]:0,
				'prd_img_5' => isset($dataInfo[4])?$dataInfo[4]:0,
				'prd_img_6' => isset($dataInfo[5])?$dataInfo[5]:0,
				// 'created_time' => date('Y-m-d H:i:s')
			 );
			 print_r($data);
			//  die();
			 $result_set =  $this->Admin_model->saveMultipleImagesForMainProduct($data);
			 if($result_set){
				redirect(base_url('product-list'));    
			 }else{
				print_r('errorr');
				die();
			 }
		}
// ============================= End Add Product Images =================================


// ============================ Add Colored Images For Product ==========================

	public function add_colored_images($product_uuid)
	{
		// print_r($product_uuid);
		$data['selected_product'] = $this->Admin_model->fetchSingleProduct($product_uuid);
		$data['product_colors'] = $this->Admin_model->showColorsByVariationTable($product_uuid);
		
		$data['colored_images'] = $this->Admin_model->showAllColorsVariation($product_uuid);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_colored_images', $data);

		$this->load->view('admin/footer');

	}

	public function add_color_variation_images($product_uuid)
	{
		// print_r($product_uuid);
		$data['selected_product'] = $this->Admin_model->fetchSingleProduct($product_uuid);
		//$data['product_colors'] = $this->Admin_model->showColorsByVariationTable($product_uuid);
		
		//avilable_size_var (Price will same)
		$data['avilable_size_variation'] = $this->Admin_model->fetchAvilableSizeVariation($product_uuid);

		$data['colored_images'] = $this->Admin_model->showAllColorsVariation($product_uuid);
		$data['showSelectedColoredImages'] = $this->Admin_model->showSelectedColoredImages($product_uuid);


		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/add_color_variation_images', $data);

		$this->load->view('admin/footer');
	}

	//Save color variation image for  product
	public function store_colored_image()
	{
		try{
            $imgId="img";
            $tmp_file=$_FILES["files"]["tmp_name"];
            $file_name=$_FILES["files"]["name"];
		
			if($tmp_file!=null){
				
				$length=count($tmp_file);
				
				$uploadedlength=0;
                
				for($i=0; $i<count($tmp_file); $i++){

                    $filename = explode(".",$file_name[$i]);

					$ext = end($filename);

					$newfileName = $imgId."-".time().".".$ext;
                    $path = "colors_img/".$newfileName;

                    if(in_array($ext,array('jpeg','jpg','png','gif'))){

                        if(move_uploaded_file($tmp_file[$i],"./".$path)){
                           $uploadedlength++;
                        }
                        else{
							// failed to upload
							echo "failed to upload";
                        }
                    }
                    else{
                            echo "Wrong file format";
                    }
                }

				if($uploadedlength == $length){
                    //echo($newfileName);die();
                    
		$result_explode_size = $this->input->post('product_size');
		$result_explode_size = explode('_', $result_explode_size);				

		$result_explode_color = $this->input->post('product_color');
		$result_explode_color = explode('_', $result_explode_color);				

		$data = array(									
			//for product_color and product_color_name	
			'product_uuid' => $this->input->post('product_uuid'),		
			
			'size_uuid' => 	$result_explode_size[0],
			'product_size' => $result_explode_size[1],
			'product_size_label' => $result_explode_size[2],			
			'variation_color_id' => $result_explode_color[0]?$result_explode_color[0]:0,
			'variation_color_name' => $result_explode_color[1]?$result_explode_color[1]:0,
			'variation_uuid' => $result_explode_color[2]?$result_explode_color[2]:0,		

			'product_color_img' => isset($newfileName)?$newfileName:0
		);
                    //sending image file to model
                 //   print_r($data);die();
					$result_set =  $this->Admin_model->saveColorVariationImagesForProduct($data);
					if($result_set){
						redirect(base_url('product-list')); 
					}	
                     
				}
				else{
					echo "Failed to upload file";
				}
            }
            else{
                echo "File note found to upload";
            }
        }
        catch(Exception $e){
            echo "Internal Server Error";
        }

	}

	public function store_colored_image__temp()
	{
		$data = [];		
		// time()
    	$count_img = count($_FILES['files']['name']);
		// print_r($count_img);
		if($count_img <= 6){

		for($i=0; $i < $count_img; $i++)
		{   
			if(!empty($_FILES['files']['name'][$i])){
			$_FILES['file']['name'] = $_FILES['files']['name'][$i];
			$_FILES['file']['type']= $_FILES['files']['type'][$i];
			$_FILES['file']['tmp_name']= $_FILES['files']['tmp_name'][$i];
			$_FILES['file']['error']= $_FILES['files']['error'][$i];
			$_FILES['file']['size']= $_FILES['files']['size'][$i];  
			
			$config['upload_path']   = './colors_img/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']      = '10000000';
			$config['file_name'] 	 = $_FILES['files']['name'][$i];
			// $config['overwrite']     = FALSE;			

			$this->upload->initialize($config);
			//$this->load->library('upload', $config);

				if($this->upload->do_upload('file')){
					$uploadedData = $this->upload->data();
					$filename = $uploadedData['file_name'];

					$data['totalFiles'][] = $filename;
					// print_r($data['totalFiles']);
				}else{
					$error = array('error' => $this->upload->display_errors());						   
					print_r($error);
					
				}
			}
		}
	}else{
		print_r("mx=6");die();
	}
		// var_dump($_FILES);
		// echo("<pre/>");
		// print_r($data['totalFiles']);
		$dataInfo = $data['totalFiles'];
		// print_r($dataInfo[0]);
		// die();
		$result_explode_color = $this->input->post('product_color');
		$result_explode_color = explode('_', $result_explode_color);
		
		$data = array(						
			
			//for product_color and product_color_name	
			'product_uuid' => $this->input->post('product_uuid'),		
			'variation_color_id' => $result_explode_color[0],
			'variation_color_name' => $result_explode_color[1],
			'variation_uuid'=> $result_explode_color[2],
		
			'product_color_img' => isset($dataInfo[0])?$dataInfo[0]:0

			// 'prod_color_img2' => isset($dataInfo[1])?$dataInfo[1]:0,
			// 'prod_color_img3' => isset($dataInfo[2])?$dataInfo[2]:0,
			// 'prod_color_img4' => isset($dataInfo[3])?$dataInfo[3]:0,
			// 'prod_color_img5' => isset($dataInfo[4])?$dataInfo[4]:0,			
			// 'created_time' => date('Y-m-d H:i:s')
		);
		//  print_r($data);
		//  die();
		$result_set =  $this->Admin_model->saveColorVariationImagesForProduct($data);
		 if($result_set){
			redirect(base_url('product-list'));    
		 }else{
			print_r('errorr= data not inserted successfully');
			die();
		 }
	}

	public function show_color_selected_by_dd_size_ajax()
	{
		$product_uuid = $this->input->post('product_uuid');
		$size_name = $this->input->post('size_name');

		$data = $this->Admin_model->fetchSelectedColorByDDSize($product_uuid, $size_name);

		echo json_encode($data);
	}

	//============================== For Main Product Image ===========================

	public function setMainproductImageToChecked()
	{
		$id = $this->input->post('checked_id'); //id => product_color_uuid
	
		$updatedValue = $this->Admin_model->updateMainProductImgToChecked(json_encode($id));
 
		print_r(($updatedValue));
 
		//    print_r(json_encode($id));
	}
	//============================== End Main Product Image ================================

	//============================== For Product Variation Image ===========================
	public function setColoredVariationImgToChecked()
	{
		$id = $this->input->post('checked_id'); //id => product_color_uuid
        
        $updatedValue = $this->Admin_model->updateColoredVariationImgToChecked(json_encode($id));
	 
        print_r(($updatedValue));
     
    //    print_r(json_encode($id));
	}

	public function setColoredVariationImgToUnChecked()
	{
		$ids = $this->input->post('checked_id'); //id => product_color_uuid
        
        if($ids){
            $updatedStatus = $this->Admin_model->updateColoredVariationImgToUnChecked(json_encode($ids));
           
            //print_r(gettype($deletedphoto));die(); //return bool
           
            // if($deletedphoto){ // true
            //     foreach($ids as $id){
            //       //  print_r(($id));die(); 
            //        // Remove files from the server  
            //        unlink('colors_img/'.$id);
            //        print_r("done");
            //     }
            // }
        }    
       //gettype($deletedphoto); 
        print_r(json_decode($updatedStatus));     
	}

	public function setMainProductImageToUnChecked()
	{
		$ids = $this->input->post('checked_id'); //id => product_color_uuid
        
        if($ids){
            $updatedStatus = $this->Admin_model->updateMainProductImageToUnChecked(json_encode($ids));
		}
		print_r(json_decode($updatedStatus));   
	}

	public function deleteCheckedColoredVariationImg()
	{
		$id = $this->input->post('checked_id'); //id => product_color_uuid
        //var_dump($id);die();
		$fetchImageToUnlink = $this->Admin_model->fetchImageToUnlinkForImageColorVariation(json_encode($id));
		
		
	 
		if($fetchImageToUnlink){
		//var_dump(count($fetchImageToUnlink));die();

			for($i=0; $i < count($fetchImageToUnlink); $i++)
			{
				// Remove files(image) from the server or local-folder  
				unlink("colors_img/".$fetchImageToUnlink[$i]['product_color_img']);
			}			  
		}
		
        $updatedValue = $this->Admin_model->finalDeleteColoredVariationImg(json_encode($id));
		
        print_r(($updatedValue));
	}

	public function deleteCheckedMainProductImage()
	{
		$id = $this->input->post('checked_id'); //id => product_color_uuid
        //var_dump($id);die();
		$fetchImageToUnlink = $this->Admin_model->fetchImageToUnlinkForMainProduct(json_encode($id));
		
		if($fetchImageToUnlink){
			//var_dump(count($fetchImageToUnlink));die();
	
				for($i=0; $i < count($fetchImageToUnlink); $i++)
				{
					// Remove files(image) from the server or local-folder  
					unlink("upload_img/".$fetchImageToUnlink[$i]['main_product_image']);
				}			  
			}
			
			$updatedValue = $this->Admin_model->finalDeleteMainProductImage(json_encode($id));
			
			print_r(($updatedValue));
	}

/*
	public function update_colored_image_ajax()
	{
		$config['upload_path']   = "./colors_img/";
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = '10000000';
	
		$this->upload->initialize($config);
		//$this->load->library('upload',$config);
     
		if($this->upload->do_upload("file")){

        	$data = array('upload_data' => $this->upload->data());
			//		print_r($data);
		}else{
			$error = array('error' => $this->upload->display_errors());						   
			//				print_r($error);
		}

		$data1['image_name'] = $_FILES['file']['name'];
		
		$data1['variation_uuid'] = $this->input->post('v_id');
		$data1['file_name'] = $this->input->post('file_name');
		 
		
		var_dump($data1);

		die();

		$status = $this->Admin_model->update_color_variation_img1($data1);
		echo json_encode($data1);
	}

	public function delete_colored_image_ajax()
	{
		$v_id_with_img_name = $this->input->post('v_id_with_img_name');

		$value = explode('_', $v_id_with_img_name);
		
		$variation_uuid = $value[0];
		$image_name = $value[1];

		$status = $this->Admin_model->delete_color_variation_img($variation_uuid, $image_name);

		echo json_encode($status);
	}
*/

// ================== End Add Colored Images For Product ==========================	

	public function article_no($length) {
		$characters = '0123456789@#$&$ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[random_int(0, $charactersLength - 1)];
		}
		return 'ART'.$randomString;
	}

	public function submit_products()
	{
		$data['product_name'] = $this->input->post('product_name');
		// print_r($data);die();
		$slug_product = $data['product_name'];
		$data['slug_product'] = Admin_Controller::slugify($slug_product);
		$data['brand_name'] = 'FifthObject';
		$data['article_no'] = $this->article_no(7);
		$data['parent_cat_id'] = $this->input->post('parent_cat_id');
		//for child_id and slug
		$result_explode = $this->input->post('child_cat_id');
		$result_explode = explode('|', $result_explode);
		$data['child_cat_id'] = $result_explode[0];
		$data['slug_cat_child'] = $result_explode[1];				
		
		$data['product_short_description'] = $this->input->post('product_short_description');
		$data['product_long_description'] = $this->input->post('product_long_description');
			
		$data['product_mrp'] = $this->input->post('product_mrp');
		$data['product_selling_price'] = $this->input->post('product_selling_price');
		$data['discount_percentage'] = $this->input->post('discount_percentage');

		// Image upload
			if(!empty($_FILES['userfile']['name'])){ 
				   // Set preference 
				//    $config['upload_path']          =  base_url('images');
				//    $config['upload_path']          =  base_url().'uploads/';
				   $config['upload_path']          =  './uploads/';
				   $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp|esp';
				   $config['max_size']             = 100000; //in kbs
				//    $config['max_width']            = 1024;
				//    $config['max_height']           = 768;
			
				//    $this->load->library('upload', $config);
				   $this->upload->initialize($config);	
				
				   if ( ! $this->upload->do_upload('userfile'))
				   {
						
					$error = array('error' => $this->upload->display_errors());						   
						print_r($error);						
				   }
				   else
				   {
			$image_data = array('upload_data'=>$this->upload->data());						
				   } 
				}else{ 
					   $image_data['response'] = 'failed-2'; 					
				} 

				$data1['product_main_image'] = $image_data['upload_data']['file_name'];
				$data['product_main_image'] = isset($data1['product_main_image'])?$data1['product_main_image']:"default_img.jpeg";
				// var_dump($data);
				// die();
		$saveProductDetails = $this->Admin_model->saveProductDetails($data);
		redirect(base_url('add-products'));    
		}
	
	
	public function submit_product_variation_ajax()
	{
		$data['product_id'] = $this->input->post('product_id');
		$data['product_uuid'] = $this->input->post('product_uuid');		

		//for product_size and product_size_name
		$result_explode_size = $this->input->post('product_size');
		$result_explode_size = explode('_', $result_explode_size);
		$data['size_uuid'] = $result_explode_size[0];
		$data['product_size'] = $result_explode_size[1];	
		$data['product_size_label'] = $result_explode_size[2];	
		
		//for product_color and product_color_name
		$result_explode_color = $this->input->post('product_color');
		$result_explode_color = explode('_', $result_explode_color);
		$data['product_color'] = $result_explode_color[0];
		$data['product_color_name'] = $result_explode_color[1];		
		$data['product_hex_code'] = $result_explode_color[2];

		$data['product_quantity'] = $this->input->post('product_quantity');
		$data['product_mrp'] = $this->input->post('product_mrp');
		$data['product_selling_price'] = $this->input->post('product_selling_price');
		$data['discount_percentage'] = $this->input->post('discount_percentage');
		$data['isMain'] = $this->input->post('is_main');

		$saveProductDetails = $this->Admin_model->saveProductVariationDetails($data);
				
		// echo json_encode($data);
		echo json_encode($saveProductDetails);
		// show notification for product upload successsubmit_product_variation
		// $this->add_variation($data['product_uuid']);
		//redirect(base_url('add-variation/').$data['product_uuid']); 
	}

	public function show_shipping()
	{
		// $data['shipping_info'] = $this->Admin_model->showShippingInfo();
		$data['order_details'] = $this->Admin_model->showOrderMadeByCustomers();
		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		
		// main-contain
		$this->load->view('admin/show_shipping', $data);

		// $this->load->view('admin/footer');	
	}

	public function show_shipping_status()
	{
		$this->load->view('admin/header');	
		$this->load->view('status');	
	}

	public function update_shipping_status()
	{
		$conformation_code = $this->input->post('conformation_code');
		
		$updatedStatus = $this->Admin_model->checkForUpdateShipping($conformation_code);

		if($updatedStatus == TRUE){
			var_dump("Status_updated");die();
		}else{
			print_r('Not Status_updated');
		}
		
	}
	
	public function show_cancellation()
	{		 
		$data['order_cancellation_before_shipped'] = $this->Admin_model->order_cancellation_before_shipped();

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');		
		// main-contain
		$this->load->view('admin/show_order_cancellation', $data);
		$this->load->view('admin/footer');	
	}

	public function show_total_stocks(){
		
		$data['total_stocks'] = $this->Admin_model->total_stocks();

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		
		// main-contain
		$this->load->view('admin/total_stock_inventory', $data);

		$this->load->view('admin/footer');	
	}

	public function edit_product_with_variation($product_uuid, $variation_uuid)
	{		
		$data['productsWithVariations'] = $this->Admin_model->fetchProductsWithVariations($product_uuid, $variation_uuid);

		$data['selected_product'] = $this->Admin_model->fetchSingleProduct($product_uuid);
		
		// print_r($data['selected_product'][0]);

		$parent_cat_id = $data['selected_product'][0]->parent_cat_id;
		$child_cat_id =  $data['selected_product'][0]->child_cat_id;
		
		$data['product_sizes'] = $this->Admin_model->showSizesAccordingToCategory($parent_cat_id, $child_cat_id);

		// $data['getProductVariationBySelectedId'] = $this->Admin_model->getProductVariationBySelectedId($variation_uuid);

		$data['product_colors'] = $this->Admin_model->showColors();
		
		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		$this->load->view('admin/edit_product_variation', $data);		
		$this->load->view('admin/footer');	
	}

	 
	public function update_product_with_variation($product_uuid, $variation_uuid)
	{	
		// Color
		$result_explode_color_v = $this->input->post('product_color_v');
		$result_explode_color_v = explode('_', $result_explode_color_v);
		$product_variation['product_color'] = $result_explode_color_v[0];
		$product_variation['product_color_name'] = $result_explode_color_v[1];		
		$product_variation['product_hex_code'] = $result_explode_color_v[2];

		// Size
		$result_explode_size_v = $this->input->post('product_size_v');
		$result_explode_size_v = explode('_', $result_explode_size_v);
		$product_variation['size_uuid'] = $result_explode_size_v[0];
		$product_variation['product_size'] = $result_explode_size_v[1];
		$product_variation['product_size_label'] = $result_explode_size_v[2];
		
		// Quantity
		$product_variation['product_quantity'] = $this->input->post('product_quantity_v');
		// MRP
		$product_variation['product_mrp'] = $this->input->post('product_mrp_v');
		// Selling Price
		$product_variation['product_selling_price'] = $this->input->post('product_selling_price_v');
		// Discount
		$product_variation['discount_percentage'] = $this->input->post('discount_percentage_v');
		
		// var_dump($product_variation);
		// die();

		$updated_status = $this->Admin_model->update_product_with_variation($product_uuid,$variation_uuid, $product_variation);
		
		if($updated_status){
			redirect('show-stocks', 'refresh');
		}else{
			echo('Product variation not updated');
		}		
	}

	public function delete_product_with_variation($product_uuid, $variation_uuid)
	{
		$deleteStatus = $this->Admin_model->deleteProductWithVariation($product_uuid,$variation_uuid);
		
		if($deleteStatus){
			redirect(base_url('show-stocks'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_main_product_image($product_uuid)
	{
		// print_r($product_uuid);
		$data['selected_product'] = $this->Admin_model->fetchSingleProduct($product_uuid);
		$data['show_main_product_images'] = $this->Admin_model->fetchAllMainProductImages($product_uuid);
		
		$data['showSelectedMainProductImages'] = $this->Admin_model->showSelectedMainProductImages($product_uuid);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/edit_main_product_image', $data);

		$this->load->view('admin/footer');

	}

	public function edit_main_product_details($product_uuid)
	{
		// 
		$data['selected_product_details'] = $this->Admin_model->fetchMainProductDetails_Info($product_uuid);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/edit_main_product_details', $data);

		$this->load->view('admin/footer');
	}

	public function update_main_product_details($product_uuid)
	{		
		$data['product_name'] = $this->input->post('product_name');
		$data['slug_product'] = Admin_Controller::slugifyMain($data['product_name']);
		$data['product_short_description'] = $this->input->post('product_short_description');
		$data['product_mrp'] = $this->input->post('product_mrp');
		$data['discount_percentage'] = $this->input->post('discount_percentage');
		$data['product_selling_price'] = $this->input->post('product_selling_price');
		$data['product_long_description'] = $this->input->post('product_long_description');

		$updatedValue = $this->Admin_model->updateMainProductDetails($product_uuid, $data);
		
		if($updatedValue){
			redirect(base_url('show-main-product'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_main_product($product_uuid)
	{
		$data['product_uuid'] = $product_uuid;
		
		$this->load->view('admin/header');	
		$this->load->view('admin/delete_alert', $data);
		// $this->load->view('admin/footer');
		
	}
	
	//DELETE ALL PRODUCT-DETAILS
	public function confirm_delete($product_uuid)
	{
		$deleteStatus = $this->Admin_model->deleteAllProductDetails($product_uuid);
		
		if($deleteStatus){
			redirect(base_url('show-main-product'));    
			return TRUE;
		}else{
			return FALSE;
		}						
	}

	public function edit_parent_categories($parent_cat_id)
	{
		$data['parent_cat_id'] = $parent_cat_id;
		$data['parent_cat_details'] = $this->Admin_model->fetchParentCatDetails($parent_cat_id);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/edit_parent_categories', $data);

		$this->load->view('admin/footer');
	}

	public function submit_custom_parent_category()
	{
		$data['parent_id'] = $this->input->post('parent_id');
		$data['parent_category_name'] = $this->input->post('parent_category_name');
		$data['slug'] = Admin_Controller::slugify($data['parent_category_name']);
		
		// var_dump($data);die();
		$updateParentCategory = $this->Admin_model->saveUpdatedCustomParentCategory($data);

		if($updateParentCategory){
			redirect(base_url('add-categories'));    
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function delete_parent_category($parent_cat_id)
	{
		$deleteStatus = $this->Admin_model->deleteParentCategory($parent_cat_id);
		
		if($deleteStatus){
			redirect(base_url('add-categories'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_child_category($child_id)
	{
		$data['child_id'] = $child_id;
		$data['child_cat_details'] = $this->Admin_model->fetchChildCatDetails($child_id);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/edit_child_categories', $data);

		$this->load->view('admin/footer');
	}

	public function submit_custom_child_category()
	{
		$data['child_id'] = $this->input->post('child_id');
		$data['child_category_name'] = $this->input->post('child_category_name');
		$data['slug'] = Admin_Controller::slugify($data['child_category_name']);
		
		// var_dump($data);die();
		$updateChildCategory = $this->Admin_model->saveUpdatedCustomChildCategory($data);

		if($updateChildCategory){
			redirect(base_url('add-categories'));    
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function delete_child_category($child_cat_id)
	{
		$deleteStatus = $this->Admin_model->deleteChildCategory($child_cat_id);
		
		if($deleteStatus){
			redirect(base_url('add-categories'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_custom_color($color_id)
	{		
		$data['selectedColorInfo'] = $this->Admin_model->fetchSelectedByColorInfo($color_id);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain
		$this->load->view('admin/edit_custom_color', $data);

		// $this->load->view('admin/footer');
	}

	public function submit_edited_custom_color()
	{
		$data['color_id']= $this->input->post('color_id');
		$data['hex_code']= strtoupper($this->input->post('hex_code'));
		$data['color_name']= $this->input->post('color_name');

		$updatedStatus = $this->Admin_model->saveUpdatedCustomColor($data);

		if($updatedStatus){
			redirect(base_url('add-color'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_custom_color($color_id)
	{
		$deleteStatus = $this->Admin_model->deleteCustomColor($color_id);
		
		if($deleteStatus){
			redirect(base_url('add-color'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function edit_custom_size($size_id)
	{

		$data['selectedSizeinfo'] = $this->Admin_model->fetchSelectedBySizeInfo($size_id);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain	
		$this->load->view('admin/edit_custom_size', $data);

		// $this->load->view('admin/footer');
	}

	public function submit_edited_custom_size()
	{
		$data['size_id']   = $this->input->post('size_id');
		$data['size_name'] = $this->input->post('size_name');
		$data['label']     = $this->input->post('label');
		
		// var_dump($data);die();
		
		$updatedStatus = $this->Admin_model->saveUpdatedCustomSize($data);

		if($updatedStatus){
			redirect(base_url('add-size'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_custom_size($size_id)
	{
		$deleteStatus = $this->Admin_model->deleteCustomSize($size_id);
		
		if($deleteStatus){
			redirect(base_url('add-size'));    
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	// pdfFormatTemplate for SHIPPING ORDER 
	// @ $data As $single_product_order_details
    public function pdfFormatTemplate($data){
        // print_r($data[0]);die();
        $pdfTemp = "<!DOCTYPE html>";
        $pdfTemp .= "<html>";
        $pdfTemp .= "<head>";
        $pdfTemp .= "<h2 style='text-align: center;'>";
        $pdfTemp .= "Product - Invoice";
        $pdfTemp .= "</h2>";
        $pdfTemp .= "</head>";
        $pdfTemp .= "<body>";
        $pdfTemp .= "<table style='border: 1px solid black;
        border-collapse: collapse;width:100%'>";
        $pdfTemp .= "<tbody>";
        if (is_array($data[0]) || is_object($data[0])){ 
        $pdfTemp .= "<tr>";
        $pdfTemp .= "<th style='border:1px solid black;
        border-collapse: collapse;';>Id</th>";
        $pdfTemp .= "<th style='border:1px solid black;
        border-collapse: collapse;';>Product Name</th>";
        $pdfTemp .= "<th style='border:1px solid black;
        border-collapse: collapse;';>MRP</th>";
		$pdfTemp .= "<th style='border:1px solid black;
        border-collapse: collapse;';>Address</th>";
        $pdfTemp .= "<th style='border:1px solid black;
        border-collapse: collapse;';>Invoice</th>";
        $pdfTemp .= "</tr>";
        
        $pdfTemp .= "<tr>";
        $pdfTemp .= "<td style='border:1px solid black;
        border-collapse: collapse;'>";
        $pdfTemp  .= isset($data[0]['order_uuid']) ? $data[0]['order_uuid']:'';
        $pdfTemp  .= "</td>";

        $pdfTemp .= "<td style='border:1px solid black;
        border-collapse: collapse;'>";
        $pdfTemp  .= isset($data[0]['product_name']) ? $data[0]['product_name']:'';
        $pdfTemp  .= "</td>";
                
        $pdfTemp .= "<td style='border:1px solid black;
        border-collapse: collapse;'>";
        $pdfTemp  .= isset($data[0]['product_size_name']) ? $data[0]['product_size_name']:'';
        $pdfTemp  .= "</td>";

		$pdfTemp .= "<td style='border:1px solid black;
        border-collapse: collapse;'>";
        $pdfTemp  .= $data[0]['addr_house_no'].','.$data[0]['addr_house_no'].','.$data[0]['addr_house_no'].','.$data[0]['addr_house_no'];
        $pdfTemp  .= "</td>";
        
        $pdfTemp .= "<td style='border:1px solid black;
        border-collapse: collapse;'>";
        $pdfTemp  .= isset($data[0]['product_color_name'])?$data[0]['product_color_name']:'';
        $pdfTemp  .= "</td>";
        $pdfTemp .= "</tr>";
        }
        $pdfTemp .= "</tbody>";
        $pdfTemp .= "<table>";
        $pdfTemp .= "</body>";
        $pdfTemp .= "</html>";

        return $pdfTemp;
    }

	public function fetchSingleProductOrderDetails($order_uuid){
        
		// var_dump($order_uuid);
		// die();
        //  $single_product_data = $this->InvoiceModel->getSingleProduct($id); 
    	$single_product_order_details = $this->Admin_model->getSingleProductOrderDetails($order_uuid); 
		
		$pdfFmt = $this->pdfFormatTemplate($single_product_order_details);
        // var_dump($pdfFmt);
		// die(); 
        //  print_r($pdfFmt);
        //  die();
         $this->load->library('pdf');
 
         $dompdf = new PDF();
         $dompdf->load_html($pdfFmt);
         $dompdf->render();
         $dompdf->stream("".$order_uuid.".pdf",array("Attachment"=>0));
     }

	public function editOrderStatus($order_uuid)
	{
		$data['selectedOrderStatus'] = $this->Admin_model->fetchSelectedOrderStatus($order_uuid);

		$this->load->view('admin/header');	
		$this->load->view('admin/side_nav');	
		$this->load->view('admin/top_nav');
		// main-contain	
		$this->load->view('admin/edit_order_status', $data);

		// $this->load->view('admin/footer');
	}

	public function updateOrderStatus()
	{
		$data['order_uuid']   = $this->input->post('order_uuid');
		$data['order_shipping_status'] = $this->input->post('order_shipping_status');
		
		$updatedStatus = $this->Admin_model->saveUpdatedOrderStatus($data);

		if($updatedStatus){
			redirect(base_url('show-shipping'));    
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function editReturnStatus($order_uuid)
	{
		$data['selectedOrderReturnStatus'] = $this->Admin_model->fetchSelectedOrderReturnStatus($order_uuid);

		$this->load->view('admin/header');	
		// $this->load->view('admin/side_nav');	
		// $this->load->view('admin/top_nav');
		// main-contain	
		$this->load->view('admin/edit_orderReturn_status', $data);
		// $this->load->view('admin/card_list_sample');
		// $this->load->view('admin/footer');
	}







	
	/*
	public function uploadVideos(){
        try{
            $imgId="img";
            $tmp_file=$_FILES["files"]["tmp_name"];
            $file_name=$_FILES["files"]["name"];

            if($tmp_file!=null){
				$length=count($tmp_file);
				$uploadedlength=0;
                for($i=0; $i<count($tmp_file); $i++){

                    $filename = explode(".",$file_name[$i]);

					$ext = end($filename);

					$newfileName = $imgId."-".rand().".".$ext;
                    $path = "images/".$newfileName;

                    if(in_array($ext,array('jpeg','jpg','png','gif'))){

                        if(move_uploaded_file($tmp_file[$i],"./".$path)){
                           $uploadedlength++;
                        }
                        else{
							// failed to upload
                        }
                    }
                    else{
                            echo "Wrong file format";
                    }
                }

                if($uploadedlength==$length){
                    //echo($newfileName);die();
                    
                    //sending image file to model
                    $this->Banner_Model->saveBannerPath($newfileName);
					
                    //echo "Success";
                    redirect(base_url('banner')); 
				}
				else{
					echo "Failed to upload file";
				}
            }
            else{
                echo "File note found to upload";
            }
        }
        catch(Exception $e){
            echo "Internal Server Error";
        }
    }
*/



}
