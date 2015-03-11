<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifylogin extends CI_Controller {
   
	function __construct()
	{
		parent::__construct();
		$this->load->model('users/m_users','user',TRUE);
	}

	function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result_user = $this->user->user_login($username, $password);

		if($result_user)
		{
			$sess_array = array();
			foreach($result_user as $row)
			{
				if($row->Status =='0')
				{
					$data['msg'] = 'Sorry, your account is not activated';
					$this->load->view('users/v_login',$data);
				}
				else
				{
					$sess_array = array(
					'Id_User' => $row->Id_User,
					'User_Type' => $row->User_Type
					);
					$this->session->set_userdata('logged_in', $sess_array);
					redirect('users/home', 'refresh');

				}
			}

		}
		else
		{
			$data['msg'] = 'Sorry, please check username and password';
			$this->load->view('users/v_login',$data);
		}
	}
}

?>