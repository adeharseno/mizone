<script type="text/javascript" src="assets/mizone/js/product.js"></script>
<section id="productIndex" class="current">
	<div class="title"></div>
	<div class="product-list">
		<div class="track">		
			<?php foreach ($mproducts as $key => $value){ ?>
				<?php if ($value["flag"] != 99 ) { 

					$before=[" ", "’"];
					$after=["-", ""];

					$titlelink = strtolower(str_replace($before,$after,$value['title']));
					?>
					<a href="" class="list" data-slug="<?php echo $titlelink ; ?>">
						<img src="<?php echo $this->image_path->get_src($value["image"]) ?>" class="img-bottle" />
						<img src="<?php echo $this->image_path->get_src($value["image_hover"]) ?>" class="img-bottle-hover" />
						<div class="circle" style="background-image: url('<?php echo $this->image_path->get_src($value["icon"]) ?>');">DETAIL</div>
						<div class="title-product text-uppercase"><?php echo $value['title'];?></div>
						<img src="<?php echo $this->image_path->get_src($value["label"]) ?>" class="img-label" />
					</a>
				<?php } ?>	
			<?php } ?>
		</div>
	</div>
</section>
<section id="productDetail">
	<div class="menu-product">
		<div class="back"></div>
		<ul>
			<?php foreach ($mproducts as $key => $value){ ?>
				<?php if ($value["flag"] != 99 ) { 

					$before=[" ", "’"];
					$after=["-", ""];

					$titlelink = strtolower(str_replace($before,$after,$value['title']));
					?>
						<li class="text-uppercase"><a href="#" data-slug="<?php echo $titlelink ; ?>"><?php echo $value['title'];?></a></li>
				<?php } ?>	
			<?php } ?>
		</ul>
	</div>
	<?php foreach ($mproducts as $key => $value){ ?>
		<?php if ($value["flag"] != 99 ) { 

			$before=[" ", "’"];
			$after=["-", ""];

			$titlelink = strtolower(str_replace($before,$after,$value['title']));
			?>
				<div class="container" data-slug="<?php echo $titlelink ; ?>">
					<img src="<?php echo $this->image_path->get_src($value["talent"]) ?>" class="arrow" data-direction="up" />
					<img src="<?php echo $this->image_path->get_src($value["image"]) ?>" class="img-bottle" />
					<img src="<?php echo $this->image_path->get_src($value["image_hover"]) ?>" class="img-bottle-mobile" />
					<div class="text">
						<img src="assets/mizone/imgs/whiteisotonic-logo.png" class="whiteisotonic" />
						<div class="title"><?php echo $value['title'];?></div>
						<img src="<?php echo $this->image_path->get_src($value["label"]) ?>" class="img-label" />
						<?php echo $value['content'];?>
					</div>
				</div>
				
		<?php } ?>	
	<?php } ?>
</section>