<?php
class Activity_model extends CI_Model 
{
	public function addActivity($data)
	{
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			if (is_array($val)){
				$values[] = "'".$this->db->escape_str(json_encode($val))."'";
			} else {
				$values[] = "'".$this->db->escape_str($val)."'";
			}
			$keys[] = "`$key`";
		}
		$this->db->query("INSERT INTO aktiviteler (".implode(",",$keys).") VALUES (".implode(",",$values).")");
		return $this->db->insert_id();
	}

	public function addItem($data)
	{
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			$values[] = "'".$this->db->escape_str($val)."'";
			$keys[] = "`$key`";
		}
		$this->db->query("INSERT INTO yaptiklarim (".implode(",",$keys).") VALUES (".implode(",",$values).")");
		return $this->db->insert_id();
	}

	public function addComment($data)
	{
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			$values[] = "'".$this->db->escape_str($val)."'";
			$keys[] = "`$key`";
		}
		$this->db->query("INSERT INTO yorumlar (".implode(",",$keys).") VALUES (".implode(",",$values).")");
		return $this->db->insert_id();
	}

	public function addWatch($data)
	{
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			$values[] = "'".$this->db->escape_str($val)."'";
			$keys[] = "`$key`";
		}
		$this->db->query("INSERT INTO izlediklerim (".implode(",",$keys).") VALUES (".implode(",",$values).")");
		return $this->db->insert_id();
	}
	public function delWatch($user_id,$target_id)
	{
		$this->db->where('user_id',$user_id)->where('target_id',$target_id)->delete('izlediklerim');
		return $this->db->insert_id();
	}
	public function followUser($data)
	{
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			$values[] = "'".$this->db->escape_str($val)."'";
			$keys[] = "`$key`";
		}
		$this->db->query("INSERT INTO arkadaslar (".implode(",",$keys).") VALUES (".implode(",",$values).")");
		return $this->db->insert_id();
	}
	
	public function last_activity($user_id = null,$target_type = null,$limit)
	{
		$query = $this->db->select('*')
				 ->from('aktiviteler')
				 ->where('user_id',$user_id)
				 ->where('target_type',$target_type)
				 ->order_by('date','DESC')->limit($limit)->get();
		return $query->result_array();
	}
}