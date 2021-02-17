<?php $content = $this->pages->get_content_row("main", $contents); ?>

<section class="description">
	<div class="container">
		<div class="box-description">
			<div class="columns is-gapless">
				<div class="column item is-6">
					<div class="item-inner">
						<div class="box-copy">
							<div class="title"><?php echo $content["title"] ?></div>
							<div class="detail-desc">
								<?php echo str_replace("../../../", "", $content["desc"]) ?>
							</div>
						</div>
					</div>
				</div>
				<div class="column item is-6">
					<div class="item-inner">
						<?php 
							switch ($value["content_active"]) {
								case 0:
									?>
									<div class="box-map">
										<div class="map" id="map"></div>
									</div>
									<?php
									break;
								case 1:
									?>
									<div class="box-thumbnail">
										<img src="<?php echo $this->image_path->get_src( $value["content_image"] ) ?>">
									</div>
									<?php
									break;
								case 2:
									?>
									<div class="box-youtube">
										<iframe src="https://www.youtube.com/embed/<?php echo $value["youtube_id"] ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
									</div>
									<?php
									break;
								default:
									# code...
									break;
							}


						 ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
    var dataHotel = <?php echo  json_encode($value) ?>;
</script>