<?php 


$value = isset($contents[0]) ? $contents[0] : null;

if ($value){
    $left_image = $this->pages->generate_content($this->pages->get_content("left-image", $value["json"]));
    $first_right_copy = $this->pages->generate_content($this->pages->get_content("first-right-copy", $value["json"]));
    $second_right_copy = $this->pages->generate_content($this->pages->get_content("second-right-copy", $value["json"]));

    $bool_first_right_copy = ( !empty($first_right_copy["title"]) AND !empty($first_right_copy["desc"]) );
    $bool_second_right_copy = ( !empty($second_right_copy["title"]) AND !empty($second_right_copy["desc"]) );
    

    

    ?>
    <section class="menu">
        <div class="box-menu">
            <div class="menus">
                <div class="columns is-gapless is-multiline">
                    
                    <div class="column item is-6">
                        <div class="item-inner is-1">
                            <img src="<?php echo $left_image["banner"] ?>" class="bw-filter">
                            <div class="box-copy">
                                <?php if ($left_image["title"]): ?>
                                    <div class="title"><?php echo $left_image["title"] ?></div>
                                <?php endif ?>
                                <?php if ($left_image["link_caption"]): ?>
                                    <a href="<?php echo $left_image["link"] ?>" class="button is-mybutton is-readmore"><?php echo $left_image["link_caption"] ?></a>    
                                <?php endif ?>
                                
                            </div>
                        </div>
                    </div>

                    <div class="column is-6">
                        <div class="columns is-gapless is-multiline">
                            <?php if ($bool_first_right_copy): ?>
                                <div class="column item is-12 ">
                                    <div class="item-inner is-2 just-copy white is-mobile">
                                        <div class="box-copy">
                                            <?php if ($first_right_copy["title"]): ?>
                                                <div class="title"><?php echo $first_right_copy["title"] ?></div>    
                                            <?php endif ?>
                                            <?php if ($first_right_copy["desc"]): ?>
                                                <div class="desc"><?php echo $first_right_copy["desc"] ?></div>    
                                            <?php endif ?>
                                            <?php if ($first_right_copy["link_caption"]): ?>
                                                <a href="<?php echo $first_right_copy["link"]  ?>" class="button is-mybutton is-readmore"><?php echo $first_right_copy["link_caption"]  ?></a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if ($bool_second_right_copy): ?>
                                <div class="column item is-12">
                                    <div class="item-inner is-2 just-copy is-mobile">
                                        <div class="box-copy">
                                            <?php if ($second_right_copy["title"]): ?>
                                                <div class="title"><?php echo $second_right_copy["title"] ?></div>    
                                            <?php endif ?>
                                            <?php if ($second_right_copy["desc"]): ?>
                                                <div class="desc"><?php echo $second_right_copy["desc"] ?></div>    
                                            <?php endif ?>
                                            <?php if ($second_right_copy["link_caption"]): ?>
                                                <a href="<?php echo $second_right_copy["link"]  ?>" class="button is-mybutton is-readmore"><?php echo $second_right_copy["link_caption"]  ?></a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>

