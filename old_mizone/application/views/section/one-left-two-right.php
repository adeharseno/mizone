<?php 


$value = isset($contents[0]) ? $contents[0] : null;

if ($value){
    $left_content = $this->pages->generate_content($this->pages->get_content("left-content", $value["json"]));
    $first_right_content = $this->pages->generate_content($this->pages->get_content("first-right-content", $value["json"]));
    $second_right_content = $this->pages->generate_content($this->pages->get_content("second-right-content", $value["json"]));
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
                                <div class="desc <?php echo ($left_content["desc"]) ? "" : "hidden" ?>"><?php echo $left_content["desc"] ?></div>
                                <a href="<?php echo $left_content["link"] ?>" class="button is-mybutton is-readmore"><?php echo $left_content["link_caption"] ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="columns is-gapless is-multiline">
                            <div class="column item is-12">
                                <div class="item-inner is-2">
                                    <img src="<?php echo $first_right_content["banner"] ?>" class="bw-filter">
                                    <div class="box-copy right">
                                        <div class="title"><?php echo $first_right_content["title"] ?></div>

                                        <div class="desc <?php echo ($first_right_content["desc"]) ? "" : "hidden" ?>"><?php echo $first_right_content["desc"] ?></div>
                                        <a href="<?php echo $first_right_content["link"] ?>" class="button is-mybutton is-readmore"><?php echo $first_right_content["link_caption"] ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="column item is-12">
                                <div class="item-inner is-2">
                                    <img src="<?php echo $second_right_content["banner"] ?>" class="bw-filter">
                                    <div class="box-copy right">
                                        <div class="title"><?php echo $second_right_content["title"] ?></div>
                                        <div class="desc <?php echo ($second_right_content["desc"]) ? "" : "hidden" ?>"><?php echo $second_right_content["desc"] ?></div>
                                        <a href="<?php echo $second_right_content["link"] ?>" class="button is-mybutton is-readmore"><?php echo $second_right_content["link_caption"] ?> </a>
                                    </div>
                                </div>
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

