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
            <select name="selectMounth" id="selectMount" class="selectMount">
                <option value="">Select month</option>
                <option value="1">Ianuarie</option>
                <option value="2">Februarie</option>
                <option value="3">Martie</option>
                <option value="4">Aprilie</option>
                <option value="5">Mai</option>
                <option value="6">Iunie</option>
                <option value="6">Iulie</option>
                <option value="8">August</option>
                <option value="9">Septembrie</option>
                <option value="10">Octombrie</option>
                <option value="11">Noiembrie</option>
                <option value="12">Decembrie</option>
            </select>
        </div>
    </header>
    <content id="mainContent">