 <?php
$dbhost = 'localhost';
$dbusername = 'Ari';
$dbpassword = '250691';
$db_conn = mysqli_connect($dbhost, $dbusername, $dbpassword);
$results = mysqli_query($db_conn,"SHOW DATABASES");
?>
 <head>
  <title>Elementech - Change Database</title>
</head>
<style type="text/css">
body{
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
	  .copyright {
		display: block;
		text-align: center;
		color: #999;
		font-weight: normal;
		margin-top: 20px;
	  }
	  input{
		padding: .5em .6em;
		display: inline-block;
		border: 1px solid #ccc;
		box-shadow: inset 0 1px 3px #ddd;
		border-radius: 4px;
		vertical-align: middle;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		}
		input[type="submit"]:active{
			background-color: white;
		}
		select{
		padding: .5em .6em;
		display: inline-block;
		border: 1px solid #ccc;
		box-shadow: inset 0 1px 3px #ddd;
		border-radius: 4px;
		vertical-align: middle;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		}	
</style>
<body>


  <div class="header">
    <b></b>
  </div>
  <div class="content">
    <?php
	$dir = __DIR__;
    if(isset($_POST['base_url'])){ //check if base_url is set or not.
      $cf = fopen("application/config/config.php", "w") or die('Cannot write! make sure the CHMOD is 777'); //fopen - Opens file or URL
      $txt = "<?php\n\n";
	  $txt.= "\$config['base_url'] = '".$_POST['base_url']."';\n\n";
      $txt.= "\$config['default_controller'] = 'main';\n";
      $txt.= "\$config['error_controller'] = 'main';\n\n";
      $txt.= "\$config['db_host'] = '".$_POST['database_host']."';\n";
      $txt.= "\$config['db_name'] = '".$_POST['database_name']."';\n";
      $txt.= "\$config['db_username'] = '".$_POST['database_username']."';\n";
      $txt.= "\$config['db_password'] = '".$_POST['database_password']."';\n\n";
      $txt.= "define('version', 'Alpha 1.0');\n\n";
      $txt.= "?>\n";
      fwrite($cf, $txt);

      error_reporting(0);
      // Create connection
      $conn = mysqli_connect($_POST['database_host'], $_POST['database_username'], $_POST['database_password'],$_POST['database_name']);

      // Check connection
      if (mysqli_connect_error()) {
		echo "<div class='container'>";
		echo "<div class='box'>";
		echo "<h1>Errors</h1>";
		echo "<h2>Check the status</h2>";
        die("<li>Connection failed (bacause of server address/database name/database username/database password) please check your database properties: " . mysqli_connect_error().'</li>');
      	echo "</div>";
		echo "</div>";
	  } else {
		echo "<div class='container'>";
		echo "<div class='box'>";
		echo "<h1>Database Changed</h1>";
		echo "<h2>Check the status</h2>"; 
        echo "<li>Database Server - Connected successfully.</li>";
        echo "<li>Database - Connected successfully.</li>";
		echo '<li>The system changes successfully, Please go to the main page. <strong><a href="index.php">Quick Link</a></strong></li>';
		echo "</div>";
		echo "</div>";
      }
      die();
    }
    ?>
	
	<form action="#" method="POST">
	<div class="container">
	<div class="box">
	<h1>Change Database</h1>
	<h2>Elementech</h2>
	<hr />
	<p>Please fill the following:</p>
	<ul>
	<li>Base Url: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="base_url" style="width:300px" value="<?php echo preg_replace('/changedb\.php/','',"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>"/> <span class="info"></span></li>
	<li>Database Host: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="database_host" style="width:300px" value="localhost"/> <span class="info"></span></li>
	<li>Database Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select type="text" name="database_name" style="width:300px">
	<?php 
		$sql = mysqli_query($db_conn, "SHOW DATABASES WHERE `Database` LIKE '%elementech%';");
		while ($row = $sql->fetch_assoc()){
		echo "<option value=". $row['Database'] .">" . $row['Database'] . "</option>";
		}
		?>
	</select>
	<span class="info"></span></li>
	<li>Database Username: &nbsp; <input type="text" name="database_username" style="width:300px" value=""/> <span class="info"></span></li>
	<li>Database Password: &nbsp;&nbsp; <input type="text" name="database_password" style="width:300px" value=""/> <span class="info"></span></li>
	<li>Submit: <input type="submit" value="Submit Data" style="float:right" onClick="return confirm('Are you sure to submit?')"></li>
	</ul>
	</div>
	</div>
	<div class="copyright">
	&copy 2019 <a href="#">Ari Perez</a>. All Rights Reserved.
	</div>
	</form>
</body>
