<div class="footer">
<p>
© 2014 dizilab.
<br>
tüm hakları mahfuzdur ve mahfuz acı verir. <br><br>
</p>
<p></p>
</div>
 
<script src="<?=assets_url('scripts/jquery-1.11.1.min.js');?>"></script>
<script>var mobile_url = '<?=base_url()?>',ajax_url = mobile_url + '/ajax';</script>
<script src="<?=assets_url('scripts/mobmain.js');?>?v=3"></script>
<script>
var userAgent = navigator.userAgent || navigator.vendor || window.opera;
if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) ) {
	$('.chrome-link').attr('href', 'https://itunes.apple.com/ye/app/chrome-web-browser-by-google/id535886823?mt=8');
}else if( userAgent.match( /Android/i ) ) {	
	$('.chrome-link').attr('href', 'https://play.google.com/store/apps/details?id=com.android.chrome&hl=tr');
} else {	
	$('.chrome-link').attr('href', 'https://www.google.com/chrome/browser/');
}
</script>
</body></html>