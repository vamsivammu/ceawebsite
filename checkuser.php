<?php

require 'connection.php';
session_start();
$resp=array();
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_SESSION['start'])){
		$resp['start']=0;
	}else{
		$_SESSION['start']=1;
		$resp['start']=1;
	}
	if(isset($_SESSION['loggeduseremail']) and !empty($_SESSION['loggeduseremail'])){
		$resp['status']=1;
	}else{
		$resp['status']=0;
	}
}

echo json_encode($resp);

?>



