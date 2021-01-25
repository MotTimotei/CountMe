<?
include '../../myAutoLoader.php';

$result = new TeacherView();
$thms = $result->returnAllThemes($_GET['id']);
echo 
'
<div class="themes_displayed">';
for($i=0;$i<count($thms);$i++){
    $selected = "no";
    $selected = ($thms[$i]["id"] == $result->returnSettings($_GET['id'])["themes_id"]) ? "yes" : "no";
    echo ' 
    <div class="thm_view" selected="'.$selected.'" theme_id="'.$thms[$i]["id"].'" onclick="applyTheme(this)">
        <div class="thmview_ld"></div>
        <div class="thmview_ld__">
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
';

?>