<?php
class Request_m extends CI_Model {

    public function get_request_destinations_list() {
        $get_request_destinations = $this->db->select('*')->from('request_destinations')->get();
        $request_destinations_list = $get_request_destinations->result();
        return $request_destinations_list;  
        
    }

    public function get_pharmacy_request_list() {
        $get_pharmacy_request = $this->db->select('pr.*,rd.request_destination_name,s.staff_firstname,s.staff_lastname')->from('pharmacy_requests pr')->join('request_destinations as rd','rd.id=pr.request_destination_id','left')->join('staff as s','s.user_id=pr.request_by')->get();
        $pharmacy_request_list = $get_pharmacy_request->result();
        return $pharmacy_request_list;  
        
    }

    public function get_prescription_request_list() {
        $get_pharmacy_request = $this->db->select('pr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num,rd.request_destination_name,s.staff_firstname,s.staff_lastname')->from('prescription_requests pr')->join('patient_details as p','p.id=pr.patient_id','left')->join('request_destinations as rd','rd.id=pr.request_destination_id','left')->join('staff as s','s.user_id=pr.request_by')->where('patient_id IS NOT NULL')->get();
        $pharmacy_request_list = $get_pharmacy_request->result();
        return $pharmacy_request_list;  
        
    }

    public function get_lab_request_list() {
        $get_lab_request = $this->db->select('lr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_gender,p.patient_id_num,c.clinic_name,s.staff_firstname,s.staff_lastname,lt.lab_test_name')->from('lab_requests lr')->join('patient_details as p','p.id=lr.patient_id','left')->join('clinics as c','c.id=lr.clinic_id','left')->join('staff as s','s.user_id=lr.requested_by','left')->join('lab_tests as lt','lt.id=lr.lab_test_id','left')->where('patient_id IS NOT NULL')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;  
        
    }

		
}

?>