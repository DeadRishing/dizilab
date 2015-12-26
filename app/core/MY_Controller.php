<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->_data['i'] = $this->session->all_userdata();
        $this->load->library('usr',$this->_data['i']);
        if($this->session->userdata('login')){
            $this->_data['notif'] = $this->usr->get_Notif($this->_data['i']['user_id'],15);
            #$this->user_model->lau($this->_data['i']['user_id']);
            $this->_data['yetunread'] = $this->user_model->unread($this->_data['i']['user_id']);
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
