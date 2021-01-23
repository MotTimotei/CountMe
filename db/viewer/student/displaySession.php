<?php
include "../../myAutoLoader.php";

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
print_r(json_encode($session));
    /* echo'
    <div class="sec_info organizeBox organizeBox__">
        <h2>'.$date->format('D - d M Y').'</h2>
        <span>Teacher: '.$teacher['first_name'].' '.$teacher['last_name'].'</span>    
        <span>Class: '.$class['name_'].'</span>
        <span>Paid: '.returnIfPaid($session['session_time'], $session['price_hour'], $session['paid']).'</span>
        <span>To pay: '.$debt.'</span>
        <span>Session placed: '.$date_plc->format('D - d M Y - H:m').'</span>
        <span>Session date: '.$date->format('D - d M Y - H:m').'</span>
        <span>Time remaining till session: '.$now->format('D - d M Y - H:m').'</span>
    </div>';*/

function returnIfPaid($session_time, $price_hour, $paid){
    $debt = ($session_time / 60) * $price_hour - $paid;
    if($debt == 0) return '<span paid="yes">Yes</span>';
    else if($paid == 0) return '<span paid="no">No</span>';
    else return '<span paid="partially">Partially</span>';
}    
?>