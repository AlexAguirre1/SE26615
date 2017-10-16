<?php
require_once ("Assets/dbconn.php");
require_once ("Assets/Dogs.php");
include_once ("Assets/Header.php");
$db = dbconn();
var_dump(getDogsAsTable($db));
include_once ("Assets/footer.php");
?>