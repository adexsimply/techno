<?php
class Setting_m extends CI_Model {

    public function get_lab_tests() {
        $get_lab_tests_list = $this->db->select('lt.*,lg.lab_group_name')->from('lab_tests lt')->join('lab_group as lg','lg.id=lt.lab_group_id')->where('lt.lab_test_name IS NOT NULL')->order_by('lt.lab_test_name','ASC')->get();
        $lab_tests_list = $get_lab_tests_list->result();
        return $lab_tests_list;  
        
    }

    public function get_drug_groups() {
        $get_drug_groups_list = $this->db->select('*')->from('drug_group')->get();
        $drug_groups_list = $get_drug_groups_list->result();
        return $drug_groups_list;  
        
    }
    public function get_lab_groups() {
        $get_lab_groups_list = $this->db->select('*')->from('lab_group')->get();
        $lab_groups_list = $get_lab_groups_list->result();
        return $lab_groups_list;  
        
    }
    public function get_states() {
        $get_states_list = $this->db->select('*')->from('states')->get();
        $states_list = $get_states_list->result();
        return $states_list;  
        
    }
    public function get_salutations() {
        $get_salutations_list = $this->db->select('*')->from('salutations')->get();
        $salutations_list = $get_salutations_list->result();
        return $salutations_list;  
        
    }
		
}

?>