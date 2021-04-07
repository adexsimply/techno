<?php
class Laboratory_m extends CI_Model
{

    public function get_specimen_list()
    {
        $get_specimen = $this->db->select('*')->from('lab_specimens')->get();
        $specimen_list = $get_specimen->result();
        return $specimen_list;
    }
    public function get_specimen_by_id($id)
    {
        $get_specimen = $this->db->select('*')->from('lab_specimens')->where('id', $id)->get();
        $specimen_list = $get_specimen->row();
        return $specimen_list;
    }
    
    public function save_specimen()
    {
        if ($this->input->post('specimen_id')) {
            $data = array(
                'specimen_name' => $this->input->post('name'),
            );
            $this->db->where('id', $this->input->post('specimen_id'));
            $update = $this->db->update('lab_specimens', $data);
            return $update;
        } else {
            $data = array(
                'specimen_name' => $this->input->post('name'),
            );
            $insert = $this->db->insert('lab_specimens', $data);
        }
    }

    public function get_request_list_default()
    {

        $today_date = date('Y-m-d');
        $get_lab_request = $this->db->select('lr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_gender,p.patient_id_num,s.staff_firstname,s.staff_lastname,lt.lab_test_name,pv.*,c.clinic_name,lr.id as lab_request_id')->from('lab_requests lr')->join('patient_details as p', 'p.id=lr.patient_id', 'left')->join('staff as s', 's.user_id=lr.sender_id', 'left')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('patient_vitals as pv', 'pv.id=lr.vital_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->where('lr.status','pending')->where('DATE(lr.date_created)', $today_date)->order_by('lr.date_created','DESC')->get();
        $lab_request_list = $get_lab_request->result();
        return $lab_request_list;
    }


    public function get_lab_request_specimen_by_id($lab_request_id)
    {
        $result="";
        $get_lab_request = $this->db->select('lab_test_unique_id')->from('lab_requests lr')->where('lr.id', $lab_request_id)->get();
        $lab_request= $get_lab_request->row();
        $lab_test_id = $lab_request->lab_test_unique_id;

        ////
        $get_lab_test_info = $this->db->select('*')->from('lab_tests')->where('id',$lab_test_id)->get();
        $lab_test_info = $get_lab_test_info->row();
        // if($lab_test_info->has_subgroup=='Yes') {
        //     $get_lab_test_subgroup = $this->db->select('*')->from('lab_tests_subgroup')->where('lab_test_id',$lab_test_id)->get();
        //     $lab_test_subgroup = $get_lab_test_subgroup->result();
        //     $result = $lab_test_subgroup;
        // }
        // else {
        //     $result = $get_lab_test_info->result();
        // }

        return $lab_test_info;
        //return $lab_request_list;
    }
    public function get_lab_subgroup($lab_test_id) {

            $get_lab_test_subgroup = $this->db->select('*')->from('lab_tests_subgroup')->where('lab_test_id',$lab_test_id)->get();
            $lab_test_subgroup = $get_lab_test_subgroup->result();
            return $lab_test_subgroup;
    }

    public function get_ranges($id) {
        $get_ranges = $this->db->select('*')->from('lab_test_range_by_test')->where('lab_test_subgroup_id',$id)->get();
        $ranges = $get_ranges->result();
        return $ranges;
    }

    public function get_lab_results($lab_test_id,$lab_request_id) {
        $get_ranges = $this->db->select('result')->from('lab_test_result_details')->where('lab_request_id',$lab_request_id)->where('lab_test_id',$lab_test_id)->get();
        $ranges = $get_ranges->row();
        return $ranges;
    }
    public function get_lab_results2($lab_test_id,$lab_request_id) {
        $get_ranges = $this->db->select('result')->from('lab_test_result_details')->where('lab_request_id',$lab_request_id)->where('lab_test_subgroup_id',$lab_test_id)->get();
        $ranges = $get_ranges->row();
        return $ranges;
    }

    public function get_request_list_filtered()
    {
        if ($this->input->post('status')) {

           $status = $this->input->post('status');
            //$status = "Pending";
            if ($status != 'all') {
                $cond = 'lr.status IN (SELECT status FROM lab_requests WHERE status="'. $status . '")';
            } else {
                $cond = '1=1';
            }
        }

        

        $today_date = date('Y-m-d');

        if ($this->input->post('date_range_from') != $today_date) {
            //
            $first_date = $this->input->post('date_range_from');
            $second_date =  $this->input->post('date_range_to');

            $date_range = array('DATE(lr.date_created) >=' => $first_date, 'DATE(lr.date_created) <=' => $second_date);
        } else {

           $date_range = array('DATE(lr.date_created)' => $today_date);

        }
        
        $get_lab_request = $this->db->select('lr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_gender,p.patient_id_num,s.staff_firstname,s.staff_lastname,lt.lab_test_name,pv.*,c.clinic_name,lr.id as lab_request_id')->from('lab_requests lr')->join('patient_details as p', 'p.id=lr.patient_id', 'left')->join('staff as s', 's.user_id=lr.sender_id', 'left')->join('lab_tests as lt', 'lt.id=lr.lab_test_unique_id', 'left')->join('patient_vitals as pv', 'pv.id=lr.vital_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->where($cond)->where($date_range)->order_by('lr.date_created','DESC')->get();

        //

        $lab_request_list = $get_lab_request->result();
      //return $this->db->last_query();
        return $lab_request_list;
    }

    // public function get_request_list_default222()
    // {
    //      $date = new DateTime("now");
    //     $curr_date = date('Y-m-d');
    //     $get_lab_request = $this->db->select('lr.*,p.patient_title,p.patient_name,p.patient_status,p.patient_gender,p.patient_id_num,s.staff_firstname,s.staff_lastname,pl.*,lt.lab_test_name,lt.cost,c.clinic_name')->from('lab_requests lr')->join('patient_details as p', 'p.id=lr.patient_id', 'left')->join('staff as s', 's.user_id=lr.sender_id', 'left')->join('patient_lab_tests as pl', 'pl.lab_test_unique_id=lr.lab_test_id', 'left')->join('lab_tests as lt', 'lt.id=pl.lab_test_id', 'left')->join('patient_vitals as pv', 'pv.patient_id=lr.patient_id', 'left')->join('clinics as c', 'c.id=pv.clinic_id', 'left')->where('lr.status','pending')->where('DATE(lr.date_created)','2021-04-04')->get();
    //     $lab_request_list = $get_lab_request->result();
    //     return $today_date;
    // }


    public function save_lab_result_details()
    {   
        $lab_request_id2 = $this->input->post('lab_request_id');

        $food_id = $this->input->post('food_id');
        $test_result_id = $this->input->post('test_result_id');
        $lab_test_id = $this->input->post('lab_test_id');
        $lab_test_subgroup_id = $this->input->post('lab_test_subgroup_id');
        $result_id = $this->input->post('results');

            $i = 0;
            foreach ($food_id as $key => $val) {
                //if (!empty($prescription_id[$key])) {
                    $data[$i]['lab_request_id'] = $test_result_id[$key];
                    $data[$i]['lab_test_id'] = $lab_test_id[$key];
                    $data[$i]['lab_test_subgroup_id'] = $lab_test_subgroup_id[$key];
                    $data[$i]['result'] = $result_id[$key];
                    $i++;
               // }
            }
                $this->db->insert_batch('lab_test_result_details', $data);

            $data3 = array(
                'status' => 'Review',
            );
            $this->db->where('id', $lab_request_id2);
            $this->db->update('lab_requests', $data3);

            // $data['status'] = "Review";
            // $this->db->where('id', $lab_request_id);
            // $this->db->update('lab_requests', $data);

            echo json_encode("Done");
    }

}
