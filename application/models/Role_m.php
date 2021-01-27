<?php
class Role_m extends CI_Model {

    public function get_role_list() {
        $get_roles = $this->db->select('*')->from('roles')->get();
        $role_list = $get_roles->result();
        return $role_list;  
        
    }

    public function create_role_name()
    {
    
        if ($this->input->post('role_id'))
        {           
        $this->db->set('role_name', $this->input->post('role_name'));
        $this->db->where('id', $this->input->post('role_id'));
        $this->db->update('roles');         
        }
        else {
        $data = array(
            'role_name' => $this->input->post('role_name')
        );
        $insert = $this->db->insert('roles', $data);

        return $insert;
        }
    }

    function get_role_by_id(){
        $id = $this->input->post('id');
        $get_role = $this->db->select('*')->from('roles')->where('id', $id)->get();
        $role_list = $get_role->row();
        return $role_list;
    }



		
}

?>