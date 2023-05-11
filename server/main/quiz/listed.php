<?php
    include('../../../connection.php');
    $sortingOrder = $_GET['sort']; 
    if($sortingOrder == 'desc') {
        $query = "select * from Report where status = 1 ORDER BY reportedAt DESC"; 
    } else {
        $query = "select * from Report where status = 1 ORDER BY reportedAt ASC";
    }

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $sqlName = "select username as name from User where User_id='".$row['user_id']."'";
            $res2 = mysqli_query($conn, $sqlName);
            $name = mysqli_fetch_array($res2)[0];
            $sqlName = "select title from Quiz where Quiz_id='".$row['quiz_id']."'";
            $res2 = mysqli_query($conn, $sqlName);
            $title = mysqli_fetch_array($res2)[0];
            echo "<tr>
                    <td>" . $name . "</td>
                    <td>" . $title . "</td>
                    <td>" . $row['reason'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['reportedAt'] . "</td>
                    <td><button onclick=\"download('" . $row['file'] . "')\" class='btn'><i class='fa fa-download' aria-hidden='true'></i></button></td>
                    <td>
                        <button type='button' onclick=\"ignoreQuiz('" . $row['report_id'] . "', this)\" class='btn btn-outline-primary'><i class='fa fas fa-ban'></i></button>
                        <button type='button' onclick=\"deleteQuiz('" . $row['report_id'] . "', this)\" class='btn btn-danger'><i class='fa fas fa-remove'></i></button>
                    </td>
                </tr>";
        }
    }
    

?>