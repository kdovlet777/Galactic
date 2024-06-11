
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
				<div class="content-text" style="text-wrap: wrap;">		
		<?php echo $row['content']?>
			
				</div>
				<a class="btn" href="/news/page-<?=$_SESSION['pageID']?>/"> <button class="card-button-detail"><i class="fa-solid fa-arrow-left-long fa-2xl"></i><p class="card-button-text-detail"> НАЗАД К СПИСКУ</p> </button> </a>
			</div>
			<div > 
				<img class="image" src="/assets/imgs/<?=$row['image']?>">
			</div>

		</div>
		
		
	</div>
