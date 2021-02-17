<?php if ($content["title"]): ?>
	<div class="item">
		<div class="item-inner">
			<a href="<?php echo $content["link"] ?>">
				<img src="<?php echo $content["banner"] ?>" class="bg">
				<div class="box-copy">
					<div class="title"><?php echo $content["title"] ?></div>
				</div>
			</a>
		</div>
	</div>
<?php endif ?>