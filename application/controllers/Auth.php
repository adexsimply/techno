<?php
class Auth extends CI_Controller
{

	//////

	public function login()
	{
		$data['title'] = 'Login';
		$this->load->view('login', $data);
		$this->load->model('staff_m');
	}
	//////////////
	public function login_attempt()
	{
		$rules = [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			]
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()) {
			$this->load->model('user_m');
			$attempt = $this->user_m->attempt($this->input->post());
			if ($attempt === null) {
				header("Content-type:application/json");
				echo json_encode(['password' => 'Wrong username or password']);
			} else {
				if ($attempt->user_status == 'Active') {
					$this->session->set_userdata('active_user', $attempt);
					header("Content-type:application/json");
					echo json_encode(['status' => 'success']);
				} elseif ($attempt->user_status == 'Disabled') {
					header("Content-type:application/json");
					echo json_encode(['username' => 'Your Account has been disabled']);
				} elseif ($attempt->user_status == 'Suspended') {
					if ($attempt->suspension_time > time()) {
						header("Content-type:application/json");
						echo json_encode(['password' => 'Your Account has been disabled']);
					} else {
						// $this->staff_m->suspend_update($attempt->id);
						$data = array(
							'suspension_time' => null,
							'user_status' => 'Active'
						);

						$this->db->where('id', $attempt->id);
						$update = $this->db->update('users', $data);
						$this->session->set_userdata('active_user', $attempt);
						header("Content-type:application/json");
						echo json_encode(['status' => 'success']);
					}
				}
			}
		} else {
			header("Content-type:application/json");
			echo json_encode($this->form_validation->get_all_errors());
		}
	}
	/**
	 * Logout User
	 *
	 * @access 	public
	 * @param 	
	 * @return 	redirect
	 */

	public function logout()
	{
		$this->session->unset_userdata('active_user');
		redirect(base_url() . 'auth/login');
	}
}
