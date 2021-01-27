<?php
class Laboratory_m extends CI_Model {

    public function get_specimen_list() {
        $get_specimen = $this->db->select('*')->from('lab_specimens')->get();
        $specimen_list = $get_specimen->result();
        return $specimen_list;  
        
    }
		
}

?>