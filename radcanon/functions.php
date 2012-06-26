<?php

function vdump () {
	if (defined('DEBUG') && DEBUG) {
		$i = 1;
		while (ob_get_level() && $i < 5) {
			ob_end_flush();
			$i++;
		}
		$args = func_get_args();
		echo '<html><head></head><body><pre>';
		call_user_func_array('var_dump', $args);
		echo '</pre></body></html>';
		exit;
	}
}

?>