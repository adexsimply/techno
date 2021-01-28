<?php
class Drug_m extends CI_Model {

    public function get_drug_items() {
        $get_drug_items_list = $this->db->select('di.*,dg.drug_group_name')->from('drug_items di')->join('drug_group as dg','dg.id=di.drug_group_id')->get();
        $drug_items_list = $get_drug_items_list->result();
        return $drug_items_list;  
        
    }

    public function get_drug_items_by_id() {
        $id = $this->input->post('id');
        $get_drug_items_list = $this->db->select('*')->from('drug_items')->where('drug_group_id',$id)->get();
        $drug_items_list = $get_drug_items_list->result();
        return $drug_items_list;  
        
    }

    public function get_drug_groups() {
        $get_drug_groups_list = $this->db->select('*')->from('drug_group')->get();
        $drug_groups_list = $get_drug_groups_list->result();
        return $drug_groups_list;  
        
    }
		
}

?>