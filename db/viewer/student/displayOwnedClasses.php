<?php
include "../../myAutoLoader.php";

$a = $_GET['student_id'];
$results = new StudentsView();
$classes = $results->returnOwnedClasses($a);
if(!$classes) echo '<span class="class_answ_msg">No classes yet!</span>';
    else 
        foreach($classes as $class){

            $teacher_class = $results->returnClassNameBasedOnTeacher_class_id($class["teacher_class_id"]);
            echo '
            <span owned="yes" class="std_prgLngs " >'.$teacher_class["name_"].'
                <span class="std_prgLngs_cls std_prgLngs_new" onclick="removeClassFromLibrary(this), displayOwnedClasses()" >
                    <input class="class_name" type="hidden" value="'.$teacher_class["id"].'">
                </span>
            </span> ';

        }

?>