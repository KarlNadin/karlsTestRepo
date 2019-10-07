<?php

require_once "models/builder-model.php";

if(isset($_POST['ids'])){
	//the ids come from the form as an array e.g. ids=[3,6,7]
	$ids=$_POST['ids'];
	$numCustomers=count($ids);
	deleteCustomer($ids);
}else{
    $msg="<p>No Customers selected.</p>";
}

require "views/delete-customer-view.php";
?>
