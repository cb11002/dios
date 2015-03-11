<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kelas extends CI_Model{

	public function __construct()
	{
		//$this->load->database();
	}
	
	public function add_kelas($data)
	{
		$this->db->insert('class', $data);
		$id = $this->db->insert_id();
		
		return $id;	
	}
	
	function getlistclass($id)
	{
		$this -> db -> select('k.*, t.*');
		$this -> db -> from('class k');
		$this->db->join('tutor t','k.Id_Tutor = t.Id_Tutor');
		$this -> db -> where('t.Id_User',$id);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function delete($a)
	{
		$d=$this->db->delete('class',array('Id_Class'=>$a));
		return $d;
	}
	
	function view($a)
	{
		$d=$this->db->get_where('class',array('Id_Class'=>$a))->row();
		return $d;
	}
	
	function getstudentpending($id)
	{
		$this -> db -> select('sc.*, s.*');
		$this -> db -> from('student_class sc');
		$this->db->join('student s','sc.Id_Student = s.Id_Student');
		$this -> db -> where('sc.Id_Class',$id);
		$this -> db -> where('sc.Status',0);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function update_status_pending($id)
	{
		$s=1;
		$data = array('Status' =>$s);
		$this->db->where('Id_Student_Class',$id);
		$this->db->update('student_class',$data);
		return;
	}
	
	function update_status_reject($id)
	{
		$s=3;
		$data = array('Status' =>$s);
		$this->db->where('Id_Student_Class',$id);
		$this->db->update('student_class',$data);
		return;
	}
	
	function getstudentapprove($id)
	{
		$this -> db -> select('sc.*, s.*');
		$this -> db -> from('student_class sc');
		$this->db->join('student s','sc.Id_Student = s.Id_Student');
		$this -> db -> where('sc.Id_Class',$id);
		$this -> db -> where('sc.Status',1);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function save_attendance($id,$date,$idSC,$id_class)
	{
		foreach ($idSC as $key=>$value)
		{
			$masuk = array(	
							'Id_Student_Class' =>$value->Id_Student_Class,
							'Id_Class' =>$id_class,
							'Date' => $date,
							'Status_Attendance' => 0
							);
			$buat=$this->db->insert('attendance',$masuk);
			
			if($buat)
			{
				foreach ($id as $key=>$value2)
				{
					$masuk = array(	
									'Status_Attendance' => 1
									);
					$this->db->where('Id_Student_Class',$value2);
					$this->db->where('Date',$date);
					$this->db->update('attendance',$masuk);
				}
			}
		}
		
	}
	
	function getreportattendance($id)
	{
		$this->db->distinct('a.Date');
		$this -> db -> select('sc.*, a.*');
		$this -> db -> from('student_class sc');
		$this->db->join('attendance a','sc.Id_Student_Class = a.Id_Student_Class');
		$this -> db -> where('sc.Id_Class',$id);
		$this -> db -> where('sc.Status',1);
		$this->db->group_by('a.Date');
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function all_report_attendance($id,$date)
	{
		//$this->db->distinct('a.Date');
		$this -> db -> select('a.*, s.*, sc.*');
		$this -> db -> from('attendance a');
		$this->db->join('student_class sc','a.Id_Student_Class = sc.Id_Student_Class');
		$this->db->join('student s','sc.Id_Student = s.Id_Student');
		$this -> db -> where('a.Id_Class',$id);
		$this -> db -> where('a.Date',$date);
		//$this->db->group_by('a.Date');
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	public function add_notes($data)
	{
		$this->db->insert('notes', $data);
		$id = $this->db->insert_id();
		
		
		return $id;
		
	}
	
	function updates_notes($new_id, $filename)
	{
		
		//$versi=$this->input->post('versi');
		$data = array(
			
		'File' =>$filename,
		
		);
		$this->db->where('Id_Note',$new_id);
		$this->db->update('notes',$data);
	}
	
	function list_notes($id)
	{
		$this -> db -> select('*');
		$this -> db -> from('notes');
		$this -> db -> where('Id_Class',$id);
		$this -> db -> order_by('Date_Notes','desc');
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	function delete_notes($a)
	{
		$d=$this->db->delete('notes',array('Id_Note'=>$a));
		return $d;
	}
	
	public function add_asignment($data)
	{
		$this->db->insert('asignment', $data);
		$id = $this->db->insert_id();
		
		
		return $id;
		
	}
	
	function updates_asignment($new_id, $filename)
	{
		
		//$versi=$this->input->post('versi');
		$data = array(
			
		'File' =>$filename,
		
		);
		$this->db->where('Id_Asignment',$new_id);
		$this->db->update('asignment',$data);
	}
	
	function list_asignment($id)
	{
		$this -> db -> select('*');
		$this -> db -> from('asignment');
		$this -> db -> where('Id_Class',$id);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function delete_asignment($a)
	{
		$d=$this->db->delete('asignment',array('Id_Asignment'=>$a));
		return $d;
	}
	
	function getlistannouncement($id)
	{
		$this -> db -> select('*');
		$this -> db -> from('announcement');
		$this -> db -> where('Id_Tutor',$id);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	public function add_announcement($data)
	{
		$this->db->insert('announcement', $data);
		$id = $this->db->insert_id();
		
		return $id;	
	}
	
	function delete_announcement($a)
	{
		$d=$this->db->delete('announcement',array('Id_Announcement'=>$a));
		return $d;
	}
	
	function add_schedule($id)
	{
		
		//$versi=$this->input->post('versi');
		$data = array(
					
				'm8'	 		=> $this->input->post('m8'),
				'm9'	     => $this->input->post('m9'),
				'm10'	 		=> $this->input->post('m10'),
				'm11'	     => $this->input->post('m11'),
				'm12'	 		=> $this->input->post('m12'),
				'm1'	     => $this->input->post('m1'),
				'm2'	 		=> $this->input->post('m2'),
				'm3'	     => $this->input->post('m3'),
				'm4'	 		=> $this->input->post('m4'),
				'm5'	     => $this->input->post('m5'),
				't8'	 		=> $this->input->post('t8'),
				't9'	     => $this->input->post('t9'),
				't10'	 		=> $this->input->post('t10'),
				't11'	     => $this->input->post('t11'),
				't12'	 		=> $this->input->post('t12'),
				't1'	     => $this->input->post('t1'),
				't2'	 		=> $this->input->post('t2'),
				't3'	     => $this->input->post('t3'),
				't4'	 		=> $this->input->post('t4'),
				't5'	     => $this->input->post('t5'),
				'w8'	 		=> $this->input->post('w8'),
				'w9'	     => $this->input->post('w9'),
				'w10'	 		=> $this->input->post('w10'),
				'w11'	     => $this->input->post('w11'),
				'w12'	 		=> $this->input->post('w12'),
				'w1'	     => $this->input->post('w1'),
				'w2'	 		=> $this->input->post('w2'),
				'w3'	     => $this->input->post('w3'),
				'w4'	 		=> $this->input->post('w4'),
				'w5'	     => $this->input->post('w5'),
				'th8'	 		=> $this->input->post('th8'),
				'th9'	     => $this->input->post('th9'),
				'th10'	 		=> $this->input->post('th10'),
				'th11'	     => $this->input->post('th11'),
				'th12'	 		=> $this->input->post('th12'),
				'th1'	     => $this->input->post('th1'),
				'th2'	 		=> $this->input->post('th2'),
				'th3'	     => $this->input->post('th3'),
				'th4'	 		=> $this->input->post('th4'),
				'th5'	     => $this->input->post('th5'),
				'f8'	 		=> $this->input->post('f8'),
				'f9'	     => $this->input->post('f9'),
				'f10'	 		=> $this->input->post('f10'),
				'f11'	     => $this->input->post('f11'),
				'f12'	 		=> $this->input->post('f12'),
				'f1'	     => $this->input->post('f1'),
				'f2'	 		=> $this->input->post('f2'),
				'f3'	     => $this->input->post('f3'),
				'f4'	 		=> $this->input->post('f4'),
				'f5'	     => $this->input->post('f5'),
		
			);
		$this->db->where('Id_Tutor',$id);
		$this->db->update('schedule',$data);
	}
	
	function view_schedule($a)
	{
		$d=$this->db->get_where('schedule',array('Id_Tutor'=>$a))->row();
		return $d;
	}
	
	function getlistappoinment($id)
	{
		$this -> db -> select('a.*,s.*');
		$this -> db -> from('appoinment a');
		$this->db->join('student s','a.Id_Student = s.Id_Student');
		$this -> db -> where('a.Id_Tutor',$id);
		$this -> db -> where('a.Ap_Status',0);
		$this -> db -> order_by('a.Ap_Date','desc');
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function view_appoinment($a)
	{
		$d=$this->db->get_where('appoinment',array('Id_Appoinment'=>$a))->row();
		return $d;
	}
	
	function view_student($a)
	{
		$d=$this->db->get_where('student',array('Id_Student'=>$a))->row();
		return $d;
	}
	
	function update_status_appoinment_approve($id)
	{
		$s=1;
		$data = array('Ap_Status' =>$s);
		$this->db->where('Id_Appoinment',$id);
		$this->db->update('appoinment',$data);
		return;
	}
	function update_status_appoinment_reject($id)
	{
		$s=3;
		$data = array('Ap_Status' =>$s);
		$this->db->where('Id_Appoinment',$id);
		$this->db->update('appoinment',$data);
		return;
	}
	
	function delete_appoinment($a)
	{
		$d=$this->db->delete('appoinment',array('Id_Appoinment'=>$a));
		return $d;
	}
	
	function getlistprivatemessage($id)
	{
		$this -> db -> select('pm.*,s.*');
		$this -> db -> from('private_message pm');
		$this->db->join('student s','pm.Id_Student = s.Id_Student');
		$this -> db -> where('pm.Id_Tutor',$id);
		//$this -> db -> where('pm.Message_Status',0);
		//$this -> db -> order_by('a.Ap_Date','desc');
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function view_private_message($a)
	{
		$d=$this->db->get_where('private_message',array('Id_Private_Message'=>$a))->row();
		return $d;
	}
	
	function update_reply_message($id,$reply_ms)
	{
		$s=1;
		$data = array(
		'Reply_Message' =>$reply_ms,
		'Message_Status' =>1
		
		);
		$this->db->where('Id_Private_Message',$id);
		$this->db->update('private_message',$data);
		return;
	}
	
	function view_tutor($a)
	{
		$d=$this->db->get_where('tutor',array('Id_Tutor'=>$a))->row();
		return $d;
	}
	
	function admin_getstudentpending()
	{
		$this -> db -> select('u.*, s.*');
		$this -> db -> from('users u');
		$this->db->join('student s','u.Id_User = s.Id_User');
		//$this -> db -> where('sc.Id_Class',$id);
		$this -> db -> where('u.Status',0);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function admin_update_status_pending($id)
	{
		$s=1;
		$data = array('Status' =>$s);
		$this->db->where('Id_User',$id);
		$this->db->update('users',$data);
		return;
	}
	function admin_update_status_reject($id)
	{
		$s=3;
		$data = array('Status' =>$s);
		$this->db->where('Id_User',$id);
		$this->db->update('users',$data);
		return;
	}
	
	function admin_getstudentapprove()
	{
		$this -> db -> select('u.*, s.*');
		$this -> db -> from('users u');
		$this->db->join('student s','u.Id_User = s.Id_User');
		//$this -> db -> where('sc.Id_Class',$id);
		$this -> db -> where('u.Status',1);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function admin_gettutorpending()
	{
		$this -> db -> select('u.*, t.*');
		$this -> db -> from('users u');
		$this->db->join('tutor t','u.Id_User = t.Id_User');
		//$this -> db -> where('sc.Id_Class',$id);
		$this -> db -> where('u.Status',0);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function admin_gettutorapprove()
	{
		$this -> db -> select('u.*, t.*');
		$this -> db -> from('users u');
		$this->db->join('tutor t','u.Id_User = t.Id_User');
		//$this -> db -> where('sc.Id_Class',$id);
		$this -> db -> where('u.Status',1);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	public function get_totallogintutor()
	{
		$this->db->select('Name as BULAN, Total_Login as JUMLAH');
		$this->db->from('tutor');
		$this->db->group_by('Name');
		$query = $this->db->get();
		
		
		

			return $query;
		
		
	
		
		
	}
}
