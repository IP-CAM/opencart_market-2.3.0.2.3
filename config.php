<?php
// HTTP
$HOST = $_SERVER['HTTP_HOST'];

define('HTTP_SERVER', 		$protocol . '://' . $HOST.'/');

// HTTPS
define('HTTPS_SERVER', 		$protocol . '://' . $HOST.'/');

// DIR
$DIR = dirname(__FILE__);

// DIR
define('DIR_APPLICATION', 	$DIR . '/catalog/');
define('DIR_SYSTEM', 		$DIR . '/system/');
define('DIR_IMAGE', 		$DIR . '/image/');
define('DIR_LANGUAGE', 		$DIR . '/catalog/language/');
define('DIR_TEMPLATE', 		$DIR . '/catalog/view/theme/');
define('DIR_CONFIG', 		$DIR . '/system/config/');
define('DIR_CACHE', 		$DIR . '/system/storage/cache/');
define('DIR_DOWNLOAD', 		$DIR . '/system/storage/download/');
define('DIR_LOGS', 			$DIR . '/system/storage/logs/');
define('DIR_MODIFICATION', 	$DIR . '/system/storage/modification/');
define('DIR_UPLOAD', 		$DIR . '/system/storage/upload/');

// PARSE BITRIX ID PARTS
define('BITRIX_HASH_F', 'Jdujql238dlzxi2');
define('BITRIX_HASH_S', '39asjask32lda');

// DB
require_once (DIR_CONFIG.'db_config.php');
