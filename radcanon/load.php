<?php
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
if (!defined('RADCANON_DIR')) define('RADCANON_DIR', __DIR__ . DS);
if (!defined('MAIL_FROM')) define('MAIL_FROM', 'Info <info@radcanon.com>');
if (!class_exists('Twig_Autoloader')) {
	if (!defined('TWIG_LIB_DIR')) define('TWIG_LIB_DIR', RADCANON_DIR . 'twig' . DS);
	require_once(TWIG_LIB_DIR . 'Autoloader.php');
	Twig_Autoloader::register();
}
require_once(RADCANON_DIR . 'functions.php');
if (!defined('RADCANON_CLASS_DIR')) define('RADCANON_CLASS_DIR', RADCANON_DIR . 'classes' . DS);
if (!defined('RADCANON_TEMPLATES_DIR')) define('RADCANON_TEMPLATES_DIR', RADCANON_DIR . 'views' . DS);

function radcanon_autoloader ($classname) {
	$cLoc = $classname = preg_replace('/[^A-Z\d_-]+/i', '', $classname);
	$prefixes = array(
		'App',
		'File',
		'Html',
		'Exception',
		'Filter',
		'Model',
		'Controller',
		'Email',
		'Utils',
	);
	foreach ($prefixes as $prefix) {
		if (preg_match('#^' . $prefix . '#', $classname)) {
			$cLoc = preg_replace('#^' . $prefix . '#', $prefix . DS, $classname);
			if ($cLoc === $prefix . DS) $cLoc .= $classname;
			break;//May only be performed once!
		}
	}
	if (!file_exists(RADCANON_CLASS_DIR . $cLoc . '.php')) {
		return false;
	}
	require_once(RADCANON_CLASS_DIR . $cLoc . '.php');
	return true;
}
spl_autoload_register('radcanon_autoloader');
?>