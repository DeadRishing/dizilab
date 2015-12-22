<?
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=(isset($title))?$title:sitename().' | mobil dizi izle'?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?=assets_url('styles/mobmain.css');?>?v=2">
	<style>
	.alt-menu
	{
		height:3px;
	}
	#addcomment
	{
		position:relative;
	}
	.loader-ajax
	{
		display:none;
		background:url(http://m.dizilab.com/template/assets/images/ajax-loader.gif) no-repeat center;
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
		z-index:2;
	}
	.form-active .formm
	{
		opacity:.3;
	}
	.form-active .loader-ajax
	{
		display:block;
	}
	</style>
 </head>
<body>
<div class="loader"></div>
<div class="search-box" id="search">
<a class="popup-close" href="#" data-close="#search" style="top: 3px; z-index: 2; border-radius: 0; right: 3px">
<span class="fa fa-times"></span>
</a>
<div class="bottom">
<span class="fa fa-search"></span>
<input type="text" id="searchbar" autocomplete="off" placeholder="dizilab&#39;de bir dizi ara..">
</div>
<div class="list">
<div class="result-error">
Aradığınız kriterlere uygun dizi bulunamadı.
</div>
<ul></ul>
</div>
</div>
<div class="popup" id="login">
<div class="popup-form">
<a class="popup-close" href="#" data-close="#login">
<span class="fa fa-times"></span>
</a>
<form action="" onsubmit="return false;">
<span class="popup-logo">dizilab.</span>
<ul>
<li>
<input type="text" name="username" placeholder="Kullanıcı adınız.">
</li>
<li>
<input type="password" name="password" placeholder="Şifreniz.">
</li>
<li>
<button type="submit" onclick="login()">Hesaba Giriş Yap</button>
</li>
</ul>
</form>
</div>
</div>
<div class="header">
 
<a class="login" href="#" data-open="#login">
<span class="fa fa-user"></span> &nbsp; giriş
</a>
 
<a class="search" href="javascript:;" data-open="#search">
<span class="fa fa-search"></span>
</a>
 
<a class="logo" href="<?=base_url()?>">
<img src="<?=assets_url('images/logo.png');?>" alt="" height="45">
</a>
</div>
<div style="background: #007790 url(https://cdn1.iconfinder.com/data/icons/google_jfk_icons_by_carlosjj/32/chrome.png) no-repeat 10px; color: #a4cfd8; padding: 12px; padding-left: 50px; line-height: 17px; font-size: 13px;">
<a href="https://www.google.com/chrome/browser/" class="chrome-link" target="_blank" style="color: #a4cfd8">
Altyazı sorunu yaşamamak için lütfen <strong style="color: #fff;">Google Chrome</strong> kullanın.
</a>
</div>