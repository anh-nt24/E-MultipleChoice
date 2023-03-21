<?php
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        unset($_SESSION['admin']);
?>
        <script>
            window.location.replace("login.php");
        </script>
<?php
    }
?>
