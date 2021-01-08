<?php

class StudentsView extends StudentsModel{

    public function showStudents(){
        $results = $this->getAllStudents();
        if(!$results)echo '
            <span>No students yet...</span>
            <a href="students.php">Start to add students!</a>';
        else{
            echo '<ul class="all_students">';
            foreach($results as $result){
                echo '<li payd="yes"><a href="student.php?id='.$result["id"].'">' . $result['id'].". ".$result['last_name']." ".$result['first_name'].'</a></li>';
            }
            echo '</ul>';
        }

    }

    public function showAllStudents(){
        $results = $this->getAllStudents();
        if(!$results) echo 'No students yet!';
        else {
            echo '<select class="getStudents" name="getStudents">';
            foreach($results as $result){
                echo '<option value="'.$result["id"].'">'.$result["first_name"].'</option>';
            }
            echo '</select>';
        }
    }

    public function showStudent($id){
        $result = $this->getStudent($id);
        if(!$result) echo 'Nothing to display!';
        else {
            echo '
            <select>
                <option>'.$result["first_name"].'</option>
                <option>'.$result["last_name"].'</option>
                <option>'.$result["gender"].'</option>
                <option>'.$result["phone"].'</option>
                <option>'.$result["email"].'</option>
            </select>
            ';
        }
    }

    public function returnAnyStudenInfo($table, $colunmn, $cuv, $column2, $cuv2){
        $results = $this->getAnyStudentInfo($table, $colunmn, $cuv, $column2, $cuv2);
        return $results;
    }

    public function returnStudentClassID($students_id, $teacher_class_id){
        return $this->getStudentClassID($students_id, $teacher_class_id);
    }

}
