<?php
class Nursing_m extends CI_Model
{

    public function get_vitals_request_list()
    {
        $get_vitals_request = $this->db->select('pv.*,p.*,a.*,s.*,c.*,pv.date_added as date,pv.id as vital_id')->from('patient_vitals as pv')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('patient_appointments as a', 'a.id=pv.appointment_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->order_by('pv.id', 'DESC')->get();
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

    public function get_edit_vitals_request_by_id($id)
    {
        $get_vitals_request = $this->db->select('pv.*,p.*,a.id as appointment_id,s.id as doctor_id,s.staff_firstname,s.staff_middlename,s.staff_lastname,c.*,pv.date_added as date,pv.id as vital_id')->from('patient_vitals pv')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('patient_appointments as a', 'a.id=pv.appointment_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->where('pv.id', $id)->get();
        $vitals_request_list = $get_vitals_request->row();
        return $vitals_request_list;
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
        $datetime1 = date("Y-m-d");
        $datetime2 = $this->input->post('LMP');
        $diff = abs(strtotime($datetime2) - strtotime($datetime1));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $weeks = $days / 7;
        $EGA = number_format((float)$months, 0, '.', '') . ' Months, ' .  number_format((float)$weeks, 0, '.', '') . ' ' . 'Weeks, ' . number_format((float)$days, 0, '.', '') . ' Days';
        $EDD = date('d M Y', strtotime($this->input->post('LMP') . "+40 week"));


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


        if ($this->input->post('edit_vital_id')) {
            $this->db->where('id', $this->input->post('edit_vital_id'));
            $update = $this->db->update('patient_vitals', $data2);
            return $update;
        } else {
            $insert = $this->db->insert('patient_vitals', $data2);
            return $insert;
        }
    }




    public function get_appointment_vitals2()
    {
        $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,pv.*, pa.id as app_id, pv.id as vital_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->join('patient_vitals as pv', 'pv.appointment_id=pa.id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->order_by('pv.id', 'DESC')->get();
        $appointment_list = $get_appointments->result();
        return $appointment_list;
    }
    public function get_appointment_vitals3()
    {
        $get_appointments = $this->db->select('pv.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,p.id as p_id,pv.*, pa.id as app_id,')->from('patient_vitals pv')->join('patient_appointments as pa', 'pa.id=pv.appointment_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->order_by('pv.id', 'DESC')->get();
        $appointment_list = $get_appointments->result();
        return $appointment_list;
    }

    public function get_appointment_vitals()
    {
        if ($this->input->post('status')) {
            $status = $this->input->post('status');
            if ($status == 'Pending') {
                $cond = 'pa.id NOT IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
            } elseif ($status == 'Treated') {
                $cond = 'pa.id IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
            } else {
                $cond = '1=1';
            }
        }
        if ($this->input->post('doctor_id')) {
            $doctor_id = $this->input->post('doctor_id');
            if ($doctor_id != 'all') {
                $doctor_cond = 'pa.doctor_id IN (SELECT doctor_id FROM patient_appointments WHERE doctor_id=' . $doctor_id . ')';
                //$doctor_cond = 'pa.doctor_id',
                //$doctor_cond = explode(',', $doctor_cond);
            } else {
                $doctor_cond = '1=1';
            }
        }
        if ($this->input->post('clinic_id')) {
            $clinic_id = $this->input->post('clinic_id');
            if ($clinic_id != 'all') {
                $clinic_cond = 'pa.clinic_id IN (SELECT clinic_id FROM patient_appointments WHERE clinic_id=' . $clinic_id . ')';
                //$doctor_cond = 'pa.doctor_id',
                //$doctor_cond = explode(',', $doctor_cond);
            } else {
                $clinic_cond = '1=1';
            }
        }

        if ($this->input->post('date_range')) {
            $date_range = explode('-', $this->input->post('date_range'));


            $date1 = date_create($date_range[0]);
            $date2 = date_create($date_range[1]);
            //echo date_format($date,"Y/m/d H:i:s");
            $first_date = date_format($date1, "Y-m-d");
            $second_date =  date_format($date2, "Y-m-d");

            $date_range = array('appointment_date >=' => $first_date, 'appointment_date <=' => $second_date);
        } else {
            $date_range = '1=1';
        }

        // $doctor_cond = '1=1';
        // $cond = 'pa.id IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        // $cond = 'pa.id IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        // $first_date = "2020-10-16";
        // $second_date = "2021-01-30";

        //$cond1 = 'pa.id NOT IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,pv.*, pa.id as app_id,pv.id as vital_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->join('staff as s', 's.user_id=pa.doctor_id', 'left')->join('patient_vitals as pv', 'pv.appointment_id=pa.id', 'left')->where($cond)->where($doctor_cond)->where($clinic_cond)->where($date_range)->order_by('pa.id', 'DESC')->get();
        // print_r($this->db->last_query());
        $appointment_list = $get_appointments->result();
        return $appointment_list;
    }

    public function calc_ega_edd()
    {
        $datetime1 = date("Y-m-d");
        $datetime2 = $this->input->post('lmp');
        $diff = abs(strtotime($datetime1) - strtotime($datetime2));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $weeks = $days / 7;

        $EGA = number_format((float)$months / 7, 0, '.', '') . ' Months, ' .  number_format((float)$weeks, 0, '.', '') . ' ' . 'Weeks, ' . number_format((float)$days, 0, '.', '') . ' Days';


        $EDD = date('l jS \of F Y h:i:s A', strtotime($this->input->post('lmp') . "+40 week"));

        return array('ega' => $EGA, 'edd' => $EDD);
    }
    public function calc_edd()
    {
        $EDD = date('l jS \of F Y h:i:s A', strtotime($this->input->post('LMP') . "+40 week"));
    }
}
