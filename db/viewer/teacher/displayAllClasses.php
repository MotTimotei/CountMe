<?php
include '../../myAutoLoader.php';

$mam = new TeacherView();
$results = $mam->returnClasses($_GET["id"]);
if($results)
    foreach($results as $result){
        echo 
        '
        <span owned="yes" class="std_prgLngs">'.$result["name_"].'<span class="std_prgLngs_cls" onclick="(new RemoveClass()).remove_delete_class(this)"> <input type="hidden" value="'.$result["id"].'"></span></span>
        ';
    }

?>