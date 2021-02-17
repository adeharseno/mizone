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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Product</label>
                        <select class="select2 form-control" name="product_id[]" data-value="<?php echo $row["product_id"] ?>" multiple>
                            <option></option>
                            <?php foreach ($products as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Category</label>
                        <select class="select2 form-control" name="recipes_sub_category_id" data-value="<?php echo $row["recipes_sub_category_id"] ?>">
                            <option></option>
                            <?php foreach ($recipes_sub_category as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Festive</label>
                        <select class="select2 form-control" name="festive_id" data-value="<?php echo $row["festive_id"] ?>">
                            <option></option>
                            <?php foreach ($recipes_festival as $key => $value): ?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value["title"] ?></option>
                            <?php endforeach ?>
                        </select>
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
                                        <label>Image</label>
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
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" type="text" name="title[<?php echo $lang_key ?>]" value="<?php echo (set_value('title['.$lang_key.']'))?set_value('title['.$lang_key.']'):(isset($row["title"][$lang_key]) ? $row["title"][$lang_key] : "") ?>">
                                            <?php if (form_error('title['.$lang_key.']')): ?>
                                                <label class="error"><?php echo form_error('title['.$lang_key.']'); ?></label>
                                            <?php endif ?>
                                        </div>
					<div class="form-group">
                                            <label>Content</label>
                                            <textarea class="form-control" rows="10" name="content[<?php echo $lang_key ?>]"><?php echo (set_value('content['.$lang_key.']'))?set_value('content['.$lang_key.']'):(isset($row["content"][$lang_key]) ? $row["content"][$lang_key] : "") ?></textarea>  
                                            <?php if (form_error('content['.$lang_key.']')): ?>
                                                <label class="error"><?php echo form_error('content['.$lang_key.']'); ?></label>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <HR>
                                    <div class="col-md-12 mt25 <?php echo ($id) ? "" : "hidden" ?>">
                                        <?php 
                                            $where = null;
                                            $where["flag != 99"] = null;
                                            $where["recipes_id"] = $id;
                                            $table = $this->db->select("*")
                                                                ->from("ingredients")
                                                                ->where($where)
                                                                ->order_by("order_by")
                                                                ->get()
                                                                ->result_array();
                                            
                                            $table = each_json_decode($table, language());

                                         ?>
                                        <div class="row">
                                            <div class="hidden">
                                                <input type="text" name="href_orderby" value="ingredients/order">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="box-desc">
                                                    <div class="item">
                                                        <div class="desc-table"><span class="count"><?php echo count($table) ?></span> Ingredients</div>
                                                    </div>
                                                    <div class="item">
                                                        <ul class="menu-checked hidden">
                                                            <li><a href="" class="js-action-table" find="js-table" url="ingredients/active"><i class="ti-check" data-toggle="tooltip" data-placement="top" title="" data-original-title="Active" ></i></a></li>
                                                            <li><a href="" class="js-action-table" find="js-table" url="ingredients/blocked"><i class="ti-na" data-toggle="tooltip" data-placement="top" title="" data-original-title="Not Active" ></i></a></li>
                                                            <li><a href="javascript:;" class="js-click-modal-delete" url="ingredients/delete"><i class="ti-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="item">
                                                        <div class="box-search">
                                                            <div class="item icon-search"><i class="ti-search"></i></div>
                                                            <div class="item input-search"><input type="text" name="" class="form-control js-search-table"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="pull-right">
                                                    <a  class="btn btn-primary btn-inna" href="ingredients/edit/<?php echo $id ?>">ADD INGREDIENT</a>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt20">
                                                <table class="table responsive-data-table table-hover js-table" reorder="true">
                                                    <thead>
                                                        <tr>
                                                            <td class="text-center">#</td>
                                                            <td width="25px">
                                                                <div class="checkbox">
                                                                    <label class="i-checks">
                                                                        <input value="" type="checkbox" name="checked_all" >
                                                                        <i></i>
                                                                    </label>
                                                                </div>
                                                            </td>
							    <td>Action</td>
                                                            <td>Ingredient</td>
                                                            <td>Measurement</td>
                                                            
                                                            <td class="text-center">Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1 ?>
                                                    <?php if ($table): ?>
                                                        
                                                        
                                                        <?php foreach ($table as $key => $value): ?>
                                                            <tr class="js-click-checkbox" id="<?php echo $value["id"] ?>">
                                                                <td class="reorder"><?php echo $i ?><input type="hidden" name="order_by" value="<?php echo $i ?>"></td>
                                                                <td>
                                                                    <div class="checkbox">
                                                                        <label class="i-checks">
                                                                            <input value="<?php echo $value["id"] ?>" type="checkbox" name="checked_tr">
                                                                            <i></i>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                               <td>
                                                                    <a class="btn btn-default btn-sm" href="ingredients/edit/<?php echo $id ?>/<?php echo $value["id"] ?>" >Edit</a>
                                                                </td>
							         <td>
                                                                    <div class="user">
                                                                        
                                                                        <div class="item desc">
                                                                            <b><?php echo $value["title"];  ?></b>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="user">
                                                                        
                                                                        <div class="item desc">
                                                                            <a href="ingredients/edit/<?php echo $id ?>/<?php echo $value["id"] ?>" ><b><?php echo $value["measurement"];  ?></b></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php 
                                                                        switch ($value["flag"]) {
                                                                            case 0:
                                                                                $color = "green";
                                                                                $copy = "Active";
                                                                                break;
                                                                            case 1:
                                                                                $color = "red";
                                                                                $copy = "Not Active";
                                                                                break;
                                                                            default:
                                                                                $color = "blue";
                                                                                $copy = "Link";
                                                                                break;
                                                                        }
                                                                     ?>
                                                                    <a  href="ingredients/action/<?php echo ($value["flag"]  == 0) ? "blocked" : "active" ?>/<?php echo $value["id"] ?>" class="bullet <?php echo $color ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $copy ?>"></a>
                                                                    <span class="hidden"><?php echo $copy ?></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <?php $i++ ?>
                                                        <?php endforeach ?> 
                                                    <?php endif ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <HR>
                                    <div class="col-md-12 mt25 <?php echo ($id) ? "" : "hidden" ?>">
                                        <?php 
                                            $where = null;
                                            $where["flag != 99"] = null;
                                            $where["recipes_id"] = $id;
                                            $table = $this->db->select("*")
                                                                ->from("preparations")
                                                                ->where($where)
                                                                ->order_by("order_by")
                                                                ->get()
                                                                ->result_array();
                                            
                                            $table = each_json_decode($table, language());

                                         ?>
                                        <div class="row">
                                            <div class="hidden">
                                                <input type="text" name="href_orderby" value="preparations/order">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="box-desc">
                                                    <div class="item">
                                                        <div class="desc-table"><span class="count"><?php echo count($table) ?></span> Preparations</div>
                                                    </div>
                                                    <div class="item">
                                                        <ul class="menu-checked hidden">
                                                            <li><a href="" class="js-action-table" find="js-table" url="preparations/active"><i class="ti-check" data-toggle="tooltip" data-placement="top" title="" data-original-title="Active" ></i></a></li>
                                                            <li><a href="" class="js-action-table" find="js-table" url="preparations/blocked"><i class="ti-na" data-toggle="tooltip" data-placement="top" title="" data-original-title="Not Active" ></i></a></li>
                                                            <li><a href="javascript:;" class="js-click-modal-delete" url="preparations/delete"><i class="ti-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="item">
                                                        <div class="box-search">
                                                            <div class="item icon-search"><i class="ti-search"></i></div>
                                                            <div class="item input-search"><input type="text" name="" class="form-control js-search-table"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="pull-right">
                                                    <a  class="btn btn-primary btn-inna" href="preparations/edit/<?php echo $id ?>">ADD PREPARATION</a>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt20">
                                                <table class="table responsive-data-table table-hover js-table" reorder="true">
                                                    <thead>
                                                        <tr>
                                                            <td class="text-center">#</td>
                                                            <td width="25px">
                                                                <div class="checkbox">
                                                                    <label class="i-checks">
                                                                        <input value="" type="checkbox" name="checked_all" >
                                                                        <i></i>
                                                                    </label>
                                                                </div>
                                                            </td>
							    <td>Action</td>
                                                            <td>Step</td>
                                                            
                                                            <td class="text-center">Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1 ?>
                                                    <?php if ($table): ?>
                                                        
                                                        
                                                        <?php foreach ($table as $key => $value): ?>
                                                            <tr class="js-click-checkbox" id="<?php echo $value["id"] ?>">
                                                                <td class="reorder"><?php echo $i ?><input type="hidden" name="order_by" value="<?php echo $i ?>"></td>
                                                                <td>
                                                                    <div class="checkbox">
                                                                        <label class="i-checks">
                                                                            <input value="<?php echo $value["id"] ?>" type="checkbox" name="checked_tr">
                                                                            <i></i>
                                                                        </label>
                                                                    </div>
                                                                </td>
								<td>
                                                                    <a class="btn btn-default btn-sm" href="preparations/edit/<?php echo $id ?>/<?php echo $value["id"] ?>" >Edit</a>
                                                                </td>
                                                                <td>
                                                                    <div class="user">
                                                                        
                                                                        <div class="item desc">
                                                                           <b><?php echo $value["title"];  ?></b>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td class="text-center">
                                                                    <?php 
                                                                        switch ($value["flag"]) {
                                                                            case 0:
                                                                                $color = "green";
                                                                                $copy = "Active";
                                                                                break;
                                                                            case 1:
                                                                                $color = "red";
                                                                                $copy = "Not Active";
                                                                                break;
                                                                            default:
                                                                                $color = "blue";
                                                                                $copy = "Link";
                                                                                break;
                                                                        }
                                                                     ?>
                                                                    <a  href="preparations/action/<?php echo ($value["flag"]  == 0) ? "blocked" : "active" ?>/<?php echo $value["id"] ?>" class="bullet <?php echo $color ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $copy ?>"></a>
                                                                    <span class="hidden"><?php echo $copy ?></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <?php $i++ ?>
                                                        <?php endforeach ?> 
                                                    <?php endif ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
