<?php
require_once "models/builder-model.php";

//This is a simple example we would normally do some form validation here

//basic form processing

$surname=$_POST['surname'];
$firstName=$_POST['firstName'];
$trade=$_POST['trade'];
$email=$_POST['email'];
$phone=$_POST['phone'];

saveTradesmen($surname,$firstName,$trade,$email,$phone);

require "views/save-view.php";
?>
