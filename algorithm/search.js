// import Cookies from 'js-cookie';

const showResult = () => {
    const key = document.querySelector('.search-box__input').value;
    if (key.length == 0) {
        document.querySelector('.search-result').innerHTML = "";
        return ;
    }
    $.ajax({
        url: 'client/model/SearchModel.php',
        type: 'post',
        dataType: 'json',
        data: ({key}),
        success: (data) => {
            if (data == 1) {
                document.querySelector('.search-result').innerHTML = `
                    <span class="col-12 res-not-found">
                        The quiz you are trying to search is not available. Please try again!
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
                html = '';
                data.forEach(dt => {
                    html +=  `
                        <div onclick="openQuiz('${dt['Quiz_id']}')" class="zoom quiz-found col-12">
                            <div class="quiz-item">
                                <div class="d-flex align-items-center quiz-item__card px-3 py-2"  style="min-height: 70px">
                                    <div class="assignment__card__img d-flex justify-content-center align-items-center">
                                        <img src="asset/img/assignment.png" alt="">
                                    </div>
                                    <div class="ml-3 my-auto w-100">
                                        <h5 style="margin: 0"><b>${dt['title']}</b></h5>
                                        <div class="d-flex justify-content-between">
                                            <span style="font-size: 14px">By ${dt['author']}</span>
                    `;
                    if (dt['duration']) html += `<span style="font-size: 14px">Duration: ${dt['duration']} mins</span>`;
                    if (dt['dueTo']) html += `<span style="font-size: 14px">Exam date: ${dt['examDate']}; Due to: ${dt['dueTo']}</span>`;
                    else html += `<span style="font-size: 14px">Exam date: ${dt['examDate']}</span>`;
                    html += `
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="result-option d-flex mt-3">
                            <button onclick="openQuiz('${dt['Quiz_id']}')" class="btn btn-primary take-now">Take now</button>
                            <button onclick="saveQuiz('${dt['Quiz_id']}')" class="ml-3 btn btn-primary add-to-reminder">Save</button>
                        </div>
                    `;
                });

                document.querySelector('.search-result').innerHTML = html;
            }
        }
    });
}

const openQuiz = (id, element) => {
    if (element) {
        element.parentElement.style.display = 'none';
        deleteCookie('library', id);
    }
    window.location.href = `?action=quiz&token=${window.btoa(id)}`;
}

const saveQuiz = (id) => {
    addToCookies('library', id);

    $.ajax({
        url: 'client/model/LibraryModel.php',
        type: 'post',
        dataType: 'json',
        data: ({id}),
        success: (data) => {
            const name = data[0];
            const duration = data[1];
            const level = data[2];
            const element = document.querySelector('ul.library__content');
            var html = element.innerHTML;
            var newhtml = ''
            newhtml += ` 
                <li>
                    <a onclick="openQuiz('${id}', this)">
                        <img src="asset/img/lib.png" alt="">
                        <div class="library__content__info">
                            <span class="quiz-name">${name}</span>
                            <br>
                            <ul class="d-flex justify-content-between nopadding extra-info">
                                <li>
                                    <span class="quiz-time">Duration: ${duration}</span>
                                </li>
                                <li>
                                    <span class="quiz-level">Difficulty: ${level}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="show-delete-p" style="display: none">
                            <button onclick="deleteLib('${id}', this); event.stopPropagation();" class='show-delete btn m-auto d-flex align-items-center justify-content-center shadow-none'>
                                <i class="fa fa-close"></i>
                            </button>
                        <div>
                    </a>
                </li>
            `;
            element.innerHTML = newhtml + html;
        }
    })
}



