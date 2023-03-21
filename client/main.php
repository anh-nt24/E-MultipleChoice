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
        if (isset($_SESSION['login'])) {
            include('components/header.php');
            include('pages/home.php');
        }
        else {
            echo "
                <script>
                    window.location.replace('App.php?action=login');
                </script>
            ";
        }
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
            unset($_SESSION['login']);
            echo "
                <script>
                    window.location.replace('App.php?action=login');
                </script>
            ";
        }
    }
?>