<!DOCTYPE HTML>
<html>
<head>
<title>Destinations</title>
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

<!--<p><a href="countries.php">Back to Your Countries</a></p>-->
<h1>Your Destinations</h1>
<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u1762398', 'u1762398', '29dec74');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

$destinationid = $_GET['id'];
$stmt = $conn->prepare("SELECT destinations.id, destinations.name, destinations.description, destinations.image AS Picture from destinations
INNER JOIN countries
ON destinations.country_id=countries.id
WHERE countries.id = :id");

$stmt->bindValue(':id',$destinationid);
$stmt->execute();
$destinations = $stmt->fetchALL();

//check to see if there are any results//
if($destinations){
  foreach ($destinations as $destination) {
        echo "<p>";
        echo "<a href='hotels.php?id={$destination["id"]}'>";
        echo "{$destination['name']}";
        echo "</a>";
        echo "</p>";
	      /*echo "<h2>{$destination['name']}</h2>";*/
        echo "<img src={$destination['Picture']}>";
        echo "<p>{$destination['description']}</p>";
  }
}
else
{
	echo "<p>Can't find any destination records.</p>";
}
?>
