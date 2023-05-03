<?php 
    if (isset($_GET['action'])) {
        $dist = $_GET['action'];
    }
    else {
        $dist = '';
    }
    if (empty($_COOKIE)) {
        include('components/header.php');
        include('pages/launch.php');
    }
    if ($dist == 'login') {
        include('pages/login.php');
    }
    elseif ($dist == 'register') {
        include('pages/register.php');
    }
    elseif ($dist == 'review') {
        include('components/footer.php');
        include('pages/result.php');
    }
    elseif ($dist == 'home') {
        include('components/header.php');
        include('pages/home.php');
        include('components/footer.php');
    }
    elseif ($dist == 'quiz') {
        include('pages/quiz.php');
        // include('components/footer.php');
    }
    elseif ($dist == 'create') {
        include('pages/create.php');
        include('components/footer.php');
    }
    elseif ($dist == 'report') {
        include('pages/report.php');
        // include('components/footer.php');
    }
    elseif ($dist == 'profile') {
        include('pages/profile.php');
        // include('components/footer.php');
    }
    else {
    }
?>