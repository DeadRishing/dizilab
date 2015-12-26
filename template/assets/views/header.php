<?
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?=(isset($title))?$title:title().' | yabancı dizi izle'?></title>
    <!--CloudFlare-->
	<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="dizilab.">
    <link rel="icon" href="<?=assets_url('images/favico_.png');?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?=assets_url('images/favico_.png');?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?=assets_url('images/favico_.png');?>" type="image/vnd.microsoft.icon">
    <meta name="description" content="<?=(isset($description))?$description:description()?>">
    <link rel="stylesheet" href="<?=assets_url('styles/main.css');?>?v=5.7">
    <link rel="image_src" type="image/png" href="<?=assets_url('images/default-avatar.png');?>?v=5.7">
    <script src="<?=assets_url('scripts/jquery-min.js');?>"></script>
	<meta property="og:image " content="<?=assets_url('images/default-avatar.png');?>?v=5.7">
	<meta property="og:locale" content="tr_TR">
	<meta property="og:type" content="video">
	<meta property="og:title" content="<?=(isset($title))?$title:title().' | yabancı dizi izle'?>">
	<meta property="og:description" content="<?=(isset($description))?$description:description()?>">
	<meta property="og:url" content="<?=current_url()?>">
	<link rel="canonical" href="<?=current_url()?>">
	<meta property="og:site_name" content="dizilab">
	<meta property="article:publisher" content="https://www.facebook.com/dizilab">
	<meta property="article:author" content="http://facebook.com/dizilab">
	<!--alexaVerifyID--><!--<style type="text/css">.cf-hidden {display: none;}.cf-invisible {visibility: hidden;}</style>-->
    <script>
        if (self != top) {
            top.location.replace(location.href);
        }
    </script>
    <script>
        $(document).ready(function(e) {
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
            }
            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1);
                    if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
                }
                return "";
            }
            $('#ad-close').click(function() {
                setCookie('banner', 1, 3);
                $('.banner').css('display', 'none');
                $('#ad-close').css('display', 'none');
            });
            if (getCookie('banner') < 1) {
                $('.banner').css('display', 'block');
                $('#ad-close').css('display', 'block');
            } else {
                $('.banner').css('display', 'none');
                $('#ad-close').css('display', 'none');
            }
        });
    </script><!--yandek|google-analytics|facebook|twitter-->
