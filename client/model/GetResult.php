<?php
    include('../../connection.php');
    $Quiz_id = $_POST['id'];
    if ($_POST['idx'] == 1) {
        $sql = "select totalScore from Response where Quiz_id='$Quiz_id'";
        $result = $conn->query($sql);
        echo json_encode($result->fetch_all());
    }
    else {
        $sql = "select Question_id, COUNT(*) AS CorrectAnswers from ResponseDetails
                where Response_id in (
                    select Response_id  from Response where Quiz_id = '$Quiz_id'
                ) and isCorrect = 1 group by Question_id;";
        $result = $conn->query($sql);
        $data1 = $result->fetch_all();
        $sql = "select Question_id, COUNT(*) AS CorrectAnswers from ResponseDetails
                where Response_id in (
                    select Response_id  from Response where Quiz_id = '$Quiz_id'
                ) and isCorrect = 0 group by Question_id;";
        $result = $conn->query($sql);
        $data2 = $result->fetch_all();
        echo json_encode([$data1, $data2]);
    }
    
?>