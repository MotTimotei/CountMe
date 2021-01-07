<?php

include "../myAutoLoader.php";

$mam = new StudentsView();
$mam->showStudent($_GET['q']);


?>