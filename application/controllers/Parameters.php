<?php
defined('BASEPATH') or exit('No direct script access allowed');

class parameters extends Base_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->model('parameter_m');
        $this->load->model('sub_parameter_m');
        $this->data['menu_id'] = 'parameters';
        $this->data['sn'] = 1;
        $this->data['parameters_list'] = $this->parameter_m->get_all();
    }

    //Parameters
    public function index()
    {
        $this->data['title'] = 'Parameters';
        $this->load->view('parameters/main', $this->data);
    }

    //View Sub-Parameters
    public function view()
    {
        try {
            if ($this->uri->segment(3)) {
                $this->data['parameter_details'] = $parameter  = $this->parameter_m->get_parameter_by_id($this->uri->segment(3));
                if ($parameter != null) {
                    $this->data['title'] = $parameter->name;
                    $this->data['sub_parameters']  = $g = $this->sub_parameter_m->get_sub_parameter_by_parameter_id($parameter->id);
                    // print_r($g);
                    $this->load->view('parameters/view', $this->data);
                } else {
                    redirect('parameters');
                }
            } else {
                redirect('parameters');
            }
        } catch (\Throwable $th) {
            redirect('parameters');
        }
    }

    //Create Parameter Validation
    public function validate()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Parameter Name',
                'rules' => 'trim|required|min_length[3]|is_unique[parameters.name]'
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

    //Create Parameter
    public function add_new_parameter()
    {

        $this->parameter_m->create_parameter_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }

    //Update Parameter Validation
    public function update_validate()
    {
        $rules = [
            [
                'field' => 'update_name',
                'label' => 'Parameter Name',
                'rules' => 'trim|required|min_length[3]'
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

    //Check Exist
    public function check_now()
    {
        $name = $this->input->post('update_name');
        $parameter  = $this->parameter_m->get_parameter_by_name($name);
        if ($parameter > 0) {
            header('Content-Type: application/json');
            echo json_encode('error');
        } else {
            header('Content-Type: application/json');
            echo json_encode('success');
        }
    }

    //Update
    public function update_parameter()
    {

        $this->parameter_m->create_parameter_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }

    //Delete
    public function delete_parameter()
    {
        $this->parameter_m->delete_params();
        redirect('parameters');
    }

    //Create Sub Parameter Validation
    public function sub_validate()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Sub Parameter Name',
                'rules' => 'trim|required|min_length[3]'
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

    //Create Parameter
    public function add_new_sub_parameter()
    {
        $this->sub_parameter_m->create_sub_parameter_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }



    //Update Sub Parameter Validation
    public function update_sub_validate()
    {
        // echo 'good';
        $rules = [
            [
                'field' => 'update_name',
                'label' => 'Sub Parameter Name',
                'rules' => 'trim|required|min_length[3]'
            ],
        ];

        $this->form_validation->set_rules($rules);
        echo $this->form_validation->get_all_errors();
        if ($this->form_validation->run()) {
            header("Content-type:application/json");
            echo json_encode('success');
        } else {
            header("Content-type:application/json");
            echo json_encode($this->form_validation->get_all_errors());
        }
    }

    //Check Exist
    public function sub_param_check_now()
    {
        $name = $this->input->post('update_name');
        $id = $this->input->post('parameter_id');
        $parameter  = $this->sub_parameter_m->get_sub_parameter_by_name($name, $id);
        if ($parameter > 0) {
            header('Content-Type: application/json');
            echo json_encode('error');
        } else {
            header('Content-Type: application/json');
            echo json_encode('success');
        }
    }

    public function sub_param_check_now2()
    {
        $name = $this->input->post('name');
        $id = $this->input->post('parameter_id');
        $parameter  = $this->sub_parameter_m->get_sub_parameter_by_name($name, $id);
        if ($parameter > 0) {
            header('Content-Type: application/json');
            echo json_encode('error');
        } else {
            header('Content-Type: application/json');
            echo json_encode('success');
        }
    }

    //Update sub parameters
    public function update_sub_param()
    {

        $this->sub_parameter_m->create_sub_parameter_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }

    //Delete
    public function delete_sub_parameter()
    {
        $paramId = $this->input->post('parameter_id');
        $this->sub_parameter_m->delete_sub_params();
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
