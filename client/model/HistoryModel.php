<?php
    if (isset($_POST['id'])) {
        include('../../connection.php');
        $id = $_POST['id'];
        $quizName = [];
        $isVailable = [];
        $isPublic = [];
        $corNum = [];
        $time = [];
        $inTime = [];
        $numQs = [];
        $response = [];
        foreach ($id as $i) {
            $sql = "select * from Response where Response_id='$i'";
            $result = $conn->query($sql);
            $data = $result->fetch_array();
            array_push($response, $i);
            $Quiz_id = $data['Quiz_id'];
            $sql = "select count(isCorrect) as numCorr from ResponseDetails where Response_id='$i' and isCorrect=1";
            $result = $conn->query($sql);
            $data = $result->fetch_array();
            array_push($corNum, $data['numCorr']);
            $sql = "select * from Quiz where Quiz_id='".$Quiz_id."' and active=1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                array_push($quizName, $data['title']);
                if (new DateTime(date("Y/m/d H:i:s")) > new DateTime($data['dueDate']) && $data['dueDate'] != null) {
                    array_push($isVailable, 'Unavailable');
                }
                else {
                    array_push($isVailable, 'Available');
                }
                array_push($isPublic, $data['isPublic']);
                array_push($time, $data['duration']);
                array_push($numQs, $data['quizNum']);
            }
        }

        echo json_encode([$quizName, $isPublic, $isVailable, $corNum, $numQs, $response]);
    }
    elseif (isset($_POST['responseId'])) {
        include('../../connection.php');
        $id = $_POST['responseId'];
        $quizName = [];
        $diff = [];
        $Quiz_id = [];
        $category = [];
        foreach($id as $i) {
            $sql = "select * from Response where Response_id='$i'";
            $result = $conn -> query($sql);
            $row = $result->fetch_array();
            $qid = $row['Quiz_id'];
            array_push($Quiz_id, $qid);
            $sql = "select * from Quiz where Quiz_id='$qid'";
            $result = $conn->query($sql);
            $row = $result->fetch_array();
            array_push($quizName, $row['title']);
            array_push($diff, $row['level']);
            array_push($category, $row['Category_id']);
        }
        echo json_encode([$Quiz_id, $quizName, $diff, $category]);
    }
?>