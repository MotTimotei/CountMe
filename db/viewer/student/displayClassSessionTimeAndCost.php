<?php
include "../../myAutoLoader.php";

$a = $_GET['class_id'];
$result = new TeacherView();
$class = $result->returnClass($a);
if($class == '') echo '';
else if(!$class)  echo 'There is an error!';
else echo '
    <label for="session_time_add_session">Session time</label>
    <input class="session_elem" type="number" id="session_time_add_session" value="'.$class["session_time"].'" required>min

    <label for="hour_cost_add_session">Hour/cost</label>
    <input class="session_elem" type="number" id="hour_cost_add_session" value="'.$class["hour_cost"].'" required>lei
    
    <label for="paid_add_session">Paid</label>
    <input class="session_elem" type="number" id="paid_add_session" value="" required>lei

    <label for="date_add_session">Date</label>
    <input class="session_elem" id="date_add_session" name="date_add_session" type="date" required>

    <label for="time_add_session">Time</label>
    <input class="session_elem" id="time_add_session" name="time_add_session" type="time" required>

    <button type="button" class="" onclick="addSession()">Add Session</button>
    ';

?>