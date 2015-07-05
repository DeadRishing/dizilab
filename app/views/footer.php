            <!-- footer -->
            <div class="footer">
            <!-- disclaimer -->
            <div class="disclaimer">
            <br>
                  <p>sitemizde yer alan tüm diziler “<a href="#">video paylaşım siteleri</a>” aracılığıyla paylaşılmaktadır. f kendi sunucularında herhangi bir video içeriği barındırmadığından bu konuda bir telif hakkı sorumluluğu kabul etmemektedir.</p>
                  <p>“halkın kendisine hizmet etmesi için görevlendirdiği kurumlar hadlerini aşıp halka neye izleyip izlemeyeceğini bilmeyen cahil cühela muamelesi edemezler. web siteleri kullanıcıların istekleri doğrultusunda bağlandıkları yerlerdir." -ekşi sözlük</p>
            </div>
            <!-- logo -->
            <div class="footer-logo"><!--<a href="" class="logo-dark">dizilab</a>--></div>
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
                  <p>© 2014 tüm hakları mahfuzdur ve mahfuz acı verir. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            </div>
      </div>
</div>
</div>
<script>var url = "<?=base_url();?>", request_url = url + 'request/php/', VERSION = 5.7;</script>
<script src="<?=base_url('compress_js?v=5.7');?>"></script>
<script src="<?=assets_url('plugins/jquery.modal/jquery.modal.min.js?v=5.7');?>"></script>
<link rel="stylesheet" href="<?=assets_url('plugins/jquery.modal/jquery.modal.css?v=5.7');?>"/>
<script>
$(document).ready(function() {
    var total = $('[data-load-image]').length,
        current = 0;

    function load_image(eq) {
        $('[data-load-image]:eq(' + eq + ')').attr('src', $('[data-load-image]:eq(' + eq + ')').data('load-image')).load(function() {
            if (current < total) current += 1;
            load_image(current);
        }).error(function() {
            if (current < total) current += 1;
            load_image(current);
        });
    }
    load_image(current);
    $(window).on('resize', function() {
        console.log($(this).width() < 1280);
        if ($(this).width() < 1280) {
            $('a.banner').css('background-image', 'url(/ads/youwin-mini.jpg)');
        } else {
            $('a.banner').css('background-image', 'url(/ads/youwin-3.jpg)');
        }
    });
    if ($(window).width() < 1280) {
        $('a.banner').css('background-image', 'url(/ads/youwin-mini.jpg)');
    } else {
        $('a.banner').css('background-image', 'url(/ads/youwin-3.jpg)');
    } /*$('[data-load-image]').each(function(){var image = $(this).data('load-image');$(this).attr('src', image);});*/
});
</script><script>$('.tv-series-list ul li').each(function () {if (localStorage.getItem('episode_' + $(this).attr('id'))) {$(this).css('opacity', .6).attr('title', 'Bu bölümü daha önce izlediniz.');}});</script>
<!--
<div data-html2canvas-ignore="true" class="uv-icon uv-bottom-right"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="39px" height="39px" viewBox="0 0 39 39" enable-background="new 0 0 39 39" xml:space="preserve">
<g>
      <path class="uv-bubble-background" fill="rgba(46, 49, 51, 0.6)" d="M31.425,34.514c-0.432-0.944-0.579-2.007-0.591-2.999c4.264-3.133,7.008-7.969,7.008-13.409
            C37.842,8.658,29.594,1,19.421,1S1,8.658,1,18.105c0,9.446,7.932,16.79,18.105,16.79c1.845,0,3.94,0.057,5.62-0.412
            c0.979,1.023,2.243,2.3,2.915,2.791c3.785,2.759,7.571,0,7.571,0S32.687,37.274,31.425,34.514z" style="fill: rgba(255, 255, 255, 0.298039);"></path>
      <g>
            <g>
                  <path class="uv-bubble-foreground" fill="#FFFFFF" d="M16.943,19.467c0-3.557,4.432-3.978,4.432-6.058c0-0.935-0.723-1.721-2.383-1.721
                        c-1.508,0-2.773,0.725-3.709,1.87l-2.441-2.743c1.598-1.9,4.01-2.924,6.602-2.924c3.891,0,6.271,1.959,6.271,4.765
                        c0,4.4-5.037,4.732-5.037,7.265c0,0.481,0.243,0.994,0.574,1.266l-3.316,0.965C17.303,21.459,16.943,20.522,16.943,19.467z
                         M16.943,26.19c0-1.326,1.114-2.441,2.44-2.441c1.327,0,2.442,1.115,2.442,2.441c0,1.327-1.115,2.441-2.442,2.441
                        C18.058,28.632,16.943,27.518,16.943,26.19z" style="fill: rgb(255, 255, 255);"></path>
            </g>
      </g>
</g>
</svg>
</div>
-->
</body>
</html>