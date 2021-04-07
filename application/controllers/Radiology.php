<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Radiology extends Base_Controller
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

        $this->load->model('role_m');
        $this->load->model('staff_m');
        $this->load->model('department_m');
        $this->load->model('request_m');
        $this->load->model('radiology_m');
        $this->data['menu_id'] = 'radiology';
    }

    public function investigations()
    {
        $this->data['title'] = 'Investigations';
        $this->data['radiology_investigation_list'] =  $this->radiology_m->get_radiology_investigations();
        $this->data['radiology_subgroups_list'] =  $this->radiology_m->get_radiology_subgroup();
        $this->load->view('radiology/investigations', $this->data);
    }

    public function add_investigation()
    {
        $this->data['title'] = 'Investigations';
        if ($this->uri->segment(3)) {
            $this->data['investigation'] =  $this->radiology_m->get_investigation_by_id($this->uri->segment(3));

        }
        $this->data['radiology_subgroups_list'] =  $this->radiology_m->get_radiology_subgroup();
        $this->load->view('radiology/investigation-modal', $this->data);
    }
    public function validate_investigation()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'subgroup',
                'label' => 'SubGroup',
                'rules' => 'trim|numeric|required'
            ],
            [
                'field' => 'cost',
                'label' => 'Drug Cost',
                'rules' => 'trim|numeric|required'
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
    function save_investigation()
    {
        $this->radiology_m->save_investigation();
    }
    public function delete_investigation()
    {
        $id = $this->input->post('id');
        $this->db->delete('service_charge_items', array('id' => $id));
    }


    public function requests()
    {
        $this->data['title'] = 'Radiology';
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_can_consult_list();
        $this->data['clinic_list'] =  $this->department_m->get_clinic_list();
        $this->data['rad_requests_list'] =  $this->request_m->get_rad_request_list();
        $this->load->view('radiology/requests/index', $this->data);
    }
    public function view_request()
    {
        if ($this->uri->segment(3)) {
            $this->data['radiology_request'] = $lb =  $this->request_m->get_radiology_request_by_id($this->uri->segment(3));
            // print_r($lb);
            $this->data['treated_tests'] =  $this->request_m->get_treated_rad_test_by_patient_id($lb->patient_id, $lb->radiology_test_unique_id);
            $this->data['pending_tests'] =  $this->request_m->get_pending_rad_test_by_patient_id($lb->patient_id, $lb->radiology_test_unique_id);
            $this->load->view('radiology/requests/view', $this->data);
        } else {
            return redirect('radiology/requests/index');
        }
    }
    public function update_request()
    {
        echo json_encode($this->request_m->update_rad_request());
    }
}
