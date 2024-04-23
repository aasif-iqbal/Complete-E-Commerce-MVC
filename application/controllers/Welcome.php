<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function __construct() {
        parent::__construct(); 
		
		$this->load->helper('url');
        
        $this->load->model('EStore_model');
	}


	
	public function index()
	{
		// $this->load->view('welcome_message');
		
		$data['nav_categories'] = $this->EStore_model->fetch_categories_for_parent();
		 
		// $this->load->view('eStore/libs');
		// $this->load->view('eStore/__nav', $data);
		$this->load->view('eStore/nav', $data);
		$this->load->view('eStore/index');
		$this->load->view('eStore/footer');
	}

}
