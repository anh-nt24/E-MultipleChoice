<link rel="stylesheet" href="./asset/css/launchpage.css">
<link rel="stylesheet" href="./asset/css/responsive.css">

<?php
    if (isset($_GET['token'])) {
        $quizID = base64_decode($_GET['token']);
        $sql = "select title from Quiz where Quiz_id = '".$quizID."'";
        $result = $conn->query($sql);
        $quizTitle = $result->fetch_array()['title'];
    }
?>
<div id="contact" class="contact sfont mb-4">
    <div class="keep-in-touch col-lg-4 ">
        <div class="contact-info">
            <h4 class="content-title">Information</h4>
            <h5 class="content-subtitle">
                Here's our some basic information
            </h5>
            <ul class="contact-info-content">
                <li class="contact-method">
                    <h6 class="method-name"><i class="fa fa-regular fa-phone"></i> Phone</h6>
                    <p class="method-note">Mon-Fri from 8AM to 7PM</p>
                    <p class="method-content">
                        (+84) 123131245
                    </p>
                </li>

                <li class="contact-method">
                    <h6 class="method-name"><i class="fa fa-solid fa-envelope" style="margin-right: 10px"></i>Email</h6>
                    <p class="method-note">Anytime but sometimes cannot reply right away, 2 days at the latest</p>
                    <p class="method-content">
                        contact@multia.support.com
                    </p>
                </li>

                <li class="contact-method">
                    <h6 class="method-name"><i class="fa fa-map-marker" style="margin-right: 10px; width: 15px;"></i>Office</h6>
                    <p class="method-note">Come say hello at our office</p>
                    <p class="method-content">
                        19, Nguyen Huu Tho St., Tan Phong ward, District 7, Ho Chi Minh City, Vietnam
                    </p>
                </li>
            </ul>
        </div>
        <div class="follow-info hidden-ani ">
            <h4 class="content-title">Follow us:</h4>
            <div class="follow-icon">
                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-brands fa-facebook"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-brands fa-twitter"></i></a>
                <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-brands fa-linkedin"></i></a>
            </div>
        </div>
    </div>

    <div class="user-contact col-lg-8">
        <h2 class="content-title">Report a quiz</h2>
        <p>--Issues? Leave a message--</p>
        <div class="user-contact">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="contact-usr-name" class="form-label">Your Name</label>
                    <input name="username"  type="text" class="form-control" id="contact-usr-name" placeholder="Nguyen Van A">
                </div>
                <div class="mb-3">
                    <label for="contact-usr-phone" class="form-label">Quiz ID</label>
                    <input readonly type="text" class="form-control" id="contact-usr-phone" placeholder="abc123" value="<?php echo $quizID?>">
                </div>
                <div class="mb-3">
                    <label for="contact-usr-phone" class="form-label">Quiz title</label>
                    <input readonly type="text" class="form-control" id="contact-usr-phone" placeholder="abc123" value="<?php echo $quizTitle?>">
                </div>
                <div class="mb-3">
                    <label for="contact-usrmsg" class="form-label reason-label">Reason</label>
                    <textarea name="reason" class="form-control reason" id="contact-usrmsg" rows="1" placeholder="Text here"></textarea>
                </div>
                <div class="mb-3">
                    <label for="contact-usrmsg" class="form-label">Description your problem</label>
                    <textarea name="description" class="form-control" id="contact-usrmsg" rows="3" placeholder="Text here"></textarea>
                </div>
                <div class="mb-3">
                    <label for="contact-usr-file" class="form-label">Attach proof files</label>
                    <input name="fileUpload" class="form-control" type="file" id="contact-usr-file">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input  class="form-check-input" type="checkbox" id="contact-usr-has-checked">
                        <label class="form-check-label" for="contact-usr-has-checked">
                        I have carefully checked!
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary mt-2 submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="asset/js/report.js"></script>

<?php
    if (isset($_POST['submit'])) {
        $src = $_FILES["fileUpload"]["tmp_name"];
        $uploadFile = basename($_FILES["fileUpload"]["name"]);
        $dist = '../../server/upload/report/' . $uploadFile;
        print_r($src."<br>");


        print_r($dist);

        if ((move_uploaded_file($src, $dist))) {
            // $cmd = "echo 123 | sudo -S mv '".$src."' '".$uploadFile."'";
            // $status = rename($src, $src . '/../../..' . $uploadFile);
            // print_r($status);
            print_r('suc');
        }
        else {
            print_r('Failed');
        }
    }
?>