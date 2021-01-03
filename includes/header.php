<?php
include "db/createDB.php";
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/student.css">
    <link rel="stylesheet" href="css/students.css">
    <title>Count Me</title>
</head>
<body>
    <header id="header">
        <nav id="navBar">
            <a href="index.php">Home</a>
            <a href="students.php">Elevi</a>
        </nav>
        <div class="toggle_container">
            <input type="checkbox" id="switch" name="theme"><label class="switch" for="switch">Toggle</label>
        </div>
        <div id="mounth">
            <select name="selectMounth" id="selectMount">
                <option value="">Ianuarie</option>
                <option value="">Februarie</option>
                <option value="">Martie</option>
                <option value="">Aprilie</option>
                <option value="">Mai</option>
                <option value="">Iunie</option>
                <option value="">Iulie</option>
                <option value="">August</option>
                <option value="">Septembrie</option>
                <option value="">Octombrie</option>
                <option value="">Noiembrie</option>
                <option value="">Decembrie</option>
            </select>
        </div>
    </header>
    <script>
        let checkbox = document.querySelector('input[name=theme]');

        checkbox.addEventListener('change', function(){
            if(this.checked){
                trans();
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                trans();
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })

        let trans = () => {
            document.documentElement.classList.add('transition');
            window.setTimeout(() => {
                document.documentElement.classList.remove('transition');
            }, 1000)
        }
    </script>
    <content id="mainContent">