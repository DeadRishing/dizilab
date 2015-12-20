<?php
class Stream_model extends CI_Model {
    public function get_Stream($limit=20,$user_id = null, $friends = array())
    {
		$where = array();
		if ($user_id && is_numeric($user_id)){
			if (count($friends)){
				$friends[] = $user_id;
				foreach($friends as $k => $v){
					$friends[$k] = $this->db->escape_str($v);
				}
				$where[] = "user_id IN (".implode(",",$friends).")";
			} else {
				$where[] = "user_id='".$this->db->escape_str($user_id)."'";
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
}