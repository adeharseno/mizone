<div class="row">
	<form class="form" role="form" action="<?php echo $class_name ?>/edit<?php echo (!empty($row["id"])) ? '/'.$row["id"] : '' ?>" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "image[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["image"][$lang_key]) ? $row["image"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title[<?php echo $lang_key ?>]" id="title_<?= $lang_key ?>" value="<?php echo (set_value('title['.$lang_key.']'))?set_value('title['.$lang_key.']'):(isset($row["title"][$lang_key]) ? $row["title"][$lang_key] : "") ?>">
                                <?php if (\Config\Services::validation()->getError('title['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('title['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <?php if ($lang_key === 'id') : ?>
                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" type="text" name="slug" id="slug" value="<?php echo  (isset($row["slug"]) ? $row["slug"] : "") ?>">
                                <?php if (\Config\Services::validation()->getError('slug')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('slug'); ?></label>
                                <?php endif ?>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label>Author</label>
                                <input class="form-control" type="text" name="author[<?php echo $lang_key ?>]" value="<?php echo (set_value('author['.$lang_key.']'))?set_value('author['.$lang_key.']'):(isset($row["author"][$lang_key]) ? $row["author"][$lang_key] : "") ?>">
                                <?php if (\Config\Services::validation()->getError('author['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('author['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control tinymce" rows="10" name="content[<?php echo $lang_key ?>]"><?php echo (set_value('content['.$lang_key.']'))?set_value('content['.$lang_key.']'):(isset($row["content"][$lang_key]) ? $row["content"][$lang_key] : "") ?></textarea>  
                                <?php if (\Config\Services::validation()->getError('content['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('content['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Excerpt</label>
                                <textarea class="form-control tinymce" rows="10" name="excerpt[<?php echo $lang_key ?>]"><?php echo (set_value('excerpt['.$lang_key.']'))?set_value('excerpt['.$lang_key.']'):(isset($row["excerpt"][$lang_key]) ? $row["excerpt"][$lang_key] : "") ?></textarea>  
                                <?php if (\Config\Services::validation()->getError('excerpt['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('excerpt['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Publish Date</label>
                                <input class="form-control" type="date" name="publish_date[<?php echo $lang_key ?>]" value="<?php echo (set_value('publish_date['.$lang_key.']'))?set_value('publish_date['.$lang_key.']'):(isset($row["publish_date"][$lang_key]) ? $row["publish_date"][$lang_key] : "") ?>">
                                <?php if (\Config\Services::validation()->getError('publish_date['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('publish_date['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title[<?php echo $lang_key ?>]" value="<?php echo (set_value('meta_title['.$lang_key.']'))?set_value('meta_title['.$lang_key.']'):(isset($row["meta_title"][$lang_key]) ? $row["meta_title"][$lang_key] : "") ?>">
                                <?php if (\Config\Services::validation()->getError('meta_title['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('meta_title['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea class="form-control tinymce" rows="10" name="meta_desc[<?php echo $lang_key ?>]"><?php echo (set_value('meta_desc['.$lang_key.']'))?set_value('meta_desc['.$lang_key.']'):(isset($row["meta_desc"][$lang_key]) ? $row["meta_desc"][$lang_key] : "") ?></textarea>  
                                <?php if (\Config\Services::validation()->getError('meta_desc['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('meta_desc['.$lang_key.']'); ?></label>
                                <?php endif ?>
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