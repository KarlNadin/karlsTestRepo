<?php
require_once "models/builder-model.php";
$tradesmanId=$_GET['id'];
$tradesman = getTradesmanById($tradesmanId);
require "views/edit-view.php";
?>
