<?php defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'main';

$route['arsiv'] = 'pages/archive';
$route['takvim'] = 'pages/calendar';
$route['iletisim'] = 'pages/contact';
$route['forum'] = 'forum';

$route['pano'] = 'user';
$route['pano/ayarlar'] = 'user/custom';
$route['pano/son-izlediklerim'] = 'user/last_watched';
$route['pano/takip-ettiklerim'] = 'user/followed_series';
$route['pano/sosyal-akis'] = 'user/social_stream';
$route['cikis_yap'] = 'user/logout';

$route['uye/(:any)'] = 'profile/user/$1';
$route['oyuncu/(:any)'] = 'profile/cast/$1';

$route['404'] = '404';

$route['(:any)'] = 'series/index/$1';
$route['(:any)/sezon-(:any)/bolum-(:any)'] = "episode/index/$1/$2/$3";
$route['(:any)/forum'] = 'forum/forum/$1';
$route['(:any)/forum/yeni'] = 'forum/neww/$1';
$route['(:any)/forum/(:any)-(:num)'] = 'forum/topic/$1/$2/$3';

$route['request/php'] = 'ajax';
$route['translate_uri_dashes'] = FALSE;
