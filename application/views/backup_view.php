<?php

include 'dumper.php';

try {
	$world_dumper = Shuttle_Dumper::create(array(
		'host' 		=> 'localhost',
		'username' 	=> 'ADSL',
		'password' 	=> 'ADSL',
		'db_name' 	=> 'elementech',
		'include_tables' => array('task'),
	));

	// dump the database to gzipped file
	$world_dumper->dump('elementech.sql.gz');

	// dump the database to plain text file
	$world_dumper->dump('elementech.sql');
	
	header("Refresh:0; url=main_view.php");

} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}
