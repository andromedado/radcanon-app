<?php

class ControllerPages extends ControllerApp {
	
	public function homepage () {
		$this->set('content', 'Hi there');
	}
	
}

?>