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
        $this->load->model('billing_m');
        $this->load->model('department_m');
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
    public function test_confirm()
    {
        $this->data['title'] = "Add Patient";
        //$this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();
        $this->load->view('pharmacy/confirm', $this->data);
    }
    public function webcam()
    {
        $filename =  time() . '.jpg';
        $filepath = './saved_images/';

        move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath . $filename);

        echo $filepath . $filename;
    }

    public function calculate_age() {

       $age = date_diff(date_create($this->input->post('dob')), date_create('today'))->y;


       echo json_encode($age);


    }
    public function add_patient()
    {
        $this->data['title'] = "Add Patient";
        $this->data['enrollee_type_list'] =  $this->patient_m->get_enrollee_type_list();
        $this->data['states'] =  $this->patient_m->states();
        $this->data['countries'] =  $this->patient_m->countries();
        $this->data['next_of_kin_rel'] =  $this->patient_m->next_of_kin_rel();
        $this->data['salutations'] =  $this->patient_m->salutations();
        $this->data['occupations'] =  $this->patient_m->occupations();
        $this->data['religions'] =  $this->patient_m->religions();
        $this->data['tribes'] =  $this->patient_m->tribes();

        if ($this->uri->segment(3)) {

            $this->data['patient_details'] = $this->patient_m->get_patient_by_id($this->uri->segment(3));
        }
        $this->load->view('patient/new_patient_modal', $this->data);
    }

    public function view()
    {
        $this->data['title'] = "View Patient";
        if ($this->uri->segment(3)) {
             if ($this->uri->segment(4)) {

            $this->data['patient'] = $patient = $this->patient_m->get_patient_by_id_vital($this->uri->segment(3),$this->uri->segment(4));
            $this->data['patient_billings'] =  $this->patient_m->get_patient_billings($this->uri->segment(3));
            $this->data['patient_admissions'] =  $this->patient_m->get_patient_admissions($this->uri->segment(3));
            $this->data['patient_ledger'] =  $this->patient_m->get_patient_ledger($this->uri->segment(3));
            $this->data['consultations'] = $consultation = $this->patient_m->get_consultations_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
             $this->data['eye_clinics'] = $eye_clinics = $this->patient_m->get_eye_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
            $this->data['dental_clinics'] = $dental_clinics = $this->patient_m->get_dental_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
            $this->data['med_reports'] = $med_reports = $this->patient_m->get_med_report_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
            $this->data['lab_tests'] = $lab_test = $this->patient_m->get_lab_test_by_patient_id_and_vital_id2($this->uri->segment(3), $this->uri->segment(4));
            $this->data['lab_tests2'] = $lab_test2 = $this->patient_m->get_lab_test_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
            $this->data['radiologies'] = $radiology = $this->patient_m->get_radiology_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
            $this->data['prescriptions'] = $prescription = $this->patient_m->get_prescription_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
            $this->data['procedures'] = $procedure = $this->patient_m->get_procedure_by_patient_id_and_vital_id($this->uri->segment(3), $this->uri->segment(4));
            }
            else {

            $this->data['patient_billings'] =  $this->patient_m->get_patient_billings($this->uri->segment(3));
            $this->data['patient_ledger'] =  $this->patient_m->get_patient_ledger($this->uri->segment(3));
            $this->data['patient_admissions'] =  $this->patient_m->get_patient_admissions($this->uri->segment(3));
            $this->data['patient'] = $patient = $this->patient_m->get_patient_by_id($this->uri->segment(3));
            $this->data['consultations'] = $consultation = $this->patient_m->get_consultations_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['eye_clinics'] = $eye_clinics = $this->patient_m->get_eye_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['dental_clinics'] = $dental_clinics = $this->patient_m->get_dental_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['med_reports'] = $med_reports = $this->patient_m->get_med_report_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['lab_tests'] = $lab_test = $this->patient_m->get_lab_test_by_patient_id_and_vital_id2($this->uri->segment(3), $patient->vital_id);
            $this->data['lab_tests2'] = $lab_test2 = $this->patient_m->get_lab_test_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['radiologies'] = $radiology = $this->patient_m->get_radiology_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['prescriptions'] = $prescription = $this->patient_m->get_prescription_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['procedures'] = $procedure = $this->patient_m->get_procedure_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);

            }
            //var_dump($eye_clinics);
           
            $this->data['title'] = "Patients";
            $this->load->view('patient/view', $this->data);
        } else {
            show_404();
        }
    }

    public function view2()
    {
        $this->data['title'] = "View Patient";
        if ($this->uri->segment(3)) {

            $this->data['patient_billings'] =  $this->patient_m->get_patient_billings($this->uri->segment(3));
            $this->data['patient'] = $patient = $this->patient_m->get_patient_by_id($this->uri->segment(3));
            $this->data['consultations'] = $consultation = $this->patient_m->get_consultations_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['eye_clinics'] = $eye_clinics = $this->patient_m->get_eye_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['dental_clinics'] = $dental_clinics = $this->patient_m->get_dental_clinics_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['med_reports'] = $med_reports = $this->patient_m->get_med_report_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['lab_tests'] = $lab_test = $this->patient_m->get_lab_test_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['radiologies'] = $radiology = $this->patient_m->get_radiology_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
            $this->data['prescriptions'] = $prescription = $this->patient_m->get_prescription_by_patient_id_and_vital_id($this->uri->segment(3), $patient->vital_id);
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
            $this->data['vitals_list'] =  $this->nursing_m->get_appointment_vitals2();
            $this->data['vital_details'] = $h =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->data['patient'] = $patient = $this->patient_m->get_patient_by_id($h->patient_id);
            $this->data['lab_tests'] = $lab_test = $this->patient_m->get_lab_test_by_patient_id_and_vital_id2($h->patient_id, $patient->vital_id);
            $this->data['lab_tests2'] = $lab_test2 = $this->patient_m->get_lab_test_by_patient_id_and_vital_id($h->patient_id, $h->vital_id);
            $this->data['radiologies'] = $radiology = $this->patient_m->get_radiology_by_patient_id_and_vital_id($h->patient_id, $h->vital_id);
            $this->data['prescriptions'] = $prescription = $this->patient_m->get_prescription_by_patient_id_and_vital_id($h->patient_id, $h->vital_id);
            $this->data['med_reports'] = $med_reports = $this->patient_m->get_med_report_by_patient_id_and_vital_id($h->patient_id, $h->vital_id);
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
            $this->data['consultation_details'] = $v = $this->patient_m->get_consultation_by_id($this->uri->segment(3));
            $this->data['vital_details'] = $h =  $this->patient_m->get_edit_vitals_request_by_id($v->vital_id);
            $this->data['drugs'] = $this->patient_m->drugs();
            $this->data['patient'] = $patient = $this->patient_m->get_patient_by_id($h->patient_id);
            $this->data['lab_tests'] = $lab_test = $this->patient_m->get_lab_test_by_patient_id_and_vital_id($h->patient_id, $patient->vital_id);
            $this->data['radiologies'] = $radiology = $this->patient_m->get_radiology_by_patient_id_and_vital_id($h->patient_id, $patient->vital_id);
            $this->data['prescriptions'] = $prescription = $this->patient_m->get_prescription_by_patient_id_and_vital_id($h->patient_id, $patient->vital_id);
            $this->data['med_reports'] = $med_reports = $this->patient_m->get_med_report_by_patient_id_and_vital_id($h->patient_id, $patient->vital_id);
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
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
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
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
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
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->load->view('patient/add-med-report', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function add_admission()
    {

        if ($this->uri->segment(3)) {
            ////////
            $this->data['admission_details'] =  $this->patient_m->get_admission_by_id($this->uri->segment(3));
            $this->data['available_wards'] =  $this->nursing_m->get_available_wards_list();
            $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
            $this->load->view('patient/add_admission_modal', $this->data);
        }
        else {

            $this->data['available_wards'] =  $this->nursing_m->get_available_wards_list();
            $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
            $this->load->view('patient/add_admission_modal', $this->data);

        }
    }

    public function save_med_report()
    {
        $this->patient_m->save_med_report();
    }

    public function edit_med_report()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_med_report_by_id($this->uri->segment(3));
            $this->load->view('patient/add-med-report', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function view_med_report()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_med_report_by_id($this->uri->segment(3));
            $this->load->view('patient/view-med-report', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function delete_med_report()
    {
        $id = $this->input->post('id');
        $this->db->delete('med_reports', array('id' => $id));
    }

    public function add_pdf()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->load->view('patient/add-pdf', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    function validate_pdf_form()
    {
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('pdf', 'PDF', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run()) {
            header("Content-type:application/json");
            echo json_encode('success');
        } else {
            header("Content-type:application/json");
            echo json_encode($this->form_validation->get_all_errors());
        }
    }

    function validate_pdf()
    {
        if ($_FILES['pdf']['error'] != 0) {
            $result['status'] = false;
            $result['message'] = array("pdf" => "Select pdf to upload");
            echo json_encode($result);
        }
    }

    public function save_pdf()
    {
        $this->patient_m->save_pdf();
    }

    public function add_image()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->load->view('patient/add-image', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    function validate_image()
    {
        //echo json_encode($_FILES['image']);
        if ($_FILES['image']['error'] != 0) {
            $result['status'] = false;
            $result['message'] = array("image" => "Select image to upload");
            echo json_encode($result);
        }
    }

    // public function validate_patient()
    // {
    //     $this->form_validation->set_rules('patient_title', 'Title', 'required', array('required' => 'Please select %s.'));
    //     $this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
    //     $this->form_validation->set_rules('patient_id_num', 'Patient ID', 'required');
    //     $this->form_validation->set_rules('patient_gender', 'Gender', 'required');
    //     $this->form_validation->set_rules('patient_dob', 'Date of Birth', 'required');
    //     $this->form_validation->set_rules('patient_phone', 'Patient Phone Number', 'required');
    //     //$this->form_validation->set_rules('patient_blood_group', 'Blood Group', 'required');
    //     $this->form_validation->set_rules('patient_address', 'Address', 'required');
    //     // $this->form_validation->set_rules('patient_occupation', 'Patient Occupation', 'required');
    //     $this->form_validation->set_rules('patient_regtype', 'Registration Type', 'required');
    //     $this->form_validation->set_rules('nok_title', 'Title', 'required');
    //     $this->form_validation->set_rules('nok_name', 'Name', 'required');
    //     $this->form_validation->set_rules('nok_phone', 'Phone Number', 'required');
    //     $this->form_validation->set_rules('nok_relationship', 'Relationship', 'required');
    //     $this->form_validation->set_rules('nok_address', 'Address', 'required');
    //     $this->form_validation->set_error_delimiters('<div style="color: #ff0000;" class="form-control-feedback">', '</div>');
    //     if ($this->form_validation->run()) {
    //         header("Content-type:application/json");
    //         echo json_encode('success');
    //     } else {
    //         header("Content-type:application/json");
    //         echo json_encode($this->form_validation->get_all_errors());
    //     }
    // }

    function upload_patient()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('patient_title', 'Title', 'required', array('required' => 'Please select %s.'));
        $this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
        $this->form_validation->set_rules('patient_id_num', 'Patient ID', 'required');
        $this->form_validation->set_rules('patient_gender', 'Gender', 'required');
        $this->form_validation->set_rules('patient_dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('patient_phone', 'Patient Phone Number', 'required');
        //$this->form_validation->set_rules('patient_blood_group', 'Blood Group', 'required');
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
            // if ($_FILES['image']['error'] != 0) {
            //     $result['status'] = false;
            //     $result['message'] = array("image" => "Select image to upload");
            // } else {
                $config['upload_path']       = './uploads/';
                $config['allowed_types']     = 'gif|jpg|jpeg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $data['upload_data'] = $this->upload->data('file_name');
                    $image_name = $data['upload_data'];
                } else {

                    if ($this->input->post('patient_id')) {
                        $image_name = $this->input->post('patient_image');

                    }
                    else {
                    $image_name = '';

                    }
                }
                if (($this->input->post('patient_status') == 'private')) {
                    $patient_status = 'Private';
                } else {
                    $patient_status = $this->input->post('patient_status2');
                }

                $data = array(

                    'patient_name'         => $this->input->post('patient_name')." ".$this->input->post('patient_other_names'),
                    'patient_id_num'    => $this->input->post('patient_id_num'),
                    'patient_photo'         => $image_name,
                    'patient_title'   => $this->input->post('patient_title'),
                    'patient_address'   => $this->input->post('patient_address'),
                    'patient_status'   => $patient_status,
                    'patient_occupation'   => $this->input->post('patient_occupation'),
                    'patient_marital_status'   => $this->input->post('marital_status'),
                    'patient_religion'   => $this->input->post('patient_religion'),
                    'patient_tribe'   => $this->input->post('patient_tribe'),
                    'patient_origin'   => $this->input->post('patient_origin'),
                    'patient_reg_date'   => $this->input->post('patient_reg_date'),
                    'patient_expiry_date'   => $this->input->post('patient_expiry_date'),
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
                if ($this->input->post('patient_id')) {

                    $this->db->where('id', $this->input->post('patient_id'));
                    $this->db->update('patient_details', $data);

                        $data2 = array(

                            'nok_title'         => $this->input->post('nok_title'),
                            'nok_name'    => $this->input->post('nok_name'),
                            'nok_address'   => $this->input->post('nok_address'),
                            'nok_relationship'   => $this->input->post('nok_relationship'),
                            'nok_phone'   => $this->input->post('nok_phone'),
                        );

                    $this->db->where('patient_id', $this->input->post('patient_id'));
                    $this->db->update('patient_nok', $data2);

                }
                else {
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



                }

               if (!$this->input->post('patient_id')) {
                ///Create receipt for registration
                $invoice_id = rand(10000,10000000);
                $check_if_invoice_exists = $this->db->select('*')->from('invoices')->where('invoice_id',$invoice_id)->get();
                if ($check_if_invoice_exists->num_rows() > 0) {
                    $invoice_id = rand(10000,10000000);
                }
                 $data_invoice = array(
                        'invoice_id' => $invoice_id
                    );
                $insert_invoice = $this->db->insert('invoices', $data_invoice);

                ///Get  the cost of Registration for Patient
                $check_registration_cost = $this->db->select('service_charge_cost')->from('service_charge_items')->where('id','2302')->get();
                $registration_cost_row = $check_registration_cost->row()->service_charge_cost;


                ///Invoice Table is now Receipt table
                    $data2 = array(
                        'patient_id'   => $last_id,
                        'invoice_id'   => $invoice_id,
                        'item_name'     => "Registration",
                        'category'     => "Registration",
                        'billing_type' => "Debit",
                        'amount'       => $registration_cost_row,
                        'billed_by'    => $this->session->userdata('active_user')->id,
                    );

                    //echo json_encode($this->input->post('prescription_unique_id'));

                   $insert_billings = $this->db->insert('billings', $data2);

               }




                $result['message'] = "Data inserted successfully.";
            }
       // } 
        else {
            $result['status'] = false;
            // $result['message'] = validation_errors();
            $result['message'] = $this->form_validation->error_array();
        }
        echo json_encode($result);
    }

    function delete_patient()
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $this->db->delete('patient_details', array('id' => $id));
            $this->db->delete('patient_nok', array('patient_id' => $id));
            $this->db->delete('admission_requests', array('patient_id' => $id));
            $this->db->delete('bed_allotments', array('patient_id' => $id));
            $this->db->delete('billings', array('patient_id' => $id));
            $this->db->delete('consultations', array('patient_id' => $id));
            $this->db->delete('dental_clinics', array('patient_id' => $id));
            $this->db->delete('eye_clinics', array('patient_id' => $id));
            $this->db->delete('med_reports', array('patient_id' => $id));
            $this->db->delete('operations', array('patient_id' => $id));
            $this->db->delete('patient_documents', array('patient_id' => $id));
            $this->db->delete('patient_health_history', array('patient_id' => $id));
            $this->db->delete('patient_insurance', array('patient_id' => $id));
            $this->db->delete('patient_lab_test', array('patient_id' => $id));
            $this->db->delete('patient_lab_tests', array('patient_id' => $id));
            $this->db->delete('patient_prescriptions', array('patient_id' => $id));
            $this->db->delete('patient_prescriptions2', array('patient_id' => $id));
            $this->db->delete('patient_prescription_test', array('patient_id' => $id));
            $this->db->delete('patient_radiology_tests', array('patient_id' => $id));
            $this->db->delete('patient_vitals', array('patient_id' => $id));
            $this->db->delete('patient_ward', array('patient_id' => $id));
            $this->db->delete('pharmacy_requests', array('patient_id' => $id));
            $this->db->delete('prescription_requests', array('patient_id' => $id));
            $this->db->delete('vitals_request', array('patient_id' => $id));
        }
    }
    function discontinue_patient() {
                    
                    $id = $this->input->post('id');

                    $data = array(

                        'status'         => 3
                    );


                    $this->db->where('id', $id);
                    $this->db->update('patient_details', $data);
    }

    function save_billing()
    {
        echo json_encode($this->patient_m->save_billing());
    }


    function validate_admission()
    {
        $rules = [
            [
                'field' => 'request_date',
                'label' => 'Date',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'clinic',
                'label' => 'Clinic',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'admission_type',
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

    public function save_admission()
    {
        $this->patient_m->create_new_admission();
        header('Content-Type: application/json');
        echo json_encode('success');
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

    public function input()
    {
        $id = $this->input->post('idd');
        echo json_encode($id);
    }

    //Lab
    public function add_lab()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->data['lab_tests'] = $this->patient_m->lab_tests();
            $this->load->view('patient/add-lab', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    function edit_lab_test()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_lab_test_by_id($this->uri->segment(3));
            $this->data['patient_lab_tests'] =  $this->patient_m->get_lab_test_by_unique_id($this->uri->segment(3));
            $this->data['lab_tests'] = $this->patient_m->lab_tests();
            $this->load->view('patient/add-lab', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function validate_lab()
    {
        $rules = [
            [
                'field' => 'lab_id[]',
                'label' => 'Laboratory Test',
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

    public function save_lab()
    {
        echo json_encode($this->patient_m->save_lab());
    }

    function view_lab_test()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_lab_test_by_id($this->uri->segment(3));
            $this->data['lab_tests'] =  $this->patient_m->get_lab_test_by_unique_id($this->uri->segment(3));
            $this->load->view('patient/view-lab-test', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    public function delete_lab_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('patient_lab_tests', array('lab_test_unique_id' => $id));
    }


    //Radiology
    public function add_radiology()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->data['rad_items'] = $this->patient_m->rad_items();
            $this->load->view('patient/add-radiology', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function validate_radiology()
    {
        $rules = [
            [
                'field' => 'radiology_id[]',
                'label' => 'Radiology Item',
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
    public function save_radiology()
    {
        echo json_encode($this->patient_m->save_radiology());
    }

    public function validate_procedure()
    {
        $rules = [
            [
                'field' => 'procedure_id[]',
                'label' => 'Procedure Item',
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

    public function add_procedure()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->data['drugs'] = $this->patient_m->drugs();
            $this->data['procedure_items'] = $this->patient_m->procedure_items();
            $this->load->view('patient/add-procedure', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function view_procedure()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_procedure_by_id($this->uri->segment(3));
            $this->data['procedure_tests'] =  $this->patient_m->get_procedure_by_unique_id($this->uri->segment(3));
            $this->load->view('patient/view_procedure', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function edit_procedure()
    {
        if ($this->uri->segment(3)) {
            $this->data['procedure_items'] = $this->patient_m->procedure_items();
            $this->data['vital_details'] =  $this->patient_m->get_procedure_by_id($this->uri->segment(3));
            $this->data['procedure_tests'] =  $this->patient_m->get_procedure_by_unique_id($this->uri->segment(3));
            $this->load->view('patient/add-procedure', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function save_procedure()
    {
        echo json_encode($this->patient_m->save_procedure());
    }

    public function delete_procedure_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('patient_procedure_tests', array('procedure_test_unique_id' => $id));
    }

    public function delete_radiology_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('patient_radiology_tests', array('radiology_test_unique_id' => $id));
        $this->db->delete('radiology_request', array('radiology_test_unique_id' => $id));
    }
    function view_radiology()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_radiology_by_id($this->uri->segment(3));
            $this->data['radiology_tests'] =  $this->patient_m->get_radiology_by_unique_id($this->uri->segment(3));
            $this->data['rad_items'] = $this->patient_m->rad_items();
            $this->load->view('patient/view-radiology', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    function edit_radiology()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_radiology_by_id($this->uri->segment(3));
            $this->data['patient_radiology_tests'] =  $this->patient_m->get_radiology_by_unique_id($this->uri->segment(3));
            $this->data['rad_items'] = $this->patient_m->rad_items();
            $this->load->view('patient/add-radiology', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }

    //Prescription
    public function add_prescription()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_edit_vitals_request_by_id($this->uri->segment(3));
            $this->data['drugs'] = $this->patient_m->drugs();
            $this->load->view('patient/add-prescription', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    public function validate_prescription()
    {
        $rules = [
            [
                'field' => 'prescription_id[]',
                'label' => 'Prescription Drugs',
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
    public function save_prescription()
    {
        echo json_encode($this->patient_m->save_prescription());
    }

    public function delete_prescription_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('patient_prescriptions2', array('prescription_unique_id' => $id));
    }
    function view_prescription()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_prescription_by_id($this->uri->segment(3));
            $this->data['prescriptions'] =  $this->patient_m->get_prescription_by_unique_id($this->uri->segment(3));
            $this->load->view('patient/view-prescription', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    function edit_prescription()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_prescription_by_id($this->uri->segment(3));
            $this->data['patient_prescriptions'] =  $this->patient_m->get_prescription_by_unique_id($this->uri->segment(3));
            $this->data['drugs'] = $this->patient_m->drugs();
            $this->load->view('patient/add-prescription', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    function edit_prescription2()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_prescription_by_id($this->uri->segment(3));
            $this->data['patient_prescriptions'] =  $this->patient_m->get_prescription_by_unique_id($this->uri->segment(3));
            $this->data['drugs'] = $this->patient_m->drugs();
            $this->load->view('patient/prescription/edit', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    function view_prescription2()
    {
        if ($this->uri->segment(3)) {
            $this->data['vital_details'] =  $this->patient_m->get_prescription_by_id($this->uri->segment(3));
            $this->data['patient_prescriptions'] =  $this->patient_m->get_prescription_by_unique_id($this->uri->segment(3));
            $this->data['drugs'] = $this->patient_m->drugs();
            $this->load->view('patient/prescription/view', $this->data);
        } else {
            redirect('/appointment/waiting_list');
        }
    }
    function manage_prescription()
    {
        if ($this->uri->segment(3)) {
            $patient_id = $this->billing_m->get_patient_id_from_prescription_unique($this->uri->segment(3));

            $this->data['vital_details'] =  $this->patient_m->get_prescription_by_id($this->uri->segment(3));
            $this->data['patient_prescriptions'] =  $this->patient_m->get_prescription_by_unique_id($this->uri->segment(3));
            $this->data['patient_account'] =  $this->patient_m->get_patient_billings($patient_id->patient_id);
            $this->data['drugs'] = $this->patient_m->drugs();
            $this->load->view('pharmacy/manage_prescription', $this->data);
        } else {
            show_404();
            //redirect('/appointment/waiting_list');
        }
    }
    public function get_prescription_by_vital_id()
    {
        $patient_id = $this->input->post('patient_id');
        $vital_id = $this->input->post('vital_id');
        $prescription_list = $this->patient_m->get_prescription_by_patient_id_and_vital_id($patient_id, $vital_id);
        echo json_encode($prescription_list);
    }
    public function get_consultation_by_vital_id()
    {
        $patient_id = $this->input->post('patient_id');
        $vital_id = $this->input->post('vital_id');
        $consultation_list = $this->patient_m->get_consultations_by_patient_id_and_vital_id($patient_id , $vital_id);
        echo json_encode($consultation_list);
    }
}
