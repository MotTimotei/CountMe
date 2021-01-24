<?php
include '../../myAutoLoader.php';

$result = new TeacherView();
$teacher = $result->returnTeacher('1');
$thms = $result->returnAllThemes('1');
if($teacher){
    echo '
    <h3>General info</h3>
    <label for="first_name">First name</label>
    <input name="first_name" id="first_name" type="text" class="add_std_inp" value="'.$teacher["first_name"].'" required>
    
    <label for="last_name">Last name</label>
    <input name="last_name" id="last_name" type="text"class="add_std_inp" value="'.$teacher["last_name"].'" required>

    <label for="gender">Gender</label>
    <select name="gender" name="" id="gender" class="add_std_inp"  value="'.$teacher["gender"].'" required>
        <option value="M">Male</option>
        <option value="F">Female</option>
        <option value="O">Other</option>
    </select>
    <label for="phone">Phone number</label>
    <input name="phone" id="phone" type="phone" class="add_std_inp" value="'.$teacher["phone"].'" required>
    
    <label for="email">e-mail</label>
    <input name="email" id="email" type="email" class="add_std_inp" value="'.$teacher["email"].'" required>
    
    
    <div class="pr_ln">  
        <div class="pr_ln__">  
            <div class="sec_info classes">         
                <h3>Classes</h3>
                <div class="showclasses">';
                //$this->showClasses("1");
                echo'</div>
            </div>
        </div>
        <div class="std_prgLngs std_prgLngs_">
            <button type="button" class="std_prgLngs_btn" onclick="openOrClose(this)" assignment="add_close"></button>
        </div>
    </div>

    <div class="sec_info">
        <h3>Themes</h3>
        <div class="themes_stngs">
            <div class="themes_displayed">
            
            ';
                for($i=0;$i<count($thms);$i++){
                    $selected = "no";
                    $selected = ($thms[$i]["id"] == $result->returnSettings($id)["themes_id"]) ? "yes" : "no";
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
    </div>
    ';
}

?>