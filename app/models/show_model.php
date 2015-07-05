<?php
class Show_model extends CI_Model
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

	function get_last_episodet($gun=NULL)
	{
	//	if($gun == 1) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND date_added = CURDATE()');
	//	if($gun == 2) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND date_added = DATE_SUB(CURDATE(),INTERVAL 1 DAY)');
		if($gun == 7) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND YEARWEEK(date_added) = YEARWEEK(CURRENT_DATE)');
		if($gun == 14) $query = $this->db->query('SELECT diziler.title,diziler.permalink,bolumler.episode,bolumler.season,bolumler.subtitle FROM bolumler,diziler WHERE bolumler.show_id=diziler.id AND diziler.type=1 AND YEARWEEK(date_added) = YEARWEEK(CURRENT_DATE - INTERVAL 7 DAY)');

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return FALSE;
	}
/*
	function get_last_shows($last_week)
	{
		if ($last_week != true)
        {
 			$query = $this->db->select('shows.title,shows.permalink,bolumler.episode,bolumler.season,bolumler.subtitle',FALSE)
					->from('bolumler,shows')
					->where('bolumler.show_id=shows.id')
					->where('shows.type',1)
				// 	->where('checked>0')
				 	->where('date_added > DATE_SUB(curdate(), INTERVAL 1 WEEK)')
				//	->order_by('shows.title','ASC')
					->order_by('date_added','DESC')
					->get('');
		}else{
			$query = $this->db->select('shows.title,shows.permalink,bolumler.episode,bolumler.season,bolumler.subtitle',FALSE)
					->from('bolumler,shows')
					->where('bolumler.show_id=shows.id')
					->where('shows.type',1)
				// 	->where('checked>0')
				 	->where('date_added < DATE_SUB(curdate(), INTERVAL 1 WEEK)')
				// 	->order_by('shows.title','ASC')
					->order_by('date_added','DESC')
					->get('');
		}

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return FALSE;
	}
*/
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
	public function get_Categories()
	{
    	$query = $this->db->select('*')
				 ->from('tags')
				 ->order_by('tag','ASC')
				 ->get('');
    	return $query->result_array();
	}

	function sezon_sayisi($show_id)
	{
		return $this->db->distinct()->select('season')->from('bolumler')->where('show_id',$show_id)->get('')->num_rows();
	}

	function sezonlarr($show_id)
	{
		return $this->db->distinct()->select('season')->from('bolumler')->where('show_id',$show_id)->get('')->result_array();
	}

	function bolum_sayisi($show_id)
	{
		return $this->db->select('episode')->from('bolumler')->where('show_id',$show_id)->get('')->num_rows();
	}

	function takipcileri($show_id)
	{
		return $this->db->where('show_id',$show_id)->get('subscriber')->num_rows();
	}
	//enler
	function en_son_bolum($show_id)
	{
		return $this->db->select('diziler.permalink, bolumler.episode, bolumler.season, bolumler.description, bolumler.date_added')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$show_id)->order_by('bolumler.date_added','DESC')->get('', 1)->result_array();
	}

	function en_populer_bolumler($show_id)
	{
		return $this->db->select('diziler.permalink, diziler.title as showtitle, bolumler.episode, bolumler.season')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$show_id)->order_by('bolumler.liked','DESC')->get('', 5)->result_array();
	}

	function en_kotu_bolumler($show_id)
	{
		return $this->db->select('diziler.permalink, diziler.title as showtitle, bolumler.episode, bolumler.season')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.show_id',$show_id)->order_by('bolumler.unliked','DESC')->get('', 5)->result_array();
	}
	function sezonlar($show_id){
		$query = $this->db->distinct()->select('id,show_id,season,episode,date_added')
	//	$query = $this->db->select('bolumler.id AS epid,show_id,season,episode,date_added')
						  ->where('show_id',$show_id)
						  ->group_by('season')
						  ->get('bolumler');
		if($query->num_rows() > 0){
			return $query->result();
		}
		return FALSE;  
	}
	function sezon_a_ait($show_id,$season){

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
	function yapildi($user,$target,$type){
        
        $query = $this->db->where('user_id',$user)
        				->where('target_id',$target)
        				->where('type',$type)
						->get('yaptiklarim');
		if($query->num_rows() > 0){
			return TRUE;
		}
		return FALSE;  
    }
    function yapildi_sayisi($user,$type)
    {
        return $this->db->where('user_id',$user)->where('type',$type)->get('yaptiklarim')->num_rows();
    }

    function izledikleri($user)
    {
        return $this->db->where('user_id',$user)->get('izlediklerim')->num_rows();
    }

    function dizi_takip($user)
    {
        return $this->db->where('user_id',$user)->get('subscriber')->num_rows();
    }

    function uye_takip($user)
    {
        return $this->db->where('user1',$user)->get('arkadaslar')->num_rows();
    }

    function takip_edenler($user)
    {
        return $this->db->where('user2',$user)->get('arkadaslar')->num_rows();
    }

    function yorum_say($user)
    {
        return $this->db->where('user_id',$user)->get('yorumlar')->num_rows();
    }

    function yorumlarin($user,$limit)
    {
        return $this->db->where('user_id',$user)->get('yorumlar',$limit)->result_array();
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
	function yapildi_tablo($where1=NULL,$where2=NULL,$table=NULL){
        
        $query = $this->db->where($where1,$where1)->where($where2,$where2)
						->get($table);
		if($query->num_rows() > 0){
			return TRUE;
		}
		return FALSE;  
    }
    function izlendi($where1,$where2){
        
        $query = $this->db->where('user_id',$where1)->where('target_id',$where2)
						->get('izlediklerim');
		if($query->num_rows() > 0){
			return TRUE;
		}
		return FALSE;  
    }
    function last_watched($kisi){
    	$query = $this->db->select('bolumler.season,bolumler.episode,diziler.title,diziler.permalink,diziler.imdb_rating,diziler.year_started,izlediklerim.date AS tarih')
    					->from('izlediklerim,bolumler')
    					->join('diziler','bolumler.show_id = diziler.id')
    					->where('izlediklerim.user_id',$kisi)
    					->where('izlediklerim.target_id=bolumler.id')
						->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return FALSE;  
    }
    function dizi_sure($target_id){
		$query = $this->db->select('diziler.min')->from('bolumler,diziler')->where('bolumler.show_id=diziler.id')->where('bolumler.id',$target_id)->get()->row_array();
		return $query['min'];
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

    public function yorumlar($id){
    	$query = $this->db->select('yorumlar.*,uyeler.*')->from('yorumlar,uyeler')->where('target_id',$id)->where('yorumlar.user_id=uyeler.user_id')->order_by('tarih','DESC')->get();
        return $query->result_array();
    }
    public function yorum_sayisi($show_id)
	{
		return $this->db->select('target_id')->from('yorumlar')->where('target_id',$show_id)->get('')->num_rows();
	}
	public function benim_yorumum($user_id,$comment_id)
	{
		$query = $this->db->where('user_id',$user_id)->where('target_id',$comment_id)->get('yorumlar');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}
}