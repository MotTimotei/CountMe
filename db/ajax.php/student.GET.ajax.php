<?php

include "../myAutoLoader.php";

$func = $_GET['func'];

if($func == 'displayAvailableClasses') displayAvailableClasses();
else if($func == 'removeClassFromLibrary') removeClassFromLibrary();
else if($func == 'displayOwnedClasses') displayOwnedClasses();

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
                        <span owned="no" class="std_prgLngs __std_prgLngs__">'.$class["name_"].'
                            <span class="std_prgLngs_cls std_prgLngs_new" onclick="addToLibrary(this), showOwnedClasses">
                                <input class="class_name" type="hidden" value="'.$class["id"].'">
                            </span>
                        </span> 
                        <span class="add_classes_li_teacher">'.$teacher["first_name"].' '.$teacher["last_name"].'
                        <input class="teacher_class_name" type="hidden" value="'.$class["teacher_id"].'">
                        </span>
                    </li>';
            } else{
            echo  ' <li class="add_classes_li">
                        <span owned="yes" class="std_prgLngs __std_prgLngs__" >'.$class["name_"].'
                            <span class="std_prgLngs_cls std_prgLngs_new" onclick="removeFromLibrary(this), showOwnedClasses()">
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

function displayOwnedClasses(){

    $a = $_GET['student_id'];
    $results = new StudentsView();
    $classes = $results->returnOwnedClasses($a);
    if(!$classes) echo '<span class="class_answ_msg">No classes yet!</span>';
        else 
            foreach($classes as $class){

                $teacher_class = $results->returnClassNameBasedOnTeacher_class_id($class["teacher_class_id"]);
                echo '
                <span owned="yes" class="std_prgLngs " >'.$teacher_class["name_"].'
                    <span class="std_prgLngs_cls std_prgLngs_new" onclick="removeFromLibrary(this), showOwnedClasses()" >
                        <input class="class_name" type="hidden" value="'.$teacher_class["id"].'">
                    </span>
                </span> ';
    
            }
}



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