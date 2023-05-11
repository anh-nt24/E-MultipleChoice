<link rel="stylesheet" href="asset/css/login.css">

<style>
    fieldset {
        visibility: hidden;
    }

    fieldset:nth-of-type(1) {
        visibility: visible;
    }

    form {
        position: relative;
    }

    fieldset {
        position: absolute;
        left: 0;
        right: 0;
    }
</style>

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
                        <fieldset>
                            <legend>Personal information</legend>
                            <div class="col-md-12 py-1">
                                <label for="inputNameSignIn" class="form-label sign-form-label">Your name</label>
                                <input required type="text" name="username" class="form-control" id="inputNameSignIn" autofocus>
                            </div>
                            <div class="col-md-12 py-1">
                                <label class="form-label sign-form-label">You are</label>
                                <select name="role" class="form-control" onchange="checkRole(this)">
                                    <option value="Student" selected>Student</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                            </div>
                            <div class="col-md-12 py-1">
                                <label class="form-label sign-form-label">Your grade</label>
                                <select name="grade" class="form-control grade" require>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="Higher education">Higher education</option>
                                </select>
                            </div>
                            <div class="col-md-12 py-1">
                                <label class="form-label sign-form-label">Organization</label>
                                <input name="ogn" type="text" require class="form-control" placeholder="Organization">
                            </div>

                            <div class="w100 d-flex flex-wrap justify-content-between pt-2">
                                <a href="?action=login" type="button" class="wrap-login__form-btn--outline d-flex justify-content-center align-items-center"> <b>Log in</b> </a>
                                <button type="button" value="Next" onclick="navigate(1)" class="wrap-login__form-btn d-flex justify-content-center align-items-center"> <b>Next</b> </button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Account information</legend>
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
                                <button type="button" value="Next" onclick="navigate(-1)" class="wrap-login__form-btn d-flex justify-content-center align-items-center"> <b>Back</b> </button>
                                <button type="submit" name="signup" class="wrap-login__form-btn d-flex justify-content-center align-items-center"> <b>Sign Up</b> </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const navigate = (step) => {
        const forms = document.getElementsByTagName("fieldset");
        if (step == 1) {
            forms[0].style.visibility = "hidden";
            forms[1].style.visibility = "visible";
        } else {
            forms[0].style.visibility = "visible";
            forms[1].style.visibility = "hidden";
        }
    }

    const checkRole = (e) => {
        const element = document.querySelector('select.grade');
        if (e.value == 'Teacher') {
            element.disabled = true;
        }
    }
</script>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if (isset($_POST['signup'])) {

    $name = $_POST['username'];
    $id = uniqid();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    if ($role == 'Student') {
        $grade = $_POST['grade'];
    }
    else {
        $grade = 'NULL';
    }
    $ogn = $_POST['ogn'];
    define('SITE_ROOT', realpath(dirname(__FILE__)));
    $src = $_FILES['avt']["tmp_name"];
    $ext = explode('.', basename($_FILES["avt"]["name"]));
    $avatar = $id . '.' . end($ext);
    $dist = SITE_ROOT . '/../../server/upload/user_avt/' . $avatar;
    move_uploaded_file($_FILES['avt']['tmp_name'], $dist);
    $sql = "insert into User values('$id', '$email', '$name', '$password', '$avatar', '$grade', '$role', '$ogn', 1, '')";
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