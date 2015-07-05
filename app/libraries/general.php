<?php

class General{
    protected $CI = null;
    protected $config = null;

    function __construct($config = array(  )) {
        $this->CI = &get_instance();
        if(is_array($config)) {
            $this->config = $config;
        }
    }
    function get_Stream($limit,$user_id,$friends)
    {
        $stream = $this->CI->general_model->get_Stream($limit,$user_id,$friends);
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