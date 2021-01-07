<?php

include "myAutoLoader.php";

$mam = new TeacherController();
$mam->createClass($_POST["id"], $_POST["name"], $_POST["time"], $_POST["cost"]);

?>


