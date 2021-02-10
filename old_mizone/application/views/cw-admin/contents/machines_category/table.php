<div class="row">
<div class="hidden">
	<input type="text" name="href_orderby" value="<?php echo $class_name ?>/order">
</div>
	<div class="col-md-8">
		<div class="box-desc">
			<div class="item">
				<div class="desc-table"><span class="count"><?php echo count($table) ?></span> <?php echo ucfirst( str_replace("_", " ", $class_name) )  ?><span class="s"><?php echo count($table) == 1 ? "" : "" ?></span></div>
			</div>
			<div class="item">
				<ul class="menu-checked hidden">
					<li><a href="" class="js-action-table" find="js-table" url="<?php echo $class_name ?>/active"><i class="ti-check" data-toggle="tooltip" data-placement="top" title="" data-original-title="Active" ></i></a></li>
					<li><a href="" class="js-action-table" find="js-table" url="<?php echo $class_name ?>/blocked"><i class="ti-na" data-toggle="tooltip" data-placement="top" title="" data-original-title="Not Active" ></i></a></li>
					<li><a href="" data-toggle="modal" data-target=".js-modal-delete"><i class="ti-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ></i></a></li>
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
			<a href="<?php echo strtolower($class_name)  ?>/edit" class="btn btn-primary btn-inna">ADD <?php echo strtoupper( str_replace("_", " ", $class_name) )  ?></a>
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
					<td class="text-center">Color</td>
					<td class="text-center">Status</td>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1 ?>
			
			<?php foreach ($table as $key => $value): ?>
				<?php $value = json_decode_table($value, default_language()); ?>
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
								<a href="<?php echo $class_name ?>/edit/<?php echo  $value["id"] ?>"><b><?php echo $value["title"] ?></b></a>
							</div>
						</div>
					</td>
					<td class="text-center">						
						<a href="javascript:;" class="bullet " style="background-color: <?php echo $value["color"] ?>;border-radius: 0px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $value["color"] ?>"></a>
						<span class="hidden"><?php echo $value["color"] ?></span>
					</td>
					<td class="text-center">
						<?php
							switch ( $value["flag"] ) {
								case 0:
									$color = "green";
									$copy = "Active";
									break;
								case 1:
									$color = "red";
									$copy = "Not Active";
									break;
								case 1:
									$color = "blue";
									$copy = "Link";
									break;
								default:
									$color = "blue";
									$copy = "Link";
									break;
							}
						?>
						<a  href="<?php echo $class_name ?>/action/<?php echo ($value["flag"]  == 0) ? "blocked" : "active" ?>/<?php echo $value["id"] ?>" class="bullet <?php echo $color ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $copy ?>"></a>
						<span class="hidden"><?php echo $copy ?></span>
					</td>
				</tr>
				<?php $i++ ?>
			<?php endforeach ?>	
			</tbody>
		</table>
	</div>
</div>
