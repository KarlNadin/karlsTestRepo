<!DOCTYPE HTML>
<html>
<head>
<title>Countries</title>
<link href="css/hotel.css" type="text/css" rel="stylesheet">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<header>
</header>

<nav id="menuGrid">
  <p id="heading">Hotel Search</p>
     <div></div>
     <a id="link" href="../assignment1/index.html">Home</a>
     <a id="link" href="design.php">Design</a>
</nav>

<!--<p><a href="index.html">Back to search</a></p>-->
<h1>Your Search Results</h1>

<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u1762398', 'u1762398', '29dec74');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

$searchTerm = $_GET['search'];
//Need to use a LIKE for fuzzy matching (look back to when we looked at SQL)
$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :searchTerm");
$stmt->bindValue(":searchTerm","%{$searchTerm}%");
$stmt->execute();
$countries = $stmt->fetchAll();

$searchTerm = $_GET['search'];
//Need to use a LIKE for fuzzy matching (look back to when we looked at SQL)
$stmt = $conn->prepare("SELECT * FROM destinations WHERE name LIKE :searchTerm");
$stmt->bindValue(":searchTerm","%{$searchTerm}%");
$stmt->execute();
$destinations = $stmt->fetchAll();

$searchTerm = $_GET['search'];
//Need to use a LIKE for fuzzy matching (look back to when we looked at SQL)
$stmt = $conn->prepare("SELECT * FROM hotels WHERE star_rating LIKE :searchTerm");
$stmt->bindValue(":searchTerm","%{$searchTerm}%");
$stmt->execute();
$hotels = $stmt->fetchAll();


  //check to see if there are any results//
  if($countries){
  	foreach ($countries as $country) {
  	    echo "<p>";
        echo "<a href='destinations.php?id={$country["id"]}'>";
	      echo "{$country['name']}";
        echo "</a>";
        echo "</p>";
        echo "<p>Population {$country['population']} Million</p>";
        echo "<img src={$country['image']}>";
        echo "<p>{$country['Description']}</p>";
  	}
  /*}else{
  	echo "<p>No search results</p>";*/
  }

  $conn=NULL;

  //check to see if there are any results//
  if($destinations){
    foreach ($destinations as $destination) {
        echo "<p>";
        echo "<a href='hotels.php?id={$destination["id"]}'>";
        echo "{$destination['name']}";
        echo "</a>";
        echo "</p>";
        echo "<img src={$destination['image']}>";
        echo "<p>{$destination['description']}</p>";
      }
    /*}else{
      echo "<p>No search results</p>";*/
    }

    $conn=NULL;

    //check to see if there are any results//
    if($hotels){
      foreach ($hotels as $hotel) {
          echo "<p>";
          echo "<a href='hotels.php?star_rating={$hotel["star_rating"]}'>";
          echo "{$hotel['name']}";
          echo "</a>";
          echo "</p>";
          /*echo "<p>{$hotel['address']}</p>";
          echo "<p>{$hotel['star_rating']}</p>";
          echo "<img src={$hotel['image']}>";
          echo "<p>{$hotel['description']}</p>";
          echo "</P>";*/
        }
      }else{
        echo "<p>No search results</p>";
      }

    ?>
