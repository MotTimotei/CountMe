<?php
include '../../myAutoLoader.php';

$result = new StudentsView();
$students = $result->returnAllStudents();

echo
'
    <ul class="all_students">
';
foreach($students as $student){
    echo
    '
        <li unpayd="no"><a href="student.php?id='.$student['id'].'">'.$student['first_name'].' '.$student['last_name'].'</a></li>
    ';
}
echo
'
    </ul>
';
?>