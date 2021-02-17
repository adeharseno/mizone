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
                        <label >Category</label>
                        <select class="select2 form-control" name="distributors_sub_category_id" data-value="<?php echo $row["distributors_sub_category_id"] ?>">
                            <option></option>
                            <?php foreach ($distributors_sub_category as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
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
                                
                                <div class="col-md-9"> 
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name[<?php echo $lang_key ?>]" value="<?php echo (set_value('name['.$lang_key.']'))?set_value('name['.$lang_key.']'):(isset($row["name"][$lang_key]) ? $row["name"][$lang_key] : "") ?>">
                                        <?php if (form_error('name['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('name['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <textarea class="form-control tinymce" rows="10" name="telephone[<?php echo $lang_key ?>]"><?php echo (set_value('telephone['.$lang_key.']'))?set_value('telephone['.$lang_key.']'):(isset($row["telephone"][$lang_key]) ? $row["telephone"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('telephone['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('telephone['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <textarea class="form-control tinymce" rows="10" name="fax[<?php echo $lang_key ?>]"><?php echo (set_value('fax['.$lang_key.']'))?set_value('fax['.$lang_key.']'):(isset($row["fax"][$lang_key]) ? $row["fax"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('fax['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('fax['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <textarea class="form-control tinymce" rows="10" name="email[<?php echo $lang_key ?>]"><?php echo (set_value('email['.$lang_key.']'))?set_value('email['.$lang_key.']'):(isset($row["email"][$lang_key]) ? $row["email"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('email['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('email['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Area</label>
                                        <textarea class="form-control tinymce" rows="10" name="area[<?php echo $lang_key ?>]"><?php echo (set_value('area['.$lang_key.']'))?set_value('area['.$lang_key.']'):(isset($row["area"][$lang_key]) ? $row["area"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('area['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('area['.$lang_key.']'); ?></label>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control tinymce" rows="10" name="address[<?php echo $lang_key ?>]"><?php echo (set_value('address['.$lang_key.']'))?set_value('address['.$lang_key.']'):(isset($row["address"][$lang_key]) ? $row["address"][$lang_key] : "") ?></textarea>  
                                        <?php if (form_error('address['.$lang_key.']')): ?>
                                            <label class="error"><?php echo form_error('address['.$lang_key.']'); ?></label>
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