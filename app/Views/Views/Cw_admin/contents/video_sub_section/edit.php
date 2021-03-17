<div class="row">
	<form class="form" role="form" action="<?php echo $class_name ?>/edit/<?php echo $parent_id ?>/<?php echo $row["id"] ?>" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="box-desc">
				<div class="item">
					<div class="desc-table"><?php echo $title_for ?> <?php echo ucfirst(str_replace("_", " ", $class_name)) ?></div>
				</div>
				
			</div>
		</div>
		<div class="col-md-6">
			<div class="pull-right">
				<a href="video_section/edit/<?php echo $parent_id ?>" class="btn btn-inna btn-outlined mr5">CLOSE</a>
				<a href="" class="btn btn-inna js-send">SAVE</a>
			</div>
		</div>
		<div class="col-md-12 mt25">
            <div class="row">
                
                <div class="col-md-9">
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
                                <div class="col-md-3 text-left">
                                    <div class="form-group">
                                        <label>Icon <sup>480x112</sup></label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "thumb[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["thumb"][$lang_key]) ? $row["thumb"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                             ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title[<?php echo $lang_key ?>]" value="<?php echo (set_value('title'))?set_value('title'):(isset($row["title"][$lang_key]) ? $row["title"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('title')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('title'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control" type="text" name="description[<?php echo $lang_key ?>]" value="<?php echo (set_value('description'))?set_value('description'):(isset($row["description"][$lang_key]) ? $row["description"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('description')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('description'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input class="form-control" type="text" name="link[<?php echo $lang_key ?>]" value="<?php echo (set_value('link'))?set_value('link'):(isset($row["link"][$lang_key]) ? $row["link"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('link')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('link'); ?></label>
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