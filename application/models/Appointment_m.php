<?php
class Appointment_m extends CI_Model
{

    public function get_appointment_list()
    {
        $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname, pa.id as app_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->join('staff as s', 's.user_id=pa.doctor_id', 'left')->order_by('p.id', 'ASC')->get();
        $appointment_list = $get_appointments->result();
        return $appointment_list;
    }

    public function get_patient_by_id($patient_id)
    {
        $get_patients = $this->db->select('p.*,pn.*, p.id as p_id')->from('patient_details p')->join('patient_nok as pn', 'p.id=pn.patient_id', 'left')->where('p.id', $patient_id)->get();
        $patient_list = $get_patients->row();
        return $patient_list;
    }
    
    public function search()
    {
        if ($this->input->post('name')) {
            $name = $this->input->post('name');
            $get_appointments = $this->db->select('pa.*,p.*,c.clinic_name,s.staff_title,s.staff_firstname,s.staff_middlename,s.staff_lastname, pa.id as app_id')->from('patient_appointments pa')->join('patient_details as p', 'p.id=pa.patient_id', 'left')->join('clinics as c', 'c.id=pa.clinic_id', 'left')->join('staff as s', 's.user_id=pa.doctor_id', 'left')->where('patient_id', 'like', '%$name%')->order_by('p.id', 'ASC')->get();
            $appointment_list = $get_appointments->result();
            return $appointment_list;

        }
    }

    public function get_patient_history_by_id($patient_id)
    {
        $get_patient_history = $this->db->select('*')->from('patient_health_history')->where('patient_id', $patient_id)->get();
        $patient_history = $get_patient_history->result();
        return $patient_history;
    }

    public function create_department_name()
    {
        if ($this->input->post('department_id')) {
            $this->db->set('department_name', $this->input->post('department_name'));
            $this->db->where('id', $this->input->post('department_id'));
            $this->db->update('departments');
        } else {
            $data = array(
                'department_name' => $this->input->post('department_name')
            );
            $insert = $this->db->insert('departments', $data);

            return $insert;
        }
    }


    function get_department_by_id()
    {
        $id = $this->input->post('id');
        $get_department = $this->db->select('*')->from('departments')->where('id', $id)->get();
        $department_list = $get_department->row();
        return $department_list;
    }


    function get_vitals_by_appointment_id($appointment_id)
    {
        $get_vitals = $this->db->select('*')->from('vitals_request')->where('appointment_id', $appointment_id)->get();
        $vitals_list = $get_vitals->row();
        return $vitals_list;
    }
}
