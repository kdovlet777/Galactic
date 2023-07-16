<?php 
	require_once('NewsModel.php');
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
	include("header.php");
		?>
		<div class="banner">
			
			<img class="ban-image" src="assets/img/images/<?=$bt['image']?>">
			
			<div class="ban-text">
				<div class="ban-text-title"><?=$bt['title']?></div>
				<div class="ban-text-body"><?=$bt['announce']?></div>
			</div>
		</div>
		<div class="news">
			<div class="news-title">
				<p>Новости</p>
			</div>
			<div class="blocks">
				<?php while($row = $st -> fetch()) { ?>
				<div class="card">
					<div class="card-date"><p class="card-date-text"> 
						<?=$row['dt']?>
					</p></div>
					<div class="card-title"><?=$row['title']?></div>
					<div class="card-text"><?=$row['announce']?></div>
					<a class="btn" href="/work.php?id=<?=$row['id']?>"><button class="card-button"><p class="card-button-text"> ПОДРОБНЕЕ </p> <i class="fa-solid fa-arrow-right-long fa-2xl"></i></button></a>
				</div>
				<?php 
				}
				?>
			</div>
			<div class="paginator">
				<?php 
					$pagesTotalNum = $news::getCount();
					$pageDivs = intdiv($pagesTotalNum, $amount) + 1;

					$pagin = (isset($_GET['pageID']) ? $_GET['pageID'] : 1);
					if ($pagin != 1){
				 ?>

					<a href="/index.php?pageID=<?=($pagin-1)?>" class="btn"><div class="circle"><?=$pagin - 1 ?></div></a>
					<?php } ?>
					<div class="circle-active"><?=$pagin ?></div>
					
					<?php if ($pagin!=$pageDivs){ ?>
					<a href="/index.php?pageID=<?=($pagin+1)?>" class="btn"><div class="circle"><?=$pagin + 1 ?></div></a>

				<a class="btn" href="/index.php?pageID=<?=($pageDivs)?>"><div class="circle-arrow"><i class="fa-solid fa-arrow-right"></i></div></a>
			<?php } ?>
			</div>
			<?php
				include("footer.php");
			?>
		</div>
	</div>

</body>
</html>