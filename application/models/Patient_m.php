<?php
class Patient_m extends CI_Model {

    public function get_patient_list() {
        $get_patients = $this->db->select('p.*,pn.*, p.id as p_id')->from('patient_details p')->join('patient_nok as pn', 'p.id=pn.patient_id', 'left')->order_by('p.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;  
        
    }

    ////////Get Enrollee Type List
    public function get_enrollee_type_list() {
        $get_enrollee_type = $this->db->select('*')->from('enrollee_type')->get();
        $enrollee_type_list = $get_enrollee_type->result();
        return $enrollee_type_list;  
        
    }

    public function get_patient_by_id($patient_id) {
        $get_patients = $this->db->select('p.*,pn.*, p.id as p_id')->from('patient_details p')->join('patient_nok as pn', 'p.id=pn.patient_id', 'left')->where('p.id', $patient_id)->get();
        $patient_list = $get_patients->row();
        return $patient_list;  
        
    }
    public function get_patient_billings($patient_id) {
        $get_patient_billings = $this->db->select('b.*,u.username')->from('billings b')->join('users as u', 'u.id=b.billed_by', 'left')->where('b.patient_id', $patient_id)->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;  
        
    }
    public function get_patient_history_by_id($patient_id) {
        $get_patient_history = $this->db->select('*')->from('patient_health_history')->where('patient_id', $patient_id)->get();
        $patient_history = $get_patient_history->result();
        return $patient_history;  
        
    }

    public function get_patient_names() {

        $request = $_POST['request'];   // request
        if($request == 1){
        $q = $_POST['q'];
        $this->db->select('*');
        $this->db->from('patient_details');
        $this->db->like('patient_name', $q, 'both');

        $get_patients = $this->db->get();
        $patient_list = $get_patients->result();
        return $patient_list;  
    }
        
    }


    public function get_patient_names2() {
        $user_id = $this->input->post('userid');
        $get_patients = $this->db->select('*')->from('patient_details')->where('id', $user_id)->get();
        $patient_list = $get_patients->row();
        return $patient_list;  
        
    }


		
}

?>