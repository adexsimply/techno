<?php
class Request_m extends CI_Model
{
    public function get_request_destinations_list()
    {
        $get_request_destinations = $this->db->select('*')->from('request_destinations')->get();
        $request_destinations_list = $get_request_destinations->result();
        return $request_destinations_list;
    }

    public function get_pharmacy_request_list()
    {
        $get_pharmacy_request = $this->db->select('pr.*,rd.request_destination_name,s.staff_firstname,s.staff_lastname')->from('pharmacy_requests pr')->join('request_destinations as rd', 'rd.id=pr.request_destination_id', 'left')->join('staff as s', 's.user_id=pr.request_by')->get();
        $pharmacy_request_list = $get_pharmacy_request->result();
        return $pharmacy_request_list;
    }

    public function get_prescription_request_list()
    {
        $get_pharmacy_request = $this->db->select('pr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_id_num,rd.request_destination_name,s.staff_firstname,s.staff_lastname')->from('prescription_requests pr')->join('patient_details as p', 'p.id=pr.patient_id', 'left')->join('request_destinations as rd', 'rd.id=pr.request_destination_id', 'left')->join('staff as s', 's.user_id=pr.request_by')->where('patient_id IS NOT NULL')->get();
        $pharmacy_request_list = $get_pharmacy_request->result();
        return $pharmacy_request_list;
    }
    public function get_rad_request_list()
    {
        $get_lab_request = $this->db->select('r.*,p.patient_title,p.patient_name,p.patient_status,p.patient_gender,p.patient_id_num,s.staff_firstname,s.staff_lastname,c.clinic_name')->from('radiology_request r')->join('patient_details as p', 'p.id=r.patient_id', 'left')->join('staff as s', 's.user_id=r.sender_id', 'left')->join('patient_radiology_tests as pr', 'pr.radiology_test_unique_id=r.radiology_test_unique_id ', 'left')->join('patient_vitals as pv', 'pv.patient_id=r.patient_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->group_by('r.radiology_test_unique_id')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }
    public function get_radiology_request_by_id($id)
    {
        $get_lab_request = $this->db->select('r.*,p.patient_title,p.patient_name,p.patient_status,p.patient_dob,p.patient_gender,p.patient_id_num,s.staff_firstname,s.staff_lastname,c.clinic_name,prt.special_instuction')->from('radiology_request r')->join('patient_details as p', 'p.id=r.patient_id', 'left')->join('staff as s', 's.user_id=r.sender_id', 'left')->join('patient_radiology_tests as pr', 'pr.radiology_test_unique_id=r.radiology_test_unique_id ', 'left')->join('patient_vitals as pv', 'pv.patient_id=r.patient_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->join('patient_radiology_tests as prt', 'prt.id=r.patient_radiology_test_id', 'left')->group_by('r.radiology_test_unique_id')->where('r.id', $id)->get();
        $lab_request_list = $get_lab_request->row();
        return $lab_request_list;
    }

    public function get_treated_rad_test_by_patient_id($p_id, $test_id)
    {
        $get_lab_request = $this->db->select('pr.*, i.Name as rad_test_name')->from('patient_radiology_tests pr')->join('tblchargeitem as i', 'i.ChargeItemID=pr.radiology_test_id', 'left')->join('radiology_request as r', 'r.radiology_test_unique_id=pr.radiology_test_unique_id', 'left')->where('pr.patient_id', $p_id)->where('pr.radiology_test_unique_id', $test_id)->where('pr.status', 'Treated')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }
    public function get_pending_rad_test_by_patient_id($p_id, $test_id)
    {
        $get_lab_request = $this->db->select('pr.*, i.Name as rad_test_name')->from('patient_radiology_tests pr')->join('tblchargeitem as i', 'i.ChargeItemID=pr.radiology_test_id', 'left')->join('radiology_request as r', 'r.radiology_test_unique_id=pr.radiology_test_unique_id', 'left')->where('pr.patient_id', $p_id)->where('pr.radiology_test_unique_id', $test_id)->where('pr.status', 'Pending')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }

    public function get_lab_request_list()
    {
        $get_lab_request = $this->db->select('lr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_gender,p.patient_id_num,s.staff_firstname,s.staff_lastname,lt.lab_test_name,lt.cost,c.clinic_name')->from('lab_requests lr')->join('patient_details as p', 'p.id=lr.patient_id', 'left')->join('staff as s', 's.user_id=lr.sender_id', 'left')->join('patient_lab_tests as pl', 'pl.lab_test_unique_id=lr.lab_test_id', 'left')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('patient_vitals as pv', 'pv.patient_id=lr.patient_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->group_by('lr.lab_test_id')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }

    public function get_lab_request_by_id($id)
    {
        $get_lab_request = $this->db->select('lr.*,p.patient_title,p.patient_name,p.patient_dob,p.patient_status,p.patient_gender,p.patient_id_num,s.staff_firstname,s.staff_lastname,lt.lab_test_name,lt.cost,c.clinic_name')->from('lab_requests lr')->join('patient_details as p', 'p.id=lr.patient_id', 'left')->join('staff as s', 's.user_id=lr.sender_id', 'left')->join('patient_lab_tests as pl', 'pl.lab_test_unique_id=lr.lab_test_id', 'left')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('patient_vitals as pv', 'pv.patient_id=lr.patient_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->group_by('lr.lab_test_id')->where('lr.id', $id)->get();
        $lab_request_list = $get_lab_request->row();
        return $lab_request_list;
    }

    public function get_lab_test_by_patient_id($p_id, $test_id)
    {
        $get_lab_request = $this->db->select('lr.*, t.lab_test_name,t.id as test_id')->from('lab_requests lr')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('lab_tests as t', 't.id=lr.lab_test_unique_id', 'left')->where('lr.patient_id', $p_id)->where('lr.lab_test_id', $test_id)->where('lr.status', 'Pending')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }
    public function get_specimen_lab_test_by_patient_id($p_id, $test_id)
    {
        $get_lab_request = $this->db->select('lr.*, t.lab_test_name,t.id as test_id')->from('lab_requests lr')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('lab_tests as t', 't.id=lr.lab_test_unique_id', 'left')->where('lr.patient_id', $p_id)->where('lr.lab_test_id', $test_id)->where('lr.status', 'Specimen')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }
    public function get_review_lab_test_by_patient_id($p_id, $test_id)
    {
        $get_lab_request = $this->db->select('lr.*, t.lab_test_name,t.id as test_id')->from('lab_requests lr')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('lab_tests as t', 't.id=lr.lab_test_unique_id', 'left')->where('lr.patient_id', $p_id)->where('lr.lab_test_id', $test_id)->where('lr.status', 'Review')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }
    public function get_treated_lab_test_by_patient_id($p_id, $test_id)
    {
        $get_lab_request = $this->db->select('lr.*, t.lab_test_name,t.id as test_id')->from('lab_requests lr')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('lab_tests as t', 't.id=lr.lab_test_unique_id', 'left')->where('lr.patient_id', $p_id)->where('lr.lab_test_id', $test_id)->where('lr.status', 'Treated')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }
    public function update_request()
    {
        $id = $this->input->post('id');
        $test_result_id = $this->input->post('test_result_id');
        $sample = $this->input->post('sample');
        $specimen = $this->input->post('specimen');
        $spec = $this->input->post('special_instuction');
        $results = $this->input->post('results');
        $review = $this->input->post('review');
        $treated = $this->input->post('treated');
        //echo json_encode($review);
        foreach ($id as $key => $val) {
            if ($sample[$key] != Null && $specimen[$key] != Null) {
                $data['status'] = "Specimen";
            } else {
                $data['status'] = "Pending";
            }
            $data['collect_sample'] = $sample[$key] ?? "";
            $data['sample_type'] = $specimen[$key] ?? "";
            $data['special_instuction'] = $spec;
            $this->db->where('id', $val);
            $this->db->update('lab_requests', $data);
            // echo json_encode($val);
        }

        foreach ($test_result_id as $key => $val) {
            if ($review[$key] != Null) {
                if ($treated[$key] != Null) {
                    $data['status'] = "Treated";
                } else {
                    $data['status'] = "Review";
                }
                $data['result'] = $review[$key] ?? "";
            }
            if ($review[$key] == Null) {
                $data['status'] = "Specimen";
            }
            $this->db->where('id', $val);
            $this->db->update('lab_requests', $data);
        }
    }
    public function update_rad_request()
    {
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $results = $this->input->post('results');
        $radiology_test_id = $this->input->post('radiology_test_id');
        foreach ($id as $key => $val) {
            if ($results[$key] != Null) {
                //echo json_encode($val);
                $data['status'] = 'Treated';
            } else {
                $data['status'] = 'Pending';
            }

            $data['result'] = $results[$key] ?? "";
            $this->db->where('radiology_test_id', $radiology_test_id[$key]);
            $this->db->where('patient_id', $patient_id);
            $this->db->update('patient_radiology_tests', $data);

            // echo json_encode($val);
        }
    }
}
