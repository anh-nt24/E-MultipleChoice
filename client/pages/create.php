<link rel="stylesheet" href="./asset/css/create.css">
<link rel="stylesheet" href="./asset/css/responsive.css">

<div id="page-container">
    <div class="row nopadding">
        <form method="post" class="col-lg-10 col-12 m-auto">
            <div class="quiz-content">
                <div class="quiz-header">
                    <div class="form-group">
                        <input required type="text" class="form-control" name="quiz-title" id="quiz-title" placeholder=" ">
                        <label for="quiz-title" class="quiz-title--label">Quiz Title</label>
                    </div>
                </div>
                <div class="quiz-form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="stating-date">
                                    Starting date: 
                                    <input id="stating-date" name="stating-date" class="w-100 form-control" type="datetime-local">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="ending-date">
                                    Due to:
                                    <input id="ending-date" name="ending-date" class="w-100 form-control" type="datetime-local">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="in-time">
                                    Time: 
                                    <input id="in-time" name="in-time" class="w-100 form-control" type="number" placeholder="  min(s)">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="num-ques">
                                    Number of questions: 
                                    <input readonly id="num-ques" name="num-ques" class="w-100 form-control" type="text" onkeyup="generateQues(this)">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="quiz-level">
                                    Difficulty:
                                    <input id="quiz-level" name="quiz-level" class="w-100 form-control" placeholder="0" type="number">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="quiz-privacy">
                                    Privacy:
                                    <select name="quiz-privacy" class="form-control">
                                        <option value="1" selected> Public </option>
                                        <option value="2"> Private </option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quiz-questions" data-idx="1">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-8 col-sm-10 col-12 question__title">
                            <div class="form-group">
                                <input required type="text" class="form-control" name="ques-title[]" id="ques-title" placeholder="Untitled question">
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-2 col-3">
                            <div class="form-group">
                                <input type="number" class="form-control scores" name="scores[]" placeholder="Score">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-9 question__type-selection">
                            <select name="quiz-type[]" class="form-control inputState">
                                <option value="1" selected> &#9673; Multiple choice</option>
                                <option value="2">&#8230; Text answer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col-12">
                            <div class="quiz-question__options">
                                <div class="row option">
                                    <div class="col-11">
                                        <div class="options">
                                            <div class="form-group d-flex align-items-center">
                                                <i class="fa fa-circle-thin pr-3"></i>
                                                <input required type="text" class="form-control" name="question-option1[]" placeholder="Option 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 d-flex align-items-center">
                                        <button type="button" onclick="removeOption(this)" class="btn"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 m-auto text-center">
                                    <button type="button" class="addOption" onclick="addOption(this)">Add option</button>
                                </div>
                            </div>
                            <div class="row pl-2">
                                <div class="correct-answer d-flex">
                                    <span class="pr-3">Correct answer <span class="correct-answer__instruction" style="font-size: 9px;">(number only)</span>: </span>
                                    <input name="correct-ans[]" style="width: 50px" type="number" placeholder="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="d-flex btn addQuestion" onclick="addQuestion(this)">
                            <i style="font-size: 22px" class="fa fa-plus-circle"></i>
                            <span>Add question</span>
                        </button>
                    </div>
                </div>
                <div class="quiz-footer px-2 pb-5 d-flex">
                    <button type="submit" name="create-quiz" class="btn">Submit</button>
                    <input required class="ml-auto btn" type="reset" value="Clear form">
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

        $user = $_SESSION['client_id'];
        if ($diff < 0) {
            $diff = 0;
        }
        else if ($diff > 100) {
            $diff = 100;
        }

        while (true) {
            $quiz_id = uniqid();
            $sql = "Select * from Quiz where Quiz_id='" . $quiz_id . "'";
            $result = $conn->query($sql);
            if ($result->num_rows <= 0) {
                break; 
            }
        }
        $sql = "Insert into Quiz values('".$quiz_id."', '".$quizTitle."', '".$startDate."', ".$dueTo.", ".$inTime.", ".$diff.", ".$privacy.", ".$numQues.", '".$user."')";
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
                while (true) {
                    $question_id = uniqid();
                    $sql = "Select * from Question where Question_id='" . $question_id . "'";
                    $result = $conn->query($sql); 
                    if ($result->num_rows <= 0) {
                        break;
                    }
                }
                $quesTitle = $_POST['ques-title'][$i];
                $quesType = $_POST['quiz-type'][$i];

                if ($quesType == 1) {
                    $score = ($_POST['scores'][$j] == "") ? 0 : $_POST['scores'][$j];
                    $j += 1;
                }
                else {
                    $score = 0;
                }
    
                $sql = "Insert into Question values('".$question_id."', '".$quesTitle."', ".$score.", ".$quesType.", '".$quiz_id."')";

                if ($conn->query($sql)) {
                    if ($quesType == 1) {
                        $quesOps = $_POST['question-option'.($i+1)];
                        $corr = max((int)$_POST['correct-ans'][$i], 1);
                        $order = 1;
                        foreach ($quesOps as $val) {
                            $sql = "Select * from Option";
                            $row = $conn->query($sql);
                            $answer_id = $row -> num_rows;
                            $isCorr = ($corr == $order) ? 1 : 0;
                            $sql = "Insert into Option values('".$answer_id."', '".$val."', ".$order.", ".$isCorr.", '".$question_id."')";
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
                        success('".$quiz_id."');
                    </script>
                ";
            }

        }

    }
?>