</head>
<body style="">
    <? if(!isset($i['login'])):?>
    <div class="popup" id="lostpassword-form">
        <div class="popup-content">
		<a class="popup-close" href="javascript:;" data-close="#lostpassword-form">
		<span class="fa fa-times"></span>
		</a>
            <div class="popup-logo">
			<span></span>
			</div>
            <div class="lostpassword-text">
                <h2>şifrenizi sıfırlayın.</h2>
                <p>dizilab.’e kayıt olurken sisteme girdiğiniz kullanıcı adınızı veya e-posta adresinizi doğru girdiğiniz takdirde size şifrenizi sıfırlamanız için bir e-posta bağlantısı göndereceğiz.</p>
            </div>
            <form action="" id="lost_password" onsubmit="return false;">
                <div class="form-loader"></div>
                <ul class="form">
                    <li>
                        <input type="text" name="email" placeholder="Kayıt olduğunuz e-posta adresini yazın.">
                    </li>
                    <li>
                        <button type="submit" onclick="lost_password(&#39;#lost_password&#39;)">ŞİFREMİ GÖNDER</button>
                    </li>
                </ul>
            </form>
            <div class="lospassword">
			<a href="javascript:;" data-close="#lostpassword-form" data-open="#login-form" style="color: #b0bbc0">« Geri git</a>
			</div>
            <div class="alt">
			şifreni hatırladın mı?&nbsp;
			<a href="javascript:;" data-close="#lostpassword-form" data-open="#login-form">hemen giriş yap.</a>
			</div>
        </div>
    </div>
    <div class="popup" id="login-form">
        <div class="popup-content">
		<a class="popup-close" href="javascript:;" data-close="#login-form">
		<span class="fa fa-times"></span>
		</a>
            <div class="popup-logo">
			<span></span>
			</div>
            <form id="login" action="" onsubmit="return false;">
                <ul class="form">
                    <li>
                        <input type="text" autocomplete="off" name="username" placeholder="Kullanıcı adı">
                    </li>
                    <li>
                        <input type="password" autocomplete="off" name="password" placeholder="Şifre">
                    </li>
                    <li>
                        <input type="hidden" name="sh" value="">
                        <button type="submit" onclick="login()">HESABA GİRİŞ YAP</button>
                    </li>
                </ul>
            </form>
            <div class="lospassword">
			<a href="javascript:;" data-close="#login-form" data-open="#lostpassword-form">şifreni mi unuttun?</a>
			</div>
            <div class="alt">
			kayıtlı değil misin?&nbsp;
			<a href="javascript:;" data-close="#login-form" data-open="#register-form">hemen kayıt ol.</a>
			</div>
        </div>
    </div>
    <div class="popup" id="register-form">
        <div class="popup-content">
		<a class="popup-close" href="javascript:;" data-close="#register-form">
		<span class="fa fa-times"></span>
		</a>
            <h3>
			<strong>dizilab.</strong> hesap oluştur.
			</h3>
            <div class="register-content">
                <form id="register" action="" onsubmit="return false;">
                    <div class="form-loader"></div>
                    <ul class="form">
                        <li>
                            <input type="text" name="username" placeholder="Kullanıcı adı">
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="Şifre">
                        </li>
                        <li>
                            <input type="text" name="email" placeholder="E-Posta">
                        </li>
                        <li class="gender">
                            <select class="select" name="gender">
                                <option value="">Cinsiyet</option>
                                <option value="1">Erkek</option>
								<option value="2">Kadın</option>
                            </select>
                        </li>
						<li>
						<script src='https://www.google.com/recaptcha/api.js'></script>
						<div class="g-recaptcha" data-sitekey="6LfppwUTAAAAAB2HDnsWy8VntAp8AkHDKqPzLoxK"></div>
						</li>
                        <!--
                        <li>
                            <script src='https://www.google.com/recaptcha/api.js'></script>
                            <div class="g-recaptcha" data-sitekey="6LfppwUTAAAAAB2HDnsWy8VntAp8AkHDKqPzLoxK">
                                <div>
                                    <div style="width: 304px; height: 78px;">
                                        <iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="" tabindex="0" vspace="0" width="304" title="recaptcha widget&#39;ı" role="presentation" height="78" id="I0_1432913026999" name="I0_1432913026999" src="./dizilab_files/saved_resource.html"></iframe>
                                    </div>
                                    <textarea dir="ltr" id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 80px; border: 1px solid #c1c1c1; margin: 0px; padding: 0px; resize: none;  display: none; "></textarea>
                                </div>
                            </div>
                        </li>-->
                        <li>
                            <input type="hidden" name="sh" value="">
                            <button type="submit" onclick="register()">HESABIMI OLUŞTUR</button>
                        </li>
                    </ul>
                </form>
                <div class="alt">zaten kayıtlı mısın?&nbsp;<a href="javascript:;" data-close="#register-form" data-open="#login-form">hemen giriş yap.</a></div>
            </div>
        </div>
    </div>
    <? else:?>
    <script>
        function bgChange() {
            var bg = localStorage.getItem("bg");
            if (bg) {
                document.body.style.background = '#000 url(' + bg + '?v=5.7) no-repeat top center fixed';
            }
        }
        bgChange();
    </script>
    <? endif;?>
    <div id="ad-close" style="display: none;">Reklamı Kapat [x]</div>
    <a class="banner" href="#" target="_blank" style="display: none; background-image: url(ads/youwin-mini.jpg);"></a>
    <style>
        .banner {
            text-indent: -9999px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            background: url(/ads/youwin-1.jpg) no-repeat top center;
        }
    </style>
    <div class="container" style="position:relative; z-index: 5;">
        <div class="header-top">
            <div class="quote"><?=rand_mesaj()?></div>
            <style>
                .quote {
                    text- shadow: 0px 2px 0px rgba(0, 0, 0, 1);
                }
            </style>
        </div>
        <div class="content">
            <div class="right">
                <div class="header">
                    <? if(!isset($i['login'])):?>
                    <ul class="register-link">
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-user"></span><strong>Giriş</strong> Yap </a></li>
                        <li><a href="javascript:;" data-open="#register-form"><span class="fa fa-plus"></span><strong>Kayıt</strong> Ol</a></li>
                    </ul>
                    <? else:?>
                    <div class="user-profile-url">
                        <a data-open="#user-link" href="<?=base_url('profil/ayarlar')?>"><img class="user-avatar-bind" data-load-image="<?=avatar($i['user_id'])?>" src="<?=img_loader()?>" alt=""><span class="fa fa-caret-down"></span></a>
                        <ul id="user-link">
                            <li><a href="<?=base_url('uye/'.$i['username'])?>">Profilim</a></li>
                            <li><a href="<?=base_url('pano')?>">Hesabım</a></li>
                            <li><a href="<?=base_url('pano/ayarlar')?>">Hesap Ayarları</a></li>
                            <li><a href="<?=base_url('cikis_yap')?>">Çıkış Yap</a></li>
                        </ul>
                    </div>
                    <ul class="user-bar">
                        <li<? if($yetunread):?> class="active"<? endif;?>><a href="#" data-open="#notif" onclick="read_notification()"><span class="fa fa-bell"></span><? if($yetunread): ?><span class="notification"><?=$yetunread?></span><? endif; ?></a>
                        <!--<li><a href="#" data-open="#notif"><span class="fa fa-bell"></span></a>-->
                            <div class="notif" id="notif" style="display: none">
                                <div class="notif-head">Bildirimler</div>
                                <div class="notif-content" scrollbar="">
                                    <div class="ps-container">
                                        <ul>
                                            <? foreach($notif as $val):?>
                                            <? if($val['target_type'] == 0):?>
                                            <li>
                                                <a href="<?=base_url($val['target_data']['perma'].'/sezon-'.$val['target_data']['season'].'/bolum-'.$val['target_data']['episode'])?>"><img src="<?=thumb($val['target_data']['perma'])?>" alt=""/><span class="notif-a"><strong><?=$val['target_data']['title']?></strong>, <span><?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölüm</span> eklendi.<span class="time"><?=ago(strtotime($val['date']));?></span></span>
                                                </a>
                                            </li>
                                            <? elseif($val['target_type'] == 1): ?>
                                            <li>
                                                <a href="http://dizilab.com/leyla-ile-mecnun/sezon-1/bolum-1"><img src="<?=thumb($val['target_data']['perma'])?>" alt=""><span class="notif-a"><strong>Leyla ile Mecnun</strong>, <span>1. sezon, 1. bölüm</span> kaynak videosu güncellendi.<span class="time"><?=ago(strtotime($val['date']));?></span></span>
                                                </a>
                                            </li>
                                            <? elseif($val['target_type'] == 2): ?>
                                            <li>
                                                <a href="/uye/selly"><img src="http://dizilab.com/upload/avatar/43722_avatar.png" alt=""><span class="notif-a"><strong>selly</strong>, şimdi seni takip ediyor!<span class="time"><?=ago(strtotime($val['date']));?></span></span>
                                                </a>
                                            </li>
                                            <? elseif($val['target_type'] == 3): ?>
                                            <li>
                                                <a href="/mr-robot?yorum=139597"><img src="http://dizilab.com/upload/avatar/64728_avatar.png?v=1433014533" alt=""/><span class="notif-a"><strong>Riddler</strong>, <span>Mr. Robot</span> için yazdığın yoruma cevap verdi. <span class="time"><?=ago(strtotime($val['date']));?></span></span>
                                                </a>
                                            </li>
                                            <? elseif($val['target_type'] == 5): ?>
                                            <li>
                                                <a href="#"><img src="http://dizilab.com/template/assets/images/block.png" alt=""/><span class="notif-a"><strong></strong> Hesabınız yasaklandı. <br/><span>Tartışma yaratacak yorumlarda bulunamazsınız. 1 hafta yorum yazmanız engellendi.<span class="time">Geçerlilik: 2015-06-06 23:50:29</span></span>
                                                </a>
                                            </li>
                                            <? endif; ?>
                                            <? endforeach ?>
                                        </ul>
                                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 0px; display: none;">
                                            <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px; height: 235px; display: none;">
                                            <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <? if($yetunread): ?>
                                <div class="notif-foot"><?=$yetunread?> adet yeni bir bildirimin var gibi.</div>
                            <? else: ?>
                                <div class="notif-foot">yeni bildirim bulunmuyor.</div>
                            <? endif; ?>
                            </div>
                        </li>
                        <li><a href="#" data-open="#change-bg"><span class="fa fa-gear"></span></a>
                            <div class="change-bg" id="change-bg">
                                <h3>Arkaplan Değiştir</h3>
                                <ul>
                                    <li>
                                        <a href="#" data-bg="http://dizilab.com/template/assets/images/body-bg.png?v=5.7" class="default"><img data-load-image="http://dizilab.com/template/assets/images/backgrounds/default.png?v=5.7" src="http://dizilab.com/template/assets/images/backgrounds/default.png" alt="">Standart</a>
                                    </li>
                                    <li>
                                        <a href="#" data-bg="http://dizilab.com/template/assets/images/backgrounds/breakingbad.png?v=5.7"><img data-load-image="http://dizilab.com/template/assets/images/backgrounds/breakingbad_mini.png?v=5.7" src="http://dizilab.com/template/assets/images/backgrounds/breakingbad_mini.png" alt="">Breaking Bad</a>
                                    </li>
                                    <li>
                                        <a href="#" data-bg="http://dizilab.com/template/assets/images/backgrounds/doctorwho.png?v=5.7"><img data-load-image="http://dizilab.com/template/assets/images/backgrounds/doctorwho_mini.png?v=5.7" src="http://dizilab.com/template/assets/images/backgrounds/doctorwho_mini.png" alt="">Doctor Who</a>
                                    </li>
                                    <li>
                                        <a href="#" data-bg="http://dizilab.com/template/assets/images/backgrounds/fringe.png?v=5.7"><img data-load-image="http://dizilab.com/template/assets/images/backgrounds/fringe_mini.png?v=5.7" src="http://dizilab.com/template/assets/images/backgrounds/fringe_mini.png" alt="">Fringe</a>
                                    </li>
                                    <li>
                                        <a href="#" data-bg="http://dizilab.com/template/assets/images/backgrounds/prisonbreak.png?v=5.7"><img data-load-image="http://dizilab.com/template/assets/images/backgrounds/prisonbreak_mini.png?v=5.7" src="http://dizilab.com/template/assets/images/backgrounds/prisonbreak_mini.png" alt="">Prison Break</a>
                                    </li>
                                    <li>
                                        <a href="#" data-bg="http://dizilab.com/template/assets/images/backgrounds/southpark.png?v=5.7"><img data-load-image="http://dizilab.com/template/assets/images/backgrounds/southpark_mini.png?v=5.7" src="http://dizilab.com/template/assets/images/backgrounds/southpark_mini.png" alt="">South park</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <? endif;?>
                    <div class="logo-text"><a href="<?=base_url()?>" style="position: relative"><span class="icon-logo"></span><span class="beta">beta (%10)</span></a></div>
                    <style>
                        .beta {
                            background: rgba(0, 0, 0, .4);
                            padding: 3px 7px;
                            position: absolute!important;
                            top: 20px!important;
                            right: -43px!important;
                            display: inline-block;
                            font-size: 12px;
                            color: #fff;
                            border-radius: 3px;
                        }
                        
                        .beta:after {
                            content: '';
                            border: 4px solid transparent;
                            border-right-color: rgba(0, 0, 0, .4);
                            position: absolute;
                            top: 4px;
                            left: -8px;
                        }
                    </style>
                    <div class="search">
                        <form action="<?=base_url('arsiv')?>" method="get">
                            <input type="hidden" name="limit" value="">
                            <input type="hidden" name="tur" value="">
                            <input type="hidden" name="orderby" value="">
                            <input type="hidden" name="ulke" value="">
                            <input type="hidden" name="order" value="">
                            <input type="hidden" name="yil" value="">
                            <input type="text" autocomplete="off" id="searchbar" name="dizi_adi" placeholder="dizilab&#39;de bir dizi ara.." value="">
                            <button type="submit"><span class="fa fa-search"></span></button>
                            <div class="search-result">
                                <h3>Eşleşen Sonuçlar</h3>
                                <div class="inner">
                                    <div style="max-height: 250px; overflow: auto; position: relative">
                                        <ul>

                                        </ul>
                                        <div class="result-error" style="font-size: 12px; display: none; color: #999; text-align: center; line-height: 18px">Aradığınız kriterlere uygun dizi arşivimizde bulunmuyor.</div>
                                    </div>
                                </div><a class="all-result" href="#">Tüm sonuçları göster</a></div>
                        </form>
                    </div>
                    <style>
                        .search-result ul li.active a {
                            background: #111!important;
                        }
                    </style>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="<?=base_url()?>">anasayfa</a></li>
                        <li><a href="<?=base_url('arsiv')?>">dizi laboratuvarı</a></li>
                        <li><a href="<?=base_url('forum')?>">forum</a></li>
                        <!--<li><a href="http://localhost/" target="_blank" rel="friend met">film izle</a></li>-->
                        <li><a href="<?=base_url('takvim')?>">takvim</a></li>
						<li style="border-right: none"><a href="<?=base_url('iletisim')?>">iletişim</a></li>
                        <li style="float: right; padding-right: 0px;">
                            <a href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fdizilab.com%2F&screen_name=dizilab&tw_p=followbutton" target="_blank"><img src="<?=assets_url('images/twitter.png')?>"></a>
                        </li>
                    </ul>
                </div>
                <!--UserVoice-->
                