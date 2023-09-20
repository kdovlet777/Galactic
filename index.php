<?php

include 'autoload.php';

use App\Controllers\NewsController;

$url = $_SERVER['REQUEST_URI']; 

$controller = false;

if ($url == "/") {
	include 'views/main.php';
} elseif ($url == "/news/") {
	$controller = new NewsController;
	$methodName = 'actionList';
	$arg = [1];
} elseif (preg_match("{^/news/(\d+)/$}", $url, $id)) {
	$controller = new NewsController;
	$methodName = "actionDetail";
	$arg = [$id[1]];
} elseif (preg_match("{^/news/page-(\d+)/$}", $url, $pageID)) {
	$controller = new NewsController;
	$methodName = "actionList";
	$arg = [$pageID[1]];
} 
if ($controller) {
	call_user_func_array([$controller, $methodName], $arg);
}