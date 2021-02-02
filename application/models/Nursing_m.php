<?php
class Nursing_m extends CI_Model
{

    public function get_vitals_request_list()
    {
        $get_vitals_request = $this->db->select('pv.*,p.*,a.*,s.*,c.*,pv.date_added as date,pv.id as vital_id')->from('patient_vitals pv')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('patient_appointments as a', 'a.id=pv.appointment_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->order_by('pv.id', 'DESC')->get();
        $vitals_request_list = $get_vitals_request->result();
        return $vitals_request_list;
    }

    public function get_clinic_list()
    {
        $get_clinics = $this->db->select('*')->from('clinics')->get();
        $clinic_list = $get_clinics->result();
        return $clinic_list;
    }

    public function get_appointment_list()
    {
        $get_appointments = $this->db->select('p.*,pd.*, p.id as p_id')->from('patient_appointments as p')->join('patient_details as pd', 'p.patient_id=pd.id', 'left')->order_by('p.id', 'DESC')->get();
        $appointment_list = $get_appointments->result();
        return $appointment_list;
    }
    public function get_vital_by_id($patient_id)
    {
        $get_vital = $this->db->select('p.*,pd.*,c.*, p.id as p_id')->from('patient_appointments as p')->join('patient_details as pd', 'p.patient_id=pd.id', 'left')->join('clinics as c', 'c.id=p.clinic_id', 'left')->where('p.id', $patient_id)->get();
        $vital = $get_vital->row();
        return $vital;
    }

    public function get_handover_notes_list()
    {
        $get_handover_notes = $this->db->select('hn.*,s.staff_firstname,s.staff_lastname')->from('handover_notes hn')->join('staff as s', 's.user_id=hn.staff_id')->get();
        $handover_notes_list = $get_handover_notes->result();
        return $handover_notes_list;
    }


    public function get_operations_wait_list()
    {
        $get_operations_wait = $this->db->select('o.*,p.*,c.clinic_name,s.staff_firstname,s.staff_lastname,o.date_created as ops_date')->from('operations o')->join('patient_details as p', 'p.id=o.patient_id', 'left')->join('clinics as c', 'o.clinic_id=c.id', 'left')->join('staff as s', 's.user_id=o.sender_id')->get();
        $operations_wait = $get_operations_wait->result();
        return $operations_wait;
    }
    public function get_admission_requests_list()
    {
        $get_admission_requests = $this->db->select('ar.*,p.*,c.clinic_name,s.staff_firstname,s.staff_lastname,ar.date_created as ad_date')->from('admission_requests ar')->join('patient_details as p', 'p.id=ar.patient_id', 'left')->join('clinics as c', 'ar.clinic_id=c.id', 'left')->join('staff as s', 's.user_id=ar.sender_id')->get();
        $admission_requests = $get_admission_requests->result();
        return $admission_requests;
    }

    /////Add New User
    public function create_new_vital()
    {

        if ($this->input->post('vital_id')) {
            //  $data2 = array(
            //      'role_id' => $this->input->post('role'),
            //      'username' => $this->input->post('username'),
            //      'password' => $this->input->post('password')
            //  );
            //  $this->db->where('id', $this->input->post('user_id')); 
            //  $this->db->update('patient_vitals', $data2);
        } else {

            $datetime1 = date("Y-m-d");
            $datetime2 = $this->input->post('LMP');
            $diff = abs(strtotime($datetime2) - strtotime($datetime1));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $weeks = $days / 7;
            $EGA = number_format((float)$months / 7, 0, '.', '') . ' Months, ' .  number_format((float)$weeks, 0, '.', '') . ' ' . 'Weeks, ' . number_format((float)$days / 7, 0, '.', '') . ' Days';
            $EDD = date('l jS \of F Y h:i:s A', strtotime($this->input->post('LMP') . "+40 week"));


            $data2 = array(
                'clinic_id' => $this->input->post('clinic_id'),
                'doctor_id' => $this->input->post('doctor_id'),
                'appointment_id' => $this->input->post('appointment_id'),
                'patient_id' => $this->input->post('patient_id'),
                'weight' => $this->input->post('weight'),
                'height' => $this->input->post('height'),
                'BMI' => $this->input->post('BMI'),
                'bmi_remark' => $this->input->post('bmi_remark'),
                'HC' => $this->input->post('HC'),
                'MUAC' => $this->input->post('MUAC'),
                'nutritional_status' => $this->input->post('nutritional_status'),
                'BP' => $this->input->post('BP'),
                'temp' => $this->input->post('temp'),
                'ANC' => $this->input->post('ANC'),
                'respiration' => $this->input->post('respiration'),
                'paulse' => $this->input->post('paulse'),
                'SPO2' => $this->input->post('SPO2'),
                'RE' => $this->input->post('RE'),
                'LE' => $this->input->post('LE'),
                'LMP' => $this->input->post('LMP'),
                'EGA' => $EGA,
                'EDD' => $EDD,
            );

            $insert = $this->db->insert('patient_vitals', $data2);
            $user_id = $this->db->insert_id();
            return $insert;
        }
    }
}
