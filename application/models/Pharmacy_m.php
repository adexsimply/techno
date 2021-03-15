<?php
class Pharmacy_m extends CI_Model {
    
        //  $date = new DateTime("now");
        // $curr_date = $date->format('Y-m-d ');

        // $get_appointments = $this->db->select('pv.*,pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,p.id as p_id,pv.*, pa.id as app_id,pv.id as vital_id')->from('patient_vitals pv')->join('patient_appointments as pa', 'pa.id=pv.appointment_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->where('DATE(pa.appointment_date)',$curr_date)->order_by('pa.appointment_date', 'DESC')->order_by('pa.appointment_time', 'DESC')->get();
        // $appointment_list = $get_appointments->result();
        // return $appointment_list;
		
}
