<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Base_Controller {

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
    
	public function drugs ()
	{	
        $this->data['title'] = 'Drugs';
		$this->data['vitals_list'] =  $this->nursing_m->get_vitals_request_list();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['drug_groups_list'] =  $this->drug_m->get_drug_groups();
		$this->load->view('setting/drugs', $this->data);

	}
    public function tests ()
    {   
        $this->data['title'] = 'Tests';
        $this->data['vitals_list'] =  $this->nursing_m->get_vitals_request_list();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['lab_test_list'] =  $this->setting_m->get_lab_tests();
        $this->data['lab_groups_list'] =  $this->setting_m->get_lab_groups();
        $this->load->view('setting/tests', $this->data);

    }
    public function notes ()
    {   
        $this->data['title'] = 'Handover Notes';
        $this->data['handover_notes_list'] =  $this->nursing_m->get_handover_notes_list();
        $this->load->view('nursing/handover_notes', $this->data);

    }
    public function pharmacy_requests ()
    {   
        $this->data['title'] = 'Pharmacy Requests';
        $this->data['pharmacy_requests_list'] =  $this->request_m->get_pharmacy_request_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('nursing/pharmacy_requests', $this->data);

    }
    public function operations ()
    {   
        $this->data['title'] = 'Operations';
        $this->data['pharmacy_requests_list'] =  $this->request_m->get_pharmacy_request_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['operations_wait_list'] =  $this->nursing_m->get_operations_wait_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('nursing/operations', $this->data);

    }
    public function admission ()
    {   
        $this->data['title'] = 'Admission Register';
        $this->data['pharmacy_requests_list'] =  $this->request_m->get_pharmacy_request_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['admission_requests_list'] =  $this->nursing_m->get_admission_requests_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('nursing/admission', $this->data);

    }

}
