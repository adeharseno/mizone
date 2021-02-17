
<div class="item">
    <img src="<?php echo $content["banner"] ?>" class="bg">
    <div class="box-copy">
        <div class="container">
            <?php if ($content["title"] ): ?>
                <div class="title"><?php echo $content["title"] ?></div>
            <?php endif ?>
            <?php if ($content["desc"]): ?>
                <div class="desc hidden"><?php echo $content["desc"] ?></div>    
            <?php endif ?>
            <?php if ($content["link_caption"]): ?>
                <div class="box-button">
                    <a href="<?php echo $content["link"] ?>" class="button is-mybutton"><?php echo $content["link_caption"] ?></a>
                </div>    
            <?php endif ?>
            
        </div>
    </div>
</div>    