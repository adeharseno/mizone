<?php $content = $this->pages->get_content_row("main", $contents); ?>

<a href="<?php echo $content["link"] ?>" class="floating-booking-now" target="_blank"><?php echo $content["link_caption"] ?></a>