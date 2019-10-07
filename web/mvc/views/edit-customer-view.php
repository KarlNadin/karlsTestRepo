<!DOCTYPE HTML>
<html>
<head>
<title>Edit Customers</title>
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


<h1>Edit Customer details</h1>
<form action="update-customer.php" method="post">
  <!-- <input type="hidden"> creates a hidden text field i.e. not visible to the user
  	we use it to store the id number of the selected employee -->

<input type="hidden" name="id" value="<?php echo $customer["id"];?>">

<div id="title">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" value="<?php echo $customer["title"];?>">
</div>

<div id="names">
  <label for="surame">Surname:</label>
  <input type="text" id="surname" name="surname" value="<?php echo $customer["surname"];?>">

  <label for="firstName">First Name:</label>
  <input type="text" id="firstname" name="firstName" value="<?php echo $customer["firstName"];?>">
</div>

<div id="address">
  <p>Address:</p>
  <textarea name="address" cols="73" rows="8"><?php echo $customer["address"];?></textarea>
</div>

<div id="contact">
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="<?php echo $customer["email"];?>">

  <label for="phone">Phone:</label>
  <input type="text" id="phone" name="phone" value="<?php echo $customer["phone"];?>">
</div>

<div id="jobBrief">
  <p>Job Brief:</p>
  <textarea name="jobBrief" cols="73" rows="8"><?php echo $customer["jobBrief"];?></textarea>
</div>

<div id="submit">
  <input type="submit" name="submitBtn" value="Update Customer">
</div>
</form>
</body>
</html>
