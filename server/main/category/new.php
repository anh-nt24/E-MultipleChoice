<?php 
    include('../../../connection.php');
    if (isset($_POST['name'])){
        $name = $_POST['name'];
        $sql = "select count(*) as id from Category";
        $result = mysqli_query($conn, $sql);
        $id = mysqli_fetch_array($result)['id'];
        $sql = "insert into Category values('$id', '$name', 1)";
        if ($res = mysqli_query($conn, $sql)) {
            echo 201;
        }
    }
    else {
        echo 1;
    }
?>