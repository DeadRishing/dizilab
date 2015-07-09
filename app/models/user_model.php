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

    function get_Notif($me,$limit)
    {
        $query = $this->db->where('user_id',$me)->order_by('date','DESC')->get('bildirimler',$limit);
        return $query->result_array();
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

	public function last_activity($user_id = null,$target_type = null,$limit)
	{
		$query = $this->db->select('*')
				 ->from('aktiviteler')
				 ->where('user_id',$user_id)
				 ->where('target_type',$target_type)
				 ->order_by('date','DESC')->limit($limit)->get();
		return $query->result_array();
	}

	public function getFollows($user = null,$limit = null)
    {
        $query = $this->db->select('uyeler.*')->from('arkadaslar,uyeler')->where('user2=uyeler.user_id')->where('user1',$user)->limit($limit)->get(); //SELECT user details where the username is equal to the give variable
        return $query->result_array();
    }


    public function getFollowers($user = null,$limit = null)
    {
        $query = $this->db->select('uyeler.*')->from('arkadaslar,uyeler')->where('user1=uyeler.user_id')->where('user2',$user)->limit($limit)->get(); //SELECT user details where the username is equal to the give variable
        return $query->result_array();
    }

    public function getFollowSeries($user = null,$limit = null)
    {
        $query = $this->db->select('diziler.*')->from('abonelikler,diziler')->where('show_id=diziler.id')->where('user_id',$user)->limit($limit)->get(); //SELECT user details where the username is equal to the give variable
        return $query->result_array();
    }
    public function getWatchTime($user = null)
    {
        return $this->db->query('SELECT SUM(min) as toplam FROM watched where user_id='.$user.'');
    }

    public function aktif_guncelle($u)
    {
        $this->db->where('user_id',$u)->update('uyeler',array('last_activity'=>date('Y-m-d H:i:s')));
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
    public function bildirim_okundu($u)
    {
        $this->db->where('user_id',$u)->update('bildirimler',array('read'=>1));
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
    public function okunmamis($user)
    {
        return $this->db->where('user_id',$user)->where('read',0)->get('bildirimler')->num_rows();
        /*
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
        */
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
    public function takip_ediyor_muyum($id,$hedef){
        $this->db->where('user1',$id)->where('user2',$hedef)->get('arkadaslar');
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        return FALSE;
    }
    function update($data){
        $query = $this->db->where('user_id',$_SESSION['user_id'])->update('uyeler',$data);
        if($query > 0){
            return TRUE;
        }
        return FALSE;
    }
}