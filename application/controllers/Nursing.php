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
        //$this->data['vitals_list'] =  $this->nursing_m->get_vitals_request_list();
        $this->data['vitals_list'] =  $this->nursing_m->get_appointment_vitals2();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
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
            $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
            $this->load->view('nursing/vitals-modal', $this->data);
        } else {
            redirect('/nursing/vitals');
        }
    }

    public function edit_vital()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->nursing_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
            $this->load->view('nursing/vitals-modal', $this->data);
        } else {
            redirect('/nursing/vitals');
        }
    }

    public function view_vital()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->nursing_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
            $this->load->view('nursing/view_vital', $this->data);
        } else {
            redirect('/nursing/vitals');
        }
    }

    public function delete_vital()
    {
        $id = $this->input->post('id');
        $this->db->delete('patient_vitals', array('id' => $id));
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


    function validate_new()
    {
        $rules = [
            [
                'field' => 'doctor_id',
                'label' => 'Doctor',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'weight',
                'label' => 'Weight',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'height',
                'label' => 'Height',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'HC',
                'label' => 'HC',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'MUAC',
                'label' => 'MUAC',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nutritional_status',
                'label' => 'Nutritional Status',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'BP',
                'label' => 'BP',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'temp',
                'label' => 'Temp',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'ANC',
                'label' => 'Urine(ANC)',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'respiration',
                'label' => 'Respiration',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'paulse',
                'label' => 'Paulse',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'SPO2',
                'label' => 'SPO2',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'RE',
                'label' => 'RE',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'LE',
                'label' => 'LE',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'LMP',
                'label' => 'LMP',
                'rules' => 'trim|required'
            ],

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

    public function add_vital()
    {
        $this->nursing_m->create_new_vital();
        header('Content-Type: application/json');
        echo json_encode('success');
    }
    public function filter_appointment()
    {
        $appointment_vitals = $this->nursing_m->get_appointment_vitals();

        header("Content-type:application/json");
        echo json_encode($appointment_vitals);
    }
    public function get_ega_edd()
    {
        $ega = $this->nursing_m->calc_ega_edd();

        //  header("Content-type:application/json");
        echo json_encode($ega);
    }
    public function get_edd()
    {
        $edd = $this->nursing_m->calc_edd();

        //  header("Content-type:application/json");
        echo json_encode($edd);
    }
}
