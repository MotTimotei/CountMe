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
    protected function getStudentBasedOnSessionStudent_class_id($id){
        $sql = "SELECT * FROM student_class WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch();
        return $result;
    }

    protected function getOwnedClasses($student_id){
        $sql = "SELECT * FROM student_class WHERE students_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_id]);
        
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getClassNameBasedOnTeacher_class_id($id){
        $sql = "SELECT * FROM teacher_class WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        
        $results = $stmt->fetch();
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
    protected function getStudentAllClasses($student_id){
        $sql = "SELECT * FROM student_class WHERE students_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_id]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getStudentSessions($student_class_id){
        $sql = "SELECT * FROM sessions WHERE student_class_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_class_id]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getAllSessions(){
        $sql = "SELECT * FROM sessions";
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

    protected function setStudentClass($student_id, $teacher_class_id){
        $sql = "INSERT INTO student_class (students_id, teacher_class_id)
                VALUES (?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_id, $teacher_class_id]);

    }

    protected function setSession($student_class_id, $session_time, $price_hour, $paid, $session_date_sch){
        $sql = "INSERT INTO sessions (student_class_id, session_time, price_hour, paid, session_data_sch, session_data_act)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_class_id, $session_time, $price_hour, $paid, $session_date_sch, $session_date_sch]);
    }

    protected function deleteStudentClass($id){
        $sql = "DELETE FROM student_class WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

}

?>