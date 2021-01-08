<?php

class StudentsModel extends Db{

    protected function getStudent($id){
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }

    protected function getAllStudents(){
        $sql = "SELECT * FROM students";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getAnyStudentInfo($table, $colunmn, $cuv, $column2, $cuv2){
        $sql = "SELECT * FROM  $table WHERE ($colunmn = ? AND $column2 = ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$cuv, $cuv2]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getStudentClassID($students_id, $teacher_class_id){
        $sql = "SELECT id FROM student_class WHERE (students_id = ? AND teacher_class_id = ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$students_id, $teacher_class_id]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setStudent($first_name, $last_name, $gender, $phone, $email){
        $sql = "INSERT INTO students (first_name, last_name, gender, phone, email)
                VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $last_name, $gender, $phone, $email]);
    }

    protected function setStudentClass($student_id, $teacher_class_id){
        $sql = "INSERT INTO student_class (students_id, teacher_class_id)
                VALUES (?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_id, $teacher_class_id]);

    }

    protected function deleteStudentClass($id){
        $sql = "DELETE FROM student_class WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    
}

?>