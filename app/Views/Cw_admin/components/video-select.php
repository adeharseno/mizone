<div class="box-image-select" style="height: <?php echo isset($height) ? $height : "200px"; ?>;" >
    <div class="thumbnail-default">
        <img src="assets/custom/images/file_manager/image.png">
    </div>
    <div class="image-select">
        <div class="box-action">
            <a href="javascript:;" class="js-trash"><i class="ti-trash"></i></a>
        </div>
        
        <video id="myVideo" class="video-js vjs-fluid" controls preload="auto" width="250" height="200" poster="<?php echo image_get_src($value["video_thumb"]) ?>" data-setup="{}">
            <source src="<?php echo (isset($image_name) AND !empty($image_name)) ?  "../storage/" . $path . $image_name : "" ?>" type="video/mp4" />
        </video>
        <div class="hidden">
            <input type="text" value="<?php echo $id_image_path ?>" name="<?php echo $input ?>[id]" class="input-id">
            <input type="text" value="<?php echo $path ?>" name="<?php echo $input ?>[path]" class="input-path">
            <input type="text" value="<?php echo $image_name ?>" name="<?php echo $input ?>[name]" class="input-name">
        </div>
    </div>
</div>