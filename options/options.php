<?php

$host = 'localhost';
$db   = '';
$user = ''; 
$pass = '';
$charset = 'utf8';

$session_name="wcp_db_session";

if ( !defined('SID') ) {

	session_name($session_name);
	session_start();
	//$SESSION['installed'] = 1;

}

date_default_timezone_set("Europe/Moscow");
    
?>
