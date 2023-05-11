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
                }
                else if ($tmp == 'users' && $query == 'usersrp') {
                    include("main/users/usersrp.php");
                }
                else if ($tmp == 'quiz' && $query == 'quizrp') {
                    include("main/quiz/quizrp.php");
                }
                else {
                    include("main/home.php");
                }
?>
</div>