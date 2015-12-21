<?php
class General_model extends CI_Model 
{
    public function get_News()
	{
    	$query = $this->db->order_by('date_added','DESC')->get('haberler', 3);
    	return $query->result_array();
	}
	
	public function get_top_shows()
	{
    	$query = $this->db->order_by('imdb_rating','DESC')->get('diziler', 10);
    	return $query->result_array();
	}
}