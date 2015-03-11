<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {
	
    function __construct()
    {
       
        parent::__construct();
		$this->load->model('users/m_users','user');
		$this->load->model('student/m_kelas_student','kelas_student');
		$this->load->model('tutor/m_kelas','kelas');
		$session_users = $this->session->userdata('logged_in');
		$this->userid =$session_users['Id_User'];
		$this->usertype =$session_users['User_Type'];
	
	}

	function index()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$this->load->view('student/v_search_class',$data);
	}
	
	function details_announcement()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$dt = $this->kelas_student->viewannouncement($id); 
	
		if($dt)
		{
			$data['Title'] = $dt->Title; 
			$data['Content'] = $dt->Content; 
		
			$this->load->view('student/v_details_announcement',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function searchclass()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$code_course=$this->input->post('code_course');
		
		$data['query'] = $this->kelas_student->getsearchclass($code_course);
		$this->load->view('student/v_search_class2', $data);
	}
	
	function joinclass()
	{
		$querytutor = $this->user->getDetailsStudent(array('student.Id_User'=>$this->userid));
		$id_student = $querytutor->row('Id_Student');
		
		$id_class= $this->uri->segment(4);
		$id_tutor= $this->uri->segment(5);		
		$this->kelas_student->add_join_class($id_class,$id_tutor,$id_student); 
		redirect('student/kelas/searchclass/');
	}
	
	function appoinment()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$data['query'] = $this->kelas_student->gettutorsearchappoinment();
		$this->load->view('student/v_form_appoinment',$data);
	}
	
	function searchappoinment()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$data['id']=$this->input->post('id');
		
		$dt=$this->kelas_student->view_searchappoinment($data['id']); 
		
		$data['query'] = $this->kelas_student->gettutorsearchappoinment();
		
		$data['m8'] = $dt->m8;
		$data['m9'] = $dt->m9; 
		$data['m10'] = $dt->m10; 
		$data['m11'] = $dt->m11; 
		$data['m12'] = $dt->m12; 
		$data['m1'] = $dt->m1; 
		$data['m2'] = $dt->m2; 
		$data['m3'] = $dt->m3; 
		$data['m4'] = $dt->m4; 
		$data['m5'] = $dt->m5; 
		
		$data['t8'] = $dt->t8;
		$data['t9'] = $dt->t9; 
		$data['t10'] = $dt->t10; 
		$data['t11'] = $dt->t11; 
		$data['t12'] = $dt->t12; 
		$data['t1'] = $dt->t1; 
		$data['t2'] = $dt->t2; 
		$data['t3'] = $dt->t3; 
		$data['t4'] = $dt->t4; 
		$data['t5'] = $dt->t5; 
		
		$data['w8'] = $dt->w8;
		$data['w9'] = $dt->w9; 
		$data['w10'] = $dt->w10; 
		$data['w11'] = $dt->w11; 
		$data['w12'] = $dt->w12; 
		$data['w1'] = $dt->w1; 
		$data['w2'] = $dt->w2; 
		$data['w3'] = $dt->w3; 
		$data['w4'] = $dt->w4; 
		$data['w5'] = $dt->w5;

		$data['th8'] = $dt->th8;
		$data['th9'] = $dt->th9; 
		$data['th10'] = $dt->th10; 
		$data['th11'] = $dt->th11; 
		$data['th12'] = $dt->th12; 
		$data['th1'] = $dt->th1; 
		$data['th2'] = $dt->th2; 
		$data['th3'] = $dt->th3; 
		$data['th4'] = $dt->th4; 
		$data['th5'] = $dt->th5; 
		
		$data['f8'] = $dt->f8;
		$data['f9'] = $dt->f9; 
		$data['f10'] = $dt->f10; 
		$data['f11'] = $dt->f11; 
		$data['f12'] = $dt->f12; 
		$data['f1'] = $dt->f1; 
		$data['f2'] = $dt->f2; 
		$data['f3'] = $dt->f3; 
		$data['f4'] = $dt->f4; 
		$data['f5'] = $dt->f5; 
		$this->load->view('student/v_form_appoinment_search', $data);
	}
	
	function addappoinment()
	{
		$querytutor = $this->user->getDetailsStudent(array('student.Id_User'=>$this->userid));
		$id_student = $querytutor->row('Id_Student');
		if($this->usertype=='student')
		{
			
			 $t=$this->input->post('ap_time');
			 $tt = new DateTime($t);
			$ttt=$tt->format('h:i a');
			
			 
			 
			$data = array(
					
				'Id_Tutor'	     => $this->input->post('id_tutor'),
				'Id_Student'	 => $id_student,
				'Ap_Date'		 => $this->input->post('ap_date'),
				'Ap_Time'	     => $ttt,
				'Ap_Content'	  => $this->input->post('content'),
				'Ap_Status'	      => 0,
				
		
			);
			
			if (!empty($data['Id_Tutor']))
			{
				$this->kelas_student->add_appoinment($data);
				$this->msg = 'Appoinment successfully add';
				$this->appoinment();
			}
			else
			{
				$this->msg = 'Field Not Complete';
				$this->appoinment();
			}
		}
	}
	
	function appoinment_status()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$querytutor = $this->user->getDetailsStudent(array('student.Id_User'=>$this->userid));
		$id_student = $querytutor->row('Id_Student');
		$data['query'] = $this->kelas_student->getappoinment_status($id_student);
		$this->load->view('student/v_appoinment_status', $data);
	}
	
	function delete_appoinment()
	{ 
		$id = $this->uri->segment(4); 
		$dt = $this->kelas_student->delete_appoinment($id); 
	
		if($dt)
		{
			redirect('student/kelas/appoinment_status', 'refresh');
		}
		else
		{
			redirect('users/home', 'refresh');
		}
	}
	
	function private_message()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$data['query'] = $this->kelas_student->gettutorsearchappoinment();
		$this->load->view('student/v_private_message',$data);
	}
	
	function search_private_message()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$data['id']=$this->input->post('id');
		
		$data['query'] = $this->kelas_student->gettutorsearchappoinment();
		$data['query2'] = $this->kelas_student->search_private_message($data['id']);
		$this->load->view('student/v_private_message_search', $data);
	}
	
	function search_private_message_form()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$data['id'] = $this->uri->segment(4);
		
		$this->load->view('student/v_private_message_search_form', $data);
	}
	
	function add_private_message()
	{
		$querytutor = $this->user->getDetailsStudent(array('student.Id_User'=>$this->userid));
		$id_student = $querytutor->row('Id_Student');
		if($this->usertype=='student')
		{
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$date=date("Y-m-d");
			$data = array(
					
				'Id_Tutor'	     => $this->input->post('id_tutor'),
				'Id_Student'	 => $id_student,
				'Message'		 => $this->input->post('message'),
				'Message_Date'	 => $date,
				'Message_Status'	 => 0,
				
			);
			
			if (!empty($data['Id_Tutor']))
			{
				$this->kelas_student->add_private_message($data);
				$this->msg = 'Private message successfully send';
				$this->private_message();
			}
			else
			{
				$this->msg = 'Field Not Complete';
				$this->private_message();
			}
		}
	}
	
	function details_kelas()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$id_tutor = $this->uri->segment(5); 
		$dt = $this->kelas->view($id); 
		$dt2 = $this->kelas->view_tutor($id_tutor); 
	
		if($dt And $dt2)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['Id_Tutor'] = $dt->Id_Tutor;
			$data['Name'] = $dt2->Name; 
			$data['Staff_No'] = $dt2->Staff_No; 
			$this->load->view('student/v_details_class',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function coursemate()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$id_tutor = $this->uri->segment(5); 
		$dt = $this->kelas->view($id); 
		$dt2 = $this->kelas->view_tutor($id_tutor); 
	
		if($dt And $dt2)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['Id_Tutor'] = $dt->Id_Tutor;
			$data['Name'] = $dt2->Name; 
			$data['Staff_No'] = $dt2->Staff_No; 
			$data['query'] = $this->kelas_student->list_coursemate($id);
			$this->load->view('student/v_coursemate',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function note()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$id_tutor = $this->uri->segment(5); 
		$dt = $this->kelas->view($id); 
		$dt2 = $this->kelas->view_tutor($id_tutor); 
	
		if($dt And $dt2)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['Id_Tutor'] = $dt->Id_Tutor;
			$data['Name'] = $dt2->Name; 
			$data['Staff_No'] = $dt2->Staff_No; 
			$data['query'] = $this->kelas_student->list_notes($id,$id_tutor);
			$this->load->view('student/v_note',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function asignment()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$id_tutor = $this->uri->segment(5); 
		$dt = $this->kelas->view($id); 
		$dt2 = $this->kelas->view_tutor($id_tutor); 
	
		if($dt And $dt2)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['Id_Tutor'] = $dt->Id_Tutor;
			$data['Name'] = $dt2->Name; 
			$data['Staff_No'] = $dt2->Staff_No; 
			$data['query'] = $this->kelas_student->list_asignment($id,$id_tutor);
			$this->load->view('student/v_asignment',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
}
