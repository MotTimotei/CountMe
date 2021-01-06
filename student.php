<?php
include "includes/header.php";

function returnIndex(){header("Location: /CountMe");}

if(!$_GET['id']) returnIndex();

$student = new GetStudent();
$result = $student->showStudent( $_GET["id"]);

if(!$result) returnIndex();

?>
<div class="organizeBox stud_info stds__">
    <div id="main_info" class="std_infTXT">
        <h1>Income left month: 365 lei</h1>
        <h1>Debt: 0 lei</h1>
    </div>
    
    <div class="std_infOPT">
        <div class="stud_info_1 ">
            <span class="std_name"><?php
                echo $result["last_name"] ." ". $result["first_name"];
            ?></span>
            <button class="add_std_btn"><img src="img/settings.svg" alt=""></button>
        </div>
    </div>
</div>
<div class="sec_info organizeBox organizeBox__">
    <h2 id="">Upcoming sessions</h2>
    
    <div class="add_session">

        <label for="choose_prg_lng">Language</label>
        <select name="choose_prg_lng" id="">
            <option value="">PHP</option>
            <option value="">C#</option>
            <option value="">Java</option>
            <option value="">JavaScript</option>
            <option value="">C++</option>
        </select>

        <label for="session_time">Session time</label>
        <select name="session_time" id="">
            <option value="">1 hr</option>
            <option value="">2 hr</option>
            <option value="">3 hr</option>
        </select>

        <label for="session_hour_cost">Cost/hour</label>
        <select name="session_hour_cost" id="">
            <option value="">45 lei</option>
            <option value="">50 lei</option>
            <option value="">60 lei</option>
        </select>

        <label for="pick_date">Date</label>
        <input id="pick_date" name="pick_date" type="date">

        <label for="pick_date">Time</label>
        <input id="pick_date" name="pick_date" type="time">

        <button class="">Add Session</button>

    </div>
        
        <div class="info_box">14 decembrie</div>
        <div class="info_box">16 decembrie</div>
        <div class="info_box">24 decembrie</div>
</div>

<div class="add_std">
    <div class="add_std_">
        <form action="db/studentSettings.php" method="GET" enctype="multipart/form-data">
            <h2 class="addd_std_hdr">Get started to add ...</h2>
            <label for="first_name">First name</label>
            <input name="first_name" id="first_name" type="text" class="add_std_inp" value="<?php echo $result["first_name"] ?>" required>
            
            <label for="last_name">Last name</label>
            <input name="last_name" id="last_name" type="text"class="add_std_inp" value="<?php echo $result["last_name"] ?>" required>

            <label for="gender">Gender</label>
            <select name="gender" name="" id="gender" class="add_std_inp"  value="<?php echo $result["gender"] ?>" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            </select>
            <label for="phone">Phone number</label>
            <input name="phone" id="phone" type="phone" class="add_std_inp" value="<?php echo $result["phone"] ?>" required>
            
            <label for="email">e-mail</label>
            <input name="email" id="email" type="email" class="add_std_inp" value="<?php echo $result["email"] ?>" required>
            
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

                <span owned="no" class="std_prgLngs">HTML<span class="std_prgLngs_cls"></span></span>


            </div>
            
            <div class="bott_set_dec">
                <button class="add_std_btn_stngs" name="add_std_btn_sett" type="submit">Sign up</button>
                <button class="add_std_cls" type="button">Discard</button>
            </div>
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
<?php
include 'includes/footer.php';
?>