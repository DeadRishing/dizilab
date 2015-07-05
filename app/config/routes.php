<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';

$route['(:any)'] = 'show/index/$1';
$route['(:any)/sezon-(:any)/bolum-(:any)'] = "episode/index/$1/$2/$3";

$route['arsiv'] = 'archive';
$route['takvim'] = 'calendar';
$route['forum'] = 'forum';
$route['iletisim'] = 'contact';

//$route['giris'] = 'main/login';
$route['cikis_yap'] = 'main/logout';

$route['uye/(:any)'] = 'user/anonymous/$1';
$route['pano'] = 'user/index';
$route['pano/ayarlar'] = 'user/custom';
$route['pano/son-izlediklerim'] = 'user/last_watched';
$route['pano/takip-ettiklerim'] = 'user/followed_shows';
$route['pano/sosyal-akis'] = 'user/social_stream';

$route['request/php'] = 'ajax';

$route['404'] = '404';
//$route['404_override'] = '404';
$route['translate_uri_dashes'] = FALSE;
