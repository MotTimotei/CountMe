<?php
include "includes/header.php";
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
        <form action="db/updateTeacherSettings.php" method="POST" enctype="multipart/form-data">
            <?php $teacherObj->showTeacher("1");?>
        </form>
    </div>
    <script src="js/popUpPanel.js"></script>
</div>

<script src="js/addTheme.js"></script>
<script>
    d = document.querySelectorAll('.theme_color');

    d.forEach(element => {
        element.addEventListener('keyup', check);
    });

    function check(){
        document.querySelector('.bck').style="background-color:"+ d[0].value;
        document.querySelector('.thm_text').style="color:"+d[3].value;
        document.querySelectorAll('.box').forEach(element =>element.style="background-color:"+ d[1].value +";");
        document.querySelector('.text_box').style="background-color: transparent;border:1px solid "+d[4].value+"; color:"+d[3].value;
        document.querySelector('.text_box_').style="background-color:"+ d[4].value +";border:1px solid "+d[4].value+"; color:"+d[3].value;

        let col = new Theme(this.value);

        this.classList = (!col.isHexColor())?"theme_color add_std_inp_sh" : "theme_color";
    }
</script>
<script>
    let thm_view = document.querySelectorAll('.thm_view');
    let theme_inp_sel = document.querySelector('.theme_inp_sel');

    thm_view.forEach(element => {
        element.addEventListener('click', selectTheme);
    });

    function selectTheme(){
        console.log("a");
        thm_view.forEach(element => {
            element.setAttribute('selected', 'no');
        });
    this.setAttribute('selected', 'yes');
    theme_inp_sel.setAttribute('value', this.getAttribute('theme_id'));
    }
</script>
<script>
    let std_prgLngs_btn = document.querySelector('.std_prgLngs_btn');
    let std_prgLngs_ = document.querySelector('.std_prgLngs_');

    std_prgLngs_btn.addEventListener('click', function(){
        opcl();
    });

    function opcl(){
        if(std_prgLngs_.classList.contains('std_prgLngs_2')) remove_delete();
        else print();
        std_prgLngs_.classList.toggle('std_prgLngs_2');
        std_prgLngs_btn.classList.toggle('std_prgLngs_btn2');
    }

    function print(){
        const ar = [
            ['Name', 'prg_name'], 
            ['Session time', 'prg_ses_tm'], 
            ['Hour cost', 'prg_cost']
        ];
        console.log(ar.length);

        for(let i = 0;i<ar.length;i++){
            let div = document.createElement('div');
            div.classList = 'inp_lbl';
            div.innerHTML = '<label for="'+ar[i][1]+'">'+ar[i][0]+'</label><input name="'+ar[i][1]+'" id="'+ar[i][1]+'" type="text" class="add_std_inp" value="" required>';
            std_prgLngs_.appendChild(div);
        }
    }

    function remove_delete(){
        let inp_lbl = document.querySelectorAll('.inp_lbl');
        inp_lbl.forEach(elem => {
            elem.remove();
        });
        
    }
</script>
<?php
include 'includes/footer.php';
?>
