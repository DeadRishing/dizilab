<?php
class Episode extends MY_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('episode_model');
		$this->load->library('bolum');
    }

    function index($permalink,$season,$episode)
    {       
        $data = $this->_data;
        $data['ep'] = $this->bolum->get_episode($permalink,$season,$episode);
        if(empty($data['ep'])) redirect('404', 'refresh');
        $data['title'] = $data['ep']['title'].' '.$data['ep']['season'].'. Sezon '.$data['ep']['episode'].'. Bölüm İzle | '.title();
        $this->session->set_userdata('epis_id', $data['ep']['id']);
        $data['next_ep'] = $this->episode_model->getNextEpisode($permalink,$season,$episode);
        $data['prev_ep'] = $this->episode_model->getPrevEpisode($permalink,$season,$episode);
        $data['yorumlar'] = $this->episode_model->yorumlar($data['ep']['id']);
        $data['yorum_sayisi'] = $this->episode_model->yorum_sayisi($data['ep']['id']);
		if (!$this->agent->is_mobile()) {
			$this->display(array('header','episode','footer'),$data);
		}else{
			$this->display(array('mobile/header','mobile/episode','mobile/footer'),$data);
		}
    }
}