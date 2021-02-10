
<?php 
    $caption_content = null;
    foreach ($contents as $key => $value){
        if ($c = $this->pages->generate_content($this->pages->get_content("caption-content", $value["json"]))){
            $caption_content = $c;
        }
    }
    
    
?>

<section class="news with-title">
    <div class="title"><?php echo $caption_content["title"] ?></div>
    <div class="body">
        <div class="container">
            <div class="box-news">
                <div class="news">
                    <div class="columns is-gapless is-mobile is-multiline">
                        <?php $this->pages->each_content($contents, $view); ?>
                    </div>
                </div>
                <div class="box-button">
                    <a href="<?php echo $caption_content["link"] ?>" class="button is-mybutton is-dark"><?php echo $caption_content["link_caption"] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>