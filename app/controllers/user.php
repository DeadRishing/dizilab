<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class Welcome extends CI_Controller {
class User extends Public_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index()
	{
		$data = $this->_data;
        if(empty($data['me']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Profil | '.sitename();
        $data['activity'] = $this->general->get_Stream(4,$user_id=null,$friends=null);
        $data['last_watched'] = $this->users->last_activity($data['me']['user_id'],3,5);
        $data['izledikleri'] = $this->show_model->izledikleri($data['me']['user_id']);
        $data['dizi_takip'] = $this->show_model->dizi_takip($data['me']['user_id']);
        $data['uye_takip'] = $this->show_model->uye_takip($data['me']['user_id']);
        $data['takip_edenler'] = $this->show_model->takip_edenler($data['me']['user_id']);
        $data['yorum_say'] = $this->show_model->yorum_say($data['me']['user_id']);
        $data['yorumlarin'] = $this->show_model->yorumlarin($data['me']['user_id'],4);

        $data['popular_series'] = $this->show_model->get_Popular_series($limit = 5);
		$this->display('profile',$data);
	}
	public function custom()
	{
		$data = $this->_data;
        if(empty($data['me']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Profil | '.sitename();
		$this->display('custom',$data);
	}
	public function last_watched()
	{
		$data = $this->_data;
        if(empty($data['me']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Son İzlediklerim | '.sitename();
        $data['izledikleri'] = $this->show_model->izledikleri($data['me']['user_id']);
        $data['dizi_takip'] = $this->show_model->dizi_takip($data['me']['user_id']);
        $data['uye_takip'] = $this->show_model->uye_takip($data['me']['user_id']);
        $data['takip_edenler'] = $this->show_model->takip_edenler($data['me']['user_id']);
        $data['yorum_say'] = $this->show_model->yorum_say($data['me']['user_id']);
        $data['last_watched'] = $this->show_model->last_watched($data['me']['user_id']);
		$this->display('watched',$data);
	}
    public function social_stream()
    {
        $data = $this->_data;
        if(empty($data['me']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Sosyal akış | '.sitename();
        $data['activity'] = $this->general->get_Stream($limit=7,$data['me']['user_id'],$friends=null);
        $this->display('stream',$data);
    }
    public function followed_shows()
    {
        $data = $this->_data;
        if(empty($data['me']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Takip ettiklerim | '.sitename();
        $data['izledikleri'] = $this->show_model->izledikleri($data['me']['user_id']);
        $data['dizi_takip'] = $this->show_model->dizi_takip($data['me']['user_id']);
        $data['uye_takip'] = $this->show_model->uye_takip($data['me']['user_id']);
        $data['takip_edenler'] = $this->show_model->takip_edenler($data['me']['user_id']);
        $data['yorum_say'] = $this->show_model->yorum_say($data['me']['user_id']);
        $data['follow_series'] = $this->user_model->getFollowSeries($data['me']['user_id'],100);
        $this->display('followed',$data);
    }
	public function anonymous($username = NULL)
	{
		$data = $this->_data;
		$data['user'] = $this->users->get_user($username);
        if(empty($data['user'])) redirect('404', 'refresh'); //show_404();
        $data['title'] = 'üye - '.$data['user']['username'].' | '.sitename();
        $data['activity'] = $this->general->get_Stream(5,$data['user']['usaid'],$friends=null);
        $data['last_watched'] = $this->users->last_activity($data['user']['usaid'],3,1);
        $data['izledikleri'] = $this->show_model->izledikleri($data['user']['usaid']);
        $data['dizi_takip'] = $this->show_model->dizi_takip($data['user']['usaid']);
        $data['uye_takip'] = $this->show_model->uye_takip($data['user']['usaid']);
        $data['takip_edenler'] = $this->show_model->takip_edenler($data['user']['usaid']);
        $data['yorum_say'] = $this->show_model->yorum_say($data['user']['usaid']);
        $data['follow_series'] = $this->user_model->getFollowSeries($data['user']['usaid'],8);
        $data['follows'] = $this->user_model->getFollows($data['user']['usaid'],8);
        $data['followers'] = $this->user_model->getFollowers($data['user']['usaid'],8);
        #$data['takipcim'] = $this->user_model->takip_ediyor_muyum($data['me']['user_id'],$data['user']['usaid']);
        $this->display('user',$data);
	}
}
