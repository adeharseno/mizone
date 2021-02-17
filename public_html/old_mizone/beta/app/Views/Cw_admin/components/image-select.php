<div class="box-image-select" style="height: <?php echo isset($height) ? $height : "200px"; ?>;" >
    <div class="thumbnail-default">
        <img src="assets/custom/images/file_manager/image.png">
    </div>
    <div class="image-select">
        <div class="box-action">
            <a href="javascript:;" class="js-trash"><i class="ti-trash"></i></a>
        </div>
        
        <?php $explode = explode(".", $image_name);
        $ext = '.'.end($explode);
        if( $ext == '.mp4' || $ext == '.mov' ): ?>
            <img src="<?php echo base_url('Cw_admin/assets/custom/images/file_manager/video.png') ?>" class="src-image-select <?php echo isset($object_fit) && $object_fit ? "object_fit" : "" ?>" mainfolder="../storage/">
        <?php else: ?>
            <img src="<?php echo (isset($image_name) AND !empty($image_name)) ?  "../storage/" . $path . $image_name : "" ?>" class="src-image-select <?php echo isset($object_fit) && $object_fit ? "object_fit" : "" ?>" mainfolder="../storage/">
        <?php endif; ?>
        <div class="hidden">
            <input type="text" value="<?php echo $id_image_path ?>" name="<?php echo $input ?>[id]" class="input-id">
            <input type="text" value="<?php echo $path ?>" name="<?php echo $input ?>[path]" class="input-path">
            <input type="text" value="<?php echo $image_name ?>" name="<?php echo $input ?>[name]" class="input-name">
        </div>
    </div>
</div>