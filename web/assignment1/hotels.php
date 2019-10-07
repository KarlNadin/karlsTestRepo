<!DOCTYPE HTML>
<html>
<head>
<title>Hotels</title>
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

<!--<p><a href="destinations.php">Back to Your Destinations</a></p>-->
<h1>Your Hotels</h1>
<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u1762398', 'u1762398', '29dec74');
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//the id from the query string e.g. hotels.php?id=4
$destinationid = $_GET['id'];
$stmt = $conn->prepare("SELECT * from hotels
INNER JOIN destinations
ON hotels.id=destinations.hotel_id
/*INNER JOIN facilities
ON hotel_facility.facility_id=facilities.id
INNER JOIN countries
ON hotels.country_id=countries.id*/
WHERE destinations.id = :id
");
$stmt->bindValue(':id',$destinationid);
$stmt->execute();
$country=$stmt->fetch();

$destinationid=$_GET['id'];
//prepared statement uses the id to select a single hotel
$stmt = $conn->prepare("SELECT hotels.id, hotels.name AS Hotel, hotels.address, hotels.star_rating, hotels.image AS Picture, hotels.description from hotels
INNER JOIN destinations
ON hotels.destination_id=destinations.id
WHERE destinations.id = :id");

$stmt->bindValue(':id',$destinationid);
$stmt->execute();
$hotels=$stmt->fetchALL();

$conn=NULL;

?>

<?php
//simple validation to see if we found a student
/*if($country){
	echo "<h1>{$country['name']}</h1>";
  echo "<h2>Population = {$country['population']} Million</h2>";
  echo "<img src={$country['image']}>";
  echo "<p>{$country['Description']}</p>";
}*/

/*if($destination){
	echo "<h1>{$destination['name']}</h1>";
  echo "<h2>Population = {$country['population']} Million</h2>";
  echo "<img src={$country['image']}>";
  echo "<p>{$country['Description']}</p>";
}
else
{
	echo "<p>Can't find any country records.</p>";
}*/

if($hotels){
  foreach ($hotels as $hotel) {
	echo "<h2>{$hotel['Hotel']}</h2>";
  echo "<h3>{$hotel['address']}</h3>";
  echo "<p>Star Rating {$hotel['star_rating']}</p>";
  echo "<img src={$hotel['Picture']}>";
  echo "<p>{$hotel['description']}</p>";
  }
}
else
{
	echo "<p>Can't find any hotel records.</p>";
}


?>
</body>
</html>
