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
                        <label >Sub Category</label>
                        <select class="select2 form-control" name="products_sub_category_id[]" data-value="<?php echo $row["products_sub_category_id"] ?>" multiple>
                            <option value=""></option>
                            <?php foreach ($products_sub_category as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Video Section</label>
                        <select class="select2 form-control" name="video_section_id" data-value="<?php echo $row["video_section_id"] ?>">
                            <option></option>
                            <?php foreach ($video_section as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Related</label>
                        <select class="select2 form-control" name="related_id[]" data-value="<?php echo $row["related_id"] ?>" multiple>
                            <option value=""></option>
                            <?php foreach ($machines as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Recipe</label>
                        <select class="select2 form-control" name="recipe_id[]" data-value="<?php echo $row["recipe_id"] ?>" multiple>
                            <option value=""></option>
                            <?php foreach ($recipe as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Brands</label>
                        <select class="select2 form-control" name="brand_id" data-value="<?php echo $row["brand_id"] ?>">
                            <option value=""></option>
                            <?php foreach ($brands as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Color</label>
                        <div id="cp2" class="input-group colorpicker-component">
                            <input type="text" value="<?php echo (set_value('color'))?set_value('color'):(($row["color"]) ? $row["color"] : "#edb900") ?>" class="form-control" name="color">
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Background <sup>500x584</sup></label>
                        <div class="form-group">
                            <?php 
                                $data = null;
                                $data["input"] = "bg";
                                $data["id_image_path"] = isset ($row["bg"]) ? $row["bg"] : null;
                                $image_path = $this->image_path->get($data["id_image_path"]);
                                $data["path"] = $image_path["path"];
                                $data["image_name"] = $image_path["name"];
                                echo $this->load->view(PATH_CW . 'components/image-select', $data, TRUE);
                             ?>
                        </div>
                    </div>
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
                                                $data["input"] = "icon[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["icon"][$lang_key]) ? $row["icon"][$lang_key] : null;
                                                $image_path = $this->image_path->get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo $this->load->view(PATH_CW . 'components/image-select', $data, TRUE);
                                             ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9"> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Image <sup>370x615</sup></label>
                                                <div class="form-group">
                                                    <?php 
                                                        $data = null;
                                                        $data["input"] = "image[".$lang_key."]";
                                                        $data["id_image_path"] = isset ($row["image"][$lang_key]) ? $row["image"][$lang_key] : null;
                                                        $image_path = $this->image_path->get($data["id_image_path"]);
                                                        $data["path"] = $image_path["path"];
                                                        $data["image_name"] = $image_path["name"];
                                                        echo $this->load->view(PATH_CW . 'components/image-select', $data, TRUE);
                                                     ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Image <sup>370x615</sup></label>
                                                <div class="form-group">
                                                    <?php 
                                                        $data = null;
                                                        $data["input"] = "image_2[".$lang_key."]";
                                                        $data["id_image_path"] = isset ($row["image_2"][$lang_key]) ? $row["image_2"][$lang_key] : null;
                                                        $image_path = $this->image_path->get($data["id_image_path"]);
                                                        $data["path"] = $image_path["path"];
                                                        $data["image_name"] = $image_path["name"];
                                                        echo $this->load->view(PATH_CW . 'components/image-select', $data, TRUE);
                                                     ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 hidden">
                                            <div class="form-group">
                                                <label>Product Information <sup>175x68</sup></label>
                                                <div class="form-group">
                                                    <?php 
                                                        $data = null;
                                                        $data["input"] = "product_information[".$lang_key."]";
                                                        $data["id_image_path"] = isset ($row["product_information"][$lang_key]) ? $row["product_information"][$lang_key] : null;
                                                        $image_path = $this->image_path->get($data["id_image_path"]);
                                                        $data["path"] = $image_path["path"];
                                                        $data["image_name"] = $image_path["name"];
                                                        echo $this->load->view(PATH_CW . 'components/image-select', $data, TRUE);
                                                     ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title[<?php echo $lang_key ?>]" value="<?php echo (set_value('title['.$lang_key.']'))?set_value('title['.$lang_key.']'):(isset($row["title"][$lang_key]) ? $row["title"][$lang_key] : "") ?>">
                                        <?php if (form_error('title['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('title['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Desc</label>
                                        <input class="form-control" type="text" name="desc[<?php echo $lang_key ?>]" value="<?php echo (set_value('desc['.$lang_key.']'))?set_value('desc['.$lang_key.']'):(isset($row["desc"][$lang_key]) ? $row["desc"][$lang_key] : "") ?>">
                                        <?php if (form_error('desc['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('desc['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Excerpt</label>
                                        <textarea class="form-control tinymce" rows="10" name="excerpt[<?php echo $lang_key ?>]"><?php echo (set_value('excerpt['.$lang_key.']'))?set_value('excerpt['.$lang_key.']'):(isset($row["excerpt"][$lang_key]) ? $row["excerpt"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('excerpt['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('excerpt['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control tinymce" rows="10" name="content[<?php echo $lang_key ?>]"><?php echo (set_value('content['.$lang_key.']'))?set_value('content['.$lang_key.']'):(isset($row["content"][$lang_key]) ? $row["content"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('content['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('content['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Information</label>
                                        <textarea class="form-control tinymce" rows="10" name="product_information_text[<?php echo $lang_key ?>]"><?php echo (set_value('product_information_text['.$lang_key.']'))?set_value('product_information_text['.$lang_key.']'):(isset($row["product_information_text"][$lang_key]) ? $row["product_information_text"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('product_information_text['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('product_information_text['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group hidden">
                                        <label>Nutrition Information</label>
                                        <textarea class="form-control tinymce" rows="10" name="nutrition_information[<?php echo $lang_key ?>]"><?php echo (set_value('nutrition_information['.$lang_key.']'))?set_value('nutrition_information['.$lang_key.']'):(isset($row["nutrition_information"][$lang_key]) ? $row["nutrition_information"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('nutrition_information['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('nutrition_information['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>PREPARATION & YIELD</label>
                                        <textarea class="form-control tinymce" rows="10" name="ingredients[<?php echo $lang_key ?>]"><?php echo (set_value('ingredients['.$lang_key.']'))?set_value('ingredients['.$lang_key.']'):(isset($row["ingredients"][$lang_key]) ? $row["ingredients"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('ingredients['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('ingredients['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>PRODUCT INFORMATION & BENEFITS</label>
                                        <textarea class="form-control tinymce" rows="10" name="product_details[<?php echo $lang_key ?>]"><?php echo (set_value('product_details['.$lang_key.']'))?set_value('product_details['.$lang_key.']'):(isset($row["product_details"][$lang_key]) ? $row["product_details"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('product_details['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('product_details['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>PACKAGING & STORAGE</label>
                                        <textarea class="form-control tinymce" rows="10" name="packaging_information[<?php echo $lang_key ?>]"><?php echo (set_value('packaging_information['.$lang_key.']'))?set_value('packaging_information['.$lang_key.']'):(isset($row["packaging_information"][$lang_key]) ? $row["packaging_information"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('packaging_information['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('packaging_information['.$lang_key.']'); ?></label>
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