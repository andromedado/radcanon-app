<?php
/* Suture Type */
define('EXTENSION', 'css');
define('CONTENT_TYPE', 'text/css');
define('FILE_HEADER', '@charset "UTF-8";');

/* Suture Settings */
$defaults = array('style', 'app', 'fonts', 'colors');
define('PERMIT_CACHE', false);
define('PERMIT_304', false);
define('HARD_STOP', true);
define('MAJOR_VERSION', 1);
$fromWhere = array(
	__DIR__ . DIRECTORY_SEPARATOR
);

/* Suture Business */
require(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'suture.php');
