<?php $this->load->view('header');?>
			<div class="right-inner">
                	<h3 class="title"><span class="blue big-font">araştırma ve analiz laboratuvarı</span></h3> 
                	<div class="archives-tv-series-list"> 
                		<div class="archives-filter">
                			<ul>
                				<li class="title">FİLTRELE</li>
                				<li>
                					<select class="selectbox selectBox" name="orderby" style="display: none;">
                						<option value="puan" selected="">Puana göre</option>
                						<option value="ad">Ad'a göre</option>
                						<option value="sezon">Sezona göre</option>
                						<a href=""><option value="yil">Yıla göre</option></a>
                					</select>
                					<!--
                					<a class="selectBox selectbox selectBox-dropdown" title="" tabindex="0" style="width: 117px; display: inline-block;">
                						<span class="selectBox-label" style="width: 74px;">Puana göre</span>
                						<span class="selectBox-arrow"></span>
                					</a>-->
                				</li>
                				<li class="title">SIRALA</li>
                				<li>
                					<select class="selectbox selectBox" name="order" style="display: none;">
                						<option value="DESC" selected="">Z &gt; A</option>
                						<option value="ASC">A &gt; Z</option>
                					</select>
                					<!--
                					<a class="selectBox selectbox selectBox-dropdown" title="" tabindex="0" style="width: 62px; display: inline-block;">
                						<span class="selectBox-label" style="width: 19px;">Z &gt; A</span>
                						<span class="selectBox-arrow"></span>
                					</a>-->
                				</li>
                				<li class="title">SAYFA</li>
                				<li>
                					<select class="selectbox selectBox" name="limit" style="display: none;">
                						<option value="10" selected="">10 dizi göster</option>
                						<option value="25">25 dizi göster</option>
                						<option value="50">50 dizi göster</option>
                						<option value="75">75 dizi göster</option>
                						<option value="100">100 dizi göster</option>
                					</select>
                					<!--
                					<a class="selectBox selectbox selectBox-dropdown" title="" tabindex="0" style="width: 134px; display: inline-block;">
                						<span class="selectBox-label" style="width: 91px;">10 dizi göster</span>
                						<span class="selectBox-arrow"></span>
                					</a>-->
                				</li>
                			</ul>
                		</div> 
                		<? if($top_shows) {
                				$i=0;
                		foreach($top_shows as $val){
                			$i++;
                			?>
                		<div class="tv-series-single">
                			<a href="<?=base_url();?><?=$val['permalink'];?>" class="film-image"><img data-load-image="<?=cover($val['permalink']);?>" src="<?=img_loader()?>" alt=""></a>
                			<div class="tss-detail">
                				<a class="title" style="<?php if($i > 9) { ?>padding-left: 45px;<? } ?>" href="<?=base_url();?><?=$val['permalink'];?>"><span class="position"><?=$i;?></span><?=$val['title'];?></a>
                				<span class="rank">
                					<span class="fa fa-star"></span>
                					<span class="rank-text"><?=$val['imdb_rating'];?></span>
                				</span>
                				<ul>
                					<li><span class="alt-title">Yapım yılları</span><span><?=$val['year_started'];?></span></li>
                					<li><span class="alt-title">Sezon / Bölüm</span><span>x sezon / x bölüm</span></li>
                					<li><span class="alt-title">Dizi türü</span><span>
                					<? //$test = $show->getShowCategories($val['id'], true, $language);$a=0;$b=count($test);foreach($test as $category_id => $category){$a++;if($a!=$b){$degisken = $category['tag'].', ';}else{$degisken = $category['tag'];}echo $degisken;}
                                                        ?>
                                                <?php 
                                    $kir = explode('|',$val['tags']);
                                    $a=0;
                                    $b=count($kir);
                                    foreach($kir as $tag){
                                    $a++; 
                                    if($a!=$b){
                                        $degisken = $tag.', ';
                                    }else{
                                        $degisken = $tag;
                                    }

                                    echo $degisken;?>
                                    <?php } ?></span></li>
                					<li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px"><?=$val['country'];?></span></li>
                				</ul>
                				<p class="series-summery"><?php if (strlen($val['description']) > 100) {
$detay = substr($val['description'],0,100) . " ..";}else{$detay = $val['description'];} echo $detay;?></p>
                			</div>
                		</div>
                		<? } 
                		}?>
                        <!--
                		<div class="tv-series-single">
                			<a href="<?=base_url();?>" class="film-image"><img data-load-image="<?=base_url();?>/upload/series/_cover.png?v=5.5" src="<?=$_SERVER["REQUEST_URI"] = "/template/assets/images/transparent.png";?>" alt=""></a>
                			<div class="tss-detail">
                				<a class="title" style="padding-left: 45px;" href="<?=base_url();?>"><span class="position">10</span>Prison Break</a>
                				<span class="rank">
                					<span class="fa fa-star"></span>
                					<span class="rank-text">9/9</span>
                				</span>
                				<ul>
                					<li><span class="alt-title">Yapım yılları</span><span>?</span></li>
                					<li><span class="alt-title">Sezon / Bölüm</span><span>? sezon / ? bölüm</span></li>
                					<li><span class="alt-title">Dizi türü</span><span>aksiyon</span></li>
                					<li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">Türkiye</span></li>
                				</ul>
                				<p class="series-summery">ddddd</p>
                			</div>
                		</div>-->
                		<!--
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.6</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2001</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>1 sezon / 10 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">UK, USA</span></li></ul><p class="series-summery">Dünya onlara güvendi, onlar da birbirine...2. Dünya Savaşı'nı anlatan en başarılı TV dizisi olar..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.5</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2011</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>5 sezon / 41 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">USA, UK</span></li></ul><p class="series-summery">Dizi Westeros kıtasındaki birleşik Yedi Krallık'ın uzun yazdan çıkmasının ve kışın yaklaşması ile ba..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.5</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2006</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>1 sezon / 11 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">UK</span></li></ul><p class="series-summery">Yeryüzü (İngilizce:Planet Earth); BBC yapımı bir doğa belgeseli dizisidir. İlk kez 2006 yılında BBC'..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.4</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2014</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>1 sezon / 13 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">USA</span></li></ul><p class="series-summery">Cosmos: Bir Uzay Serüveni; evrenin görkemini ortaya çıkartmak ve Kozmik Takvim ve Hayal Gücü Gemisi ..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.4</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2002</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>3 sezon / 37 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">USA</span></li></ul><p class="series-summery">Amerika'nın Baltimore şehrinde geçen dizi; her sezon başka bir sorunu odağına alarak, birebir yaşana..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.4</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2015</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>1 sezon / 8 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">USA</span></li></ul><p class="series-summery">Breaking Bad spin-off’u. Breaking Bad’te Walter White ve Jesse’nin avukatı ve aynı zamanda suçluları..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.3</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2010</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>3 sezon / 9 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">UK</span></li></ul><p class="series-summery">Sherlock’u hiç böyle görmediniz! Sör Conan Doyle’un kahramanını günümüze taşıyan Sherlock'ta ünlü de..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.3</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2014</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>1 sezon / 8 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">USA</span></li></ul><p class="series-summery">Matthew McConaughey ve Woody Harrelson'ın başrollerini paylaşacağı True Detective, 8 bölüm halinde y..</p></div></div> 
                		<div class="tv-series-single"><a href="" class="film-image"><img data-load-image="" src="" alt=""></a><div class="tss-detail"><a class="title" style="padding-left: 45px;" href=""><span class="position"></span></a><span class="rank"><span class="fa fa-star"></span><span class="rank-text">9.3</span></span><ul><li><span class="alt-title">Yapım yılları</span><span>2013</span></li><li><span class="alt-title">Sezon / Bölüm</span><span>1 sezon / 6 bölüm</span></li><li><span class="alt-title">Dizi türü</span><span></span></li><li><span style="padding-top: 1px" class="alt-title">Ülke</span><span style="padding-top: 1px">UK</span></li></ul><p class="series-summery">2013 yılında 87 yaşına giren BBC’ nin son elli yılında pek çok belgeselle imza atmış yorulmak bilmez..</p></div></div> 
                		-->
                		<div class="pagination" style="margin-bottom: 25px;">
                			<? //if($pagination){ ?>
                			<ul class="pagination">
                				<? //echo $pagination; ?>
                				<!--
                				<li><a href="http://dizilab.com/arsiv?sayfa=1&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">İlk Sayfa</a></li>
                				<li class="active"><a href="http://dizilab.com/arsiv?sayfa=1&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">1</a></li>
                				<li class=""><a href="http://dizilab.com/arsiv?sayfa=2&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">2</a></li>
                				<li class=""><a href="http://dizilab.com/arsiv?sayfa=3&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">3</a></li>
                				<li class=""><a href="http://dizilab.com/arsiv?sayfa=4&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">4</a></li>
                				<li class=""><a href="http://dizilab.com/arsiv?sayfa=5&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">5</a></li>
                				<li class=""><a href="http://dizilab.com/arsiv?sayfa=6&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">6</a></li>
                				<li><a href="http://dizilab.com/arsiv?sayfa=16&limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=">Son Sayfa</a></li>
                			-->
                			</ul>
                			<? //} ?>
                		</div>
                	</div> 
                	<div class="archives-menu"> 
                		<h3>Dizi türleri</h3>
                		<ul>
                            <li><a href="/arsiv/aile"><span class="fa fa-angle-right"></span>Aile</a></li>
                                                <li><a href="/arsiv/aksiyon"><span class="fa fa-angle-right"></span>Aksiyon</a></li>
                                                <li><a href="/arsiv/animasyon"><span class="fa fa-angle-right"></span>Animasyon</a></li>
                                                <li><a href="/arsiv/belgesel"><span class="fa fa-angle-right"></span>Belgesel</a></li>
                                                <li><a href="/arsiv/bilim-kurgu"><span class="fa fa-angle-right"></span>Bilim Kurgu</a></li>
                                                <li><a href="/arsiv/biyografi"><span class="fa fa-angle-right"></span>Biyografi</a></li>
                                                <li><a href="/arsiv/dram"><span class="fa fa-angle-right"></span>Dram</a></li>
                                                <li><a href="/arsiv/fantastik"><span class="fa fa-angle-right"></span>Fantastik</a></li>
                                                <li><a href="/arsiv/genclik"><span class="fa fa-angle-right"></span>Gençlik</a></li>
                                                <li><a href="/arsiv/gerilim"><span class="fa fa-angle-right"></span>Gerilim</a></li>
                                                <li><a href="/arsiv/gizem"><span class="fa fa-angle-right"></span>Gizem</a></li>
                                                <li><a href="/arsiv/komedi"><span class="fa fa-angle-right"></span>Komedi</a></li>
                                                <li><a href="/arsiv/korku"><span class="fa fa-angle-right"></span>Korku</a></li>
                                                <li><a href="/arsiv/macera"><span class="fa fa-angle-right"></span>Macera</a></li>
                                                <li><a href="/arsiv/mini-dizi"><span class="fa fa-angle-right"></span>Mini Dizi</a></li>
                                                <li><a href="/arsiv/muzikal"><span class="fa fa-angle-right"></span>Müzikal</a></li>
                                                <li><a href="/arsiv/polisiye"><span class="fa fa-angle-right"></span>Polisiye</a></li>
                                                <li><a href="/arsiv/romantik"><span class="fa fa-angle-right"></span>Romantik</a></li>
                                                <li><a href="/arsiv/savas"><span class="fa fa-angle-right"></span>Savaş</a></li>
                                                <li><a href="/arsiv/spor"><span class="fa fa-angle-right"></span>Spor</a></li>
                                                <li><a href="/arsiv/suc"><span class="fa fa-angle-right"></span>Suç</a></li>
                                                <li><a href="/arsiv/tarih"><span class="fa fa-angle-right"></span>Tarih</a></li>
                                                <li><a href="/arsiv/western"><span class="fa fa-angle-right"></span>Western</a></li>
                		</ul>
                		<h3>Yapım Yılı</h3>
                		<ul>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&ulke=&order=&dizi_adi=&yil=2010-2019">2010 - 2019</a></li>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&ulke=&order=&dizi_adi=&yil=2000-2009">2000 - 2009</a></li>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&ulke=&order=&dizi_adi=&yil=1990-1999">1990 - 1999</a></li>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&ulke=&order=&dizi_adi=&yil=1980-1989">1980 - 1989</a></li>
                		</ul>
                		<h3>Ülkeler</h3>
                		<ul>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=USA">Amerika</a></li>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=UK">İngiltere</a></li>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=Canada">Kanada</a></li>
                			<li><a href="http://dizilab.com/arsiv?limit=&tur=&orderby=&order=&yil=&dizi_adi=&ulke=Ireland">İrlanda</a></li>
                		</ul>
                	</div>
                </div>
                <div class="clear"></div>
            </div>
<!-- left -->
<?php $this->load->view('sidebar');?>
<!-- footer -->
<?php $this->load->view('footer');?>