<?php
include "../../myAutoLoader.php";

$session = new StudentsController();
$student_class= new StudentsView();
$student_class_id = $student_class->returnStudentClassID($_POST['student_id'], $_POST['teacher_class_id']);
$session->setSessionDB($student_class_id[0]['id'], $_POST['session_time'], $_POST['hour_cost'], $_POST['paid'], $_POST['session_date_sch']);
echo $_POST['student_id']. $_POST['teacher_class_id'].$_POST['session_time'].$_POST['hour_cost'].$_POST['paid'].$_POST['session_date_sch']
?>