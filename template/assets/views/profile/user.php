				<div class="dashboard-head">
                    <ul class="user-social" style="float: right; padding: 25px">
                        <?if(!empty($user['facebook'])):?>
                        <li style="float: left; margin-left: 10px;"><a style="font-size: 25px; color: #eee" target="_blank" href="https://facebook.com/<?=$user['facebook']?>"><span class="fa fa-facebook"></span></a></li>
                        <?endif;?>
                        <?if(!empty($user['twitter'])):?>
                        <li style="float: left; margin-left: 10px;"><a style="font-size: 25px; color: #eee" target="_blank" href="https://twitter.com/<?=$user['twitter']?>"><span class="fa fa-twitter"></span></a></li>
                        <?endif;?>
                    </ul>
                    <h1 class="username"><?=$user['username']?>&nbsp;<span class="fa fa-<?if($user['gender'] == 'm'){echo'male';}else{echo'female';}?>" style="font-size: 22px; color: #373F42;"></span><?if(isset($i['login'])):?><?=uye_takip($i['user_id'],$user['usaid'],$takipcim)?><?endif;?></h1>
                    <div class="last-watch" style="position: absolute; left: 160px; top: 65px; font-size: 12px; color: #adb3b6; width: 728px;"><?if($last_watched):?>En son <?foreach ($last_watched as $val):?><a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>" style="color: #b8a676"><?=$val['target_data']['title']?></a>, <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümünü izledi.<span style="padding-left: 20px; color: #485053; font-style: oblique"></span><?endforeach?><?else:?>Henüz hiçbirşey izlememiş.<?endif;?></div><img class="image" data-load-image="<?=avatar($user['usaid'])?>" src="<?=img_loader()?>" alt="">
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
                <div class="right-inner">
                    <div class="user-profile-right">
                        <div class="last-activity">
                            <h3 class="profile-title">Son Aktiviteler</h3>
                            <?if($activity):?>
                            <ul class="timeline">
                                <?foreach ($activity as $val):?>
                                <?if($val['target_type'] == 1):?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($user['usaid'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type add"><span class="fa fa-user"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/uye/<?=$val['target_data']['username']?>"><strong><?=$val['target_data']['username']?></strong></a> adlı kullanıcıyı takip etti.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?elseif($val['target_type'] == 2):?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($user['usaid'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type like"><span class="fa fa-thumbs-up"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>"><?=$val['target_data']['title']?></a> dizisinin <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümünü beğendi.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?elseif($val['target_type'] == 3):?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($user['usaid'])?>" src="<?=img_loader()?>" alt=""></a><span class="tl-content"><span class="title"><span class="title"><a href="/<?=$val['target_data']['perma']?>/sezon-<?=$val['target_data']['season']?>/bolum-<?=$val['target_data']['episode']?>"><?=$val['target_data']['title']?></a> <?=$val['target_data']['season']?>. sezon, <?=$val['target_data']['episode']?>. bölümü izliyor.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?elseif($val['target_type'] == 4):?>
                                <li><a href="/uye/<?=$val['user_data']['username']?>"><img data-load-image="<?=avatar($user['usaid'])?>" src="<?=img_loader()?>" alt=""></a><span class="notif-type add" style="background: #5BB230"><span class="fa fa-check"></span></span><span class="tl-content"><span class="title"><span class="title"><a href="/<?=$val['target_data']['perma']?>"><strong><?=$val['target_data']['title']?></strong></a> dizisini takip etmeye başladı.</span></span><span class="date"><?=ago(strtotime($val['date']));?></span></span></li>
                                <?endif;?>
                                <?endforeach?>
                            </ul>
                            <?else:?>
                            <div style="font-size: 14px; color: #999">
                                Henüz hiç aktivitesi bulunmuyor.
                            </div>
                            <?endif;?>
                        </div>
                        <h3 class="profile-title">Takip Ettiği Diziler<span class="dizi_count"><?=number_format($dizi_takip)?></span></h3>
                        <div class="followed-tv-series">
                            <?if($follow_series):?>
                            <ul>
                                <?foreach($follow_series as $val):?>
                                <li>
                                    <a href="/<?=$val['permalink']?>" title="<?=$val['title']?>"><img data-load-image="<?=thumb($val['permalink'])?>" src="<?=img_loader()?>" alt="" width="55" height="55"></a>
                                </li>
                                <?endforeach?>
                            </ul>
                            <?else:?>
                            <div style="font-size: 14px; color: #999">
                                Henüz hiçbir diziyi takip etmiyor.
                            </div>
                            <?endif;?>
                        </div>
                    </div>
                    <div class="user-profile-left">
                        <h3 class="title"><span class="blue">Laboratuvar Analizi</span></h3>
                        <ul class="user-about">
                            <?if(!empty($user['info'])):?>
                            <li><span>Hakkında</span><?=$user['info']?></li>
                            <?endif;?>
                            <li><span>Kayıt Tarihi</span><?=ago(strtotime($user['create_date']));?></li>
                            <li><span>Dizi İzleme Süresi</span><?$toplam = 5003; 
$yil_sayisi = $toplam/365; 
echo floor($yil_sayisi).' Yıl '; 
$ay_sayisi = ($toplam%365) / 30; 
echo floor($ay_sayisi).' Ay '; 
$gun_sayisi = (($toplam%365) % 30); 
echo floor($gun_sayisi).' Gün ';
$saat = (($toplam%365)/(60*60));
echo floor($saat).' Saat';?> </li>
                        </ul>
                        <h3 class="title"><span>Takip Ettikleri (<?=number_format($uye_takip)?>)</span></h3>
                        <ul class="user-fav-list">
                            <?if($follows):
                            foreach($follows as $val):?>
                            <li>
                                <a title="<?=$val['username']?>" href="/uye/<?=$val['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a>
                            </li>
                            <?endforeach?>
                            <li class="more"><a href="#"><span><span class="fa fa-ellipsis-h"></span></span></a></li>
                            <?else:?>
                            <div style="padding-top: 5px; font-size: 14px; color: #999">
                                Takip edilen kimse yok.
                            </div>
                            <?endif;?>
                        </ul>
                        <h3 class="title"><span class="orange">Takipçileri (<?=number_format($takip_edenler)?>)</span></h3>
                        <ul class="user-fav-list">
                            <?if($followers):
                            foreach($followers as $val):?>
                            <li>
                                <a title="<?=$val['username']?>" href="/uye/<?=$val['username']?>"><img data-load-image="<?=avatar($val['user_id'])?>" src="<?=img_loader()?>" alt=""></a>
                            </li>
                            <?endforeach?>
                            <li class="more"><a href="#"><span><span class="fa fa-ellipsis-h"></span></span></a></li>
                            <?else:?>
                            <div style="padding-top: 5px; font-size: 14px; color: #999">
                                Takip eden kimse yok.
                            </div>
                            <?endif;?>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>