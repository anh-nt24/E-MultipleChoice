<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="../asset/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/base.css">
    <link rel="stylesheet" href="../asset/css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
    <link rel="stylesheet" href="../asset/css/login.css">
    <div id="login-page">
        <div class="main-content w-100 m-0">
            <div class="login-container">
                <div class="wrap-login d-flex flex-wrap justify-content-between">
                    <div class="col-sm-6 col-lg-5 wrap-login__img-container">
                        <img class="wrap-login__img" src="../asset/img/login_admin.webp" alt="">
                    </div>
                    <div class="col-sm-6 col-lg-7 wrap-login__main">
                        <form id="login" action="" method="post" class="wrap-login__form pr-2">
                            <div class="wrap-login__form-header sfont">
                                <h2 style="text-align: center; width: 100%; color: var(--main-bg-color)">
                                    <b>Welcome back!</b>
                                </h2>
                            </div>
                            <div class="col-md-12 py-2">
                                <label for="inputEmailSignIn" class="form-label sign-form-label">Email or Username</label>
                                <input required type="text" name="username" class="form-control" id="inputEmailSignIn" autofocus>
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
        session_start();
        include('../connection.php');
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $_SESSION['admin'] = $username;
                
    ?>
                <script>
                    window.location.replace("index.php?action=users&query=usersrp");
                </script>
    <?php
            
            }
            else {
                echo '
                    <div style="color: red; text-align: center; font-size: .875rem;">
                        <span>Invalid username or password!</span>
                    </div>
                ';
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
</body>
</html>