<div class="dashboard-head">
    <h1 class="username" style="padding-top: 17px"><?=$i['username']?> <span class="fa fa-star"></span></h1><img class="image" data-load-image="<?=avatar($i['user_id'])?>" src="<?=avatar($i['user_id'])?>" alt="">
    <div class="alt">
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
    </ul>
    <div style="clear: both; margin-bottom: 15px;">&nbsp;</div>
    <div class="pagination" style="margin-top: -15px;"></div>
</div>
<div class="clear"></div>
</div>