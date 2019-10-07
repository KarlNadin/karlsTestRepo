<?php
require_once "models/builder-model.php";
$customerId=$_GET['id'];
$customer = getCustomerById($customerId);
require "views/edit-customer-view.php";
?>
