<?php
    if (isset($_POST['id'])) {
        include('../../connection.php');
        $Quiz_id = $_POST['id'];
        $sql = "update Quiz set active=0 where Quiz_id='$Quiz_id'";
        $conn->query($sql);
        echo 200;
    }
?>