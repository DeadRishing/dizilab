                <div class="section-tab">
                    <ul>
                        <li class="active"><a href="javascript:;" onclick="new_added()"><span class="fa fa-plus-circle"></span> YENİ EKLENEN BÖLÜMLER</a></li>
                        <? if(!isset($i['login'])):?>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-play-circle"></span> EN SON İZLEDİKLERİN</a></li>
                        <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-eye"></span> TAKİP ETTİKLERİN</a></li>
                        <? else:?>
                        <li><a href="javascript:;" onclick="last_watched()"><span class="fa fa-play-circle"></span> EN SON İZLEDİKLERİN</a></li>
                        <li><a href="javascript:;" onclick="followed_series()"><span class="fa fa-eye"></span> TAKİP ETTİKLERİN</a></li>
                        <? endif;?>
                        <li><a href="javascript:;" onclick="new_series()"><span class="fa fa-star"></span> POPÜLER DİZİLER</a></li>
                    </ul>
                </div>
                <div class="tv-series-list" style="position: relative">
                    <div class="form-loader"></div>
                    <div class="tv-series-scroll ps-container" style="height: 300px;">
                        <ul>
                            <? if ($this_week_eps): ?>
                            <li class="date"><span>Bu Hafta</span></li>
                            <? foreach ($this_week_eps as $val): ?>
                            <li id="9039">
                                <a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>">
                                    <? if($val['subtitle'] == ''):?><span class="icon-orj" title="Altyazısız" style="position: absolute; top: 10px; right: 10px;"></span><? endif; ?>
                                    <img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt="">
                                    <span class="title"><?=$val['title']?></span>
                                    <span class="alt-title"><?=$val['season']?>. sezon <?=$val['episode']?>. bölüm</span>
                                </a>
                            </li>
                            <? endforeach ?>
                            <? endif; ?>
                            <? if ($last_week_eps): ?>
                            <li class="date"><span>Geçen Hafta</span></li>
                            <? foreach ($last_week_eps as $val): ?>
                            <li id="9039">
                                <a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>">
                                    <? if($val['subtitle'] == ''):?><span class="icon-orj" title="Altyazısız" style="position: absolute; top: 10px; right: 10px;"></span><? endif;?>
                                    <img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt="">
                                    <span class="title"><?=$val['title']?></span>
                                    <span class="alt-title"><?=$val['season']?>. sezon <?=$val['episode']?>. bölüm</span>
                                </a>
                            </li>
                            <? endforeach ?>
                            <? endif; ?>
                            <style type="text/css">.right .tv-series-list ul li:nth-child(1),.right .tv-series-list ul li:nth-child(2),.right .tv-series-list ul li:nth-child(3),.right .tv-series-list ul li:nth-child(4){margin-top:8px;}.tv-series-scroll .date{line-height:30px;text-indent:12px;background:#343c3f;border-radius:3px;font-size:12px;color:#999;width:822px!important;margin-right:0!important;}.right .tv-series-list ul li{margin-top:7px!important;}.right .tv-series-list ul li:first-child{margin-top:0!important;}</style>
                        </ul>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 843px; display: none;">
                            <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 450px; display: inherit;">
                            <div class="ps-scrollbar-y" style="top: 0px; height: 98px;"></div>
                        </div>
                    </div>
                </div>
                <div class="section-right" style="margin-top: 22px">
                    <div tab2="">
                        <div class="most-tab">
                            <h3>en iyiler</h3>
                            <ul tab2-list="">
                                <li class="active"><a href="#">popüler diziler</a></li>
                                <!--<li><a href="#">son 7 gün</a></li>-->
                            </ul>
                        </div>
                        <div class="most-tab-list" tab2-content="" style="display: block;">
                            <ul>
                            <? $i=0;
                            foreach ($popular_series as $row): 
                                $i++;?>
                                <li><a href="<?=base_url($row['permalink'])?>">
                                    <span class="position"><?=$i?></span>
                                    <span class="points" style="right: 15px;">puan: <span><?=$row['imdb_rating']?></span></span>
                                    <span class="info">
                                        <img data-load-image="<?=thumb($row['permalink'])?>" src="<?=img_loader()?>" alt="">
                                        <span class="title"><?=$row['title']?></span>
                                        <span class="category"><?=tag_sirala($row['tags'],$x=2)?></span>
                                    </span>
                                </a>
                                </li>
                            <? endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <!-- social timeline -->
                    <div class="social-timeline" tab2="">
                        <h3 class="title"><span class="blue">sosyal akış</span></h3>
                        <ul class="tline-tab" tab2-list="">
                            <li class="active"><a href="javascript:void(0);"> Tüm Herkes </a></li>
                            <li><a href="#"> Takip Ettiklerim </a></li>
                        </ul>
                        <ul class="timeline" tab2-content="" style="display: block;"><span class="line"></span>
                            <? foreach ($activity as $val): ?>
                            <? if($val['target_type'] == 1): ?>
                            <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type add"><span class="fa fa-user"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/uye/<?=$val['target_data']['username']?>"><strong><?=$val['target_data']['username']?></strong></a> adlı kullanıcıyı takip etti.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                            <? elseif($val['target_type'] == 2): ?>
                            <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type like"><span class="fa fa-thumbs-up"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>"><?=$val['target_data']['title']?></a> dizisinin <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümünü beğendi.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                            <? elseif($val['target_type'] == 3): ?>
                            <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>"><?=$val['target_data']['title']?></a> <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümü izliyor.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                            <? elseif($val['target_type'] == 4): ?>
                            <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type add" style="background: #5BB230"><span class="fa fa-check"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/<?=$val['target_data']['perma']?>"><strong><?=$val['target_data']['title']?></strong></a> dizisini takip etmeye başladı.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                            <? endif; ?>
                            <? endforeach ?>
                        </ul>

                        <ul class="timeline" tab2-content="" style="display: none;">
                            <div style="font-size: 12px; color: #999; line-height: 20px; text-align: center; padding: 0 30px;">Takip ettiğin kişilerin sosyal akışını görmek için hemen <a href="#" data-open="#login-form" style="color: #b9ad8c; text-decoration: underline">üye girişi</a> yapın!</div>
                        </ul>
                    </div>
                </div>
                <!-- section left -->
                <div class="section-left" style="margin-top: 22px">
                    <div class="global-box">
                        <h3 class="title"><span>haberler</span></h3>
                        <ul class="tv-series-news">
                            <? foreach ($news as $news_item): ?>
                            <li><img data-load-image="/upload/news/<?=$news_item['pic']?>.png?v=5.5" src="<?=img_loader()?>" alt="pic1">
                                <a class="title"><?=$news_item['title'] ?></a>
                                <span class="description"><?=$news_item['content'] ?></span>
                                <span class="alt"><!--<span class="fa fa-twitter"></span> 5<span class="fa fa-facebook"></span> 5-->
                                    <span class="date" style="padding-left: 0; margin-top: 5px; display: inline-block"><?=ago(strtotime($news_item['date_added']));?></span>
                                </span>
                            </li>
                            <? endforeach ?>
                        </ul>
                    </div>
                    <div class="global-box">
                        <h3 class="title"><span class="orange">bizim çok sevdiklerimiz.</span></h3>
                        <ul class="tv-series-four">
                            <? foreach ($featured_series as $row): ?>
                            <li>
                                <a href="<?=base_url($row['permalink'])?>">
                                    <img data-load-image="<?=cover($row['permalink'])?>" src="<?=img_loader()?>" alt="">
                                    <span class="title"><?=$row['title']?></span>
                                    <span class="alt-title"><?=tag_sirala($row['tags'],$x=2)?></span>
                                </a>
                            </li>
                            <? endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
                <!-- archives -->
                <div class="archives">
                    <h3 class="title"><span>laboratuvardan arşiv.</span></h3>
                    <h2> yeni diziler mi keşfetmek istiyorsun? </h2>
                    <p> günden güne yenilenen dizi arşivimize göz atabilir, yeni diziler keşfedebilirsin. </p>
                    <div class="tags">
                        <a href="/arsiv/aile">Aile</a>
                                                <a href="/arsiv/aksiyon">Aksiyon</a>
                                                <a href="/arsiv/animasyon">Animasyon</a>
                                                <a href="/arsiv/belgesel">Belgesel</a>
                                                <a href="/arsiv/bilim-kurgu">Bilim Kurgu</a>
                                                <a href="/arsiv/biyografi">Biyografi</a>
                                                <a href="/arsiv/dram">Dram</a>
                                                <a href="/arsiv/fantastik">Fantastik</a>
                                                <a href="/arsiv/genclik">Gençlik</a>
                                                <a href="/arsiv/gerilim">Gerilim</a>
                                                <a href="/arsiv/gizem">Gizem</a>
                                                <a href="/arsiv/komedi">Komedi</a>
                                                <a href="/arsiv/korku">Korku</a>
                                                <a href="/arsiv/macera">Macera</a>
                                                <a href="/arsiv/mini-dizi">Mini Dizi</a>
                                                <a href="/arsiv/muzikal">Müzikal</a>
                                                <a href="/arsiv/polisiye">Polisiye</a>
                                                <a href="/arsiv/romantik">Romantik</a>
                                                <a href="/arsiv/savas">Savaş</a>
                                                <a href="/arsiv/spor">Spor</a>
                                                <a href="/arsiv/suc">Suç</a>
                                                <a href="/arsiv/tarih">Tarih</a>
                                                <a href="/arsiv/western">Western</a>
                    </div>
                </div>
            </div>