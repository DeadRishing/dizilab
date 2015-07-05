<?php
class Archive_model extends CI_Model {

    public function get_top_shows()
	{
    	$query = $this->db->order_by('imdb_rating','DESC')->get('diziler', 10);
    	return $query->result_array();
	}
}