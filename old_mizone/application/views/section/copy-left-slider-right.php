

<?php $content = $this->pages->get_content_row("content", $contents); ?>


<section class="menu">
    <div class="box-menu">
        <div class="menus">
            <div class="columns is-gapless is-multiline">
                <div class="column item is-6 mobile">
                    <div class="item-inner is-2 slider is-mobile">
                        <div class="box-list-menu list-slick">
                            <a href="" class="arrow arrow-left list-menu-left"><i class="fa fa-angle-left"></i></a>
                            <a href="" class="arrow arrow-right list-menu-right"><i class="fa fa-angle-right"></i></a>
                            <div class="list-menu list">
                                <?php 
                                    foreach ($contents as $key => $value){
                                        $this->pages->if_table($value["table"], $value["json"], $view);
                                    } 
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="column item is-6">
                    <div class="item-inner is-2 just-copy  is-mobile">
                        <div class="box-copy">
                            <div class="title"><?php echo $content["title"] ?></div>
                            <div class="desc">
                                <?php echo $content["desc"] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column item is-6 desktop">
                    <div class="item-inner is-2 slider ">
                        <div class="box-list-menu list-slick">
                            <a href="" class="arrow arrow-left list-menu-left"><i class="fa fa-angle-left"></i></a>
                            <a href="" class="arrow arrow-right list-menu-right"><i class="fa fa-angle-right"></i></a>
                            <div class="list-menu list">
                                <?php $this->pages->each_content($contents, $view); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</section>