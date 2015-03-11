<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
    function __construct()
    {
       
        parent::__construct();
		$this->load->model('users/m_users','user');
		$session_users = $this->session->userdata('logged_in');
		$this->userid =$session_users['Id_User'];
		$this->usertype =$session_users['User_Type'];
	
	}

	function index()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		
		//jika tutor
		if($data['User_Type']=='tutor')
		{
			if(!empty($this->msg)){
				$data['msg'] = $this->msg;
			}
			
			$querytutor = $this->user->getDetailsTutor(array('tutor.Id_User'=>$this->userid));
			$data['rsProfile2'] = $querytutor->row();
			
			$this->load->view('users/v_user_profile',$data);
		}
		//jika student
		if($data['User_Type']=='student')
		{
			if(!empty($this->msg)){
				$data['msg'] = $this->msg;
			}
			
			$querystudent = $this->user->getDetailsStudent(array('student.Id_User'=>$this->userid));
			$data['rsProfile2'] = $querystudent->row();
			
			$this->load->view('users/v_user_profile2',$data);
		}
		//jika tutor
		if($data['User_Type']=='admin')
		{
			if(!empty($this->msg)){
				$data['msg'] = $this->msg;
			}
			
			$queryadmin = $this->user->getDetailsAdmin(array('admin.Id_User'=>$this->userid));
			$data['rsProfile2'] = $queryadmin->row();
			
			$this->load->view('users/v_user_profile3',$data);
		}
	}
	
	function saveprofile()
	{
		if($this->usertype=='tutor')
		{
			$arr['Name'] = $this->input->post('name');
			$arr['Staff_No'] = $this->input->post('matric');
			$arr['IC_No'] = $this->input->post('ic');
			$arr['Program'] = $this->input->post('program');
			$arr['Semester'] = $this->input->post('semester');
			$arr['Mobile_Phone'] = $this->input->post('phone');
			$arr['Email'] = $this->input->post('email');
			$arr['Id_User'] = $this->userid;
			
			if(!empty($arr['Name']))
			{
				$this->user->updateTutor($arr);
				$this->msg = 'Your profile successfully updated';
				$this->index();
			}
			else
			{
				$this->msg = 'Field Not Complete';
				$this->index();
			}
		}
		else if($this->usertype=='student')
		{
			$arr['Name'] = $this->input->post('name');
			$arr['Matric_No'] = $this->input->post('matric');
			$arr['IC_No'] = $this->input->post('ic');
			$arr['Program'] = $this->input->post('program');
			$arr['Semester'] = $this->input->post('semester');
			$arr['Mobile_Phone'] = $this->input->post('phone');
			$arr['Email'] = $this->input->post('email');
			$arr['Id_User'] = $this->userid;
			
			if(!empty($arr['Name']))
			{
				$this->user->updateStudent($arr);
				$this->msg = 'Your profile successfully updated';
				$this->index();
			}
			else
			{
				$this->msg = 'Field Not Complete';
				$this->index();
			}
		}
		else if($this->usertype=='admin')
		{
			$arr['Name'] = $this->input->post('name');
			$arr['Staff_No'] = $this->input->post('matric');
			$arr['IC_No'] = $this->input->post('ic');
			$arr['Mobile_Phone'] = $this->input->post('phone');
			$arr['Email'] = $this->input->post('email');
			$arr['Id_User'] = $this->userid;
			
			if(!empty($arr['Name']))
			{
				$this->user->updateAdmin($arr);
				$this->msg = 'Your profile successfully updated';
				$this->index();
			}
			else
			{
				$this->msg = 'Field Not Complete';
				$this->index();
			}
		}
	}
	
	function cpwd()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['rsProfile'] = $queryusers->row();
		$data['User_Type'] =$this->usertype;
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$this->load->view('users/v_user_cpwd',$data);
	}
	
	function updatepwd()
	{
		$queryusers = $this->user->getDetailsUsers(array('users.Id_User'=>$this->userid));
		$data['password'] = $queryusers->row('Password');
		$password3 = md5($this->input->post('old'));
		$password1 = md5($this->input->post('pwd'));
		$password2 = md5($this->input->post('pwd1'));
		
		if(!empty($password1) && !empty($password2)&& !empty($password3))
		{
			if( $data['password']!=$password3)
			{
				$this->msg = 'Old password not match';
				$this->cpwd();
			}
			else if($password1 != $password2)
			{
				$this->msg = 'Password not match';
				$this->cpwd();
						
			}
			
			else
			{
				$arr['Id_User'] = $this->userid;
				$arr['Password'] = $password1;
				$this->user->updatePassword($arr);
				$this->msg = 'Your password successfully updated';
				$this->cpwd();
			}
		}
		else
		{
			$this->msg = 'Field Not Complete';
			$this->cpwd();
		}
	}
	
	function getoldpass()
	{
		$query = $this->user->getOldPassword(array('Password'=>md5($this->input->post("items"))));
		if($query->num_rows > 0)
		{
			$data['somefield'] = '';
		}
		else
		{
			$data['somefield'] = '<div class="alert alert-danger">
			<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
			Old password not match
			</div>';
		}
		echo json_encode($data);
	}
	
	function getpass(){
	
		$password1 = $this->input->post('items1');
		$password2 = $this->input->post('items2');
		
		if($password1 && $password2 != null){
			
			if($password1 != $password2){
			
				
			$data['somefield'] = '<div class="alert alert-danger">
			<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
			Password not match
			</div>';
			
			}
			else
			{
				$data['somefield'] = '';
			}
		}
		else
		{
			$data['somefield'] = '';
		}
		echo json_encode($data);
	}
	
}

/* End of file profile.php */
/* Location: ./system/application/controllers/profile.php */