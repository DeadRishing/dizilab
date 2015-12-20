<div class="profile-edit-right">
                    <form action="" id="settings-form" onsubmit="return false;">
                        <h3 class="title"><span class="blue big-font">profil ayarları</span></h3>
                        <ul class="pedit-form">
                            <li><span class="title">E-posta</span><span class="form-value"><a class="edit-value" href="#"><span class="fa fa-pencil"></span></a><span class="value"><?=$i['user_mail']?><script cf-hash="f9e31" type="text/javascript">
/* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script></span><span class="description">E-posta adresini kimseyle paylaşmıyoruz, güvendesin!</span> </span>
                            </li>
                            <li><span class="title">Adınız</span><span class="form-value"><input type="text" name="uye_adsoyad" value=""></span></li>
                            <li><span class="title">Cinsiyet</span><span class="form-value"><span class="value" style="position: relative; top: 3px;">Erkek</span></span>
                            </li>
                            <li><span class="title">Doğum Tarihi</span><span class="form-value"><select name="gun" class="selectbox" style="width: 50px"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option selected value="30">30</option><option value="31">31</option></select><select name="ay" class="selectbox" style="width: 120px"><option value="1">Ocak</option><option value="2">Şubat</option><option selected value="3">Mart</option><option value="4">Nisan</option><option value="5">Mayıs</option><option value="6">Haziran</option><option value="7">Temmuz</option><option value="8">Ağustos</option><option value="9">Eylül</option><option value="10">Ekim</option><option value="11">Kasım</option><option value="12">Aralık</option></select><select name="yil" class="selectbox" style="width: 96px"><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option selected value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option></select></span></li>
                            <li><span class="title">Konum</span><span class="form-value"><input type="text" name="uye_konum" value=""></span></li>
                            <li><span class="title">Hakkında</span><span class="form-value"><textarea name="uye_hakkinda" id="" cols="30" rows="10"><?=$i['user_info']?></textarea><span class="description">Kendin ve sevdiğin şeyleri yazarak insanlara kendini tanıtabilirsin.</span></span>
                            </li>
                        </ul>
                        <h3 class="title"><span class="none big-font">sosyal ağlarda sen</span></h3>
                        <ul class="pedit-form">
                            <li><span class="title"><span class="fa fa-facebook"></span> Facebook</span><span class="form-value"><input type="text" name="uye_facebook_url" style="width: 305px" value="<?=$i['user_fb']?>"><span class="description">İnsanların sana facebooktan ulaşmalarına ne dersin?</span></span>
                            </li>
                            <li><span class="title"><span class="fa fa-twitter"></span> Twitter</span><span class="form-value"><input type="text" name="uye_twitter_url" style="width: 305px" value="<?=$i['user_twttr']?>"><span class="description">Kuşlarımız ötmeye hazır! Peki sen buna hazır mısın?</span></span>
                            </li>
                            <li><span class="title"><span class="fa fa-tumblr"></span> Tumblr</span><span class="form-value"><input type="text" name="uye_tumblr_url" style="width: 305px" value=""><span class="description">Herkes tumblr'ın gücünü görmeli! Şimdi sıra sende.</span></span>
                            </li>
                        </ul>
                        <div class="submit-btn" style="padding-bottom: 25px;">
                            <button type="submit" onclick="update_profile(&#39;settings-form&#39;)">Değişiklikleri kaydet</button>
                        </div>
                    </form>
                </div>
                <style>
                    .title .fa {
                        color: #fff;
                        font-size: 14px;
                        margin-right: 10px;
                        width: 10px;
                        text-align: center;
                    }
                </style>
                <div class="profile-edit-left">
                    <div class="change-avatar">
                        <div>
                            <div class="loader" style="display: none"></div>
                            <form action="/request/php/" id="change-avatar" method="post" enctype="multipart/form-data"><img src="/upload/avatar/<?=$i['user_id']?>_avatar.png" class="user-avatar-bind" alt=""><a href="#" class="change-avatar-btn" style="bottom: 0; left: 0">Avatarını düzenle</a>
                                <input type="file" name="avatar" style="position: absolute; top: 0; left: -99999px;">
                                <input type="hidden" name="type" value="change-avatar">
                            </form>
                        </div>
                    </div>
                    <ul class="profile-edit-menu">
                        <li class="active"><a href="#">Profil Ayarları<span>Temel bilgiler, ayarlar..</span></a></li>
                        <li><a href="javascript:;" onclick="alert(&#39;beta aşamasından sonra aktif hale gelecektir.&#39;)">Bildirim Ayarları<span>E-posta ayarları, bildirimler</span></a></li>
                        <li><a href="javascript:;" onclick="alert(&#39;beta aşamasından sonra aktif hale gelecektir.&#39;)">Gizlilik Ayarları<span>Profil kimliği, gizlilik</span></a></li>
                        <li><a href="javascript:;" onclick="alert(&#39;beta aşamasından sonra aktif hale gelecektir.&#39;)">Hesabı kapat<span>Türk dizilerine devam!</span></a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>