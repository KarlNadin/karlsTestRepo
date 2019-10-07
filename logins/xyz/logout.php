<?php
session_start();
$_SESSION = array();
session_destroy();
//Check to see if the session has been set
if(isset($_SESSION["username"]))
echo "Log out <a href='login.php'>logout</a>";
die();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page 1</title>
</head>

<body>
<h1>logout</h1>
