<link rel="stylesheet" href="asset/css/login.css">

<div id="login-page">
    <div class="main-content w-100 m-0">
        <div class="login-container">
            <div class="wrap-login d-flex flex-wrap justify-content-between">
                <div class="col-sm-6 col-lg-5 wrap-login__img-container">
                    <img class="wrap-login__img" src="asset/img/sign-in2.webp" alt="">
                </div>
                <div class="col-sm-6 col-lg-7 wrap-login__main">
                    <!-- <div class="col-md-12 text-right" style="padding: 10px">
                        <a href="">
                            <img src="asset/img/eng.png" style="width: 20px" alt="">
                        </a>
                    </div> -->
                    <form id="login" action="" method="post" class="wrap-login__form pr-2">
                        <div class="wrap-login__form-header sfont">
                            <h2 style="text-align: center; width: 100%; color: var(--main-bg-color)">
                                <b>Welcome back!</b>
                            </h2>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="inputEmailSignIn" class="form-label sign-form-label">Email</label>
                            <input required type="email" name="username" class="form-control" id="inputEmailSignIn" autofocus>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="inputPasswordSignIn" class="form-label sign-form-label">
                                <span class="row d-flex align-items-center">
                                    <span class="col-12">Password</span>
                                </span>
                            </label>
                            <input required type="password" name="password" class="form-control demo-show-password" id="inputPasswordSignIn" style="background-image: url('asset/img/hide-password.webp');">
                        </div>
<?php 
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "Select * FROM User WHERE email='$username' AND password='$password' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            if ($row['active'] == 0) {
                echo '<div style="color: red; text-align: center; font-size: .875rem;">
                        <span>This account has been deactivated!</span>
                    </div>';
            }
            else{
                $_SESSION['login'] = $row['username'];
                $_SESSION['client_id'] = $row['User_id'];
?>
                <script>
                    window.location.replace('?action=home');
                </script>
<?php
            }
        }
        else {
            echo '<div style="color: red; text-align: center; font-size: .875rem;">
            <span>Invalid username or password!</span>
            </div>';
        }
    }
?> 
                        <div class="w100 d-flex flex-wrap justify-content-center pt-2">
                            <button type="submit" name="login" class="wrap-login__form-btn d-flex justify-content-center align-items-center" id="btnLogin"> <b>Log in</b> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
