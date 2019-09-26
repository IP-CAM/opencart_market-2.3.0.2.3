<?php
// HTTP
$HOST = $_SERVER['HTTP_HOST'];

define('HTTP_SERVER', 		$protocol . '://' . $HOST.'/admin/');
define('HTTP_CATALOG', 		$protocol . '://' . $HOST.'/');

// HTTPS
define('HTTPS_SERVER', 		$protocol . '://' . $HOST.'/admin/');
define('HTTPS_CATALOG', 	$protocol . '://' . $HOST.'/');

// DIR
$DIR = dirname(dirname(__FILE__));

define('DIR_APPLICATION', 	$DIR . '/admin/');
define('DIR_SYSTEM', 		$DIR . '/system/');
define('DIR_IMAGE', 		$DIR . '/image/');
define('DIR_LANGUAGE', 		$DIR . '/admin/language/');
define('DIR_TEMPLATE', 		$DIR . '/admin/view/template/');
define('DIR_CONFIG', 		$DIR . '/system/config/');
define('DIR_CACHE', 		$DIR . '/system/storage/cache/');
define('DIR_DOWNLOAD', 		$DIR . '/system/storage/download/');
define('DIR_LOGS', 			$DIR . '/system/storage/logs/');
define('DIR_MODIFICATION', 	$DIR .'/system/storage/modification/');
define('DIR_UPLOAD', 		$DIR . '/system/storage/upload/');
define('DIR_CATALOG', 		$DIR . '/catalog/');

// DB
require_once (DIR_CONFIG.'db_config.php');
