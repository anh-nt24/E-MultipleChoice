<style>
    #table-body > tr:nth-child(even) {
        background-color: rgba(0,0,0,0.03);
    }
</style>

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
    <h3 class="text-uppercase text-center"><b>List of deactivated accounts</b></h3>
    <div style="background-color: #FDF0F1;" class="bg-white rounded mt-3">
    <table class="table mt-2 table-borderless w-100">
        <thead class="text-center thead-light">
            <tr>
                <th class="align-middle w-25">Username</th>
                <th class="align-middle w-25">Email</th>
                <th class="align-middle w-50">Reason</th>
            </tr>
        </thead>
        <tbody id="table-body" class="text-center">
<?php 
        $sql = "select distinct * from User where active=0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
?>
        <tr>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['reason'];?></td>
            <!-- <td>
                <div class="d-flex justify-content-center">
                    <a id="menu-profile" class="mx-5 nav-link text-danger" href="index.php?action=users&query=usersrp&reassign=<?php echo $row['userId']; ?>" class="nav-link">Reassign</a>
                    <a id="menu-profile" class="mx-5 nav-link text-success" href="index.php?action=users&query=usersrp&ignore=<?php echo $row['userId']; ?>" class="nav-link">Ignore</a>
                </div>
            </td> -->
        </tr>
        
<?php
            }
        } 
?>
        </table>
    </div>
</div>