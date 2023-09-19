<?php

$url = $_SERVER['REQUEST_URI']; 

if (preg_match("/^\/$/", $url)){
	$code = "main";
	include 'views/index.php';

} elseif (preg_match("/^\/news\/$/", $url)){
	include 'news.php';

} elseif (preg_match("/^\/news\/[0-9]+\/$/", $url)) {
	preg_match("/[0-9]+/", $url, $id);
	$id = $id[0];
	include 'detail.php';

} elseif (preg_match("/^\/news\/page-[0-9]+\/$/", $url)) {
	preg_match("/[0-9]+/", $url, $pageID);
	$pageID = $pageID[0];
	include 'news.php';
}