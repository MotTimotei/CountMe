<?php
include "../myAutoLoader.php";

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

?>