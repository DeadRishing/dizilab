<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//class Welcome extends CI_Controller {
class Main extends Public_Controller 
{
	function index()
	{
		$data = $this->_data;
	//	$data['this_week_shows'] = $this->show_model->get_last_shows($last_week=false);
	//	$data['last_week_shows'] = $this->show_model->get_last_shows($last_week=true);
	//	$data['bugun_eps'] = $this->show_model->get_last_episodet(1);
	//	$data['dun_eps'] = $this->show_model->get_last_episodet(2);
		$data['this_week_eps'] = $this->show_model->get_last_episodet(7);
		$data['last_week_eps'] = $this->show_model->get_last_episodet(14);
		$data['news'] = $this->general_model->get_News();
		$data['activity'] = $this->general->get_Stream($limit=4,$user_id=null,$friends=null);
		$data['popular_series'] = $this->show_model->get_Popular_series($limit = 5);
		$data['featured_series'] = $this->show_model->get_Featured_series($limit = 4);
		#$data['categories'] = $this->show_model->get_Categories();
		$this->display('main',$data);
	}

	function logout()
	{
		$redirect_url = ($this->agent->is_referral()) ? $this->agent->referrer() : base_url();
		$this->users->logout();
		redirect($redirect_url);
	}
}
