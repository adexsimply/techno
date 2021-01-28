<?php
class Parameter_m extends CI_Model
{
    public function get_all()
    {
        $get_all = $this->db->select('*')->from('parameters')->get();
        $all_list = $get_all->result();
        return $all_list;
    }

    public function get_parameter_by_id($parameter_id)
    {
        $get_parameter = $this->db->select('*')->from('parameters')->where('id', $parameter_id)->get();
        $parameter = $get_parameter->row();
        return $parameter;
    }

    public function get_parameter_by_name($name)
    {
        $get_parameter = $this->db->select('*')->from('parameters')->where('name', $name)->get();
        $parameter = $get_parameter->num_rows();
        return $parameter;
    }

    public function create_parameter_name()
    {
        if ($this->input->post('id')) {
            $this->db->set('name', $this->input->post('update_name'));
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('parameters');
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );
            $insert = $this->db->insert('parameters', $data);

            return $insert;
        }
    }
    public function delete_params()
    {
        $id = $this->input->post('id');
        $this->db->select('*')->from('sub_parameters')->where('parameter_id', $id)->delete();
        $delete = $this->db->select('*')->from('parameters')->where('id', $id)->delete();
        return $delete;
    }
}
