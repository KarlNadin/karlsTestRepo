<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIEM | Table</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <link rel="stylesheet" href="siem1.css" />
  </head>
  <body>
    <header>
      <div id="menuGrid">
        <div id="heading">
    <h1>Table</h1>
  </div>
    <nav>
     <a id="link" href="index.php">Home</a>
     <a id="link" href="table.php">Table</a>
     <a id="link" href="results.php">Results<a/>
     <a id="link1" href="piechart.php">Pie Chart</a>
    </nav>
  </div>
</header>


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


    	//1. Table view of the entire dataset
    	echo"<table style=width:100%>";

    	for ($row = 0; $row < count($data); $row++) {
    	echo"<tr>";
    		for ($col = 0; $col < count($data[$row]); $col++) {

    			echo "<th>"; echo $data[$row][$col] ; echo "</th>";
    		}
    	echo "</tr>";
    	}
    	echo"</table>";

      ?>
  </body>
  </html>
