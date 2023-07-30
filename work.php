<?php
	session_start();
	require_once('NewsModel.php');
	require_once('CommentModel.php');
	use MySpace\NewsModel;
	use MySpace\CommentModel;
	$news = new NewsModel;
	$comment = new CommentModel;
	$row = $news::getItem($_GET['id']);
	$coms = $comment::getList($row['id']);
	$coms_count = $comment::getCount($row['id']);
	$code = "News";

	$_SESSION['news_id'] = $row['id'];
	include("header.php");
?>
	<div class="long-line"></div>
	<div class="content">
		<div class="path">Главная  /  <p class="grey"><?=$row['title']?></p></div>
		<div class="title">
			<?=$row['title'] ?>
		</div>
		<div class="card-date"><?=$row['dt'] ?></div>
		<div class="content-box">
			<div class="non-image">
				<div class="content-htext"><?=$row['announce'] ?></div>
				<div class="content-text">
					<?=$row['content']?>
				</div>
				<a class="btn" href="/index.php?pageID=<?=$_SESSION['pageID']?>"> <button class="card-button-detail"><i class="fa-solid fa-arrow-left-long fa-2xl"></i><p class="card-button-text-detail"> НАЗАД К НОВОСТЯМ </p> </button> </a>
			</div>
			<div class="image"> 
				<img src="assets/img/images/<?=$row['image']?>">
			</div>

		</div>
		<div class="comment">
			<h3 class="ctitle">Комментарии <?=$coms_count?>:</h3>
			<?php while($cs = $coms -> fetch()) { ?>
				<div class="ccard">
					<div class="header">	
						<h4 class="cname"><?=$cs['name']?></h4>
						<p class="cdate"><?=$cs['dt']?></p>
					</div>
					<div class="cbody">
						<p><?=$cs['text']?></p>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="form">
			<h3 class="ftitle">Оставьте комментарий</h3>
			<form method="POST" class="form" action="sendComment.php">
				<input class="finput" name="name" type="text" placeholder="Ваше имя">
				<textarea class="finput" name="comment" placeholder="Ваш комментарий"></textarea>
				<button type="submit" class="fbutton">Отправить</button>
			</form>
		</div>
		<?php include('footer.php');?>
	</div>
</div>
</body>
</html>