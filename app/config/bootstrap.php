<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'constants.php');
ini_set('display_errors', DEBUG);
require_once(CONFIG_DIR . 'functions.php');
require_once(CONFIG_DIR . 'classes.php');
require_once(dirname(APP_DIR) . DS . 'radcanon' . DS . 'load.php');
require_once(CONFIG_DIR . 'db.php');
require_once(CONFIG_DIR . 'filters.php');
require_once(CONFIG_DIR . 'routes.php');
require_once(CONFIG_DIR . 'session.php');
?>