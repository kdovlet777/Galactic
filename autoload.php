<?php

function modelLoader($class)
{
	$result = str_replace("\\", "/", $class);
	if (substr($result, 0, 3) == "App"){
		$result[0] = strtolower($result[0]);
	}
	include ($result . '.php');
}

spl_autoload_register('modelLoader');