<?php
	$con_string = "host=web0.site.uottawa.ca port=15432 dbname=public user=wmart103 password=***REMOVED***";
	$dbcon = pg_connect($con_string) or die('connection failed');
?>