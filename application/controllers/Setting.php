<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends Base_Controller
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
        $this->load->model('setting_m');
        $this->data['menu_id'] = 'settings';
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
    public function tests()
    {
        $this->data['title'] = 'Tests';
        $this->data['vitals_list'] =  $this->nursing_m->get_vitals_request_list();
        $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
        $this->data['lab_test_list'] =  $this->setting_m->get_lab_tests();
        $this->data['lab_groups_list'] =  $this->setting_m->get_lab_groups();
        $this->load->view('setting/tests', $this->data);
    }

    public function create_test()
    {
        if ($this->uri->segment(3)) {
            $this->data['lab_groups_list'] =  $this->setting_m->get_lab_groups();
            $this->data['lab_test'] =  $this->setting_m->get_lab_test_by_id($this->uri->segment(3));
            $this->data['range_list'] =  $this->setting_m->get_lab_test_range();
            $this->data['lab_test_range'] =  $this->setting_m->get_lab_test_range_by_lab_id($this->uri->segment(3));
            $this->data['lab_test_parameter'] =  $this->setting_m->get_lab_test_parameter_by_lab_id($this->uri->segment(3));
            $this->load->view('setting/test-modal', $this->data);
        } else {
            $this->data['title'] = 'Range';
            $this->data['range_list'] =  $this->setting_m->get_lab_test_range();
            $this->data['lab_groups_list'] =  $this->setting_m->get_lab_groups();
            $this->load->view('setting/test-modal', $this->data);
        }
    }
    public function edit_test()
    {
        if ($this->uri->segment(3)) {
            $this->data['lab_test'] =  $this->setting_m->get_lab_test_by_id($this->uri->segment(3));
            $this->data['lab_test_range'] =  $this->setting_m->get_lab_test_range_by_lab_id($this->uri->segment(3));
            $this->data['lab_test_parameter'] =  $this->setting_m->get_lab_test_parameter_by_lab_id($this->uri->segment(3));
            $this->load->view('setting/test-view-modal', $this->data);
        } else {
            redirect('setting/tests');
        }
    }
    public function ranges()
    {
        if ($this->uri->segment(3)) {
            $this->data['lab_test_range'] =  $this->setting_m->get_lab_test_range_by_id($this->uri->segment(3));
            $this->load->view('setting/range-modal', $this->data);
        } else {
            $this->data['title'] = 'Range';
            $this->data['vitals_list'] =  $this->nursing_m->get_vitals_request_list();
            $this->data['doctors_list'] =  $this->staff_m->get_doctors_list();
            $this->data['lab_test_range_list'] =  $this->setting_m->get_lab_test_range();
            $this->data['lab_groups_list'] =  $this->setting_m->get_lab_groups();
            $this->load->view('setting/ranges', $this->data);
        }
    }
    public function create_range()
    {
        $this->load->view('setting/range-modal', $this->data);
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

    public function view_drug_details()
    {
        $this->data['drug_details'] =  $this->setting_m->get_drug_by_id($this->uri->segment(3));
        $this->data['drug_batches'] =  $this->setting_m->get_drug_batches_by_id($this->uri->segment(3));
        $this->data['drug_bin_cards'] =  $this->setting_m->get_drug_bin_cards_by_id($this->uri->segment(3));
        $this->load->view('setting/view-drug-modal', $this->data);
    }
    public function add_drug_batch_and_expire_number()
    {
        $this->data['drug_details'] =  $this->setting_m->get_drug_by_id($this->uri->segment(3));
        $this->load->view('setting/drug-add-batch-modal', $this->data);
    }

    public function edit_drug_batch_and_expire_number()
    {
        $this->data['drug_details'] =  $this->setting_m->get_drug_batches_by_id2($this->uri->segment(3));
        $this->load->view('setting/drug-add-batch-modal', $this->data);
    }

    public function qty_update()
    {
        $this->setting_m->qty_update();
        return true;
    }
    public function validate_batch()
    {
        $rules = [
            [
                'field' => 'expire_date',
                'label' => 'Drug Expire Date',
                'rules' => 'trim|date|required'
            ],
            [
                'field' => 'batch_number',
                'label' => 'Drug Batch Number',
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
    function save_drug_batch()
    {
        $this->setting_m->save_drug_batch();
        return true;
    }

    public function delete_batch()
    {
        $id = $this->input->post('id');
        $this->db->delete('drug_batches', array('id' => $id));
    }

    public function delete_bin_card()
    {
        $id = $this->input->post('id');
        $this->db->delete('drug_activities', array('id' => $id));
    }
    public function view_bin_card()
    {
        $this->data['drug_bin_card_details'] =  $this->setting_m->get_drug_bin_card_by_id($this->uri->segment(3));
        $this->load->view('setting/drug-bin-card-modal', $this->data);
    }
    public function validate_range()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Range Name',
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
    public function save_range()
    {
        $this->setting_m->save_range();
        return true;
    }
    public function delete_range_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('lab_test_range', array('id' => $id));
    }
    public function delete_lab_range_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('lab_test_range_by_test', array('id' => $id));
    }
    public function delete_lab_parameter_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('lab_test_parameters', array('id' => $id));
    }
    public function validate_test()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Test Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'group',
                'label' => 'Test Group',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'measure',
                'label' => 'Test Measure',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'cost',
                'label' => 'Test Cost',
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
    public function save_test()
    {
        // $this->setting_m->save_test();
        echo json_encode($this->setting_m->save_test());
        //return true;
    }
    public function delete_test()
    {
        $id = $this->input->post('id');
        $this->db->delete('lab_tests', array('id' => $id));
        $this->db->delete('lab_test_parameters', array('lab_test_id' => $id));
        $this->db->delete('lab_test_range_by_test', array('lab_test_id' => $id));
    }
}
