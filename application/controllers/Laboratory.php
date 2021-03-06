<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboratory extends Base_Controller
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
        $this->load->model('patient_m');
        $this->load->model('laboratory_m');
        $this->data['menu_id'] = 'laboratory';
    }

    public function requests_results()
    {
        $this->data['title'] = 'Laboratory Requests';
        $this->data['lab_requests_list'] =  $this->request_m->get_lab_request_list();
        $this->data['lab_specimens_list'] =  $this->laboratory_m->get_specimen_list();
        $this->data['patient_billings'] =  $this->patient_m->get_patient_billings(9);
        $this->data['drug_list'] =  $this->drug_m->get_drug_items();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['request_destinations_list'] =  $this->request_m->get_request_destinations_list();
        $this->load->view('laboratory/requests', $this->data);
    }
    public function view_request()
    {
        if ($this->uri->segment(3)) {
            $this->data['lab_requests'] = $lb =  $this->request_m->get_lab_request_by_id($this->uri->segment(3));
            $this->data['tests'] =  $this->request_m->get_lab_test_by_patient_id($lb->patient_id, $lb->lab_test_id);
            $this->data['lab_specimens_list'] =  $this->laboratory_m->get_specimen_list();
            $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
            $this->load->view('laboratory/request-modal', $this->data);
        } else {
            return redirect('laboratory/requests_results');
        }
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
    public function specimens()
    {
        $this->data['title'] = 'Specimens';
        $this->data['lab_specimens_list'] = $g =  $this->laboratory_m->get_specimen_list();
        $this->load->view('laboratory/specimen/index', $this->data);
    }
    public function add_specimen()
    {
        if ($this->uri->segment(3)) {
            $this->data['specimen'] = $this->laboratory_m->get_specimen_by_id($this->uri->segment(3));
            $this->load->view('laboratory/specimen/add', $this->data);
        } else {
            $this->load->view('laboratory/specimen/add', $this->data);
        }
    }
    public function validate_specimen()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Specimen Name',
                'rules' => 'trim|required'
            ]
        ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run()) {
            header("Content-type:application/json");
            echo json_encode('success');
        } else {
            header("Content-type:application/json");
            echo json_encode($this->form_validation->get_all_errors());
        }
    }
    public function save_specimen()
    {
        echo json_encode($this->laboratory_m->save_specimen());
    }
    public function delete_specimen()
    {
        $id = $this->input->post('id');
        $this->db->delete('lab_specimens', array('id' => $id));
    }
}
