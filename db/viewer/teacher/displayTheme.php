<?php
include '../../myAutoLoader.php';

$result = new TeacherView();
$teacher = $result->returnTeacher($_GET['id']);
$settings = $result->returnSettings($teacher["id"]);
$thm = $result->returnTheme($settings["themes_id"]);

if($teacher && $settings && $thm){
    $json->name = $thm["name_"];
    $json->theme = 
    'html[data-theme="'.$thm["name_"].'"]{
        --bg:'.$thm["primary_color"].';
        --bg-panel:'.$thm["secondary_color"].';
        --color-heading:'.$thm["third_color"].';
        --color-text:'.$thm["primary_font_color"].';
        --text-color:'.$thm["secondary_font_color"].';
                    }';
    echo json_encode($json);
}

?>