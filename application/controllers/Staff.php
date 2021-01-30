<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends Base_Controller
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

        $this->load->model('staff_m');
        $this->load->model('setting_m');
        $this->load->model('department_m');
        $this->load->model('role_m');
        $this->data['menu_id'] = 'department';
    }
    public function index()
    {
        $this->data['title'] = 'Staff';
        $this->data['role_list'] =  $this->role_m->get_role_list();
        $this->data['department_list'] =  $this->department_m->get_department_list();
        $this->data['staff_list'] =  $this->staff_m->get_staff_list();
        $this->data['states_list'] =  $this->setting_m->get_states();
        $this->load->view('staff/main', $this->data);
    }
    public function login()
    {
        $this->data['title'] = 'Staff';
        $this->data['role_list'] =  $this->role_m->get_role_list();
        $this->data['department_list'] =  $this->department_m->get_department_list();
        $this->data['users_list'] =  $this->staff_m->get_login_list();
        //$this->data['states_list'] =  $this->setting_m->get_states();
        $this->load->view('login/main', $this->data);
    }
    public function new_staff()
    {
        $this->data['title'] = 'Staff';
        $this->data['role_list'] =  $this->role_m->get_role_list();
        $this->data['states_list'] =  $this->setting_m->get_states();
        $this->data['department_list'] =  $this->department_m->get_department_list();
        $this->data['staff_list'] =  $this->staff_m->get_staff_list();
        $this->data['salutations_list'] =  $this->setting_m->get_salutations();

        if ($this->uri->segment(3)) {

            $this->data['staff_details'] = $this->staff_m->get_staff_by_id($this->uri->segment(3));
        }
        $this->load->view('staff/new_staff_modal', $this->data);
    }
    public function new_user()
    {
        $this->data['title'] = 'User';
        $this->data['role_list'] =  $this->role_m->get_role_list();
        $this->data['states_list'] =  $this->setting_m->get_states();
        $this->data['department_list'] =  $this->department_m->get_department_list();
        $this->data['staff_list'] =  $this->staff_m->get_staff_list();
        $this->data['salutations_list'] =  $this->setting_m->get_salutations();

        if ($this->uri->segment(3)) {

            $this->data['user_details'] = $this->staff_m->get_user_by_id($this->uri->segment(3));
        }
        $this->load->view('login/new_user_modal', $this->data);
    }

    public function suspend_user()
    {

        if ($this->uri->segment(3)) {

            $this->data['user_details'] = $this->staff_m->get_user_by_id($this->uri->segment(3));
            $this->load->view('login/suspend_user_modal', $this->data);
        } else {
            redirect('/staff/login');
        }
    }


    public function view()
    {
        if ($this->uri->segment(3)) {

            $this->load->view('patients/view', $this->data);
        } else {
            show_404();
        }
    }

    public function delete_role_name()
    {
        $id = $this->input->post('id');
        $this->db->delete('users', array('id' => $id));
    }
    public function disable_staff_name()
    {
        $this->staff_m->disable_user();
    }
    public function enable_staff_name()
    {
        $this->staff_m->enable_user();
    }

    public function get_staff_details()
    {

        $staff_list = $this->staff_m->get_staff_by_id();
        echo "[" . json_encode($staff_list) . "]";
    }


    public function get_staff_details2()
    {

        $staff_list = $this->staff_m->get_staff_list();
        echo json_encode($staff_list);
    }






    public function validate_staff_name()
    {
        $rules = [
            [
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'dob',
                'label' => 'Date of Birth',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'state',
                'label' => 'State',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'phone',
                'label' => 'Phone Number',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'department',
                'label' => 'Department',
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

    public function validate_user_name()
    {
        $rules = [
            [
                'field' => 'fullname',
                'label' => 'Full Name',
                'rules' => 'trim'
            ],
            [
                'field' => 'staff_name',
                'label' => 'Staff Name',
                'rules' => 'trim'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'cpassword',
                'label' => 'Password',
                'rules' => 'trim|required|matches[password]'
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

    public function validate_user_suspension()
    {
        $rules = [
            [
                'field' => 'suspension_time',
                'label' => 'Suspension Date & Time',
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

    public function add_staff_name()
    {

        $this->staff_m->create_staff_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }


    public function add_user_name()
    {

        $this->staff_m->create_user_name();

        header('Content-Type: application/json');
        echo json_encode('success');
    }

    public function update_consult()
    {

        $id = $this->input->post('id');
        $can_consult = $this->input->post('can_consult');


        $data = array(
            'can_consult' => $can_consult
        );

        $this->db->where('id', $id);
        $this->db->update('staff', $data);

        echo json_encode('success' . $id . $can_consult);
    }

    public function suspend_user_name()
    {
        $id = $this->input->post('user_id');
        $suspension_time = $this->input->post('suspension_time');
        $data = array(
            'suspension_time' => $suspension_time,
            'user_status' => 'Suspended'
        );

        $this->db->where('id', $id);
        $update = $this->db->update('users', $data);
    }
}
