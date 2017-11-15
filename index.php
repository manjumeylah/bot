<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method = "POST"){
		$requestBody = file_get_contents('php://input');
		$json = json_decode($requestBody);
		
		$text = $json->result->parameters->text;
		
		switch ($text){
			case 'order status':
				$speech = "Status of the order 123 is success";
				break;
			default:
				$speech = "Sorry, but it worked";
				break;
		}
		
		$response = new \stdClass();
		$response->speech = "";
		$response->displayText = "";
		$response->source = "webhook";
		echo json_encode($response);
}
else{
	echo "Method not allowed";
}
?>