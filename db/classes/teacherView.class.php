<?php

class TeacherView extends TeacherModel{


    public function returnTeacher($id){
        $result = $this->getTeacher($id);
        return $result;
    }

    public function showTeacher($id){
        $result = $this->getTeacher($id);
        $thms = $this->getAllThemes($id);
        
        if($result){
            echo '
            <h3>General info</h3>
            <label for="first_name">First name</label>
            <input name="first_name" id="first_name" type="text" class="add_std_inp" value="'.$result["first_name"].'" required>
            
            <label for="last_name">Last name</label>
            <input name="last_name" id="last_name" type="text"class="add_std_inp" value="'.$result["last_name"].'" required>

            <label for="gender">Gender</label>
            <select name="gender" name="" id="gender" class="add_std_inp"  value="'.$result["gender"].'" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            </select>
            <label for="phone">Phone number</label>
            <input name="phone" id="phone" type="phone" class="add_std_inp" value="'.$result["phone"].'" required>
            
            <label for="email">e-mail</label>
            <input name="email" id="email" type="email" class="add_std_inp" value="'.$result["email"].'" required>
            
           
            <div class="pr_ln">  
                <div class="pr_ln__">  
                    <div class="sec_info classes">         
                        <h3>Classes</h3>
                        <div class="showclasses">';
                        $this->showClasses("1");
                        echo'</div>
                    </div>
                </div>
                <div class="std_prgLngs std_prgLngs_">
                    <button type="button" class="std_prgLngs_btn" assignment="add_close"></button>
                </div>
            </div>

            <div class="sec_info">
                <h3>Themes</h3>
                <div class="themes_stngs">
                    <div class="themes_displayed">
                    
                    ';
                        for($i=0;$i<count($thms);$i++){
                            $selected = "no";
                            $selected = ($thms[$i]["id"] == $this->getSettings($id)["themes_id"]) ? "yes" : "no";
                            echo ' 
                            <div class="thm_view" selected="'.$selected.'" theme_id="'.$thms[$i]["id"].'">
                                <div class="thm_bck" style="background-color:'.$thms[$i]["primary_color"].'">
                                    <span class="thm_text"  style="color:'.$thms[$i]["primary_font_color"].'">'.$thms[$i]["name_"].'</span>
                                    <div class="thm_box" style="background-color:'.$thms[$i]["secondary_color"].'">
                                        <div class="thm_text_box" style="color:'.$thms[$i]["primary_font_color"].';border-color:'.$thms[$i]['secondary_font_color'].'">AaaaBbbCcc</div>
                                        <div class="thm_text_box thm__text_box_" style="background-color:'.$thms[$i]['secondary_font_color'].';border-color:'.$thms[$i]['secondary_font_color'].'; color:#ffffff;">AaaaBbbCcc</div>
                                    </div>
                                    <div class="thm_box" style="background-color:'.$thms[$i]["secondary_color"].'">
                                        <span class="thm_text2"  style="color:'.$thms[$i]["secondary_font_color"].'">AaaaBbbCcc</span>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                        ;
                    echo'
                        <input class="theme_inp_sel" id="theme_selected" name="theme_selected" type="hidden">
                        
                        <div class="thm_view_add">
                            <div class="thm_bck_add">
                                <button type="button" class="btn_theme_add"></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bott_set_dec">
                <button class="add_std_btn_stngs" name="add_std_btn_sett" type="submit">Save</button>
                <button class="add_std_cls" type="button">Discard</button>
            </div>
            ';
        }
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
        $teacher = $this->getTeacher($id);
        $settings = $this->getSettings($teacher["id"]);
        $thm = $this->getTheme($settings["themes_id"]);
        return $thm["name_"]; 
    }

    public function returnSettings($id){
        $teacher = $this->getTeacher($id);
        $settings = $this->getSettings($teacher["id"]);
        return $settings["id"]; 
    }

    public function showClasses($id){
        $classes = $this->getAllClasses($id);
        if($classes){
            foreach($classes as $class){
                echo '
                <span owned="yes" class="std_prgLngs">'.$class["name_"].'<span class="std_prgLngs_cls" onclick="removeClass()"> <input type="hidden" value="'.$class["id"].'"></span></span>
                ';
            } 
        }
    }

    public function showAllClassesFromAllTeachers(){
        $classes = $this->getAllClassesFromAllTeachers();
        return $classes;
    }

    public function showClassLike($name){
        $class = $this->getClassLike($name);
        return $class;
    }

}
