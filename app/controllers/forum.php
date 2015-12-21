<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forum extends MY_Controller 
{
	public function __construct()
    {
        parent::__construct();
        #$this->load->model('show_model');
    }
	public function index()
	{
		$data = $this->_data;
		$data['title'] = 'Forum | '.sitename();
		#$data['top_shows'] = $this->archive_model->get_top_shows();
		$this->display(array('header','pages/forum','sidebar','footer'),$data);
	}
}
