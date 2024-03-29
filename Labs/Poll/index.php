<!DOCTYPE html>
<html>

<head>
    <title> CSUMB Poll </title>
    <meta charset="utf-8" />
</head>

<body>

    <h1> Is CSUMB the best campus in California? </h1>
    <input type="radio" name="q1" value="option1">Strongly Disagree</input>
    <input type="radio" name="q1" value="option2">Disagree</input>
    <input type="radio" name="q1" value="option3">Neutral</input>
    <input type="radio" name="q1" value="option4">Agree</input>
    <input type="radio" name="q1" value="option5">Strongly Agree</input>
    <button id="q1">Submit</button>

    <!--placeholder to display here chart-->
    <div id="container"></div>

    <!-- scripts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

    <script>

        //Here is an example call to display the chart
        //You may need to parse to int if using strings
        displayPollChart(parseInt("10"),20,30,40,50);

        //******
        // Displays poll chart. For more info about charts visit https://www.highcharts.com/demo
        // Parameters:
        // option1 to option5 must be integers, represent the total users who selected each option
        //*******
        function displayPollChart(option1, option2, option3, option4, option5) {
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'q1s',
                    colorByPoint: true,
                    data: [{
                        name: 'Strongly Disagree',
                        y: option1,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Disagree',
                        y: option2,
                    }, {
                        name: 'Neutral',
                        y: option3
                    }, {
                        name: 'Agree',
                        y: option4
                    }, {
                        name: 'Strongly Agree',
                        y: option5
                    }, ]
                }]
            });
        } //endFunction</script>
</body>

</html>
