<?php

class TeacherView extends TeacherModel{


    public function returnTeacher($id){
        return $this->getTeacher($id);
    }
    public function returnAllThemes($id){
        return $this->getAllThemes($id);
    }

    public function showTheme($id){
        $teacher = $this->getTeacher($id);
        $settings = $this->getSettings($teacher["id"]);
        $thm = $this->getTheme($settings["themes_id"]);
        
        if($teacher && $settings && $thm){
            echo
            '
            html[data-theme="'.$thm["name_"].'"]{
                --bg:'.$thm["primary_color"].';
                --bg-panel:'.$thm["secondary_color"].';
                --color-heading:'.$thm["third_color"].';
                --color-text:'.$thm["primary_font_color"].';
                --text-color:'.$thm["secondary_font_color"].';
                }
            ';
        }
    }
 
    public function returnTheme($id){
        $teacher = $this->returnTeacher($id);
        $settings = $this->getSettings($teacher["id"]);
        $thm = $this->getTheme($settings["themes_id"]);
        return $thm["name_"]; 
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

}
