<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends Base_Controller {

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
        $this->data['menu_id'] = 'settings';

	}
	public function index ()
	{	
        $this->data['title'] = 'Department';  
		$this->data['department_list'] =  $this->department_m->get_department_list();
		$this->load->view('department/main', $this->data);

	}
	public function add ()
	{	
		$this->load->view('patients/add_patient', $this->data);

	}

	public function view ()
	{	
		if($this->uri->segment(3)) {

		$this->load->view('patients/view', $this->data);
		}
		else {
			show_404();
		}

	}

    public function delete_department_name()
    {
        $id = $this->input->post('id');
        $this->db->delete('departments', array('id' => $id));
    }

    public function get_department_details() {

        $department_list = $this->department_m->get_department_by_id();
        echo "[".json_encode($department_list)."]";       
    }






	// public function load_image() {

	// 	$this->load->view('patients/image_test', $this->data);
	// }

	function upload_patient() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('patient_title', 'Title', 'required', array('required' => 'Please select %s.'));
        $this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
        $this->form_validation->set_rules('patient_id_num', 'Patient ID', 'required');
        $this->form_validation->set_rules('patient_gender', 'Gender', 'required');
        $this->form_validation->set_rules('patient_dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('patient_phone', 'Patient Phone Number', 'required');
        $this->form_validation->set_rules('patient_blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('patient_address', 'Address', 'required');
        $this->form_validation->set_rules('patient_status', 'Patient Status', 'required');
        $this->form_validation->set_rules('patient_service', 'Service Type', 'required');
        $this->form_validation->set_rules('nok_title', 'Title', 'required');
        $this->form_validation->set_rules('nok_name', 'Name', 'required');
        $this->form_validation->set_rules('nok_phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('nok_relationship', 'Relationship', 'required');
        $this->form_validation->set_rules('nok_address', 'Address', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: #ff0000;" class="form-control-feedback">','</div>');
        if ($this->form_validation->run() == TRUE) {
            if($_FILES['image']['error'] != 0) {
                $result['status'] = false;
                $result['message'] = array("image"=>"Select image to upload");
            } else {
                $config['upload_path']       = './uploads/';
                $config['allowed_types']     = 'gif|jpg|jpeg|png';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image'))
                {
                    $data['upload_data'] = $this->upload->data('file_name');
                    $image_name = $data['upload_data'];
                }
                else
                {
                    $image_name = '';
                }
                $data = array(

                'patient_name'         => $this->input->post('patient_name'),
                'patient_id_num'    => $this->input->post('patient_id_num'),
                'patient_photo'         => $image_name,
                'patient_title'   => $this->input->post('patient_title'),
                'patient_address'   => $this->input->post('patient_address'),
                'patient_status'   => $this->input->post('patient_status'),
                'patient_service'   => $this->input->post('patient_service'),
                'patient_blood_group'   => $this->input->post('patient_blood_group'),
                'patient_phone'   => $this->input->post('patient_phone'),
                'patient_dob'   => $this->input->post('patient_dob'),
                'patient_gender'   => $this->input->post('patient_gender'),
                'patient_email'   => $this->input->post('patient_email'),
                );


                $result['status'] = true;

                $this->db->insert('patient_details',$data);
	            $last_id = $this->db->insert_id();

                $data2 = array(

                'nok_title'         => $this->input->post('nok_title'),
                'nok_name'    => $this->input->post('nok_name'),
                'nok_address'   => $this->input->post('nok_address'),
                'nok_relationship'   => $this->input->post('nok_relationship'),
                'nok_phone'   => $this->input->post('nok_phone'),
                'patient_id'   => $last_id,
                );
                $this->db->insert('patient_nok',$data2);

                $result['message'] = "Data inserted successfully.";
            }
        }else {
            $result['status'] = false;
            // $result['message'] = validation_errors();
            $result['message'] = $this->form_validation->error_array();
        }
        echo json_encode($result);
    }

	function add_history() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('case_title', 'Title', 'required', array('required' => 'Please select %s.'));
        $this->form_validation->set_rules('case_date', 'Date', 'required');
        $this->form_validation->set_rules('case_prescription', 'Prescription', 'required');
        $this->form_validation->set_rules('case_remark', 'Remark', 'required');
        $this->form_validation->set_rules('case_description', 'Description', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: #ff0000;" class="form-control-feedback">','</div>');
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

                $this->db->insert('patient_health_history',$data);
	            

                $result['message'] = "Data inserted successfully.";
            }else {
            $result['status'] = false;
            // $result['message'] = validation_errors();
            $result['message'] = $this->form_validation->error_array();
        }
        echo json_encode($result);
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



}
