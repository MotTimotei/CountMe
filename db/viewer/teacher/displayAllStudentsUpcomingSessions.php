<?php
include "../../myAutoLoader.php";

$results = new TeacherView();
$students = new StudentsView();
$sessions = $results->returnAllUpcomingSessionsDay('2021-01-24');
if(!$sessions) echo 'No sessions yet!';
else 
    $a = 0;
    $length = 1440;
    echo '<svg width="'.$length.'"> <line x1="0" y1="100" x2="'.$length.'" y2="100" style="stroke:var(--color-text);stroke-width:2"/>';
     foreach($sessions as $session){
        $student_class_id = $students->returnStudentBasedOnSessionStudent_class_id($session['student_class_id']);
        $student = $students->returnStudent($student_class_id['students_id']);
        $session_date_time = new DateTime($session['session_data_sch']);
        $now_date_time = new DateTime('NOW');
        
        $locOnDay = $session_date_time->format('i') + $session_date_time->format('H') * 60;

        $a = $locOnDay;
        
        //echo $session_date_time->format('H:i').'<br>';
            echo '<text x="'.$a.'" y="60" fill="var(--color-text)">'.$locOnDay.'</text>';
            echo '<circle cx="'.$a.'" cy="100" r="10" fill="#FF6F6F" stroke="var(--bg-panel)" stroke-width="6" />';
            echo '<circle cx="'.$a.'" cy="100" r="5" fill="var(--bg-panel)" />';
            echo '<polygon points="'.($a-5).',105 '.$a.',110 '.($a+5).',105" style="fill:#FF6F6F;" />';
            echo '<text x="'.($a-14).'" y="140" transform="rotate(-10,'.($a-14).',130)" fill="var(--color-text)">'.$session_date_time->format('H:i').'</text>';
        // echo '<circle cx="'.$a.'" cy="100" r="10" fill="var(--color-text)" stroke="var(--bg-panel)" stroke-width="6" />';
    }
?>