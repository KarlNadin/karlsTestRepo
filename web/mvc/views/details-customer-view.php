<!DOCTYPE HTML>
<html>
<head>
<title>Customer details</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>CANALSIDE BUILDERS</h1>
	<div class="link">
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
	
<h1>Customer</h1>

<?php
if($customer){
	echo "<p>Title: ".$customer['title']."</p>";
	echo "<p>Surname: ".$customer['surname']."</p>";
	echo "<p>First Name: ".$customer['firstName']."</p>";
	echo "<p>Address: ".$customer['address']."</p>";
	echo "<p>Email: ".$customer['email']."</p>";
	echo "<p>Phone: ".$customer['phone']."</p>";
	echo "<p>Job Brief: ".$customer['jobBrief']."</p>";
}
?>

</body>
</html>
