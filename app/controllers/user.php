<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
    }
    public function index()
	{
		$data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Profil | '.title();
        $data['activity'] = $this->general->get_Stream(4,$user_id=null,$friends=null);
        $data['last_watched'] = $this->user->last_activity($data['i']['user_id'],3,5);
        $data['izledikleri'] = $this->user_model->izledikleri($data['i']['user_id']);
        $data['dizi_takip'] = $this->user_model->dizi_takip($data['i']['user_id']);
        $data['uye_takip'] = $this->user_model->uye_takip($data['i']['user_id']);
        $data['takip_edenler'] = $this->user_model->takip_edenler($data['i']['user_id']);
        $data['yorum_say'] = $this->user_model->yorum_say($data['i']['user_id']);
        $data['yorumlarin'] = $this->user_model->yorumlarin($data['i']['user_id'],4);
        $data['popular_series'] = $this->series_model->get_Popular_series($limit = 5);
		$this->display(array('header','user/profile','sidebar','footer'),$data);
	}
	public function custom()
	{
		$data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Profil | '.title();
		$this->display(array('header','user/custom','sidebar','footer'),$data);
	}
	public function last_watched()
	{
		$data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Son İzlediklerim | '.title();
        $data['izledikleri'] = $this->user_model->izledikleri($data['i']['user_id']);
        $data['dizi_takip'] = $this->user_model->dizi_takip($data['i']['user_id']);
        $data['uye_takip'] = $this->user_model->uye_takip($data['i']['user_id']);
        $data['takip_edenler'] = $this->user_model->takip_edenler($data['i']['user_id']);
        $data['yorum_say'] = $this->user_model->yorum_say($data['i']['user_id']);
        $data['last_watched'] = $this->user_model->last_watched($data['i']['user_id']);
		$this->display(array('header','user/watched','sidebar','footer'),$data);
	}
    public function social_stream()
    {
        $data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Sosyal akış | '.title();
        $data['activity'] = $this->general->get_Stream($limit=7,$data['i']['user_id'],$friends=null);
        $this->display(array('header','user/stream','sidebar','footer'),$data);
    }
    public function followed_shows()
    {
        $data = $this->_data;
        if(empty($data['i']['user_id'])) redirect('/', 'refresh');
        $data['title'] = 'Takip ettiklerim | '.title();
        $data['izledikleri'] = $this->user_model->izledikleri($data['i']['user_id']);
        $data['dizi_takip'] = $this->user_model->dizi_takip($data['i']['user_id']);
        $data['uye_takip'] = $this->user_model->uye_takip($data['i']['user_id']);
        $data['takip_edenler'] = $this->user_model->takip_edenler($data['i']['user_id']);
        $data['yorum_say'] = $this->user_model->yorum_say($data['i']['user_id']);
        $data['follow_series'] = $this->user_model->getFollowSeries($data['i']['user_id'],100);
        $this->display(array('header','user/followed','sidebar','footer'),$data);
    }
	function logout()
	{
		$redirect_url = ($this->agent->is_referral()) ? $this->agent->referrer() : base_url();
		$this->users->logout();
		redirect($redirect_url);
	}
}
