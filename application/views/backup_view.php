<?php

global $config;
include 'dumper.php';

try {
	$world_dumper = Shuttle_Dumper::create(array(
		'host' 		=> 'localhost',
		'username' 	=> $config['db_username'],
		'password' 	=> $config['db_password'],
		'db_name' 	=> $config['db_name'],
		'include_tables' => array('task'),
	));

	// dump the database to gzipped file
	$world_dumper->dump("{$config['db_name']}.sql.gz");

	// dump the database to plain text file
	$world_dumper->dump("{$config['db_name']}.sql");
	
	header("Refresh:0; url=main_view.php");

} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}
