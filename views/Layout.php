<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.cdnfonts.com/css/segoe-ui-4" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="/assets/img/fav.jpg" style="border-radius: 50%;">
	<title>Рецепты</title>
	<script src="https://kit.fontawesome.com/34525fb119.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<script src="/builds/assets_css_tyles_scss.index.js"></script>
<link rel="stylesheet" href="/builds/assets_css_tyles_scss.index.css">

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
<script type="module" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/promise.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
	<nav class="navbar">
		<div class="logo">
		<a href="/news/" style="text-decoration: none; color: inherit;">
			<img style="width: 100px; height: 100px; border-radius: 50%;" src="/assets/img/logo.jpg">
		</a>
			<div class="navbar-text">STUDFOOD</div>
		</div>
		<?php include("menu.php");?>
		<div class="head">
			<?php 
				foreach ($arr as $key => $value) {
					$pageName = $value["title"];
					if ($key == $code){ ?>
						<div class="rectangle-active">
							<?=$pageName ?>	
							</div>
					<?php } else { ?>
						<div class="rectangle">
						<a class="btn" href="<?=$value["url"]?>">
							<?=$pageName ?>
							</a>
							</div>
					<?php }
				} ?>
		</div>
	</nav>

	<?=$content ?>

	<div class="footer" style="position: relative;">
	<div class="line"></div>
			<div class="copyright">
				© 2023 «STUDFOOD»
			</div>
		</div>	
	</div>
<body>
<html>
