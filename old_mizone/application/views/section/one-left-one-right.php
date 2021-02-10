<?php 


$value = isset($contents[0]) ? $contents[0] : null;

if ($value){
    $left_content = $this->pages->generate_content($this->pages->get_content("left-content", $value["json"]));
    $right_content = $this->pages->generate_content($this->pages->get_content("right-content", $value["json"]));
    
    ?>
    <section class="menu">
        <div class="box-menu">
            <div class="menus">
                <div class="columns is-gapless is-multiline">
                    <div class="column item is-6">
                        <div class="item-inner is-1">
                            <img src="<?php echo $left_content["banner"] ?>" class="bw-filter">
                            <div class="box-copy">
                                <div class="title"><?php echo $left_content["title"] ?></div>
                                <div class="desc"><?php echo $left_content["desc"] ?></div>
                                <a href="<?php echo $left_content["link"] ?>" class="button is-mybutton is-readmore"><?php echo $left_content["link_caption"] ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="column item is-6">
                        <div class="item-inner is-1">
                            <img src="<?php echo $right_content["banner"] ?>" class="bw-filter">
                            <div class="box-copy right">
                                <div class="title"><?php echo $right_content["title"] ?></div>
                                <div class="desc"><?php echo $right_content["desc"] ?></div>
                                <a href="<?php echo $right_content["link"] ?>" class="button is-mybutton is-readmore"><?php echo $right_content["link_caption"] ?></a>
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



