<?php
//process client request via url
header("Content-Type:application/json");
require_once("methods.php");

	if(!empty($_GET['name'])){
	//
	$name=$_GET['name'];
	$userId=get_userAthentication($name);
	
		if(empty($userId)){
			//not found 
			deliver_response(200,"User Not found",NULL);
		}else{
			//user Id
			deliver_response(200,"User found",$userId);
		}
	}else{
		//throw invalid request
		deliver_response(400,"Invalid Request",NULL);
	}
?>