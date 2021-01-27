<?php
class Nursing_m extends CI_Model {

    public function get_vitals_request_list() {
        $get_vitals_request = $this->db->select('vr.*,p.*,a.*,c.clinic_name')->from('vitals_request vr')->join('patient_details as p','p.id=vr.patient_id','left')->join('patient_appointments as a','a.id=vr.appointment_id','left')->join('clinics as c','a.clinic_id=c.id','left')->get();
        $vitals_request_list = $get_vitals_request->result();
        return $vitals_request_list;  
        
    }

    public function get_clinic_list() {
        $get_clinics = $this->db->select('*')->from('clinics')->get();
        $clinic_list = $get_clinics->result();
        return $clinic_list;  
        
    }
    public function get_handover_notes_list() {
        $get_handover_notes = $this->db->select('hn.*,s.staff_firstname,s.staff_lastname')->from('handover_notes hn')->join('staff as s','s.user_id=hn.staff_id')->get();
        $handover_notes_list = $get_handover_notes->result();
        return $handover_notes_list;  
        
    }


    public function get_operations_wait_list() {
        $get_operations_wait = $this->db->select('o.*,p.*,c.clinic_name,s.staff_firstname,s.staff_lastname,o.date_created as ops_date')->from('operations o')->join('patient_details as p','p.id=o.patient_id','left')->join('clinics as c','o.clinic_id=c.id','left')->join('staff as s','s.user_id=o.sender_id')->get();
        $operations_wait = $get_operations_wait->result();
        return $operations_wait;  
        
    }
    public function get_admission_requests_list() {
        $get_admission_requests = $this->db->select('ar.*,p.*,c.clinic_name,s.staff_firstname,s.staff_lastname,ar.date_created as ad_date')->from('admission_requests ar')->join('patient_details as p','p.id=ar.patient_id','left')->join('clinics as c','ar.clinic_id=c.id','left')->join('staff as s','s.user_id=ar.sender_id')->get();
        $admission_requests = $get_admission_requests->result();
        return $admission_requests;  
        
    }



		
}

?>