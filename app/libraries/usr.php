<?php

class Usr{
    protected $CI = null;
    protected $config = null;

    function __construct($config = array(  )) {
        $this->CI = &get_instance(  );

        $this->config = $config;
        $this->CI->load->model('activity_model');
    }
    
    public function get_user($username)
    {
        if ($data = $this->CI->user_model->get_user($username)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }

    function loginControl($username, $password)
    {
        $user = $this->CI->user_model->logmein($username);
        $this->CI->session->set_userdata(array('login'=> 1,'user_id'=>$user->user_id,'username'=>$user->username,'birthday'=>$user->birthday,'user_info'=>$user->info,'user_mail'=>$user->email,'user_twttr'=>$user->twitter,'user_fb'=>$user->facebook));
        $cookie = array( 'name' => 'cached', 'value' => 0, 'expire' => time(  ) + 60 * 60 * 24 * 30 );
        $this->CI->input->set_cookie($cookie);
    }

    function logout() {
        $cookie = array( 'name' => 'cached', 'value' => 1, 'expire' => time(  ) + 60 * 60 * 24 * 30 );
        $this->CI->input->set_cookie( $cookie );
        $this->CI->session->unset_userdata( array( 'login' => '', 'user_id' => '', 'username' => '', 'gender' => '', 'photo' => '' ) );
        $this->CI->session->sess_destroy(  );
    }

    function get_Notif($me,$limit)
    {
        $strex = $this->CI->user_model->get_Notif($me,$limit);
        $resw = array();
            foreach($strex as $s)
            {
                $s['target_data'] = json_decode($s['target_data'],true);
                $resw[$s['id']] = $s;
            }
        //    $res[$s['id']] = $s;
        return $resw;
    }

    function last_activity($user_id,$target_type,$limit)
    {
        $strea = $this->CI->activity_model->last_activity($user_id,$target_type,$limit);
        $rest = array();
            foreach($strea as $s)
            {
                $s['user_data'] = json_decode($s['user_data'],true);
                $s['target_data'] = json_decode($s['target_data'],true);
                $rest[$s['id']] = $s;
            }
        //    $res[$s['id']] = $s;
        return $rest;
    }
}


if (!defined( 'BASEPATH' )) {
    exit( 'No direct script access allowed' );
}