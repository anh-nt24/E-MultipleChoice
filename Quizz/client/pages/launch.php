<link rel="stylesheet" href="./asset/css/launchpage.css">

<div id="container" class="bd-container position-relative">
    <div id="introduction" class="introduction">
        <div class="introduction-content">
            <div class="navbar-brand logo-body mr-auto hidden-ani">
                <img src="./asset/img/logo.png" alt="logo">
                <br>
                <div>
                    <span style="padding-left: 0.4em">MultiA</span>
                    <p> a website to meet almost your needs in </p>
                </div>
            </div>
            <div class="introduction-title hidden-ani">
                <h2 class="content-title">Creating multiple choice online tests and validation</h2>
            </div>
            <button type="button" class="btn btn-primary hidden-ani" data-toggle="modal" data-target="#sign-in-form">Join now</button>
            
            <div class="container list-brief mt-4 mb-3 ml-auto mr-auto hidden-ani">
                <div class="row">
                    <div class="col"><p class="list-brief-content"><i class="fa fa-regular fa-thumbs-up"></i>Beautiful interface</p></div>
                    <div class="col"><p class="list-brief-content"><i class="fa fa-regular fa-thumbs-up"></i>Easy to use</p></div>
                </div>
                <div class="row">
                    <div class="col"><p class="list-brief-content"><i class="fa fa-regular fa-thumbs-up"></i>Honest validation</p></div>
                    <div class="col"><p class="list-brief-content"><i class="fa fa-regular fa-thumbs-up"></i>User supportive</p></div>
                </div>
            </div>
        </div>
        <div class="introduction-img hidden-ani">
            <img class="intro-img--half" src="./asset/img/intro-home.png" alt="">
        </div>
    </div>

    <div id="features" class="feature">
        <h2 class="content-title">Key features</h2>
        <div class="col timeline">
            <span class="default-line"></span>
            <span class="drawn-line hidden-ani"></span>
            
            <div class="time-line-container hidden-ani">
                <div class="time-line-mark"><img src="./asset/img/db-icon.png" alt=""></div>
                <div class="timeline-content zoom">
                    <h4 class="time-line-name">Storage</h4>
                    <p>All examinations stored in our database helps you easily 
                        customize, reuse or query them
                    </p>
                </div>
            </div>

            <div class="time-line-container hidden-ani">
                <div class="time-line-mark"><img src="./asset/img/privacy-icon.png" alt=""></div>
                <div class="timeline-content zoom">
                    <h4 class="time-line-name">Privacy</h4>
                    <p>Allowing examiners to set the examination public for all 
                        or private for internal. For private, only people having test ID 
                        or invited is able to access
                    </p>
                </div>
            </div>

            <div class="time-line-container hidden-ani">
                <div class="time-line-mark"><img src="./asset/img/stats-icon.png" alt=""></div>
                <div class="timeline-content zoom">
                    <h4 class="time-line-name">Statistics</h4>
                    <p>
                        Statistics of the number of people who have taken the test, the score, the rank, etc
                    </p>
                </div>
            </div>

            <div class="time-line-container hidden-ani">
                <div class="time-line-mark"><img src="./asset/img/pdf-icon.png" alt=""></div>
                <div class="timeline-content zoom">
                    <h4 class="time-line-name">Export</h4>
                    <p>Able to export the test to pdf file to print out when necessary
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact sfont">
        <div class="keep-in-touch col-lg-4 ">
            <div class="contact-info hidden-ani ">
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
            <h2 class="content-title">Contact us</h2>
            <p>--Issues? Leave a message--</p>
            <div class="user-contact">
                <form>
                    <div class="mb-3">
                        <label for="contact-usr-name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="contact-usr-name" placeholder="Nguyen Van A">
                    </div>
                    <div class="mb-3">
                        <label for="contact-usr-mail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="contact-usr-mail" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="contact-usr-phone" class="form-label">Phone number</label>
                        <input type="email" class="form-control" id="contact-usr-phone" placeholder="012345678">
                    </div>
                    <div class="mb-3">
                        <label for="contact-usrmsg" class="form-label">Message</label>
                        <textarea class="form-control" id="contact-usrmsg" rows="3" placeholder="Text here"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact-usr-file" class="form-label">Having file(s) to attack?</label>
                        <input class="form-control" type="file" id="contact-usr-file">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="contact-usr-has-checked">
                            <label class="form-check-label" for="contact-usr-has-checked">
                            I have carefully checked!
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sign-in-form" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-weight: 570;">Welcome back!</h4>
                    <button class="sign-form-close close" type="button" data-dismiss="modal" aria-label="Close">
                        <img src="./asset/img/Xclose.png" alt="X">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 sign-form-content">
                        <div class="col-md-12">
                            <label for="inputEmailSignIn" class="form-label sign-form-label">Email or Username</label>
                            <input type="email" class="form-control" id="inputEmailSignIn">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPasswordSignIn" class="form-label sign-form-label">
                                <span class="row d-flex align-items-center">
                                    <span class="col-6">Password</span>
                                    <span class="col-6">
                                        <span class="form-check d-flex justify-content-end mr-3">
                                            <span class="row check-to-show-password d-flex align-items-center">
                                                <label class="form-check-label" for="show-password-in">
                                                    <input class="form-check-input" type="checkbox" id="show-password-in" style="margin-top: -2px">
                                                    Show
                                                </label>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                            <input type="password" class="form-control demo-show-password" id="inputPasswordSignIn" style="background-image: url('./asset/img/hide-password.webp');">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                            <div class="or-container">
                                <div class="line-separator"></div> 
                                <span class="ml-2 mr-2">or</span>
                                <div class="line-separator"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-lg with-google-btn btn-block btn-outline" href=""><img src="./asset/img/gg-logo.png" alt="G" style="width: 7%;"> Sign in with Google</a>
                                </div>
                            </div>
                            <br>
                            <p class="text-inverse text-center" style="font-size: 13px; opacity: 0.8; margin-bottom:0">Don't have an account yet? <a id="switch-to-sign-up" href="" data-toggle="modal" data-target="#sign-up-form">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="sign-up-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: 570;">Hello, create an account!</h4>
                <button class="sign-form-close close" type="button" data-dismiss="modal" aria-label="Close">
                    <img src="./asset/img/Xclose.png" alt="X">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 sign-form-content">
                    <div class="col-md-6">
                        <label for="account-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="account-name">
                    </div>
                    <div class="col-md-6">
                    <label for="account-usrname" class="form-label">Username</label>
                    <input type="text" class="form-control" id="account-usrname">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmailSignUp" class="form-label sign-form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmailSignUp">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPasswordSignUp" class="form-label sign-form-label">
                            Password
                        </label>
                        <input type="password" class="form-control" id="inputPasswordSignUp" style="background-image: url('./asset/img/hide-password.webp');">
                    </div>
                    <div class="col-md-12">
                        <label for="inputConfirmPasswordSignUp" class="form-label sign-form-label">
                            <span class="row d-flex align-items-center">
                                <span class="col-6">Confirm password</span>
                                <span class="col-6">
                                    <span class="form-check d-flex justify-content-end mr-3">
                                        <span class="row check-to-show-password d-flex align-items-center">
                                            <label class="form-check-label" for="show-password-up">
                                                <input class="form-check-input" type="checkbox" id="show-password-up" style="margin-top: -2px">
                                                Show
                                            </label>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </label>
                        <input type="password" class="form-control demo-show-password" id="inputConfirmPasswordSignUp" style="background-image: url('./asset/img/hide-password.webp');">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Create account</button>
                        <div class="or-container">
                            <div class="line-separator"></div> 
                            <span class="ml-2 mr-2">or</span>
                            <div class="line-separator"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-lg with-google-btn btn-block btn-outline" href=""><img src="./asset/img/gg-logo.png" alt="G" style="width: 7%;"> Sign up with Google</a>
                            </div>
                        </div>
                        <br>
                        <p class="text-inverse text-center" style="font-size: 13px; opacity: 0.8; margin-bottom:0">Already have an account? <a id="switch-to-sign-in" href="" data-toggle="modal" data-target="#sign-in-form">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="./asset/js/launchpage.js"></script>