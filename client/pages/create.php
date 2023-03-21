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
                                    <input required id="stating-date" name="stating-date" class="w-100 form-control" type="datetime-local">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="ending-date">
                                    Due to:
                                    <input required id="ending-date" name="ending-date" class="w-100 form-control" type="datetime-local">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="in-time">
                                    Time: 
                                    <input required id="in-time" name="in-time" class="w-100 form-control" type="text" placeholder="  min(s)">
                                </label>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="w-100" for="num-ques">
                                    Number of questions: 
                                    <input readonly id="num-ques" name="num-ques" class="w-100 form-control" type="text" onkeyup="generateQues(this)">
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
                            <button type="button" class="btn w-100 question__image-import"><i class="fa fa-image"></i></button>
                        </div>
                        <div class="col-md-3 col-sm-12 col-9 question__type-selection">
                            <select name="quiz-type" class="form-control inputState">
                                <option value="1" selected> &#9673; Multiple choice</option>
                                <option value="2">&#9745; Checkboxes</option>
                                <option value="3">&#8230; Text answer</option>
                                </select>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col-12">
                            <div class="quiz-question__options">
                                <div class="row option">
                                    <div class="col-sm-10 col-9">
                                        <div class="options">
                                            <div class="form-group d-flex align-items-center">
                                                <i class="fa fa-circle-thin pr-3"></i>
                                                <input required type="text" class="form-control" name="question-option1[]" placeholder="Option 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-3 d-flex align-items-center">
                                        <button type="button" class="btn w-100 question__image-import"><i class="fa fa-image"></i></button>
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
                                    <input required name="correct-ans[]" style="width: 50px" type="text" placeholder="ex: 1">
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
                <div class="quiz-footer px-2 d-flex">
                    <button type="submit" name="create-quiz" class="btn">Submit</button>
                    <input required class="ml-auto btn" type="reset" value="Clear form">
                </div>
            </div>
        </form>
    </div>
</div>
<script src="asset/js/create.js"></script>

<?php
    if (isset($_POST['create-quiz'])) {
        $quizTitle = $_POST['quiz-title'];
        $startDate = $_POST['stating-date'];
        $dueTo = $_POST['ending-date'];
        $numQues = (int)$_POST['num-ques'];
        $inTime = (int)$_POST['in-time'];

        while (true) {
            $quiz_id = uniqid();
            $sql = "Select * from Quiz where Quiz_id='" . $quiz_id . "'";
            $result = $conn->query($sql);
            if ($result->num_rows <= 0) {
                break;
            }
        }
        $sql = "Insert into Quiz values('".$quiz_id."', '".$startDate."', '".$dueTo."', ".$inTime.", ".$numQues.")";

        if ($conn->query($sql) == false) {
            echo "
                <script>
                    alert('Error: ".$conn->error.".\nTry again!');
                </script>
            ";
        }
        else {
            for ($i = 0; $i < $numQues; $i++) {
                while (true) {
                    $id = uniqid();
                    $sql = "Select * from Question where Question_id='" . $id . "'";
                    $result = $conn->query($sql);
                    if ($result->num_rows <= 0) {
                        break;
                    }
                }
                $quesTitle = $_POST['ques-title'][$i];
                $corr = $_POST['correct-ans'][$i];
                $quizType = $_POST['quiz-type'][$i];
                $quesOps = $_POST['question-option'.($i+1)];
                $selection = '';
                $score = 1;
                $diff = 100;
                for ($j = 0; $j < count($quesOps)-1; $j++) {
                    $selection = $selection . $quesOps[$j] . '  Xms1312442*o33  ';
                }
                $selection = $selection . $quesOps[$j];
    
                $sql = "Insert into Question values('".$id."', '".$quesTitle."', '".$selection."', ".$corr.", ".$score.", ".$diff.", '".$quiz_id."')";
                if ($conn->query($sql)) {
                    echo "
                        <script>
                            alert('Added successfully. Save this QuizID: ".$quiz_id."');
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
        }

    }
?>