<?php
require_once "models/builder-model.php";
$customerId=$_GET['id'];
$customer = getCustomerById($customerId);
require "views/details-customer-view.php";
?>
