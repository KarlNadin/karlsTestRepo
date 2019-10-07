<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u1762398', 'u1762398', '29dec74');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

$searchTerm=$_GET['search'];
//Need to use a LIKE for fuzzy matching (look back to when we looked at SQL)
$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :searchTerm");
$stmt->bindValue(":searchTerm","%{$searchTerm}%");
$stmt->execute();
$countries = $stmt->fetchAll();

/*$stmt = $conn->prepare("SELECT * FROM destinations WHERE name LIKE :searchTerm");
$stmt->bindValue(":searchTerm","%{$searchTerm}%");
$stmt->execute();
$destinations = $stmt->fetchAll();*/


?>



<!DOCTYPE HTML>
<html>
<head>
<title>Search results</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>


  <p><a href="search.php"><<< Back to search again</a></p>
  	<h1>Search Results</h1>
  <?php
  //check to see if there are any results//
  if($countries){
  	foreach ($countries as $country) {
  	    echo "<p>";
        echo "<a href='details.php?id={$country["id"]}'>";
	      echo "{$country['name']}";
        echo "</a>";

  	    echo "</p>";
        // echo "{$country['image']}";
  	}
  }else{
  	echo "<p>No search results</p>";
  }

  /*if($destinations){
  	foreach ($destinations as $destination) {
  	    echo "<p>";
        echo "<a href='details.php?id={$destination["id"]}'>";
	      echo "{$destination['name']}";
  	    echo "</p>";
  	}
  }else{
  	echo "<p>No search results</p>";
  }*/
