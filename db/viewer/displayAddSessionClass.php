<?php
include "../myAutoLoader.php";

$a = $_GET['id'];
$results = new StudentsView();
$classes = $results->returnOwnedClasses($a);
if(!$classes) echo 'No classes yet!<br><button type="button" onclick="close_open()">Add class!</button>';
else{
    echo '
    <label for="getClasses">Choose class</label>
    <select class="getClasses session_elem" name="getClasses" id="getClasses" onchange="displayClassSessionTimeAndCost(this)">
        <option style="opcaity:.4;">Choose class</option>';
    foreach($classes as $class){
        $class2 = $results->returnClassNameBasedOnTeacher_class_id($class["teacher_class_id"]);
        echo '<option value="'.$class2["id"].'">'.$class2["name_"].'</option>';
    }
    echo '</select>
    <div class="session_details"></div>';
}

?>