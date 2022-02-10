<?php
// Prepare cookie so it can be associated later
include_once("clsUtil.php");
$Util = new clsUtil();
setcookie("timekeeper", $Util->RandomString(20), 0, "");
?>
<!doctype html>
<html>
<head>
<title>Timekeeper</title>
</head>
<body>
<br>
<br>
<center><h1>Time Keeper</h1></center>
<br>
<br>
<form method="POST" action="main.php">
<table width="20%" align="center">
<tr><td>Login:</td><td><input type="text" size="40"><td></tr>
<tr><td>Password:</td><td><input type="password" size="40"></td></tr>
</table>
<table align="center">
<tr><td><input type="submit" value="Enter"></td></tr>
</table>
</form>
<br>
<br>
<p align="center"><a href="http://www.amduus.com">Amduus Information Works, Inc.</a><p>
</body>
</html>
