<?php

/*Define constant to connect to database */
/*
DEFINE('DATABASE_USER', 'vsrivole');
DEFINE('DATABASE_PASSWORD','vs2738');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', 'vsrivole');
*/
$con = mysql_connect('localhost','vsrivole','vs2738');
$db = mysql_select_db("vsrivole");
//echo "Connection Sucessful";
?>