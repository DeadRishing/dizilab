<?php $this->load->view('header');?>
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
            <!--
            <li id="2113947">
                <a href="http://dizilab.com/uye/41164"><img data-load-image="http://dizilab.com/upload/avatar/41164_avatar.png?v=1431715198" src="./Sosyal_akis_files/41164_avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/mishamigos"><strong>mishamigos</strong></a>, <a href="http://dizilab.com/the-walking-dead/sezon-5/bolum-11">The Walking Dead</a> 5. sezon, 11. bölümü izliyor.</span></span><span class="date">34 dakika önce</span></span>
            </li>
            <li id="2113762">
                <a href="http://dizilab.com/uye/37797"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./Sosyal_akis_files/default-avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/ecemtim"><strong>ecemtim</strong></a>, <a href="http://dizilab.com/modern-family/sezon-1/bolum-23">Modern Family</a> 1. sezon, 23. bölümü izliyor.</span></span><span class="date">43 dakika önce</span></span>
            </li>
            <li id="2113761">
                <a href="http://dizilab.com/uye/43084"><img data-load-image="http://dizilab.com/upload/avatar/43084_avatar.png?v=1431715198" src="./Sosyal_akis_files/43084_avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/edaseat"><strong>edaseat</strong></a>, <a href="http://dizilab.com/12-monkeys/sezon-1/bolum-1">12 Monkeys</a> 1. sezon, 1. bölümü izliyor.</span></span><span class="date">43 dakika önce</span></span>
            </li>
            <li id="2113238">
                <a href="http://dizilab.com/uye/37986"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./Sosyal_akis_files/default-avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/daniella"><strong>daniella</strong></a>, <a href="http://dizilab.com/the-vampire-diaries/sezon-6/bolum-22">The Vampire Diaries</a> 6. sezon, 22. bölümü izliyor.</span></span><span class="date">1 saat önce</span></span>
            </li>
            <li id="2112990">
                <a href="http://dizilab.com/uye/41164"><img data-load-image="http://dizilab.com/upload/avatar/41164_avatar.png?v=1431715198" src="./Sosyal_akis_files/41164_avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/mishamigos"><strong>mishamigos</strong></a>, <a href="http://dizilab.com/the-walking-dead/sezon-5/bolum-10">The Walking Dead</a> 5. sezon, 10. bölümü izliyor.</span></span><span class="date">1 saat önce</span></span>
            </li>
            <li id="2112959">
                <a href="http://dizilab.com/uye/37797"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./Sosyal_akis_files/default-avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/ecemtim"><strong>ecemtim</strong></a>, <a href="http://dizilab.com/modern-family/sezon-1/bolum-22">Modern Family</a> 1. sezon, 22. bölümü izliyor.</span></span><span class="date">1 saat önce</span></span>
            </li>-->
        </ul>
    </div>
    <div class="submit-btn empty" onclick="load_social()" style="margin-top: 25px;">
        <button type="submit">Daha fazlasını göster.</button>
    </div>
</div>
<div class="clear"></div>
</div>
<!-- left -->
<?php $this->load->view('sidebar');?>
<!-- footer -->
<?php $this->load->view('footer');?>