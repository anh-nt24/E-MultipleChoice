const toObejct = (d1, d2, d3, d4) => {
    const result = [];
    for (let i = 0; i < d1.length; i++) {
        const id = d1[i];
        const name = d2[i];
        const diff = d3[i];
        const category = d4[i];
        let isExists = false;

        for (let j = 0; j < result.length; j++) {
            if (id === result[j].id) {
                isExists = true;
                result[j].frequency++;
                break;
            }
        }
        if (!isExists) {
            result.push({
                id: id,
                name: name,
                diff: diff,
                frequency: 1,
                category: +category
            });
        }
    }
    return result;
}

const getWeightedVector = ({name, diff, frequency, category}) => {
    const factor = 100;

    let sum = 0;
    for (let i = 0; i < name.length; i++) {
        sum += name.toLowerCase().charCodeAt(i);
    }

    const vector = [
        category*10,
        frequency/factor,
        diff/factor,
        sum / factor,
    ];

    return vector;
};


const recommend = async () => {
    if (getCookie('history').length == 0) {
        var data = await $.ajax({
            url: 'client/model/GetQuizzes.php',
            type: 'get'
        });

        var id = JSON.parse(data)[0];
        id.sort(() => Math.random() - 0.5);

        id.slice(Math.min(20, id.length));

        var data = await $.ajax({
            url: 'client/model/GetQuizById.php',
            type: 'post',
            dataType: 'json',
            data: ({id})
        });

    }
    else {
        var responseId = getCookie('history').map(e => e[0]);
    
        var data = await $.ajax({
            url: 'client/model/HistoryModel.php',
            type: 'post',
            dataType: 'json',
            data: ({responseId})
        });
        const history = toObejct(data[0], data[1], data[2], data[3]);
    
        var data = await $.ajax({
            url: 'client/model/GetQuizzes.php',
            type: 'get'
        });
        data = JSON.parse(data);
        const quizzes = toObejct(data[0], data[1], data[2], data[3]);
        const vectors = quizzes.map(item => {
            return getWeightedVector(item);
        });
        const n = 4; 
        const historyVector = Array(n).fill(0); 
    
        history.forEach((item) => {
            const vector = getWeightedVector(item);
            for (let i = 0; i < n; i++) {
                historyVector[i] += vector[i];
            }
        });

        // calculate norm for normalizing vectors in the same level
        let sum = 0;
        for (let i = 0; i < historyVector.length; i++) {
            sum += Math.pow(historyVector[i], 2);
        }
        const norm = Math.sqrt(sum);
        if (norm !== 0) {
            for (let i = 0; i < n; i++) {
                historyVector[i] /= norm;
            }
        }
    
        const similarities = quizzes.map((item, index) => {
            let scalarProduct = 0;
            let vectorA = 0;
            let vectorB = 0;
            for (let i = 0; i < vectors[index].length; i++) {
                scalarProduct += vectors[index][i] * historyVector[i];
                vectorA += Math.pow(vectors[index][i], 2);
                vectorB += Math.pow(historyVector[i], 2);
            }
            // formula: A.B / |A|.|B|
            const cosineSimilarity = scalarProduct / (Math.sqrt(vectorA) * Math.sqrt(vectorB));
            return {
                id: item.id,
                name: item.name,
                category: item.category,
                cosineSimilarity
            };
        });
        const sortedSimilarities = similarities;
        sortedSimilarities.sort((a, b) => b.cosineSimilarity - a.cosineSimilarity);
        sortedSimilarities.sort((a, b) => {
              // get the indexes of the first occurrence of each category
              const indexA = sortedSimilarities.findIndex((item) => item.category === a.category);
              const indexB = sortedSimilarities.findIndex((item) => item.category === b.category);
              return indexA - indexB; // sort by the first occurrence of each category
          });
        
        // sortedSimilarities.sort((a, b) => b.category - a.category);
        sortedSimilarities.slice(Math.min(20, sortedSimilarities.length));
        const similarityId = sortedSimilarities.map(e => e.id);

        var data = await $.ajax({
            url: 'client/model/GetQuizById.php',
            type: 'post',
            dataType: 'json',
            data: ({id: similarityId})
        });
    }

    const element = document.querySelector('.suggest-item');
    let html = '';
    for(let i=0;i<data[0].length; ++i) {
        html += `
            <div onclick="openQuiz('${data[3][i]}')" style="cursor: pointer" class="no-link carousel-item rcm-item col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="zoom d-block rcm-item__card" style="min-height:150px">
                    <img class="rcm-item__card__img" src="asset/img/quiz-package.png" alt="">
                    <ul class="extra-info d-flex justify-content-between rcm-item__card__list">
                        <li>Difficulty: ${data[1][i]}%</li>
                        <li>${data[2][i]} Qs</li>
                    </ul>
                    <h6 class="rcm-item__card__name" style="height: 40px">${data[0][i]}</h6>
                    <p class="pt-1 pb-2">
                        <button onclick="saveQuiz('${data[3][i]}'); event.stopPropagation();" class="btn btn-info d-flex justify-content-center m-auto" style="font-size: 12px;padding: 1.5px 10px;border-radius: 15px;">Save</button>
                    </p>
                </div>
            </div>
        `;
    }

    element.innerHTML = html;
    var carouselWidth = $('.carousel-inner')[0].scrollWidth;
    var cardWidth = $('.carousel-item').width();
    var scrollPos = 0;

    function slideNext(id) {
        scrollPos = (scrollPos < carouselWidth-cardWidth*4 - 70) ? scrollPos + cardWidth + 15: 0;
        $(`#${id} .carousel-inner`).animate({scrollLeft: scrollPos}, 600);
    };

    function slidePrev(id) {
        scrollPos = (scrollPos > 0 ) ? scrollPos - cardWidth - 15 : carouselWidth-cardWidth*4-70;
        $(`#${id} .carousel-inner`).animate({scrollLeft: scrollPos}, 600);
    }

    // $('#homepage__history-area__slider .carousel-control-next').on('click', () => {
    //     slideNext('homepage__history-area__slider');
    // });

    // $('#homepage__history-area__slider .carousel-control-prev').on('click', () => {
    //     slidePrev('homepage__history-area__slider');
    // });

    $('#homepage__recommend-area__slider .carousel-control-next').on('click', () => {
        slideNext('homepage__recommend-area__slider');
    });

    $('#homepage__recommend-area__slider .carousel-control-prev').on('click', () => {
    slidePrev('homepage__recommend-area__slider');
})

}

recommend();
