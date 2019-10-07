<?php

	$filename = "kddcup.testdata.csv";	//input file
	$delimeter = ",";	//split string using 'comma'

	//if file exists and can be read
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

	//array to hold CSV file
    $data = array();

	$numOfRows = 0;
	if (($handle = fopen($filename, 'r')) !== FALSE) //open file
    {
		//read 1024 chunk of file at once and split the string using delimeter
        while (($row = fgetcsv($handle, 1024, $delimeter)) !== FALSE)
        {
			//index of $data hold whole array
			$data[$numOfRows] = $row;
			$numOfRows++;
        }
        fclose($handle);
    }

	//parse through 2-dimensional data array and output an HTML table
	echo"<table style=width:100%>";

	for ($row = 0; $row < count($data); $row++) {
	echo"<tr>";
		for ($col = 0; $col < count($data[$row]); $col++) {

			echo "<th>"; echo $data[$row][$col] ; echo "</th>";
		}
	echo "</tr>";
	}
	echo"</table>";
$chartDataInJson = json_encode($data);
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $chartDataInJson; ?>);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>
