<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_account extends CI_Controller {
   
	function __construct()
	{
		parent::__construct();
		$this->load->model('users/m_users','user',TRUE);
	}
	
	public function index()
	{
		if(!empty($this->msg)){
			$data['msg'] = $this->msg;
		}
		$data['test']='null';
		$this->load->view('users/v_register_account', $data);
	}
	
	function getpass(){
	
		$password1 = $this->input->post('items1');
		$password2 = $this->input->post('items2');
		
		if($password1 && $password2 != null){
			
			if($password1 != $password2){
			
				
			$data['somefield'] = ' 
			 
			
			<font color="red">Password not match</font>
			';
			
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
	
	function save()
	{
		$password1 = md5($this->input->post('pwd'));
		$password2 = md5($this->input->post('pwd1'));
		$username = $this->input->post('matric');
		
		$queryUser = $this->user->getDetailsUsers(array('users.Username'=>$username));
		$username2 = $queryUser->row('Username');
		
		if($username == $username2)
		{
			$this->msg = 'Invalid Matric No/ Staff No';
			$this->index();
		
		}
		else if($password1 != $password2)
		{
			$this->msg = 'Password not match';
			$this->index();
		}
		else
		{
			$data = array(
					
				'Username'	      	 => $username,
				'Password'	      	 => $password1,
				'User_Type'	      	 => $this->input->post('type'),
				'Status'	      	 => 0
		
			);
			
			if (!empty($data['Password']))
				{ 
					$new_id = $this->user->add_user($data);
					
					if($new_id)
					{
						#Upload Product Photo
						$config['upload_path'] = 'images/profile';
						$config['allowed_types'] = 'jpg|png';
						$newFileName = $_FILES['userfile']['name'];
						$fileExt = array_pop(explode(".", $newFileName));
						$config['file_name'] = $new_id.'.'.$fileExt;
						
						#$new_id = $new_id.'.'.$fileExt;
						//$this->load->model('m_merchant_product'); 
						$this->user->add_user_profile_pic($new_id, $new_id.'.'.$fileExt); 
						
						$this->load->library('upload', $config);
						
						 if ($this->upload->do_upload()) 
						 {

							$this->load->library('image_lib');
							$img_path =  realpath("img")."\\images\\profile\\".$new_id.'.'.$fileExt;
							
							// Configuration 1
							$configSize1['image_library'] = 'gd2';
							$configSize1['source_image'] = 'images/profile/'.$new_id.'.'.$fileExt;
							$configSize1['new_image'] = 'images/profile/profile_resize_thumb/'.$new_id.'.'.$fileExt;
							//$config['create_thumb'] = TRUE;
							$configSize1['maintain_ratio'] = TRUE;
							$configSize1['width'] = 70;
							$configSize1['height'] = 70;
								
							// resize image
							$this->image_lib->clear();
							$this->image_lib->initialize($configSize1);
							$this->image_lib->resize();
							
							if($this->input->post('type')=='student'){
								$data2 = array(
						
									'Id_User'	      	=> $new_id,
									'Name'	      	 	=> $this->input->post('name'),
									'IC_No'	      		=> $this->input->post('ic'),
									'Matric_No'	      	=> $this->input->post('matric'),
									'Mobile_Phone'	    => $this->input->post('phone'),
									'Email'	      	 	=> $this->input->post('email'),
									'Program'	      	 => $this->input->post('program'),
									'Semester'	      	 => $this->input->post('semester'),
							
								);
				
								$this->user->add_student($data2);
								$this->index();
								
								
							}
							else{
								$data2 = array(
						
									'Id_User'	      	=> $new_id,
									'Name'	      	 	=> $this->input->post('name'),
									'IC_No'	      		=> $this->input->post('ic'),
									'Staff_No'	      	=> $this->input->post('matric'),
									'Mobile_Phone'	    => $this->input->post('phone'),
									'Email'	      	 	=> $this->input->post('email'),
									'Program'	      	 => $this->input->post('program'),
									'Semester'	      	 => $this->input->post('semester'),
							
								);
								
				
								$berjaya=$this->user->add_tutor($data2);
								
								if($berjaya)
								{
									$data3 = array(
							
										'Id_Tutor'	      	=>$berjaya
								
									);
									
					
									$this->user->add_schedul($data3);
								
								}
								
								
							}
							
						}
					}
				
					redirect('users/login');
				}
			
			else
			{
				$data['msg'] = 'Sorry, please check username and password';
				$this->load->view('users/v_login',$data);
			}
		
		}
	}
}

?>