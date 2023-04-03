<?php
// Lock user
if (isset($_GET['reassign'])) {
    $usersrp = $_GET['reassign'];
    $sql = "UPDATE users SET status ='1' WHERE userId = $usersrp";
    $conn->query($sql);
    $sql_rp = "DELETE FROM  usersrp WHERE userId = $usersrp";
    $conn->query($sql_rp);
}
else if (isset($_GET['ignore'])) {
    $usersrp = $_GET['ignore'];
    $sql_rp = "DELETE FROM usersrp WHERE userId = $usersrp";
    $conn->query($sql_rp);
}
?>

<div class="col-12 my-5">
    <h6 class="text-uppercase text-center">list of reported quiz</h6>
    <div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
    <table class="table mt-2 table-borderless w-100">
        <thead class="text-center thead-light">
            <tr>
                <th class="align-middle w-25">Quiz id</th>
                <th class="align-middle w-50">Reason</th>
                <th class="align-middle w-25">Solution</th>
            </tr>
        </thead>
        <tbody class="text-center">
<?php 
        $sql = "SELECT DISTINCT * FROM usersrp WHERE status = 0";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_array()) {

                $sql_user = "SELECT * FROM users WHERE userId = $row[userId] LIMIT 1";
                // echo $sql_user;
                $result_user = $conn->query($sql_user);
                
                if ($result_user->num_rows > 0) {
                // output data of each row
                $row_user = $result_user->fetch_array();

?>
        <tr>
            <td><?php echo $row_user['username']; ?></td>
            <td>
                <div class="d-flex justify-content-center">
                    <a id="menu-profile" class="mx-5 nav-link text-danger" href="index.php?action=users&query=usersrp&reassign=<?php echo $row['userId']; ?>" class="nav-link">Reassign</a>
                    <a id="menu-profile" class="mx-5 nav-link text-success" href="index.php?action=users&query=usersrp&ignore=<?php echo $row['userId']; ?>" class="nav-link">Ignore</a>
                </div>
            </td>
        </tr>
        
<?php
                }
            } 
        }
?>
        </table>
    </div>
</div>