<?php

if (!defined( 'BASEPATH' )) {
	exit( 'No direct script access allowed' );
}

class Public_Controller extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->config->set_item( 'global_xss_filtering', TRUE );
        $this->config->set_item( 'compress_output', TRUE );
        $this->load->model(array('general_model','show_model','user_model'));
        $this->load->helper(array('public','date','text','typography'));

        $this->_data['me'] = $this->session->all_userdata();
        $this->load->library(array('general','shows','users'),$this->_data['me']);
        if($this->session->userdata('login')){
            $this->_data['notif'] = $this->users->get_Notif($this->_data['me']['user_id'],15);
            $this->user_model->aktif_guncelle($this->_data['me']['user_id']);
            $this->_data['okunmamis'] = $this->user_model->okunmamis($this->_data['me']['user_id']);
        }
    }

    function display($page,$data)
    {
        $this->load->view($page,$data);
    }
}

?>
