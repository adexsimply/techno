<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends Base_Controller
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

        $this->load->model('patient_m');
        $this->load->model('nursing_m');
        $this->data['menu_id'] = 'patient';
    }
    public function index()
    {
        $this->data['title'] = "Patients";
        $this->data['patients_list'] =  $this->patient_m->get_patient_list();
        $this->load->view('patient/main', $this->data);
    }
    public function add()
    {
        $this->data['title'] = "Add Patient";
        $this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();
        $this->load->view('patient/add_patient', $this->data);
    }
    public function webcam()
    {
        $filename =  time() . '.jpg';
        $filepath = './saved_images/';

        move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath . $filename);

        echo $filepath . $filename;
    }
    public function add_patient()
    {
        $this->data['title'] = "Add Patient";
        $this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();

        if ($this->uri->segment(3)) {

            $this->data['patient_details'] = $this->patient_m->get_patient_by_id($this->uri->segment(3));
        }
        $this->load->view('patient/new_patient_modal', $this->data);
    }

    public function view()
    {
        $this->data['title'] = "View Patient";
        if ($this->uri->segment(3)) {

            $this->data['patient_billings'] =  $this->patient_m->get_patient_billings($this->uri->segment(3));
            $this->data['patient'] = $patient = $this->patient_m->get_patient_by_id($this->uri->segment(3));
            $this->data['consultations'] = $consultation = $this->patient_m->get_consultations_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['eye_clinics'] = $eye_clinics = $this->patient_m->get_eye_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['dental_clinics'] = $dental_clinics = $this->patient_m->get_dental_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['med_report'] = $med_report = $this->patient_m->get_med_report_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            //var_dump($eye_clinics);
            $this->data['title'] = "Patients";
            $this->load->view('patient/view', $this->data);
        } else {
            show_404();
        }
    }

    public function add_consultation()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->nursing_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->load->view('patient/add-consultation', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    function save_consultation()
    {
        $this->patient_m->save_consultation();
    }
    public function view_consultation()
    {
        if ($this->uri->segment(3)) {
            $this->data['consultation_details'] =  $this->patient_m->get_consultation_by_id($this->uri->segment(3));
            $this->load->view('patient/view-consultation', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function edit_consultation()
    {
        if ($this->uri->segment(3)) {
            $this->data['consultation_details'] =  $this->patient_m->get_consultation_by_id($this->uri->segment(3));
            $this->load->view('patient/add-consultation', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function delete_consultation()
    {
        $id = $this->input->post('id');
        $this->db->delete('consultations', array('id' => $id));
    }

    public function add_eye_clinic()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->nursing_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->load->view('patient/add-eye-clinic', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function save_eye_clinic()
    {
        $this->patient_m->save_eye_clinic();
    }
    public function edit_eye_clinic()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_eye_clinic_by_id($this->uri->segment(3));
            $this->load->view('patient/add-eye-clinic', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function view_eye_clinic()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_eye_clinic_by_id($this->uri->segment(3));
            $this->load->view('patient/view-eye-clinic', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function delete_eye_clinic()
    {
        $id = $this->input->post('id');
        $this->db->delete('eye_clinics', array('id' => $id));
    }
    // public function load_image() {

    // 	$this->load->view('patients/image_test', $this->data);
    // }


    public function add_dental()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->nursing_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->load->view('patient/add-dental', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function save_dental()
    {
        $this->patient_m->save_dental();
    }

    public function edit_dental_clinic()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_dental_clinic_by_id($this->uri->segment(3));
            $this->load->view('patient/add-dental', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function view_dental_clinic()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_dental_clinic_by_id($this->uri->segment(3));
            $this->load->view('patient/view-dental', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function delete_dental_clinic()
    {
        $id = $this->input->post('id');
        $this->db->delete('dental_clinics', array('id' => $id));
    }

    function patient_validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('patient_title', 'Title', 'required', array('required' => 'Please select %s.'));
        $this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
        $this->form_validation->set_rules('patient_id_num', 'Patient ID', 'required');
        $this->form_validation->set_rules('patient_gender', 'Gender', 'required');
        $this->form_validation->set_rules('patient_dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('patient_phone', 'Patient Phone Number', 'required');
        $this->form_validation->set_rules('patient_blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('patient_address', 'Address', 'required');
        // $this->form_validation->set_rules('patient_occupation', 'Patient Occupation', 'required');
        $this->form_validation->set_rules('patient_regtype', 'Registration Type', 'required');
        $this->form_validation->set_rules('nok_title', 'Title', 'required');
        $this->form_validation->set_rules('nok_name', 'Name', 'required');
        $this->form_validation->set_rules('nok_phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('nok_relationship', 'Relationship', 'required');
        $this->form_validation->set_rules('nok_address', 'Address', 'required');

        // $this->form_validation->set_rules($rules);
        // echo $this->form_validation->get_all_errors();
        if ($this->form_validation->run()) {
            header("Content-type:application/json");
            echo json_encode('success');
        } else {
            header("Content-type:application/json");
            echo json_encode($this->form_validation->get_all_errors());
        }
    }



    public function add_med_report()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->nursing_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->load->view('patient/add-med-report', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function save_med_report()
    {
        $this->patient_m->save_med_report();
    }


    function validate_image()
    {
        echo json_encode($_FILES['image']);
        // if ($_FILES['image']['error'] != 0) {
        //     $result['status'] = false;
        //     $result['message'] = array("image" => "Select image to upload");
        //     echo json_encode($result);
        // }
    }

    function upload_patient()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('patient_title', 'Title', 'required', array('required' => 'Please select %s.'));
        $this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
        $this->form_validation->set_rules('patient_id_num', 'Patient ID', 'required');
        $this->form_validation->set_rules('patient_gender', 'Gender', 'required');
        $this->form_validation->set_rules('patient_dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('patient_phone', 'Patient Phone Number', 'required');
        $this->form_validation->set_rules('patient_blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('patient_address', 'Address', 'required');
        // $this->form_validation->set_rules('patient_occupation', 'Patient Occupation', 'required');
        $this->form_validation->set_rules('patient_regtype', 'Registration Type', 'required');
        $this->form_validation->set_rules('nok_title', 'Title', 'required');
        $this->form_validation->set_rules('nok_name', 'Name', 'required');
        $this->form_validation->set_rules('nok_phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('nok_relationship', 'Relationship', 'required');
        $this->form_validation->set_rules('nok_address', 'Address', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: #ff0000;" class="form-control-feedback">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            if ($_FILES['image']['error'] != 0) {
                $result['status'] = false;
                $result['message'] = array("image" => "Select image to upload");
            } else {
                $config['upload_path']       = './uploads/';
                $config['allowed_types']     = 'gif|jpg|jpeg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $data['upload_data'] = $this->upload->data('file_name');
                    $image_name = $data['upload_data'];
                } else {
                    $image_name = '';
                }
                if (($this->input->post('patient_status') == 'private')) {
                    $patient_status = 'Private';
                } else {
                    $patient_status = $this->input->post('patient_status2');
                }

                $data = array(

                    'patient_name'         => $this->input->post('patient_name'),
                    'patient_id_num'    => $this->input->post('patient_id_num'),
                    'patient_photo'         => $image_name,
                    'patient_title'   => $this->input->post('patient_title'),
                    'patient_address'   => $this->input->post('patient_address'),
                    'patient_status'   => $patient_status,
                    'patient_occupation'   => $this->input->post('patient_occupation'),
                    'patient_religion'   => $this->input->post('patient_religion'),
                    'patient_tribe'   => $this->input->post('patient_tribe'),
                    'patient_origin'   => $this->input->post('patient_origin'),
                    'patient_regtype'   => $this->input->post('patient_regtype'),
                    'patient_blood_group'   => $this->input->post('patient_blood_group'),
                    'patient_phone'   => $this->input->post('patient_phone'),
                    'patient_dob'   => $this->input->post('patient_dob'),
                    'patient_gender'   => $this->input->post('patient_gender'),
                    'enrollee_type'   => $this->input->post('enrollee_type'),
                    'company'   => $this->input->post('company'),
                    'enrollee_no'   => $this->input->post('enrollee_no'),
                    'patient_email'   => $this->input->post('patient_email'),
                );


                $result['status'] = true;

                $this->db->insert('patient_details', $data);
                $last_id = $this->db->insert_id();

                $data2 = array(

                    'nok_title'         => $this->input->post('nok_title'),
                    'nok_name'    => $this->input->post('nok_name'),
                    'nok_address'   => $this->input->post('nok_address'),
                    'nok_relationship'   => $this->input->post('nok_relationship'),
                    'nok_phone'   => $this->input->post('nok_phone'),
                    'patient_id'   => $last_id,
                );
                $this->db->insert('patient_nok', $data2);

                $result['message'] = "Data inserted successfully.";
            }
        } else {
            $result['status'] = false;
            // $result['message'] = validation_errors();
            $result['message'] = $this->form_validation->error_array();
        }
        echo json_encode($result);
    }





    function add_history()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('case_title', 'Title', 'required', array('required' => 'Please select %s.'));
        $this->form_validation->set_rules('case_date', 'Date', 'required');
        $this->form_validation->set_rules('case_prescription', 'Prescription', 'required');
        $this->form_validation->set_rules('case_remark', 'Remark', 'required');
        $this->form_validation->set_rules('case_description', 'Description', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: #ff0000;" class="form-control-feedback">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $data = array(

                'patient_id'         => $this->input->post('patient_id'),
                'case_description'    => $this->input->post('case_description'),
                'case_remark'         => $this->input->post('case_remark'),
                'case_title'   => $this->input->post('case_title'),
                'case_prescription'   => $this->input->post('case_prescription'),
                'case_date'   => $this->input->post('case_date')
            );


            $result['status'] = true;

            $this->db->insert('patient_health_history', $data);


            $result['message'] = "Data inserted successfully.";
        } else {
            $result['status'] = false;
            // $result['message'] = validation_errors();
            $result['message'] = $this->form_validation->error_array();
        }
        echo json_encode($result);
    }

    //////////////
    public function validate_fee()
    {
        $rules = [
            [
                'field' => 'class',
                'label' => 'Class',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'duration',
                'label' => 'Duration',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'amount',
                'label' => 'Amount',
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

    public function add_fee_name()
    {
        $this->fee_m->add_fee_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }
}
