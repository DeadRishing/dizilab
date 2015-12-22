<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('general');
		$this->load->model('profile_model');
	}

	public function user($username = NULL)
	{
		$data = $this->_data;
		$data['user'] = $this->user->get_user($username);
        if(empty($data['user'])) redirect('404', 'refresh');
		$data['title'] = 'üye - '.$data['user']['username'].' | '.title();
		$data['activity'] = $this->general->get_Stream(5,$data['user']['usaid'],$friends=null);
		$data['last_watched'] = $this->user->last_activity($data['user']['usaid'],3,1);
		$data['izledikleri'] = $this->profile_model->izledikleri($data['user']['usaid']);
		$data['dizi_takip'] = $this->profile_model->dizi_takip($data['user']['usaid']);
		$data['uye_takip'] = $this->profile_model->uye_takip($data['user']['usaid']);
		$data['takip_edenler'] = $this->profile_model->takip_edenler($data['user']['usaid']);
		$data['yorum_say'] = $this->profile_model->yorum_say($data['user']['usaid']);
		$data['follow_series'] = $this->profile_model->getFollowSeries($data['user']['usaid'],8);
		$data['follows'] = $this->profile_model->getFollows($data['user']['usaid'],8);
		$data['followers'] = $this->profile_model->getFollowers($data['user']['usaid'],8);
		if(isset($_SESSION['login'])) $data['takipcim'] = $this->user_model->takip_ediyor_muyum($data['i']['user_id'],$data['user']['usaid']);
		$this->display(array('header','profile/user','sidebar','footer'),$data);
	}
	
	public function cast($name = NULL)
	{
        $data = $this->_data;
		$data['cast'] = $this->general->get_cast($name);
        if(empty($data['cast'])) redirect('404', 'refresh');
		$data['title'] = $data['cast']['name'].' | '.title();
		$data['description'] = $data['cast']['name'].' hakkında, '.$data['cast']['name'].' rol aldığı diziler ve daha fazlası..';
		$this->display(array('header','profile/cast','sidebar','footer'),$data);
	}
}