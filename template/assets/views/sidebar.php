<!-- left -->
<div class="left"><a class="logo" href="<?=base_url()?>"><span>dizilab</span></a>
    <div class="left-menu">
        <style>
            .left-menu ul li {
                position: relative;
            }
            
            .left-menu .new {
                position: absolute;
                top: 5px;
                right: 0;
                background: darkred;
                color: #fff;
                font-size: 10px;
                line-height: 15px;
                padding: 0 7px;
                border-radius: 2px 0 0 2px;
            }
        </style>
        <?php if(!isset($i['login'])):?>
        <ul>
            <!--<li><a href="javascript:;" data-open="#login-form"><span class="fa fa-bars"></span><span class="title">Pano</span></a></li>-->
            <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-user"></span><span class="title">Profil</span></a></li>
            <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-play-circle"></span><span class="title">Son İzlediklerim</span></a></li>
            <li> <a href="javascript:;" data-open="#login-form"><span class="fa fa-tasks"></span><span class="title">İzleme Listesi</span></a></li>
            <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-eye"></span><span class="title">Takip Ettiklerim</span></a></li>
            <li><a href="javascript:;" data-open="#login-form"><span class="fa fa-users"></span><span class="title">Sosyal Akış</span></a></li>
            <li><a href="<?=base_url('iletisim')?>"><span class="fa fa-question-circle"></span><span class="title">Geri Bildirim</span></a></li>
            <!--<li><a href="https://www.facebook.com/groups/imdbdizileri/" target="_blank"><span class="fa fa-facebook"></span><span class="title">IMDb Dizileri</span></a></li>-->
        </ul>
        <?php else:?>
        <ul>
            <!--<li><a href="('pano')"><span class="fa fa-bars"></span><span class="title">Pano</span></a></li>-->
            <li><a href="<?=base_url('uye/'.$i['username'])?>"><span class="fa fa-user"></span><span class="title">Profil</span></a></li>
            <li><a href="<?=base_url('pano/son-izlediklerim')?>"><span class="fa fa-play-circle"></span><span class="title">Son İzlediklerim</span></a></li>
            <li><a href="<?=base_url('pano/izleme-listesi')?>"><span class="fa fa-tasks"></span><span class="title">İzleme Listesi</span></a></li>
            <li><a href="<?=base_url('pano/takip-ettiklerim')?>"><span class="fa fa-eye"></span><span class="title">Takip Ettiklerim</span></a></li>
            <li><a href="<?=base_url('pano/sosyal-akis')?>"><span class="fa fa-users"></span><span class="title">Sosyal Akış</span></a></li>
            <li><a href="<?=base_url('iletisim')?>"><span class="fa fa-question-circle"></span><span class="title">Geri Bildirim</span></a></li>
            <!--<li><a href="https://www.facebook.com/groups/imdbdizileri/" target="_blank"><span class="fa fa-facebook"></span><span class="title">IMDb Dizileri</span></a></li>-->
        </ul>
      <?php endif;?>
    </div>
</div>
<div class="clear"></div>