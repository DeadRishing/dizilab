<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forum extends MY_Controller 
{
	public function __construct()
    {
        parent::__construct();
		$this->load->library('frm');
        $this->load->model(array('forum_model','series_model'));
    }
	public function index()
	{
		$data = $this->_data;
		$data['title'] = 'Forum | '.title();
		$data['forum'] = $this->forum_model->get_all($limit = 11);
		$this->display(array('header','pages/forum','sidebar','footer'),$data);
	}
	public function forum($thix)
	{
		$data = $this->_data;
		$data['title'] = 'Forum | '.title();
		$data['forum'] = $this->frm->get_forum($thix,$limit = 11);
		$this->display(array('header','pages/forum/forum','sidebar','footer'),$data);
	}
	public function neww($thix)
	{
		$data = $this->_data;
		$data['title'] = 'Forum | '.title();
		#$data['top_shows'] = $this->archive_model->get_top_shows();
		$this->display(array('header','pages/forum/new','sidebar','footer'),$data);
	}
	public function topic($is_at,$thix,$that)
	{
		$data = $this->_data;
		$data['title'] = 'Forum | '.title();
		$data['topic'] = $this->frm->get_topic($is_at,$thix,$that,$limit = 11);
		$this->display(array('header','pages/forum/topic','sidebar','footer'),$data);
	}
}
