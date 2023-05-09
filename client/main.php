<?php
    if (isset($_GET['action'])) {
        $dist = $_GET['action'];
    }
    else {
        $dist = '';
    }
    if (isset($_COOKIE['me'])) {
        // remember me
        include('components/header.php');
        include('pages/launch.php');
    }
    else {
        if ((!isset($_SESSION['login']) && $dist != 'login')) {
            echo "
                <script>window.location.replace('?action=login')</script>
            ";
        }
        elseif (!isset($_SESSION['login'])) {
            if ($dist == 'login' ) {
                include('pages/login.php');
            }
            elseif ($dist == 'register') {
                include('pages/register.php');
            }
        }
        else {
            // need to authorize to access
            if (($dist == 'login' || $dist == '')) {
                echo "
                <script>window.location.replace('?action=home')</script>
            ";
            }
            if ($dist == 'review') {
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
            }
            elseif ($dist == 'udtq') {
                include('pages/update.php');
            }
        }
    }
?>

<script src="algorithm/token.js"></script>