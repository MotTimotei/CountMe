<?php

include "myAutoLoader.php";

$function = $_GET['func'];

//Check for functions
if($function = "displayAvailableClasses") displayAvailableClasses();

function displayAvailableClasses(){
    $a = $_GET['class'];
    $b = $_GET['student'];
    $results = new TeacherView();
    $classes = $results->showClassLike($a);
    if(!$classes){
        echo '<span class="class_answ_msg">No classes found!  ';
    }
    else{
        echo '
        <ul class="add_classes_ul">
            <li class="add_classes_li"><span class="add_classes_li_class">Classes</span><span class="add_classes_li_teacher">Teacher</span></li>
        ';
        foreach($classes as $class){
            $teacher = $results->returnTeacher($class["teacher_id"]);
            if(!checkForClass($class['id'], $b)){
            echo  ' <li class="add_classes_li">
                        <span owned="no" class="std_prgLngs __std_prgLngs__" onclick="addToLibrary(this)">'.$class["name_"].'
                            <span class="std_prgLngs_cls std_prgLngs_new" >
                                <input class="class_name" type="hidden" value="'.$class["id"].'">
                            </span>
                        </span> 
                        <span class="add_classes_li_teacher">'.$teacher["first_name"].' '.$teacher["last_name"].'
                        <input class="teacher_class_name" type="hidden" value="'.$class["teacher_id"].'">
                        </span>
                    </li>';
            } else{
            echo  ' <li class="add_classes_li">
                        <span owned="yes" class="std_prgLngs __std_prgLngs__" onclick="removeFromLibrary(this)">'.$class["name_"].'
                            <span class="std_prgLngs_cls std_prgLngs_new" >
                                <input class="class_name" type="hidden" value="'.$class["id"].'">
                            </span>
                        </span> 
                        <span class="add_classes_li_teacher">'.$teacher["first_name"].' '.$teacher["last_name"].'
                        <input class="teacher_class_name" type="hidden" value="'.$class["teacher_id"].'">
                        </span>
                    </li>';
            }
        }
    
        echo '</ul>';
    }

}

function checkForClass($cuv, $cuv2){
//  id | teacher_id | name_ | session_time | hour_cost |
//  id students_id | teacher_class_id
    $classStd = new StudentsView();
    return ($classStd->returnAnyStudenInfo('student_class', 'teacher_class_id', $cuv, 'students_id', $cuv2));

}

?>