<div class="row">
	<form class="form" role="form" action="<?php echo $class_name ?>/edit/<?php echo $row["id"] ?>" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="box-desc">
				<div class="item">
					<div class="desc-table"><?php echo $title_for ?> <?php echo ucfirst(str_replace("_", " ", $class_name)) ?></div>
				</div>
				
			</div>
		</div>
		<div class="col-md-6">
			<div class="pull-right">
				<a href="<?php echo $class_name ?>" class="btn btn-inna btn-outlined mr5">CLOSE</a>
				<a href="" class="btn btn-inna js-send">SAVE</a>
			</div>
		</div>
		<div class="col-md-12 mt25">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Status</label>
                        <?php $flag = (set_value('flag'))?set_value('flag'):$row["flag"] ?>
                        <div>
                            <label class="checkbox-inline i-checks">
                                <input name="flag" value="0" <?php echo ($flag == 0) ? "checked" : "" ?> type="radio">
                                <i></i>
                                Publish
                            </label>
                            <label class="checkbox-inline i-checks">
                                <input name="flag" value="1" <?php echo ($flag == 1) ? "checked" : "" ?> type="radio">
                                <i></i>
                                Not Publish
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $lang = get_language();
            ?>
            <ul class="nav nav-tabs">
            <?php
                $i=0;
                foreach ($lang as $key => $value){
                    ?>
                    <li class="<?php echo ($i==0) ? "active" : "" ?>"><a href="#<?php echo $key ?>" data-toggle="tab" aria-expanded="false"><?php echo $value ?></a></li>
                    <?php
                    $i++;
                } 
            ?>
            </ul>
            <div class="tab-content panel wrapper">      
                <?php
                    $i=0;
                    foreach ($lang as $lang_key => $lang_value){
                        ?>
                        <div id="<?php echo $lang_key ?>" class="tab-pane fade <?php echo ($i==0) ? "active in" : "" ?>">
                            <div class="row">
                                <!-- <div class="col-md-3 text-left">
                                    
                                    <div class="form-group">
                                        <label>Icon <sup>480x112</sup></label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "icon[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["icon"][$lang_key]) ? $row["icon"][$lang_key] : null;
                                                $image_path = $this->image_path->get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo $this->load->view(PATH_CW . 'components/image-select', $data, TRUE);
                                             ?>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-9"> 
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title[<?php echo $lang_key ?>]" value="<?php echo (set_value('title['.$lang_key.']'))?set_value('title['.$lang_key.']'):(isset($row["title"][$lang_key]) ? $row["title"][$lang_key] : "") ?>">
                                        <?php if (form_error('title['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('title['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube Link</label>
                                        <br>
                                        <lable>example : https://www.youtube.com/watch?v=<b>QPdKoQtgwr4</b> &#8594; <b>QPdKoQtgwr4</b> (copy this)</lable>
                                        <input class="form-control" type="text" name="link[<?php echo $lang_key ?>]" value="<?php echo (set_value('link['.$lang_key.']'))?set_value('link['.$lang_key.']'):(isset($row["link"][$lang_key]) ? $row["link"][$lang_key] : "") ?>">
                                        <?php if (form_error('link['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('link['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control tinymce" rows="10" name="content[<?php echo $lang_key ?>]"><?php echo (set_value('content['.$lang_key.']'))?set_value('content['.$lang_key.']'):(isset($row["content"][$lang_key]) ? $row["content"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('content['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('content['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $i++;
                    } 
                    ?>
            </div>      
        </div>
        
	</form>
</div>