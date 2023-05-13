<link rel="stylesheet" href="./asset/css/homepage.css">
<link rel="stylesheet" href="./asset/css/responsive.css">

<div id="page-container">
    <div class="row nopadding">
        <div class="sidepanel">
            <div class="sidepanel__container container">
                <div class="row library px-3 pt-3">
                    <h5 class="library__title">Library</h5>
                    <ul class="library__content">
                        
                    </ul>
                </div>
            </div>
            <div class="sidepanel-toggler">
                <i class="fa fa-chevron-left hide" aria-hidden="true"></i>
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </div>
        </div>
        <div class="nopadding" id="main-content">
            <div class="container">
                <div id="homepage" >
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-9 col-12">
                            <form class="homepage__search-area">
                                <div class="search-area__search-box">
                                    <input class="search-box__input"
                                            name="testkey" 
                                            type="text" 
                                            placeholder=" ">
                                    <label class="search-box__label">Type here</label>
                                </div>
                                <button type="button" onclick="showResult()" class="search-area__search-btn btn btn-primary">Search</button>
                            </form>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="homepage__quiz-create">
                                <button type="button" class="btn quiz-create__btn px-3 py-2">
                                    <i class="fa fa-plus-circle"></i>
                                    New quizz
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="search-result d-flex flex-column justify-content-center align-items-center">
                    </div>

                    <div class="homepage__recommend-area mt-3">
                        <h5 class="recommend-area__title">For you</h5>
                        <div id="homepage__recommend-area__slider" class="carousel slide d-flex" data-ride="carousel">
                            <a class="carousel-control-prev" href="#homepage__recommend-area__slider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            
                            <div class="carousel-inner d-flex suggest-item">
                                <div class="carousel-item rcm-item col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4" style="visibility: hidden">
                                    <div class="zoom d-block rcm-item__card" data-toggle="modal" data-target="#recommend-area__modal">
                                        <img class="rcm-item__card__img" src="asset/img/quiz-package.png" alt="">
                                        <ul class="extra-info d-flex justify-content-between rcm-item__card__list">
                                            <li>h</li>
                                            <li>b</li>
                                        </ul>
                                        <h6 class="rcm-item__card__name">Multiply and Divide exponents review</h6>
                                        <p class="pt-1"></p>
                                    </div>
                                </div>
                            </div>
                    
                            <a class="carousel-control-next" href="#homepage__recommend-area__slider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="homepage__history-area mt-3">
                        <h5 class="history-area__title">Recently opened</h5>
                        <div id="homepage__history-area__slider" class="container pb-0">
                        </div>
                    </div>
                </div>
                <div id="manage" style="display: none">
                    <div class="row">
                    <?php
    $sql = "select * from Quiz where author_id = '".$_SESSION['client_id']."' and active=1";
    $result = $conn->query($sql);
    if ($result->num_rows <= 0) {
?>
        <h3><i>You have not created any quiz</i></h3>
<?php
    }
    else {
        $data_array = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $data_array[] = $data;
        }
        // Reverse the order of the array
        $data_array = array_reverse($data_array);

        foreach ($data_array as $data) {
?>
            <div class="quiz-item col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="zoom d-block quiz-item__card">
                    <img class="quiz-item__card__img" src="asset/img/quiz-package.png" alt="">
                    <h5 class="quiz-item__card__name" style="min-height: 40px"><?php echo $data['title']?></h5>
                    <div class="d-flex pb-2">
                        <a target="_blank" href="?action=rvres&q=<?php echo base64_encode($data['Quiz_id'])?>" type="button" class="btn btn-info update-quiz">Responses</a>
                        <button type="button" onclick="viewdetails('<?php echo $data['Quiz_id'];?>')" class="btn btn-primary update-quiz">Review</button>
                        <button type="button" onclick="deleteQuiz('<?php echo $data['Quiz_id'];?>')" class="btn btn-danger update-quiz">Delete</button>
                    </div>
                    <p class="pt-1"></p>
                </div>
            </div>
<?php
        }
    }
?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="algorithm/timeSince.js"></script>
<script src="asset/js/cookies.js"></script>
<script src="asset/js/homepage.js"></script>
<script src="algorithm/search.js"></script>
<script src="algorithm/recommendation.js"></script>