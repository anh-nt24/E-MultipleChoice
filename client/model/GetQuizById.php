<?php
    if (isset($_POST['id'])) {
        include('../../connection.php');
        $id = $_POST['id'];
        $quizName = [];
        $level = [];
        $numQs = [];
        $quizId = [];
        foreach ($id as $i) {
            $sql = "select * from Quiz where Quiz_id='$i' and active=1 and isPublic=1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                if (new DateTime(date("Y/m/d H:i:s")) > new DateTime($data['dueDate']) && $data['dueDate'] != null) {
                    continue;
                }
                array_push($quizName, $data['title']);
                array_push($level, $data['level']);
                array_push($numQs, $data['quizNum']);
                array_push($quizId, $i);
            }
        }
        echo json_encode([$quizName, $level, $numQs, $quizId]);
    }
?>