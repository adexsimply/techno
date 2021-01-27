<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		
		parent::__construct();

		$this->load->model('user_m');
		$this->load->model('setup_m');
		$this->load->model('material_m');
		$this->load->model('assessment_m');
		$this->load->model('assignment_m');


	}

	//Users
	public function index ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'Assessment';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		if ($this->session->userdata('active_user')->role_id == 1) {
		$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_admin();
		}
		if ($this->session->userdata('active_user')->role_id == 2) {
		$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_teacher();
		}
		$this->data['subjects_list'] = $this->material_m->get_subjects_for_admin1();
		$this->load->view('assessment/main', $this->data);
	}
	//Users
	public function class ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'Assessment';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		if ($this->uri->segment(3)) {
		if ($this->session->userdata('active_user')->role_id == 1) {

		$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_admin_class($this->uri->segment(3));
			
		}
		if ($this->session->userdata('active_user')->role_id == 2) {
		$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_teacher();
		}
		$this->data['subjects_list'] = $this->material_m->get_subjects_for_admin1();
		$this->load->view('assessment/main', $this->data);

		}
		else {
			show_404();
		}
	}


	//Users
	public function archive ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'Assessment | Archive';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		if ($this->session->userdata('active_user')->role_id == 1) {
		$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_admin_archive();
		}
		if ($this->session->userdata('active_user')->role_id == 2) {
		$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_teacher();
		}
		$this->data['subjects_list'] = $this->material_m->get_subjects_for_admin1();
		$this->load->view('assessment/main', $this->data);
	}


	//Users
	public function add_questions ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'Assessment';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		if ($this->session->userdata('active_user')->role_id == 1) {
		//$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_admin();
		$this->data['subjects_list'] = $this->material_m->get_subjects_for_admin1();
		}
		elseif ($this->session->userdata('active_user')->role_id == 2) {
		$this->data['subjects_list'] = $this->material_m->get_subjects_for_teacher();

		}

		if ($this->uri->segment(3)) {
		$this->load->view('assessment/add_question2', $this->data);

		}
		else {
		$this->load->view('assessment/add_question', $this->data);

		}
	}



	//Users
	public function import ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'Assessment';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		if ($this->session->userdata('active_user')->role_id == 1) {
		//$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_admin();
		$this->data['subjects_list'] = $this->material_m->get_subjects_for_admin1();
		}
		elseif ($this->session->userdata('active_user')->role_id == 2) {
		$this->data['subjects_list'] = $this->material_m->get_subjects_for_teacher();

		}

		if ($this->uri->segment(3)) {
		$this->load->view('assessment/import2', $this->data);

		}
		else {
		$this->load->view('assessment/import', $this->data);
			
		}
	}

	public function try_import () {
        $data = array(
            'duration' =>  $this->input->post('duration'),
            'subject_id' =>  $this->input->post('subject'),
            'title' =>  $this->input->post('title'),
            'class_id' =>  $this->input->post('class'),
            'teacher_id' => $this->session->userdata('active_user')->id
        );
        $insert = $this->db->insert('assessments', $data);

        $last_id = $this->db->insert_id();

	    redirect('assessment/import/'.$last_id);

	}


	//Users
	public function view_questions ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'View Assessment';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		///Assssment Questions

		if ($this->uri->segment(3)) {
		$this->data['assessment_questions'] = $this->assessment_m->get_questions_by_id($this->uri->segment(3));
		//////
		if ($this->session->userdata('active_user')->role_id == 3) {

		$this->data['assessment_grade'] = $this->assessment_m->get_assessment_grade_for_student($this->uri->segment(3));
		$this->load->view('assessment/view_questions_students', $this->data);

		}
			else {
		$this->load->view('assessment/view_questions', $this->data);

			}
		}

	}


	//Users
	public function download_excel ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'Excel';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		///Assssment Questions

		if ($this->uri->segment(3)) {
		$this->data['assessment_questions'] = $this->assessment_m->get_questions_by_id($this->uri->segment(3));
		//////
		if ($this->session->userdata('active_user')->role_id == 1) {
		$this->load->view('assessment/download_excel', $this->data);

		}
		else {
			show_404();
		}

		}

	}



	//Users
	public function view_questions2 ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'View Assessment';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		///Assssment Questions

		if ($this->uri->segment(3)) {
		$this->data['assessment_questions'] = $this->assessment_m->get_questions_by_id($this->uri->segment(3));
		//////
		if ($this->session->userdata('active_user')->role_id == 3) {

		$this->data['assessment_grade'] = $this->assessment_m->get_assessment_grade_for_student2($this->uri->segment(3));
		$this->load->view('assessment/view_grades_students', $this->data);
			}
			else {
		$this->data['assessment_grade'] = $this->assessment_m->get_assessment_grade_for_teacher2($this->uri->segment(3),$this->uri->segment(4));
		$this->load->view('assessment/view_grades_students', $this->data);

			}
		}

	}

	//Users
	public function view ()
	{		
		$this->load->model('user_m');
		$this->data['title'] = 'View Assessment';
		$this->data['users_list'] = $this->user_m->get_users();
		$this->data['class_list'] = $this->setup_m->get_class_list();
		if ($this->session->userdata('active_user')->role_id == 1) {
		$this->data['assessments_list'] = $this->assignment_m->get_assignments_for_admin();
		}
		elseif ($this->session->userdata('active_user')->role_id == 2) {
		$this->data['assessments_list'] = $this->assessment_m->get_assesments_for_teacher();
		}
		elseif ($this->session->userdata('active_user')->role_id == 3) {
		$this->data['assessments_list'] = $this->assessment_m->get_assessments_for_student();
		}
		//////
		$this->data['get_materials'] = $this->material_m->get_subjects_for_teacher();
		//$this->data['childview'] = 'dashboard/main';
		if ($this->uri->segment(3)) {
		////
		$this->data['assignment_info'] = $this->assignment_m->get_assignment_info($this->uri->segment(3));
		$this->data['assignment_comments'] = $this->assignment_m->get_assignment_comment($this->uri->segment(3));
		$this->load->view('assessment/view_item', $this->data);
		}
		else {

		$this->load->view('assessment/view', $this->data);
		}
	}

