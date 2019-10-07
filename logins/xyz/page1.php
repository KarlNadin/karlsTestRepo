<?php
session_start();
//Check to see if the session has been set
if(isset($_SESSION["username"]))
//If so, log in and display.  If not display no session and die
{
echo "You are logged in as test user <a href='login.php'>login</a>";
}else{
echo "No session data to read. <a href='login.php'>login</a>";
die();
};
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 1</title>
</head>

<body>
<h1>Page 1</h1>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="page1.php">Page 1</a></li>
        <li><a href="page2.php">Page 2</a></li>
        <li><a href="page3.php">Page 3</a></li>
        <li><a href="logout.php">logout</a></li>
    </ul>
</nav>
</body>
</html>
