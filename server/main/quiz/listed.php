<?php
    include('../../../connection.php');
    if (isset($_POST['sort']) && isset($_POST['date1']) && isset($_POST['date2'])) {
        $sortingOrder = $_POST['sort'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        if ($sortingOrder == 'desc') {
            $query = "SELECT * FROM Report WHERE reportedAt BETWEEN '$date1' AND '$date2' ORDER BY status DESC, reportedAt DESC";
        } else {
            $query = "SELECT * FROM Report WHERE reportedAt BETWEEN '$date1' AND '$date2' ORDER BY status DESC, reportedAt ASC";
        }
    }
    else {
        $sortingOrder = $_GET['sort']; 
        if($sortingOrder == 'desc') {
            $query = "SELECT * FROM Report ORDER BY status DESC, reportedAt DESC";
        } else {
            $query = "SELECT * FROM Report ORDER BY status DESC, reportedAt ASC";
        }
    }
    print_r($sql);

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $sqlName = "select username as name from User where User_id='".$row['user_id']."'";
            $res2 = mysqli_query($conn, $sqlName);
            $name = mysqli_fetch_array($res2)[0];
            $sqlName = "select title from Quiz where Quiz_id='".$row['quiz_id']."'";
            $res2 = mysqli_query($conn, $sqlName);
            $title = mysqli_fetch_array($res2)[0];
            $html = 
            "<tr>
                    <td>" . $name . "</td>
                    <td>" . $title . "</td>
                    <td>" . $row['reason'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['reportedAt'] . "</td>
                    <td><button onclick=\"download('" . $row['file'] . "')\" class='btn'><i class='fa fa-download' aria-hidden='true'></i></button></td>
                    <td>
                        <button type='button' onclick=\"ignoreQuiz('" . $row['report_id'] . "', this)\" class='btn btn-outline-primary w-25 px-1 py-0'><i class='fa fas fa-ban'></i></button>
                        <button type='button' onclick=\"deleteQuiz('" . $row['report_id'] . "', this)\" class='btn btn-danger w-25 px-1 py-0'><i class='fa fas fa-remove'></i></button>
                        <button type='button' onclick=\"undoAction('" . $row['report_id'] . "')\" class='btn btn-info w-25 px-1 py-0'><i class='fa fa-undo'></i></button>
                    </td>
                    ";
            if ($row['status'] == 1) {
                $html .= "
                    <td><span class='badge badge-warning'>Waiting</span>
                    </td>
                ";
            }
            else {
                $html.= "
                    <td><span class='badge badge-success'>Finished</span>
                    </td>
                ";
            }
            $html .= "</tr>";
            echo $html;
        }
    }
    
    

?>