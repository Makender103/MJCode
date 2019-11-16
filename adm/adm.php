<?php
include 'adm-head.php';
?>

<div class="container">
    <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3 class="panel-title">Visitas por dia
    </h3>
    </div>
    <div class="panel-body">
        <h2>128-310</h2>
    </div>
    </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 text-center">
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3 class="panel-title">Visitas por mes
    </h3>
    </div>
    <div class="panel-body">
        <h2>128-310</h2>
    </div>
    </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 text-center">
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3 class="panel-title">Visitas por ano
    </h3>
    </div>
    <div class="panel-body">
        <h2>128-310</h2>
    </div>
    </div>
</div>


    <div class=" col-xs-12 col-sm-8 col-md-18">
        <div id="piechart"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 8],
        ['Eat', 2],
        ['TV', 4],
        ['Gym', 2],
        ['Sleep', 8]
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'My Average Day', 'width':1150, 'height':400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
        </script>
            </div>
    </div>
        </div>

</div>



<?php
	include_once 'footer.php';
?>