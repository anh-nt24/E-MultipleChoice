<link rel="stylesheet" href="./asset/css/create.css">
<link rel="stylesheet" href="./asset/css/quiz.css">
<link rel="stylesheet" href="./asset/css/result.css">
<link rel="stylesheet" href="./asset/css/responsive.css">

<?php
    if (isset($_GET['result'])) {
        $Response_id = base64_decode($_GET['result']);
        $sql = "select totalScore, Quiz_id, inTime from Response where Response_id='".$Response_id."'";
        $result = $conn->query($sql);
        $data = $result->fetch_array();
        $totalScore = $data['totalScore'];
        $Quiz_id = $data['Quiz_id'];
        $inTime = $data['inTime'];

        $sql = "select count(isCorrect) as numCorr from ResponseDetails where Response_id='".$Response_id."' and isCorrect = 1";
        $result = $conn->query($sql);
        $data = $result->fetch_array();
        $numCorr = $data['numCorr'];

        $sql = "select * from Quiz where Quiz_id='".$Quiz_id."'";
        $result = $conn->query($sql);
        $quizData = $result->fetch_array();

        $sql = "select Question_id, question, score, type from Question where Quiz_id='".$Quiz_id."'";
        $result = $conn->query($sql);
        $questionData = [];
        if($result) {
            while($row = $result->fetch_array()){
                array_push($questionData, $row);
            }
        }
?>
<div id="page-container">
    <div class="row nopadding">
        <div class="m-auto col-md-8 col-12">
            <h2 class="text-center my-3 title sfont">Result Summary</h2>
            <hr>
            <div class="result-area d-flex flex-column container">
                <div class="row d-flex flex-row justify-content-between">
                    <div class="chart col-md-3 col-12">
                        <svg height="300" width="300" id="_cir_progress">
                        <circle class="outer-cir" cx="150" cy="150" r="90" stroke="#377200" stroke-width="20" fill="none"></circle>
                        <circle class="inner-cir" cx="150" cy="150" r="90" stroke="#968089" stroke-width="20"  stroke-dasharray="<?php echo 764 - (($numCorr*100)/count($questionData))*764/100;?>, 764" fill="none""></circle>
                        <text x="50%" y="50%" text-anchor="middle" stroke="none" stroke-width="1px" dy=".3em" style="font-size: 2rem;"><?php echo ($numCorr*100)/count($questionData) . "%";?></text>
                        </svg>
                    </div>
                    <div class="info col-md-5 col-12 d-flex flex-column justify-content-center">
                        <p>
                            <i class="pr-2 fa fa-clock-o" style="font-size:24px"></i>
                            <span>In time: <?php echo $inTime . "s";?>  </span>
                        </p>
                        <p>
                            <i class="pr-2 fa fa-check-square-o" style="font-size:20px;color:green"></i>
                            <span>Correct: <?php echo $numCorr;?></span>
                        </p>
                        <p>
                            <i class="pr-2 fa fa-close" style="font-size:24px;color:red"></i>
                            <span>Incorrect: <?php echo count($questionData) - $numCorr; ?></span>
                        </p>
                        <p>
                            <i class=" fa fa-graduation-cap" style="font-size:20px;color: var(--main-bg-color)"></i>
                            <span>Total score: <?php echo $totalScore; ?></span>
                        </p>
                    </div>
                </div>
                <div class="result-btn my-2 d-flex justify-content-around">
                    <button type="button" class="btn view-answer">View Details</button>
                    <button type="button" onclick="replay('<?php echo $Quiz_id;?>')" class="btn btn-success replay"><i class="pr-2 fa fa-repeat" style="font-size:1em;"></i>Retry</button>
                    <button type="button" class="btn btn-danger home">Return Home</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="row nopadding review">
        <div class="col-lg-10 col-12 m-auto pb-5">
            <div class="quiz-content">
                <div class="quiz-header pt-0">
                    <div class="form-group">
                        <span class="form-control" style="font-size: 3rem;" name="quiz-title" id="quiz-title">
<?php
                            echo $quizData['content'];
?>
                        </span>
                    </div>
                </div>

<?php
    foreach($questionData as $qs) {
?>
                <div class="quiz-questions">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-10 col-sm-8 col-10 question__title">
                            <div class="form-group">
                                <span style="font-size: 22px;" class="form-control" name="ques-title[]" id="ques-title">
<?php
        $sql = "select * from ResponseDetails where Response_id = '".$Response_id."' and Question_id = '".$qs['Question_id']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        $textAns = $row['text'];
        $isCorr = $row['isCorrect'];
        $thisScore = ($isCorr == 1) ? $qs['score'] : 0;
        $Option_id = $row['Option_id'];
        $sql = "select orderNum from Option where Option_id = '".$Option_id."'";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        $selection = $row['orderNum'];

        echo $qs['question'];
?>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-2 col-1">
                            <div class="form-group">
                                <span class="form-control text-center scores" name="score[]">
<?php
                                    echo $thisScore . "/" . $qs['score'];
?>
                                <span>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-2 col-1">
                            <div class="form-group">
                                <span class="form-control text-center cor-<?php echo $isCorr;?>">
                                    <i class=" 
                                        <?php 
                                            if ($isCorr == 1) echo 'fa fa-check'; else echo 'fa fa-close';
                                        ?> 
                                    "></i>
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
                                                <span class="form-control">
                                                    <?php echo $textAns;?>
                                                </span>
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
                                                    <i class=" <?php 
                                                    if ($order == $selection) echo 'fa fa-dot-circle-o'; else echo 'fa fa-circle-o';
                                                    $order += 1; 
                                                    ?> "></i>
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

<?php
}
?>

<script src="asset/js/result.js"></script>