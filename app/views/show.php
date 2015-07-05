<?php $this->load->view('header');?>
                <div class="right-inner">
                    <div class="tv-series-profile-head">
                        <div class="tv-series-image" style="position: relative">
                            <img data-load-image="<?=cover($show['permalink'])?>" src="<?=img_loader()?>" alt="">
                            <div style="position: absolute; bottom: 12px; left: 11px; width: 194px; line-height: 18px; padding: 10px; text-align: center; background: rgba(0,0,0,.8); font-weight: bold; font-size: 14px;">
                                <?if($show['type'] == 1):?>
                                <span style="color: rgb(231, 189, 98)">Devam Ediyor</span>
                                <?elseif($show['type'] == 2):?>
                                <span style="color: rgb(98, 137, 240)">Sezon Finali Yaptı</span>
                                <?elseif($show['type'] == 3):?>
                                <span style="color: rgb(92, 203, 131)">Final Yaptı</span>
                                <?elseif($show['type'] == 4):?>
                                <span style="color: rgb(219, 72, 72)">İptal Edildi!</span>
                                <?endif;?>
                            </div>
                        </div>
                        <div class="tv-series-right-content">
                            <span class="rank">
                                <span class="fa fa-star"></span>
                                <span class="rank-text"><?=$show['imdb_rating']?></span>
                            </span>
                            <h3><?=$show['title']?></h3>
                            <ul class="tv-series-detail-menu">
                                <li><span class="fa fa-clock-o"></span>Ortalama <?=$show['min']?> dakika</li>
                                <li><span class="fa fa-heart"></span><?=tag_sirala($show['tags'],$x=2)?></li>
                            </ul>
                            <div class="tv-series-story">
                                <div style="height: 218px; overflow: hidden">
                                    <div><?php echo $show['description']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tv-series-profile-bottom">
                        <ul>
                            <li><a href="#">ÜLKE<span><?=$show['country'];?></span></a></li>
                            <li><a href="#">YAPIM YILI<span><?=$show['year_started']?></span></a></li>
                            <li><a href="#">SEZON SAYISI<span><?=$season_count?></span></a></li>
                            <li><a href="#">BÖLÜM SAYISI<span><?=$episode_count?></span></a></li>
                            <li><a href="#">TAKİPÇİLERİ<span><?=$subscribers?></span></a></li>
                            <li><a href="#">IMDB PUANI<span><?=$show['imdb_rating']?> / 10</span></a></li>
                        </ul>
                    </div>
                    <div class="detail-right">
                            <?php foreach ($latest_episode as $val): ?>
                            <a class="tv-series-last-episode" href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>"><img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt=""><span class="title">Dizinin yayınlanan en son bölümü.</span><span class="alt-title"><font id="season"><?=$val['season']?>. Sezon</font>, <font id="chapter"><?=$val['episode']?>. Bölüm</font> <span id="date">(<? echo date_tr('d F Y', $val['date_added'])?>)</span></span><span class="episode-name" id="episode-name"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></span></a>
                            <?php endforeach ?>
                        <div class="last-forum-topics">
                            <h3>Dizinin forumundan son başlıklar</h3>
                            <div style="padding: 10px; font-size: 12px; color: #999; border-bottom: 1px solid rgba(255,255,255,.1); line-height: 18px">Bu dizi için hiç forum konusu bulunmuyor.<br>Sen bir tane <a style="color: #c1ac87; text-decoration: underline" href="/dizi/">oluştur!</a></div>
                            <a class="topic-more" href="/dizi/"><span>Forumdan diğer başlıklar</span>0 başlık, 0 mesaj</a>
                        </div>
                        <div tab2=""> 
                            <div class="most-tab">
                                <h3>dizinin en bölümleri.</h3>
                                <ul tab2-list="">
                                    <li class="active"><a href="#">En popüler bölümler</a></li>
                                    <li><a href="#">En kötü bölümler</a></li>
                                </ul>
                            </div>
                            <div class="most-tab-list style1" tab2-content="" style="display: block;">
                                <ul>
                                    <?php $b=1;
                                    foreach ($good_episodes as $val): ?>
                                    <li><a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>?ref=populer_tabs"><span class="fa fa-eye"></span><span class="position"><?=$b?></span><span class="info"><img data-load-image="/upload/series/<?=$val['permalink']?>_thumb.png?v=5.5" src="<?=$_SERVER["REQUEST_URI"] = "/template/assets/images/transparent.png";?>" alt=""><span class="title"><?=$val['showtitle']?></span><span class="category">Sezon <?=$val['season']?>, Bölüm <?=$val['episode']?></span></span></a></li>
                                    <?php $b++; ?>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="most-tab-list style1" tab2-content="" style="display: none;">
                                <ul>
                                    <?php $c=1;
                                    foreach ($bad_episodes as $val): ?>
                                    <li><a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>?ref=dislike_tabs"><span class="fa fa-eye"></span><span class="position"><?=$c?></span><span class="info"><img data-load-image="/upload/series/<?=$val['permalink']?>_thumb.png?v=5.5" src="<?=$_SERVER["REQUEST_URI"] = "/template/assets/images/transparent.png";?>" alt=""><span class="title"><?=$val['showtitle']?></span><span class="category">Sezon <?=$val['season']?>, Bölüm <?=$val['episode']?></span></span></a></li>
                                    <?php $c++; ?>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="detail-left">
                        <div tab="">
                            <?php if($seasons):?>
                            <div class="tv-series-seasons" tab-list="">
                                <?php $i = 0;
                                foreach($seasons as $val){?>
                                            <a href="/sezon"<?php if($i < 1) { ?> class=" active" <? } ?>><?php echo $val->season;?>. Sezon</a>
                                <?php $i++; }?>
                            </div>
                            <?php endif;?>
                            <?php if($ep_season1): ?>
                            <script>$(function(){var tabs = $('.episode-tab .tv-series-episodes');tabs.each(function(){var watchBtn = $('.watch-btn', this),items = $('ul li:not(.title)', this),watchItems = items.filter('.active');if ( items.length == watchItems.length ){watchBtn.addClass('active');}});});</script>
                            <style>.watch-btn.active span{background:#d95e40!important;color:#15191a!important;}</style>
                            <div class="episode-tab">
                                <div class="tv-series-episodes" style="border-radius: 5px; overflow: hidden; position: relative; display: block;" tab-content="">
                                    <div style="position:absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); display: none; color: #fff; text-align: center;" class="episode-loader">
                                        <h3 style="font-size: 20px; font-weight: bold; padding-top: 40px;">Birazcık bekleticem, senin için çalışıyorum şuan....</h3>
                                    </div>
                                    <a href="javascript:;" onclick="season_watch(1, &#39;elementary&#39;, this)" style="display: block; padding: 10px 16px; font-size: 13px; color: #96a0a4; background: rgba(0,0,0,.2); line-height: 21px" class="watch-btn active">"1. sezonun tüm bölümlerini izledim" olarak işaretle <span class="fa fa-check" style="color: #111; width: 21px; height: 21px; display: inline-block; border-radius: 100%; float: left; text-align: center; line-height: 21px; margin-right: 15px; margin-left: 9px; background: #111; font-size: 16px"></span></a>
                                <!--<div class="tv-series-episodes" tab-content="" style="display: block;">-->
                                    <ul>
                                        <li class="title">
                                            <span>DURUM</span>
                                            <span>SEZON</span>
                                            <span>BÖLÜM</span>
                                            <span>BÖLÜM ADI</span>
                                            <span>YAYINLANMA TARİHİ</span>
                                        </li>
                                        <?php foreach ($ep_season1 as $val): ?>
                                        <li style="" class="">
                                        <!--<li style="" class=" active">-->
                                            <span><!--
                                                    <span style="cursor: pointer" onclick="add_to_my_watch($val['epid'], this)" class="radius active">
                                                    <span class="fa fa-check"></span>
                                                    </span>-->
                                                <?php if(isset($_SESSION['login'])): ?>
                                                <?=watched_list($val['epid'],$user_watched_list);?>
                                            <?php else:?>
                                            <span style="cursor: pointer" onclick="error('Bu fonksiyonu kullanabilmek için üye girişi yapmanız gerekiyor.')" class="radius">
                                                    <span class="fa fa-check"></span>
                                                    </span>
                                                <?php endif;?>
                                            </span>
                                            <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                            <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                            <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                            <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                        </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            <!-- duzenlenecek-->
                            <?php if($ep_season2): ?>
                                <div class="tv-series-episodes" style="border-radius: 5px; overflow: hidden; position: relative; display: none;" tab-content="">
                                <!--<div class="tv-series-episodes" tab-content="" style="display: block;">-->
                                    <div style="position:absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); display: none; color: #fff; text-align: center;" class="episode-loader">
                                        <h3 style="font-size: 20px; font-weight: bold; padding-top: 40px;">Birazcık bekleticem, senin için çalışıyorum şuan....</h3>
                                    </div>
                                    <a href="javascript:;" onclick="season_watch(1, &#39;elementary&#39;, this)" style="display: block; padding: 10px 16px; font-size: 13px; color: #96a0a4; background: rgba(0,0,0,.2); line-height: 21px" class="watch-btn">"2. sezonun tüm bölümlerini izledim" olarak işaretle <span class="fa fa-check" style="color: #111; width: 21px; height: 21px; display: inline-block; border-radius: 100%; float: left; text-align: center; line-height: 21px; margin-right: 15px; margin-left: 9px; background: #111; font-size: 16px"></span></a>
                                    <ul>
                                        <li class="title">
                                            <span>DURUM</span>
                                            <span>SEZON</span>
                                            <span>BÖLÜM</span>
                                            <span>BÖLÜM ADI</span>
                                            <span>YAYINLANMA TARİHİ</span>
                                        </li>
                                        <?php foreach ($ep_season2 as $val): ?>
                                        <li>
                                            <span><!--
                                                <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                    <span class="fa fa-check"></span>
                                                </span>-->
                                                <?php if(isset($_SESSION['login'])): ?>
                                                <?=watched_list($val['epid'],$user_watched_list);?>
                                                <?php else:?>
                                                <span style="cursor: pointer" onclick="error('Bu fonksiyonu kullanabilmek için üye girişi yapmanız gerekiyor.')" class="radius">
                                                        <span class="fa fa-check"></span>
                                                        </span>
                                                    <?php endif;?>
                                            </span>
                                            <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                            <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                            <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                            <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                        </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if($ep_season3): ?>
                                <div class="tv-series-episodes" style="border-radius: 5px; overflow: hidden; position: relative; display: none;" tab-content="">
                                    <div style="position:absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); display: none; color: #fff; text-align: center;" class="episode-loader">
                                        <h3 style="font-size: 20px; font-weight: bold; padding-top: 40px;">Birazcık bekleticem, senin için çalışıyorum şuan....</h3>
                                    </div>
                                    <a href="javascript:;" onclick="season_watch(1, &#39;elementary&#39;, this)" style="display: block; padding: 10px 16px; font-size: 13px; color: #96a0a4; background: rgba(0,0,0,.2); line-height: 21px" class="watch-btn">"3. sezonun tüm bölümlerini izledim" olarak işaretle <span class="fa fa-check" style="color: #111; width: 21px; height: 21px; display: inline-block; border-radius: 100%; float: left; text-align: center; line-height: 21px; margin-right: 15px; margin-left: 9px; background: #111; font-size: 16px"></span></a>
                                    <ul>
                                        <li class="title">
                                            <span>DURUM</span>
                                            <span>SEZON</span>
                                            <span>BÖLÜM</span>
                                            <span>BÖLÜM ADI</span>
                                            <span>YAYINLANMA TARİHİ</span>
                                        </li>
                                        <?php foreach ($ep_season3 as $val): ?>
                                        <li>
                                            <span><!--
                                                <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                    <span class="fa fa-check"></span>
                                                </span>-->
                                                <?php if(isset($_SESSION['login'])): ?>
                                                    <?=watched_list($val['epid'],$user_watched_list);?>
                                                <?php else:?>
                                                <span style="cursor: pointer" onclick="error('Bu fonksiyonu kullanabilmek için üye girişi yapmanız gerekiyor.')" class="radius">
                                                        <span class="fa fa-check"></span>
                                                        </span>
                                                    <?php endif;?>
                                            </span>
                                            <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                            <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                            <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                            <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                        </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if($ep_season4): ?>
                                <div class="tv-series-episodes" style="border-radius: 5px; overflow: hidden; position: relative; display: none;" tab-content="">
                                    <div style="position:absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); display: none; color: #fff; text-align: center;" class="episode-loader">
                                        <h3 style="font-size: 20px; font-weight: bold; padding-top: 40px;">Birazcık bekleticem, senin için çalışıyorum şuan....</h3>
                                    </div>
                                    <a href="javascript:;" onclick="season_watch(1, &#39;elementary&#39;, this)" style="display: block; padding: 10px 16px; font-size: 13px; color: #96a0a4; background: rgba(0,0,0,.2); line-height: 21px" class="watch-btn">"4. sezonun tüm bölümlerini izledim" olarak işaretle <span class="fa fa-check" style="color: #111; width: 21px; height: 21px; display: inline-block; border-radius: 100%; float: left; text-align: center; line-height: 21px; margin-right: 15px; margin-left: 9px; background: #111; font-size: 16px"></span></a>
                                <ul>
                                    <li class="title">
                                        <span>DURUM</span>
                                        <span>SEZON</span>
                                        <span>BÖLÜM</span>
                                        <span>BÖLÜM ADI</span>
                                        <span>YAYINLANMA TARİHİ</span>
                                    </li>
                                    <?php foreach ($ep_season4 as $val): ?>
                                    <li>
                                        <span><!--
                                            <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                <span class="fa fa-check"></span>
                                            </span>-->
                                            <?php if(isset($_SESSION['login'])): ?>
                                                <?=watched_list($val['epid'],$user_watched_list);?>
                                            <?php else:?>
                                            <span style="cursor: pointer" onclick="error('Bu fonksiyonu kullanabilmek için üye girişi yapmanız gerekiyor.')" class="radius">
                                                    <span class="fa fa-check"></span>
                                                    </span>
                                                <?php endif;?>
                                        </span>
                                        <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                        <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                        <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                        <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if($ep_season5): ?>
                            <div class="tv-series-episodes" tab-content="" style="display: block;">
                                <ul>
                                    <li class="title">
                                        <span>DURUM</span>
                                        <span>SEZON</span>
                                        <span>BÖLÜM</span>
                                        <span>BÖLÜM ADI</span>
                                        <span>YAYINLANMA TARİHİ</span>
                                    </li>
                                    <?php foreach ($ep_season5 as $val): ?>
                                    <li>
                                        <span>
                                            <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                <span class="fa fa-check"></span>
                                            </span>
                                        </span>
                                        <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                        <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                        <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                        <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if($ep_season6): ?>
                            <div class="tv-series-episodes" tab-content="" style="display: block;">
                                <ul>
                                    <li class="title">
                                        <span>DURUM</span>
                                        <span>SEZON</span>
                                        <span>BÖLÜM</span>
                                        <span>BÖLÜM ADI</span>
                                        <span>YAYINLANMA TARİHİ</span>
                                    </li>
                                    <?php foreach ($ep_season6 as $val): ?>
                                    <li>
                                        <span>
                                            <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                <span class="fa fa-check"></span>
                                            </span>
                                        </span>
                                        <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                        <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                        <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                        <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if($ep_season7): ?>
                            <div class="tv-series-episodes" tab-content="" style="display: block;">
                                <ul>
                                    <li class="title">
                                        <span>DURUM</span>
                                        <span>SEZON</span>
                                        <span>BÖLÜM</span>
                                        <span>BÖLÜM ADI</span>
                                        <span>YAYINLANMA TARİHİ</span>
                                    </li>
                                    <?php foreach ($ep_season7 as $val): ?>
                                    <li>
                                        <span>
                                            <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                <span class="fa fa-check"></span>
                                            </span>
                                        </span>
                                        <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                        <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                        <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                        <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if($ep_season8): ?>
                            <div class="tv-series-episodes" tab-content="" style="display: block;">
                                <ul>
                                    <li class="title">
                                        <span>DURUM</span>
                                        <span>SEZON</span>
                                        <span>BÖLÜM</span>
                                        <span>BÖLÜM ADI</span>
                                        <span>YAYINLANMA TARİHİ</span>
                                    </li>
                                    <?php foreach ($ep_season8 as $val): ?>
                                    <li>
                                        <span>
                                            <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                <span class="fa fa-check"></span>
                                            </span>
                                        </span>
                                        <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                        <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                        <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                        <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if($ep_season9): ?>
                            <div class="tv-series-episodes" tab-content="" style="display: block;">
                                <ul>
                                    <li class="title">
                                        <span>DURUM</span>
                                        <span>SEZON</span>
                                        <span>BÖLÜM</span>
                                        <span>BÖLÜM ADI</span>
                                        <span>YAYINLANMA TARİHİ</span>
                                    </li>
                                    <?php foreach ($ep_season9 as $val): ?>
                                    <li>
                                        <span>
                                            <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                <span class="fa fa-check"></span>
                                            </span>
                                        </span>
                                        <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                        <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                        <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                        <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if($ep_season10): ?>
                            <div class="tv-series-episodes" tab-content="" style="display: block;">
                                <ul>
                                    <li class="title">
                                        <span>DURUM</span>
                                        <span>SEZON</span>
                                        <span>BÖLÜM</span>
                                        <span>BÖLÜM ADI</span>
                                        <span>YAYINLANMA TARİHİ</span>
                                    </li>
                                    <?php foreach ($ep_season10 as $val): ?>
                                    <li>
                                        <span>
                                            <span style="cursor: pointer" onclick="addWatch(1,3);" id="watch_button_" class="radius active">
                                                <span class="fa fa-check"></span>
                                            </span>
                                        </span>
                                        <span><a class="season" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['season']?>. Sezon</a></span>
                                        <span><a class="episode" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><?=$val['episode']?>. Bölüm</a></span>
                                        <span><a class="episode-name" href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><? if($val['description'] == ''){echo 'Episode #'.$val['season'].'.'.$val['episode'];}{echo $val['description'];}?></a></span>
                                        <span><span class="date"><?=date_tr('d F Y', $val['date_added']);?></span></span>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            </div>
                        </div> 
                        <div class="add-comment">
                            <h3>Dizi hakkında ne diyorlar?</h3>
                            <div class="no-comment" style="padding-bottom: 1px; font-size: 14px; color: #999">Yorum yazmak için <u style="cursor: pointer" data-open="#login-form">üye girişi</u> yapmanız gerekiyor.</div>
                        </div> 
                        <div id="comments">
                            <div id="yorumlar">
                                <style type="text/css">.popular-comments .comment:last-child{border-bottom:none!important;padding-bottom:10px!important;}</style>
                                <h3 class="title"><span class="blue">Diğer 0 yorum</span></h3>
                                <div class="comments">
                                    <div class="no-comment">Bu dizi için <u>ilk yorumu</u> siz yazın!</div>
                                    <style>.no-comment {font-size: 14px;color: #999;padding-bottom: 3px;}</style>
                                </div>
                            </div>
                        </div> 
                        <div class="pagination right">
                            <ul class="pagination">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
<?php $this->load->view('sidebar');?>
<?php $this->load->view('footer');?>
