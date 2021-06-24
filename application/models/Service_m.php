<?php
class Service_m extends CI_Model
{
    public function get_service_charges()
    {
        $get_drug_by_id = $this->db->select('sc.*,csg.*,sc.Name as item_name, csg.Name as subgroup_name, csg.ChargeSubGroupID as subgroup_id')->from('service_charge_items sc')->join('service_charge_subgroup as csg', 'csg.ChargeSubGroupID = sc.ChargeSubGroupID', 'LEFT')->order_by('id', 'DESC')->get();
        $drug_details = $get_drug_by_id->result();
        return $drug_details;
    }
    function get_service_charges_by_id($id)
    {
        $get_get_lab_test_range_by_id = $this->db->select('sc.*,csg.*,sc.Name as item_name, csg.Name as subgroup_name, csg.ChargeSubGroupID as subgroup_id')->from('service_charge_items sc')->join('service_charge_subgroup as csg', 'sc.ChargeSubGroupID = csg.ChargeSubGroupID')->where('sc.id', $id)->get();
        $details = $get_get_lab_test_range_by_id->row();
        return $details;
    }
    function get_service_sub_group()
    {
        $get_get_lab_test_range_by_id = $this->db->select('*')->from('service_charge_subgroup')->order_by('Name','ASC')->get();
        $details = $get_get_lab_test_range_by_id->result();
        return $details;
    }

    function save_service_charge()
    {
        if ($this->input->post('id')) {
            $data = array(
                'Name' => $this->input->post('service_name'),
                'service_charge_cost' => $this->input->post('cost'),
                'ChargeSubGroupID' => $this->input->post('sub_group'),
            );
            $this->db->where('id', $this->input->post('id'));
            $update = $this->db->update('service_charge_items', $data);
        } else {
            $data = array(
                'Name' => $this->input->post('service_name'),
                'service_charge_cost' => $this->input->post('cost'),
                'ChargeSubGroupID' => $this->input->post('sub_group'),
            );
            $insert = $this->db->insert('service_charge_items', $data);
            return $insert;
        }
    }
}
