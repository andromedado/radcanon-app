##RADCanon App

#This is a default/base skeleton for a RAD-Canon Application

If the app requires a mysql database connection, you'll want to ensure that there are the appropriate `SetEnv` directives
in your virtual host.

e.g.

    SetEnv MYSQL_DB_HOST 127.0.0.1
    SetEnv MYSQL_DB_NAME exampleDbName
    SetEnv MYSQL_USERNAME exampleDbUserName
    SetEnv MYSQL_PASSWORD exampleDbPassword