<div class="banner">
	
	<img class="ban-image" src="/assets/imgs/<?=$bt['image']?>">
	
	<div class="ban-text">
	<a href="/news/<?=$bt['id']?>/" style="text-decoration: none;">
		<div class="ban-text-title"><?=$bt['title']?></div>
		<div class="ban-text-body"><?=$bt['announce']?></div>
		</a>
	</div>
</div>
<div class="news">
	<div class="news-title">
		Рецепты
	</div>
	<div class="blocks">
		<?php while($row = $st -> fetch()) { ?>
		<div class="card">
		<div class="card-thumb" style="background: url('/assets/imgs/<?=$row['image']?>'); background-size: cover;"></div>
			<div class="card-content">
			<div class="card-date"><p class="card-date-text"> 
				<?=$row['dt']?>
			</p></div>
			<div class="card-title"><?=$row['title']?></div>
			<div class="card-text"><?=$row['announce']?></div>
			<a class="btn" href="/news/<?=$row['id']?>/"><button class="card-button"><p class="card-button-text"> ПОДРОБНЕЕ </p> <i class="fa-solid fa-arrow-right-long fa-2xl"></i></button></a>
			</div>
		</div>
		<?php 
		}
		?>
	</div>
	<div class="paginator">
		<?php 
			$pagesTotalNum = $news::getCount();
			$pageDivs = intdiv($pagesTotalNum, $amount) + 1;
			
			$pagin = (isset($pageID) ? $pageID : 1);
			if ($pagin != 1 ){
		 ?>
		 	<a class="btn" href="/news/"><div class="circle-arrow"><i class="fa-solid fa-arrow-left"></i></div></a>
			<a href="/news/page-<?=($pagin-1)?>/" class="btn"><div class="circle"><?=$pagin - 1 ?></div></a>
			<?php } ?>
			<div class="circle-active"><?=$pagin ?></div>
			
			<?php if ($pagin!=$pageDivs){ ?>
			<a href="/news/page-<?=($pagin+1)?>/" class="btn"><div class="circle"><?=$pagin + 1 ?></div></a>

		<a class="btn" href="/news/page-<?=($pageDivs)?>/"><div class="circle-arrow"><i class="fa-solid fa-arrow-right"></i></div></a>
	<?php } ?>
	</div>
	
</div>
