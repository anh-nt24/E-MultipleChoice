<?php
    if (isset($_POST['key'])) {
        include('../../connection.php');
        $search = $_POST['key'];
        $res = [];
        if (str_starts_with($search, '#')) {
            $sql = "select * from Quiz where Quiz_id='".substr($search, 1)."' and active=1";
        }
        else {
            $sql = "select * FROM Quiz where title LIKE '%".$search."%' and isPublic=1 and active=1";
        }
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                while ($data = $result->fetch_assoc()) {
                    if ($data['dueTo'] != null && $data['dueTo'] < date('Y-m-d H:i:s')) {
                        if ($result->num_rows == 1) {
                            echo 1;
                        }
                    }
                    else {
                        $sql = "select * from User where User_id='".$data['author_id']."'";
                        $result2 = $conn->query($sql);
                        $author =  ($result2->num_rows > 0) ? $result2->fetch_array()['username'] : 'Unknown';
                        $data['author'] = $author;
                    }
                    array_push($res, $data);
                }
                echo json_encode($res);
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