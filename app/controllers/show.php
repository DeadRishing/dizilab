<?php
class Show extends Public_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->library('shows');
        $this->load->model('show_model');
    }
    function index($permalink = NULL)
    {
        $data = $this->_data;
        if(($data['show'] = $this->shows->get_show($permalink)) === FALSE) redirect('404', 'refresh');
        $data['title'] = $data['show']['title'].' | '.sitename();
        $data['season_count'] = $this->show_model->sezon_sayisi($data['show']['dizid']);
        $data['episode_count'] = $this->show_model->bolum_sayisi($data['show']['dizid']);
        $data['latest_episode'] = $this->show_model->en_son_bolum($data['show']['dizid']);
        $data['subscribers'] = $this->show_model->takipcileri($data['show']['dizid']);
        $data['good_episodes'] = $this->show_model->en_populer_bolumler($data['show']['dizid']);
        $data['bad_episodes'] = $this->show_model->en_kotu_bolumler($data['show']['dizid']);
        $data['seasons'] = $this->show_model->sezonlar($data['show']['dizid']);
        $data['ep_season1'] = $this->show_model->sezon_a_ait($data['show']['dizid'],1);
        $data['ep_season2'] = $this->show_model->sezon_a_ait($data['show']['dizid'],2);
        $data['ep_season3'] = $this->show_model->sezon_a_ait($data['show']['dizid'],3);
        $data['ep_season4'] = $this->show_model->sezon_a_ait($data['show']['dizid'],4);
        $data['ep_season5'] = $this->show_model->sezon_a_ait($data['show']['dizid'],5);
        $data['ep_season6'] = $this->show_model->sezon_a_ait($data['show']['dizid'],6);
        $data['ep_season7'] = $this->show_model->sezon_a_ait($data['show']['dizid'],7);
        $data['ep_season8'] = $this->show_model->sezon_a_ait($data['show']['dizid'],8);
        $data['ep_season9'] = $this->show_model->sezon_a_ait($data['show']['dizid'],9);
        $data['ep_season10'] = $this->show_model->sezon_a_ait($data['show']['dizid'],10);
        if(isset($_SESSION['login'])) $data['user_watched_list'] = $this->user_model->get_user_watched_list($data['i']['user_id']);
		if (!$this->agent->is_mobile()) {
			$this->display(array('header','show','sidebar','footer'),$data);
		}else{
			$this->display(array('mobile/header','mobile/show','mobile/footer'),$data);
		}
    }
}
