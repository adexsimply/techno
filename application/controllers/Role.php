<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends Base_Controller {

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

		$this->load->model('role_m');
        $this->data['menu_id'] = 'department';

	}
	public function index ()
	{	
        $this->data['title'] = 'Role';  
		$this->data['role_list'] =  $this->role_m->get_role_list();
		$this->load->view('role/main', $this->data);

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

    public function delete_role_name()
    {
        $id = $this->input->post('id');
        $this->db->delete('roles', array('id' => $id));
    }

    public function get_role_details() {

        $role_list = $this->role_m->get_role_by_id();
        echo "[".json_encode($role_list)."]";       
    }






    public function validate_role_name()
    {
        $rules = [
            [
                'field' => 'role_name',
                'label' => 'Role Name',
                'rules' => 'trim|required|is_unique[roles.role_name]'
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

    public function add_role_name()
        {                

            $this->role_m->create_role_name();

            header('Content-Type: application/json');
            echo json_encode('success');
        }



}
