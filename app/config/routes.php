<?php
//FilterRoutes::addRoute('url', array());
FilterRoutes::addRoute('', array('User', 'homepage'));
FilterRoutes::addRoute('edit-profile', array('Profile', 'edit'));
FilterRoutes::addRoute('my-profile', array('Profile', 'my'));
FilterRoutes::addRoute('terms-of-service', array('Pages', 'terms'));
FilterRoutes::addRoute('logout', array('User', 'logout'));
FilterRoutes::addRoute('forgot-password', array('User', 'forgotPassword'));
FilterRoutes::addRoute('login', array('User', 'login'));
FilterRoutes::addRoute('join', array('User', 'join'));
?>