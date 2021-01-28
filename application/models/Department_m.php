<?php
class Department_m extends CI_Model {

    public function get_department_list() {
        $get_departments = $this->db->select('*')->from('departments')->get();
        $department_list = $get_departments->result();
        return $department_list;  
        
    }

    public function get_clinic_list() {
        $get_clinics = $this->db->select('*')->from('clinics')->get();
        $clinic_list = $get_clinics->result();
        return $clinic_list;        
    }

    public function get_patient_by_id($patient_id) {
        $get_patients = $this->db->select('p.*,pn.*, p.id as p_id')->from('patient_details p')->join('patient_nok as pn', 'p.id=pn.patient_id', 'left')->where('p.id', $patient_id)->get();
        $patient_list = $get_patients->row();
        return $patient_list;  
        
    }
    public function get_patient_history_by_id($patient_id) {
        $get_patient_history = $this->db->select('*')->from('patient_health_history')->where('patient_id', $patient_id)->get();
        $patient_history = $get_patient_history->result();
        return $patient_history;  
        
    }

    public function create_department_name()
    {
    
        if ($this->input->post('department_id'))
        {           
        $this->db->set('department_name', $this->input->post('department_name'));
        $this->db->where('id', $this->input->post('department_id'));
        $this->db->update('departments');         
        }
        else {
        $data = array(
            'department_name' => $this->input->post('department_name')
        );
        $insert = $this->db->insert('departments', $data);

        return $insert;
        }
    }

    function get_department_by_id(){
        $id = $this->input->post('id');
        $get_department = $this->db->select('*')->from('departments')->where('id', $id)->get();
        $department_list = $get_department->row();
        return $department_list;
    }



		
}
