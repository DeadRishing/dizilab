<?php
class General_model extends CI_Model {

    public function get_News()
	{
    	$query = $this->db->order_by('date_added','DESC')->get('haberler', 3);
    	return $query->result_array();
	}
    public function get_Stream($limit=20,$user_id = null, $friends = array())
    {
		$where = array();
		if ($user_id && is_numeric($user_id)){
			if (count($friends)){
				$friends[] = $user_id;
				foreach($friends as $k => $v){
					$friends[$k] = mysql_real_escape_string($v);
				}
				$where[] = "user_id IN (".implode(",",$friends).")";
			} else {
				$where[] = "user_id='".mysql_real_escape_string($user_id)."'";
			}
		}
		
		if (count($where)){
			$where = "".implode(" AND ",$where);
		}
		
		
		$query = $this->db->select('*')
				 ->from('aktiviteler')
				 ->where($where)
				 ->order_by('id','DESC')->limit($limit)->get();
		return $query->result_array();
	}

	public function addActivity($data)
	{
		$keys = array();
		$values = array();
		foreach($data as $key => $val){
			if (is_array($val)){
				$values[] = "'".mysql_real_escape_string(json_encode($val))."'";
			} else {
				$values[] = "'".mysql_real_escape_string($val)."'";
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
			$values[] = "'".mysql_real_escape_string($val)."'";
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
			$values[] = "'".mysql_real_escape_string($val)."'";
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
			$values[] = "'".mysql_real_escape_string($val)."'";
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
			$values[] = "'".mysql_real_escape_string($val)."'";
			$keys[] = "`$key`";
		}
		$this->db->query("INSERT INTO arkadaslar (".implode(",",$keys).") VALUES (".implode(",",$values).")");
		return $this->db->insert_id();
	}

}