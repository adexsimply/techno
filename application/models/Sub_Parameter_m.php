<?php
class Sub_Parameter_m extends CI_Model
{
    public function get_sub_parameter_by_id($parameter_id)
    {
        $get_parameter = $this->db->select('*')->from('sub_parameters')->where('id', $parameter_id)->get();
        $parameter = $get_parameter->row();
        return $parameter;
    }

    public function get_sub_parameter_by_parameter_id($parameter_id)
    {
        $get_parameter = $this->db->select('*')->from('sub_parameters')->where('parameter_id', $parameter_id)->get();
        $parameter = $get_parameter->result();
        return $parameter;
    }

    public function get_sub_parameter_by_name($name, $id)
    {
        $get_parameter = $this->db->select('*')->from('sub_parameters')->where('parameter_id', $id)->where('name', $name)->get();
        $parameter = $get_parameter->num_rows();
        return $parameter;
    }

    public function create_sub_parameter_name()
    {
        if ($this->input->post('id')) {
            $this->db->set('name', $this->input->post('update_name'));
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('sub_parameters');
        } else {
            $data = array(
                'parameter_id' => $this->input->post('parameter_id'),
                'name' => $this->input->post('name')
            );
            $insert = $this->db->insert('sub_parameters', $data);

            return $insert;
        }
    }
    public function delete_sub_params()
    {
        $id = $this->input->post('id');
        $delete = $this->db->select('*')->from('sub_parameters')->where('id', $id)->delete();
        return $delete;
    }
}
