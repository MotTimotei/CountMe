<?php
include "includes/header.php";
?>

<div class="organizeBox stud_info">
    <div id="main_info" class="std_infTXT">
        <h1>Income left month: 365 lei</h1>
        <h1>Debt: 0 lei</h1>
    </div>
    
    <div class="std_infOPT">
        <div class="stud_info_1">
            <span>Mot Timotei Fabian</span>
        </div>
        <select name="session_time" id="">
            <option value="">1 hr</option>
            <option value="">2 hr</option>
            <option value="">3 hr</option>
        </select>
        <select name="session_hour_cost" id="">
            <option value="">45 lei</option>
            <option value="">50 lei</option>
            <option value="">60 lei</option>
        </select>
        <div class="session_edit">
            <button type="button">save</button>
        </div>

    </div>
</div>
<div class="add_session organizeBox organizeBox__">
    <button class="addSession_btn"><a href="db/createSessionTable.php">Add Session</a></button>
        <div class="info_box">14 decembrie </div>
        <div class="info_box">16 decembrie</div>
        <div class="info_box">24 decembrie</div>
</div>