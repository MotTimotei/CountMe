<?php
include "../myAutoLoader.php";

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

?>