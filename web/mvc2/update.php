<?php
require_once "models/builder-model.php";

//This is a simple example we would normally do some form validation here

//basic form processing
$id=$_POST['id'];
$title=$_POST['title'];
$surname=$_POST['surname'];
$firstName=$_POST['firstName'];
$trade=$_POST['trade'];
$email=$_POST['email'];
$phone=$_POST['phone'];

updateTradesman($id,$title,$surname,$firstName,$trade,$email,$phone);

require "views/update-view.php";
?>
