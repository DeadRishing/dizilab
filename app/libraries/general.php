<?php

class General{
    protected $CI = null;
    protected $config = null;

    function __construct($config = array(  )) {
        $this->CI = &get_instance();
        if(is_array($config)) {
            $this->config = $config;
        }
		$this->CI->load->model('stream_model');
		$this->CI->load->model('profile_model');
    }
	public function get_cast($name)
    {
        if ($data = $this->CI->profile_model->get_cast($name)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
    function get_Stream($limit,$user_id,$friends)
    {
        $stream = $this->CI->stream_model->get_Stream($limit,$user_id,$friends);
        $array1 = array();
        foreach($stream as $val)
        {
            $val['user_data'] = json_decode($val['user_data'],true);
            $val['target_data'] = json_decode($val['target_data'],true);
            $array1[$val['id']] = $val;
        }
        return $array1;
    }
}

if (!defined( 'BASEPATH' )) {
    exit( 'No direct script access allowed' );
}