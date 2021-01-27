<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

	protected $data;
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('user_m');

		// Redirect If Not Authenticated
		$this->session->userdata('active_user') == null ? redirect(base_url().'auth/login') : '';
		//$category == "Nothing" ?  : '';

		// Get Authenticated User
		$this->data['active_user'] = $this->session->userdata('active_user');
		//var_dump($this->session->userdata('active_user'));
		//Get User's role

	}

    /**
     * Get Active Menu
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

}
