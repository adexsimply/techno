<?php

class User_m extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    // $this->load->library('datagrid');
  }

  /**
   * Datagrid Data
   *
   * @access  public
   * @param   
   * @return  json(array)
   */

  public function all()
  {
    $users = $this->db->get('users')->result();
    return $users;
  }

  public function get_roles()
  {
    $roles = $this->db->get('roles')->result();
    return $roles;
  }

  public function attempt($input)
  {
    $query = $this->db->from('users u')
      ->select('u.*, g.role_name')
      ->where('username', $input['username'])
      ->where('password', $input['password'])
      ->join('roles as g', 'g.id = u.id', 'left')
      ->get();

    return $query->row();
  }

  public function suspend_update($id)
  {
    $data = array(
      'suspension_time' => null,
      'user_status' => 'Active'
    );

    $this->db->where('id', $id);
    $update = $this->db->update('users', $data);
  }
}
