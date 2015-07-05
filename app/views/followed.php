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
    <h3 class="title"><span class="big-font blue">takip ettiğin diziler.</span></h3>
    <ul class="watch-list followed-list">
        <li class="title"><span style="font-size: 12px; text-align: left; text-indent: 10px; width: 100%">DİZİ ADI</span></li>
        <?foreach ($follow_series as $val):?>
        <li style="position: relative"><span><img data-load-image="<?=thumb($val['permalink'])?>" src="<?=thumb($val['permalink'])?>" alt=""></span><span><a target="_blank" href="/<?=$val['permalink']?>"><span class="series-name"><?=$val['title']?></span><span class="series-detail">IMDB: <?=$val['imdb_rating']?>/10 - <?=$val['year_started']?></span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;12-monkeys&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <?endforeach?>
        <!--
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/arrow_thumb.png?v=5.7" src="./Takip_ettiklerim_files/arrow_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/arrow"><span class="series-name">Arrow</span><span class="series-detail">IMDB: 8.2/10 - 2012</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;arrow&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/believe_thumb.png?v=5.7" src="./Takip_ettiklerim_files/believe_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/believe"><span class="series-name">Believe</span><span class="series-detail">IMDB: 7.3/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;believe&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/better-call-saul_thumb.png?v=5.7" src="./Takip_ettiklerim_files/better-call-saul_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/better-call-saul"><span class="series-name">Better Call Saul</span><span class="series-detail">IMDB: 9.4/10 - 2015</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;better-call-saul&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/breaking-bad_thumb.png?v=5.7" src="./Takip_ettiklerim_files/breaking-bad_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/breaking-bad"><span class="series-name">Breaking Bad</span><span class="series-detail">IMDB: 9.6/10 - 2008</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;breaking-bad&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/cosmos-a-spacetime-odyssey_thumb.png?v=5.7" src="./Takip_ettiklerim_files/cosmos-a-spacetime-odyssey_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/cosmos-a-spacetime-odyssey"><span class="series-name">Cosmos: A SpaceTime Odyssey</span><span class="series-detail">IMDB: 9.4/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;cosmos-a-spacetime-odyssey&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/daredevil_thumb.png?v=5.7" src="./Takip_ettiklerim_files/daredevil_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/daredevil"><span class="series-name">Daredevil</span><span class="series-detail">IMDB: 9.2/10 - 2015</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;daredevil&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/dexter_thumb.png?v=5.7" src="./Takip_ettiklerim_files/dexter_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/dexter"><span class="series-name">Dexter</span><span class="series-detail">IMDB: 9.0/10 - 2006</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;dexter&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/fringe_thumb.png?v=5.7" src="./Takip_ettiklerim_files/fringe_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/fringe"><span class="series-name">Fringe</span><span class="series-detail">IMDB: 8.5/10 - 2008</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;fringe&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/house-m-d_thumb.png?v=5.7" src="./Takip_ettiklerim_files/house-m-d_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/house-m-d"><span class="series-name">House M.D.</span><span class="series-detail">IMDB: 8.9/10 - 2004</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;house-m-d&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/in-the-flesh_thumb.png?v=5.7" src="./Takip_ettiklerim_files/in-the-flesh_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/in-the-flesh"><span class="series-name">In the Flesh</span><span class="series-detail">IMDB: 8.1/10 - 2013</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;in-the-flesh&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/izombie_thumb.png?v=5.7" src="./Takip_ettiklerim_files/izombie_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/izombie"><span class="series-name">iZombie</span><span class="series-detail">IMDB: 8.1/10 - 2015</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;izombie&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/leyla-ile-mecnun_thumb.png?v=5.7" src="./Takip_ettiklerim_files/leyla-ile-mecnun_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/leyla-ile-mecnun"><span class="series-name">Leyla ile Mecnun</span><span class="series-detail">IMDB: 9.2/10 - 2011</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;leyla-ile-mecnun&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/lost_thumb.png?v=5.7" src="./Takip_ettiklerim_files/lost_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/lost"><span class="series-name">Lost</span><span class="series-detail">IMDB: 8.6/10 - 2004</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;lost&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/once-upon-a-time_thumb.png?v=5.7" src="./Takip_ettiklerim_files/once-upon-a-time_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/once-upon-a-time"><span class="series-name">Once Upon a Time</span><span class="series-detail">IMDB: 8.1/10 - 2011</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;once-upon-a-time&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/perception_thumb.png?v=5.7" src="./Takip_ettiklerim_files/perception_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/perception"><span class="series-name">Perception</span><span class="series-detail">IMDB: 7.4/10 - 2012</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;perception&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/person-of-interest_thumb.png?v=5.7" src="./Takip_ettiklerim_files/person-of-interest_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/person-of-interest"><span class="series-name">Person of Interest</span><span class="series-detail">IMDB: 8.4/10 - 2011</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;person-of-interest&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/revolution_thumb.png?v=5.7" src="./Takip_ettiklerim_files/revolution_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/revolution"><span class="series-name">Revolution</span><span class="series-detail">IMDB: 6.7/10 - 2012</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;revolution&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/supernatural_thumb.png?v=5.7" src="./Takip_ettiklerim_files/supernatural_thumb(1).png" alt=""></span><span><a target="_blank" href="http://dizilab.com/supernatural"><span class="series-name">Supernatural</span><span class="series-detail">IMDB: 8.7/10 - 2005</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;supernatural&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-100_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-100_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-100"><span class="series-name">The 100</span><span class="series-detail">IMDB: 7.5/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-100&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-flash_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-flash_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-flash"><span class="series-name">The Flash</span><span class="series-detail">IMDB: 8.4/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-flash&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-following_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-following_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-following"><span class="series-name">The Following</span><span class="series-detail">IMDB: 7.6/10 - 2013</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-following&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-last-man-on-earth_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-last-man-on-earth_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-last-man-on-earth"><span class="series-name">The Last Man on Earth</span><span class="series-detail">IMDB: 8.5/10 - 2015</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-last-man-on-earth&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-last-ship_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-last-ship_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-last-ship"><span class="series-name">The Last Ship</span><span class="series-detail">IMDB: 7.3/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-last-ship&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-leftovers_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-leftovers_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-leftovers"><span class="series-name">The Leftovers</span><span class="series-detail">IMDB: 7.7/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-leftovers&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-lost-room_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-lost-room_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-lost-room"><span class="series-name">The Lost Room</span><span class="series-detail">IMDB: 8.4/10 - 2006</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-lost-room&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-messengers_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-messengers_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-messengers"><span class="series-name">The Messengers</span><span class="series-detail">IMDB: 7.3/10 - 2015</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-messengers&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-strain_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-strain_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-strain"><span class="series-name">The Strain</span><span class="series-detail">IMDB: 8.0/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-strain&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/the-walking-dead_thumb.png?v=5.7" src="./Takip_ettiklerim_files/the-walking-dead_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/the-walking-dead"><span class="series-name">The Walking Dead</span><span class="series-detail">IMDB: 8.7/10 - 2010</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;the-walking-dead&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/true-blood_thumb.png?v=5.7" src="./Takip_ettiklerim_files/true-blood_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/true-blood"><span class="series-name">True Blood</span><span class="series-detail">IMDB: 8.0/10 - 2008</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;true-blood&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/twin-peaks_thumb.png?v=5.7" src="./Takip_ettiklerim_files/twin-peaks_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/twin-peaks"><span class="series-name">Twin Peaks</span><span class="series-detail">IMDB: 9.0/10 - 1990</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;twin-peaks&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/under-the-dome_thumb.png?v=5.7" src="./Takip_ettiklerim_files/under-the-dome_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/under-the-dome"><span class="series-name">Under the Dome</span><span class="series-detail">IMDB: 7.1/10 - 2013</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;under-the-dome&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/utopia_thumb.png?v=5.7" src="./Takip_ettiklerim_files/utopia_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/utopia"><span class="series-name">Utopia</span><span class="series-detail">IMDB: 8.5/10 - 2013</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;utopia&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/vikings_thumb.png?v=5.7" src="./Takip_ettiklerim_files/vikings_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/vikings"><span class="series-name">Vikings</span><span class="series-detail">IMDB: 8.6/10 - 2013</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;vikings&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>
        <li style="position: relative"><span><img data-load-image="http://dizilab.com/upload/series/z-nation_thumb.png?v=5.7" src="./Takip_ettiklerim_files/z-nation_thumb.png" alt=""></span><span><a target="_blank" href="http://dizilab.com/z-nation"><span class="series-name">Z Nation</span><span class="series-detail">IMDB: 6.0/10 - 2014</span></a>
            </span><span><a href="javascript:;" onclick="series_unfollow(&#39;z-nation&#39;, this, 1)"><span class="fa fa-times" style="font-size: 15px;"></span></a>
            </span>
            <div class="form-loader"></div>
        </li>-->
    </ul>
    <div style="clear: both; margin-bottom: 15px;">&nbsp;</div>
    <div class="pagination" style="margin-top: -15px;"></div>
</div>
<div class="clear"></div>
</div>
<!-- left -->
<?php $this->load->view('sidebar');?>
<!-- footer -->
<?php $this->load->view('footer');?>