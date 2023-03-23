<?php
    if (isset($_POST['key'])) {
        include('../connection.php');
        $sql = "select * from Quiz where Quiz_id='".$_POST['key']."'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                if ($data['dueTo'] != null && $data['dueTo'] < date('Y-m-d H:i:s')) {
                    echo 1;
                }
                else {
                    $sql = "select * from User where User_id='".$data['author_id']."'";
                    $result = $conn->query($sql);
                    $author =  ($result->num_rows > 0) ? $result->fetch_array()['username'] : 'Unknown';
                    $data['author'] = $author;
                    echo json_encode($data);
                }
            }
            else {
                echo 1;
            }
        }
        else {
            echo 0;
        }
    }
?>