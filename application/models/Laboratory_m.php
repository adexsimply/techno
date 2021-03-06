<?php
class Laboratory_m extends CI_Model
{

    public function get_specimen_list()
    {
        $get_specimen = $this->db->select('*')->from('lab_specimens')->get();
        $specimen_list = $get_specimen->result();
        return $specimen_list;
    }
    public function get_specimen_by_id($id)
    {
        $get_specimen = $this->db->select('*')->from('lab_specimens')->where('id', $id)->get();
        $specimen_list = $get_specimen->row();
        return $specimen_list;
    }
    public function save_specimen()
    {
        if ($this->input->post('specimen_id')) {
            $data = array(
                'specimen_name' => $this->input->post('name'),
            );
            $this->db->where('id', $this->input->post('specimen_id'));
            $update = $this->db->update('lab_specimens', $data);
            return $update;
        } else {
            $data = array(
                'specimen_name' => $this->input->post('name'),
            );
            $insert = $this->db->insert('lab_specimens', $data);
        }
    }
}
