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
        $this->load->model('patient_m');
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

    public function discharge_patient()
    {

        if ($this->uri->segment(3)) {
            ////////
            $this->data['admission_details'] =  $this->patient_m->get_admission_by_id($this->uri->segment(3));
            $this->data['discharge_types'] =  $this->nursing_m->get_discharge_type_list();
            $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
            $this->load->view('nursing/discharge_patient_modal', $this->data);
        }
    }


    public function admit_patient()
    {

        if ($this->uri->segment(3)) {
            ////////

            $this->data['patients_list'] =  $this->patient_m->get_patient_list();
            $this->data['admission_details'] =  $this->patient_m->get_admission_by_id($this->uri->segment(3));
            $this->data['available_wards'] =  $this->nursing_m-> get_available_wards_list2();
            $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
            $this->load->view('nursing/admit_patient_modal', $this->data);
        }
        else {

            $this->data['patients_list'] =  $this->patient_m->get_patient_list();
            $this->data['available_wards'] =  $this->nursing_m->get_available_wards_list();
            $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
            $this->load->view('nursing/admit_patient_modal', $this->data);

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

    public function add_ward()
    {
        if ($this->uri->segment(3)) {
            $this->data['wards_type_list'] =  $this->nursing_m->get_wards_type_list();
            $this->data['ward'] = $t =  $this->nursing_m->get_ward_details_by_id($this->uri->segment(3));
            $this->load->view('nursing/new_ward_modal', $this->data);
        } else {
            $this->data['wards_type_list'] =  $this->nursing_m->get_wards_type_list();
            $this->load->view('nursing/new_ward_modal', $this->data);
        }
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
                'field' => 'BP1',
                'label' => 'BP1',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'BP2',
                'label' => 'BP2',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'temp',
                'label' => 'Temp',
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

    function validate_ward()
    {
        $rules = [
            [
                'field' => 'ward_name',
                'label' => 'Ward Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'ward_type',
                'label' => 'Group',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'doc_nurse_fee',
                'label' => 'Fee',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'feeding',
                'label' => 'Feeding',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'utility',
                'label' => 'Utility',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'ward_rate',
                'label' => 'Ward Rate',
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

    public function save_ward()
    {
        $this->nursing_m->create_new_ward();
        header('Content-Type: application/json');
        echo json_encode('success');
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
    public function filter_admission_requests()
    {
        $appointment_vitals = $this->nursing_m->get_admission_requests_list_f();

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


    ////Get Default Appointment lists for Vitals Page
    public function get_default_vitals()
    {
        $default_vitals = $this->nursing_m->get_appointment_vitals2();

        //  header("Content-type:application/json");
        echo json_encode($default_vitals);
    }

    ////Get Default Appointment lists for Vitals Page
    public function get_default_admission_requests()
    {
        $default_requests = $this->nursing_m->get_admission_requests_list_d();

        //  header("Content-type:application/json");
        echo json_encode($default_requests);
    }

    ////////Ward Occupation


    public function ward_occupation()
    {
        if ($this->uri->segment(3)) {
            $this->data['wards_type_list'] =  $this->nursing_m->get_wards_type_list();
            $this->data['service'] = $t =  $this->service_m->get_service_charges_by_id($this->uri->segment(3));
            $this->load->view('service/add', $this->data);
        } else {
            $this->data['title'] = 'Ward Occupation Matrix';
            $this->data['wards_occupation_list'] =  $this->nursing_m->get_wards_list();
            $this->load->view('nursing/ward_occupation', $this->data);

        }
    }



    function validate_admit()
    {
        $rules = [
            [
                'field' => 'admit_date',
                'label' => 'Date',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'clinic',
                'label' => 'Clinic',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'ward',
                'label' => 'Admission',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'diagnosis',
                'label' => 'Diagnosis',
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

    public function save_admit()
    {
        $this->nursing_m->create_new_admit();
        header('Content-Type: application/json');
        echo json_encode('success');
    }


    function validate_discharge()
    {
        $rules = [
            [
                'field' => 'discharge_date',
                'label' => 'Date',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'discharge_comments',
                'label' => 'Comment',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'discharge_type',
                'label' => 'Discharge Type',
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

    public function save_discharge()
    {
        $this->nursing_m->create_new_discharge();
        header('Content-Type: application/json');
        echo json_encode('success');
    }

}
