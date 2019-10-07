<!DOCTYPE HTML>
<html>
<head>
<title>Edit Employees</title>
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

<h1>Edit Employees</h1>
<form action="update.php" method="post">
<!-- <input type="hidden"> creates a hidden text field i.e. not visible to the user
	we use it to store the id number of the selected employee -->
<input type="hidden" name="id" value="<?php echo $tradesman["id"];?>">

<label for="surname">Surname:</label>
<input type="text" id="surname" name="surname" value="<?php echo $tradesman["surname"];?>">

<label for="firstName">First Name:</label>
<input type="text" id="firstName" name="firstName" value="<?php echo $tradesman["firstName"];?>">

<label for="trade">Trade:</label>
<input type="text" id="trade" name="trade" value="<?php echo $tradesman["trade"];?>">

<label for="email">Email:</label>
<input type="text" id="email" name="email" value="<?php echo $tradesman["email"];?>">

<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone" value="<?php echo $tradesman["phone"];?>">

<input type="submit" name="submitBtn" value="Update Tradesman details">
</form>

</body>
</html>
