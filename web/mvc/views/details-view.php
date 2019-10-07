<!DOCTYPE HTML>
<html>
<head>
<title>Employee details</title>
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

<h1>Tradesman</h1>

<?php
if($tradesman){
	echo "<p>Surname: ".$tradesman['surname']."</p>";
	echo "<p>First Name: ".$tradesman['firstName']."</p>";
	echo "<p>Trade: ".$tradesman['trade']."</p>";
	echo "<p>Email: ".$tradesman['email']."</p>";
	echo "<p>Phone: ".$tradesman['phone']."</p>";
}
?>


</body>
</html>

<!--https://github.com/CIT2318/mvc-with-functions/blob/solution/details.php
