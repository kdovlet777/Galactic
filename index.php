<?php 

function modelLoader($category, $class) {
	include 'app/models/' . $category . '/' . $class . '.php';
}

spl_autoload_register('modelLoader');

modelLoader('News', 'NewsModel');

session_start();
$code="News";
use MySpace\NewsModel;
$news = new NewsModel; 

$start = 0;
$amount = 4;

if (isset($_GET['pageID'])){
	$start += 4*($_GET['pageID']-1);
	$_SESSION['pageID'] = $_GET['pageID'];
} else {
	$_SESSION['pageID'] = 1;
}

$st = $news::getList($start, $amount);
$bt = $news::getLast();

include 'app/views/News/List.php';