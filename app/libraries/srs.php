<?php

class Srs{
    protected $CI = null;

    function __construct()
    {
    	$this->CI = &get_instance();
    }
    
    public function get_show($permalink)
    {
        if ($data = $this->CI->series_model->get_show($permalink)) {
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
    public function get_episode($permalink,$season,$episode)
    {
        if ($data = $this->CI->series_model->get_episode($permalink,$season,$episode)) {
            $det2 = $data[0];
            if(!existCookie('view_ep', $det2['id'])){
                if($this->CI->series_model->viewed_ep($det2['id'])){
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
    function get_episodet($category_id,$seasons= FALSE,$sub_category='',$sub_category_id=0){

        if($seasons){
            foreach($seasons as $key => $season){
                if($key == 0 && $sub_category == ''){
                    $season->show = TRUE;
                }
                //elseif($season->sef_uri == $sub_category){
                ///}
                //elseif($season->cat_id == $sub_category_id){
                //    $season->show = TRUE;

                //}
                else{
                    $season->show = FALSE;
                }
                $data[$season->show_id] = array();
            }
        }

        if($videos = $this->CI->series_model->sezonlarr($category_id)){

            if($seasons){
                foreach($videos as $video){

                    $data[$video['season']][] = $video;
                }
                return $data;
            }

            return $videos;
        }
        return FALSE;

    }
    /*
    function get_episodes($category_id,$seasons= FALSE,$sub_category='',$sub_category_id=0){

        if($seasons){
            foreach($seasons as $key => $season){
                if($key == 0 && $sub_category == ''){
                    $season->show = TRUE;
                }
                elseif($season->sef_uri == $sub_category){
                    $season->show = TRUE;
                }
                elseif($season->cat_id == $sub_category_id){
                    $season->show = TRUE;

                }
                else{
                    $season->show = FALSE;
                }
                $data[$season->cat_id] = array();
            }
        }

        if($videos = $this->CI->videos_model->get_all_category_videos($category_id)){

            if($seasons){
                foreach($videos as $video){

                    $data[$video['season_id']][] = $video;
                }
                return $data;
            }

            return $videos;
        }
        return FALSE;

    }   */
}


if (!defined( 'BASEPATH' )) {
    exit( 'No direct script access allowed' );
}