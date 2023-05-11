<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$sql = "select * from Report where status=1";
$result = mysqli_query($conn, $sql);
?>

<style>
    #table-body > tr:nth-child(even) {
        background-color: rgba(0,0,0,0.03);
    }
</style>

<div class="col-12 my-5">
    <h3 class="text-center "><b>LIST OF REPORTED QUIZZES</b></h3>
    <div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
        <table class="table mt-2 table-border w-100">
            <thead class="text-center thead-light">
                <tr>
                    <th class="align-middle" style="width: 10%">Reporter</th>
                    <th class="align-middle" style="width: 20%">Quiz name</th>
                    <th class="align-middle" style="width: 15%">Reason</th>
                    <th class="align-middle" style="width: 30%">Description</th>
                    <th class="align-middle" style="width: 10%"><button onclick="getData()" style="font-weight: bold;" class="btn time">Time</button></th>
                    <th class="align-middle" style="width: 5%">File</th>
                    <th class="align-middle" style="width: 10%">Solution</th>
                </tr>
            </thead>
            <tbody id="table-body" class="text-center">
            </tbody>
        </table>
    </div>
</div>

<script src="main/quiz/quiz.js"></script>