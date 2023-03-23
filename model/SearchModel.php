<?php
    if (isset($_POST['key'])) {
        include('../connection.php');
        $sql = "select * from Quiz where Quiz_id='".$_POST['key']."'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                if ($data['dueTo'] < date('Y-m-d H:i:s')) {
                    echo 1;
                }
                else {
                    echo json_encode($data);
                    die();
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