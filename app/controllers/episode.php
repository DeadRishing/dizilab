<?php
class Episode extends Public_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('show_model');
            $this->load->model('user_model');
        }

        function index($permalink,$season,$episode)
        {       
            $data = $this->_data;
            $data['ep'] = $this->shows->get_episode($permalink,$season,$episode);
            if(empty($data['ep'])) redirect('404', 'refresh');
            $data['title'] = $data['ep']['title'].' '.$data['ep']['season'].'. Sezon '.$data['ep']['episode'].'. Bölüm İzle | '.sitename();
            $this->session->set_userdata('epis_id', $data['ep']['id']);
            $data['next_ep'] = $this->show_model->getNextEpisode($permalink,$season,$episode);
            $data['prev_ep'] = $this->show_model->getPrevEpisode($permalink,$season,$episode);
            $data['yorumlar'] = $this->show_model->yorumlar($data['ep']['id']);
            $data['yorum_sayisi'] = $this->show_model->yorum_sayisi($data['ep']['id']);
            /*
            $data['seasons'] = $this->show_model->sezonlar($data['ep']['show_id']);
            $data['episodes'] = $this->shows->get_episodet($data['ep']['show_id'],&$data['seasons'],'alp',$data['ep']['season']);
            $data['link'] = link_prev_next($data['episodes'],$data['ep']['season'],$data['ep']['episode'],$permalink);
            var_dump($data['link']);,
            */
            $this->display('episode', $data);
        }
}