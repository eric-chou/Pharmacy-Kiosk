<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Pitt Pharm</title>
	<link rel="stylesheet" type="text/css" href="menu.css"/>
</head>
<body>
	<!--
	<div>
		<?php
			$host = 'localhost';
			$user = 'root';
			$pass = '';
   
			$conn = mysql_connect($host, $user, $pass);
			if(! $conn ) {
				die('Could not connect: ' . mysql_error());
			}
		
			$sql = 'SELECT position FROM queue';
			mysql_select_db('test_db');
			$retval = mysql_query( $sql, $conn );
			if(! $retval ) {
				die('Could not get data: ' . mysql_error());
			}
   
			while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
				echo "Your queue number is:{$row['position']}  <br></br> Thank you!";
			}
			mysql_close($conn);
		?>
	</div>
	-->
</body>
</html>
