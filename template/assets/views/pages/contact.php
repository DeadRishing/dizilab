<div class="contact">
<h3 class="title">
<span class="blue">İletişim</span>
</h3>
<? if(isset($i['login'])):?>
<form action="" onsubmit="return false;" id="contact">
<ul class="pedit-form" style="padding-top: 10px">
<!--
<li style="display: none">
<span class="title">Kimsiniz?</span>
<span class="form-value">
<input type="text" name="name" value="FinnGriffColl" style="width: 400px">
</span>
</li>
<li style="display: none">
<span class="title">Nasıl ulaşacağız?</span>
<span class="form-value">
<input type="text" name="email" value="finngriffcoll@gmail.com" style="width: 400px">
</span>
</li>-->
<li>
<span class="title">Sorun nedir?</span>
<span class="form-value">
<select name="types" class="selectbox" style="width: 420px">
<option value="0">-- Seçin --</option>
<option value="1">Yardım</option>
<option value="2">İstek</option>
<option value="3">Şikayet</option>
<option value="4">Reklam</option>
<option value="5">Hatalı Bölüm</option>
<option value="6">Diğer</option>
</select>
</span>
</li>
<li>
<span class="title">Anlatın..</span>
<span class="form-value">
<textarea name="text" cols="30" rows="10" style="width: 400px"></textarea>
<span class="description">detaycı ve açıklayıcı olursanız, şakacı ve güler yüzlü oluruz.</span>
</span>
</li>
</ul>
</form>
<? else:?>
<form action="" onsubmit="return false;" id="contact">
<ul class="pedit-form" style="padding-top: 10px">
<li>
<span class="title">Kimsiniz?</span>
<span class="form-value">
<input type="text" name="name" value="" style="width: 400px">
</span>
</li>
<li>
<span class="title">Nasıl ulaşacağız?</span>
<span class="form-value">
<input type="text" name="email" value="" style="width: 400px">
</span>
</li>
<li>
<span class="title">Sorun nedir?</span>
<span class="form-value">
<select name="types" class="selectbox" style="width: 420px">
<option value="0">-- Seçin --</option>
<option value="1">Yardım</option>
<option value="2">İstek</option>
<option value="3">Şikayet</option>
<option value="4">Reklam</option>
<option value="5">Hatalı Bölüm</option>
<option value="6">Diğer</option>
</select>
</span>
</li>
<li>
<span class="title">Anlatın..</span>
<span class="form-value">
<textarea name="text" cols="30" rows="10" style="width: 400px"></textarea>
<span class="description">detaycı ve açıklayıcı olursanız, şakacı ve güler yüzlü oluruz.</span>
</span>
</li>
</ul>
</form>
<? endif;?>
<div class="submit-btn" style="padding-bottom: 25px; text-align: left; padding-left: 145px">
<button type="submit" onclick="contact(&#39;#contact&#39;)" style="width: 200px">Gönder</button>
</div>
</div>
<style>.contact{padding:25px;}.selectBox-dropdown-menu,.selectBox-dropdown{border-width:1px;}.form-value input,.form-value textarea{color:#9CAAB0!important;}</style>
</div>