public function submit () {
	ob_start();
	$user_id = $this->session->userdata('active_user')->id;
	$question = $this->input->post('question');
	$correct = $this->input->post('answer');
	$answer = $this->input->post('option');
	$assessment_id = $this->input->post('assessment_id');

	foreach($question as $option_num => $option_val) {
		 $data = array(
            'student_id' => $user_id,
            'assessment_question_id' => $question[$option_num],
            'answer' => $answer[$option_num],
            'correct' => $correct[$option_num],
            'assessment_id' => $assessment_id[$option_num],
        );

		 $query_search_answer = $this->db->select('*')->from('assessment_answers')->where('assessment_question_id', $question[$option_num])->where('student_id',$user_id)->get();
		 if ($query_search_answer->num_rows() < 1) {

			$this->db->insert('assessment_answers',$data);
		 }

	}


	    redirect('assessment/view');

}

	public function add_assessment()
        {                

        	$add_assessment = $this->assessment_m->add_assessment();

			header('Content-Type: application/json');
	    	echo json_encode($add_assessment);
        }

	public function delete_assessment()
	{
		$id = $this->input->post('id');
		$this->db->delete('assessments', array('id' => $id));
	}

	public function delete_question()
	{
		$id = $this->input->post('id');
		$this->db->delete('assessment_questions', array('id' => $id));
	}
	public function delete_answer()
	{
		$id = $this->input->post('id');
		$this->db->delete('assessment_answers', array('id' => $id));
	}

	public function reset()
	{
		//$id = $this->input->post('id');
		$this->db->delete('assessment_answers', array('student_id' => $this->uri->segment(3),'assessment_id'=>$this->uri->segment(4)));
	}

	public function accept_assessment()
	{
		$id = $this->input->post('id');
        $data = array(
            'status' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('assessments', $data);
	}



	public function update_question()
	{
		$id = $this->input->post('question_id');
        $data = array(
            'question' => $this->input->post('question'),
            'option1' => $this->input->post('option1'),
            'option2' => $this->input->post('option2'),
            'option3' => $this->input->post('option3'),
            'option4' => $this->input->post('option4'),
            'answer' => $this->input->post('answer'),
        );
        $this->db->where('id', $id);
        $this->db->update('assessment_questions', $data);
	   //	echo json_encode($add_assessment);
	}

	public function get_question_details() {
        $question_details = $this->assessment_m->get_question_by_id();
		echo "[".json_encode($question_details)."]";		 
	}


	public function change_password()
	{
		$teacher_id = $this->input->post('teacher_id');
		$password = $this->input->post('password');
        $data = array(
            'password' => $password
        );
        $this->db->where('id', $teacher_id);
        $this->db->update('users', $data);
	}


	//Users
	public function submissions ()
	{	
		if ($this->session->userdata('active_user')->role_id != 3) {
		if ($this->uri->segment(3)) {
		$this->load->model('user_m');
		$this->data['title'] = 'View Grades';

		////
		$this->data['submitted_students'] = $this->assessment_m->get_submitted_students($this->uri->segment(3));

		// }
		$this->load->view('assessment/submissions', $this->data);
		}
		}
		else {
			show_404();
		}
	}



	public function archive_assessment()
	{
		$id = $this->input->post('id');
        $data = array(
            'status' => 3
        );
        $this->db->where('id', $id);
        $this->db->update('assessments', $data);
	}

	public function delete_bulk() {
		$answer_id = $this->input->post('answer_id');
		foreach ($answer_id as $answer) {
			//echo "";

		$this->db->delete('assessment_answers', array('id' => $answer));
		}
		echo "Selected Entries deleted";
	}



}