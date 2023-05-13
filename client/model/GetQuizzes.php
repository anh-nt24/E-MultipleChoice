<?php
    include('../../connection.php');
    $sql = "select * from Quiz where active=1";
    $result = $conn->query($sql);
    $name = [];
    $diff = [];
    $id = [];
    $category = [];
    while ($data = $result->fetch_array()) {
        array_push($id, $data['Quiz_id']);
        array_push($name, $data['title']);
        array_push($diff, $data['level']);
        array_push($category, $data['Category_id']);
    }
    echo json_encode([$id, $name, $diff, $category]);
?>