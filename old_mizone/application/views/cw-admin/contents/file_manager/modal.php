<div class="modal fade js-modal-filemanager">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-body">
				<div class="row">
					<div class="col-md-7">
						<div class="box-desc">
							<div class="item">
								<div class="desc-table">File Manager</div>
							</div>
							<div class="item">
								<ul class="menu-checked hidden">
									<li><a href="" data-toggle="modal" data-target=".js-modal-delete-folder"><i class="ti-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ></i></a></li>
								</ul>
							</div>
							<div class="item hidden">
								<div class="box-search">
									<div class="item icon-search"><i class="ti-search"></i></div>
									<div class="item input-search"><input type="text" name="" class="form-control js-search-table"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="pull-right">
							<a href="" class="btn btn-primary btn-inna" data-toggle="modal" data-target=".js-modal-add-folder">ADD FOLDER</a>
							<a href="" class="btn btn-primary btn-inna js-click-upload" >UPLOAD</a>
							<div class="hidden">
								<input type="file" name="files"  multiple=""  accept="image/*" for="js-click-upload">

							</div>
						</div>
					</div>
					<div class="col-md-12 mt15">
						<ul class="breadcrumbs">
							<?php 
								$i = 1;
								$bfolder = ""; 
								
								$directories = explode("/", $directory["directory"]);
							?>

							<?php if ($directory["directory"] != ""): ?>
								<li><a href=""  class="js-click-breadcrumbs" dir="<?php echo $directory["back"] ?>"><i class="ti-arrow-left"></i></a></li>
							<?php endif ?>
							<?php foreach ($directories as $key => $value): ?>
								<?php if ($value): ?>
									<?php $end = (count($directories) == $i) ? true : false ?>
									<li class="<?php echo ($end) ? "end" : "" ?>"><a href="" class="js-click-breadcrumbs" dir="<?php echo $bfolder . $value ?>"><?php echo $value ?></a></li>
								<?php endif ?>
								<?php $i++ ?>
								
								<?php $bfolder .=   $value . "/"; ?>	
								
							<?php endforeach ?>
							
						</ul>
					</div>
					<div class="col-md-12 mt15">
						<div class="hidden">
							<div class="bdir"><?php echo $directory["directory"] ?></div>
						</div>
						<div class="box-dir">
							<div class="row">
								<?php if (isset($directory["data"])): ?>
									<?php foreach ($directory["data"] as $key => $value): ?>
										<div class="col-md-2 item">
											<div class="wrap">
												<div class="item-inner <?php echo ($value["type"] == "folder") ? "js-click-folder" : "js-click-file" ?> js-click-file-folder">
													<div class="thumbnail-img <?php echo $value["type"] ?>">
														<?php if ($value["type"] == "folder"): ?>
															<img src="assets/custom/images/file_manager/folder.png">
														<?php else: ?>
															<img src="../<?php echo $directory["path"] ?><?php echo $value["name"] ?>">
														<?php endif ?>
													</div>
													<div class="box-copy">
														<div class="name"><?php echo $value["name"] ?></div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
			    <a href="javascript:;" class="btn btn-inna btn-outlined" data-dismiss="modal">CANCEL </a>
			    <a href="javascript:;" class="btn btn-inna btn-outlined js-select-file" disabled>SELECT</a>
			</div>
        </div>	
    </div>
</div>
<div class="modal fade js-modal-add-folder"  style="display: none;">
    <div class="modal-dialog modal-md" >
        <div class="modal-content">
            <div class="modal-body">
            	<div class="row">
					<div class="col-md-12">
						<div class="box-desc">
							<div class="item">
								<div class="desc-table">Add Folder </div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mt20">
		            	<div class="form-horizontal form-variance">
			                <div class="form-group">
				                <div class="col-lg-12">
				                    <input class="form-control" type="text" name="folder_name" value="" required>
				                </div>
				            </div>
			            </div>
	            	</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inna btn-outlined" data-dismiss="modal">CANCEL </button>
                <button type="button" class="btn btn-inna btn-outlined js-add-folder">OK</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade js-modal-delete-folder"  style="display: none;">
    <div class="modal-dialog modal-sm" >
        <div class="modal-content">
            <div class="modal-body">
                <h4>Delete Files ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inna btn-outlined" data-dismiss="modal">CANCEL</button>
                <button type="button" class="btn btn-inna btn-outlined js-delete-folder">OK</button>
            </div>
        </div>
    </div>
</div>