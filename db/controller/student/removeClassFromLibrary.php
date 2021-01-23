<?php
include "../../myAutoLoader.php";

$a = $_POST['student_id'];
$b = $_POST['teacher_class_id'];
$results = new StudentsView();
$results2 = new StudentsController();
$classes = $results->returnStudentClassID($a, $b);
foreach($classes as $class){
    $results2->removeStudentClass($class['id']);
    echo $class['id'];
}

?>