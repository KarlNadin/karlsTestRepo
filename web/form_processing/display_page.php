<?php
$bg_colour = $_POST['bg_colour'];
$txt_colour = $_POST['txt_colour'];
$font = $_POST['font'];
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>This is your page</title>
</head>
<body>

<style>
	body{
    background-color:<?php echo $_POST ["bg_colour"];?>;
    color:<?php echo $_POST ["txt_colour"];?>;
	font-family:<?php echo $_POST ["font"];?>;
}</style>

<h2>This is a simple PHP page</h2>
<p>This is a paragraph</p>

<?php
echo "<h1>Welcome to PHP</h1>";

$heading_txt = $_POST['heading_txt'];
echo "<h1>The heading of your page is {$heading_txt}</h1>";

$main_txt = $_POST['main_txt'];
echo "<h2>Your main txt is {$main_txt}</h2>";

$bg_colour = $_POST['bg_colour'];
echo "<p>Your background colour is {$bg_colour}</p>";

$txt_colour = $_POST['txt_colour'];
echo "<p>Your text colour is {$txt_colour}</p>";





?>
</body>
</html>
