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
    public function states()
    {
        $states = $this->db->select('*')->from('states')->order_by('id', 'ASC')->get();
        $states_list = $states->result();
        return $states_list;
    }
    public function countries()
    {
        $countries = $this->db->select('*')->from('countries')->order_by('id', 'ASC')->get();
        $countries_list = $countries->result();
        return $countries_list;
    }
    public function get_edit_vitals_request_by_id($id)
    {
        $get_vitals_request = $this->db->select('pv.*,p.*,a.id as appointment_id,s.user_id as doctor_id,s.staff_firstname,s.staff_middlename,s.staff_lastname,c.*,pv.date_added as date,pv.id as vital_id')->from('patient_vitals pv')->join('patient_details as p', 'p.id=pv.patient_id', 'left')->join('patient_appointments as a', 'a.id=pv.appointment_id', 'left')->join('staff as s', 's.user_id=pv.doctor_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->where('pv.id', $id)->get();
        $vitals_request_list = $get_vitals_request->row();
        return $vitals_request_list;
    }

    public function get_patient_by_id($patient_id)
    {
        $get_patients = $this->db->select('p.*,pn.*,pv.*,pa.appointment_date,pa.appointment_time, pv.id as vital_id, p.id as p_id')->from('patient_details p')->join('patient_nok as pn', 'p.id=pn.patient_id', 'left')->join('patient_vitals as pv', 'pv.patient_id=p.id', 'left')->join('patient_appointments as pa', 'pa.id=pv.appointment_id', 'left')->where('p.id', $patient_id)->get();
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
        $get_patients = $this->db->select('d.*, s.staff_firstname,s.staff_middlename,s.staff_lastname, d.id as med_report_id')->from('med_reports d')->join('staff as s', 's.user_id=d.doctor_id', 'left')->where('d.patient_id', $patient_id)->where('d.vital_id', $vital_id)->order_by('d.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }
    public function get_med_report_by_id($id)
    {
        $get_consultation = $this->db->select('d.*,pv.*,pd.*, d.id as med_report_id, d.date_added as date, s.staff_firstname,s.staff_middlename,s.staff_lastname, cl.clinic_name as clinic_name')->from('med_reports d')->join('patient_vitals as pv', 'pv.patient_id=d.patient_id', 'left')->join('staff as s', 's.user_id=d.doctor_id', 'left')->join('patient_details as pd', 'pd.id=d.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('d.id', $id)->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }

    public function save_med_report()
    {
        if ($this->input->post('med_report_id')) {
            $data = array(
                'report' => $this->input->post('report'),
            );
            $this->db->where('id', $this->input->post('med_report_id'));
            $update = $this->db->update('med_reports', $data);
            return $update;
        } else {
            $data = array(
                'appointment_id' => $this->input->post('appointment_id'),
                'patient_id' => $this->input->post('patient_id'),
                'doctor_id' => $this->input->post('doctor_id'),
                'vital_id' => $this->input->post('vital_id'),
                'report' => $this->input->post('report'),
            );
            $insert = $this->db->insert('med_reports', $data);
        }
    }

    //Drugs
    public function drugs()
    {
        $drugs = $this->db->select('*')->from('drug_items')->order_by('id', 'DESC')->get();;
        $drugs_result = $drugs->result();
        return $drugs_result;
    }
    //lab test
    public function lab_tests()
    {
        $lab_test = $this->db->select('*')->from('lab_tests')->order_by('id', 'DESC')->get();;
        $lab_test_result = $lab_test->result();
        return $lab_test_result;
    }
    //rad service
    public function rad_items()
    {
        $where = "ChargeSubGroupID = '57' or ChargeSubGroupID = '58' or ChargeSubGroupID = '82'";
        $lab_test = $this->db->select('*')->from('tblchargeitem')->where($where)->order_by('ChargeItemID', 'DESC')->get();;
        $lab_test_result = $lab_test->result();
        return $lab_test_result;
    }
    public function procedure_items()
    {
        $where = "ChargeSubGroupID = '56' or ChargeSubGroupID = '61' or ChargeSubGroupID = '68' or ChargeSubGroupID = '76' or ChargeSubGroupID = '77' or ChargeSubGroupID = '78'";
        $lab_test = $this->db->select('*')->from('tblchargeitem')->where($where)->order_by('ChargeItemID', 'DESC')->get();;
        $lab_test_result = $lab_test->result();
        return $lab_test_result;
    }
    public function save_lab()
    {
        $this->load->helper('string');
        if ($this->input->post('edit_lab_id')) {
            $edit_lab_id = $this->input->post('edit_lab_id');
            $ids = $this->input->post('lab_id');
            $patient_id = $this->input->post('patient_id');
            foreach ($ids as $e_id) {
                $array = array('lab_test_unique_id' => $edit_lab_id, 'patient_id' => $patient_id, 'lab_test_id' => $e_id);
                $result = $this->db->select('*')->from('patient_lab_tests')->where($array)->get();
                if ($result->num_rows() == 0) {
                    $data = array(
                        'appointment_id' => $this->input->post('appointment_id'),
                        'patient_id' => $this->input->post('patient_id'),
                        'doctor_id' => $this->input->post('doctor_id'),
                        'vital_id' => $this->input->post('vital_id'),
                        'lab_test_unique_id' => $edit_lab_id,
                        'lab_test_id' =>  $e_id,
                    );
                    $insert = $this->db->insert('patient_lab_tests', $data);
                }
            }
            $this->db->select('*')->from('patient_lab_tests')->where('lab_test_unique_id', $edit_lab_id)->where('patient_id', $this->input->post('patient_id'))->where_not_in('lab_test_id', $ids)->delete();
        } else {
            $unique = random_string('numeric', 4);
            foreach ($this->input->post('lab_id') as $e_id) {
                $data = array(
                    'appointment_id' => $this->input->post('appointment_id'),
                    'patient_id' => $this->input->post('patient_id'),
                    'doctor_id' => $this->input->post('doctor_id'),
                    'vital_id' => $this->input->post('vital_id'),
                    'lab_test_unique_id' => $unique,
                    'lab_test_id' =>  $e_id,
                );
                $insert = $this->db->insert('patient_lab_tests', $data);
                // echo json_encode($this->db->insert_id());

                $lab_test = $this->db->select('*')->from('consultations')->where('patient_id', $this->input->post('patient_id'))->get();;
                $lab_test_result = $lab_test->row();
                //echo json_encode($lab_test_result);

                $data2 = array(
                    'appointment_id' => $this->input->post('appointment_id'),
                    'patient_id' => $this->input->post('patient_id'),
                    'doctor_id' => $this->input->post('doctor_id'),
                    'vital_id' => $this->input->post('vital_id'),
                    'lab_test_id' => $unique,
                    'sender_id' => $this->session->userdata('active_user')->id,
                    'diagnosis' => $lab_test_result->assignment ?? "",
                    'lab_test_unique_id' =>  $e_id,
                );
                $insert = $this->db->insert('lab_requests', $data2);
            }
        }
    }
    public function get_lab_test_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('d.*, s.staff_firstname,l.lab_test_name,s.staff_middlename,s.staff_lastname, d.id as lab_test_id')->from('patient_lab_tests d')->join('staff as s', 's.user_id=d.doctor_id', 'left')->join('lab_tests as l', 'l.id=d.lab_test_id', 'left')->where('d.patient_id', $patient_id)->where('d.vital_id', $vital_id)->group_by('d.lab_test_unique_id')->order_by('d.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }
    public function get_lab_test_by_id($id)
    {
        $get_consultation = $this->db->select('d.*,pv.*,pd.*, d.id as lab_test_id, d.date_added as date, s.staff_firstname,s.staff_middlename,s.staff_lastname, cl.clinic_name as clinic_name')->from('patient_lab_tests d')->join('patient_vitals as pv', 'pv.patient_id=d.patient_id', 'left')->join('staff as s', 's.user_id=d.doctor_id', 'left')->join('patient_details as pd', 'pd.id=d.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('d.lab_test_unique_id', $id)->group_by('d.lab_test_unique_id')->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }
    public function get_lab_test_by_unique_id($id)
    {
        $get_consultation = $this->db->select('d.*, l.lab_test_name, l.id as test_id, l.cost, d.id as lab_test_id')->from('patient_lab_tests d')->join('lab_tests as l', 'l.id=d.lab_test_id', 'left')->where('d.lab_test_unique_id', $id)->order_by('d.id', 'DESC')->get();
        $consultation = $get_consultation->result();
        return $consultation;
    }


    public function save_radiology()
    {
        $this->load->helper('string');
        if ($this->input->post('edit_radiolody_id')) {
            //echo json_encode($this->input->post('special_instuction'));
            $edit_radiolody_id = $this->input->post('edit_radiolody_id');
            $ids = $this->input->post('radiology_id');
            $patient_id = $this->input->post('patient_id');
            foreach ($ids as $e_id) {
                $array = array('radiology_test_unique_id' => $edit_radiolody_id, 'patient_id' => $patient_id, 'radiology_test_id' => $e_id);
                $result = $this->db->select('*')->from('patient_radiology_tests')->where($array)->get();
                if ($result->num_rows() == 0) {
                    $data = array(
                        'appointment_id' => $this->input->post('appointment_id'),
                        'patient_id' => $this->input->post('patient_id'),
                        'doctor_id' => $this->input->post('doctor_id'),
                        'vital_id' => $this->input->post('vital_id'),
                        'special_instuction' => $this->input->post('special_instuction'),
                        'radiology_test_unique_id' => $edit_radiolody_id,
                        'radiology_test_id' =>  $e_id,
                    );
                    $insert = $this->db->insert('patient_radiology_tests', $data);
                } else {
                    $this->db->where('radiology_test_unique_id', $edit_radiolody_id);
                    $this->db->update('patient_radiology_tests', array('special_instuction' => $this->input->post('special_instuction')));
                }
            }
            $this->db->select('*')->from('patient_radiology_tests')->where('radiology_test_unique_id', $edit_radiolody_id)->where('patient_id', $this->input->post('patient_id'))->where_not_in('radiology_test_id', $ids)->delete();
        } else {
            //echo json_encode($this->input->post('special_instuction'));
            $unique = random_string('numeric', 4);
            foreach ($this->input->post('radiology_id') as $e_id) {
                $data = array(
                    'appointment_id' => $this->input->post('appointment_id'),
                    'patient_id' => $this->input->post('patient_id'),
                    'doctor_id' => $this->input->post('doctor_id'),
                    'vital_id' => $this->input->post('vital_id'),
                    'special_instuction' => $this->input->post('special_instuction'),
                    'radiology_test_unique_id' => $unique,
                    'radiology_test_id' =>  $e_id,
                );
                $insert = $this->db->insert('patient_radiology_tests', $data);
            }
            $data2 = array(
                'appointment_id' => $this->input->post('appointment_id'),
                'patient_id' => $this->input->post('patient_id'),
                'doctor_id' => $this->input->post('doctor_id'),
                'vital_id' => $this->input->post('vital_id'),
                'patient_radiology_test_id' => $this->db->insert_id(),
                'radiology_test_unique_id' => $unique,
                'sender_id' => $this->session->userdata('active_user')->id,
            );
            $insert = $this->db->insert('radiology_request', $data2);
        }
    }

    public function save_procedure()
    {
        $this->load->helper('string');
        if ($this->input->post('edit_procedure_id')) {
            //echo json_encode($this->input->post('instuction'));
            $edit_procedure_id = $this->input->post('edit_procedure_id');
            $ids = $this->input->post('procedure_id');
            $patient_id = $this->input->post('patient_id');
            foreach ($ids as $e_id) {
                $array = array('procedure_test_unique_id' => $edit_procedure_id, 'patient_id' => $patient_id, 'procedure_test_id' => $e_id);
                $result = $this->db->select('*')->from('patient_procedure_tests')->where($array)->get();
                if ($result->num_rows() == 0) {
                    $data = array(
                        'appointment_id' => $this->input->post('appointment_id'),
                        'patient_id' => $this->input->post('patient_id'),
                        'doctor_id' => $this->input->post('doctor_id'),
                        'vital_id' => $this->input->post('vital_id'),
                        'instuction' => $this->input->post('instuction'),
                        'procedure_test_unique_id' => $edit_procedure_id,
                        'procedure_test_id' =>  $e_id,
                    );
                    $insert = $this->db->insert('patient_procedure_tests', $data);
                } else {
                    $this->db->where('procedure_test_unique_id', $edit_procedure_id);
                    $this->db->update('patient_procedure_tests', array('instuction' => $this->input->post('instuction')));
                }
            }
            $this->db->select('*')->from('patient_procedure_tests')->where('procedure_test_unique_id', $edit_procedure_id)->where('patient_id', $this->input->post('patient_id'))->where_not_in('procedure_test_id', $ids)->delete();
        } else {
            $unique = random_string('numeric', 4);
            foreach ($this->input->post('procedure_id') as $e_id) {
                $data = array(
                    'appointment_id' => $this->input->post('appointment_id'),
                    'patient_id' => $this->input->post('patient_id'),
                    'doctor_id' => $this->input->post('doctor_id'),
                    'vital_id' => $this->input->post('vital_id'),
                    'instuction' => $this->input->post('instuction'),
                    'procedure_test_unique_id' => $unique,
                    'procedure_test_id	' =>  $e_id,
                    'sender_id' => $this->session->userdata('active_user')->id,
                );
                $insert = $this->db->insert('patient_procedure_tests', $data);
            }
        }
    }

    public function get_radiology_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('r.*, s.staff_firstname,l.lab_test_name,s.staff_middlename,s.staff_lastname, r.id as radiology_id')->from('patient_radiology_tests r')->join('staff as s', 's.user_id=r.doctor_id', 'left')->join('lab_tests as l', 'l.id=r.radiology_test_id', 'left')->where('r.patient_id', $patient_id)->where('r.vital_id', $vital_id)->group_by('r.radiology_test_unique_id')->order_by('r.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }
    public function get_radiology_by_id($id)
    {
        $get_consultation = $this->db->select('r.*,pv.*,pd.*, r.id as radiology_id, r.date_added as date, s.staff_firstname,s.staff_middlename,s.staff_lastname, cl.clinic_name as clinic_name')->from('patient_radiology_tests r')->join('patient_vitals as pv', 'pv.patient_id=r.vital_id', 'left')->join('staff as s', 's.user_id=r.doctor_id', 'left')->join('patient_details as pd', 'pd.id=r.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('r.radiology_test_unique_id', $id)->group_by('r.radiology_test_unique_id')->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }
    public function get_radiology_by_unique_id($id)
    {
        $get_consultation = $this->db->select('r.*, t.Name, t.ChargeItemID as test_id, r.id as radiology_test_id')->from('patient_radiology_tests r')->join('tblchargeitem as t', 't.ChargeItemID =r.radiology_test_id', 'left')->where('r.radiology_test_unique_id', $id)->order_by('r.id', 'DESC')->get();
        $consultation = $get_consultation->result();
        return $consultation;
    }
    public function get_procedure_by_id($id)
    {
        $get_consultation = $this->db->select('p.*,pv.*,pd.*, p.id as procedure_id, p.date_added as date, s.staff_firstname,s.staff_middlename,s.staff_lastname, cl.clinic_name as clinic_name')->from('patient_procedure_tests p')->join('patient_vitals as pv', 'pv.id=p.vital_id', 'left')->join('staff as s', 's.user_id=p.doctor_id', 'left')->join('patient_details as pd', 'pd.id=p.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('p.procedure_test_unique_id', $id)->group_by('p.procedure_test_unique_id')->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }
    public function get_procedure_by_unique_id($id)
    {
        $get_consultation = $this->db->select('p.*, t.Name, t.ChargeItemID as test_id, p.id as procedure_test_id')->from('patient_procedure_tests p')->join('tblchargeitem as t', 't.ChargeItemID=p.procedure_test_id', 'left')->where('p.procedure_test_unique_id', $id)->order_by('p.id', 'DESC')->get();
        $consultation = $get_consultation->result();
        return $consultation;
    }

    function save_billing()
    {
        if ($this->input->post('Pending')) {
            echo json_encode($this->input->post('Pending'));
            $drug_id = $this->input->post('drug_ids[]');

            foreach ($this->input->post('drug_ids[]') as $drug_id) {
                $array = explode(',', $drug_id);
                $get = $this->db->select('*')->from('drug_items')->where('id', $array[0])->get();
                $result = $get->row();
                $data3 = array(
                    'quantity_in_stock' => $result->quantity_in_stock - $array[1],
                );
                $this->db->where('id', $array[0]);
                $this->db->update('drug_items', $data3);

                $this->db->where('patient_id', $this->input->post('patient_id'));
                $this->db->where('prescription_unique_id', $this->input->post('prescription_unique_id'));
                $this->db->where('prescription_id', $array[0]);
                $this->db->update('patient_prescriptions2', array('qty_given' => $array[1]));
            }
            $data = array(
                'patient_id'   => $this->input->post('patient_id'),
                'category'     => "Prescription",
                'billing_type' => "Debit",
                'amount'       => $this->input->post('main_amount'),
                'billed_by'    => $this->session->userdata('active_user')->id,
            );

            //echo json_encode($this->input->post('prescription_unique_id'));

            $this->db->insert('billings', $data);

            $data_update = array(
                'status' => "Prescription",
            );
            $this->db->where('prescription_unique_id', $this->input->post('prescription_unique_id'));
            $this->db->update('patient_prescriptions2', $data_update);
        }

        if ($this->input->post('Prescription')) {
            $data_update = array(
                'status' => "Treated",
            );
            echo json_encode($data_update);
            $this->db->where('prescription_unique_id', $this->input->post('prescription_unique_id'));
            $this->db->update('patient_prescriptions2', $data_update);
        }
    }

    //Prescription
    public function save_prescription()
    {
        $this->load->helper('string');
        if ($this->input->post('edit_prescription_id')) {
            $edit_prescription_id = $this->input->post('edit_prescription_id');
            $ids = $this->input->post('prescription_id');
            $patient_id = $this->input->post('patient_id');
            foreach ($ids as $e_id) {
                $array = array('prescription_unique_id' => $edit_prescription_id, 'patient_id' => $patient_id, 'prescription_id' => $e_id);
                $result = $this->db->select('*')->from('patient_prescriptions2')->where($array)->get();
                if ($result->num_rows() == 0) {
                    $data = array(
                        'appointment_id' => $this->input->post('appointment_id'),
                        'patient_id' => $this->input->post('patient_id'),
                        'doctor_id' => $this->input->post('doctor_id'),
                        'vital_id' => $this->input->post('vital_id'),
                        'prescription_unique_id' => $edit_prescription_id,
                        'prescription_id' =>  $e_id,
                        'prescription' => $this->input->post('prescription'),
                    );
                    $insert = $this->db->insert('patient_prescriptions2', $data);
                }
            }
            $this->db->select('*')->from('patient_prescriptions2')->where('prescription_unique_id', $edit_prescription_id)->where('patient_id', $this->input->post('patient_id'))->where_not_in('prescription_id', $ids)->delete();
        } else {
            $unique = random_string('numeric', 4);

            $prescription_id = $this->input->post('prescription_id');
            $prescription = $this->input->post('prescription_value');
            $appointment_id = $this->input->post('appointment_id');
            $patient_id = $this->input->post('patient_id');
            $doctor_id = $this->input->post('doctor_id');
            $vital_id = $this->input->post('vital_id');
            $food_id = $this->input->post('food_id');
            $prescription_unique_id = $unique;
            //        for($i=0;$i<count($this->input->post('prescription_id'));$i++)
            // {
            //    $dataSet[] = array ('appointment_id' => $this->input->post('appointment_id'),'patient_id' => $this->input->post('patient_id'),'doctor_id' => $this->input->post('doctor_id'),'vital_id' => $this->input->post('vital_id'),'prescription_unique_id' => $unique,'prescription_id' =>  $prescription_id[$i],'prescription' =>  $prescription_value[$i]);
            // $insert = $this->db->insert('patient_prescriptions2', $dataSet);
            // }

            $i = 0;
            foreach ($food_id as $key => $val) {
                if (!empty($prescription_id[$key])) {
                    $data[$i]['appointment_id'] = $appointment_id;
                    $data[$i]['patient_id'] = $patient_id;
                    $data[$i]['doctor_id'] = $doctor_id;
                    $data[$i]['vital_id'] = $vital_id;
                    $data[$i]['prescription_unique_id'] = $unique;
                    $data[$i]['prescription_id'] = $prescription_id[$key];
                    $data[$i]['prescription'] = $prescription[$key];
                    $i++;
                }
            }
                $this->db->insert_batch('patient_prescriptions2', $data);
        }
    }

    public function get_prescription_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('p.*,pa.*,d.drug_item_name, s.staff_firstname,l.lab_test_name,s.staff_middlename,s.staff_lastname, p.id as prescriptions_id, p.date_added as prescription_date')->from('patient_prescriptions2 p')->join('patient_appointments as pa', 'pa.id=p.appointment_id', 'left')->join('staff as s', 's.user_id=p.doctor_id', 'left')->join('drug_items as d', 'd.id=p.prescription_id', 'left')->join('lab_tests as l', 'l.id=p.prescription_id', 'left')->where('p.patient_id', $patient_id)->where('p.vital_id', $vital_id)->group_by('p.prescription_unique_id')->order_by('p.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }
    public function get_prescription_by_id($id)
    {
        $get_consultation = $this->db->select('p.*,pv.*,pd.*, p.id as prescription_id, p.date_added as date, s.staff_firstname,s.staff_middlename,s.staff_lastname, cl.clinic_name as clinic_name')->from('patient_prescriptions2 p')->join('patient_vitals as pv', 'pv.patient_id=p.patient_id', 'left')->join('staff as s', 's.user_id=p.doctor_id', 'left')->join('patient_details as pd', 'pd.id=p.patient_id', 'left')->join('clinics as cl', 'cl.id=pv.clinic_id', 'left')->where('p.prescription_unique_id', $id)->group_by('p.prescription_unique_id')->get();
        $consultation = $get_consultation->row();
        return $consultation;
    }
    public function get_prescription_by_unique_id($id)
    {
        $get_consultation = $this->db->select('p.*, d.drug_item_name, d.quantity_in_stock, d.drug_sell, d.drug_expiry_date, d.id as drug_id, p.id as prescription_id')->from('patient_prescriptions2 p')->join('drug_items as d', 'd.id=p.prescription_id', 'left')->where('p.prescription_unique_id', $id)->order_by('p.id', 'DESC')->get();
        $consultation = $get_consultation->result();
        return $consultation;
    }
    public function get_procedure_by_patient_id_and_vital_id($patient_id, $vital_id)
    {
        $get_patients = $this->db->select('p.*')->from('patient_procedure_tests p')->where('p.patient_id', $patient_id)->where('p.vital_id', $vital_id)->group_by('p.procedure_test_unique_id')->order_by('p.id', 'DESC')->get();
        $patient_list = $get_patients->result();
        return $patient_list;
    }
}
