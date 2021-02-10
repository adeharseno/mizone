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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Background [desktop] <sup>1920x1080</sup></label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "bg_d[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["bg_d"][$lang_key]) ? $row["bg_d"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Content [desktop] <sup>1920x1080</sup></label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "content_d[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["content_d"][$lang_key]) ? $row["content_d"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Varian</label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "varian[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["varian"][$lang_key]) ? $row["varian"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Navigation</label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "nav[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["nav"][$lang_key]) ? $row["nav"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Navigation BG</label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "nav_bg[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["nav_bg"][$lang_key]) ? $row["nav_bg"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Background [mobile] <sup>834x1194</sup></label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "bg_m[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["bg_m"][$lang_key]) ? $row["bg_m"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Content [mobile] </label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "content_m[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["content_m"][$lang_key]) ? $row["content_m"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Bottle </label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "bottle[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["bottle"][$lang_key]) ? $row["bottle"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Menu</label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "menu[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["menu"][$lang_key]) ? $row["menu"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Menu Hover</label>
                                        <div class="form-group">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "menu_hover[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["menu_hover"][$lang_key]) ? $row["menu_hover"][$lang_key] : null;
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
                                <input class="form-control" type="text" name="title[<?php echo $lang_key ?>]" value="<?php echo (set_value('title['.$lang_key.']'))?set_value('title['.$lang_key.']'):(isset($row["title"][$lang_key]) ? $row["title"][$lang_key] : "") ?>">
                                <?php if (\Config\Services::validation()->getError('title['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('title['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Sub-Title</label>
                                <input class="form-control" type="text" name="subtitle[<?php echo $lang_key ?>]" value="<?php echo (set_value('subtitle['.$lang_key.']'))?set_value('subtitle['.$lang_key.']'):(isset($row["subtitle"][$lang_key]) ? $row["subtitle"][$lang_key] : "") ?>">
                                <?php if (\Config\Services::validation()->getError('subtitle['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('subtitle['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control tinymce" rows="10" name="content[<?php echo $lang_key ?>]"><?php echo (set_value('content['.$lang_key.']'))?set_value('content['.$lang_key.']'):(isset($row["content"][$lang_key]) ? $row["content"][$lang_key] : "") ?></textarea>  
                                <?php if (\Config\Services::validation()->getError('content['.$lang_key.']')): ?>
                                    <label class="error"><?php echo \Config\Services::validation()->getError('content['.$lang_key.']'); ?></label>
                                <?php endif ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Text Sabi</label>
                                        <input class="form-control" type="text" name="sabi[<?php echo $lang_key ?>]" value="<?php echo (set_value('sabi['.$lang_key.']'))?set_value('sabi['.$lang_key.']'):(isset($row["sabi"][$lang_key]) ? $row["sabi"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('sabi['.$lang_key.']')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('sabi['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Text</label>
                                        <input class="form-control" type="text" name="sabi_next[<?php echo $lang_key ?>]" value="<?php echo (set_value('sabi_next['.$lang_key.']'))?set_value('sabi_next['.$lang_key.']'):(isset($row["sabi_next"][$lang_key]) ? $row["sabi_next"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('sabi_next['.$lang_key.']')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('sabi_next['.$lang_key.']'); ?></label>
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