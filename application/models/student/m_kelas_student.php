<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kelas_student extends CI_Model{

	public function __construct()
	{
		//$this->load->database();
	}
	
	function getlistannouncement()
	{
		$this -> db -> select('*');
		$this -> db -> from('announcement');
		$this -> db -> order_by('Announcement_Date','desc');
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function viewannouncement($a)
	{
		$d=$this->db->get_where('announcement',array('Id_Announcement'=>$a))->row();
		return $d;
	}
	
	function getsearchclass($code_course)
	{
		$this -> db -> select('c.*,t.*');
		$this -> db -> from('class c');
		$this->db->join('tutor t','c.Id_Tutor = t.Id_Tutor');
		$this -> db -> where('c.Course_Code',$code_course);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function add_join_class($id_class,$id_tutor,$id_student)
	{
		$s=1;
		$data = array(
						'Id_Tutor' =>$id_tutor,
						'Id_Class' =>$id_class,
						'Id_Student' =>$id_student,
						'Status' => 0
		
		);
		$this->db->insert('student_class',$data);
		return;
	}
	
	function getjoinclass($id_student)
	{
		$this -> db -> select('c.*,sc.*');
		$this -> db -> from('student_class sc');
		$this->db->join('class c','sc.Id_Class = c.Id_Class');
		$this -> db -> where('sc.Id_Student',$id_student);
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
	
	function getsearchappoinment($tutor_name)
	{
		$this -> db -> select('s.*,t.*');
		$this -> db -> from('schedule s');
		$this->db->join('tutor t','s.Id_Tutor = t.Id_Tutor');
		$this -> db -> where('t.Name',$tutor_name);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function view_searchappoinment($a)
	{
		$d=$this->db->get_where('schedule',array('Id_Tutor'=>$a))->row();
		return $d;
	}
	
	function gettutorsearchappoinment()
	{
		$this -> db -> select('*');
		$this -> db -> from('tutor');
		//$this -> db -> where('Id_Class',$id);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	public function add_appoinment($data)
	{
		$this->db->insert('appoinment', $data);
		$id = $this->db->insert_id();
		
		return $id;	
	}
	
	function getappoinment_status($id)
	{
		$this -> db -> select('a.*,t.*');
		$this -> db -> from('appoinment a');
		$this->db->join('tutor t','a.Id_Tutor = t.Id_Tutor');
		$this -> db -> where('a.Id_Student',$id);
		//$this -> db -> where('a.Ap_Status',0);
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
	
	function delete_appoinment($a)
	{
		$d=$this->db->delete('appoinment',array('Id_Appoinment'=>$a));
		return $d;
	}
	
	function search_private_message($id)
	{
		$this -> db -> select('*');
		$this -> db -> from('tutor');
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
	
	public function add_private_message($data)
	{
		$this->db->insert('private_message', $data);
		$id = $this->db->insert_id();
		
		return $id;	
	}
	
	function list_coursemate($id)
	{
		$this -> db -> select('s.*,sc.*');
		$this -> db -> from('student_class sc');
		$this->db->join('student s','sc.Id_Student = s.Id_Student');
		$this -> db -> where('sc.Id_Class',$id);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function list_notes($id,$id_tutor)
	{
		$this -> db -> select('*');
		$this -> db -> from('notes');
		$this -> db -> where('Id_Class',$id);
		$this -> db -> where('Id_Tutor',$id_tutor);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
	
	function list_asignment($id,$id_tutor)
	{
		$this -> db -> select('*');
		$this -> db -> from('asignment');
		$this -> db -> where('Id_Class',$id);
		$this -> db -> where('Id_Tutor',$id_tutor);
		$query = $this -> db -> get();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
			
				$data[] = $row;
			}

			return $data;
		
		}
		
		return false;
	}
}
