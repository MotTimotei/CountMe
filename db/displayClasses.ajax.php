<?php

include "myAutoLoader.php";

$mam = new TeacherView();
$mam->showClasses($_GET["id"]);

?>


