<?php
  include "includes/header.php";
  include 'db/myAutoLoader.php';
?>
    
        <div id="main_info" class="organizeBox">
            <h1>Income left monty: 1200 ron</h1>
            <h1>Income left to today: 200 ron</h1>
        </div>
        <div id="sec_info" class="organizeBox organizeBox__">
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
            <div class="info_box"><a href="student.php">Timi, 11 Dec 2020</a></div>
        </div>
        <div id="third_info" class="organizeBox organizeBox__">
            <?php
            
                $studentsObj = new StudentsView();
                $studentsObj->showStudents("Ticarat");


            ?>
        </div>
    </content>
</body>
</html>
