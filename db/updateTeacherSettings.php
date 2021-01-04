<?php
include 'myAutoLoader.php';
$teacherObj = new TeacherView();
$teacherController = new TeacherController();
$table = "teacher_settings";
$collumn = "themes_id";
$value = $_POST['theme_selected'];
$id = $teacherObj->returnSettings("1");


$teacherController->updateTeacher("teacher_settings", "themes_id", $value, $id);

header("Location: ../?message=success?1=$table?2=$collumn?3=$value?4=$id");
?>