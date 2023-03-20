<div>
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tmp = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tmp = '';
        $query = '';
    }
    ?>
    <div class="container">

    
    <div class="d-flex row">
        <?php
        if ($tmp == 'category' && $query == 'add') {
            include("main/category/add.php");
            include("main/category/listed.php");
        ?>
    </div>
    </div>
<?php
        } elseif ($tmp == 'category' && $query == 'repair') {
            include("main/category/repair.php");
        } elseif ($tmp == 'users' && $query == 'usersrp') {
            include("main/users/usersrp.php");
        } elseif ($tmp == 'videos' && $query == 'videosrp') {
            include("main/videos/videosrp.php");
        } else {
            include("main/home.php");
        }
?>
</div>