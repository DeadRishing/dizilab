<?php
class General_model extends CI_Model {

    public function get_News()
	{
    	$query = $this->db->order_by('date_added','DESC')->get('haberler', 3);
    	return $query->result_array();
	}
}