<?php 
    include('../../../connection.php');
    if (isset($_POST['id']) && isset($_POST['quizId']) && isset($_POST['action'])){
        $id = $_POST['id'];
        $quizId = $_POST['quizId'];
        if ($_POST['action'] == 'delete') {
            $sql = "update Quiz set active=0 where Quiz_id='$quizId'";
            $run = mysqli_query($conn, $sql);
        }
        $s = "update Report set status=0 where report_id='$id'";
        $r = mysqli_query($conn, $s);
        if ($r) {
            echo 201;
        }
        else {
            echo 500;
        }
    }
?>