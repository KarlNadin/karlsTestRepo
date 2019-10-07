


<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIEM | Results</title>
  <link rel="stylesheet" href="siem1.css" />
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />

  </head>

    <header>
      <div id="menuGrid">
        <div id="heading">
    <h1>Results</h1>
  </div>
    <nav>
     <a id="link" href="index.php">Home</a>
     <a id="link" href="table.php">Table</a>
     <a id="link" href="results.php">Results<a/>
     <a id="link1" href="piechart.php">Pie Chart</a>
    </nav>
    </header>
  </div>
    <body>
    <br />

    <form action="results.php" method="POST">
    <label for="column to process">Column to process:</label>
    <input type="number" id="column to process" name="column to process">
    <!--<select id="cmbMake" name="Make">
    <option value="0">1</option>
    <option value="1">2</option>
    <option value="2">3</option>
    <option value="3">4</option>
    <option value="4">5</option>
    <option value="5">6</option>
  </select>-->
</form>

<br />

  <!--  -2. Analysing a column
  	//take a column and identify and count the unique elements. In this example I use column '1' where the 'tcp', 'udp' etc.
  	//values are first they need to be copied to a single array as the array_unique() does not suppose 2 dimensional arrays
  	//NOTE: changing the vlue of $columnToProcess will change which column is processed-->
<br />



<?php
//$numofRows= $_POST['numberofRows'];
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






  	$newdata = array();
  	$numOfRows = 0;
    $columnToProcess = 4;

  	foreach ($data as $dataRow)
      {
  			$newData[$numOfRows] = $dataRow[$columnToProcess];
  			$numOfRows++;
      }

  	$uniqueArray = array_count_values($newData);
  //	print_r($uniqueArray);
  	//sort the array into decending order. I.e., most frequent at the top
  	arsort($uniqueArray);





  	//print the frequency of each unique item in a table
  	$row = 0;
  	echo"<table style=width:100%>";
  		echo"<tr>";
  			echo "<th>"; echo "Value"; echo "</th>";
  			echo "<th>"; echo "Frequency" ; echo "</th>";
  		echo "</tr>";
  	while($element = current($uniqueArray)) {
  		echo"<tr>";
  			echo "<th>"; echo key($uniqueArray) ; echo "</th>";
  			echo "<th>"; echo $element ; echo "</th>";

  		$row++;
  		echo "</tr>";
  		next($uniqueArray);
  	}
  	echo"</table>";
//<?php echo $newData[$numOfRows];?>
