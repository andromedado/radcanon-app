<?php
//This is where any Environment Variables you need might get set
if (!getenv('MYSQL_DB_HOST')) {
    putenv('MYSQL_DB_HOST=127.0.0.1');
    putenv('MYSQL_DB_NAME=exampleDbName');
    putenv('MYSQL_USERNAME=exampleDbUserName');
    putenv('MYSQL_PASSWORD=exampleDbPassword');
}

