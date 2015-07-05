<?php $this->load->view('header');?>
                <div class="dashboard-head">
                    <h1 class="username" style="padding-top: 17px"><?=$me['username']?> <span class="fa fa-star"></span></h1><img class="image" data-load-image="<?=avatar($me['user_id'])?>" src="<?=avatar($me['user_id'])?>" alt="">
                    <div class="alt">
                        <!--<ul>
                            <li>TAKİP ETTİĞİN DİZİLER<span>35</span></li>
                            <li>İZLEDİĞİN BÖLÜMLER<span>1,217</span></li>
                            <li>YORUMLARIN<span>34</span></li>
                            <li>TAKİP ETTİKLERİN<span>190</span></li>
                            <li>TAKİP EDENLER<span>35</span></li>
                        </ul>-->
                        <ul>
                            <li>TAKİP ETTİĞİ DİZİLER<span><?=number_format($dizi_takip)?></span></li>
                            <li>İZLEDİĞİ BÖLÜMLER<span><?=number_format($izledikleri)?></span></li>
                            <li><a href="/uye/root/yorumlar" style="color: #6a7889">YORUMLARI<span><?=number_format($yorum_say)?></span></a></li>
                            <li>TAKİP ETTİKLERİ<span><?=number_format($uye_takip)?></span></li>
                            <li>TAKİP EDENLER<span><?=number_format($takip_edenler)?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-inner">
                    <h3 class="title"><span class="big-font">dizi izleme geçmişi.</span></h3>
                    <ul class="watch-list">
                        <li class="title"><span>&nbsp;</span><span>DİZİ ADI</span><span>SON İZLENİLEN BÖLÜM</span><span>İZLENME ZAMANI</span><span>DEVAM ET</span></li>
                        <?php foreach ($last_watched as $val): ?>
                        <li><span><img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt=""></span><span><a href="/<?=$val['permalink']?>"><span class="series-name"><?=$val['title']?></span><span class="series-detail">IMDB: <?=$val['imdb_rating']?>/10 - <?=$val['year_started']?></span></a>
                            </span><span><a href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>"><span class="chapter"><?=$val['season']?>. sezon <?=$val['episode']?>. bölüm</span></a>
                            </span><span><span class="time"><?=$val['tarih']?></span></span><span><a href="/<?=$val['permalink']?>/sezon-<?=$val['season']?>/bolum-<?=$val['episode']?>?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <?php endforeach ?>
                        <!--
                        <li><span><img data-load-image="http://dizilab.com/upload/series/the-flash_thumb.png?v=5.7" src="./Son_izlediklerim_files/the-flash_thumb.png" alt=""></span><span><a href="http://dizilab.com/the-flash"><span class="series-name">The Flash</span><span class="series-detail">IMDB: 8.4/10 - 2014</span></a>
                            </span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-19"><span class="chapter">1. sezon 19. bölüm</span></a>
                            </span><span><span class="time">5 saat önce</span></span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-19?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/the-flash_thumb.png?v=5.7" src="./Son_izlediklerim_files/the-flash_thumb.png" alt=""></span><span><a href="http://dizilab.com/the-flash"><span class="series-name">The Flash</span><span class="series-detail">IMDB: 8.4/10 - 2014</span></a>
                            </span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-18"><span class="chapter">1. sezon 18. bölüm</span></a>
                            </span><span><span class="time">20 saat önce</span></span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-18?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/the-flash_thumb.png?v=5.7" src="./Son_izlediklerim_files/the-flash_thumb.png" alt=""></span><span><a href="http://dizilab.com/the-flash"><span class="series-name">The Flash</span><span class="series-detail">IMDB: 8.4/10 - 2014</span></a>
                            </span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-17"><span class="chapter">1. sezon 17. bölüm</span></a>
                            </span><span><span class="time">21 saat önce</span></span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-17?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/the-flash_thumb.png?v=5.7" src="./Son_izlediklerim_files/the-flash_thumb.png" alt=""></span><span><a href="http://dizilab.com/the-flash"><span class="series-name">The Flash</span><span class="series-detail">IMDB: 8.4/10 - 2014</span></a>
                            </span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-16"><span class="chapter">1. sezon 16. bölüm</span></a>
                            </span><span><span class="time">23 saat önce</span></span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-16?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/the-flash_thumb.png?v=5.7" src="./Son_izlediklerim_files/the-flash_thumb.png" alt=""></span><span><a href="http://dizilab.com/the-flash"><span class="series-name">The Flash</span><span class="series-detail">IMDB: 8.4/10 - 2014</span></a>
                            </span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-15"><span class="chapter">1. sezon 15. bölüm</span></a>
                            </span><span><span class="time">1 gün önce</span></span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-15?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/arrow_thumb.png?v=5.7" src="./Son_izlediklerim_files/arrow_thumb.png" alt=""></span><span><a href="http://dizilab.com/arrow"><span class="series-name">Arrow</span><span class="series-detail">IMDB: 8.2/10 - 2012</span></a>
                            </span><span><a href="http://dizilab.com/arrow/sezon-3/bolum-8"><span class="chapter">3. sezon 8. bölüm</span></a>
                            </span><span><span class="time">1 gün önce</span></span><span><a href="http://dizilab.com/arrow/sezon-3/bolum-8?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/arrow_thumb.png?v=5.7" src="./Son_izlediklerim_files/arrow_thumb.png" alt=""></span><span><a href="http://dizilab.com/arrow"><span class="series-name">Arrow</span><span class="series-detail">IMDB: 8.2/10 - 2012</span></a>
                            </span><span><a href="http://dizilab.com/arrow/sezon-3/bolum-7"><span class="chapter">3. sezon 7. bölüm</span></a>
                            </span><span><span class="time">1 gün önce</span></span><span><a href="http://dizilab.com/arrow/sezon-3/bolum-7?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/arrow_thumb.png?v=5.7" src="./Son_izlediklerim_files/arrow_thumb.png" alt=""></span><span><a href="http://dizilab.com/arrow"><span class="series-name">Arrow</span><span class="series-detail">IMDB: 8.2/10 - 2012</span></a>
                            </span><span><a href="http://dizilab.com/arrow/sezon-3/bolum-6"><span class="chapter">3. sezon 6. bölüm</span></a>
                            </span><span><span class="time">1 gün önce</span></span><span><a href="http://dizilab.com/arrow/sezon-3/bolum-6?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                        <li><span><img data-load-image="http://dizilab.com/upload/series/the-flash_thumb.png?v=5.7" src="./Son_izlediklerim_files/the-flash_thumb.png" alt=""></span><span><a href="http://dizilab.com/the-flash"><span class="series-name">The Flash</span><span class="series-detail">IMDB: 8.4/10 - 2014</span></a>
                            </span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-14"><span class="chapter">1. sezon 14. bölüm</span></a>
                            </span><span><span class="time">2 gün önce</span></span><span><a href="http://dizilab.com/the-flash/sezon-1/bolum-14?islem=sonraki_bolum">İzlemeye devam et</a></span></li>
                    -->
                    </ul>
                    <div class="pagination" style="margin-top: -15px;">
                        <ul class="pagination">
                            <li><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=1">İlk Sayfa</a></li>
                            <li class="active"><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=1">1</a></li>
                            <li class=""><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=2">2</a></li>
                            <li class=""><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=3">3</a></li>
                            <li class=""><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=4">4</a></li>
                            <li class=""><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=5">5</a></li>
                            <li class=""><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=6">6</a></li>
                            <li><a href="http://dizilab.com/pano/son-izlediklerim?sayfa=122">Son Sayfa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
<!-- left -->
<?php $this->load->view('sidebar');?>
<!-- footer -->
<?php $this->load->view('footer');?>