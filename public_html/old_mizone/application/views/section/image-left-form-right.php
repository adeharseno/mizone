<?php 


$value = isset($contents[0]) ? $contents[0] : null;

if ($value){
    $left_image = $this->pages->generate_content($this->pages->get_content("left-image", $value["json"]));
    $right_form = $this->pages->generate_content($this->pages->get_content("right-form", $value["json"]));

    ?>
    <section class="menu">
        <div class="box-menu">
            <div class="menus">
                <div class="columns is-gapless is-multiline">
                    <div class="column item is-6">
                        <div class="item-inner">
                            <img src="<?php echo $left_image["banner"] ?>" class="bw-filter">
                            <div class="box-copy">
                                <?php if ($left_image["title"]): ?>
                                    <div class="title"><?php echo $left_image["title"] ?></div>    
                                <?php endif ?>
                                <?php if ($left_image["desc"]): ?>
                                    <div class="desc"><?php echo $left_image["desc"] ?></div>
                                <?php endif ?>
                                <?php if ($left_image["link_caption"]): ?>
                                    <a href="<?php echo $left_image["link"] ?>" class="button is-mybutton is-readmore"><?php echo $left_image["link_caption"] ?></a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="column item is-6">
                        <div class="item-inner just-form">
                            <div class="box-copy">
                                <?php if ($right_form["title"]): ?>
                                    <div class="title"><?php echo $right_form["title"] ?></div>    
                                <?php endif ?>
                                <?php if ($right_form["desc"]): ?>
                                    <div class="desc"><?php echo $right_form["desc"] ?></div>
                                <?php endif ?>
                                <?php if ($right_form["link_caption"]): ?>
                                    <div class="box-button right">
                                        <a href="<?php echo $right_form["link"] ?>" class="button is-mybutton is-dark"><?php echo $right_form["link_caption"] ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="box-form">
                                <div class="title"><?php echo $right_form["title_form"] ?></div>
                                <?php $this->pages->load_view_form($right_form["view_form"]) ?>
                                
                                
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