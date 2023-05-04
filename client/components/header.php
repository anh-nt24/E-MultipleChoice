<?php
// Đăng xuất, hủy session
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    unset($_SESSION['login']);
    unset($_SESSION['client_id']);
}
?>

<?php
    if ($_SESSION['client_id']) {
        $id = $_SESSION['client_id'];
        $sql = "select * from User where User_id='".$id."'";
        $result = $conn->query($sql);
        $user = $result->fetch_array();
        $username = $user['username'];
        $avatar = $user['avatar'];
?>
<link rel="stylesheet" href="asset/css/homepage.css">
<div id="header" class="header">
    <nav class="navbar navbar-brand navbar-expand-lg navbar-light bg-color navbar-custom">
        <a href="" class="navbar-brand logo-header">
            <img src="asset/img/logo.png" alt="logo">
            <br>
            <span class="sfont" style="padding-left: 0.4em">MultiA</span>
        </a>
        <nav class="tabbar m-auto">
            <ul class="navbar-nav mx-auto homepage__nav">
                <li id="homepage-tab" class="nav-item active">
                    <a href="#homepage" class="nav-link sfont"> HomePage <span class="sr-only">(current)</span></a>
                </li>
                <li id="achiev-tab" class="nav-item">
                    <a href="#manage" class="nav-link sfont"> Quiz Management </a>
                </li>
            </ul>
        </nav>

        <a href="?action=profile" class="btn user__info d-flex align-items-center">
            <img class="user__info__avatar" src="<?php
                if (isset($avatar)) {
                    echo 'server/upload/user_avt/'.$avatar;
                }
                else {
                    echo 'asset/img/avatar.jpg';
                }
            ?>" alt="account">
            <span class="sfont user__info__name d-flex align-items-center"><?php 
                if (isset($username)) {
                    echo $username;
                }
                else {
                    echo 'User';
                }
            ?><i class="fa fa-solid fa-angle-down"></i></span>

        </a>
    </nav>
</div>

<?php
    }
    else { 
        // neu chua ton tai
?>
<link rel="stylesheet" href="asset/css/launchpage.css">
<div id="header" class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-color">
        <a href="" class="navbar-brand logo-header logo-header-left mr-auto">
        <img src="asset/img/logo.png" alt="logo" onerror="this.onerror=null; this.src='./asset/img/logo.png'" onerror="this.onerror=null; this.src='./asset/img/logo.png'">
            <br>
            <span class="sfont" style="padding-left: 0.4em">MultiA</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="left-header collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="header-item-list navbar-nav mr-auto">
                <li id="intro-src" class="header-item nav-item zoom active">
                    <div class="nav-link"> INTRODUCTION <span class="sr-only">(current)</span></div>
                </li>
                <li id="feature-src" class="header-item nav-item zoom">
                    <div class="nav-link">FEATURES</div>
                </li>
                <li id="contact-src" class="header-item nav-item zoom">
                    <div class="nav-link">CONTACT</div>
                </li>
            </ul>

            <a href="" class="navbar-brand logo-header logo-header-center mr-auto">
                <img src="asset/img/logo.png" alt="logo" onerror="this.onerror=null; this.src='./asset/img/logo.png'">
                <br>
                <span class="sfont" style="padding-left: 0.4em">MultiA</span>
            </a>

            <div class="right-header">
                <div class="form-inline my-2 my-lg-0 mr-2 sign-in">
                    <button class="btn btn-primary my-2 my-sm-0" data-toggle="modal" data-target="#sign-in-form">Sign in</button>
                </div>
                <div class="form-inline my-2 my-lg-0 sign-up">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" data-toggle="modal" data-target="#sign-up-form">Sign up</button>
                </div>

                <!-- <div>
                    <div class="my-2 my-lg-0 language">
                        <div class="dropdown">
                            <div class="nav-link nav-lang">
                                <img src="../../static/img/eng.png" alt="" style="width:20px">
                                <br>
                                <span>ENG</span>
                            </div>
                            <div class="dropdown-menu language list-lang">
                                <a class="dropdown-item" href="#vie">
                                    <img src="../../static/img/vie.png" alt="" style="width:10px">
                                    <span>VIE</span>
                                </a>
    
                                <div class="dropdown-divider"></div>
    
                                <a class="dropdown-item" href="#eng">
                                    <img src="../../static/img/eng.png" alt="" style="width:10px">
                                    <span>ENG</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </nav>
    <div class="progress-container">
        <div class="progress-bar" id="scrollBar"></div>
    </div>
<?php 
    }
?>
</div>
