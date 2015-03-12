<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {
	
    function __construct()
    {
       
        parent::__construct();
		$this->load->model('users/m_users','user');
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
		$this->load->view('tutor/v_form_class',$data);
	}
	
	function savekelas()
	{
		$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
		$data['Id_Tutor'] = $querytutor->row('Id_Tutor');
		if($this->usertype=='tutor')
		{
			 $s=$this->input->post('stime');
			 $t=$this->input->post('etime');
			 
			//date_default_timezone_set("Asia/Kuala_Lumpur");
			//$date=$s("Y-m-d");
			//$time=$t("H:i:s");
			$ss = new DateTime($s);
			$tt = new DateTime($t);
			$sss=$ss->format('h:i a');
			$ttt=$tt->format('h:i a');
		
			$data = array(
					
				'Id_Tutor'	     => $data['Id_Tutor'],
				'Course_Code'	 => $this->input->post('course_code'),
				'Course'	     => $this->input->post('course'),
				'Group'	      	 => $this->input->post('group'),
				'Stime'	      	 => $sss,
				'Etime'	      	 => $ttt,
		
			);
			
			if (!empty($data['Id_Tutor']))
			{
				$this->kelas->add_kelas($data);
				$this->msg = 'Class successfully add';
				$this->index();
			}
			else
			{
				$this->msg = 'Field Not Complete';
				$this->index();
			}
		}
	}
	
	function delete_kelas()
	{ 
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->delete($id); 
	
		if($dt)
		{
			redirect('users/home', 'refresh');
		}
		else
		{
			redirect('users/home', 'refresh');
		}
	}
	
	function details_kelas()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->view($id); 
	
		if($dt)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			$this->load->view('tutor/v_details_class',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function getstudentpending()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		
		if($this->usertype=='tutor')
		{
			$id = $this->uri->segment(4);
			$dt = $this->kelas->view($id); 		

			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->getstudentpending($id);
			$this->load->view('tutor/v_student_pending', $data);
		
		} 
	}
	
	function update_status_pending()
	{
		$id= $this->uri->segment(4); 
		$id_class= $this->uri->segment(5); 
		$this->kelas->update_status_pending($id); 
		redirect('tutor/kelas/getstudentpending/'.$id_class);
	}
	
	function update_status_reject()
	{
		$id= $this->uri->segment(4); 
		$id_class= $this->uri->segment(5); 
		$this->kelas->update_status_reject($id); 
		redirect('tutor/kelas/getstudentpending/'.$id_class);
	}
	
	function getstudentapprove()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		
		if($this->usertype=='tutor')
		{
			$id = $this->uri->segment(4);
			$dt = $this->kelas->view($id); 		

			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->getstudentapprove($id);
			$this->load->view('tutor/v_student_approve', $data);
		
		} 
	}
	
	function getstudentapproveprint()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		
		if($this->usertype=='tutor')
		{
			$id = $this->uri->segment(4);
			$dt = $this->kelas->view($id); 		

			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->getstudentapprove($id);
			$this->load->view('tutor/v_student_approve_print', $data);
		
		} 
	}
	
	function make_attendance()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		
		if($this->usertype=='tutor')
		{
			$id = $this->uri->segment(4);
			$dt = $this->kelas->view($id); 		

			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->getstudentapprove($id);
			$this->load->view('tutor/v_make_attendance', $data);
		
		} 
	}
	
	function save_attendance()
	{ 
		$id=$this->input->post('id');
		$date=$this->input->post('date');
		$id_class=$this->input->post('id_class');
		
		$idSC = $this->kelas->getstudentapprove($id_class);
				
		$this->kelas->save_attendance($id,$date,$idSC,$id_class); 
		redirect('tutor/kelas/make_attendance/'.$id_class);
		
	}
	
	function report_attendance()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		
		if($this->usertype=='tutor')
		{
			$id = $this->uri->segment(4);
			$dt = $this->kelas->view($id); 		

			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->getreportattendance($id);
			$this->load->view('tutor/v_report_attendance', $data);
		
		} 
	}
	
	function all_report_attendance()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		
		if($this->usertype=='tutor')
		{
			$id = $this->uri->segment(4);
			$date = $this->uri->segment(5);
			
			$dt = $this->kelas->view($id); 		

			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->all_report_attendance($id,$date);
			$this->load->view('tutor/v_all_report_attendance', $data);
		
		} 
	}
	
	function all_report_attendance_print()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		
		if($this->usertype=='tutor')
		{
			$id = $this->uri->segment(4);
			$date = $this->uri->segment(5);
			
			$dt = $this->kelas->view($id); 		

			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->all_report_attendance($id,$date);
			$data['date'] =$date;
			$this->load->view('tutor/v_all_report_attendance_print', $data);
		
		} 
	}
	
	function note()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->view($id); 
	
		if($dt)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->list_notes($id);
			$this->load->view('tutor/v_note',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function form_note()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->view($id); 
	
		if($dt)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Id_Tutor'] = $dt->Id_Tutor; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$this->load->view('tutor/v_form_note',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function savenotes()
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date=date("Y-m-d");
		$time=date("H:i:s");
		$data = array(
					
				'Id_Class'	      	 => $this->input->post('id_class'),
				'Id_Tutor'	      	 => $this->input->post('id_tutor'),
				'File_Name'	      	 => $this->input->post('file_name'),
				'Date_Notes'	      	 => $date
		
			);
			
		$new_id = $this->kelas->add_notes($data);
		
		if($new_id)
		{
			#Upload Product Photo
			$config['upload_path'] = 'images/notes';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
			$newFileName = $_FILES['userfile']['name'];
			$fileExt = array_pop(explode(".", $newFileName));
			$config['file_name'] = $new_id.'.'.$fileExt;
			
			#$new_id = $new_id.'.'.$fileExt;
			//$this->load->model('m_merchant_product'); 
			$this->kelas->updates_notes($new_id, $new_id.'.'.$fileExt); 
			
			$this->load->library('upload', $config);
			$this->upload->do_upload();
			redirect('tutor/kelas/form_note/'.$data['Id_Class']);
		}
	}
	
	function download_notes() 
	{
		// asumming you have http://www.domain.com/index.php/controller/download/file_name/extension/
		//$extension = $this->uri->segment(4); // file extension
		$file_name = $this->uri->segment(4); // file name
		$file_path = FCPATH . 'images/notes/' . $file_name; // absolute path to file
		if (is_file($file_path)) {
			$mime = 'application/force-download';
			header('Pragma: public');    
			header('Expires: 0');        
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Cache-Control: private',false);
			header('Content-Type: ' . $mime);
			header('Content-Disposition: attachment; filename="' . $file_name . '"');
			header('Connection: close');
			readfile(base_url() . 'images/notes/' . $file_name); // relative path to file   
			exit();
		} else {
			redirect('tutor/kelas/note/'.$data['Id_Class']);
		}
	}  
	
	function delete_notes()
	{ 
		$id = $this->uri->segment(5); 
		$id_notes = $this->uri->segment(4); 
		$dt = $this->kelas->delete_notes($id_notes); 
	
		if($dt)
		{
			redirect('tutor/kelas/note/'.$id);
		}
		else
		{
			redirect('users/home', 'refresh');
		}
	}
	
	function asignment()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->view($id); 
	
		if($dt)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$data['query'] = $this->kelas->list_asignment($id);
			$this->load->view('tutor/v_asignment',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function form_asignment()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->view($id); 
	
		if($dt)
		{
			$data['Id_Class'] = $dt->Id_Class; 
			$data['Id_Tutor'] = $dt->Id_Tutor; 
			$data['Course_Code'] = $dt->Course_Code; 
			$data['Course'] = $dt->Course; 
			$data['Group'] = $dt->Group; 
			$data['Stime'] = $dt->Stime; 
			$data['Etime'] = $dt->Etime; 
			
			$this->load->view('tutor/v_form_asignment',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function saveasignment()
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date=date("Y-m-d");
			
		$data = array(
					
				'Id_Class'	      	 => $this->input->post('id_class'),
				'Id_Tutor'	      	 => $this->input->post('id_tutor'),
				'Title'	      	 	=> $this->input->post('title'),
				'Due_Date'	      	 => $this->input->post('date'),
				'Date_Created_Asign' => $date,
		
			);
			
		$new_id = $this->kelas->add_asignment($data);
		
		if($new_id)
		{
			#Upload Product Photo
			$config['upload_path'] = 'images/asignment';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
			$newFileName = $_FILES['userfile']['name'];
			$fileExt = array_pop(explode(".", $newFileName));
			$config['file_name'] = $new_id.'.'.$fileExt;
			
			#$new_id = $new_id.'.'.$fileExt;
			//$this->load->model('m_merchant_product'); 
			$this->kelas->updates_asignment($new_id, $new_id.'.'.$fileExt); 
			
			$this->load->library('upload', $config);
			$this->upload->do_upload();
			redirect('tutor/kelas/form_asignment/'.$data['Id_Class']);
		}
	}
	
	function download_asignment() 
	{
		// asumming you have http://www.domain.com/index.php/controller/download/file_name/extension/
		//$extension = $this->uri->segment(4); // file extension
		$file_name = $this->uri->segment(4); // file name
		$file_path = FCPATH . 'images/asignment/' . $file_name; // absolute path to file
		if (is_file($file_path)) {
			$mime = 'application/force-download';
			header('Pragma: public');    
			header('Expires: 0');        
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Cache-Control: private',false);
			header('Content-Type: ' . $mime);
			header('Content-Disposition: attachment; filename="' . $file_name . '"');
			header('Connection: close');
			readfile(base_url() . 'images/asignment/' . $file_name); // relative path to file   
			exit();
		} else {
			redirect('tutor/kelas/asignment/'.$data['Id_Class']);
		}
	}  
	
	function delete_asignment()
	{ 
		$id = $this->uri->segment(5); 
		$id_asignment = $this->uri->segment(4); 
		$dt = $this->kelas->delete_asignment($id_asignment); 
	
		if($dt)
		{
			redirect('tutor/kelas/asignment/'.$id);
		}
		else
		{
			redirect('users/home', 'refresh');
		}
	}
	
	function announcement()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
		$data['Id_Tutor'] = $querytutor->row('Id_Tutor');
		$data['query'] = $this->kelas->getlistannouncement($data['Id_Tutor']);
		$this->load->view('tutor/v_list_announcement', $data);
	}
	
	function form_announcement()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$this->load->view('tutor/v_form_announcement',$data);
	}
	
	function save_announcement()
	{
		$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
		$data['Id_Tutor'] = $querytutor->row('Id_Tutor');
		if($this->usertype=='tutor')
		{
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$date=date("Y-m-d");
			$time=date("H:i:s"); 
			$data = array(
					
				'Id_Tutor'	     => $data['Id_Tutor'],
				'Content'	 => $this->input->post('content'),
				'Title'	     => $this->input->post('title'),
				'Announcement_Date'	    => $date,
				'Announcement_Time'	    => $time,
		
			);
			
			if (!empty($data['Id_Tutor']))
			{
				$this->kelas->add_announcement($data);
				$this->msg = 'Announcement successfully add';
				$this->form_announcement();
			}
			else
			{
				$this->msg = 'Field Not Complete';
				$this->form_announcement();
			}
		}
	}
	
	function delete_announcement()
	{ 
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->delete_announcement($id); 
	
		if($dt)
		{
			redirect('tutor/kelas/announcement', 'refresh');
		}
		else
		{
			redirect('users/home', 'refresh');
		}
	}
	
	function schedule()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
		$data['Id_Tutor'] = $querytutor->row('Id_Tutor');
		$dt = $this->kelas->view_schedule($data['Id_Tutor']);
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
		
			 
			
		$this->load->view('tutor/v_schedule',$data);
		
	}
	
	function save_schedule()
	{
		$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
		$data['Id_Tutor'] = $querytutor->row('Id_Tutor');
		if($this->usertype=='tutor')
		{
			
			
				$this->kelas->add_schedule($data['Id_Tutor']);
				$this->msg = 'Schedule successfully add';
				$this->schedule();
			
		}
	}
	
	function appoinment()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
		$data['Id_Tutor'] = $querytutor->row('Id_Tutor');
		$data['query'] = $this->kelas->getlistappoinment($data['Id_Tutor']);
		$this->load->view('tutor/v_list_appoinment', $data);
	}
	
	function details_appoinment()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$id_student = $this->uri->segment(5); 
		$dt = $this->kelas->view_appoinment($id); 
		$dt2 = $this->kelas->view_student($id_student); 
	
		if($dt And $dt2)
		{
			$data['Id_Tutor'] = $dt->Id_Tutor; 
			$data['Id_Appoinment'] = $dt->Id_Appoinment; 
			$data['Id_Student'] = $dt->Id_Student; 
			$data['Ap_Date'] = $dt->Ap_Date; 
			$data['Ap_Time'] = $dt->Ap_Time; 
			$data['Ap_Content'] = $dt->Ap_Content;

			$data['Name'] = $dt2->Name; 
			$data['Matric_No'] = $dt2->Matric_No; 
			
			$this->load->view('tutor/v_details_appoinment',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function update_status_appoinment()
	{
		if($this->input->post('go') == "Approve"){ 
			$id=$this->input->post('id_ap');
			$this->kelas->update_status_appoinment_approve($id); 
			redirect('tutor/kelas/appoinment');
		}
		else
		{
			$id=$this->input->post('id_ap');
			$this->kelas->update_status_appoinment_reject($id); 
			redirect('tutor/kelas/appoinment');
		}
	}
	
	function delete_appoinment()
	{ 
		$id = $this->uri->segment(4); 
		$dt = $this->kelas->delete_appoinment($id); 
	
		if($dt)
		{
			redirect('tutor/kelas/appoinment', 'refresh');
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
		$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
		$data['Id_Tutor'] = $querytutor->row('Id_Tutor');
		$data['query'] = $this->kelas->getlistprivatemessage($data['Id_Tutor']);
		$this->load->view('tutor/v_list_private_message', $data);
	}
	
	function details_private_message()
	{ 
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		$id = $this->uri->segment(4); 
		$id_student = $this->uri->segment(5); 
		$dt = $this->kelas->view_private_message($id); 
		$dt2 = $this->kelas->view_student($id_student); 
	
		if($dt And $dt2)
		{
			$data['Id_Tutor'] = $dt->Id_Tutor; 
			$data['Id_Private_Message'] = $dt->Id_Private_Message; 
			$data['Id_Student'] = $dt->Id_Student; 
			$data['Message_Date'] = $dt->Message_Date; 
			$data['Message'] = $dt->Message; 
			

			$data['Name'] = $dt2->Name; 
			$data['Matric_No'] = $dt2->Matric_No; 
			
			$this->load->view('tutor/v_details_private_message',$data);
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	function reply_message()
	{
		if($this->input->post('go') == "Reply"){ 
			$id=$this->input->post('id_private');
			$reply_ms=$this->input->post('reply_ms');
			$this->kelas->update_reply_message($id,$reply_ms); 
			redirect('tutor/kelas/private_message');
		}
	}
	
	function admin_getstudentpending()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if($this->usertype=='admin')
		{
			
			$data['query'] = $this->kelas->admin_getstudentpending();
			$this->load->view('admin/v_student_pending', $data);
		
		} 
	}
	
	function admin_update_status_pending()
	{
		$id= $this->uri->segment(4); 
		$ut= $this->uri->segment(5);
		$this->kelas->admin_update_status_pending($id);
		if($ut=='student')
		{				
			redirect('tutor/kelas/admin_getstudentpending/');
		}
		else
		{
			redirect('tutor/kelas/admin_gettutorpending/');
		}
	}
	function admin_update_status_reject()
	{
		$id= $this->uri->segment(4);
		$ut= $this->uri->segment(5);		
		$this->kelas->admin_update_status_reject($id); 
		if($ut=='student')
		{				
			redirect('tutor/kelas/admin_getstudentpending/');
		}
		else
		{
			redirect('tutor/kelas/admin_gettutorpending/');
		}
	}
	
	function admin_getstudentapprove()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if($this->usertype=='admin')
		{
			
			$data['query'] = $this->kelas->admin_getstudentapprove();
			$this->load->view('admin/v_student_approve', $data);
		
		} 
	}
	
	function admin_gettutorpending()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if($this->usertype=='admin')
		{
			
			$data['query'] = $this->kelas->admin_gettutorpending();
			$this->load->view('admin/v_tutor_pending', $data);
		
		} 
	}
	
	function admin_gettutorapprove()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if($this->usertype=='admin')
		{
			
			$data['query'] = $this->kelas->admin_gettutorapprove();
			$this->load->view('admin/v_tutor_approve', $data);
		
		} 
	}
	
	function totallogintutor()
	{
	
		$data_detail= $this->kelas->get_totallogintutor();
		
		$bln = array();
		$bln['name'] = 'Bulan';
		$rows['name'] = 'Total Login';
		foreach ($data_detail->result() as $r)
		{
		$bln['data'][] = $r->BULAN;
		$rows['data'][] = $r->JUMLAH;
		}
		$rslt = array();
		array_push($rslt, $bln);
		array_push($rslt, $rows);
		//print_r($rslt);
		echo json_encode($rslt, JSON_NUMERIC_CHECK);
	}
}
