<?php

class AppResponse extends Response {
	protected $appVars = array(
		'title' => 'Homepage',
		'characterImg' => '<img src="images/char1.png" class="character" width="85" height="113" />',
		'navLinks' => array(),
		'headerClasses' => '',
		'topRightItemsBelow' => array(),
		'bodyClasses' => '',
		'errors' => array(),
	);
	
	protected function load() {
		parent::load();
		$this->set('baseHref', '<base href="http://' . SITE_HOST . '/" />');
		$this->set('debug', DEBUG);
		$this->set('tosHref', FilterRoutes::buildUrl(array('Pages', 'terms')));
		$this->set('logoutHref', FilterRoutes::buildUrl(array('User', 'logout')));
	}
	
}

?>