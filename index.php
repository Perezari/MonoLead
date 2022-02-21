<?php

//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'application/');
define('ROOT_STATIC_DIR',ROOT_DIR .'static/');

// FOR INSTALLER
$_CF_FILE = APP_DIR .'config/config.php';
if (!file_exists($_CF_FILE)) {
	echo '<style>';
	echo 'body{
		background-color: #E6E6E6;
		font-family: Helvetica, Arial, sans-serif;
		font-size: 10pt;
		padding-top: 50px;
		text-align: left;
	  }
	  a { 
		color: #666;
		text-decoration: none;
	  }
	  a:hover {
		text-decoration: underline;
	  }
	  .container {
		margin: auto;
		max-width: 540px;
		min-width: 200px;
	  }
	  .box hr {
		diplay: block;
		border: none;
		border-bottom: 1px dashed #ccc;
	  }
	  .box {
		background-color: #fbfbfb;
		border: 1px solid #AAA;
		border-bottom: 1px solid #888;
		border-radius: 3px;
		color: black;
		box-shadow: 0px 2px 2px #AAA;
		padding: 20px;
	  }
	  .box h1, .box h2 {
		display: block;
		text-align: center;
	  }
	  .box h1 {
		color: #666;
		font-weight: normal;
		font-size: 50px;
		padding: 0;
		margin: 0;
		margin-top: 10px;
		line-height:50px
	  }
	  .box h2 {
		color: #666;
		font-weight: normal;
		font-size: 1.5em;
	  }
	  .box p {
		display: block;
		margin-bottom: 10px;
	  }
	  .box ul li {
		margin-bottom: 7px;
	  }
	  
	  /**** Copyright Information ****/
	  .copyright {
		display: block;
		text-align: center;
		color: #999;
		font-weight: normal;
		margin-top: 20px;
	  }';	
	echo '</style>';	
	echo '<div class="container">';
	echo '<div class="box">';
	echo '<h1>404</h1>';
	echo '<h2>The config file could not be found.</h2>';
	echo '<hr />';
	echo '<p>It seems that you have not installed the system.</p>';
	echo '<p>Please try the following:</p>';
	echo '<ul>';
	echo '<li>It seems that you have not installed the system, Please go to the installation form. <strong><a href="createnewdb.php">Setup</a></strong></li>';
	echo '</ul>';
	echo '</div>';
	echo '</div>';
	echo '<div class="copyright">';
	echo '&copy 2013 <a href="#">Ari Perez</a>. All Rights Reserved.';
	echo '</div>';
	echo '</div>';
	
	die();
}

// Includes
require(APP_DIR .'config/config.php');
require(ROOT_DIR .'system/model.php');
require(ROOT_DIR .'system/view.php');
require(ROOT_DIR .'system/controller.php');
require(ROOT_DIR .'system/pip.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);
define('STATIC_DIR', $config['base_url'].'static/');

function pr($var) {
	$template = php_sapi_name() !== 'cli' ? '<pre>%s</pre>' : "\n%s\n";
	printf($template, print_r($var, true));

}

pip();

?>
