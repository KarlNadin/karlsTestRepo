<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIEM | Pie Chart</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <link rel="stylesheet" href="siem1.css" />
  </head>
  <body>
    <header>
      <div id="menuGrid">
        <div id="heading">

<h1>Pie Chart</h1>
</div>
    <nav>
     <a id="link" href="index.php">Home</a>
     <a id="link" href="table.php">Table</a>
     <a id="link" href="results.php">Results<a/>
     <a id="link1" href="piechart.php">Pie Chart</a>
    </nav>
  </div>
  </header>
<br />

<form action="piechart.php" method="post">

<label for="column to process">Column to process:</label>
<input type="number" id="column to process" name="column to process">
</form>

<br />
<div>
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

          //3. Graphing
        	//Note: I followed to tutorial here to get this working: https://groups.google.com/forum/#!topic/google-visualization-api/nx7mHzCXZaw
        	//The key thing to remember is that a PHP array needs reformating before converting to a JSON object for Google Charts/
        	//More specifically, it needs information such as the data types and headers. See here for more information: https://blog.programster.org/php-converting-data-for-google-charts

          $newdata = array();
        	$numOfRows = 0;
          $columnToProcess = 22;


        	foreach ($data as $dataRow)
            {
        			$newData[$numOfRows] = $dataRow[$columnToProcess];
        			$numOfRows++;
            }

        	$uniqueArray = array_count_values($newData);
        //	print_r($uniqueArray);
        	//sort the array into decending order. I.e., most frequent at the top
        	arsort($uniqueArray);

$dataTable = array(
  'cols' => array(
       array('type' => 'string', 'label' => 'item'),
       array('type' => 'number', 'label' => 'frequency')
  )
);

//print_r($uniqueArray);
//	echo"<br>";

//reset the iterator - IMPORTANT
reset($uniqueArray);
while($element = current($uniqueArray)) {
  //echo key($uniqueArray)."\n";
  //echo  $element."\n";
  $dataTable['rows'][] = array(
      'c' => array (
        array('v' =>  key($uniqueArray) ),
        array('v' =>  $element)
       )
  );
  //$row++;
  next($uniqueArray);
}
        	//print_r($dataTable);
        	//echo"<br>";

        	//encode the PHP array to a JSON object, which is required for the Google Chart
        	$json = json_encode($dataTable);

        	//note that the $json object is used in the below Google Javascript (line 146)

        	//echo $json;

        ?>


        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
        //$json = json_encode($dataTable);

        // Load the Visualization API and the piechart package.
        google.load("visualization", "1", {packages: ["corechart", 'table']});


        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.

        function drawChart() {
            // Create the data table.
           // var data = new google.visualization.DataTable(<?php echo $json; ?>);
                var data = new google.visualization.DataTable(<?php echo $json; ?>);


            // Set chart options
            var options = {
                'title': 'Frequencies',
                'width': 600,
                'height': 600
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            function selectHandler() {
                var selectedItem = chart.getSelection()[0];
                var selectedItem2 = chart.getSelection()[1];
                if (selectedItem) {
                    var topping = data.getValue(selectedItem.row, 0);
                    var amount = data.getValue(selectedItem.row, 1);
                }
            }

            google.visualization.events.addListener(chart, 'select', selectHandler);
            chart.draw(data, options);
        	}

            </script>
          </head>
          <body>
            <div id="chart_div" style="width: 900px; height: 600px"></div>
          </div>
  </body>
  </html>
