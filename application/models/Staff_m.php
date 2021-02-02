<?php
class Staff_m extends CI_Model
{

    public function get_staff_list()
    {
        $get_staff = $this->db->select('s.*,u.*,st.name,sa.title, s.id as s_id')->from('staff s')->join('users as u', 'u.id=s.user_id', 'left')->join('states as st', 'st.id=s.staff_state', 'left')->join('salutations as sa', 'sa.id=s.staff_title', 'left')->get();
        $staff_list = $get_staff->result();
        return $staff_list;
    }
    public function get_login_list()
    {
        $get_login = $this->db->select('u.*,st.staff_firstname,st.staff_lastname,st.staff_gender,st.user_id,r.role_name')->from('users u')->join('staff as st', 'u.id=st.user_id', 'left')->join('roles as r', 'r.id=u.role_id', 'left')->get();
        $login_list = $get_login->result();
        return $login_list;
    }

    public function get_doctors_list()
    {
        $get_staff = $this->db->select('s.*,u.*,st.name,sa.title, s.id as s_id')->from('staff s')->join('users as u', 'u.id=s.user_id', 'left')->join('states as st', 'st.id=s.staff_state', 'left')->join('salutations as sa', 'sa.id=s.staff_title', 'left')->where('u.role_id', 3)->get();
        $staff_list = $get_staff->result();
        return $staff_list;
    }
    public function create_staff_name()
    {

        if ($this->input->post('staff_id')) {
            $data2 = array(
                //'user_id' => $user_id,
                'staff_title' => $this->input->post('title'),
                'staff_firstname' => $this->input->post('firstname'),
                'staff_lastname' => $this->input->post('lastname'),
                'staff_email' => $this->input->post('email'),
                'staff_dob' => $this->input->post('dob'),
                'staff_address' => $this->input->post('address'),
                'staff_state' => $this->input->post('state'),
                'staff_phone' => $this->input->post('phone'),
                'staff_gender' => $this->input->post('gender'),
                'department_id' => $this->input->post('department'),
                'can_consult' => $this->input->post('can_consult')
            );
            //$this->db->set('staff_firstname', $this->input->post('firstname'));
            $this->db->where('id', $this->input->post('staff_id'));

            $this->db->update('staff', $data2);
        } else {
            // $data = array(
            //     'username' => $this->input->post('username'),
            //     'password' => $this->input->post('password'),
            //     'role_id' => $this->input->post('role')
            // );
            // $insert = $this->db->insert('users', $data);
            // $user_id = $this->db->insert_id();

            // if ($this->input->post('can_consult')) {
            //     $can_consult = $this->input->post('can_consult');
            // }
            // else {
            //     $can_consult = 0;
            // }


            $data2 = array(
                //'user_id' => $user_id,
                'staff_title' => $this->input->post('title'),
                'staff_firstname' => $this->input->post('firstname'),
                'staff_lastname' => $this->input->post('lastname'),
                'staff_email' => $this->input->post('email'),
                'staff_dob' => $this->input->post('dob'),
                'staff_address' => $this->input->post('address'),
                'staff_state' => $this->input->post('state'),
                'staff_phone' => $this->input->post('phone'),
                'staff_gender' => $this->input->post('gender'),
                'department_id' => $this->input->post('department'),
                'can_consult' => $this->input->post('can_consult')
            );

            $insert2 = $this->db->insert('staff', $data2);
            return $insert2;
        }
    }
    /////Add New User
    public function create_user_name()
    {

        if ($this->input->post('user_id')) {
            $data2 = array(
                //'user_id' => $user_id,
                'role_id' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            //$this->db->set('staff_firstname', $this->input->post('firstname'));
            $this->db->where('id', $this->input->post('user_id'));

            $this->db->update('users', $data2);
        } else {
            $data2 = array(
                //'user_id' => $user_id,
                'fullname' => $this->input->post('fullname'),
                'role_id' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $insert = $this->db->insert('users', $data2);
            $user_id = $this->db->insert_id();

            if (!empty($this->input->post('staff_name'))) {
                $this->db->set('user_id', $user_id);
                $this->db->where('id', $this->input->post('staff_name'));
                $this->db->update('staff');
            }



            // $insert2 = $this->db->insert('staff', $data2);
            return $insert;
        }
    }

    function get_staff_by_id($staff_id = NULL)
    {
        if ($staff_id == NULL) {
            $id = $this->input->post('id');
        } else {
            $id = $staff_id;
        }
        $get_staff = $this->db->select('s.*,u.*, s.id as s_id')->from('staff s')->join('users as u', 'u.id=s.user_id', 'left')->where('s.id', $id)->get();
        $staff_list = $get_staff->row();
        return $staff_list;
    }



    function get_user_by_id($user_id = NULL)
    {
        if ($user_id == NULL) {
            $id = $this->input->post('id');
        } else {
            $id = $user_id;
        }
        $get_user = $this->db->select('*')->from('users')->where('id', $id)->get();
        $user_list = $get_user->row();
        return $user_list;
    }

    public function disable_user()
    {
        $data2 = array(
            'user_status' => 'Disabled',
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data2);
    }

    public function enable_user()
    {
        $data2 = array(
            'user_status' => 'Active',
        );
        $this->db->where('id', $this->input->post('id'));

        $this->db->update('users', $data2);
    }
}
