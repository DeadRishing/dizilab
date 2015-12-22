<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->_data['i'] = $this->session->all_userdata();
        $this->load->library('user',$this->_data['i']);
        if($this->session->userdata('login')){
            $this->_data['notif'] = $this->user->get_Notif($this->_data['i']['user_id'],15);
            $this->user_model->aktif_guncelle($this->_data['i']['user_id']);
            $this->_data['okunmamis'] = $this->user_model->okunmamis($this->_data['i']['user_id']);
        }
    }
    function display($pages=array(),$data=array())
    {
    	foreach($pages as $page)
    	{
    		$this->load->view($page,$data);
    	}
    }
}
?>
