<?php
if (isset($_GET['q'])) {
    $Quiz_id = base64_decode($_GET['q']);
    $sql = "select title from Quiz where Quiz_id='$Quiz_id'";
    $result = $conn->query($sql);
    $quizName = $result->fetch_array()['title'];
?>
    <style>
        td {
            border: 1px solid #cdcdcd;
        }

        #table-body>tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.03);
        }
    </style>
    <h1 class="text-center mt-4" style="color: var(--main-bg-color)"><b><?php echo $quizName ?></b></h1>

    <div class="container">
        <div class="row d-flex">
            <div style="min-height: 300px" class="col-12 d-flex my-2 mx-auto">
                
                <div id="histogram" class="col-6 px-1">
                    <img src="asset/img/histogram.png" style="width: 100%" alt="">
                </div>
                <div id="scatter" class="col-6 px-1">
                    <img src="asset/img/scatter.png" style="width: 100%" alt="">
                </div>
            </div>
            <div class="col-12 mx-auto my-1">
                <div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
                    <h5 class="text-center pb-2"><b>Score statistics</b></h5>
                    <table class="m-auto table w-100 mx-3">
                        <thead class="text-center thead-light" style="border: 1px solid #ccc">
                            <th style="border: 1px solid #ccc"></th>
                            <th class="px-2 text-center" style="border: 1px solid #ccc">Content</th>
                            <th class="px-2 text-center" style="border: 1px solid #ccc">Quantity</th>
                        </thead>
    <?php
        $sql = "select COUNT(*) as count, q.question as qs, o.content as ct
                from ResponseDetails r
                inner join Response qz on r.Response_id = qz.Response_id
                inner join Question q on r.Question_id = q.Question_id
                inner join Option o on r.Option_id = o.Option_id
                where qz.Quiz_id = '$Quiz_id' and r.isCorrect = 1
                group by r.Question_id, r.Option_id
                order by count DESC
                LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows != 0) {
            $data1 = $result->fetch_array();
        }
        else {
            $data1 = [];
            $data1['qs'] = 'None';
            $data1['ct'] = 'None';
            $data1['count'] = 0;
        }
        // 
        $sql = "select COUNT(*) as count, q.question as qs, o.content as ct
                from ResponseDetails r
                inner join Response qz on r.Response_id = qz.Response_id
                inner join Question q on r.Question_id = q.Question_id
                inner join Option o on r.Option_id = o.Option_id
                where qz.Quiz_id = '$Quiz_id' and r.isCorrect = 0
                group by r.Question_id, r.Option_id
                order by count DESC
                LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows != 0) {
            $data2 = $result->fetch_array();
        }
        else {
            $data2 = [];
            $data2['qs'] = 'None';
            $data2['ct'] = 'None';
            $data2['count'] = 0;
        }
        // 
        $sql = "select AVG(totalScore) as m, COUNT(*) as c from Response where Quiz_id = '$Quiz_id'";
        $result = $conn->query($sql);
        if ($result->num_rows != 0) {
            $data = $result->fetch_array();
            $avg = round($data['m'], 2);
            $total = $data['c'];
        }
        else {
            $avg = 0;
            $total = 0;
        }
    ?>
                        <tbody>
                            <tr>
                                <td class="px-1"><b>Total responses</b></td>
                                <td class="text-center"></td>
                                <td class="text-center"><?php echo $total?></td>
                            </tr>
                            <tr>
                                <td class="px-1"><b>Average score</b></td>
                                <td class="text-center"><?php echo $avg?></td>
                                <td class="text-center"></td>
                            </tr>
                            <tr>
                                <td class="px-1"><b>Confidence interval (95%)</b></td>
                                <td class="text-center" id="ci"></td>
                                <td class="text-center"></td>
                            </tr>
                            <tr>
                                <td class="px-1"><b>The most popular correct</b></td>
                                <td class="px-1">
                                    <p><b>Question: </b> <?php echo $data1['qs']?></p>
                                    <p><b>Answer: </b> <?php echo $data1['ct']?></p>
                                </td>
                                <td class="text-center">
                                <?php echo $data1['count']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-1"><b>The most popular incorrect</b></td>
                                <td class="px-1">
                                    <p><b>Question: </b> <?php echo $data2['qs']?></p>
                                    <p><b>Answer: </b> <?php echo $data2['ct']?></p>
                                </td>
                                <td class="text-center">
                                    <?php echo $data2['count']?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
                    <h4 class="text-center pb-2"><b>List of responses</b></h4>
                    <table class="table mt-2 table-border w-100 mb-5">
                        <thead class="text-center thead-light">
                            <tr>
                                <th class="align-middle" style="width: 30%">Participants</th>
                                <th class="align-middle" style="width: 20%">Date</th>
                                <th class="align-middle" style="width: 20%">
                                    <button onclick="sortByHighestGrade('<?php echo $Quiz_id; ?>')" style="font-weight: bold;" class="btn time">Highest grade</button>
                                </th>
                                <th class="align-middle" style="width: 20%">In time (mins)</th>
                                <th class="align-middle" style="width: 10%">Attempts</th>
                            </tr>
                        </thead>
                        <tbody id="table-body" class="text-center">
                            <?php
                                $sql = "select u.username as name, COUNT(r.User_id) as attempts, 
                                    MAX(r.totalScore) as highest, responseAt, inTime
                                    from Response r 
                                    inner join User u on r.user_id = u.User_id WHERE r.quiz_id = '$Quiz_id'
                                    group by r.user_id, u.username";
                            $result = $conn->query($sql);
                            if ($result->num_rows == 0) {
                                echo "
                <tr>
                    <td style='border: 0px; color: red' colspan=5><b>No one has responsed this quiz</b></td>
                </tr>
                ";
                            }
                            while ($row = $result->fetch_array()) {
                                echo
                                "<tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['responseAt'] . "</td>
                            <td>" . $row['highest'] . "</td>
                            <td>" . round($row['inTime'] / 60, 2) . "</td>
                            <td>" . $row['attempts'] . "</td>
                        </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.syncfusion.com/ej2/material.css" />
    <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js"></script>
    <script src="https://cdn.syncfusion.com/ej2-charts/dist/ej2-charts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jstat@latest/dist/jstat.min.js"></script>

    <script src="asset/js/response.js"></script>
    <script>
        getData('<?php echo $Quiz_id?>')
    </script>

<?php
} else {
    echo "
        <script>
            window.location.replace('?action=home')
        </script>";
}
?>