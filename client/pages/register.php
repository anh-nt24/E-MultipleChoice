<link rel="stylesheet" href="asset/css/login.css">

<div id="login-page">
    <div class="main-content w-100 m-0">
        <div class="login-container">
            <div class="wrap-signin d-flex flex-wrap justify-content-between">
                <div class="col-sm-6 col-lg-5 wrap-login__img-container">
                    <img class="wrap-login__img pr-4" src="asset/img/sign-up.webp" alt="">
                </div>
                <div class="col-sm-6 col-lg-7 wrap-login__main">
                    <form id="login" enctype="multipart/form-data" action="" method="post" class="wrap-signin__form pr-2">
                        <div class="wrap-login__form-header sfont">
                            <h2 style="text-align: center; width: 100%; color: var(--main-bg-color)">
                                <b>Sign up!</b>
                            </h2>
                        </div>
                        <div class="col-md-12 py-1">
                            <label for="inputNameSignIn" class="form-label sign-form-label">Your name</label>
                            <input required type="text" name="username" class="form-control" id="inputNameSignIn" autofocus>
                        </div>
                        <div class="col-md-12 py-1">
                            <label for="inputEmailSignIn" class="form-label sign-form-label">Email</label>
                            <input required type="email" name="email" class="form-control" id="inputEmailSignIn">
                        </div>
                        <div class="col-md-12 py-1">
                            <label for="inputPasswordSignIn" class="form-label sign-form-label">
                                <span class="row d-flex align-items-center">
                                    <span class="col-12">Password</span>
                                </span>
                            </label>
                            <input required type="password" name="password" class="form-control demo-show-password" id="inputPasswordSignIn" style="background-image: url('asset/img/hide-password.webp');">
                        </div>
                        <div class="col-md-12 py-1">
                            <label for="inputAvtSignIn" class="form-label sign-form-label">Avatar</label>
                            <input required type="file" name="avt" class="form-control" id="inputAvtSignIn">
                        </div>
                        <div class="col-md-12 py-1">
                            <input type="checkbox" name="remember" id="rememberme">
                            <label for="rememberme" class="form-label sign-form-label">Remember me</label>
                        </div>
                        <div class="w100 d-flex flex-wrap justify-content-between pt-2">
                            <button type="submit" name="signup" class="wrap-login__form-btn d-flex justify-content-center align-items-center" id="btnLogin"> <b>Sign Up</b> </button>
                            <a href="?action=login" type="button" name="login" class="wrap-login__form-btn--outline d-flex justify-content-center align-items-center"> <b>Log in</b> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    if (isset($_POST['signup'])) {
        
        $name = $_POST['username'];
        $id = uniqid();
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        define('SITE_ROOT', realpath(dirname(__FILE__)));
        $src = $_FILES['avt']["tmp_name"];
        $ext = explode('.', basename($_FILES["avt"]["name"]));
        $avatar = $id . '.' . end($ext);
        $dist = SITE_ROOT . '/../../server/upload/user_avt/' . $avatar;
        move_uploaded_file($_FILES['avt']['tmp_name'], $dist);
        $sql = "insert into User values('$id', '$email', '$name', '$password', '$avatar')";
        if (isset($_POST['remember'])) {
            $cookie_name = "me";
            setcookie($cookie_name, $name, time() + (86400 * 10), "/");
        }
        if ($conn->query($sql)) {
            $_SESSION['login'] = $name;
            $_SESSION['client_id'] = $id;
?>
            <script>
                window.location.replace('?action=home');
            </script>
<?php
        }
    }
?> 