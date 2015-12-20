<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('general');
		$this->load->model(array('general_model','show_model'));
	}
	
	function index()
	{
		$data = $this->_data;
		$data['this_week_eps'] = $this->show_model->get_last_episodet(7);
		$data['last_week_eps'] = $this->show_model->get_last_episodet(14);
		$data['news'] = $this->general_model->get_News();
		$data['activity'] = $this->general->get_Stream($limit=4,$user_id=null,$friends=null);
		$data['popular_series'] = $this->show_model->get_Popular_series($limit = 5);
		$data['featured_series'] = $this->show_model->get_Featured_series($limit = 4);
		if (!$this->agent->is_mobile()) {
			$this->display(array('header','home','sidebar','footer'),$data);
		}else{
			$this->display(array('mobile/header','mobile/home','mobile/footer'),$data);
		}
	}
}
