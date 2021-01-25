<?php
include '../../myAutoLoader.php';

$teacherObj = new TeacherView();
$teacherController = new TeacherController();
$value = $_POST['theme_id'];
$id = $teacherObj->returnSettings($_POST['id'])['id'];

print_r($id) ;
$teacherController->updateTeacher("teacher_settings", "themes_id", $value, $id);

?>