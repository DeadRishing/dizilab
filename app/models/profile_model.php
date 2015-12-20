<?php
class Profile_model extends CI_Model
{
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
	
    function izledikleri($user)
    {
        return $this->db->where('user_id',$user)->get('izlediklerim')->num_rows();
    }

    function dizi_takip($user)
    {
        return $this->db->where('user_id',$user)->get('abonelikler')->num_rows();
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
	
	function get_cast($name)
	{
		$query = $this->db
					  ->select('oyuncular.*')
					  ->from('oyuncular')
					  ->where('bermalink',$name)
					  ->get('');

		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		return FALSE;
	}
}