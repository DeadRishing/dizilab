<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends MY_Controller 
{
	public function __construct()
    {
        parent::__construct();
		$this->load->model(array('general_model','series_model'));
    }
	public function index() {}
	public function archive()
	{
		$data = $this->_data;
		$data['title'] = 'Arşiv | '.title();
		$data['top_shows'] = $this->general_model->get_top_shows();
		$this->display(array('header','pages/archive','sidebar','footer'),$data);
	}
	public function calendar()
	{
		$data = $this->_data;
		$data['title'] = 'yabancı dizi takvimi | '.title();
		$this->display(array('header','pages/calendar','sidebar','footer'),$data);
	}
	public function contact()
	{
		$data = $this->_data;
		$data['title'] = 'İletişim | '.title();
		$this->display(array('header','pages/contact','sidebar','footer'),$data);
	}
}
