<?php 
	if (file_get_contents('php://input') != null){
		$inputJSON = file_get_contents('php://input');
		$input= json_decode( $inputJSON, TRUE ); 
		$result = md5($input['pass']);
		echo $result;
	}