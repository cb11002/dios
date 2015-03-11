<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('users/m_users','user');
		$this->load->model('tutor/m_kelas','kelas');
		$this->load->model('student/m_kelas_student','kelas_student');
		$session_users = $this->session->userdata('logged_in');
		$this->userid =$session_users['Id_User'];
		$this->usertype =$session_users['User_Type'];
	}

	function index()
	{
		
		if($this->session->userdata('logged_in'))
		{
			$session_users = $this->session->userdata('logged_in');
			$data['Id_User'] =$session_users['Id_User'];
			$data['User_Type'] =$session_users['User_Type'];
			
			$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$data['Id_User']));
			$data['rsProfile'] = $queryusers->row();
			
			#Home Admin
			if($data['User_Type']=='admin')
			{	
				 $this->load->view('admin/v_admin_home', $data);
			
			} 

			#Home Tutor
			else if($data['User_Type']=='tutor')
			{	
				$data['query'] = $this->kelas->getlistclass($data['Id_User']);
				$this->load->view('tutor/v_tutor_home', $data);
			
			} 
			#Home Student
			else if($data['User_Type']=='student')
			{	
				$querytutor = $this->user->getDetailsStudent(array('student.Id_User'=>$this->userid));
				$id_student = $querytutor->row('Id_Student');
		
				$data['query'] = $this->kelas_student->getlistannouncement();
				$data['query2'] = $this->kelas_student->getjoinclass($id_student);
				$this->load->view('student/v_student_home', $data);
			
			} 
		}
		
		else
		{
			redirect('users/login', 'refresh');
		}
		
	}
 

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('users/login', 'refresh');
	}

}

?>
