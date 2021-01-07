<?php

class StudentsController extends StudentsModel{

    public function createStudent($first_name, $last_name, $gender, $phone, $email){
        $this->setStudent($first_name, $last_name, $gender, $phone, $email);
    }

    public function createStudentClass($student_id, $teacher_class_id){
        $this->setStudentClass($student_id, $teacher_class_id);
    }
}

?>