<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drug extends Base_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		
		parent::__construct();

		$this->load->model('department_m');
        $this->load->model('nursing_m');
        $this->load->model('staff_m');
        $this->load->model('request_m');
        $this->load->model('drug_m');
        $this->load->model('setting_m');
        $this->data['menu_id'] = 'settings';

	}
    
	public function get_drug_groups ()
	{	
        $drug_groups =  $this->drug_m->get_drug_groups();

        echo json_encode($drug_groups);       

	}
    
    public function get_drug_items_by_id ()
    {   
        $drug_items =  $this->drug_m->get_drug_items_by_id();

        echo json_encode($drug_items);       

    }
}
