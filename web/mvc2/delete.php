<?php

require_once "models/builder-model.php";

if(isset($_POST['ids'])){
	//the ids come from the form as an array e.g. ids=[3,6,7]
	$ids=$_POST['ids'];
	$numTradesmen=count($ids);
	deleteTradesman($ids);
}else{
    $msg="<p>No Tradesmen selected.</p>";
}

require "views/delete-view.php";
?>
