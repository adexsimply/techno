<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacy extends Base_Controller {

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
        $this->load->model('patient_m');
        $this->data['menu_id'] = 'pharmacy';

	}

    public function prescription_requests ()
    {   
        $this->data['title'] = 'Pharmacy Requests';
        $this->data['prescription_requests_list'] =  $this->request_m->get_prescription_request_list();
        $this->data['patient_billings'] =  $this->patient_m->get_patient_billings(9);
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('pharmacy/prescription_requests', $this->data);

    }

    public function drugs()
    {
        $this->data['title'] = 'Drugs';
        $this->data['vitals_list'] =  $this->nursing_m->get_vitals_request_list();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['drug_groups_list'] =  $this->drug_m->get_drug_groups();
        $this->load->view('setting/drugs', $this->data);
    }

    public function bulk_requests ()
    {   
        $this->data['title'] = 'Pharmacy Requests';
        $this->data['pharmacy_requests_list'] =  $this->request_m->get_pharmacy_request_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('nursing/bulk_requests', $this->data);

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


    public function get_prescription_list_default()
    {
        $prescription_list = $this->request_m->get_default_prescription_pending();
        echo json_encode($prescription_list);
    }


    public function filter_prescriptions()
    {
        $prescription_list = $this->request_m->get_prescription_filtered();
        echo json_encode($prescription_list);
    }

    public function convert_date()
    {
        $date = $this->input->post('date');
        $ini_date = date_create( $date); 
        $converted_date = date_format($ini_date,"D M d, Y");
        echo json_encode($converted_date);
    }

}
