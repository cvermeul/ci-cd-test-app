<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<h1>CI/CD Test App</h1>
		<p>A fake dockerized app for testing CI/CD</p>
		<p>When this modification is pushed the app is automatically redeployed</p>
		<h2>User list</h2>
		<table>
		<?php
			$conn = mysql_connect($_ENV['APP_DB_HOST'], $_ENV['APP_DB_USER'], $_ENV['APP_DB_PASSWORD']);
			if (!$conn) die('Not connected : ' . mysql_error());

			$db = mysql_select_db('test', $conn); 
			if (!$db) die('Can\'t find database : ' . mysql_error());

			$result = mysql_query('SELECT * FROM test'); 
			if (!$result) die('Invalid query: ' . mysql_error());

			while($row = mysql_fetch_assoc($result)) { 
				echo '<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td></tr>'; 
			} 

			mysql_close(); 
		?> 
		</table>
	</body>
</html>