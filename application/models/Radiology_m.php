<?php
class Radiology_m extends CI_Model
{

    public function get_radiology_investigations()
    {
        $get_radiology_investigations = $this->db->select('*')->from('service_charge_items')->where('ChargeSubGroupID IN (SELECT ChargeSubGroupID FROM service_charge_subgroup WHERE ChargeGroupID="2" )')->get();
        $radiology_investigations = $get_radiology_investigations->result();
        return $radiology_investigations;
    }
    
    public function get_subgroup_name($id)
    {
        $get_subgroup_name = $this->db->select('Name')->from('service_charge_subgroup')->where('ChargeSubGroupID', $id)->get();
        $subgroup_name = $get_subgroup_name->row();
        return $subgroup_name;
    }

    public function get_radiology_subgroup() {

            $get_radiology_subgroup = $this->db->select('*')->from('service_charge_subgroup')->where('ChargeGroupID',2)->get();
            $radiology_subgroup = $get_radiology_subgroup->result();
            return $radiology_subgroup;
    }
    public function get_investigation_by_id($id)
    {
        $get_investigation = $this->db->select('sci.*,scs.Name as sub_group_name')->from('service_charge_items sci')->join('service_charge_subgroup as scs', 'scs.ChargeSubGroupID=sci.ChargeSubGroupID')->where('sci.id', $id)->get();
        $investigation = $get_investigation->row();
        return $investigation;
    }

    function save_investigation()
    {
        if ($this->input->post('id')) {
            $data = array(
                'Name' => $this->input->post('name'),
                'ChargeSubGroupID' => $this->input->post('subgroup'),
                'service_charge_cost' => $this->input->post('cost'),
            );
            $this->db->where('id', $this->input->post('id'));
            $update = $this->db->update('service_charge_items', $data);
        } else {
            $data = array(
                'Name' => $this->input->post('name'),
                'ChargeSubGroupID' => $this->input->post('subgroup'),
                'service_charge_cost' => $this->input->post('cost'),
            );
            $insert = $this->db->insert('service_charge_items', $data);
            return $insert;
        }
    }

}
