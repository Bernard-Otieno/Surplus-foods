<?php
include'DBconnector.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TEST</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Organisation','Quantity'],
          <?php 
          $query = "SELECT * FROM tbl_foodlistings";
		  $result = mysqli_query($conn, $query);

          	while ($data = mysqli_fetch_assoc($result)) {

          		echo"['".$data['Organisation']."',".$data['Quantity']."],";
          	}
   		   ?>
        ]);
       

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
	<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</body>
</html>