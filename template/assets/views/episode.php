<?php $this->load->view('header');?>
                <div class="light-off"></div>
                <style>.light-off{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.8);z-index:50;display:none;}</style>
                <div class="right-inner">

                    <div class="tv-series-head">
                        <div class="next-prev">
                            <a <?php if($prev_ep) { ?>href="/<?=$ep['permalink']?>/<?php foreach ($prev_ep as $val): ?>sezon-<?=$val['season']?>/bolum-<?=$val['episode']?><?php endforeach ?>"<?php }else{ ?>style="opacity: .4" <?php }?>>Önceki Bölüm</a>
                            <a <?php if($next_ep) { ?>href="/<?=$ep['permalink']?>/<?php foreach ($next_ep as $val): ?>sezon-<?=$val['season']?>/bolum-<?=$val['episode']?><?php endforeach ?>"<?php }else{ ?>style="opacity: .4" <?php }?>>Sonraki Bölüm</a>
                        </div>
                        <div class="mini-info">
                            <img data-load-image="<?=thumb($ep['permalink']);?>" src="<?=img_loader()?>" alt="">
                            <span class="title"><a href="/<?=$ep['permalink']?>" target="_blank"><span><?=$ep['title']?></span></a> -&nbsp;<?=$ep['season']?>. sezon <?=$ep['episode']?>. bölüm</span>
                            <span class="episode-name"><?php if($ep['description'] == ''){echo 'Episode #'.$ep['season'].'.'.$ep['episode'];}{echo $ep['description'];}?></span>
                        </div>
                        
                        <div class="clear"></div>
                        <ul class="tab-menu">
                            <li class="hovered">
                                <a href="#">Player Tercihi:<span class="fa fa-angle-down"></span></a>
                                <ul class="language" style="z-index: 56">
                                    <li class="active"><a href="?player=html5"><span class="fa fa-html5" style="position: relative; top: -1px; color: #fb804b;"></span>HTML5</a></li>
                                    <li class=""><a href="?player=flash">Flash (Bekletilebilir)</a></li></ul></li>
                                    <li class="hovered"><a href="#">Altyazı:<span class="lang-icon icon-tr"></span><span class="fa fa-angle-down"></span></a><ul class="language" style="z-index: 56"><li id="tr-lang" class="active"><a href="#"><span class="icon-tr"></span>Türkçe Altyazı</a></li>
                                    <li id="en-lang" class=""><a href="#"><span class="icon-en"></span>İngilizce Altyazı</a></li><li id="no-lang" class=""><a href="#"><span class="icon-orj"></span>Altyazısız</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:;" onclick="add_watch_later(<?=$ep['id']?>)"><span class="fa fa-history"></span> Sonra İzle</a></li>
                            <li style="position: relative; z-index: 55"><a href="#" id="light-off"><span class="fa fa-lightbulb-o"></span> Işıkları Kapat</a></li>
                        </ul>
                    </div>
                    <div class="ads_728" style="background: #191e20 url(http://dizilab.com/template/assets/images/striped.png); text-align: center; border-top: 1px solid #0a0c0d; box-shadow: 0 1px 0 0 #2f3538 inset; padding: 15px 0; position: relative; z-index: 0"></div>
                <!--
                    <div class="player" style="background: #000; height: auto; width: auto; position: relative; z-index: 55">
                         <div id="player" style="width: 878px; height: 495px; position: relative; z-index: 56"></div>
                         <script src="/template/assets/plugins/jwplayer/jwplayer.js"></script>
                    </div>  
                    <div style="margin-top: -19px; font-size: 13px; color: #bababa; line-height:20px; margin-bottom: 15px; background: #161a1c url(http://dizilab.com/template/assets/images/striped.png); border-bottom: 1px solid #2f3538; box-shadow: 0 -1px 0 0 #0a0c0d inset; padding-bottom: 15px; text-shadow: 0px 2px 0px rgba(0,0,0,1)">
                        <br><br>
                        <center>kapasitemizi ve çevirmen ekibimizi genişletmek için imkanı olan kullanıcılarımızın desteklerine ihtiyacımız var.<br><div class="donate-content"><div class="donate-btn"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6SMLN7EB5E3CL" target="_blank">bize destek olun</a></div></div></center>
                    </div>
                -->
                    <div class="player" style="background: #000; height: auto; position: relative; z-index: 55"><div id="player" style="width: 878px; height: 495px; position: relative; z-index: 56"></div><script src="http://dizilab.com/template/assets/scripts/player.js"></script></div> <div style="margin-top: -19px; font-size: 13px; color: #bababa; line-height:20px; margin-bottom: 15px; background: #161a1c url(http://dizilab.com/template/assets/images/striped.png); border-bottom: 1px solid #2f3538; box-shadow: 0 -1px 0 0 #0a0c0d inset; padding-bottom: 15px; text-shadow: 0px 2px 0px rgba(0,0,0,1)"><br><br><center>kapasitemizi ve çevirmen ekibimizi genişletmek için imkanı olan kullanıcılarımızın desteklerine ihtiyacımız var.<br><div class="donate-content"><div class="donate-btn"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6SMLN7EB5E3CL" target="_blank">bize destek olun</a></div></center></div><br>
                    <div id="continue" style="display: none; background: #6D1F1F; color: #fff; padding: 15px; margin-bottom: 20px; font-size: 14px; text-align: center; border-radius: 3px;">Panik yok! Bölüm kaldığın dakikadan otomatik devam ediyor. Neyse ki dizilab. kullanıyorsun. :)</div>
                    <div id="watched" style="display: none; background: #3c805b; color: #fff; padding: 15px; margin-bottom: 20px; font-size: 14px; text-align: center; border-radius: 3px;">Bölüm izleme listenize eklendi.</div>
                    <div class="detail-right">
                        <div class="like-box">
                        <h3 style="text-align: center; color: #8C99A0; font-size: 18px; font-weight: bold; text-align: right; padding-bottom: 10px;"><?=number_format($ep['views'],0)?> izlenme</h3>
                        <div class="like-bar">
                            <div style="width: <?=$ep['liked']?>.<?=$ep['unliked']?>%"></div>
                        </div>
                        <span class="dislike-count">
                            <span class="fa fa-thumbs-down"></span> 
                            <abbr id="series_dislike_<?=$ep['id']?>"><?=$ep['unliked']?></abbr>
                        </span>
                        <span class="like-count" style="position: relative; top: -4px;">
                            <span class="fa fa-thumbs-up"></span> 
                            <abbr id="series_like_<?=$ep['id']?>"><?=$ep['liked']?></abbr>
                        </span>
                        <div class="clear"></div>
                        <a class="like-btn" href="javascript:void(0)" onclick="series_like(<?=$ep['id']?>)"><span class="fa fa-thumbs-up"></span> BEĞEN</a>
                        <a class="like-btn dislike" href="javascript:void(0)" onclick="series_dislike(<?=$ep['id']?>)"><span class="fa fa-thumbs-down"></span></a>
                    </div>
                    <div class="clear"></div>
                    <a class="go-tv-series-profile" href="/<?=$ep['permalink']?>"><img data-load-image="<?=thumb($ep['permalink']);?>" src="<?=img_loader()?>" alt=""><span><?=$ep['title']?></span>Dizinin profil sayfasına git.</a> 
                    <div class="last-forum-topics">
                        <div style="padding: 10px; font-size: 12px; color: #999; border-bottom: 1px solid rgba(255,255,255,.1); line-height: 18px">Bu dizi için hiç forum konusu bulunmuyor.<br>Sen bir tane <a style="color: #c1ac87; text-decoration: underline" href="#">oluştur!</a></div>
                        <a class="topic-more" href="#"><span>Forumdan diğer başlıklar</span>0 başlık, 0 mesaj</a>
                    </div> 
                    <!--
                    <div class="other-episodes" data-season="<?=$ep['season']?>">
                        <h3><span class="btn"><a href="#" id="next" style="text-align: right"><span class="fa fa-caret-right" style="position: relative; right: 2px"></span></a><a href="#" id="prev"><span class="fa fa-caret-left" style="position: relative; left: 2px"></span></a><span><abbr id="current_season"><?=$ep['season']?></abbr> / <abbr id="total_season=""">2</abbr></span></span>Dizinin diğer bölümleri</h3>
                        <script>var season = [];</script>
                        <script>season[1] = 6;</script>
                        <div class="oe-scroll ps-container" style="display: none;">
                            <ul>
                                <li><a href=""><span onclick="add_to_my_watch(2790, this); return false;" class="watch"><span class="fa fa-check"></span></span><span class="title">1. Sezon 1. Bölüm</span><span class="episode-name">Pilot: Part 1.</span></a></li>
                            </ul>
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 260px; display: none;">
                                <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 290px; display: inherit;">
                                <div class="ps-scrollbar-y" style="top: 0px; height: 54px;"></div>
                            </div>
                        </div>
                        <script>season[2] = 6;</script>
                        <div class="oe-scroll ps-container" style="display: none;">
                            <ul>
                                <li><a href=""><span onclick="add_to_my_watch(2818, this); return false;" class="watch"><span class="fa fa-check"></span></span><span class="title">2. Sezon 5. Bölüm</span><span class="episode-name">...And Found.</span></a></li>
                            </ul>
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 260px; display: none;">
                                <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 290px; display: inherit;">
                                <div class="ps-scrollbar-y" style="top: 0px; height: 57px;"></div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>

                <div class="detail-left">
                    <a class="report-btn" href="http://dizilab.com/iletisim?text=Lost%205.%20sezon%207.%20b%C3%B6l%C3%BCm%20hatal%C4%B1%20olarak%20g%C3%B6z%C3%BCk%C3%BCyor.%20L%C3%BCtfen%20d%C3%BCzeltin.&type=5"><span class="fa fa-times"></span> Hata bildir!</a>
                    <div class="translators">Çevirmen: <span><?php if($ep['subtitle'] == ''){echo'*';}else{echo $ep['subtitle'];}?></span></div>
                    <div style="float: left; position: relative; top: 5px; left: 10px;">
                        <div id="fb-root" class=" fb_reset">
                            <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
                                <div>
                                    <iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="./dizi_izle_files/6Dg4oLkBbYq.html" style="border: none;"></iframe>
                                    <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="./dizi_izle_files/6Dg4oLkBbYq(1).html" style="border: none;"></iframe>
                                </div>
                            </div>
                            <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
                                <div></div>
                            </div>
                        </div>
                        <script>//(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=635052949871354&version=v2.0";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-like fb_iframe_widget" data-href="http://dizilab.com/lost/sezon-5/bolum-7" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=635052949871354&amp;container_width=0&amp;href=http%3A%2F%2Fdizilab.com%2Flost%2Fsezon-5%2Fbolum-7&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false">
                            <span style="vertical-align: bottom; width: 120px; height: 20px;">
                                <iframe name="f30a922df4" width="1000px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin" src="./dizi_izle_files/like(1).html" style="border: none; visibility: visible; width: 120px; height: 20px;" class=""></iframe>
                            </span>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- add comment -->
                    <?php if(!isset($me['login'])):?>
                    <div class="add-comment">
                        <h3>Bölüm hakkında ne dediler?</h3>
                        <div class="no-comment">Yorum yazmak için <u style="cursor: pointer" data-open="#login-form">üye girişi</u> yapmanız gerekiyor.</div>
                    </div>
                    <?php else:?>
                    <div class="add-comment">
                        <h3>Bölüm hakkında ne dediler?</h3>
                        <form action="" id="addcomment" onsubmit="return false;">
                            <div class="loader-ajax"></div>
                            <div class="formm">
                                <img data-load-image="<?=avatar($me['user_id'])?>" src="<?=img_loader()?>" alt=""/>
                                <div class="add-comment-form">
                                    <div>
                                        <textarea name="yorum_text" id="" cols="30" rows="10" placeholder="Bu bölüm hakkındaki düşüncelerinizi paylaşın."></textarea>
                                        <div class="alt">
                                            <button type="submit" onclick="addcomment()">Gönder</button>
                                            <label class="cb checkbox2"><input type="checkbox" name="spoiler" value="1" /> Bu yorum bölüm hakkında <strong>bilgi - ipucu - detay</strong> içeriyor mu?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif;?>
                    <!-- comments -->
                    <div id="comments">
                        <div id="yorumlar">
                            <style type="text/css">.popular-comments .comment:last-child{border-bottom:none!important;padding-bottom:10px!important;}</style>
                            <h3 class="title"><span class="blue"><?=$yorum_sayisi?> yorum</span></h3>
                            <?php if($yorumlar):?>
                            <div class="comments" style="position: relative">
                                <div class="form-loader"></div>
                                <?php foreach($yorumlar as $val):?>
                                <div class="comment" id="yorum<?=$val['id']?>" style="">
                                    <span style="">
                                        <img class="avatar" src="<?=avatar($val['user_id'])?>" alt=""/>
                                        <div class="c-text">
                                            <div class="c-top">
                                                <a style="" target="_blank" href="/uye/<?=$val['username']?>" data-id="<?=$val['user_id']?>" data-user="<?=$val['username']?>"><?=$val['username']?></a>
                                                <span class="date"><span>•</span> <?=ago(strtotime($val['tarih']));?></span>
                                            </div>
                                            <?php if($val['spoiler'] == 1):?>
                                            <div class="spoiler-text" style="display: none">Bu yorum bölüm hakkında spoiler içermektedir. <span>Okumak istiyorsanız tıklayın.</span></div>
                                            <?php endif;?>
                                            <p style="display: block"><?=$val['content']?></p>
                                            <div class="c-alt">
                                                <a href="javascript:;" onclick="openSubcommentForm(<?=$val['id']?>, this)" class="open-subcomment">Yanıtla</a> |
                                                <span class="like" onclick="comment_like(<?=$val['id']?>)">
                                                    <abbr id="like_<?=$val['id']?>"><?=$val['liked']?></abbr>
                                                    <span class="fa fa-thumbs-up"></span>
                                                </span>
                                                <span class="dislike" onclick="comment_dislike(<?=$val['id']?>)">
                                                    <abbr id="dislike_<?=$val['id']?>"><?=$val['unliked']?></abbr>
                                                    <span class="fa fa-thumbs-down"></span>
                                                </span>
                                            </div>
                                        </span>
                                        <div id="comment_content_<?=$val['id']?>" style="position: relative">
                                            <div class="form-loader"></div>
                                            <div id="comments<?=$val['id']?>"></div>
                                        </div>
                                        <div class="add-subcomment" id="open_add_subcomment_<?=$val['id']?>">
                                            <div class="loader-ajax"></div>
                                            <div class="formm">
                                                <img src="<?=avatar($val['user_id'])?>" alt=""/>
                                                <div class="inner">
                                                    <form id="subcomment_<?=$val['id']?>" action="" onsubmit="return false;">
                                                        <input type="hidden" name="user_id" />
                                                        <input type="hidden" name="comment_id" value="<?=$val['id']?>" />
                                                        <textarea name="comment_text" cols="30" rows="10" placeholder="Cevabınızı buraya yazın.."></textarea>
                                                        <div class="subcomment-alt">
                                                            <button type="submit" onclick="addSubComment(this, <?=$val['id']?>)">Gönder</button>
                                                            <label class="cb checkbox2"><input type="checkbox" name="spoiler" value="1" /> Bu cevap <strong>spoiler</strong> içeriyor mu?</label>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            <?php endforeach?>
                            </div>
                        <?php else:?>
                            <div class="comments">
                                <div class="no-comment">Bu dizi için <u>ilk yorumu</u> siz yazın!</div>
                            </div>
                            <style>.no-comment {font-size: 14px;color: #999;padding-bottom: 3px;}</style>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- pagination -->
                    <div class="pagination right"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
            <!-- left -->
            <div class="left">
                <!-- logo -->
                <a class="logo" href="/"><span>dizilab</span></a>
                <!-- left menu -->
                <div class="left-menu">
                    <style>.left-menu ul li {position: relative;}.left-menu .new {position: absolute;top: 5px;right: 0;background: darkred;color: #fff;font-size: 10px;line-height: 15px;padding: 0 7px;border-radius: 2px 0 0 2px;}</style>
                    <ul>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-bars"></span><span class="title">Pano</span></a></li>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-user"></span><span class="title">Profil</span></a></li>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-play-circle"></span><span class="title">Son İzlediklerim</span></a></li>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-tasks"></span><span class="title">İzleme Listesi</span></a></li>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-eye"></span><span class="title">Takip Ettiklerim</span></a></li>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-users"></span><span class="title">Sosyal Akış</span></a></li>
                        <li><a href=""><span class="fa fa-question-circle"></span><span class="title">Geri Bildirim</span></a></li>
                        <li><a href="" target="_blank"><span class="fa fa-facebook"></span><span class="title">IMDb Dizileri</span></a></li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
            var tr_altyazi = '<?=base_url();?>caption/<?=$ep['permalink']?>/tr/<?=$ep['season']?>/<?=$ep['episode']?>.vtt';
            var aboutlink = '';
            var en_altyazi = '<?=base_url();?>caption/<?=$ep['permalink']?>/en/<?=$ep['season']?>/<?=$ep['episode']?>.vtt';
            var video_360p = '';
            var is_login = false;
            <?php if(isset($me['login'])):?>
            is_login = true;
            <?php endif;?>
            var series_url = '<?=base_url();?>dizi/<?=$ep['permalink']?>';
            var episode_id = '<?=$ep['id']?>';
            var episode_season = '<?=$ep['season']?>';
            var episode_number = '<?=$ep['episode']?>';
            var alternatif = false;
        //    alternatif = true;
            var sayfa = '';
            var subtitle = [
            {
                file: '<?=base_url();?>caption/<?=$ep['permalink']?>/tr/<?=$ep['season']?>/<?=$ep['episode']?>.vtt',
                label: "Türkçe",
                kind: "captions","default": true
            },{
                file: '<?=base_url();?>caption/<?=$ep['permalink']?>/en/<?=$ep['season']?>/<?=$ep['episode']?>.vtt',
                label: "İngilizce",
                kind: "captions"
            }];
            var mobile = false;
            </script>
            <div itemscope itemtype="http://schema.org/VideoObject">
                <!-- itemprop video object -->
                <meta itemprop="name" content="<?php echo 'Game of Thrones Sızdırılmış Bölüm 5x1 İzle | '; ?>" />
                <meta itemprop="description" content="Game of Thrones 5. sezon 1. bölümü yüksek kalitede izlemeniz için hazır!" />
                <meta itemprop="duration" content="PT55M0S" />
                <link itemprop="url" href="/dizi//sezon-/bolum-">
                <link itemprop="thumbnailUrl" href="<?=cover($ep['permalink']);?>">
                <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
                    <link itemprop="url" href="<?=cover($ep['permalink']);?>">
                </span>
                <meta itemprop="contentURL" content="" />
                <meta itemprop="embedURL" content="" />
                <meta itemprop="playerType" content="Flash">
                <meta itemprop="uploadDate" content="2015-12-04T00:00:00+02:00" />
                <meta itemprop="width" content="1280" />
                <meta itemprop="height" content="720" />
                <meta itemprop="isFamilyFriendly" content="True">
                <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                    <link itemprop="url" href="<?php echo '/dizi/'; ?>">
                </span>
                <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                    <link itemprop="url" href="<?php echo '/dizi/'; ?>">
                </span>
            </div>
            <div class="clear"></div>
            
<?php $this->load->view('footer');?>
<script type="text/javascript">
function load_video(){

    jwplayer.key="6VCS9cbkPshikc+DP3Wl8cpldnahBqmHAgiu6f7qNtmdWSO6n8ZCBQ==";
    jwplayer('player').setup({
        width: '878',
        height: '495',
        abouttext: 'dizilab. video player',
        aboutlink: aboutlink,
        fallback: 'false',
        autostart: 'false',
        <?php if($ep['subtitle'] != ''): ?>
        tracks: [{ 
            file: "<?=base_url();?>caption/<?=$ep['permalink']?>/tr/<?=$ep['season']?>/<?=$ep['episode']?>.vtt", 
            label: "Türkçe",
            kind: "captions",
            "default": true 
        },{ 
            file: "<?=base_url();?>caption/<?=$ep['permalink']?>/en/<?=$ep['season']?>/<?=$ep['episode']?>.vtt", 
            kind: "captions",
            label: "İngilizce"
        }],
        <?php endif; ?>
        
    //    tracks: subtitle,
        skin: 'glow',
        captions: {
            color: '#fff',
            backgroundOpacity: 0,
            fontSize: 25,
            edgeStyle: 'uniform'
        },
        image: '<?=cover($ep['permalink']);?>',
        <?php// foreach($thisepisode['embeds'] as $id => $ep){echo $ep['embed'];}?>
        <?=$ep['embed']?>
    });
    jwplayer("player").setVolume(70);
    var jwp = jwplayer('player');
    jwp.onPlay(function() {  
        if(jwplayer.utils.isIOS()){
            var oVid = jwp.container.getElementsByTagName("video")[0];
            if(oVid){  
                var oTracks = oVid.getElementsByTagName("track");  
                if(oTracks){
                    for(var tr=oTracks.length,tre=0; tr>=tre; tr--){  
                        if(oTracks[tr]) oVid.removeChild(oTracks[tr]);
                    }  
                }  
                var oPLI = jwp.getPlaylistItem();  
                if(oPLI && oPLI["tracks"] && oPLI["tracks"].length>0){
                    for( var tr in oPLI["tracks"]){  
                        var oTR = oPLI["tracks"][tr];  
                        var oTrackTag = document.createElement("track");  
                        for(var attr in oTR){
                            var sAttr = (attr=="file"?"src":attr);
                            if(attr!="default"||(attr=="default" && oTR[attr]==true)) oTrackTag.setAttribute(sAttr,oTR[attr]); 
                        }  
                        oVid.appendChild(oTrackTag);
                    }  
                }
            }  
        }
    });
    jwp.onPlay(function() {
        if (is_login){
            if ( !localStorage.getItem('episode_' + episode_id) ){
                watched(episode_id);
            //    addWatch(episode_id,3);

            }
            localStorage.setItem('episode_' + episode_id, 1);
        }
        $('.ads_728').hide();});jwp.onBufferChange(function(){
            delete localStorage['position_' + episode_id];
        });
        seeking = true;
        jwp.onSeek(function(a){
            seeking = false;
        });
        if ( localStorage['position_' + episode_id] ){
            jwp.play();jwp.onPlay(function(){
                if ( seeking ){jwplayer().seek(localStorage['position_' + episode_id]);
                $('#continue').fadeIn(300);setTimeout(function(){
                    $('#continue').remove();
                }, 6000);
            }
        });
    }
    jwp.onTime(function(){
        localStorage.setItem('position_' + episode_id, this.getPosition());
    });jwp.onComplete(function(){
        delete localStorage['position_' + episode_id];
    });
    jwp.onSetupError(function(){
        if ( alternatif ){
            var url = $('.alternative li:eq(1) a').attr('href');
            window.location.href = url + '&sayfa=' + sayfa;
        }
    });
    jwp.onPause(function(){
        $('.ads_728').show();
    });
}
load_video();
$(function(){
    $('#light-off').on('click', function(e){
        if ( $(this).hasClass('active') ){
            $(this).html('<span class="fa fa-lightbulb-o"></span> Işıkları Kapat');
            $('.light-off').hide();
        } else 
        {
            $(this).html('<span class="fa fa-lightbulb-o"></span> Işıkları Aç');
            $('.light-off').show();
        }
        $(this).toggleClass('active');
        e.preventDefault();
    });
    function goSeek(time){
        time = time.split(':');
        var second = parseInt(time[0]) * 60;
        second = parseInt(time[1]) + second;
        delete localStorage['position_' + episode_id];
        jwplayer('player').seek(second);
        $('html, body').stop().animate({'scrollTop': $('#player').offset().top - 115}, 900, 'swing');
    };
    $(document.body).on('click', '[data-seek]', function(e){
        var time = $(this).data('seek');
        goSeek(time);e.preventDefault();
    });
    if ( location.hash ){
        var time = location.hash.replace('#', '');
        goSeek(time);
    }
    $('#tr-lang').on('click', function(e){
        $('.language li').removeClass('active').filter(this).addClass('active');
        $('.language').hide();$('.lang-icon').removeClass().addClass('lang-icon icon-tr');
        jwplayer('player').setCurrentCaptions(1);e.preventDefault();
    });
    $('#en-lang').on('click', function(e){
        $('.language li').removeClass('active').filter(this).addClass('active');
        $('.language').hide();
        if ( tr_altyazi != '' ){
            jwplayer('player').setCurrentCaptions(2);} else {
                jwplayer('player').setCurrentCaptions(1);
            }
            $('.lang-icon').removeClass().addClass('lang-icon icon-en');e.preventDefault();
        });
    $('#no-lang').on('click', function(e){
        $('.language li').removeClass('active').filter(this).addClass('active');$('.language').hide();
        $('.lang-icon').removeClass().addClass('lang-icon icon-orj');
        jwplayer('player').setCurrentCaptions(0);
        e.preventDefault();
    });
});
</script>