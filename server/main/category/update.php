<?php 
    include('../../../connection.php');
    if(isset($_POST['id']) && isset($_POST['name'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql = "update Category set name='$name' where Category_id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 201;
        }
    }
?>