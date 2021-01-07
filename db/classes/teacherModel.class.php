<?php

class TeacherModel extends Db{
    protected function getTeacher($id){
        $sql = "SELECT * FROM teacher WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }

    protected function getAllTeachers(){
        $sql = "SELECT * FROM teacher";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetch();
        return $results;
    }

    protected function getSettings($id){
        $sql = "SELECT * FROM teacher_settings WHERE teacher_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }
    
    protected function getAllThemes($id){
        $sql = "SELECT * FROM themes WHERE teacher_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        return $result;

    }

    protected function getTheme($id){
        $sql = "SELECT * FROM themes WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }

    protected function getAllClasses($id){
        $sql = "SELECT * FROM teacher_class WHERE teacher_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getAllClassesFromAllTeachers(){
        $sql = "SELECT * FROM teacher_class";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getClassLike($name){
        $sql = "SELECT * FROM teacher_class WHERE name_ like '%$name%'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function setTeacher($first_name, $last_name, $gender, $phone, $email){
        $sql = "INSERT INTO teacher (first_name, last_name, gender, phone, email)
                VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $last_name, $gender, $phone, $email]);
    }

    protected function setUpdateTeacher($table_name, $collumn, $value, $id){
        $sql = "UPDATE $table_name SET $collumn = $value WHERE $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$value]);
    }

    protected function setClass($teacher_id, $name, $session_time, $hour_cost){
        $sql ="INSERT INTO teacher_class (teacher_id, name_, session_time, hour_cost)
                VALUES (?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$teacher_id, $name, $session_time, $hour_cost]);
    }

    protected function deleteClass($id){
        $sql = "DELETE FROM teacher_class WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}