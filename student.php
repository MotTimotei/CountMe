<?php
include "includes/header.php";

function returnIndex(){header("Location: /CountMe");}

if(!$_GET['id']) returnIndex();

$student = new GetStudent();
$result = $student->showStudent( $_GET["id"]);

$studentss = new StudentsView();

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
    <h2>Upcoming sessions</h2>
    <button type="button "class="openAddSession" onclick="showAddSessionClass()">Open session</button>
    <div class="add_session"></div>
        <div class="upcoming_session"></div>
</div>



<div class="add_std">
    <div class="add_std_ settings_scrBar">
        <button class="add_std_cls" type="button"></button>
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
            <h3>Classes</h3>
            <div class="class_view">
                </div>
            <div class="std_prgLngs std_prgLngs_ ">
                <button type="button" class="std_prgLngs_btn " assignment="add_close" onclick="openOrClose(this)"></button>
                
            </div>

        </div>
        
        <div class="bott_set_dec">
            <button class="add_std_btn_stngs" name="add_std_btn_sett" type="submit">Sign up</button>
        </div>
    </div>
    <script src="js/ajax/student.ajax.js"></script>
    <script src="js/student.settings.js"></script>
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