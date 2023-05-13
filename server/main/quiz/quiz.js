const deleteQuiz = (id, e) => {
    const quizId = id.split('_')[2];
    $.ajax({
        url: 'main/quiz/delete.php',
        type: 'post',
        dataType: 'json',
        data: ({ id, quizId, action: 'delete' }),
        success: (status) => {
            if (status === 201) {
                window.location.reload();
            }
        }
    });
}

const ignoreQuiz = (id, e) => {
    const quizId = id.split('_')[2];
    const element = e.parentElement.parentElement;
    $.ajax({
        url: 'main/quiz/delete.php',
        type: 'post',
        dataType: 'json',
        data: ({ id, quizId, action: 'ignore' }),
        success: (status) => {
            if (status === 201) {
                window.location.reload();
            }
        }
    });
}

const undoAction = (id) => {
    const quizId = id.split('_')[2];
    $.ajax({
        url: 'main/quiz/delete.php',
        type: 'post',
        dataType: 'json',
        data: ({ id, quizId, action: 'undo' }),
        success: (status) => {
            if (status === 201) {
                window.location.reload();
            }
        }
    });
}


var idx = 1

const getData = () => {
    const sort = idx == 1 ? 'asc' : 'desc';
    if (idx == 1)
        document.querySelector('.time').innerHTML = 'Time' + '<i class="fa fa-caret-up"></i>';
    else
        document.querySelector('.time').innerHTML = 'Time' + '<i class="fa fas fa-caret-down"></i>';
    idx = 1 - idx;
    $.ajax({
        url: 'main/quiz/listed.php',
        type: 'GET',
        data: { sort },
        success: function (response) {
            $('#table-body').html(response);
        }
    });
}

getData();

const download = (url) => {
    window.location.href = 'main/quiz/download.php?url=' + url;
}

const filter = () => {
    const sort = idx == 1 ? 'asc' : 'desc';
    const date1 = document.querySelector('input.dateval1').value;
    const date2 = document.querySelector('input.dateval2').value;
    $.ajax({
        url: 'main/quiz/listed.php',
        type: 'POST',
        data: { sort, date1, date2 },
        success: function (response) {
            $('#table-body').html(response);
        }
    });
}