<?php

session_start();
require_once 'app/models/News/News.php';
use MySpace\NewsModel;

$newsModel = new NewsModel();
$row = $newsModel->getItem($_GET['id']);
$code = "News";

include 'app/views/News/Detail.php';