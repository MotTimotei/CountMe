<?php

class TeacherView extends TeacherModel{


    public function returnTeacher($id){
        return $this->getTeacher($id);
    }
    public function returnAllThemes($id){
        return $this->getAllThemes($id);
    }

    public function returnTheme($id){
        return $this->getTheme($id);
    }
 
    public function returnEntireTheme($id){
        $teacher = $this->returnTeacher($id);
        $settings = $this->getSettings($teacher["id"]);
        $thm = $this->getTheme($settings["themes_id"]);
        return $thm; 
    }

    public function returnSettings($id){
        $teacher = $this->getTeacher($id);
        $settings = $this->getSettings($teacher["id"]);
        return $settings; 
    }
    public function returnClasses($id){
        return $this->getAllClasses($id);
    }

    public function showAllClassesFromAllTeachers(){
        return $this->getAllClassesFromAllTeachers();
    }

    public function showClassLike($name){
        return $this->getClassLike($name);
    }

    public function returnClass($id){
        return $this->getClass($id);
    }

    public function returnAllStudentsUpcomingSessions(){
        return $this->getAllStudentsUpcomingSessions();
    }
    
    public function returnAllSessionsByYear($year){
        return $this->getAllSessionsByYear($year);
    }

    public function returnAllUpcomingSessionsDay($day){
        return $this->getAllUpcomingSessionsDay($day);
    }

}
