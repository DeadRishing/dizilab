<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Archive extends Public_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('show_model');
        $this->load->model('archive_model');
    }
	public function index()
	{
		$data = $this->_data;
		$data['title'] = 'Arşiv | '.sitename();
		#$data['categories'] = $this->show_model->get_Categories();
		$data['top_shows'] = $this->archive_model->get_top_shows();
		$this->display('archive',$data);
	}
}
