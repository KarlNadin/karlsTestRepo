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

?>