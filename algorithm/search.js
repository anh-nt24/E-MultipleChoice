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
        data: ({key}),
        success: (data) => {
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
                html =  `
                    <div onclick="openQuiz('${data['Quiz_id']}')" class="zoom quiz-found col-12">
                        <div class="quiz-item">
                            <div class="d-flex align-items-center quiz-item__card px-3 py-2"  style="min-height: 70px">
                                <div class="assignment__card__img d-flex justify-content-center align-items-center">
                                    <img src="asset/img/assignment.png" alt="">
                                </div>
                                <div class="ml-3 my-auto w-100">
                                    <h5 style="margin: 0"><b>${data['content']}</b></h5>
                                    <div class="d-flex justify-content-between">
                                        <span style="font-size: 14px">By ${data['author']}</span>
                `;
                if (data['duration']) html += `<span style="font-size: 14px">Duration ${data['duration']}</span>`;
                if (data['dueTo']) html += `<span style="font-size: 14px">Exam date: ${data['examDate']}; Due to: ${data['dueTo']}</span>`;
                else html += `<span style="font-size: 14px">Exam date: ${data['examDate']}</span>`;
                html += `
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="result-option d-flex mt-3">
                        <button onclick="openQuiz('${data['Quiz_id']}')" class="btn btn-primary take-now">Take now</button>
                        <button class="ml-3 btn btn-primary add-to-reminder">Add to reminder</button>
                    </div>
                `;

                document.querySelector('.search-result').innerHTML = html;
            }
        }
    });
}

const openQuiz = (id) => {
    window.location.replace(`App.php?action=quiz&token=${window.btoa(id)}`);
}

