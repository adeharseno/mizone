<div class="row">
	<form class="form" role="form" action="<?php echo $class_name ?>/edit/<?php echo $id ?>" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
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
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title[<?php echo $lang_key ?>]" value="<?php echo (set_value('title'))?set_value('title'):(isset($row["title"][$lang_key]) ? $row["title"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('title')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('title'); ?></label>
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
        <div class="col-md-12 mt25 <?php echo ($id) ? "" : "hidden" ?>">
            <?php 
                $where = null;
                $where["flag != 99"] = null;
                $where["video_section_id"] = $id;
                $table = get_sub_video_section($where);
                
                $table = each_json_decode($table, language());

             ?>
            <div class="row">
                <div class="hidden">
                    <input type="text" name="href_orderby" value="video_sub_section/order">
                </div>
                <div class="col-md-8">
                    <div class="box-desc">
                        <div class="item">
                            <div class="desc-table"><span class="count"><?php echo count($table) ?></span> Sub Category</div>
                        </div>
                        <div class="item">
                            <ul class="menu-checked hidden">
                                <li><a href="" class="js-action-table" find="js-table" url="video_sub_section/active"><i class="ti-check" data-toggle="tooltip" data-placement="top" title="" data-original-title="Active" ></i></a></li>
                                <li><a href="" class="js-action-table" find="js-table" url="video_sub_section/blocked"><i class="ti-na" data-toggle="tooltip" data-placement="top" title="" data-original-title="Not Active" ></i></a></li>
                                <li><a href="javascript:;" class="js-click-modal-delete" url="video_sub_section/delete"><i class="ti-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ></i></a></li>
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
                        <a  class="btn btn-primary btn-inna" href="video_sub_section/edit/<?php echo $id ?>">ADD VIDEO LINK</a>
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
                                <td>Name</td>
                                
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
                                        <div class="user">
                                            
                                            <div class="item desc">
                                                <a href="video_sub_section/edit/<?php echo $id ?>/<?php echo $value["id"] ?>" ><b><?php echo $value["title"];  ?></b></a>
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
                                        <a  href="video_sub_section/action/<?php echo ($value["flag"]  == 0) ? "blocked" : "active" ?>/<?php echo $value["id"] ?>" class="bullet <?php echo $color ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $copy ?>"></a>
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
	</form>
</div>