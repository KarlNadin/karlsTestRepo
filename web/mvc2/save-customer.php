<?php
require_once "models/builder-model.php";

//This is a simple example we would normally do some form validation here

//basic form processing
$title=$_POST['title'];
$surname=$_POST['surname'];
$firstName=$_POST['firstName'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$jobBrief=$_POST['jobBrief'];

saveCustomer($title,$surname,$firstName,$address,$email,$phone,$jobBrief);

require "views/save-customer-view.php";
?>
