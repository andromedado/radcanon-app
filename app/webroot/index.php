<?php
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'bootstrap.php');
try {
	$Response = Controller::handleRequest(new AppRequest($_SERVER, $_GET, $_POST, $_COOKIE));
	if(!headers_sent() && OUTPUT_BUFFER){ob_start("ob_gzhandler");}
	$Response->render();
	if(!headers_sent() && OUTPUT_BUFFER){ob_end_flush();}
} catch (Exception $e) {
	if (DEBUG) vdump($e);
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
?><!DOCTYPE html>
<html>
	<head>
		<title>500 Internal Server Error</title>
	</head>
	<body>
		<h1>500 Internal Server Error</h1>
		<h2><?php echo $e->getMessage(); ?></h2>
	</body>
</html><?php
}
exit;

