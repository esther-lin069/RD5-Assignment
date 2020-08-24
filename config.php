<?php
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'RD5-Assignment';
	$port = '8889';

	$link = mysqli_connect ( $dbhost, $dbuser, $dbpass, "",$port ) or die ( mysqli_connect_error() );
	mysqli_query ( $link, "set names utf8" );
	mysqli_select_db ( $link, $dbname );
?>