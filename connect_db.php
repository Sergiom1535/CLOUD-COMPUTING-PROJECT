<?php
	$dbc = mysqli_connect('testdb.ccvnbnct7vxa.us-west-1.rds.amazonaws.com','admin','Pa$$w0rd','Forum')OR die (mysqli_connect_error());
	mysqli_set_charset($dbc,'utf8');
?>
