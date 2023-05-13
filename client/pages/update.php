<link rel="stylesheet" href="./asset/css/create.css">
<link rel="stylesheet" href="./asset/css/responsive.css">

<?php
    if (isset($_GET['id'])) {
        $Quiz_id = base64_decode($_GET['id']);
        $sql1 = "select * from Quiz where Quiz_id='" . $Quiz_id . "'";
        $result = $conn->query($sql1);
        $quizData = $result->fetch_array();
        $sql2 = "select Question_id, question, score, type from Question where Quiz_id='" . $Quiz_id . "'";
        $result = $conn->query($sql2);
        $questionData = [];
        if ($result) {
            while ($row = $result->fetch_array()) {
                array_push($questionData, $row);
            }
        }
        $sql = "select * from Category where status=1";
        $result = $conn->query($sql);
        $category = [];
        while ($row = $result->fetch_array()) {
            array_push($category, $row);
        }
    }
?>

<div id="page-container">
    <div class="row nopadding">
        <form method="post" class="col-lg-10 col-12 m-auto">
            <div class="quiz-content">
                <div class="quiz-header">
                    <div class="form-group">
                        <input required type="text" class="form-control" name="quiz-title" id="quiz-title" placeholder=" " value="<?php echo $quizData['title'];?>">
                        <label for="quiz-title" class="quiz-title--label">Quiz Title</label>
                    </div>
                </div>
                <div class="quiz-form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="stating-date">
                                    Starting date: 
                                    <input id="stating-date" name="stating-date" class="w-100 form-control" type="datetime-local" value="<?php echo $quizData['examDate'];?>">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="ending-date">
                                    Due to:
                                    <input id="ending-date" name="ending-date" class="w-100 form-control" type="datetime-local" <?php 
                                        if (isset($quizData['dueDate'])) {
                                            echo "value='".$quizData['dueDate']."'";
                                        }
                                    ?>>
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="in-time">
                                    Time: 
                                    <input id="in-time" name="in-time" class="w-100 form-control" type="number" placeholder="  min(s)" <?php 
                                        if (isset($quizData['duration'])) {
                                            echo "value='".$quizData['duration']."'";
                                        }
                                    ?>>
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="num-ques">
                                    Number of questions: 
                                    <input readonly id="num-ques" name="num-ques" class="w-100 form-control" type="text" onkeyup="generateQues(this)" <?php
                                        if (isset($quizData['quizNum'])) {
                                            echo "value='".$quizData['quizNum']."'";
                                        }
                                    ?> >
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="quiz-level">
                                    Difficulty:
                                    <input id="quiz-level" name="quiz-level" class="w-100 form-control" placeholder="0" type="number" <?php
                                        if (isset($quizData['level'])) {
                                            echo "value='".$quizData['level']."'";
                                        }
                                    ?>>
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="quiz-privacy">
                                    Privacy:
                                    <select name="quiz-privacy" class="form-control">
                                        <option value="1" <?php if ($quizData['isPublic'] == 1) echo "selected";?>> Public </option>
                                        <option value="2" <?php if ($quizData['isPublic'] == 2) echo "selected";?>> Private </option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="quiz-category">
                                    Category:
                                    <select name="quiz-category" class="form-control">
                                    <?php
                                        foreach($category as $ct) {
                                        ?>
                                            <option <?php echo "value='".$ct[0]."'"; if ($ct[0] == $quizData['Category_id']) echo "selected";
                                            ?>> <?php echo $ct[1];?> </option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $question_id = [];
                    $options_id = [];
                    foreach ($questionData as $qs) {
                        array_push($question_id, $qs['Question_id']);
                ?>
                        <div class="quiz-questions" data-idx="1">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-8 col-sm-10 col-12 question__title">
                                    <div class="form-group">
                                        <textarea required type="text" class="form-control txt" name="ques-title[]" id="ques-title" placeholder="Untitled question"><?php echo $qs['question'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-2 col-3">
                                    <div class="form-group">
                                        <input type="number" step="0.01" class="form-control scores" name="scores[]" placeholder="Score" value="<?php echo $qs['score'];?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-9 question__type-selection">
                                    <select name="quiz-type[]" class="form-control inputState">
                                        <option value="1" selected> &#9673; Multiple choice</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col-12">
                                    <div class="quiz-question__options">
                                        <?php
                                            if ($qs['type'] == '2') {
                                                continue;
                                            }
                                            else {
                                                $sql = "select * from Option where Question_id = '" . $qs['Question_id'] . "'";
                                                $result = $conn->query($sql);
                                                $ansData = [];
                                                if ($result) {
                                                    while ($row = $result->fetch_array()) {
                                                        array_push($ansData, $row);
                                                    }
                                                }
                                                $answer_id = [];
                                        ?>
                                            <?php
                                                foreach ($ansData as $ans) {
                                                    array_push($answer_id, $ans['Option_id']);
                                            ?>
                                                    <div class="row option">
                                                        <div class="col-11">
                                                            <div class="options">
                                                                    <div class="form-group d-flex align-items-center">
                                                                        <i class="fa fa-circle-thin pr-3"></i>
                                                                        <input value="<?php echo  $ans["content"];?>" type="text" style="font-size: 15px;" class="form-control" name="<?php echo "ans" . $qsOrder?>">
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 d-flex align-items-center">
                                                            <button type="button" onclick="removeOption(this)" class="btn"><i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                                array_push($options_id, $answer_id);
                                            ?>
                                        <?php
                                            }
                                        ?>
                                        </div>
                                    <?php
                                        if ($qs['type'] == 1) {
                                            $sql = "select orderNum from Option where Question_id = '" . $qs['Question_id'] . "' and isCorrect=1";
                                            $result = $conn->query($sql);
                                            $orderNum = $result->fetch_array()['orderNum'];
                                    ?>
                                        <div class="row">
                                            <div class="col-12 m-auto text-center">
                                                <button type="button" class="addOption" onclick="addOption(this)">Add option</button>
                                            </div>
                                        </div>
                                        <div class="row pl-2">
                                            <div class="correct-answer d-flex">
                                                <span class="pr-3">Correct answer <span class="correct-answer__instruction" style="font-size: 9px;">(number only)</span>: </span>
                                                <input name="correct-ans[]" style="width: 50px" type="number" placeholder="1" value="<?php echo $orderNum;?>">
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <button type="button" class="d-flex btn addQuestion" onclick="addQuestion(this)">
                                    <i style="font-size: 22px" class="fa fa-plus-circle"></i>
                                    <span>Add question</span>
                                </button>
                            </div>
                        </div>
                <?php
                    }
                ?>
                <div class="quiz-footer px-2 pb-5 d-flex">
                    <button style="background-color: var(--sub-bg-color);
                        box-shadow: 0px 5px 5px -3px rgb(0 0 0 / 75%);
                        border: 0px" type="submit" name="create-quiz" class="btn">Update</button>
                </div>
            </div>
        </form>
    </div>
    <div id="modal-here">

    </div>
</div>
<script src="asset/js/create.js"></script>

<?php
    if (isset($_POST['create-quiz'])) {
        $quizTitle = $_POST['quiz-title'];
        $startDate = ($_POST['stating-date'] == "") ? date("Y-m-d H:i:s") : $_POST['stating-date'];
        $dueTo = ($_POST['ending-date'] == "") ? 'NULL' : "'".$_POST['ending-date']."'";
        $numQues = (int)$_POST['num-ques'];
        $inTime = ($_POST['in-time'] == "") ? 'NULL' : $_POST['in-time'];
        $privacy = (int)$_POST['quiz-privacy'];
        $diff = (int)$_POST['quiz-level'];
        $cfg = isset($_POST['quiz-category']) ? $_POST['quiz-category'] : '0';

        $user = $_SESSION['client_id'];
        if ($diff < 0) {
            $diff = 0;
        }
        else if ($diff > 100) {
            $diff = 100;
        }
        $sql = "update Quiz set title='$quizTitle', examDate='$startDate', dueDate=$dueTo, duration=$inTime, level=$diff, isPublic=$privacy, quizNum='$numQues', Category_id='$cfg' where Quiz_id='$Quiz_id'";
        print_r($sql);
        if ($conn->query($sql) == false) {
            echo "
                <script>
                    console.log('Error: ".$conn->error.". Try again!'); 
                </script>
            "; 
        }
        else {
            $j = 0;
            $success = true;
            for ($i = 0; $i < $numQues; $i++) {
                $quesTitle = $_POST['ques-title'][$i];
                $quesId = $question_id[$i];

                $score = ($_POST['scores'][$j] == "") ? 0 : $_POST['scores'][$j];
                $j += 1;
                $sql = "update Question set question='$quesTitle', score=$score where Question_id='$quesId'";
                if ($conn->query($sql)) {
                    $quesOps = $_POST['question-option'.($i+1)];
                    $corr = max((int)$_POST['correct-ans'][$i], 1);
                    $order = 1;
                    foreach ($quesOps as $val) {
                        $answerId = $options_id[$i][$order-1];
                        $isCorr = ($corr == $order) ? 1 : 0;
                        $sql = "update Option set content='$val', orderNum=$order, isCorrect=$isCorr where Option_id='$answerId'";
                        $order +=1;

                        if (!$conn->query($sql)) {
                            echo "
                                <script>
                                    alert('Error: ".$conn->error.".\nTry again!');
                                </script>
                            ";
                            $success = false;
                            break;
                        }
                        else {
                            $sql = "update ResponseDetails set isCorrect=$isCorr where Option_id='$answerId'";
                            $conn->query($sql);
                        }
                    }
                }
                else {
                    echo "
                        <script>
                            alert('Error: ".$conn->error.".\nTry again!');
                        </script>
                    ";
                }
            }
            if ($success) {
                echo "
                    <script>
                        alert('Quiz updated');
                        window.location.href = '?action=home#manage';
                    </script>
                ";
            }
        }

    }
?>