<?php

include "../myAutoLoader.php";

$func = $_GET['func'];

switch($func){
    case 'displayAvailableClasses':
        displayAvailableClasses();
        break;
    case 'displayOwnedClasses';
        displayOwnedClasses();
        break;
    case 'displayClassSessionTimeAndCost';
        displayClassSessionTimeAndCost();
        break;
    case 'displayAddSessionClass';
        displayAddSessionClass();
        break;
    case 'displayUpcomingSession';
        displayUpcomingSession();
        break;
    case 'displaymonthlyIncomeDetails';
        displaymonthlyIncomeDetails();
        break;
    case 'displaySession';
        displaySession();
        break;
    default:
        error();
}

function error(){
    echo 'The function not exists!';
}
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
    $classes = $results->returnOwnedClasses($a);
    if(!$classes) echo 'No classes yet!<br><button type="button" onclick="close_open()">Add class!</button>';
    else{
        echo '
        <label for="getClasses">Choose class</label>
        <select class="getClasses session_elem" name="getClasses" id="getClasses" onchange="showClassSessionTimeAndCost(this)">
            <option style="opcaity:.4;">Choose class</option>';
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
    if($class == '') echo '';
    else if(!$class)  echo 'There is an error!';
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

function displayUpcomingSession(){
    $student_id = $_GET['student_id'];
    $mnt = ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $results = new TeacherView();
    $students = new StudentsView();
    $sessions = $results->returnAllStudentsUpcomingSessions();
    if(!$sessions) echo 'No sessions yet!';
    else 
        foreach($sessions as $session){
            $student_class_id = $students->returnStudentBasedOnSessionStudent_class_id($session['student_class_id']);
            $student = $students->returnStudent($student_class_id['students_id']);
            $session_date_time = new DateTime($session['session_data_sch']);
            $now_date_time = new DateTime('NOW');
            if($student['id'] === $student_id)
                if($session_date_time>$now_date_time)
                echo '
                    <div class="info_box tltp">
                        <span class="tltptxt">'.$student['last_name'][0].'. '.$student['first_name'].'</span>
                        <a href="student.php?id='.$student['id'].'&session='.$session['id'].'" >'.$session_date_time->format('d M Y').'
                        </a>
                    </div>';
        }
}

function displaymonthlyIncomeDetails(){
    $student_id = $_GET['student_id'];
    $month = $_GET['month'];
    $mnth_incm = 0;
    $debt = 0;
    $today = new DateTime('NOW');
    $results = new StudentsView();
    $StudentAllClasses = $results->returnStudentAllClasses($student_id);
    foreach($StudentAllClasses as $StudentClass){
        $session = $results->returnStudentSessions($StudentClass['id']);
        foreach($session as $sess){
            $session_date = new DateTime($sess['session_data_act']);
            if($session_date->format('m') == $month)
                $mnth_incm += ($sess['session_time'] / 60) * $sess['price_hour'] - $sess['paid'];
            if($session_date < $today)
                $debt += ($sess['session_time'] / 60) * $sess['price_hour'] - $sess['paid'];
        }    
    }
    echo '
        <h1> Remaining monthly income: '.$mnth_incm.'ron</h1>
        <h1> Debt: '.$debt.'ron';
}

function displaySession(){
    $session_id = $_GET['session_id'];
    $result = new StudentsView();
    $session = $result->returnSession($session_id);
    $student_class = $result->returnStudentClass($session['student_class_id']);
    $result2 = new TeacherView();
    $class = $result2->returnClass($student_class['id']);
    $teacher = $result2->returnTeacher($class['teacher_id']);
    $debt = ($session['session_time'] / 60) * $session['price_hour'] - $session['paid'];
    $date = new DateTime($session['session_data_act']);
    $date_plc = new DateTime($session['session_data_plc']);
    $now = New DateTime('NOW');
    $time_remaining = $date->diff($now);
    $interval = $time_remaining->format("%a days, %h hours, %i minutes, %s seconds");
        echo'
        <div class="sec_info organizeBox organizeBox__">
            <h2>'.$date->format('D - d M Y').'</h2>
            <span>Teacher: '.$teacher['first_name'].' '.$teacher['last_name'].'</span>    
            <span>Class: '.$class['name_'].'</span>
            <span>Paid: '.returnIfPaid($session['session_time'], $session['price_hour'], $session['paid']).'</span>
            <span>To pay: '.$debt.'</span>
            <span>Session placed: '.$date_plc->format('D - d M Y - H:m').'</span>
            <span>Session date: '.$date->format('D - d M Y - H:m').'</span>
            <span>Time remaining till session: '.$now->format('D - d M Y - H:m').'</span>
        </div>';
}

function returnIfPaid($session_time, $price_hour, $paid){
    $debt = ($session_time / 60) * $price_hour - $paid;
    if($debt == 0) return '<span paid="yes">Yes</span>';
    else if($paid == 0) return '<span paid="no">No</span>';
    else return '<span paid="partially">Partially</span>';
}

?>