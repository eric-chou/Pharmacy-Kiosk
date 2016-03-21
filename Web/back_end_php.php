<?php
	$db = new mysqli('localhost', 'root', '', 'kiosk_queue');
	if ($db->connect_error):
	   die ("Could not connect to db " . $db->connect_error);
	endif;
	
	$Adata = Array(); 
	$numrows = strip_tags($_POST["rows"]);
	$newrows="";
	$rr = $db->query("select * from queue");
	$resrows = $rr->num_rows;
	if ($numrows < $resrows) {
		$Adata["Type"] = "Update";
		$contents = Array();
		
		for ($i = $numrows; $i < $resrows; $i++) {
			$rr->data_seek($i);
			$curr = $rr->fetch_array();
			$currArr = Array();
			$currArr["type"] = $curr["type"];
			$currArr["first_name"] = $curr["first_name"];
			$currArr["last_name"] = $curr["last_name"];
			$currArr["date_of_birth"] = $curr["date_of_birth"];
			$currArr["relation"] = $curr["relation"];
			$currArr["returning_customer"] = $curr["returning_customer"];
			$currArr["insurance_card_number"] = $curr["insurance_card_number"];
			$contents[] = $currArr;
		}
		$Adata["Contents"] = $contents;
	}
	else {
		$Adata["Type"] = "NA";
		$Adata["Contents"] = "OK";
	}
	
	$returndata = json_encode($Adata);
	echo $returndata;
?>
