<?php
include "includes/header.php";
?>
<div class="organizeBox stud_info stds__">
    <div id="main_info" class="std_infTXT"> </div>
    <div class="std_infOPT">
    <div class="stud_info_1 ">
        <span class="std_name">Bara Natanael</span>
        <button class="add_std_btn"><img src="img/settings.svg" alt=""></button>
    </div>
</div>
</div>
<div class="sec_info organizeBox organizeBox__">
    <h2>Upcoming sessions</h2>
    <div class="upcomingSessions"></div>
</div>
<div id="third_info" class="sec_info organizeBox organizeBox__">
    <h2>Your students</h2>
</div>


<div class="add_std ">
    <div class="sec_info add_std_ ">
        <span class="add_std_cls" type="button"></span>
        <div class="add__std_ settings_scrBar">
            <h1 class="addd_std_hdr">Settings</h1>
            <div class="stng_tch">
            </div>
        </div>
    </div>
    <script src="js/popUpPanel.js"></script>
</div>

<script src="js/classes/theme.class.js"></script>
<script>
    let thm_view = document.querySelectorAll('.thm_view');
    let theme_inp_sel = document.querySelector('.theme_inp_sel');

    thm_view.forEach(element => {
        element.addEventListener('click', selectTheme);
    });

    function selectTheme(){
        thm_view.forEach(element => {
            element.setAttribute('selected', 'no');
        });
    this.setAttribute('selected', 'yes');
    theme_inp_sel.setAttribute('value', this.getAttribute('theme_id'));
    }
</script>
<script src="js/ajax/index.ajax.js"></script>
<script src="js/index.settingsClasses.js"></script>
<script src="js/index.settingsThemes.js"></script>
<?php
include 'includes/footer.php';
?>
