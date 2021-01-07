<?php

class TeacherController extends TeacherModel{

    public function createTeacher($first_name, $last_name, $gender, $phone, $email){
        $this->setTeacher($first_name, $last_name, $gender, $phone, $email);
    }

    public function createClass($teacher_id, $name, $session_time, $hour_cost){
        $this->setClass($teacher_id, $name, $session_time, $hour_cost);
    }

    public function updateTeacher($table_name, $collumn, $value, $id){
        $this->setUpdateTeacher($table_name, $collumn, $value, $id);
    }

    public function removeClass($id){
        $this->deleteClass($id);
    }
    

}