<?php
DBCFactory::setWriteInfo(array(
	'type' => 'mysql',
	'host' => getenv('MYSQL_DB_HOST'),
	'db' => getenv('MYSQL_DB_NAME'),
	'usr' => getenv('MYSQL_USERNAME'),
	'pwd' => getenv('MYSQL_PASSWORD'),
));
