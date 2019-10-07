<!DOCTYPE HTML>
<html lang="en">
<head>
<link href="css/hotel.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Search Results</title>
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

<?php

try{
       $conn = new PDO('mysql:host=localhost;dbname=u1762398', 'u1762398', '29dec74');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}


//select all destinations from the countries table//
$query = "SELECT * FROM countries";
$resultset = $conn->query($query);
$countries = $resultset->fetchAll();

echo "<table>";
echo "<tr><th>id</th><th>name</th><th>population</th><th>image</th><tr>";
foreach($countries as $country)
{
    echo "<tr>";
    echo "<td>{$country['id']}</td>";
    echo "<td>{$country['name']}</td>";
    echo "<td>{$country['population']}</td>";
    echo "<td>{$country['image']}</td>";
    echo "</tr>";
}
echo "</table>";


//select all destinations from the destination table//
$query = "SELECT * FROM destinations";
$resultset = $conn->query($query);
$destinations = $resultset->fetchAll();

echo "<table>";
echo "<tr><th>id</th><th>description</th><th>image</th><th>country_id</th><tr>";
foreach($destinations as $destination)
{
    echo "<tr>";
    echo "<td>{$destination['id']}</td>";
    echo "<td>{$destination['name']}</td>";
    echo "<td>{$destination['image']}</td>";
    echo "<td>{$destination['country_id']}</td>";
    echo "</tr>";
}
echo "</table>";


//select all facilities from the facilities table//
$query = "SELECT * FROM facilities";
$resultset = $conn->query($query);
$facilities = $resultset->fetchAll();

echo "<table>";
echo "<tr><th>id</th><th>name</th><th>description</th><tr>";
foreach($facilities as $facility)
{
    echo "<tr>";
    echo "<td>{$facility['id']}</td>";
    echo "<td>{$facility['name']}</td>";
    echo "<td>{$facility['description']}</td>";
    echo "</tr>";
}
echo "</table>";


//select all hotels from the hotels table//
$query = "SELECT * FROM hotels";
$resultset = $conn->query($query);
$hotels = $resultset->fetchAll();

echo "<table>";
echo "<tr><th>id</th><th>name</th><th>address</th><th>star_rating</th><th>image</th><th>destination_id</th><th>country_id</th><tr>";
foreach($hotels as $hotel)
{
    echo "<tr>";
    echo "<td>{$hotel['id']}</td>";
    echo "<td>{$hotel['name']}</td>";
    echo "<td>{$hotel['address']}</td>";
    echo "<td>{$hotel['star_rating']}</td>";
    echo "<td>{$hotel['image']}</td>";
    echo "<td>{$hotel['destination_id']}</td>";
    echo "<td>{$hotel['country_id']}</td>";
    echo "</tr>";
}
echo "</table>";


//select all hotel_id's AND facility_id's from the hotel_facility table//
$query = "SELECT * FROM hotel_facility";
$resultset = $conn->query($query);
$hotel_facility = $resultset->fetchAll();

echo "<table>";
echo "<tr><th>hotel_id</th><th>facility_id</th><tr>";
foreach($hotel_facility as $hotel_facility)
{
    echo "<tr>";
    echo "<td>{$hotel_facility['hotel_id']}</td>";
    echo "<td>{$hotel_facility['facility_id']}</td>";
    echo "</tr>";
}
echo "</table>";

$conn=NULL;
?>

  <img src="../assignment1/images/classDiagram.jpg" alt="Class Diagram" class="center">

  <img src="../assignment1/images/physicalDataModel.jpg" alt="Physical Data Model" class="center">

</body>
</html>
