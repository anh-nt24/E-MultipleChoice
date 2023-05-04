<link rel="stylesheet" href="./asset/css/profile.css">

<?php
if ($_SESSION['client_id']) {
    $id = $_SESSION['client_id'];
    $sql = "select * from User where User_id='" . $id . "'";
    $result = $conn->query($sql);
    $user = $result->fetch_array();
    $username = $user['username'];
    $avatar = $user['avatar'];
    $level = $user['gradeLevel'] ? 'Grade: ' . $user['gradeLevel'] : '';
    $role = 'Role: ' . $user['role'];
    $email = $user['email'];
    $organization = $user['organization'];

    $sql = "select count(*) as num from Quiz where author_id='$id'";
    $result = $conn->query($sql);
    $contri = $result->fetch_array()['num'];

    $sql = "select count(*) as num from Response where User_id='$id'";
    $result = $conn->query($sql);
    $response = $result->fetch_array()['num'];
}
?>

<main class="profile-page">
    <section class="section-profile-cover section-shaped my-0">
        <div class="shape shape-style-1 shape-default alpha-4">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <div class="separator separator-bottom separator-skew">
            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="card-profile shadow mt--300 card">
                <div class="px-4">
                    <div class="justify-content-center row">
                        <div class="order-lg-2 col-lg-3">
                            <div class="card-profile-image">
                                <img alt="..." class="rounded-circle" src="
                                    <?php
                                    if (isset($avatar)) {
                                        echo 'server/upload/user_avt/' . $avatar;
                                    } else {
                                        echo 'asset/img/avatar.jpg';
                                    }
                                    ?>
                                ">
                            </div>
                        </div>
                        <div class="order-lg-3 text-lg-right align-self-lg-center col-lg-4 pt-lg-3">
                            <div class="card-profile-actions py-4 mt-lg-0">
                                <a href="?action=home#manage" class="mr-4 btn btn-info btn-sm">My quizzes</a>
                                <button type="button" onclick="logout()" class="float-right btn btn-danger btn-sm">Logout <i class="fa fa-sign-out" style="color:#fff"></i></button>
                            </div>
                        </div>
                        <div class="order-lg-1 col-lg-4">
                            <div class="card-profile-stats d-flex justify-content-center pt-md-5 pt-lg-3">
                                <div><span class="heading"><?php echo $contri ?></span><span class="description">Contributions</span></div>
                                <div><span class="heading"><?php echo $response ?></span><span class="description">Responses</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <h3><?php echo $username; ?></h3>
                        <div class="h6 font-weight-300">
                            <i class="ni location_pin mr-2"></i><?php echo $role; ?>;
                            <span class="h6 mt-4"><i class="ni business_briefcase-24 mr-2"></i><?php echo $level; ?></span>

                        </div>
                        <div><i class="ni education_hat mr-2"></i><b><?php echo $organization; ?></b></div>
                    </div>
                    <div class="container border-top mt-5">
                        <div class="row mt-4">
                            <div class="col-9 m-auto">
                                <h3><i class='fa fas fa-edit pr-1'></i>Personal info</h3>
                                <form class="form-horizontal px-3" role="form">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>Your name</b></label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $username?>" class="form-control" required placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>Your email</b></label>
                                        <div class="col-sm-9">
                                            <input type="email" value="<?php echo $email?>" class="form-control" required placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>Grade</b></label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <option <?php if ($user['gradeLevel'] == "1") echo "selected"; else echo '';?> value="1">1</option>
                                                <option <?php if ($user['gradeLevel'] == "2") echo "selected"; else echo '';?> value="2">2</option>
                                                <option <?php if ($user['gradeLevel'] == "3") echo "selected"; else echo '';?> value="3">3</option>
                                                <option <?php if ($user['gradeLevel'] == "4") echo "selected"; else echo '';?> value="4">4</option>
                                                <option <?php if ($user['gradeLevel'] == "5") echo "selected"; else echo '';?> value="5">5</option>
                                                <option <?php if ($user['gradeLevel'] == "6") echo "selected"; else echo '';?> value="6">6</option>
                                                <option <?php if ($user['gradeLevel'] == "7") echo "selected"; else echo '';?> value="7">7</option>
                                                <option <?php if ($user['gradeLevel'] == "8") echo "selected"; else echo '';?> value="8">8</option>
                                                <option <?php if ($user['gradeLevel'] == "9") echo "selected"; else echo '';?> value="9">9</option>
                                                <option <?php if ($user['gradeLevel'] == "10") echo "selected"; else echo '';?> value="10">10</option>
                                                <option <?php if ($user['gradeLevel'] == "11") echo "selected"; else echo '';?> value="11">11</option>
                                                <option <?php if ($user['gradeLevel'] == "12") echo "selected"; else echo '';?> value="12">12</option>
                                                <option <?php if ($user['gradeLevel'] == "Higher education") echo "selected"; else echo '';?> value="Higher education">Higher education</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>Role</b></label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <option <?php if ($user['role'] == "Student") echo "selected"; else echo '';?> value="Student">Student</option>
                                                <option <?php if ($user['role'] == "Teacher") echo "selected"; else echo '';?> value="Teacher">Teacher</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>Organization</b></label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $organization?>" require class="form-control" placeholder="Role">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="container pb-4">
                        <div class="row">
                            <div class="col-9 m-auto d-flex justify-content-around">
                                <button id="save" class="btn btn-primary" type="button" disabled>
                                    Save changes
                                </button>
                                <button id="changepass" class="btn btn-warning" type="button">
                                    Change password
                                </button>
                            </div>
                        </div>
                    </div>
                    <section class="container mt-4 show-password" style="display: none">
                        <div class="row">
                            <div class="col">
                                <label for="">
                                    <span style="color: red">Confirm your password: </span>
                                    <input name="password" type="password" required>
                                </label>
                                <button id="confirm" name="confirm" class="btn btn-primary" type="submit">
                                    Confirm
                                </button>
                            </div>
                        </div>
                        <div class="row" id="cfm-pas"></div>
                    </section>
                    <!-- <div class="container border-top mt-5 changepass" >
                        <div class="row mt-4">
                            <div class="col-9 m-auto">
                                <div class="d-flex justify-content-between">
                                    <h3><i class='fa fas fa-edit pr-1'></i>Change password</h3>
                                    <button class="btn btn-light">Close</button>
                                </div>
                                <form class="form-horizontal px-3 pt-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>Old password</b></label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>New password</b></label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><b>Confirm password</b></label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 450px; margin-bottom: 50px">
        <div class="shadow card">
            <div class="px-4">
                <section class="container mt-4 show-password" style="display: none">
                    <div class="row">
                        <div class="col">
                            <label for="">
                                <span style="color: red">Confirm your password: </span>
                                <input name="password" type="password" required>
                            </label>
                            <button id="confirm" name="confirm" class="btn btn-primary" type="submit">
                                Confirm
                            </button>
                        </div>
                    </div>
                    <div class="row" id="cfm-pas"></div>
                </section>
                <div class="container border-top mt-5 changepass" >
                    <div class="row mt-4">
                        <div class="col-9 m-auto">
                            <div class="d-flex justify-content-between">
                                <h3><i class='fa fas fa-edit pr-1'></i>Change password</h3>
                                <button class="btn btn-light">Close</button>
                            </div>
                            <form class="form-horizontal px-3 pt-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><b>Old password</b></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><b>New password</b></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><b>Confirm password</b></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
