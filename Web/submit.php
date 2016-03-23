<!DOCTYPE html>
<html>
<head>
	<title>Thank You!</title>
	<link rel="stylesheet" type="text/css" href="menu.css"/>
</head>

<body>
<?php
	$type = $_POST["type"];
	
	if (strcmp($type, "pickup") == 0) {
		// get form input
		$returning = "no";
		if(isset($_POST['returningcustomer'])) {
			$returning = "yes";
		}
		$firstname = strip_tags(stripslashes($_POST["firstname"]));
		$lastname = strip_tags(stripslashes($_POST["lastname"]));
		$DOB = strip_tags(stripslashes($_POST["DOB"]));
		
		// add form input to database
		// should do something to make the password more secure here...
		$db = new mysqli('localhost', 'root', '', 'kiosk_queue');
		if ($db->connect_error):
		   die ("Could not connect to db " . $db->connect_error);
		endif;
		$query = "INSERT INTO queue VALUES (null, '$type', '$firstname', '$lastname', '$DOB', '', '$returning', '')";
		$db->query($query);
		
		// return main page
		include("main_menu.html");
	}
	else if (strcmp($type, "dropoff") == 0) {
		// get form input
		$returning = "no";
		if(isset($_POST['returningcustomer'])) {
			$returning = "yes";
		}
		$relationship = strip_tags(stripslashes($_POST["relationship"]));
		$insurance_number = strip_tags(stripslashes($_POST["insurance"]));
		$DOB = strip_tags(stripslashes($_POST["DOB"]));
		
		// add form input to database
		// should do something to make the password more secure here...
		$db = new mysqli('localhost', 'root', '', 'kiosk_queue');
		if ($db->connect_error):
		   die ("Could not connect to db " . $db->connect_error);
		endif;
		$query = "INSERT INTO queue VALUES (null, '$type', '', '', '$DOB', '$relationship', '$returning', $insurance_number)";
		$db->query($query);
		
		// return main page
		include("main_menu.html");
	}
	else {
		echo "error";
	}
?>
</body>
</html>