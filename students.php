<?php
include "includes/header.php";
?>
<div class="sec_info organizeBox organizeBox__ stds___">
    <h2>Students</h2>
    <div class="displ_std"></div>
    <button type="button" class="add_std_btn"><img src="img/add_person.svg"/></button>
</div>

<div class="add_std">
    <div class="sec_info add_std_ ">
        <span class="add_std_cls" type="button"></span>
        <div class="add__std_ settings_scrBar">
            <h2 class="addd_std_hdr">Get started to add ...</h2>
            <label for="first_name">First name</label>

            <input name="first_name" id="first_name" type="text" class="add_std_inp" required>
            <label for="last_name">Last name</label>

            <input name="last_name" id="last_name" type="text"class="add_std_inp" required>

            <label for="gender">Gender</label>
            <select name="gender" name="" id="gender" class="add_std_inp" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            </select>
            <label for="phone">Phone number</label>

            <input name="phone" id="phone" type="phone" class="add_std_inp" required>
            <label for="email">e-mail</label>

            <input name="email" id="email" type="email" class="add_std_inp" required>
        </div>
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
<script src="js/ajax/students.ajax.js"></script>

<?php
include 'includes/footer.php';
?>