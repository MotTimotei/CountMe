<?php
include "includes/header.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bara_natanael";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

$sql = "SELECT * FROM students WHERE id=$id";

$result = $conn->query($sql);

// output data of row
$row = $result->fetch_assoc()


?>
<div class="organizeBox stud_info stds__">
    <div id="main_info" class="std_infTXT">
        <h1>Income left month: 365 lei</h1>
        <h1>Debt: 0 lei</h1>
    </div>
    
    <div class="std_infOPT">
        <div class="stud_info_1 ">
            <span class="std_name"><?php
                echo $row["last_name"] ." ". $row["first_name"];
            ?></span>
            <button class="add_std_btn"><img src="img/settings.svg" alt=""></button>
        </div>


    </div>
</div>
<div class="add_session organizeBox organizeBox__">
    <button class="addSession_btn">Add Session</button>
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
        <div class="info_box">14 decembrie</div>
        <div class="info_box">16 decembrie</div>
        <div class="info_box">24 decembrie</div>
</div>