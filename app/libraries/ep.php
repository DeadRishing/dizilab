<?php

class Ep{
    protected $CI = null;

    function __construct()
    {
    	$this->CI = &get_instance();
    }

    public function get_episode($permalink,$season,$episode)
    {
        if ($data = $this->CI->episode_model->get_episode($permalink,$season,$episode)) {
            $det2 = $data[0];
            if(!existCookie('view_ep', $det2['id'])){
                if($this->CI->episode_model->viewed_ep($det2['id'])){
                   insertCookie('view_ep', $det2['id']); 
                }
            }
            return $det2;
        }
        return false;
    }

    function get_episodes($seasons= FALSE){

        if($seasons){
            foreach($seasons as $key => $season){
                $data[] = array();
            }
        }
        return FALSE;

    }
}


if (!defined( 'BASEPATH' )) {
    exit( 'No direct script access allowed' );
}