<?php
include "includes/header.php";
include 'db/myAutoLoader.php';
?>

<div class="organizeBox stud_info stds__">
    <div id="main_info" class="std_infTXT">
        <h1>Income left monty: 1200 ron</h1>
        <h1>Income left to today: 200 ron</h1>
    </div>
    <div class="std_infOPT">
    <div class="stud_info_1 ">
        <span class="std_name">Bara Natanael</span>
        <button class="add_std_btn"><img src="img/settings.svg" alt=""></button>
    </div>
</div>
</div>
<div class="sec_info organizeBox organizeBox__">
    <h2>Upcoming sessions</h2>
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
<div id="third_info" class="sec_info organizeBox organizeBox__">
    <h2>Your students</h2>
    
    <?php
    
        $studentsObj = new StudentsView();
        $studentsObj->showStudents();

    ?>
</div>


<div class="add_std">
    <div class="sec_info add_std_">
        <h1 class="addd_std_hdr">Settings</h1>
        <form action="db/studentSettings.php" method="GET" enctype="multipart/form-data">
            
            <h3>General info</h3>
            <label for="first_name">First name</label>
            <input name="first_name" id="first_name" type="text" class="add_std_inp" value="Natanael" required>
            
            <label for="last_name">Last name</label>
            <input name="last_name" id="last_name" type="text"class="add_std_inp" value="Bara" required>

            <label for="gender">Gender</label>
            <select name="gender" name="" id="gender" class="add_std_inp"  value="M" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            </select>
            <label for="phone">Phone number</label>
            <input name="phone" id="phone" type="phone" class="add_std_inp" value="0745678249" required>
            
            <label for="email">e-mail</label>
            <input name="email" id="email" type="email" class="add_std_inp" value="bara_natanael@gmail.com" required>
            
            <div class="sec_info">            
                <h3>Programming Languages</h3>
                <span owned="yes" class="std_prgLngs">
                    Java
                    <span class="std_prgLngs_cls">
                        <img src="img/close.svg" class="std_prgLngs_cls_img" alt="">
                    </span>
                </span>
                <span owned="yes" class="std_prgLngs">JavaScript<span class="std_prgLngs_cls"></span></span>
                <span owned="yes" class="std_prgLngs">Python<span class="std_prgLngs_cls"></span></span>
                <span owned="yes" class="std_prgLngs">C#<span class="std_prgLngs_cls"></span></span>
                <span owned="yes" class="std_prgLngs">C++<span class="std_prgLngs_cls"></span></span>
            

                <span owned="selected" class="std_prgLngs">PHP<span class="std_prgLngs_cls"></span></span>
            </div>


            <div class="std_prgLngs std_prgLngs_"><button type="button" class="std_prgLngs_btn"></button></div>

            <div class="inp_lbl">
                <label for="prg_name">Name</label>
                <input name="prg_name" id="prg_name" type="text" class="add_std_inp" value="" required>
            </div>

            <div class="inp_lbl">
                <label for="prg_ses_tm">Session time</label>
                <input name="prg_ses_tm" id="prg_ses_tm" type="number" class="add_std_inp" value="" required>
            </div>

            <div class="inp_lbl">
                <label for="prg_cost">Hour cost</label>
                <input name="prg_cost" id="prg_cost" type="number" class="add_std_inp" value="" required>
            </div>
     

            <div class="sec_info">
                <h3>Themes</h3>
                <div class="themes_stngs">
                    <div class="thm_nm">
                        <label for="prim_color">Primary color</label>
                        <input name="prim_color" id="prim_color" class="theme_color" type="text" maxlength="7" value="#333333" required>
                        
                        <label for="sec_color">Secondary color</label>
                        <input name="sec_color" id="sec_color" class="theme_color" type="text" maxlength="7" value="#434343" required>
                    
                        <label for="thrd_color">Third color</label>
                        <input name="thrd_color" id="thrd_color" class="theme_color" type="text" maxlength="7" value="#0077ff" required>
                    
                        <label for="prim_font">Primary font</label>
                        <input name="prim_font" id="prim_font" class="theme_color" type="text" maxlength="7" value="#b5b5b5" required>
                    
                        <label for="sec_font">Secondary font</label>
                        <input name="sec_font" id="sec_font" class="theme_color" type="text" maxlength="7" value="#57b957" required>
                    
                        <label for="thrd_font">Third font</label>
                        <input name="thrd_font" id="thrd_font" class="theme_color" type="text" maxlength="7" value="#cccccc" required>
                    </div>
                    <div class="thm_view">
                        <div class="bck">
                            <span class="thm_text">AaaaBbbCcc</span>
                            <div class="box">
                                <div class="text_box">AaaaBbbCcc</div>
                                <div class="text_box text_box_">AaaaBbbCcc</div>
                            </div>
                            <div class="box">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <button name="add_std_btn" type="submit">Sign Up</button>
            <button class="add_std_cls" type="button">Discard</button>
        </form>
    </div>
    <script>
        let a = document.querySelector('.add_std');
        let b = document.querySelector('.add_std_btn');
        let c = document.querySelector('.add_std_cls');

        b.addEventListener('click', close_open)
        c.addEventListener('click', close_open)
        function close_open(){
            a.classList.toggle('visOFF');
        }
    </script>
</div>

<script src="js/addTheme.js"></script>
<?php
include 'includes/footer.php';
?>
