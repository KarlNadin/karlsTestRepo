<!DOCTYPE HTML>
<html>
<head>
<title>Delete Employees</title>
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

<h1>Delete your Tradespeople and Staff</h1>
<form action="delete.php" method="POST">
<?php
foreach ($tradesmen as $tradesman) {
    echo "<p>";
    echo "<label>";
    //outputs a checkbox button for each employee e.g. <label><input type="checkbox" name="ids[]" value="2" '="">Matthew Mantle</label>
    echo "<input type='checkbox' name='ids[]' value='{$tradesman["id"]}''>";
    echo "{$tradesman["firstName"]}", " {$tradesman["surname"]}";
    echo "</label>";
    echo "</p>";
}
?>
<input type="submit">
</form>
</body>
</html>
