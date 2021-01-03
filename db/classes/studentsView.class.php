<?php

class StudentsView extends StudentsModel{

    public function showStudents(){
        $results = $this->getAllStudents();
        if(!$results){
            echo '
            <span>No students yet...</span>
            <a href="students.php">Start to add students!</a>';
        }
        else{
            echo '<ul class="all_students">';
            foreach($results as $result){
                echo '<li payd="yes"><a href="student.php?id='.$result["id"].'">' . $result['id'].". ".$result['last_name']." ".$result['first_name'].'</a></li>';
            }
            echo '</ul>';
        }

    }
}
