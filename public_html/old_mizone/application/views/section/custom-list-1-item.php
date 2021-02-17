<div class="column is-6 item <?php echo ( (($i % 4) == 3 OR ($i % 4) == 0) OR $count <= 2) ? "is-dark" : "" ?>">
	<div class="item-inner">
		<div class="box-copy">
			<?php if ($content["title"]): ?>
				<div class="title"><?php echo $content["title"] ?> </div>
			<?php endif ?>
			<?php if ($content["detail"]): ?>
				<div class="desc area"><?php echo $content["detail"] ?></div>	
			<?php endif ?>
            <?php if ($content["desc"]): ?>
				<div class="desc"><?php echo $content["desc"] ?></div>
			<?php endif ?>
			<?php if ($content["link_caption"]): ?>
				<div class="button-box">
					<a href="<?php echo $content["link"]  ?>" class="button is-mybutton is-readmore"><?php echo $content["link_caption"] ?></a>	
				</div>
			<?php endif ?>
			
		</div>
	</div>
</div>