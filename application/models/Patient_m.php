<?php
class Patient_m extends CI_Model
{

    public function get_patient_list()
    {
        $get_patients = $this->db->select('p.*,pn.*, p.id as p_id')->from('patient_details p')->join('patient_nok as pn', 'p.id=pn.patient_id', 'left')->order_by('p.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }

    ////////Get Enrollee Type List
    public function get_enrollee_type_list()
    {
        $get_enrollee_type = $this->db->select('*')->from('enrollee_type')->get();
        $enrollee_type_list = $get_enrollee_type->result();
        return $enrollee_type_list;
    }

    public function get_patient_by_id($patient_id)
    {
        $get_patients = $this->db->select('p.*,pn.*,pv.*, pv.id as vital_id, p.id as p_id')->from('patient_details p')->join('patient_nok as pn', 'p.id=pn.patient_id', 'left')->join('patient_vitals as pv', 'pv.patient_id=p.id', 'left')->where('p.id', $patient_id)->get();
        $patient_list = $get_patients->row();
        return $patient_list;
    }
    public function get_patient_billings($patient_id)
    {
        $get_patient_billings = $this->db->select('b.*,u.username')->from('billings b')->join('users as u', 'u.id=b.billed_by', 'left')->where('b.patient_id', $patient_id)->get();
        $patient_billings = $get_patient_billings->result();
        return $patient_billings;
    }
    public function get_patient_history_by_id($patient_id)
    {
        $get_patient_history = $this->db->select('*')->from('patient_health_history')->where('patient_id', $patient_id)->get();
        $patient_history = $get_patient_history->result();
        return $patient_history;
    }

    public function get_patient_names()
    {

        $request = $_POST['request'];   // request
        if ($request == 1) {
            $q = $_POST['q'];
            $this->db->select('*');
            $this->db->from('patient_details');
            $this->db->like('patient_name', $q, 'both');

            $get_patients = $this->db->get();
            $patient_list = $get_patients->result();
            return $patient_list;
        }
    }


    public function get_patient_names2()
    {
        $user_id = $this->input->post('userid');
        $get_patients = $this->db->select('*')->from('patient_details')->where('id', $user_id)->get();
        $patient_list = $get_patients->row();
        return $patient_list;
    }
    public function save_consultation()
    {
        if ($this->input->post('con_id')) {
            $data = array(
                'complaint' => $this->input->post('complaint'),
                'presenting_complaint' => $this->input->post('presenting_complaint'),
                'past_medical_hx' => $this->input->post('past_medical_hx'),
                'immunization_hx' => $this->input->post('immunization_hx'),
                'family_hx' => $this->input->post('family_hx'),
                'diet' => $this->input->post('diet'),
                'examination' => $this->input->post('examination'),
                'result' => $this->input->post('result'),
                'assignment' => $this->input->post('assignment'),
                'investigation' => $this->input->post('investigation'),
                'treatment' => $this->input->post('treatment'),
                'summary' => $this->input->post('summary'),
            );
            $this->db->where('id', $this->input->post('con_id'));
            $update = $this->db->update('consultations', $data);
            return $update;
        } else {
            $data = array(
                'appointment_id' => $this->input->post('appointment_id'),
                'patient_id' => $this->input->post('patient_id'),
                'doctor_id' => $this->input->post('doctor_id'),
                'vital_id' => $this->input->post('vital_id'),
                'complaint' => $this->input->post('complaint'),
                'presenting_complaint' => $this->input->post('presenting_complaint'),
                'past_medical_hx' => $this->input->post('past_medical_hx'),
                'immunization_hx' => $this->input->post('immunization_hx'),
                'family_hx' => $this->input->post('family_hx'),
                'diet' => $this->input->post('diet'),
                'examination' => $this->input->post('examination'),
                'result' => $this->input->post('result'),
                'assignment' => $this->input->post('assignment'),
                'investigation' => $this->input->post('investigation'),
                'treatment' => $this->input->post('treatment'),
                'summary' => $this->input->post('summary'),
            );
            $insert = $this->db->insert('consultations', $data);
        }
    }
    public function get_consultations_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('c.*, s.staff_firstname,s.staff_middlename,s.staff_lastname, c.id as con_id')->from('consultations c')->join('staff as s', 's.user_id=c.doctor_id', 'left')->where('c.patient_id', $patient_id)->where('c.vital_id', $vital_id)->order_by('c.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }


    public function get_eye_clinics_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('e.*, s.staff_firstname,s.staff_middlename,s.staff_lastname, e.id as eye_id')->from('eye_clinics e')->join('staff as s', 's.user_id=e.doctor_id', 'left')->where('e.patient_id', $patient_id)->where('e.vital_id', $vital_id)->order_by('e.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }

    function get_consultation_by_id($id)
    {
        $get_consultation = $this->db->select('c.*,pv.*,pd.*, c.id as con_id, c.date_added as date, cl.clinic_name as clinic_name')->from('consultations c')->join('patient_vitals as pv', 'pv.patient_id=c.patient_id', 'left')->join('patient_details as pd', 'pd.id=c.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('c.id', $id)->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }
    function get_eye_clinic_by_id($id)
    {
        $get_consultation = $this->db->select('e.*,pv.*,pd.*, e.id as eye_id, e.date_added as date, cl.clinic_name as clinic_name')->from('eye_clinics e')->join('patient_vitals as pv', 'pv.patient_id=e.patient_id', 'left')->join('patient_details as pd', 'pd.id=e.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('e.id', $id)->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }

    public function save_eye_clinic()
    {
        if ($this->input->post('eye_id')) {
            $data = array(
                'complaint' => $this->input->post('complaint'),
                'presenting_complaint' => $this->input->post('presenting_complaint'),
                'past_medical_history' => $this->input->post('past_medical_history'),
                'opthalmic_history' => $this->input->post('opthalmic_history'),
                'family_hx' => $this->input->post('family_hx'),
                'VA' => $this->input->post('VA'),
                'IOP' => $this->input->post('IOP'),
                'result' => $this->input->post('result'),
                'refraction' => $this->input->post('refraction'),
                'external_examination' => $this->input->post('external_examination'),
                'ophthalmoscopy' => $this->input->post('ophthalmoscopy'),
                'slt_lamp' => $this->input->post('slt_lamp'),
                'diagosis' => $this->input->post('diagosis'),
            );
            $this->db->where('id', $this->input->post('eye_id'));
            $update = $this->db->update('eye_clinics', $data);
            return $update;
        } else {
            $data = array(
                'appointment_id' => $this->input->post('appointment_id'),
                'patient_id' => $this->input->post('patient_id'),
                'doctor_id' => $this->input->post('doctor_id'),
                'vital_id' => $this->input->post('vital_id'),
                'complaint' => $this->input->post('complaint'),
                'presenting_complaint' => $this->input->post('presenting_complaint'),
                'past_medical_history' => $this->input->post('past_medical_history'),
                'opthalmic_history' => $this->input->post('opthalmic_history'),
                'family_hx' => $this->input->post('family_hx'),
                'VA' => $this->input->post('VA'),
                'IOP' => $this->input->post('IOP'),
                'result' => $this->input->post('result'),
                'refraction' => $this->input->post('refraction'),
                'external_examination' => $this->input->post('external_examination'),
                'ophthalmoscopy' => $this->input->post('ophthalmoscopy'),
                'diagosis' => $this->input->post('diagosis'),
                'slt_lamp' => $this->input->post('slt_lamp'),
            );
            $insert = $this->db->insert('eye_clinics', $data);
        }
    }

    public function save_dental()
    {
        if ($this->input->post('dental_id')) {
            $data = array(
                'complaint' => $this->input->post('complaint'),
                'presenting_complaint' => $this->input->post('presenting_complaint'),
                'past_medical_history' => $this->input->post('past_medical_history'),
                'past_dental_hx' => $this->input->post('past_dental_hx'),
                'drug_hx' => $this->input->post('drug_hx'),
                'family_hx' => $this->input->post('family_hx'),
                'examination' => $this->input->post('examination'),
                'impression' => $this->input->post('impression'),
                'assignment' => $this->input->post('assignment'),
                'treatment' => $this->input->post('treatment'),
                'investigation' => $this->input->post('investigation'),
                'management' => $this->input->post('management'),
            );
            $this->db->where('id', $this->input->post('dental_id'));
            $update = $this->db->update('dental_clinics', $data);
            return $update;
        } else {
            $data = array(
                'appointment_id' => $this->input->post('appointment_id'),
                'patient_id' => $this->input->post('patient_id'),
                'doctor_id' => $this->input->post('doctor_id'),
                'vital_id' => $this->input->post('vital_id'),
                'complaint' => $this->input->post('complaint'),
                'presenting_complaint' => $this->input->post('presenting_complaint'),
                'past_medical_history' => $this->input->post('past_medical_history'),
                'past_dental_hx' => $this->input->post('past_dental_hx'),
                'drug_hx' => $this->input->post('drug_hx'),
                'family_hx' => $this->input->post('family_hx'),
                'examination' => $this->input->post('examination'),
                'impression' => $this->input->post('impression'),
                'assignment' => $this->input->post('assignment'),
                'treatment' => $this->input->post('treatment'),
                'investigation' => $this->input->post('investigation'),
                'management' => $this->input->post('management'),
            );
            $insert = $this->db->insert('dental_clinics', $data);
        }
    }

    public function get_dental_clinic_by_id($id)
    {
        $get_consultation = $this->db->select('d.*,pv.*,pd.*, d.id as dental_id, d.date_added as date, cl.clinic_name as clinic_name')->from('dental_clinics d')->join('patient_vitals as pv', 'pv.patient_id=d.patient_id', 'left')->join('patient_details as pd', 'pd.id=d.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('d.id', $id)->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }

    public function get_dental_clinics_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('d.*, s.staff_firstname,s.staff_middlename,s.staff_lastname, d.id as dental_id')->from('dental_clinics d')->join('staff as s', 's.user_id=d.doctor_id', 'left')->where('d.patient_id', $patient_id)->where('d.vital_id', $vital_id)->order_by('d.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }
    public function get_med_report_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('d.*, s.staff_firstname,s.staff_middlename,s.staff_lastname, d.id as dental_id')->from('med_report d')->join('staff as s', 's.user_id=d.doctor_id', 'left')->where('d.patient_id', $patient_id)->where('d.vital_id', $vital_id)->order_by('d.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }
}
