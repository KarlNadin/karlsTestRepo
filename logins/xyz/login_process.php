<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
    <title>Login Process</title>
</head>

<body>
<?php

$_username=$_POST['username'];
$_password=$_POST['password'];
//test the username and Password
if($_username=="testuser" && $_password=="letmein"){
  $_SESSION["username"]="username";
}
else{
  echo "No session data available";
  die();
}
if(isset($_SESSION["username"])){
//echo "Successfully logged in go to the <a href='page1.php'>homepage</a>";
header( "Location: index.php" );
}


?>

</body>
</html>
