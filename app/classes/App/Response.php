<?php

class AppResponse extends Response
{
	protected $appVars = array(
		'base_url' => BASE_URL,
		'debug' => DEBUG,
	);

}

