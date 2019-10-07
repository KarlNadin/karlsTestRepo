<?php
require_once "models/builder-model.php";
$customers = getAllCustomers();
require "views/list-customer-view.php";
?>
