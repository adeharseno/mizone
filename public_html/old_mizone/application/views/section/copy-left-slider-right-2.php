<?php $content = $this->pages->get_content_row("content", $contents); ?>

<section class="special-offer">
	<div class="box-special-offer">
		<div class="offers">
			<div class="columns is-gapless">
				<div class="column is-6 item">
					<div class="item-inner">
						<div class="box-copy centered">
							<div class="title"><?php echo $content["title"] ?></div>
							<a href="" class="button is-mybutton is-readmore"><?php echo $content["link_caption"] ?></a>
						</div>
					</div>
				</div>
				<div class="column is-6 item">
					<div class="item-inner">
						<div class="box-brand">
							<div class="title"><?php echo $content["title_slider"] ?></div>
							<div class="box-list-hotel-2 list-slick">
						        <a href="" class="arrow arrow-left list-hotel-2-left"><i class="fa fa-angle-left"></i></a>
						        <a href="" class="arrow arrow-right list-hotel-2-right"><i class="fa fa-angle-right"></i></a>
						        <div class="list-hotel-2 list hotels">
								
									<?php $this->pages->each_content($contents, $view); ?>
									
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>