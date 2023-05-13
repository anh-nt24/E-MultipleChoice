<?php
$sql = "select * from Report where status=1";
$result = mysqli_query($conn, $sql);
?>

<style>
    #table-body > tr:nth-child(even) {
        background-color: rgba(0,0,0,0.03);
    }
</style>

<div class="col-12 my-5 border p-3">
    <i class="fa fa-filter" aria-hidden="true"></i>
    <input type="date" class="dateval1">
    <input type="date" class="dateval2">
    <button type="button" onclick="filter()" class="btn btn-primary py-0 px-4">Filter</button>
</div>

<div class="col-12 my-3">
    <h3 class="text-center "><b>LIST OF REPORTED QUIZZES</b></h3>
    <div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
        <table class="table mt-2 table-border w-100">
            <thead class="text-center thead-light">
                <tr>
                    <th class="align-middle" style="width: 10%">Reporter</th>
                    <th class="align-middle" style="width: 20%">Quiz name</th>
                    <th class="align-middle" style="width: 10%">Reason</th>
                    <th class="align-middle" style="width: 30%">Description</th>
                    <th class="align-middle" style="width: 10%"><button onclick="getData()" style="font-weight: bold;" class="btn time">Time</button></th>
                    <th class="align-middle" style="width: 5%">File</th>
                    <th class="align-middle" style="width: 10%">Solution</th>
                    <th class="align-middle" style="width: 5%">Status</th>
                </tr>
            </thead>
            <tbody id="table-body" class="text-center">
            </tbody>
        </table>
    </div>
</div>

<script src="main/quiz/quiz.js"></script>