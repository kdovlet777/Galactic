<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/header.css">
	<link href="https://fonts.cdnfonts.com/css/segoe-ui-4" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title></title>
	<script src="https://kit.fontawesome.com/34525fb119.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<?php $code="OK"; include('header.php'); ?>
	<div class="container_ok">
		<h3 class="title" style="font-size: 40px;"><i class="fa-regular fa-circle-check" style="color: #1cd428;"></i> Спасибо за обращение, Ваше мнение очень важно для нас!</h3>
		<a class="btn" href="/index.php"> <button class="card-button-detail"><i class="fa-solid fa-arrow-left-long fa-2xl"></i><p class="card-button-text-detail"> НАЗАД К НОВОСТЯМ </p> </button> </a>
	</div>
</body>
</html>

<?php 

$re = '/\<[a-zA-Z]+( +[a-zA-Z]+\=\".*\")+>/';

$str = '<div class="banner">
			<img class="ban-image" src="assets/img/images/<?=$ban ?>">
			<div class="ban-text"> 
				<div class="ban-text-title"><p><?=$ban ?></p></div>
				<div class="ban-text-body"><?=$ban ?></div>
			</div>	
		</div>
		<div class="news">

			<div class="news-title">
				<p>Новости</p>
			</div>
			<div class="blocks">
				<?php while($row = $st -> fetch()){ ?>
				<div class="card">
					<div class="card-date" id="asd"><p class="card-date-text"> 
						<?php 
						$initString = $row;

						$year = substr($initString, 0, 4);
						$month = substr($initString, 5, 2);
						$day = substr($initString, 8, 2);

						$clearDate = "$day.$month.$year";
						echo $clearDate;
						?>
					</p></div>
					<div class="card-title"><?=$row?></div>
					<div class="card-text"><?=$row?></div>
					<a class="btn" href=""><button class="card-button">
<p class="card-button-text"> ПОДРОБНЕЕ </p> <i class="fa-solid fa-arrow-right-long fa-2xl"></i></button></a>
				</div>';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

echo "<textarea style='height:480px; width:720px;'>";

foreach ($matches as $key => $value) {
	echo "---$key---\n";
	foreach($value as $jey => $jalue){
		echo "$jey - $jalue \n";
	}
}
echo "</textarea>";
?>