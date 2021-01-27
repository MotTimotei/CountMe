<?php

class StudentsView extends StudentsModel{

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

    public function returnAllSessionsByYear($year){
        return $this->getAllSessionsByYear($year);
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
