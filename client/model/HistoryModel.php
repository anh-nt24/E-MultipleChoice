<?php
    if (isset($_GET['ID'])) {
        include('../../connection.php');
        $id = $_GET['ID'];
        $quizName = [];
        $isVailable = [];
        $isPublic = [];
        $corNum = [];
        $time = [];
        $inTime = [];
        $numQs = 0;
        foreach ($id as $i) {
            $sql = "select * from Quiz where Quiz_id='".$i[0]."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                array_push($quizName, $data['title']);
                if (date("Y/m/d") > $data['dueDate'] && $data['dueDate'] != null) {
                    array_push($isVailable, 'Unavailable');
                }
                else {
                    array_push($isVailable, 'Available');
                }
                array_push($isPublic, $data['isPublic']);
                array_push($time, $data['duration']);
                $numQs = $data['quizNum'];
                $sql = "select * from Response where Quiz_id='".$i[0]."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0 ) {
                    $data = $result->fetch_array();
                    $resId = $data['Response_id'];
                    array_push($inTime, $data['inTime']);
                    $sql = "select count(isCorrect) as numCorr from ResponseDetails where Response_id='$resId' and isCorrect = 1";
                    $result = $conn->query($sql);
                    $data = $result->fetch_array();
                    array_push($corNum, $data['numCorr']);

                }
            }
        }

        echo json_encode([$quizName, $isPublic, $isVailable, $corNum, $time, $inTime, $numQs]);
    }
?>