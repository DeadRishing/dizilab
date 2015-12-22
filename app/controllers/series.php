<?php
class Series extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->library('dizi');
        $this->load->model('series_model');
    }
    function index($permalink = NULL)
    {
        $data = $this->_data;
        if(($data['series'] = $this->dizi->get_show($permalink)) === FALSE) redirect('404', 'refresh');
        $data['title'] = $data['series']['title'].' | '.title();
        $data['season_count'] = $this->series_model->sezon_sayisi($data['series']['dizid']);
        $data['episode_count'] = $this->series_model->bolum_sayisi($data['series']['dizid']);
        $data['latest_episode'] = $this->series_model->en_son_bolum($data['series']['dizid']);
        $data['subscribers'] = $this->series_model->takipcileri($data['series']['dizid']);
        $data['good_episodes'] = $this->series_model->en_populer_bolumler($data['series']['dizid']);
        $data['bad_episodes'] = $this->series_model->en_kotu_bolumler($data['series']['dizid']);
        $data['seasons'] = $this->series_model->sezonlar($data['series']['dizid']);
        $data['ep_season1'] = $this->series_model->sezon_a_ait($data['series']['dizid'],1);
        $data['ep_season2'] = $this->series_model->sezon_a_ait($data['series']['dizid'],2);
        $data['ep_season3'] = $this->series_model->sezon_a_ait($data['series']['dizid'],3);
        $data['ep_season4'] = $this->series_model->sezon_a_ait($data['series']['dizid'],4);
        $data['ep_season5'] = $this->series_model->sezon_a_ait($data['series']['dizid'],5);
        $data['ep_season6'] = $this->series_model->sezon_a_ait($data['series']['dizid'],6);
        $data['ep_season7'] = $this->series_model->sezon_a_ait($data['series']['dizid'],7);
        $data['ep_season8'] = $this->series_model->sezon_a_ait($data['series']['dizid'],8);
        $data['ep_season9'] = $this->series_model->sezon_a_ait($data['series']['dizid'],9);
        $data['ep_season10'] = $this->series_model->sezon_a_ait($data['series']['dizid'],10);
        if(isset($_SESSION['login'])) $data['user_watched_list'] = $this->user_model->get_user_watched_list($data['i']['user_id']);
		if (!$this->agent->is_mobile()) {
			$this->display(array('header','series','sidebar','footer'),$data);
		}else{
			$this->display(array('mobile/header','mobile/series','mobile/footer'),$data);
		}
    }
}
