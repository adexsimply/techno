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


    public function get_discharge_type_list()
    {
        $get_clinics = $this->db->select('*')->from('discharge_type')->get();
        $clinic_list = $get_clinics->result();
        return $clinic_list;
    }


    public function get_wards_type_list()
    {
        $get_wards_type = $this->db->select('*')->from('ward_type')->get();
        $wards_list = $get_wards_type->result();
        return $wards_list;
    }


    public function get_available_wards_list()
    {
        $get_wards_type = $this->db->select('count(*) as num_avail,w.*,wt.ward_type_name')->from('wards as w')->join('ward_type as wt', 'w.ward_type_id=wt.id', 'left')->group_by('ward_type_id')->where('w.status','Free')->get();
        $wards_list = $get_wards_type->result();
        return $wards_list;
    }



    public function get_wards_list()
    {
        $get_wards_type = $this->db->select('w.*,wt.ward_type_name')->from('wards as w')->join('ward_type as wt', 'w.ward_type_id=wt.id', 'left')->get();
        $wards_list = $get_wards_type->result();
        return $wards_list;
    }

    public function get_available_wards_list2()
    {
        $get_wards_type = $this->db->select('w.*,wt.ward_type_name')->from('wards as w')->join('ward_type as wt', 'w.ward_type_id=wt.id', 'left')->where('w.status','Free')->get();
        $wards_list = $get_wards_type->result();
        return $wards_list;
    }


    public function get_ward_details_by_id($id)
    {
        $get_wards_type = $this->db->select('w.*,wt.ward_type_name, w.id as ward_id')->from('wards as w')->join('ward_type as wt', 'w.ward_type_id=wt.id', 'left')->where('w.id',$id)->get();
        $wards_list = $get_wards_type->row();
        return $wards_list;
    }

    public function create_new_admit() {
        if ($this->input->post('admission_id')) {
            $data = array(
                'date_admitted' => $this->input->post('admit_date'),
                'clinic_id' => $this->input->post('clinic'),
                'admission_request_id' => $this->input->post('admission_id'),
                'ward_id' => $this->input->post('ward'),
                'diagnosis' => $this->input->post('diagnosis')
            );
            $data2 = array(
                'status' => "On Admission"
            );
            $data3 = array(
                'status' => "Occupied"
            );
            $this->db->where('id', $this->input->post('admission_id'));
            $update = $this->db->update('admission_requests', $data2);
            ///////Remove ward
            $this->db->where('id', $this->input->post('ward'));
            $update = $this->db->update('wards', $data3);
            $insert = $this->db->insert('admission_status', $data);
        } else {
            $data = array(
                'request_date' => $this->input->post('admit_date'),
                'clinic_id' => $this->input->post('clinic'),
                'diagnosis' => $this->input->post('diagnosis'),
                'patient_id' => $this->input->post('select_patient'),
                'sender_id' => $this->session->userdata('active_user')->id,
                'status' => "On Admission"
            );
            $insert = $this->db->insert('admission_requests', $data);
            $data2 = array(
                'date_admitted' => $this->input->post('admit_date'),
                'clinic_id' => $this->input->post('clinic'),
                'admission_request_id' => $this->db->insert_id(),
                'patient_id' => $this->input->post('select_patient'),
                'ward_id' => $this->input->post('ward'),
                'diagnosis' => $this->input->post('diagnosis')
            );
            $insert2 = $this->db->insert('admission_status', $data2);
            return $insert2;
        }

    }

    public function create_new_discharge() {
        if ($this->input->post('admission_id')) {
            $data = array(
                'discharged' => $this->input->post('discharge_date'),
                'discharge_comment' => $this->input->post('discharge_comments'),
                'discharge_type' => $this->input->post('discharge_type')
            );
            $data2 = array(
                'status' => "Discharged"
            );
            $this->db->where('id', $this->input->post('admission_id'));
            $update = $this->db->update('admission_requests', $data2);

            $this->db->where('admission_request_id', $this->input->post('admission_id'));
            $update2 = $this->db->update('admission_status', $data);

            return $update;
        } 

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
        $get_admission_requests = $this->db->select('ar.*,p.*,c.clinic_name,s.staff_firstname,s.staff_lastname,ar.date_created as ad_date, ar.id as admission_id')->from('admission_requests ar')->join('patient_details as p', 'p.id=ar.patient_id', 'left')->join('clinics as c', 'ar.clinic_id=c.id', 'left')->join('staff as s', 's.user_id=ar.sender_id')->get();
        $admission_requests = $get_admission_requests->result();
        return $admission_requests;
    }

    public function get_admission_requests_list_d()
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');

        $get_admission_requests = $this->db->select('ar.*,p.*,c.clinic_name,s.staff_firstname,s.staff_lastname,ar.date_created as ad_date, ar.id as admission_id')->from('admission_requests ar')->join('patient_details as p', 'p.id=ar.patient_id', 'left')->join('clinics as c', 'ar.clinic_id=c.id', 'left')->join('staff as s', 's.user_id=ar.sender_id')->where('ar.status', 'Pending')->where('DATE(ar.request_date)',$curr_date)->get();
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
            'BP' => $this->input->post('BP1').'/'.$this->input->post('BP2'),
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

    public function create_new_ward() {
        if ($this->input->post('ward_id')) {
            $data = array(
                'ward_name' => $this->input->post('ward_name'),
                'ward_type_id' => $this->input->post('ward_type'),
                'doctor_nurse_fee' => $this->input->post('doc_nurse_fee'),
                'feeding' => $this->input->post('feeding'),
                'utility' => $this->input->post('utility'),
                'ward_rate' => $this->input->post('ward_rate'),
            );
            $this->db->where('id', $this->input->post('ward_id'));
            $update = $this->db->update('wards', $data);
        } else {
            $data = array(
                'ward_name' => $this->input->post('ward_name'),
                'ward_type_id' => $this->input->post('ward_type'),
                'doctor_nurse_fee' => $this->input->post('doc_nurse_fee'),
                'feeding' => $this->input->post('feeding'),
                'utility' => $this->input->post('utility'),
                'ward_rate' => $this->input->post('ward_rate'),
            );
            $insert = $this->db->insert('wards', $data);
            return $insert;
        }

    }




    public function get_appointment_vitals2()
    {
         $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');

        if ($this->session->userdata('active_user')->role_id ==1) {
        $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name, pa.id as app_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->order_by('pa.appointment_date', 'DESC')->order_by('pa.appointment_time', 'DESC')->where('DATE(pa.appointment_date)',$curr_date)->where('pa.id NOT IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)')->get();
        $appointment_list = $get_appointments->result();
        return $appointment_list;

        }
        else {

        $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name, pa.id as app_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->join('patient_vitals as pv', 'pv.appointment_id=pa.id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->order_by('pa.appointment_date', 'DESC')->order_by('pa.appointment_time', 'DESC')->where('DATE(pa.appointment_date)',$curr_date)->where('pa.clinic_id',$this->session->userdata('active_user')->department_id)->get();
        $appointment_list = $get_appointments->result();
        return $appointment_list;

        }
    }
    public function get_appointment_vitalsWL()
    {
         $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');

        $get_appointments = $this->db->select('pv.*,pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,p.id as p_id,pv.*, pa.id as app_id,pv.id as vital_id')->from('patient_vitals pv')->join('patient_appointments as pa', 'pa.id=pv.appointment_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->where('DATE(pa.appointment_date)',$curr_date)->order_by('pa.appointment_date', 'DESC')->order_by('pa.appointment_time', 'DESC')->get();
        $appointment_list = $get_appointments->result();
        return $appointment_list;
    }

    public function get_admission_requests_list_f()
    {
        if ($this->input->post('status')) {
            $status = $this->input->post('status'); 
            if ($status == 'Pending') {
                $cond = array('ar.status' => $status);
            } elseif ($status == 'On Admission') {
                $cond = array('ar.status' => $status);
            } elseif ($status == 'Discharged') {
                $cond = array('ar.status' => $status);
            } else {
                $cond = '1=1';
            }
        }

        // if ($this->input->post('clinic_id')) {
        //     $clinic_id = $this->input->post('clinic_id');
        //     if ($clinic_id != 'all') {
        //         $clinic_cond = 'ar.clinic_id IN (SELECT clinic_id FROM admission_requests WHERE clinic_id=' . $clinic_id . ')';
        //         //$doctor_cond = 'pa.doctor_id',
        //         //$doctor_cond = explode(',', $doctor_cond);
        //     } else {
        //         $clinic_cond = '1=1';
        //     }
        // }

        $today_date = date('Y-m-d');

        if ($this->input->post('date_range_from') != $today_date) {

            $first_date = $this->input->post('date_range_from');
            $second_date =  $this->input->post('date_range_to');

            $date_range = array('request_date >=' => $first_date, 'request_date <=' => $second_date);
        } else {

           $date_range = array('request_date' => $today_date);

        }


        $get_admission_requests = $this->db->select('ar.*,as.*,w.ward_name,p.*,c.clinic_name,s.staff_firstname,s.staff_lastname,ar.date_created as ad_date, ar.id as admission_id')->from('admission_requests ar')->join('admission_status as as', 'ar.id=as.admission_request_id', 'left')->join('wards as w', 'w.id=as.ward_id', 'left')->join('patient_details as p', 'p.id=ar.patient_id', 'left')->join('clinics as c', 'ar.clinic_id=c.id', 'left')->join('staff as s', 's.user_id=ar.sender_id')->where($cond)->where($date_range)->get();
        $admission_requests = $get_admission_requests->result();
        return $admission_requests;
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
        // if ($this->input->post('doctor_id')) {
        //     $doctor_id = $this->input->post('doctor_id');
        //     if ($doctor_id != 'all') {
        //         $doctor_cond = 'pa.doctor_id IN (SELECT doctor_id FROM patient_appointments WHERE doctor_id=' . $doctor_id . ')';
        //         //$doctor_cond = 'pa.doctor_id',
        //         //$doctor_cond = explode(',', $doctor_cond);
        //     } else {
        //         $doctor_cond = '1=1';
        //     }
        // }
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

        $today_date = date('Y-m-d');

        if ($this->input->post('date_range_from') != $today_date) {
            //$date_range = explode('-', $this->input->post('date_range'));


            // $date1 = date_create($date_range[0]);
            // $date2 = date_create($date_range[1]);
            //echo date_format($date,"Y/m/d H:i:s");
            $first_date = $this->input->post('date_range_from');
            $second_date =  $this->input->post('date_range_to');

            $date_range = array('appointment_date >=' => $first_date, 'appointment_date <=' => $second_date);
        } else {
            // $date = new DateTime("now");
            // $curr_date = $date->format('Y-m-d ');
           $date_range = array('appointment_date' => $today_date);
           //$date_range = 'pa.appointment_date IN (SELECT appointment_date FROM patient_appointments WHERE appointment_date=' . $today_date . ')';
            //$date_range = 'appointment_date='.$today_date .'';
           // $date_range = '1=1';
        }

        // $doctor_cond = '1=1';
        // $cond = 'pa.id IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        // $cond = 'pa.id IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        // $first_date = "2020-10-16";
        // $second_date = "2021-01-30";

        //$cond1 = 'pa.id NOT IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,pv.*, pa.id as app_id,pv.id as vital_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->join('staff as s', 's.user_id=pa.doctor_id', 'left')->join('patient_vitals as pv', 'pv.appointment_id=pa.id', 'left')->where($cond)->where($clinic_cond)->where($date_range)->order_by('pa.appointment_date', 'DESC')->order_by('pa.appointment_time', 'DESC')->get();
        // print_r($this->db->last_query());
        $appointment_list = $get_appointments->result();
      //  return $this->db->last_query();
        return $appointment_list;
    }

    public function get_appointment_vitalsWL_filtered()
    {
        // if ($this->input->post('status')) {
        //     $status = $this->input->post('status');
        //     if ($status == 'Pending') {
        //         $cond = 'pa.id NOT IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        //     } elseif ($status == 'Treated') {
        //         $cond = 'pa.id IN (SELECT appointment_id FROM patient_vitals WHERE appointment_id=pa.id)';
        //     } else {
        //         $cond = '1=1';
        //     }
        // }

        if ($this->input->post('clinic_id')) {
            $clinic_id = $this->input->post('clinic_id');
            if ($clinic_id != 'all') {
                $clinic_cond = 'pa.clinic_id IN (SELECT clinic_id FROM patient_appointments WHERE clinic_id=' . $clinic_id . ')';

            } else {
                $clinic_cond = '1=1';
            }
        }

        $today_date = date('Y-m-d');

        if ($this->input->post('date_range_from') != $today_date) {
            //
            $first_date = $this->input->post('date_range_from');
            $second_date =  $this->input->post('date_range_to');

            $date_range = array('pa.appointment_date >=' => $first_date, 'pa.appointment_date <=' => $second_date);
        } else {

           $date_range = array('pa.appointment_date' => $today_date);

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
        //
        $get_appointments = $this->db->select('pv.*,pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,p.id as p_id,pv.*, pa.id as app_id,pv.id as vital_id')->from('patient_vitals pv')->join('patient_appointments as pa', 'pa.id=pv.appointment_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->where($clinic_cond)->where($doctor_cond)->where($date_range)->order_by('pa.appointment_date', 'DESC')->order_by('pa.appointment_time', 'DESC')->get();
        //
        // $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname,pv.*, pa.id as app_id,pv.id as vital_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->join('staff as s', 's.user_id=pa.doctor_id', 'left')->join('patient_vitals as pv', 'pv.appointment_id=pa.id', 'left')->where($cond)->where($clinic_cond)->where($date_range)->order_by('pa.id', 'DESC')->get();
        // print_r($this->db->last_query());
        $appointment_list = $get_appointments->result();
      //return $this->db->last_query();
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
