<?php
class User_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function logmein($username)
    {
    	$query = $this->db->select('*')->where('username',$username)->get('uyeler');
		return $query->row();
    }

    function get_user($username)
	{
		$query = $this->db
					  ->select('uyeler.*,uyeler.user_id as usaid')
					  ->from('uyeler')
					  ->where('username',$username)
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}

    public function get_by_username($username){
        $query = $this->db->select('user_id')->where('username',$username)->get('uyeler');
        if($query->num_rows() == 1){
            return $query->row();
        }
        return FALSE;
    }
	
    public function getWatchTime($user = null)
    {
        return $this->db->query('SELECT SUM(min) as toplam FROM watched where user_id='.$user.'');
    }
	function thycomm($user,$limit)
    {
        return $this->db->where('user_id',$user)->get('yorumlar',$limit)->result_array();
    }
	function wtchdby($user)
    {
        return $this->db->where('user_id',$user)->get('izlediklerim')->num_rows();
    }

    function srsf($user)
    {
        return $this->db->where('user_id',$user)->get('abonelikler')->num_rows();
    }

    function mmbrf($user)
    {
        return $this->db->where('user1',$user)->get('arkadaslar')->num_rows();
    }

    function whof($user)
    {
        return $this->db->where('user2',$user)->get('arkadaslar')->num_rows();
    }
	
	public function getFollowSeries($user = null,$limit = null)
    {
        $query = $this->db->select('diziler.*')->from('abonelikler,diziler')->where('show_id=diziler.id')->where('user_id',$user)->limit($limit)->get(); //SELECT user details where the username is equal to the give variable
        return $query->result_array();
    }
	
	function commcount($user)
    {
        return $this->db->where('user_id',$user)->get('yorumlar')->num_rows();
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
    public function get_user_watched_list($user_id){
        $query = $this->db->select('target_id')
                     ->from('izlediklerim')
                     ->where('user_id',$user_id)
                     ->get('');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return FALSE;

    }
	
	public function my_comment($user_id,$comment_id)
	{
		$query = $this->db->where('user_id',$user_id)->where('target_id',$comment_id)->get('yorumlar');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}
    public function ifollowu($id,$hedef){
        $this->db->where('user1',$id)->where('user2',$hedef)->get('arkadaslar');
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
	
	function watched($where1,$where2){
        
        $query = $this->db->where('user_id',$where1)->where('target_id',$where2)
						->get('izlediklerim');
		if($query->num_rows() > 0){
			return TRUE;
		}
		return FALSE;  
    }
	
	function donkilot($user,$target,$type){
        
        $query = $this->db->where('user_id',$user)
        				->where('target_id',$target)
        				->where('type',$type)
						->get('yaptiklarim');
		if($query->num_rows() > 0){
			return TRUE;
		}
		return FALSE;  
    }
    function done_number($user,$type)
    {
        return $this->db->where('user_id',$user)->where('type',$type)->get('yaptiklarim')->num_rows();
    }

	function done_table($where1=NULL,$where2=NULL,$table=NULL){
        
        $query = $this->db->where($where1,$where1)->where($where2,$where2)
						->get($table);
		if($query->num_rows() > 0){
			return TRUE;
		}
		return FALSE;  
    }
	
	function get_Notif($me,$limit)
    {
        $query = $this->db->where('user_id',$me)->order_by('date','DESC')->get('bildirimler',$limit);
        return $query->result_array();
    }
	
	public function lau($u)
    {
        $this->db->where('user_id',$u)->update('uyeler',array('last_activity'=>date('Y-m-d H:i:s')));
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
    public function read($u)
    {
        $this->db->where('user_id',$u)->update('bildirimler',array('read'=>1));
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
    public function unread($user)
    {
        return $this->db->where('user_id',$user)->where('read',0)->get('bildirimler')->num_rows();
    }
	
    function update($data){
        $query = $this->db->where('user_id',$_SESSION['user_id'])->update('uyeler',$data);
        if($query > 0){
            return TRUE;
        }
        return FALSE;
    }
}