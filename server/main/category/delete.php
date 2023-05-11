<?php 
    include('../../../connection.php');
    if (isset($_POST['id']) ){
        $id = $_POST['id'];
        $s = "update Category set status=0 where Category_id='$id'";
        $r = mysqli_query($conn, $s);
        if ($r) {
            echo 201;
        }
        else {
            echo 500;
        }
    }
?>