
<?php
// Lock user
if (isset($_GET['lockvideo'])) {
    $videosrp = $_GET['lockvideo'];

    $sql = "UPDATE videos SET status ='1' WHERE  id = $videosrp";
    
    $conn->query($sql);

    $sql_rp = "DELETE FROM videosrp WHERE videoId = $videosrp";
    
    $conn->query($sql_rp);
    }

elseif(isset($_GET['passvideo'])) {
    $videosrp = $_GET['passvideo'];

    $sql_rp = "DELETE FROM videosrp WHERE videoId = $videosrp";
    
    $conn->query($sql_rp);
    }
?>

<div class="col-lg-10 col-12 my-5">
<h6 class="text-uppercase text-center">video bị báo cáo</h6>
<div class="mt-3">

  <?php 
  $sql = "SELECT DISTINCT * FROM videosrp WHERE status = 0";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {

        $sql_video = "SELECT * FROM videos WHERE id = $row[videoId] LIMIT 1";
        // echo $sql_video;
        $result_video = $conn->query($sql_video);
        
        if ($result_video->num_rows > 0) {
          // output data of each row
          $row_video = $result_video->fetch_array();

  ?>
<div style="background-color: #FDF0F1;" class="d-flex row my-3 rounded">


<div class="col-7 my-3">
<div class="ratio ratio-16x9">
                            <iframe src="upload/<?php echo $row_video['filePath']; ?>" allowfullscreen></iframe>
                        </div>
</div>

    <div class="col-5">

    <h6 style="padding: 0.25rem 0.5rem;" id="title-list" class="text-dark"><?php echo $row_video['title']; ?></h6>

                                        <?php
                                        $id = $row_video['userId'];

                                        $sql_users = "SELECT * FROM users WHERE users.userId= $id";
                                        $result_users = $conn->query($sql_users);

                                        if ($result_users->num_rows > 0) {
                                            // output data of each row

                                            $row_users = $result_users->fetch_array();
                                        ?>
                                            <a id="user" class="text-dark" href="../index.php?manage=profile&userId=<?php echo $row_users['userId']; ?>"><?php echo $row_users['firstName'] ?> <?php echo $row_users['lastName'] ?></i></a>
                                            <span class="mx-2" style="font-size:0.7rem">
                                                <?php echo $row_video['uploadDate'] ?>
                                            </span>

                                        <?php

                                        } else {
                                            //echo "0 results";
                                        }
                                        ?>

        <div>
        <a id="menu-profile" class="my-3 mx-2 nav-link text-danger" href="index.php?action=videos&query=videosrp&lockvideo=<?php echo $row['videoId']; ?>" class="nav-link">Khóa</a>
    <a id="menu-profile" class="my-3 mx-2 nav-link text-success" href="index.php?action=videos&query=videosrp&passvideo=<?php echo $row['videoId']; ?>" class="nav-link">Bỏ qua</a>
        </div>

    </div>
        
    </div>  
   
    <?php
    }
    } 
}
    ?>

</div>
</div>