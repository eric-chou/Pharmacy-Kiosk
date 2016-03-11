<!DOCTYPE html>
<html>
<head>
<title>Drop Off</title>
<link rel="stylesheet" type="text/css" href="menu1.css"/>
<script>
function goBack() {
    window.history.back();
}
</script>
</head>
<body>

<table id="box" border="1">
<form method="post" action="submit.php">
<tr><td><label>Returning Customer <input type="checkbox" name="returningcustomer"></label></td></tr>
<tr><td>
<label>Relationship to Patient: <select name="relationship">
<option value="self">Self</option>
<option value="relative">Relative</option>
<option value="friend">Friend</option>
<option value="other">Other</option>
</select></label>
</td></tr>
<tr><td><label>Insurance Card Number: <input type="text" name="insurance"></label></td></tr>
<tr><td><label>Date of Birth: <input type="date" name="DOB"></label></td></tr>
<tr><td><input type="submit" value="Submit"> <button onclick="goBack()">Back</button></td></tr>
<input type="hidden" name="type" value="dropoff">
</form>
</table>

</body>
</html>
