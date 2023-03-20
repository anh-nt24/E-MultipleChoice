<?php 
    if (isset($_GET['action'])) {
        $dist = $_GET['action'];
    }
    else {
        $dist = '';
    }
    if ($dist == 'login') {
        include('pages/login.php');
    }
    if ($dist == 'home') {
        include('components/header.php');
        include('pages/home.php');
    }
    if ($dist == 'create') {
        include('pages/create.php');
    }
    if ($dist == '') {
        if (empty($_COOKIE)) {
            include('components/header.php');
            include('pages/launch.php');
        }
        else {
            include('pages/login.php');
        }
    }
?>