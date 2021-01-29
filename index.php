<?php
include "includes/header.php";
?>
<div class="organizeBox stud_info stds__">
    <div id="main_info" class="std_infTXT"> 
    </div>
    <div class="std_infOPT">
    <div class="stud_info_1 ">
        <span class="std_name">Bara Natanael</span>
        <button class="add_std_btn"><img src="img/settings.svg" alt=""></button>
    </div>
</div>
</div>
<div class="sec_info organizeBox organizeBox__">
    <h2>Today's sessions</h2>
    <div class="upcomingSessions"></div>
    <canvas id="myChart" width="400" height="400"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
</div>

<div class="allSessions"><?php include 'db/viewer/teacher/displayAllSessions.php'?></div>

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
