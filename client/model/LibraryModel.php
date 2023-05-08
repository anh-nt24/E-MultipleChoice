<?php
    if (isset($_POST['id'])) {
        include('../../connection.php');
        $id = $_POST['id'];
        $sql = "select * from Quiz where Quiz_id='".$id."'";
        $result = $conn->query($sql);
        $data = $result->fetch_array();
        $name = $data['title'];
        $time = $data['duration'] ? $data['duration'].'mins' : 'unlimited';
        $level = $data['level'] . '%';

        echo json_encode([$name, $time, $level]);
    }
?>