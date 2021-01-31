<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nursing extends Base_Controller
{

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
    public function __construct()
    {

        parent::__construct();

        $this->load->model('department_m');
        $this->load->model('nursing_m');
        $this->load->model('staff_m');
        $this->load->model('request_m');
        $this->load->model('drug_m');
        $this->data['menu_id'] = 'nursing';
    }
    public function vitals()
    {
        $this->data['title'] = 'Take Vitals';
        $this->data['vitals_list'] =  $this->nursing_m->get_vitals_request_list();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->load->view('nursing/vitals', $this->data);
    }
    public function vital_appointments()
    {
        $this->data['appointment_list'] =  $this->nursing_m->get_appointment_list();
        $this->load->view('nursing/vital_appointment_modal', $this->data);
    }
    public function take_vital()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->nursing_m->get_vital_by_id($this->uri->segment(3));
            $this->load->view('nursing/vitals-modal', $this->data);
        } else {
            redirect('/nursing/vitals');
        }
    }

    public function notes()
    {
        $this->data['title'] = 'Handover Notes';
        $this->data['handover_notes_list'] =  $this->nursing_m->get_handover_notes_list();
        $this->load->view('nursing/handover_notes', $this->data);
    }
    public function pharmacy_requests()
    {
        $this->data['title'] = 'Pharmacy Requests';
        $this->data['pharmacy_requests_list'] =  $this->request_m->get_pharmacy_request_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('nursing/pharmacy_requests', $this->data);
    }
    public function bulk_requests()
    {
        $this->data['title'] = 'Pharmacy Requests';
        $this->data['pharmacy_requests_list'] =  $this->request_m->get_pharmacy_request_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('nursing/bulk_requests', $this->data);
    }
    public function operations()
    {
        $this->data['title'] = 'Operations';
        $this->data['pharmacy_requests_list'] =  $this->request_m->get_pharmacy_request_list();
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['operations_wait_list'] =  $this->nursing_m->get_operations_wait_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('nursing/operations', $this->data);
    }
    public function admission()
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
