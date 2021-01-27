<?php
class Retainer_m extends CI_Model {

    public function get_retainers_list() {
        $get_retainers_list = $this->db->select('*')->from('retainers')->get();
        $retainers_list = $get_retainers_list->result();
        return $retainers_list;  
        
    }

    public function get_drug_groups() {
        $get_drug_groups_list = $this->db->select('*')->from('drug_group')->get();
        $drug_groups_list = $get_drug_groups_list->result();
        return $drug_groups_list;  
        
    }
    public function get_retainer_by_id($retainer_id) {
        $get_retainer = $this->db->select('*')->from('retainers')->where('id', $retainer_id)->get();
        $retainer = $get_retainer->row();
        return $retainer;  
        
    }
		
}

?>