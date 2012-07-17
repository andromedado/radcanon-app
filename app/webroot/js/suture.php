<?php
/* Suture Type */
define('EXTENSION', 'js');
define('CONTENT_TYPE', 'text/javascript');
define('FILE_HEADER', '//JavaScript Document');

/* Suture Settings */
$defaults = array('jquery', 'app');
define('PERMIT_CACHE', false);
define('PERMIT_304', false);
define('HARD_STOP', false);
define('MAJOR_VERSION', 1);
$fromWhere = array(
	__DIR__ . DIRECTORY_SEPARATOR
);

/* Suture Business */
require(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'suture.php');
