

<section class="news-detail with-title">
	<div class="title"><?php echo $content["title"] ?></div>
	<div class="body">
		<div class="container">
			<div class="box-news">
				<?php echo str_replace("../../../", "", $content["desc"]) ?>
			</div>
		</div>
	</div>
</section>