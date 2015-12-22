<?php
class Forum_model extends CI_Model 
{/*
    function get_all($limit)
    {
        $query = $this->db->order_by('date','DESC')->get('forum_konular',$limit);
        return $query->result_array();
    }*/
	function get_all($limit)
	{
		$query = $this->db
					  ->select('diziler.permalink,diziler.title,forum_konular.*')
					  ->from('diziler,forum_konular')
					  ->where('forum_konular.showid=diziler.id')
					  ->order_by('date','DESC')
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
	function get_forum($thix)
    {
        $query = $this->db->order_by('date','DESC')->get('forum_konular',$limit);
        return $query->result_array();
    }
}