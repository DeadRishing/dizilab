<?php
class Episode_model extends CI_Model
{
	function get_episode($permalink,$season,$episode)
	{
		$query = $this->db
					  ->select('diziler.permalink,diziler.title,bolumler.*')
					  ->from('diziler,bolumler')
					  ->where('diziler.type>',0)
					  ->where('bolumler.show_id=diziler.id')
					  ->where('diziler.permalink',$permalink)
					  ->where('bolumler.season',$season)
					  ->where('bolumler.episode',$episode)
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
	
	public function getEpisodeById($id){
    	$query = $this->db->select('bolumler.season,bolumler.episode,diziler.title,diziler.permalink AS perma')
				 ->from('bolumler,diziler')
				 ->where('bolumler.show_id=diziler.id')
				 ->where('bolumler.id',$id)->get();
    	    $ep = array();
			$ep = $query->row_array();
		//	$ep = array();
			extract($ep);
        return $ep;
    }
	
	function getNextEpisode($permalink,$season,$episode)
	{
        $query = $this->db->select('diziler.permalink,bolumler.season,bolumler.episode')
        				->from('diziler,bolumler')
        				->where('bolumler.season',$season)->where('bolumler.episode>',$episode)
        				->or_where('bolumler.season>',$season)->where('bolumler.episode<',$episode)
        				->where('bolumler.season',$season)
        				->where('diziler.permalink',$permalink)
        				->where('bolumler.show_id=diziler.id')
        				->order_by('bolumler.season','ASC')
        				->order_by('bolumler.episode','ASC')
						->get('', 1);
        if($query->num_rows() > 0){
			return $query->result_array();
		}
		return FALSE;  
    }
    function getPrevEpisode($permalink,$season,$episode){
        
        $query = $this->db->select('diziler.permalink,bolumler.season,bolumler.episode')
        				->from('diziler,bolumler')
        				->where('bolumler.season',$season)->where('bolumler.episode<',$episode)
        				->or_where('bolumler.season<',$season)->where('bolumler.episode>',$episode)
        				->where('bolumler.season',$season)
        				->where('diziler.permalink',$permalink)
        				->where('bolumler.show_id=diziler.id')
        				->order_by('bolumler.season','DESC')
        				->order_by('bolumler.episode','DESC')
						->get('', 1);
        if($query->num_rows() > 0){
			return $query->result_array();
		}
		return FALSE;  
    }
	
	function viewed_ep($ep_id){

		$this->db->set('views','views +1',FALSE)->where('id',$ep_id)->update('bolumler');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}
	
	    function liked_ep($ep_id){

		$this->db->set('liked','liked +1',FALSE)->where('id',$ep_id)->update('bolumler');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}
	function disliked_ep($ep_id){

		$this->db->set('unliked','unliked +1',FALSE)->where('id',$ep_id)->update('bolumler');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	function like_comment($id){

		$this->db->set('liked','liked +1',FALSE)->where('id',$id)->update('yorumlar');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}
	function dislike_comment($id){

		$this->db->set('unliked','unliked +1',FALSE)->where('id',$id)->update('yorumlar');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}
	
	public function comments($id){
    	$query = $this->db->select('yorumlar.*,uyeler.*')->from('yorumlar,uyeler')->where('target_id',$id)->where('yorumlar.user_id=uyeler.user_id')->order_by('tarih','DESC')->get();
        return $query->result_array();
    }
	
    public function nofcomm($show_id)
	{
		return $this->db->select('target_id')->from('yorumlar')->where('target_id',$show_id)->get('')->num_rows();
	}
}