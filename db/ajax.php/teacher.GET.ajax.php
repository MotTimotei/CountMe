<?php

include "../myAutoLoader.php";

$func = $_GET['func'];

if($func == 'displayAllStudentsUpcomingSessions') displayAllStudentsUpcomingSessions();
else if($func == 'displaymonthlyIncomeDetailsAll') displaymonthlyIncomeDetailsAll();

function displayAllStudentsUpcomingSessions(){
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
            if($session_date_time>$now_date_time)
            echo '
                <div class="info_box tltp">
                    <span class="tltptxt">'.$student['last_name'][0].'. '.$student['first_name'].'</span>
                    <a href="student.php?id='.$student['id'].'&session='.$session['id'].'" >'.$session_date_time->format('d M Y').'
                    </a>
                </div>';
        }
}

function displaymonthlyIncomeDetailsAll(){
    $month = $_GET['month'];
    $mnth_incm = 0;
    $debt = 0;
    $today = new DateTime('NOW');
    $results = new StudentsView();
    $sessions = $results->returnAllSessions();
    foreach($sessions as $session){
        $session_date = new DateTime($session['session_data_act']);
        if($session_date->format('m') == $month)
            $mnth_incm += ($session['session_time'] / 60) * $session['price_hour'] - $session['paid'];
        if($session_date < $today)
            $debt += ($session['session_time'] / 60) * $session['price_hour'] - $session['paid'];
    } 
    echo '
    <h1> Remaining monthly income: '.$mnth_incm.'ron</h1>
    <h1> Debt: '.$debt.'ron';   

}


?>