<?php
    $sortingOrder = $_POST['sort']; 
    $Quiz_id = $_POST['id']; 
    include('../../connection.php');
    if($sortingOrder == 'desc') {
        $sql = "select u.username as name, COUNT(r.User_id) as attempts, MAX(r.totalScore) as highest, r.responseAt, r.inTime
        from Response r 
        inner join User u 
        on r.user_id = u.User_id 
        where r.quiz_id = '$Quiz_id'
        group by r.user_id, u.username
        order by highest DESC"; 
    } 
    else {
        $sql = "select u.username as name, COUNT(r.User_id) as attempts, MAX(r.totalScore) as highest, r.responseAt, r.inTime
        from Response r 
        inner join User u 
        on r.user_id = u.User_id 
        where r.quiz_id = '$Quiz_id'
        group by r.user_id, u.username
        order by highest ASC";
    }
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        echo
        "<tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['responseAt'] . "</td>
            <td>" . $row['highest'] . "</td>
            <td>" . round($row['inTime']/60, 2) . "</td>
            <td>" . $row['attempts'] . "</td>
        </tr>";
    }

?>