<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends MY_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('show_model');
		$this->load->model('episode_model');
		$this->load->model('activity_model');
    }
    public function index()
    {
        if (!$this->input->is_ajax_request()) redirect('404', 'refresh');
		$data = $this->_data;
		$result = array();
        if(!isset($_SESSION['login'])){
            if(isset($_POST['username']) && isset($_POST['password']) && $this->input->post('type') == 'login')
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    $this->db->select('*')->from('uyeler')->where('username',$this->input->post('username'))->where('password',$this->input->post('password'));
                    $query = $this->db->get();
                    if ($query->num_rows() == 0) {
                        $result['error'] = 'Kullanıcı adınız veya şifreniz yanlış. Lütfen tekrar deneyin.';
                    }else{
                        $this->users->loginControl($this->input->post('username'),$this->input->post('password'));
                        $result['error'] = false;
                    }
                }else $result['error'] = 'Tüm alanları doldurup tekrar deneyin.';
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && $this->input->post('type') == 'register')
                if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){
                    $data=array(
                        'username'=>$this->input->post('username'),
                        'email'=>$this->input->post('email'),
                        'password'=>$this->input->post('password'),
                        'gender'=>$this->input->post('gender'),
                        'create_date'=>date('Y-m-d H:i:s')
                    );
				    if ($this->db->insert('uyeler',$data)) {
                        $result['success'] = '<div class="popup-success"><strong>Üyeliğiniz başarıyla oluşturuldu ve son 1 adım kaldı.</strong>E-posta adresinize gelen bilgiler ile hesabınızı onaylayın ve dizilab in tadını çıkarmaya başlayın!</div>';
                    }
                }else $result['error'] = 'Tüm alanları doldurup tekrar deneyin.';
		}elseif(isset($_SESSION['login'])){
            if($this->input->post('id') && $this->input->post('type')) {
                switch ($this->input->post('type')) {
                    case "watched":
                    if($this->user_model->izlendi($_SESSION['user_id'],$this->input->post('id')) === FALSE){
					   $data = array(
                           'user_id'=>$_SESSION['user_id'],
                           'target_id'=>$this->input->post('id'),
                           'min'=>$this->show_model->dizi_sure($this->input->post('id')),
                           'date'=>date("Y-m-d H:i:s")
					   );
					   $izlendi = $this->activity_model->addWatch($data);
					   if($izlendi){
						     $data = array(
                              'user_id'=>$_SESSION['user_id'],
                              'user_data'=>'{"username":"'.$_SESSION['username'].'"}',
                              'target_data'=>$this->episode_model->getEpisodeById($this->input->post('id')),
							  'target_type'=>3,
							  'date'=>date("Y-m-d H:i:s")
						  );
                            $this->activity_model->addActivity($data);	
					   }
					   $result['success'] = 'Bu bölüm izledikleriniz arasına eklendi :)';
				    }
					break;
                    case "series_like":
                    if($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),3) === TRUE){
						$result['error'] = 'Beğenmediğin bölümü birden beğenmeye mi karar verdin yani? Dostum bu yeni sen, sen değilsin..';
				    }elseif($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),2) === TRUE){
						$result['error'] = 'Bu bölümü zaten beğendin. Tamam, anladık çok beğendin.';
				    }else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>2,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$liked = $this->activity_model->addItem($data);
						$liked_ep = $this->episode_model->liked_ep($this->input->post('id'));
			
						if($liked && $liked_ep){
							$data = array(
								'user_id'	=>	$_SESSION['user_id'],
								'user_data'   =>  '{"username":"'.$_SESSION['username'].'"}',
								'target_data'	=>	$this->episode_model->getEpisodeById($this->input->post('id')),
								'target_type'	=>	2,
								'date' => date("Y-m-d H:i:s")
							);
							$this->activity_model->addActivity($data);
						}
				    }
                    break;
                    case "series_dislike":
                    if($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),2) === TRUE){
						$result['error'] = 'Bu diziyi daha önce beğendiğin için artık kararını değiştiremezsin. Beğendin dostum, kabul et artık bunu.';
				    }elseif($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),3) === TRUE){
						$result['error'] = 'Tamam dostum, anladık. Beğenmedin bu bölümü, ısrar etme artık. Dislike manyağı yaptın bölümü, yazıktır günahtır.';
				    }else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
        				    'target_id'=>$this->input->post('id'),
        				    'type'=>3,
        				    'wall'=>1,
        				    'date'=>date("Y-m-d H:i:s")
    				    );
						$this->activity_model->addItem($data);
						$this->episode_model->disliked_ep($this->input->post('id'));
				    }
                    break;
                    case "comment_like":
                    if($this->user_model->benim_yorumum($_SESSION['user_id'],$this->input->post('id')) === TRUE){
						$result['error'] = 'Kendi yorumunuzu değerlendiremezsiniz.';
					}elseif($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),6) === TRUE){
						$result['error'] = 'Bu yorumu zaten beğendin, teşekkürler ilgi ve alakan için.';
					}elseif($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),7) === TRUE){
						$result['error'] = 'Bu yorumu daha önce beğenmediğin için şimdide beğenmene biz izin vermiyoruz. Bir karar alırsın ve sonuçlarına katlanırsın bro.';
					}else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>6,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->addItem($data);
						$this->episode_model->like_comment($this->input->post('id'));
					}
                    break;
                    case "comment_dislike":
                    if($this->user_model->benim_yorumum($_SESSION['user_id'],$this->input->post('id')) === TRUE){
						$result['error'] = 'Kendi yorumunuzu değerlendiremezsiniz.';
					}elseif($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),6) === TRUE){
						$result['error'] = 'Bu yorumu daha önce beğendiğin için şimdi kararından vazcayamazsın bro.';
					}elseif($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),7) === TRUE){
						$result['error'] = 'Bu yorumu daha önce beğenmediğini dile getirmişsin, bence artık daha fazla basma. Parmaklarına yazık.';
					}else{
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>7,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->addItem($data);
						$this->episode_model->dislike_comment($this->input->post('id'));
					}
                    break;
                    case "add_to_my_watch":
                    if($this->user_model->izlendi($_SESSION['user_id'],$this->input->post('id')) === TRUE){
						$this->activity_model->delWatch($_SESSION['user_id'],$this->input->post('id'));
					}elseif($this->user_model->izlendi($_SESSION['user_id'],$this->input->post('id')) === FALSE){
						$tt=$this->show_model->dizi_sure($this->input->post('id'));
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'min'=>$tt['min'],
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->addWatch($data);
					}
                    break;
                    case "add_watch_later":
                    if($this->user_model->yapildi($_SESSION['user_id'],$this->input->post('id'),4) === FALSE){
						$data = array(
							'user_id'=>$_SESSION['user_id'],
							'target_id'=>$this->input->post('id'),
							'type'=>4,
							'wall'=>1,
							'date'=>date("Y-m-d H:i:s")
						);
						$this->activity_model->addItem($data);
						$result['success'] = 'İzleyecekleriniz arasına eklendi :)';
					}else $result['error'] = 'Bu diziyi izleyeceklerim listesine eklemişsin zaten. Kendini bu kadar fazla yorma dostum.';
                    break;
                    case "follow":
                    if($this->user_model->takip_ediyor_muyum($_SESSION['user_id'],$this->input->post('id')) === FALSE){
						$data = array(
							'user1'=>$_SESSION['user_id'],
							'user2'=>$this->input->post('id'),
							'date_added'=>date("Y-m-d H:i:s")
						);
						$likedw = $this->activity_model->followUser($data);
						if($likedw)
						{
							$data = array(
								'user_id'	=>	$_SESSION['user_id'],
								'user_data'   =>  '{"username":"'.$_SESSION['username'].'"}',
								'target_data'	=>	'{"username":"'.$this->input->post('id').'"}',
								'target_type'	=>	1,
								'date' => date("Y-m-d H:i:s")
							);
							$this->activity_model->addActivity($data);
						}
					}
                    break;
                    case "":
                    break;
                    #default: break;
                }
            }

			#if($this->input->post('id') && $this->input->post('type') == 'series_like'){}
			#if($this->input->post('id') && $this->input->post('type') == 'series_dislike'){}
			#if($this->input->post('id') && $this->input->post('type') == 'comment_like'){}
			#if($this->input->post('id') && $this->input->post('type') == 'comment_dislike'){}
			#if($this->input->post('id') && $this->input->post('type') == 'add_to_my_watch'){}
			#if($this->input->post('id') && $this->input->post('type') == 'add_watch_later'){}
			#if($this->input->post('id') && $this->input->post('type') == 'follow'){}
			
			if($this->input->post('yorum') && $this->input->post('type') == 'addcomment'){
				if(!empty($_POST['yorum'])){
				$data = array(
        			'user_id'=>$_SESSION['user_id'],
        			'target_id'=>$_SESSION['epis_id'],
        			'content'=>$this->input->post('yorum'),
        			'spoiler'=>$this->input->post('spoiler'),
        			'tarih'=>date("Y-m-d H:i:s")
    			);
    			
    			$yorum_gitti = $this->activity_model->addComment($data);
				$result['data'] = '<div class="comment" id="yorum" style="">
                                    <span style="">
                                        <img class="avatar" src="'.avatar($_SESSION['user_id']).'" alt=""/>
                                        <div class="c-text">
                                            <div class="c-top">
                                                <a style="" target="_blank" href="/uye/'.$_SESSION['username'].'" data-id="'.$_SESSION['user_id'].'" data-user="'.$_SESSION['username'].'">'.$_SESSION['username'].'</a>
                                                <span class="date"><span>•</span> şimdi</span>
                                            </div>
                                            <p style="display: block">'.$this->input->post('yorum').'</p>
                                            <div class="c-alt">
                                                <a href="javascript:;" onclick="openSubcommentForm(, this)" class="open-subcomment">Yanıtla</a> |
                                                <span class="like" onclick="comment_like()">
                                                    <abbr id="like_">0</abbr>
                                                    <span class="fa fa-thumbs-up"></span>
                                                </span>
                                                <span class="dislike" onclick="comment_dislike()">
                                                    <abbr id="dislike_">0</abbr>
                                                    <span class="fa fa-thumbs-down"></span>
                                                </span>
                                            </div>
                                        </span>
                                        <div id="comment_content_" style="position: relative">
                                            <div class="form-loader"></div>
                                            <div id="comments"></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>';
                }else $result['error'] = 'aa';
			}

			if($this->input->post('type')) {
                switch ($this->input->post('type')) {
                    case "read_notification":
					$result['text'] = $this->notif_model->bildirim_okundu($_SESSION['user_id']);
                    break;
					case "update_profile":
					$data = array(
        				'adsoyad'=>$this->input->post('uye_adsoyad'),
        				'konum'=>$this->input->post('uye_adsoyad'),
        				'info'=>$this->input->post('uye_hakkinda'),
        				'facebook'=>$this->input->post('uye_facebook_url'),
        				'twitter'=>$this->input->post('uye_twitter_url')
    				);
					$this->user_model->update($data);
					$result['success'] = 'Profil bilgileriniz güncellendi.';
					break;
					case "new_added":
					break;
					case "last_watched":
					break;
					case "followed_series":
					break;
                }
            }
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}	
}
