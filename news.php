<?php 
include 'autoload.php';

session_start();
$code="News";
use App\Models\NewsModel;
$news = new NewsModel;

$start = 0;
$amount = 4;

if (isset($pageID)){
	$start += 4*($pageID - 1);
	$_SESSION['pageID'] = $pageID;
} else {
	$_SESSION['pageID'] = 1;
}

$st = $news::getList($start, $amount);
$bt = $news::getLast();

include 'views/News/List.php';