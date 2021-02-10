<div class="item">
	<div class="columns is-gapless">
		<?php if ($content["banner"] != "storage/"): ?>
		<div class="column is-3">
			<div class="box-thumbnail">
				<img src="<?php echo $content["banner"] ?>">
			</div>
		</div>
		<?php endif ?>
		<div class="column">
			<div class="box-copy">
				<?php if ($content["title"]): ?>
					<div class="title"><?php echo $content["title"] ?> </div>
				<?php endif ?>
				<?php if ($content["detail"]): ?>
					<div class="date-text"><?php echo $content["detail"] ?></div>	
				<?php endif ?>
				<?php if ($content["desc"]): ?>
					<div class="desc"><?php echo $content["desc"] ?></div>
				<?php endif ?>
				<?php if ($content["link_caption"]): ?>
					<div class="button-box right">
						<a href="<?php echo $content["link"]  ?>" class="button is-mybutton is-dark"><?php echo $content["link_caption"] ?></a>	
					</div>
				<?php endif ?>
				
			</div>		
		</div>
	</div>
	
	
</div>