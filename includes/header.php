<?php
include 'db/myAutoLoader.php';
$teacherObj = new TeacherView();
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo $teacherObj->returnTheme('1')?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/student.css">
    <link rel="stylesheet" href="css/students.css">
    <title>Count Me</title>
</head>
<style>
    <?php
    
    $teacherObj->showTheme("1");
    ?>

</style>
<body>
    <header id="header">
        <nav id="navBar">
            <a href="index.php">Home</a>
            <a href="students.php">Elevi</a>
        </nav>
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
    <content id="mainContent">