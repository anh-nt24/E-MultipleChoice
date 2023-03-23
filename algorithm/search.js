const showResult = () => {
    const key = document.querySelector('.search-box__input').value;
    if (key.length == 0) {
        document.querySelector('.search-result').innerHTML = "";
        return ;
    }
    $.ajax({
        url: 'model/SearchModel.php',
        type: 'post',
        dataType: 'json',
        data: ({key: key}),
        success: (data) => {
            console.log(data[0]);
            if (data == 1) {
                document.querySelector('.search-result').innerHTML = `
                    <span class="col-12 res-not-found">
                        The <b>quiz ID</b> you are trying to search does not exist or is expired. Please try again!
                    </span>
                `;
            }
            else if (data == 0) {
                document.querySelector('.search-result').innerHTML = `
                    <span class="col-12 res-not-found">
                        Something went wrong. Sorry for this convenience :<
                    </span>
                `;
            }
            else {
                document.querySelector('.search-result').innerHTML = `
                    <div class="quiz-found col-12">
                        <div class="quiz-item">
                            <div class="d-flex align-items-center quiz-item__card px-3 py-2"  style="min-height: 70px">
                                <div class="assignment__card__img d-flex justify-content-center align-items-center">
                                    <img src="asset/img/assignment.png" alt="">
                                </div>
                                <div class="ml-3 my-auto w-100">
                                    <h5 style="margin: 0"><b>${data[1]}</b></h5>
                                    <div class="d-flex justify-content-between">
                                        <span style="font-size: 14px">By author</span>
                                        <span style="font-size: 14px">Date: ${data[2]}; Due to: ${data[3]}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="result-option d-flex mt-3">
                        <button class="btn btn-primary take-now">Take now</button>
                        <button class="ml-3 btn btn-primary add-to-reminder">Add to reminder</button>
                    </div>
                `;
            }
        }
    });
}