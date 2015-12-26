<?php
class Series_model extends CI_Model
{
	function get_show($permalink)
	{
		$query = $this->db
					  ->select('diziler.*,diziler.id AS dizid')
					  ->from('diziler')
					  ->where('type>',0)
					  ->where('permalink',$permalink)
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
	
	function get_last_episodet($gun=NULL)
	{
		if($gun == 7) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND YEARWEEK(date_added) = YEARWEEK(CURRENT_DATE)');
		if($gun == 14) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND YEARWEEK(date_added) = YEARWEEK(CURRENT_DATE - INTERVAL 7 DAY)');

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return FALSE;
	}
	public function get_Popular_series($limit)
	{
    	$query = $this->db->select('diziler.title,diziler.permalink,diziler.imdb_rating,diziler.tags')
				 ->from('diziler')
				 ->where('diziler.type>',0)
				 ->where('diziler.imdb_rating >=','8.0')
				 ->order_by('diziler.imdb_rating','DESC')
				 ->limit($limit)
				 ->get();
    	return $query->result_array();
	}
	public function get_Featured_series($limit)
	{
		
    	$query = $this->db->select('diziler.*,diziler.title,diziler.permalink')
				 ->from('diziler')
				 ->where('diziler.type>',0)
				 ->where('diziler.imdb_rating >=','7.5')
				 ->order_by('rand()')
				 ->limit($limit)
				 ->get();
    	return $query->result_array();
	}

	function ssnsthenum($show_id)
	{
		return $this->db->distinct()->select('season')->from('bolumler')->where('show_id',$show_id)->get('')->num_rows();
	}

	function _ssns($show_id)
	{
		return $this->db->distinct()->select('season')->from('bolumler')->where('show_id',$show_id)->get('')->result_array();
	}

	function sctnthenum($show_id)
	{
		return $this->db->select('episode')->from('bolumler')->where('show_id',$show_id)->get('')->num_rows();
	}

	function followers($show_id)
	{
		return $this->db->where('show_id',$show_id)->get('abonelikler')->num_rows();
	}
	//enler
	function final_section($show_id)
	{
		return $this->db->select('diziler.permalink, bolumler.episode, bolumler.season, bolumler.description, bolumler.date_added')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$show_id)->order_by('bolumler.date_added','DESC')->get('', 1)->result_array();
	}

	function most_popular_sections($show_id)
	{
		return $this->db->select('diziler.permalink, diziler.title as showtitle, bolumler.episode, bolumler.season')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$show_id)->order_by('bolumler.liked','DESC')->get('', 5)->result_array();
	}

	function worst_sections($show_id)
	{
		return $this->db->select('diziler.permalink, diziler.title as showtitle, bolumler.episode, bolumler.season')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$show_id)->order_by('bolumler.unliked','DESC')->get('', 5)->result_array();
	}
	function ssns($show_id){
		$query = $this->db->distinct()->select('id,show_id,season,episode,date_added')
		#$query = $this->db->select('bolumler.id AS epid,show_id,season,episode,date_added')
						  ->where('show_id',$show_id)
						  ->group_by('season')
						  ->get('bolumler');
		if($query->num_rows() > 0){
			return $query->result();
		}
		return FALSE;  
	}
	function of_the_season($show_id,$season){

		$query = $this->db->select('diziler.permalink,bolumler.id AS epid,bolumler.season,bolumler.episode,bolumler.description,bolumler.date_added')
						  ->from('diziler,bolumler')
						  ->where('bolumler.show_id',$show_id)
						  ->where('bolumler.season',$season)
						  ->where('bolumler.show_id=diziler.id')
						  ->group_by('bolumler.episode')
						  ->order_by('bolumler.episode','ASC')
						  ->get('');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return FALSE;  
	}
    
    function tsrs($target_id){
		$query = $this->db->select('diziler.min')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.id',$target_id)->get()->row_array();
		return $query['min'];
	}
}