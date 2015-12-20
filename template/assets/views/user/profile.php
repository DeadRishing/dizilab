                <div class="dashboard-head">
                    <h1 class="username" style="padding-top: 17px"><?=$i['username']?> <span class="fa fa-star"></span></h1><img class="image" data-load-image="<?=avatar($i['user_id'])?>" src="<?=img_loader()?>" alt="">
                    <div class="alt">
                        <ul>
                            <li>TAKİP ETTİĞİN DİZİLER<span><?=number_format($dizi_takip)?></span></li>
                            <li>İZLEDİĞİN BÖLÜMLER<span><?=number_format($izledikleri)?></span></li>
                            <li>YORUMLARIN<span><?=number_format($yorum_say)?></span></li>
                            <li>TAKİP ETTİKLERİN<span><?=number_format($uye_takip)?></span></li>
                            <li>TAKİP EDENLER<span><?=number_format($takip_edenler)?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-inner">
                    <div class="alert-text text-center"><a class="close-btn" href="#"><span class="fa fa-times"></span></a>birbirinin klonu yüzlerce dizi sitesi varken biz dizilab.’in biraz daha özel bir platform olabilmesi için çok uğraştık, uğraşıyoruz.
                        <br>güzel dileklerinizi ve tavsiyelerinizi facebook, twitter ve sözlüklerden takip ediyor olacağız: @dizilab</div>
                    <h3 class="title"><span class="big-font">popüler dizi izleyicileri.</span></h3>
                    <ul class="popular-humans">
                        <li>
                            <a href="http://dizilab.com/uye/mrwhite" title="MrWhite"><img data-load-image="http://dizilab.com/upload/avatar/49554_avatar.png?v=1431714417" src="./profil_files/49554_avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/turkyurek" title="turkyurek"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/sezaydogan" title="sezaydogan"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/do6an" title="do6an"><img data-load-image="http://dizilab.com/upload/avatar/53086_avatar.png?v=1431714417" src="./profil_files/53086_avatar.png" alt=""><span class="statu out"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/bellerophontes" title="BELLEROPHONTES"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/mirasm" title="MirasM"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/iremerten" title="iremerten"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""><span class="statu out"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/halita" title="HalitA"><img data-load-image="http://dizilab.com/upload/avatar/1518_avatar.png?v=1431714417" src="./profil_files/1518_avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/barisakcy" title="barisakcy"><img data-load-image="http://dizilab.com/upload/avatar/48773_avatar.png?v=1431714417" src="./profil_files/48773_avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/calcuku" title="calcuku"><img data-load-image="http://dizilab.com/upload/avatar/1423_avatar.png?v=1431714417" src="./profil_files/1423_avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                        <li>
                            <a href="http://dizilab.com/uye/nyanbeg" title="nyanbeg"><img data-load-image="http://dizilab.com/upload/avatar/71959_avatar.png?v=1431714417" src="./profil_files/71959_avatar.png" alt=""><span class="statu busy"></span></a>
                        </li>
                    </ul>
                    <div class="dashboard-right">
                        <div class="social-timeline" tab2="">
                            <h3 class="title"><span class="blue">dizilab. sosyal akış</span></h3>
                            <ul class="tline-tab" tab2-list="">
                                <li class="active"><a href="#">Tüm Herkes</a></li>
                                <li><a href="#">Takip Ettiklerin</a></li>
                            </ul>
                            <ul class="timeline" tab2-content="" style="display: block;"><span class="line"></span>
                                <?php foreach ($activity as $val): ?>
                                <?php if($val['target_type'] == 1): ?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type add"><span class="fa fa-user"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/uye/<?=$val['target_data']['username']?>"><strong><?=$val['target_data']['username']?></strong></a> adlı kullanıcıyı takip etti.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?php elseif($val['target_type'] == 2): ?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type like"><span class="fa fa-thumbs-up"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>"><?=$val['target_data']['title']?></a> dizisinin <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümünü beğendi.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?php elseif($val['target_type'] == 3): ?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>"><?=$val['target_data']['title']?></a> <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümü izliyor.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?php elseif($val['target_type'] == 4): ?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type add" style="background: #5BB230"><span class="fa fa-check"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['user_data']['username']?>"><strong><?=$val['user_data']['username']?></strong></a>, <a href="/<?=$val['target_data']['perma']?>"><strong><?=$val['target_data']['title']?></strong></a> dizisini takip etmeye başladı.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?php endif; ?>
                                <?php endforeach ?>
                                <!--
                                <li>
                                    <a href="http://dizilab.com/uye/74544"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/74544"><strong>sedat1971</strong></a>, <a href="http://dizilab.com/the-walking-dead/sezon-5/bolum-13">The Walking Dead</a> 5. sezon, 13. bölümü izliyor.</span></span><span class="date">1 saniye önce</span></span>
                                </li>
                                <li>
                                    <a href="http://dizilab.com/uye/41556"><img data-load-image="http://dizilab.com/upload/avatar/41556_avatar.png?v=1431714417" src="./profil_files/41556_avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/41556"><strong>barisoksuz</strong></a>, <a href="http://dizilab.com/spartacus-blood-and-sand/sezon-3/bolum-1">Spartacus: Blood and Sand</a> 3. sezon, 1. bölümü izliyor.</span></span><span class="date">1 saniye önce</span></span>
                                </li>
                                <li>
                                    <a href="http://dizilab.com/uye/75827"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/75827"><strong>aysefran</strong></a>, <a href="http://dizilab.com/arrow/sezon-2/bolum-10">Arrow</a> 2. sezon, 10. bölümü izliyor.</span></span><span class="date">7 saniye önce</span></span>
                                </li>
                                <li>
                                    <a href="http://dizilab.com/uye/72525"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/72525"><strong>cilgin_peri</strong></a>, <a href="http://dizilab.com/orphan-black/sezon-1/bolum-8">Orphan Black</a> 1. sezon, 8. bölümü izliyor.</span></span><span class="date">7 saniye önce</span></span>
                                </li>
                            -->
                            </ul>
                            <ul class="timeline" tab2-content="" style="display: none;"><span class="line"></span>
                                <li>
                                    <a href="http://dizilab.com/uye/39672"><img data-load-image="http://dizilab.com/upload/avatar/39672_avatar.png?v=1431714432" src="./profil_files/39672_avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/39672"><strong>eckltl</strong></a>, <a href="http://dizilab.com/supernatural/sezon-2/bolum-7">Supernatural</a> 2. sezon, 7. bölümü izliyor.</span></span><span class="date">3 dakika önce</span></span>
                                </li>
                                <li>
                                    <a href="http://dizilab.com/uye/41164"><img data-load-image="http://dizilab.com/upload/avatar/41164_avatar.png?v=1431714432" src="./profil_files/41164_avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/41164"><strong>mishamigos</strong></a>, <a href="http://dizilab.com/the-walking-dead/sezon-5/bolum-11">The Walking Dead</a> 5. sezon, 11. bölümü izliyor.</span></span><span class="date">21 dakika önce</span></span>
                                </li>
                                <li>
                                    <a href="http://dizilab.com/uye/37797"><img data-load-image="http://dizilab.com/template/assets/images/default-avatar.png?v=1" src="./profil_files/default-avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/37797"><strong>ecemtim</strong></a>, <a href="http://dizilab.com/modern-family/sezon-1/bolum-23">Modern Family</a> 1. sezon, 23. bölümü izliyor.</span></span><span class="date">30 dakika önce</span></span>
                                </li>
                                <li>
                                    <a href="http://dizilab.com/uye/43084"><img data-load-image="http://dizilab.com/upload/avatar/43084_avatar.png?v=1431714432" src="./profil_files/43084_avatar.png" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="http://dizilab.com/uye/43084"><strong>edaseat</strong></a>, <a href="http://dizilab.com/12-monkeys/sezon-1/bolum-1">12 Monkeys</a> 1. sezon, 1. bölümü izliyor.</span></span><span class="date">30 dakika önce</span></span>
                                </li>
                            </ul>
                        </div>
                        <div class="most-tab-list dashboard-fix">
                            <h3 class="title"><span class="orange">önerdiğimiz diziler.</span></h3>
                            <ul>
                                <?php $i=0;
                            foreach ($popular_series as $row): 
                                $i++;?>
                                <li><a href="/<?php echo $row['permalink'] ?>"><span class="points">puan: <span><?=$row['imdb_rating']?></span></span><span class="info"><img src="<?=thumb($row['permalink'])?>" alt=""><span class="title"><?php echo $row['title'] ?></span><span class="category">
                                    <span class="category">
                                        <?php if(!empty($row['tags'])):?>
                                        <?php 

                                        $count = 0;
                                        $a=0;
                                        $b=2;
                                foreach(explode('|',$row['tags']) as $tag){

                                    $a++;
                                    if($a!=$b){
                                        $degisken = $tag.', ';
                                    }else{
                                        $degisken = $tag;
                                    }
                                    if($count < 2){
                                    echo $degisken;
                                    $count++;
                                }
                                }
                                        ?>
                                        <?php endif;?>
                                    </span></span></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="dizilab-social">
                            <h3>dizilab. sosyal ağlarda.</h3><a href="https://twitter.com/dizilab" class="twitter"><span class="fa fa-twitter"></span>264</a><a class="facebook" href="http://www.facebook.com/dizilab" data-facebook-page="dizilab"><span class="fa fa-facebook"></span> 6176</a></div>
                    </div>
                    <div class="dashboard-left">
                        <h3 class="title"><span class="purple">en son izlediğin bölümler.</span></h3>
                        <div class="last-watch">
                            <ul>
                                <li class="title"><span>DİZİ ADI</span><span>SON İZLENİLEN</span></li>
                                <?php foreach ($last_watched as $val): ?>
                                <li><span><a href="/<?=$val['target_data']['perma']?>"><?=$val['target_data']['title']?></a></span><span><a style="color: #96a0a4" href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>"><?=$val['target_data']['season']?>. Sezon <?=$val['target_data']['episode']?>. Bölüm</a></span></li>
                                <?php endforeach ?>
                            </ul><a href="/profil/son-izlediklerim" class="more">tümünü görüntüle.</a></div>
                        <h3 class="title"><span class="green">dizilab. istatistiklerin.</span></h3>
                        <div class="dashboard-stats">
                            <ul>
                                <li><span><?=number_format($dizi_takip)?></span>DİZİ</li>
                                <li><span><?=number_format($izledikleri)?></span>BÖLÜM</li>
                                <li><span><?=number_format($yorum_say)?></span>YORUM</li>
                                <li><span>+<?=number_format($takip_edenler)?></span>YENİ TAKİPÇİ</li>
                            </ul>
                            <p><span style="font-size: 30px">1 ay, 8 gün, 22 saat, 12 dakika</span>DIŞ DÜNYAYLA BAĞLANTINI KOPARIP KENDİNİ DİZİLERE ADAMIŞSIN.</p>
                        </div>
                        <h3 class="title"><span class="orange">tartışmaların, yorumların, profil mesajların.</span></h3>
                        <div class="user-messages">
                            <ul>
                                <li><a href="#"><span class="image"><img src="./profil_files/3.png" alt=""></span><span class="m-content"><span class="type">forum mesajı</span><span class="title">Sizce izlemeli miyim?</span><p>13 bölüm tamamda 2-3 haftada bir yayınlamasalar bari</p><span class="alt">2 gün önce - <span>Breaking Bad</span> tartışma kategorisine...</span></span></a></li>
                                <li><a href="#"><span class="image"><img src="./profil_files/3.png" alt=""></span><span class="m-content"><span class="type">forum mesajı</span><span class="title">Sizce izlemeli miyim?</span><p>Tyrion, Jon, Davos, Jaime ve Jorah</p><span class="alt">4 gün önce - <span>Breaking Bad</span> tartışma kategorisine...</span></span></a></li>
                                <li><a href="#"><span class="image"><img src="./profil_files/3.png" alt=""></span><span class="m-content"><span class="type">forum mesajı</span><span class="title">Sizce izlemeli miyim?</span><p>İyi oyuncuydu fakat Arda gidip Ezgi kalsaydı pek birşey değişmezdi. İkisi gittikten sonra kötü oldu...</p><span class="alt">4 gün önce - <span>Breaking Bad</span> tartışma kategorisine...</span></span></a></li>
                                <li><a href="#"><span class="image"><img src="./profil_files/3.png" alt=""></span><span class="m-content"><span class="type">forum mesajı</span><span class="title">Sizce izlemeli miyim?</span><p>wowowowowow</p><span class="alt">1 hafta önce - <span>Breaking Bad</span> tartışma kategorisine...</span></span></a></li>
                            </ul><a class="more" href="#">tümünü görüntüle.</a></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>