<?php
class Notif_model extends CI_Model
{
    function get_Notif($me,$limit)
    {
        $query = $this->db->where('user_id',$me)->order_by('date','DESC')->get('bildirimler',$limit);
        return $query->result_array();
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
    }
}