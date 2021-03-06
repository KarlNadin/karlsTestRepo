<!DOCTYPE HTML>
<html>
<head>
<title>Edit Tradespeople and Staff</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>CANALSIDE BUILDERS</h1>
<div id="navbar">
  <a href="index.php">Home</a>
  <a href="create.php">Add Employee</a>
  <a href="list.php">List Employees</a>
  <a href="edit-list.php">Update Employees</a>
  <a href="delete-list.php">Delete Employees</a>
  <a href="add-customer.php">Add Customer</a>
  <a href="list-customer.php">List Customers</a>
  <a href="edit-customer-list.php">Update Customers</a>
  <a href="delete-customer-list.php">Delete Customers</a>
  <a href="models-task.php">Modelling Tasks</a>
</div>

<h1>Edit your Tradespeople and Staff</h1>
<?php

foreach ($tradesmen as $tradesman) {
    echo "<p>";
    //echo "{$tradesman["firstName"]}", " {$tradesman["surname"]}";
    //outputs a hyperlink for each employee e.g. <a href="edit.php?id=4">edit</a>
    //each hyperlink has a query string (look back at practical 1) that specifies which employee has been clicked on
    echo " <a href='edit.php?id=" . $tradesman["id"] . "'>{$tradesman["firstName"]}", " {$tradesman["surname"]}</a>";
    echo "</p>";
}
?>
</body>
</html>
