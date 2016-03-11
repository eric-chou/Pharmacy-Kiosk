<!DOCTYPE html>
<html>
<head>
<title>Pick Up</title>
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
<tr><td><label>Returning Customer <input type="checkbox" name="returningcustomer"></td></label></tr>
<tr><td><label>First Name: <input type="text" name="firstname"></label></td></tr>
<tr><td><label>Last Name: <input type="text" name="lastname"></label></td></tr>
<tr><td><label>Date of Birth: <input type="date" name="DOB"></label></td></tr>
<tr><td><input type="submit" value="Submit"> <button onclick="goBack()">Back</button></td></tr>
<input type="hidden" name="type" value="pickup"></td>
</form>
</table>

</body>
</html>