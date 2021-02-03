<?php
defined('BASEPATH') or exit('No direct script access allowed');

class appointment extends Base_Controller
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

        $this->load->model('appointment_m');
        $this->load->model('patient_m');
        $this->load->model('department_m');
        $this->load->model('nursing_m');
        $this->load->model('staff_m');
        $this->data['menu_id'] = 'appointment';
    }
    public function index()
    {
        $this->data['title'] = 'Appointments';
        $this->data['appointment_list'] =  $this->appointment_m->get_appointment_list();
        // $this->data['patient_list'] =  $this->patient_m->get_patient_names();
        $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
        $this->load->view('appointment/main', $this->data);
    }

    public function waiting_list()
    {
        $this->data['title'] = 'Waiting List';
        $this->data['vitals_list'] =  $this->nursing_m->get_appointment_vitals3();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
        $this->load->view('appointment/waiting_list', $this->data);
    }

    public function add()
    {
        $this->load->view('patients/add_patient', $this->data);
    }

    public function new_appointment()
    {
        $this->data['title'] = "Add Appointment";
        $this->data['patients_list'] =  $this->patient_m->get_patient_list();
        //$this->data['clinic_list'] =  $this->department_m->get_clinic_list();
        //$this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();

        if ($this->uri->segment(3)) {

            $this->data['patient_details'] = $this->patient_m->get_patient_by_id($this->uri->segment(3));
        }
        $this->load->view('appointment/new_appointment_modal', $this->data);
    }

    public function search_appointment()
    {
        $result = $this->appointment_m->search();
        header('Content-Type: application/json');
        echo json_encode($result);
    }


    public function new_appointment2()
    {
        $this->data['title'] = "Add Appointment";
        $this->data['patients_list'] =  $this->patient_m->get_patient_list();
        $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
        //$this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();

        if ($this->uri->segment(3)) {

            $this->data['patient_details'] = $this->patient_m->get_patient_by_id($this->uri->segment(3));
        }
        $this->load->view('appointment/new_appointment_modal2', $this->data);
    }


    public function view()
    {
        if ($this->uri->segment(3)) {

            $this->load->view('patients/view', $this->data);
        } else {
            show_404();
        }
    }

    public function delete_department_name()
    {
        $id = $this->input->post('id');
        $this->db->delete('departments', array('id' => $id));
    }

    public function delete_appointment()
    {
        $id = $this->input->post('id');
        $this->db->delete('patient_appointments', array('id' => $id));
        // $this->db->delete('vitals_request', array('appointment_id' => $id));
    }

    public function get_department_details()
    {

        $department_list = $this->department_m->get_department_by_id();
        echo "[" . json_encode($department_list) . "]";
    }






    // public function load_image() {

    // 	$this->load->view('patients/image_test', $this->data);
    // }

    function validate_new()
    {
        $rules = [
            [
                'field' => 'appointment_date',
                'label' => 'Appointment Date',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'appointment_time',
                'label' => 'Appointment Time',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'clinic',
                'label' => 'Clinic',
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

    function add_appointment()
    {
        $user_id = $this->session->userdata('active_user')->id;
        $data = array(

            'patient_id'         => $this->input->post('patient_id'),
            'appointment_date'    => $this->input->post('appointment_date'),
            'appointment_time'         => $this->input->post('appointment_time'),
            'clinic_id'   => $this->input->post('clinic')
        );


        $result['status'] = true;

        $this->db->insert('patient_appointments', $data);

        // $last_id = $this->db->insert_id();
        // if (!empty($this->input->post('vital_signs'))) {
        //     $data = array(

        //         'patient_id'         => $this->input->post('patient_id'),
        //         'appointment_id'    => $last_id,
        //         'sent_by'         => $user_id
        //     );

        //     $this->db->insert('vitals_request', $data);
        // }
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('appointment_date', 'Appointment Date', 'required');
        // $this->form_validation->set_rules('appointment_time', 'Appointment Time', 'required');
        // $this->form_validation->set_rules('clinic', 'Clinic', 'required');
        // $this->form_validation->set_error_delimiters('<div style="color: #ff0000;" class="form-control-feedback">', '</div>');
        // if ($this->form_validation->run() == TRUE) {



        //     $result['message'] = "Data inserted successfully.";
        // } else {
        //     $result['status'] = false;
        //     // $result['message'] = validation_errors();
        //     $result['message'] = $this->form_validation->error_array();
        // }
        // echo json_encode($result);
        // redirect('/appointment', 'refresh');
    }



    public function validate_department_name()
    {
        $rules = [
            [
                'field' => 'department_name',
                'label' => 'Department Name',
                'rules' => 'trim|required|is_unique[departments.department_name]'
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

    public function add_department_name()
    {

        $this->department_m->create_department_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }

    public function get_patient_list()
    {
        $patient_lists = array();

        $patients_list = $this->patient_m->get_patient_names();
        // echo "[";
        foreach ($patients_list as $patient_list) {


            $patient_lists[] = array("id" => $patient_list->id, "label" => $patient_list->patient_name);
        }

        echo json_encode($patient_lists);
    }

    public function get_patient_list2()
    {
        $patient_lists2 = array();

        $patients_list2 = $this->patient_m->get_patient_names2();
        $patient_lists2[] = array("id" => $patients_list2->id, "name" => $patients_list2->patient_name, "email" => $patients_list2->patient_email);

        echo json_encode($patient_lists2);
    }
}
