<?php
require_once "models/builder-model.php";
$customers = getAllCustomers();
require "views/delete-customer-list-view.php";
?>
