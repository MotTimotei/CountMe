<?php

class StudentsModel extends Db{

    protected function getStudent($id){
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetch();
        return $results;
    }

    protected function getAllStudents(){
        $sql = "SELECT * FROM students";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setStudent($first_name, $last_name, $gender, $phone, $email){
        $sql = "INSERT INTO students (first_name, last_name, gender, phone, email)
                VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $last_name, $gender, $phone, $email]);
    }
    
}

?>