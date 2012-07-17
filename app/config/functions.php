<?php

function include_from($what, array $from = array()) {
	if ($what === '') return;
	foreach ($from as $where) {
		if (file_exists($where . $what)) {
			include($where . $what);
			return;
		}
	}
}
