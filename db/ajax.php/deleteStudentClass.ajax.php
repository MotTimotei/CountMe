<?php
include "../myAutoLoader.php";

removeClassFromLibrary();

function removeClassFromLibrary(){
    $a = $_GET['student_id'];
    $b = $_GET['teacher_class_id'];
    $results = new StudentsView();
    $results2 = new StudentsController();
    $classes = $results->returnStudentClassID($a, $b);
    foreach($classes as $class){
        $results2->removeStudentClass($class['id']);
    }

}
?>