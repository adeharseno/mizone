<div class="row">
	<form class="form" role="form" action="<?php echo $class_name ?>/edit<?php echo (!empty($id)) ? '/'.$id : '' ?>" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
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
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Target URL</label>
                                        <input class="form-control" type="text" name="target_url[<?php echo $lang_key ?>]" value="<?php echo (set_value('target_url'))?set_value('target_url'):(isset($row["target_url"][$lang_key]) ? $row["target_url"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('target_url')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('target_url'); ?></label>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Content [desktop] <sup>min height: 1080, min width: 1920, max: 2025x943</sup></label>
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
                            </div>
                            <div class="row">
                                <div class="col-md-4">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Content [mobile] <sup>831x771</sup></label>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Text [mobile] <sup>573x409</sup></label>
                                        <div class="form-group">
                                            <?php
                                                $data = null;
                                                $data["input"] = "text_m[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["text_m"][$lang_key]) ? $row["text_m"][$lang_key] : null;
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Video Title</label>
                                        <input class="form-control" type="text" name="video_title[<?php echo $lang_key ?>]" value="<?php echo (set_value('video_title'))?set_value('video_title'):(isset($row["video_title"][$lang_key]) ? $row["video_title"][$lang_key] : "") ?>">
                                        <?php if (\Config\Services::validation()->getError('video_title')): ?>
                                            <label class="error"><?php echo \Config\Services::validation()->getError('video_title'); ?></label>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Video URL</label>
                                            <input class="form-control" type="text" name="video_url[<?php echo $lang_key ?>]" value="<?php echo (set_value('video_url'))?set_value('video_url'):(isset($row["video_url"][$lang_key]) ? $row["video_url"][$lang_key] : "") ?>">
                                            <?php if (\Config\Services::validation()->getError('video_url')): ?>
                                                <label class="error"><?php echo \Config\Services::validation()->getError('video_url'); ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label>OR From Gallery</label>
                                            <?php 
                                                $data = null;
                                                $data["input"] = "video[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["video"][$lang_key]) ? $row["video"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Video Thumbnail<sup>400x250</sup></label>
                                        <div class="form-group video-thumb">
                                            <?php 
                                                $data = null;
                                                $data["input"] = "video_thumb[".$lang_key."]";
                                                $data["id_image_path"] = isset ($row["video_thumb"][$lang_key]) ? $row["video_thumb"][$lang_key] : null;
                                                $image_path = image_get($data["id_image_path"]);
                                                $data["path"] = $image_path["path"];
                                                $data["image_name"] = $image_path["name"];
                                                echo view(PATH_CW . 'components/image-select', $data);
                                                ?>
                                        </div>
                                    </div>
                                    <?php if( !empty($row["video"][$lang_key]) || !empty($row["video_url"][$lang_key]) ):?>
                                    <div class="form-group video-preview">
                                        <label>Video Preview</label>
                                        <?php if( !empty($row["video_url"][$lang_key]) ): ?>
                                            <!-- This is for video youtube embed -->
                                            <video id="myVideo" class="video-js vjs-fluid" controls width="300" height="150"
                                            data-setup='{"techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php echo $row["video_url"][$lang_key]; ?>"}], "youtube": { "iv_load_policy": 1 }}'>
                                            </video>
                                        <?php else: ?>
                                            <!-- This is for video file upload -->
                                            <video id="myVideo" class="video-js vjs-fluid" controls width="300" height="150"
                                            data-setup='{"sources": [{ "type": "video/mp4", "src": "<?php echo base_url( image_get_src($row["video"][$lang_key]) ); ?>"}]}'>
                                            </video>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
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