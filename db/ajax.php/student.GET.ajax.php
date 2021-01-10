<?php

include "../myAutoLoader.php";

$func = $_GET['func'];

if($func == 'displayAvailableClasses') displayAvailableClasses();
else if($func == 'displayOwnedClasses') displayOwnedClasses();
else if($func == 'displayClassSessionTimeAndCost') displayClassSessionTimeAndCost();
else if($func == 'displayAddSessionClass') displayAddSessionClass();

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





function displayAddSessionClass(){
    $a = $_GET['id'];
    $results = new StudentsView();
    $classes = $results->returnStudentAllClasses($a);
    if(!$classes) echo 'No classes yet!<br>Add class!';
    else{
        echo '
        <label for="getClasses">Choose class</label>
        <select class="getClasses session_elem" name="getClasses" id="getClasses" onchange="showClassSessionTimeAndCost(this)">';

        foreach($classes as $class){
            $class2 = $results->returnClassNameBasedOnTeacher_class_id($class["teacher_class_id"]);
            echo '<option value="'.$class2["id"].'">'.$class2["name_"].'</option>';
        }
        echo '</select>
        <div class="session_details"></div>';
    }
}

function displayClassSessionTimeAndCost(){
    $a = $_GET['class_id'];
    $result = new TeacherView();
    $class = $result->returnClass($a);
    if(!$class) echo 'There is an error!';
    else echo '
        <label for="session_time_add_session">Session time</label>
        <input class="session_elem" type="number" id="session_time_add_session" value="'.$class["session_time"].'" required>min

        <label for="hour_cost_add_session">Hour/cost</label>
        <input class="session_elem" type="number" id="hour_cost_add_session" value="'.$class["hour_cost"].'" required>lei
        
        <label for="paid_add_session">Paid</label>
        <input class="session_elem" type="number" id="paid_add_session" value="" required>lei

        <label for="date_add_session">Date</label>
        <input class="session_elem" id="date_add_session" name="date_add_session" type="date" required>

        <label for="time_add_session">Time</label>
        <input class="session_elem" id="time_add_session" name="time_add_session" type="time" required>

        <button type="button" class="" onclick="setSession()">Add Session</button>
        ';
}



?>