<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Base_Controller {

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

		$this->load->model('menu_m');
        $this->load->model('role_m');
        $this->data['menu_id'] = 'department';

	}
	public function index ()
	{	
        $this->data['title'] = 'Menu';  
		$this->data['menu_list'] =  $this->menu_m->get_menu_list();
		$this->load->view('menu/main', $this->data);

	}
    public function view ()
    {   
        $this->data['title'] = 'Menu';  
        if ($this->uri->segment(3)) {
        $this->data['menu_list'] =  $this->menu_m->get_menu_list();
        $this->data['menu_child_list'] =  $this->menu_m->get_menu_child_list($this->uri->segment(3));
        $this->load->view('menu/main', $this->data);
        }
        else {
            show_404();
        }

    }
    public function assign ()
    {   
        $this->data['title'] = 'Assign Menu';  
        $this->data['role_list'] =  $this->role_m->get_role_list();
        $this->data['menu_list'] =  $this->menu_m->get_menu_list();

        if ($this->uri->segment(3)) {
           // $this->data['sub_menu'] = $this->menu_m->get_menu_child_list($this->uri->segment(3));

        }
        $this->load->view('menu/assign', $this->data);

    }
    public function assign2 ()
    {   
        $this->data['title'] = 'Assign Menu';  
        $this->data['role_list'] =  $this->role_m->get_role_list();
        $this->data['menu_list'] =  $this->menu_m->get_menu_list();

        if ($this->uri->segment(3)) {
           // $this->data['sub_menu'] = $this->menu_m->get_menu_child_list($this->uri->segment(3));

        }
        $this->load->view('menu/assign_modal', $this->data);

    }

    public function delete_menu_name()
    {
        $id = $this->input->post('id');
        $this->db->delete('menu_parents', array('id' => $id));
    }

    public function get_menu_details() {

        $menu_list = $this->menu_m->get_menu_by_id();
        echo "[".json_encode($menu_list)."]";       
    }



    public function delete_submenu_name()
    {
        $id = $this->input->post('id');
        $this->db->delete('menu_children', array('id' => $id));
    }

    public function get_submenu_details() {

        $submenu_list = $this->menu_m->get_submenu_by_id();
        echo "[".json_encode($submenu_list)."]";       
    }






    public function validate_menu_name()
    {
        $rules = [
            [
                'field' => 'menu_parent_name',
                'label' => 'Menu Name',
                'rules' => 'trim|required|is_unique[menu_parents.menu_parent_name]'
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


    public function validate_submenu_name()
    {
        $rules = [
            [
                'field' => 'menu_child_name',
                'label' => 'Sub-Menu Name',
                'rules' => 'trim|required|is_unique[menu_children.menu_child_name]'
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

    public function add_menu_name()
        {                

            $this->menu_m->create_menu_name();

            header('Content-Type: application/json');
            echo json_encode('success');
        }


    public function add_submenu_name()
        {                

            $this->menu_m->create_submenu_name();

            header('Content-Type: application/json');
            echo json_encode('success');
        }

     public function assign_menu_to_role() {
        $role_id = $this->input->post('role_id');
        $status = $this->input->post('status');
        $menu_child_id = $this->input->post('menu_child_id');
        ///Check if already submitted
        
       // else {


        if ($status ==1) {
            $query_check_menu = $this->db->select('*')->from('menu_assigned')->where('menu_child_id', $menu_child_id)->where('role_id', $role_id)->get();
        if ($query_check_menu->num_rows() > 0) {

        }
        else {
        $data = array(
            'role_id'  => $role_id,
            'menu_child_id'    => $menu_child_id,
        );

        $insert = $this->db->insert('menu_assigned', $data);

        }

        }
        else {
        $this->db->delete('menu_assigned', array('role_id' => $role_id, 'menu_child_id'=> $menu_child_id));
        }
       // }

     }



}
