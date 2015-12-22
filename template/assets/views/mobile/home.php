<div class="episodes">
<ul>
<? if ($this_week_eps): ?>
<li class="date">
<span>
Bu Hafta
</span>
</li>
<? foreach ($this_week_eps as $val): ?>
<li>
<a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>">
<img src="<?=thumb($val['permalink'])?>" alt="">
<span class="title">
<?=$val['title']?> </span>
<span class="alt-title">
<?=$val['season']?>. sezon <?=$val['episode']?>. bölüm </span>
</a>
</li>
<? endforeach ?>
<? endif; ?>
<? if ($last_week_eps): ?>
<li class="date">
<span>
Geçen Hafta </span>
</li>
<li>
<? foreach ($last_week_eps as $val): ?>
<li>
<a href="<?=bolum_url($val['permalink'],$val['season'],$val['episode'])?>">
<img src="<?=thumb($val['permalink'])?>" alt="">
<span class="title">
<?=$val['title']?> </span>
<span class="alt-title">
<?=$val['season']?>. sezon <?=$val['episode']?>. bölüm </span>
</a>
</li>
<? endforeach ?>
<? endif; ?>
</ul>
</div>