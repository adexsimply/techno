<?php
class Menu_m extends CI_Model {

    public function get_menu_list() {
        $get_menus = $this->db->select('*')->from('menu_parents')->get();
        $menu_list = $get_menus->result();
        return $menu_list;  
        
    }
    public function get_menu_child_list($id) {
        $get_menu_child = $this->db->select('*')->from('menu_children')->where('menu_parent_id',$id)->get();
        $menu_child_list = $get_menu_child->result();
        return $menu_child_list;  
        
    }
    public function get_menu_assigned_by_role($role_id, $menu_child_id) {
        $check_menu_assigned = $this->db->select('*')->from('get_menu_assigned')->where('menu_child_id',$menu_child_id)->where('role_id',$role_id)->get();
        $menu_assigned = $check_menu_assigned->row();
        return $menu_assigned;  
        
    }

    public function create_menu_name()
    {
    
        if ($this->input->post('menu_id'))
        {           
        $this->db->set('menu_parent_name', $this->input->post('menu_parent_name'));
        $this->db->where('id', $this->input->post('menu_id'));
        $this->db->update('menu_parents');         
        }
        else {
        $data = array(
            'menu_parent_name' => $this->input->post('menu_parent_name')
        );
        $insert = $this->db->insert('menu_parents', $data);

        return $insert;
        }
    }

    public function create_submenu_name()
    {
    
        if ($this->input->post('menu_child_id'))
        {           
        $this->db->set('menu_child_name', $this->input->post('menu_child_name'));
        $this->db->where('id', $this->input->post('menu_child_id'));
        $this->db->update('menu_children');         
        }
        else {
        $data = array(
            'menu_parent_id' => $this->input->post('menu_id'),
            'menu_child_name' => $this->input->post('menu_child_name')
        );
        $insert = $this->db->insert('menu_children', $data);

        return $insert;
        }
    }

    function get_menu_by_id(){
        $id = $this->input->post('id');
        $get_menu = $this->db->select('*')->from('menu_parents')->where('id', $id)->get();
        $menu_list = $get_menu->row();
        return $menu_list;
    }



		
}

?>