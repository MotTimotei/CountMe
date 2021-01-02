<?php
include 'includes/header.php';
include 'db/myAutoLoader.php';


?>
<div class="organizeBox organizeBox__ stds__">
    <?php
        $haha = new StudentsView();
        $haha->showStudents();
    ?>
    <button type="button" class="add_std_btn"><img src="img/add_person.svg"/></button>
</div>
<div class="add_std">
    <div class="add_std_">
        <form action="db/addStudent.php" method="POST" enctype="multipart/form-data">
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