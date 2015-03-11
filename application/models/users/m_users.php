<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends CI_Model{

	public function __construct()
	{
		//$this->load->database();
	}
	
	function user_login($username, $password)
	{
	$this -> db -> select('*');
	$this -> db -> from('users');
	$this -> db -> where('Username', $username);
	$this -> db -> where('Password',md5($password));
	//$this -> db -> where('Status',1);
	$this -> db -> limit(1);

	$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function add_user($data)
	{
		$this->db->insert('users', $data);
		$id = $this->db->insert_id();
		
		
		return $id;
		
	}
	
	function add_user_profile_pic($new_id, $filename)
	{
		
		//$versi=$this->input->post('versi');
		$data = array(
			
		'File_Name' =>$filename,
		
		);
		$this->db->where('Id_User',$new_id);
		$this->db->update('users',$data);
	}
	
	public function add_student($data2)
	{
		$this->db->insert('student', $data2);
		$this->db->insert_id();
		
		
	}
	
	public function add_tutor($data2)
	{
		$this->db->insert('tutor', $data2);
		$id =$this->db->insert_id();
		return $id;

	}
	
	public function add_schedul($data3)
	{
		$this->db->insert('schedule', $data3);
		$id =$this->db->insert_id();
		return $id;

	}
	
	function getDetailsUsers($arr)
	{
		$this -> db -> select('*');
		$this -> db -> from('users');

		if(!empty($arr)){
		foreach($arr as $key=>$val){
		$this->db->where($key,$val);
		}
		}

		$query = $this->db->get();
		return $query;
	}
	
	function getDetailsTutor($arr)
	{
		$this -> db -> select('*');
		$this -> db -> from('tutor');

		if(!empty($arr)){
		foreach($arr as $key=>$val){
		$this->db->where($key,$val);
		}
		}

		$query = $this->db->get();
		return $query;
	}
	
	function getDetailsAdmin($arr)
	{
		$this -> db -> select('*');
		$this -> db -> from('admin');

		if(!empty($arr)){
		foreach($arr as $key=>$val){
		$this->db->where($key,$val);
		}
		}

		$query = $this->db->get();
		return $query;
	}
	
	function getDetailsStudent($arr)
	{
		$this -> db -> select('*');
		$this -> db -> from('student');

		if(!empty($arr)){
		foreach($arr as $key=>$val){
		$this->db->where($key,$val);
		}
		}

		$query = $this->db->get();
		return $query;
	}
	
	function updateTutor($arr)
	{
		$arrRecord = $arr = $this->getMatchField($arr,"tutor");
		$this->db->where('Id_User',$arrRecord['Id_User']);
		$this->db->update('tutor',$arrRecord);
		return $this->db->insert_id();
	}
	function updateAdmin($arr)
	{
		$arrRecord = $arr = $this->getMatchField($arr,"admin");
		$this->db->where('Id_User',$arrRecord['Id_User']);
		$this->db->update('admin',$arrRecord);
		return $this->db->insert_id();
	}
	function updateStudent($arr)
	{
		$arrRecord = $arr = $this->getMatchField($arr,"student");
		$this->db->where('Id_User',$arrRecord['Id_User']);
		$this->db->update('student',$arrRecord);
		return $this->db->insert_id();
	}

	function getMatchField($arr,$tablename)
	{
		$result = mysql_query("SHOW COLUMNS FROM " . $tablename);
		if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
		}
		if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_array($result)) {
		foreach($arr as $key => $value) {
		if($key == $row[0]){ //kalau match kena set kat sini
		//echo $key;    
		$arrR[$key] = mysql_real_escape_string($value);
		}
		}

		}
		return $arrR;
		}
	}
	
	function getOldPassword($arr="",$order="",$limit="",$where_special=""){
		  $this->db->select('*');
		  $this->db->from('users');
		  if(!empty($arr)){
		  	foreach($arr as $key=>$val){
				 $this->db->where($key,$val);
			}
		  }
		  if(!empty($where_special)){
        		$this->db->where($where_special,"",FALSE);
		  }
		  if(!empty($order)){
		        foreach($order as $key=>$val){
		          $this->db->order_by($key,$val);  
		        }
		  }
		  if(!empty($limit)){
		       $this->db->limit($limit['limit'], $limit['start']);
		  }
		  $query = $this->db->get();
		  return $query;
	}

	function updatePassword($arr)
	{
		$arrRecord =  $this->getMatchField($arr,"users");
		$this->db->where('Id_User',$arrRecord['Id_User']);
		$this->db->update('users',$arrRecord);
		return $this->db->insert_id();
	}



}


/* End of file m_members.php */
/* Location: ./application/models/m_members.php */