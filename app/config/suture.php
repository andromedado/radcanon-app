<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'constants.php');
if (is_dir(RADCANON_DIR . EXTENSION)) {
	$fromWhere[] = RADCANON_DIR . EXTENSION . DS;
}
require_once(CONFIG_DIR . 'functions.php');

$ks = array_merge($defaults, array_keys($_GET));
$hash = md5(implode('', $ks) . date('MY') . MAJOR_VERSION);
$et = '"' . substr($hash, -10) . '"';
if (PERMIT_304 && isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == $et) {
	header('Not Modified', true, 304);
	if (HARD_STOP) exit;
}
ob_start();//'ob_gzhandler');
header('Cache-Control: Public');
header('ETag: ' . $et);
header('Content-Type: ' . CONTENT_TYPE);
echo FILE_HEADER;
if (!empty($ks)) {
	$cacheFile = CACHE_DIR . $hash . '.' . EXTENSION;
	if (PERMIT_CACHE && file_exists($cacheFile)) {
		ob_clean();
		header('Last-Modified: ' . date('D, d M Y h:i:s T', filemtime($cacheFile)));
		include($cacheFile);
		ob_end_flush();
		exit;
	}
	foreach ($ks as $f) {
		$file = preg_replace('/[^\dA-Z_-]/i', '', $f);
		$what = $file . '.' . EXTENSION;
		echo "\n/* Begin {$file}." . EXTENSION . " */\n";
		include_from($what, $fromWhere);
		echo "\n/* End {$file}." . EXTENSION . " */\n";
	}
	if (PERMIT_CACHE && (is_dir(SUTURE_CACHE_DIR) || mkdir(SUTURE_CACHE_DIR)) && $h = fopen($cacheFile, 'w')) {
		$s = '/* Cached File: ' . date('Y-m-d g:ia T', time()) . " */\n" . ob_get_contents();
		fwrite($h, $s);
		fclose($h);
	}
} else {
	echo "\n/* Empty _GET */\n";
}
ob_end_flush();
