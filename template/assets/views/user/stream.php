<div class="dashboard-head">
    <h1 class="username" style="padding-top: 17px">FinnGriffColl <span class="fa fa-star"></span></h1><img class="image" data-load-image="http://dizilab.com/upload/avatar/41694_avatar.png?v=1431715183" src="./Sosyal_akis_files/41694_avatar.png" alt="">
    <div class="alt">
        <ul>
            <li>TAKİP ETTİĞİN DİZİLER<span>35</span></li>
            <li>İZLEDİĞİN BÖLÜMLER<span>1,217</span></li>
            <li>YORUMLARIN<span>34</span></li>
            <li>TAKİP ETTİKLERİN<span>190</span></li>
            <li>TAKİP EDENLER<span>35</span></li>
        </ul>
    </div>
</div>
<div class="dashboard-inner">
    <div class="social-timeline">
        <h3 class="title"><span class="blue big-font">dizilab. sosyal akışın</span></h3>
        <ul class="timeline" style="margin-top: 20px"><span class="line"></span>
            <?foreach ($activity as $val):?>
            <li id="2114294">
                <a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=avatar($val['user_id'])?>" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="http://dizilab.com/supernatural/sezon-2/bolum-7">Supernatural</a> 2. sezon, 7. bölümü izliyor.</span></span><span class="date">16 dakika önce</span></span>
            </li>
            <?endforeach?>
        </ul>
    </div>
    <div class="submit-btn empty" onclick="load_social()" style="margin-top: 25px;">
        <button type="submit">Daha fazlasını göster.</button>
    </div>
</div>
<div class="clear"></div>
</div>