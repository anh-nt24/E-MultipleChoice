<link rel="stylesheet" href="./asset/css/create.css">
<link rel="stylesheet" href="./asset/css/quiz.css">
<link rel="stylesheet" href="./asset/css/responsive.css">

<?php
    if (isset($_GET['token'])) {
        $Quiz_id = base64_decode($_GET['token']);
        $sql1 = "select * from Quiz where Quiz_id='".$Quiz_id."'";
        $result = $conn->query($sql1);
        $quizData = $result->fetch_array();
        $sql2 = "select Question_id, question, score, type from Question where Quiz_id='".$Quiz_id."'";
        $result = $conn->query($sql2);
        $questionData = [];
        if($result) {
            while($row = $result->fetch_array()){
                array_push($questionData, $row);
            }
        }
        if (!isset($_SESSION['start'])) {
            $_SESSION['start'] = time();
        }
?>
<div id="page-container">
    <div class="row nopadding">
        <div class="quiz-timer w-100 fixed-top d-flex justify-content-center align-items-center">
            <div></div>
            <img style="width: 30px" src="./asset/img/clock.png" alt="">
            <span class="pl-2"></span>
        </div>
    </div>
    <div class="row nopadding">
        <form method="post" onsubmit="return confirm('Are you sure you want to submit this form?');" class="col-lg-10 col-12 m-auto">
            <div class="quiz-content">
                <div class="quiz-header pt-0">
                    <div class="form-group">
                        <span class="form-control" style="font-size: 3rem;" name="quiz-title" id="quiz-title">
<?php
                            echo $quizData['title'];
?>
                        </span>
                    </div>
                </div>
<?php
    $qsOrder = 1;
    $qsId = [];
    $correctAnswer = [];
    foreach($questionData as $qs) {
        array_push($qsId, $qs['Question_id']);
        $queryCorr = "select * from Option where Question_id = '".$qs['Question_id']."' and isCorrect = 1";
        $result = $conn->query($queryCorr);
        while($row = $result->fetch_array()){
            array_push($correctAnswer, $row['orderNum']);
        }
?>
                <div class="quiz-questions">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-11 col-sm-10 col-11 question__title">
                            <div class="form-group">
                                <span style="font-size: 22px;" class="form-control" name="ques-title[]" id="ques-title">
<?php
                                    echo $qs['question'];
?>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-2 col-1">
                            <div class="form-group">
                                <span class="form-control text-center scores" name="score[]">
<?php
                                    echo $qs['score'];
?>
                                <span>
                            </div>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col-12">
                            <div class="quiz-question__options">
                                <div class="row option">
<?php
        if ($qs['type'] == 2) {
?>

                                    <div class="col-12">
                                        <div class="options">
                                            <div class="form-group d-flex align-items-center">
                                                <i class="fa fa-pencil-square-o pr-3"></i>
                                                <input required type="text" class="form-control" name="ans[]">
                                            </div>
                                        </div>
                                    </div>
<?php
        }
        else {
            $sql = "select * from Option where Question_id = '".$qs['Question_id']."'";
            $result = $conn->query($sql);
            $ansData = [];
            if($result) {
                while($row = $result->fetch_array()){
                    array_push($ansData, $row);
                }
            }
?>
                                    <div class="col-12">
                                        <div class="options">
<?php
            $order = 1;
            foreach($ansData as $ans) {
?>
                                            <div class="form-check">
                                                <label style="font-size: 18px;" class="form-check-label">
                                                    <input <?php if ($order==1) echo "required";?> value="<?php echo $order; $order+=1?>" type="radio" style="font-size: 15px;" class="form-check-input" name="<?php echo "ans".$qsOrder?>">
<?php
                                                    echo $ans["content"];
?>
                                                </label>
                                            </div>
<?php
            }
?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
            $qsOrder += 1;
        }
?>
                </div>
<?php
    }
?>
            </div>
</div>
</div>
</div>
            <div class="quiz-footer px-2 pb-5 d-flex">
                <button type="submit" name="turn-in" class="btn">Turn in</button>
                <input class="ml-auto btn" type="reset" value="Clear form">
            </div>
        </form>
    </div>
    <div id="modal-here">
    </div>
</div>
<script src="algorithm/countdown.js"></script>
<?php
    echo "
        <script>
            countdown(".$quizData['duration'].");
        </script>
    ";
?>

<?php
}
?>

<?php
    if (isset($_POST['turn-in'])) {
        $_SESSION['end'] = time();
        $inTime = ($_SESSION['end'] - $_SESSION['start']);
        unset($_SESSION['start']);
        unset($_SESSION['end']);
        $userAnswer = [];
        $opsId = [];
        $isCorr = [];
        $textAns = $_POST['ans'];
        for ($i=1; $i<=count($questionData); $i++) {
            $ops = $_POST['ans'.$i];
            array_push($userAnswer, $ops);
            if ($questionData[$i]['type'] == 1)
                $sql = "select * from Option where orderNum = '".$ops."' and Question_id = '".$qsId[$i-1]."'";
            else
                $sql = "select * from Option where orderNum = '1' and Question_id = '".$qsId[$i-1]."'";
                $result = $conn->query($sql);
            $row = $result->fetch_array();
            array_push($opsId, $row['Option_id']);
        }
        $totalGrade = 0;
        for ($i=0;$i<count($questionData);$i++) {
            $score = $questionData[$i]['score'];
            if ($correctAnswer[$i] == $userAnswer[$i]) {
                $totalGrade = $totalGrade + $score;
                array_push($isCorr, 1);
            }
            else {
                array_push($isCorr, 0);
            }
        }
        // Save to response table
        $sql = "Select * from Response";
        $row = $conn->query($sql);
        $response_id = $row -> num_rows; 
        $sql = "insert into Response values('".$response_id."', '".$Quiz_id."', '".$_SESSION['client_id']."', ".$totalGrade.", ".$inTime.")";
        if (!$conn->query($sql)) {
            echo "
                <script>
                    alert('Error: ".$conn->error.".\nTry again!');
                </script>
            ";
        }
        else {
            $success = true;
            for($i=0;$i<count($questionData); $i++) {
                $sql = "Select * from ResponseDetails";
                $row = $conn->query($sql);
                $detail_id = $row -> num_rows;
                if ($questionData[$i]['type'] == 1) {
                    $sql = "insert into ResponseDetails values('".$detail_id."', NULL, '".$response_id."', '".$qsId[$i]."', '".$opsId[$i]."', ".$isCorr[$i].")";
                }
                else {
                    $sql = "insert into ResponseDetails values('".$detail_id."', '".$textAns[$i]."', '".$response_id."', '".$qsId[$i]."', '".$opsId[$i]."', ".$isCorr[$i].")";
                }
                print_r($sql);
                if (!$conn->query($sql)) {
                    $success = false;
                    break;
                }
            }
            if ($success) {
                echo "
                    <script>
                        window.location.replace('App.php?action=review&result=".base64_encode($response_id)."')
                    </script>
                ";
            }
            else {
                echo "
                    <script>
                        alert('Error: ".$conn->error.".\nTry again!');
                    </script>
                ";
            }
        }

        // Save to Response Details table
    }
?>
