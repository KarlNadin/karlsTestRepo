<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u1762398', 'u1762398', '29dec74');
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//the id from the query string e.g. details.php?id=4
$countryid=$_GET['id'];
//prepared statement uses the id to select a single student
$stmt = $conn->prepare("SELECT * FROM countries WHERE countries.id = :id");
$stmt->bindValue(':id',$countryid);
$stmt->execute();
$country=$stmt->fetch();
$conn=NULL;

/*$destinationid=$_GET['id'];
//prepared statement uses the id to select a single student
$stmt = $conn->prepare("SELECT * FROM destinations WHERE desinations.id = :id");
$stmt->bindValue(':id',$destinationid);
$stmt->execute();
$destination=$stmt->fetch();
$conn=NULL;*/

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Information</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<p><a href="results.php"><<< Back to list</a></p>
<h1>Search Results</h1>
<?php
//simple validation to see if we found a student
if($country){
  foreach($country as $countries) {
	echo "<h1>{$countries['name']}</h1>";
  echo "<h2>Population = {$countries['population']} Million</h2>";
  echo "<img src={$countries['image']}>";}
}
else
{
	echo "<p>Can't find any country records.</p>";
}

/*if($destination){
	echo "<h1>{$destination['name']}</h1>";
}
else
{
	echo "<p>Can't find any destination records.</p>";
}*/



?>
</body>
</html>
