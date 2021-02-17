<script type="text/javascript" src="assets/mizone/js/home.js"></script>
<section id="MainHome" class="current">
<!-- <section id="MainHome"> -->
	<div class="bg"></div>
	<div class="bg-menu"></div>
	<div class="arrow">
		<div class="arrow-grid"></div>
	</div>
	<div class="text">
		<div class="whiteisotonic"></div>
		<div class="extra"></div>
	</div>
	<div class="mizone-bottle">	
		<img src="assets/mizone/imgs/botol.png" class="bottle" />
		<div class="ingredient tea">
			<div class="trigger" data-slug="tea"></div>
			<div class="ingredient-detail">
				<div class="title tea text-uppercase">ekstrak white tea</div>
				<p>100% sabi bantu bebasin diri lo dari kejenuhan</p>
			</div>
		</div>
		<div class="ingredient electric">
			<div class="trigger" data-slug="electric"></div>
			<div class="ingredient-detail">
				<div class="title electric text-uppercase">elektrolit</div>
				<p>100% sabi bantu balikin cairan tubuh lo yang hilang</p>
			</div>
		</div>
		<div class="ingredient vitamin">
			<div class="trigger" data-slug="vitamin"></div>
			<div class="ingredient-detail">
				<div class="title vitamin text-uppercase">3 vitamin</div>
				<p>100% sabi bantu jaga energi tubuh lo</p>
			</div>
		</div>
	</div>
	<div class="vid-button"><span>CEK VIDEO SABI LO</span></div>


	<div class="menu-product">
		<div class="container">		
			<div class="row">

			<?php foreach ($mproducts as $key => $value){ ?>
				<?php if ($value["flag"] != 99) { 

					$before=[" ", "’"];
					$after=["-", ""];

					$titlelink = strtolower(str_replace($before,$after,$value['title']));
					?>
				<div class="col-sm">
					<a href="product#<?php echo $titlelink ; ?>">
						<div class="content">
							<div class="title"><?php echo $value["title"]; ?></div>
							<div class="img-area">
								<img src="<?php echo $this->image_path->get_src($value["image"]) ?>" />
							</div>
							<div class="btn-area" style="background-color: <?php echo $value["color"]; ?>"><div>Product Detail</div></div>
						</div>
					</a>
				</div>
				<?php } ?>	
			<?php } ?>
			</div>
		</div>
	</div>
</section>
<section id="HomeVideo">
<!-- <section id="HomeVideo" class="current"> -->
	<div class="container">
		<div class='embed-container'>
			<div id="player"></div>
		</div>
	</div>
	<div class="text-container d-sm-block">
		<?php foreach ($video_sub_section as $key => $value){ ?>
			<?php if ($value["flag"] != 99 AND $value["video_section_id"] == 6 ) { ?>
				<div class="content" data-id="<?php echo $value['link'];?>" style="display: block" >
					<h3><?php echo $value["description"]; ?></h3>	
					<p>Mizone White Isotonic dengan ekstrak white tea! Cobain yang bisa bikin lo #100persenSabi!</p>
				</div>
			<?php } ?>	
		<?php } ?>
	</div>
	<div class="menu-vid">
		<div class="track">		
			<?php foreach ($video_sub_section as $key => $value){ ?>
				<?php if ($value["flag"] != 99 AND $value["video_section_id"] == 6 ) { ?>
					<a href="" data-id="<?php echo $value['link'];?>">
						<div class="img" style="background-image: url('<?php echo $this->image_path->get_src($value["thumb"]) ?>');"></div>
						<div class="content">
							<span><?php echo $value['title'];?></span>
							<div class="title"><?php echo $value['description'];?></div>
						</div>
					</a>
				<?php } ?>	
			<?php } ?>	
		</div>
	</div>
</section>
<div class="modal fade" id="IngredientModal" tabindex="-1" role="dialog" data-slug="tea" aria-labelledby="IngredientModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<a href="" data-dismiss="modal" class="close-modal">close</a>
			<img src="assets/mizone/imgs/tea.png" />
			<h3 class="text-center text-uppercase">ekstrak white tea</h3>
			<p class="text-center">100% sabi bantu bebasin diri lo dari kejenuhan</p>			
		</div>
	</div>
</div>
<div class="modal fade" id="IngredientModal" tabindex="-1" role="dialog" data-slug="electric" aria-labelledby="IngredientModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<a href="" data-dismiss="modal" class="close-modal">close</a>
			<img src="assets/mizone/imgs/electric.png" />
			<h3 class="text-center text-uppercase">electrolit</h3>
			<p class="text-center">100% sabi bantu balikin cairan tubuh lo yang hilang</p>			
		</div>
	</div>
</div>
<div class="modal fade" id="IngredientModal" tabindex="-1" role="dialog" data-slug="vitamin" aria-labelledby="IngredientModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<a href="" data-dismiss="modal" class="close-modal">close</a>
			<img src="assets/mizone/imgs/vitamin.png" />
			<h3 class="text-center text-uppercase">3 vitamin</h3>
			<p class="text-center">100% sabi bantu jaga energi tubuh lo</p>			
		</div>
	</div>
</div>