<?php
include "../myAutoLoader.php";

$class = new StudentsController();
$class->createStudentClass($_POST["student_id"], $_POST["teacher_class_id"]);

?>