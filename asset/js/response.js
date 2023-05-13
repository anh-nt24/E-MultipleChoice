const getData = async (id) => {
    var data = await $.ajax({
        url: 'client/model/GetResult.php',
        type: 'post',
        dataType: 'json',
        data: ({id, idx: 1})
    });
    data = data.map(item => ({
        y: parseInt(item[0])
    }));
    // console.log(data);
    const scores = data.map(e => e.y);
    const mean = jStat.mean(scores);
    const std= jStat.stdev(scores);
    let CI = 0;
    if (scores.length >=30) {
        CI = jStat.normalci(mean, 0.05, std, scores.length);
    }
    else {
        CI = jStat.tci(mean, 0.05, std, scores.length);
    }
    document.getElementById("ci").innerHTML = `(${CI[0].toFixed(2)}, ${CI[1].toFixed(2)})`;

    let histogram = new ej.charts.Chart({
        primaryXAxis: {
            majorGridLines: { width: 0 },
            title: 'Score Range',
            minimum: 0, maximum: 10
        },
        chartArea: {
            border: { width: 0 }
        },
        legendSettings: { visible: true },
        primaryYAxis: {
            title: 'Number of Responses',
            minimum: 0,
            majorTickLines: { width: 0 },
            lineStyle: { width: 0 }
        },
        series: [
            {
                type: 'Histogram',
                width: 2,
                yName: 'y',
                name: 'Score',
                fill: 'rgba(20, 75, 170)',
                dataSource: data,
                binInterval: 1,
                marker: {
                    dataLabel: {
                        visible: true,
                        position: 'Top',
                        font: {
                            fontWeight: '600',
                            color: '#ffffff'
                        }
                    }
                },
                showNormalDistribution: true,
                legendSettings: { visible: true },
                columnWidth: 0.99
            },

        ],
        // Set the chart title and tooltip
        title: 'Histogram of the scores of this quiz', tooltip: { enable: true },
        height: '350'
    });
    // Render the chart
    histogram.appendTo('#histogram');

    var data = await $.ajax({
        url: 'client/model/GetResult.php',
        type: 'post',
        dataType: 'json',
        data: ({id, idx: 2})
    });
    var correct =  data[0].map((item, idx) => ({
        x: idx+1,
        y: parseInt(item[1])
    }));
    var incorrect =  data[1].map((item, idx) => ({
        x: idx+1,
        y: parseInt(item[1])
    }));
    const maxy = [correct.map(e => e.y), incorrect.map(e => e.y)].flat();
    // console.log(Math.max(...maxy));

    let scatter = new ej.charts.Chart({
        title: 'Correlation of answers among questions',
        primaryXAxis: {
            majorGridLines: { width: 0 },
            minimum: 0,
            maximum: data[0].length + 1,
            edgeLabelPlacement: 'Shift',
            title: 'Questions'
        },
        chartArea: {
            border: {  width: 0 }
        },
        primaryYAxis: {
            majorTickLines: { width: 0 },
            minimum: 0,
            maximum: Math.max(...maxy) + 1,
            lineStyle: { width: 0 },
            title: 'Number of Responses',
            rangePadding: 'None'
        },
        series: [
            {
                type: 'Scatter',
                dataSource: correct,
                xName: 'x', 
                width: 2, 
                marker: {
                    visible: false,
                    width: 12,
                    height: 12,
                    shape: 'Circle'
                },
                fill: '#0450C2',
                opacity: 0.7,
                yName: 'y', 
                name: 'Correct',
            },
            {
                type: 'Scatter',
                dataSource: incorrect,
                xName: 'x', 
                width: 2, 
                marker: {
                    visible: false,
                    width: 12,
                    height: 12,
                    shape: 'Circle'
                },
                fill: '#ef553b',
                opacity: 0.7,
                yName: 'y', 
                name: 'Incorrect',
            }
        ],
        tooltip: {
            enable: true,
            format: 'Weight: <b>${point.x} lbs</b> <br/> Height: <b>${point.y}"</b>'
        },
        legendSettings: { visible: true },
        loaded: (args) => {
            args.chart.theme = 'Bootstrap';
        }
    });
    scatter.appendTo('#scatter');
}


document.title = "MultiA - Responses Management"
let sortOrder = 'desc'; // initialize to descending order

function sortByHighestGrade(id) {
    let tableBody = document.querySelector('#table-body');
    sortOrder = sortOrder == 'asc' ? 'desc' : 'asc';
    if (sortOrder == 'asc')
        document.querySelector('.btn.time').innerHTML = 'Highest grade <i class="fa fa-caret-up"></i>';
    else
        document.querySelector('.btn.time').innerHTML = 'Highest grade <i class="fa fas fa-caret-down"></i>';

    $.ajax({
        url: 'client/model/Sort.php',
        type: 'POST',
        data: {
            sort: sortOrder,
            id
        },
        success: function(response) {
            $('#table-body').html(response);
        }
    });
}
