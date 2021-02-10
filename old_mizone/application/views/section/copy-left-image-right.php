<?php 


$value = isset($contents[0]) ? $contents[0] : null;

if ($value){
    $right_image = $this->pages->generate_content($this->pages->get_content("right-image", $value["json"]));
    $left_copy = $this->pages->generate_content($this->pages->get_content("left-copy", $value["json"]));
    
    ?>
    <section class="menu">
        <div class="box-menu">
            <div class="menus">
                <div class="columns is-gapless is-multiline">
                     <div class="column item is-6">
                        <div class="item-inner is-1 just-copy">
                            <div class="box-copy">
                                <?php if ($left_copy["title"]): ?>
                                    <div class="title"><?php echo $left_copy["title"] ?></div>    
                                <?php endif ?>
                                <?php if ($left_copy["desc"]): ?>
                                    <div class="desc"><?php echo $left_copy["desc"] ?></div>    
                                <?php endif ?>
                                <?php if ($left_copy["link_caption"]): ?>
                                    <a href="<?php echo $left_copy["link"]  ?>" class="button is-mybutton is-readmore"><?php echo $left_copy["link_caption"]  ?></a>
                                <?php endif ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="column item is-6">
                        <div class="item-inner is-1">
                            <img src="<?php echo $right_image["banner"]  ?>" class="bw-filter">
                            <div class="box-copy right">
                                <?php if ($right_image["title"]): ?>
                                    <div class="title"><?php echo $right_image["title"] ?></div>    
                                <?php endif ?>
                                <?php if ($right_image["desc"]): ?>
                                    <div class="desc"><?php echo $right_image["desc"] ?></div>    
                                <?php endif ?>
                                <?php if ($right_image["link_caption"]): ?>
                                    <a href="<?php echo $right_image["link"]  ?>" class="button is-mybutton is-readmore"><?php echo $right_image["link_caption"]  ?></a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>

