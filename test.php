<?php
include_once("clsTask.php");
include_once ("clsDB.php");

$DB = new clsDB();

$A = new clstask($DB);

$A->Create();
$A->Name = "Auge";
$A->Update();

print $A->Name;
print "<br>" . strlen($A->TaskRecID);
unset($A);
unset($DB);

?>
<br>Check task for something
