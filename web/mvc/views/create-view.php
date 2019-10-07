<!DOCTYPE HTML>
<html>
<head>
<title>Add new Tradesman</title>
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

<h1>Add new Tradespeople and Staff</h1>
<form action="save.php" method="post">

<label for="surame">Surname:</label>
<input type="text" id="surname" name="surname">

<label for="firstName">First Name:</label>
<input type="text" id="firstName" name="firstName">

<label for="trade">Trade:</label>
<input type="text" id="trade" name="trade">

<label for="email">Email:</label>
<input type="text" id="email" name="email">

<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone">

<input type="submit" name="submitBtn" value="Add Tradesman">
</form>

</body>
</html>
