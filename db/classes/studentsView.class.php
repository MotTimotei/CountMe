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
    public function returnAllStudents(){
        return $this->getAllStudents();
    }
    public function returnStudent($id){
        return $this->getStudent($id);
    }
    public function returnStudentBasedOnSessionStudent_class_id($id){
        return $this->getStudentBasedOnSessionStudent_class_id($id);
    }

    public function returnStudentAllClasses($id){
        return $this->getStudentAllClasses($id);
    }

    public function returnStudentSessions($student_class_id){
        return $this->getStudentSessions($student_class_id);
    }

    public function returnAllSessions(){
        return $this->getAllSessions();
    }

    function returnSession($id){
        return $this->getSession($id);
    }

    public function returnOwnedClasses($student_id){
        return $this->getOwnedClasses($student_id);
    }
    public function returnClassNameBasedOnTeacher_class_id($id){
        return  $this->getClassNameBasedOnTeacher_class_id($id);
    }

    public function returnAnyStudenInfo($table, $colunmn, $cuv, $column2, $cuv2){
        return $this->getAnyStudentInfo($table, $colunmn, $cuv, $column2, $cuv2);
    }

    public function returnStudentClassID($students_id, $teacher_class_id){
        return $this->getStudentClassID($students_id, $teacher_class_id);
    }

    public function returnStudentClass($id){
        return $this->getStudentClass($id);
    }
}
