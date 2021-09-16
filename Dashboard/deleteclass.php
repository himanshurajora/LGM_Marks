<?php
    require_once("../Database/Class.php");
    $classes = new Classes;
    $classno = $_GET['classno'];

    $classes->deleteClass($classno);
    header("Location: " . $_SERVER['HTTP_REFERER']);
?>

