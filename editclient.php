<!doctype html>
<?php
include_once "clsUtil.php";

$Util = new clsUtil();

$DB_DRIVER = "mysql";
$DB_HOST="localhost";
$DB_NAME="timekeeper";
$DB_LOGIN="root";
$DB_PASS="";
$Connection = $DB_DRIVER.":host=".$DB_HOST.";dbname=".$DB_NAME;

try {
$DB = new PDO($Connection, $DB_LOGIN, $DB_PASS);
}

catch(PDOException $e)
{
    die("Error: ".$e->getMessage());
}

?>
<html>
<header>
<title>Edit Clients</title>
</header>
<?php include "incMenu.php" ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$SQL="insert into client (ClientRecID, Name) values ('" . $Util->RandomString(30) . "','" . $_REQUEST['NewName'] . "');";
	echo $SQL;
	$Statement = $DB->prepare($SQL);
	$Statement->execute();
	echo "Post accepted" . $_SERVER["REQUEST_METHOD"] . "<br>";
}
?>
<body  class="claro">
<div id="wrapper"></div>

<table border=2>
<tr>
<td>
<form method="POST">
New Client

Name: <input type="text" size="30" name="NewName"><input type="Submit">
</form>
</td>
</tr>
</table>
<br><br>
Existing Clients
<br>
<?php

$SQL="select * from client order by Name";
$sth = $DB->prepare($SQL);
$sth->execute();

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
?>
<input name="<?php echo $row['ClientRecID']?>" value="<?php echo $row['Name'] ?>"> <?php echo "<br>"; ?>
<?php
};
?>
</body>
</html>
