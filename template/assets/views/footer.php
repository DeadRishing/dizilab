            <!-- footer -->
            <div class="footer">
			
            <div class="disclaimer">
            <br><p>sitemizde yer alan tüm diziler “<a href="#">video paylaşım siteleri</a>” aracılığıyla paylaşılmaktadır. f kendi sunucularında herhangi bir video içeriği barındırmadığından bu konuda bir telif hakkı sorumluluğu kabul etmemektedir.</p>
                <p>“halkın kendisine hizmet etmesi için görevlendirdiği kurumlar hadlerini aşıp halka neye izleyip izlemeyeceğini bilmeyen cahil cühela muamelesi edemezler. web siteleri kullanıcıların istekleri doğrultusunda bağlandıkları yerlerdir." -ekşi sözlük</p>
            </div>
            <!-- logo -->
            <div class="footer-logo"><!--<a href="" class="logo-dark">dizilab</a>-->
				<a href="#" class="logo-dark">dizilab</a>
			</div>
            <!-- bottom -->
                  <div class="bottom">
                  <ul>
                        <li><a href="">yabancı dizi izle</a></li>
                        <!--<li><a href="#">HAKKIMIZDA</a></li><li><a href="#">YASAL UYARI</a></li>-->
                        <li><a href="/{elapsed_time}" target="_blank">imdb dizileri</a></li>
                        <li class="feedback"><a href="" target="_blank">geri bildirim</a></li>
                        <li><a href="" target="_blank">bağış yap</a></li>
                        <li><a href="">reklam/iletişim</a></li>
                  </ul>
                  <p>© 2014-2015 <a href="#">dizilab</a>. tüm hakları mahfuzdur ve mahfuz acı verir. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            </div>
      </div>
</div>
</div>
<script>var url = "<?=base_url();?>", request_url = url + 'request/php/', VERSION = 5.8;</script>
<script src="<?=base_url('compress_js?v=5.8');?>"></script>
<script src="<?=assets_url('plugins/jquery.modal/jquery.modal.min.js?v=5.7');?>"></script>
<link rel="stylesheet" href="<?=assets_url('plugins/jquery.modal/jquery.modal.css?v=5.7');?>"/>
<script>

    $(document).ready(function(){
        var total = $('[data-load-image]').length,
            current = 0;
        function load_image(eq){
            $('[data-load-image]:eq(' + eq + ')').attr('src', $('[data-load-image]:eq(' + eq + ')').data('load-image')).load(function(){
                 if ( current < total )
                    current += 1;
                    load_image(current);
            }).error(function(){
                if ( current < total )
                    current += 1;
                load_image(current);
            });
        }
        load_image(current);
		$(window).on('resize', function(){
			console.log( $(this).width() < 1280 );
			if ( $(this).width() < 1280 ){
				$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
			} else {
				$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
			}
		});
		if ( $(window).width() < 1280 ){
			$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
		} else {
			$('a.banner').css('background-image', 'url(http://savoy.storage.cubecdn.net/ps/dizilab/page.jpg)');
		}
        /*
        $('[data-load-image]').each(function(){
            var image = $(this).data('load-image');
            $(this).attr('src', image);
        });
        */
    });

    today_watchs('.rating-tab-container', 'e');

</script>
</body>
</html>