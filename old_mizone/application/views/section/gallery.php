<section class="gallery">
	<div class="thumbnail">
		<img src="<?php //echo $this->image_path->get_src($galleries[0]["image_name"]) ?>" class="bg">
		<div class="name"><?php //echo $galleries[0]["name"] ?></div>
	</div>
	<div class="box-list-gallery list-slick">
        <a href="" class="arrow arrow-left list-gallery-left"><i class="fa fa-angle-left"></i></a>
        <a href="" class="arrow arrow-right list-gallery-right"><i class="fa fa-angle-right"></i></a>
        <div class="list-gallery list">
            <?php $this->pages->each_content($contents, $view); ?>

            
            
        </div>
    </div>
</section>