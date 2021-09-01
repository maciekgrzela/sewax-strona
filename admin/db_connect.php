<?php
$dbhost = '192.168.101.131';
$dblogin = 'profikie_cms';
$dbpass = 'maciuk33';
$dbselect = 'profikie_cms';
mysql_connect($dbhost,$dblogin,$dbpass)or die (mysql_error());
mysql_select_db($dbselect) or die(mysql_error());
mysql_query("SET CHARACTER SET UTF8");
?>
