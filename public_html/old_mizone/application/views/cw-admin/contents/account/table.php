<div class="row">

	<div class="col-md-8">
		<div class="box-desc">
			<div class="item">
				<div class="desc-table"><span class="count"><?php echo count($table) ?></span> <?php echo ucfirst($class_name)  ?><span class="s"><?php echo count($table) == 1 ? "" : "s" ?></span></div>
			</div>
			<div class="item">
				<ul class="menu-checked hidden">
					<li><a href="" class="js-action-table" find="js-table" url="<?php echo $class_name ?>/active"><i class="ti-check" data-toggle="tooltip" data-placement="top" title="" data-original-title="Active" ></i></a></li>
					<li><a href="" class="js-action-table" find="js-table" url="<?php echo $class_name ?>/blocked"><i class="ti-na" data-toggle="tooltip" data-placement="top" title="" data-original-title="Blocked" ></i></a></li>
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
			<a href="<?php echo strtolower($class_name)  ?>/edit" class="btn btn-primary btn-inna">ADD <?php echo strtoupper($class_name)  ?></a>
		</div>
	</div>
	<div class="col-md-12 mt20">
		<table class="table responsive-data-table table-hover js-table">
			<thead>
				<tr>
					<td width="25px">
						<div class="checkbox">
	                        <label class="i-checks">
	                            <input value="" type="checkbox" name="checked_all" >
	                            <i></i>
	                        </label>
	                    </div>
					</td>
					<td>User</td>
					<td>Email</td>
					<td class="text-center">Status</td>
					<td>Roles</td>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1 ?>
			
			<?php foreach ($table as $key => $value): ?>
				<tr class="js-click-checkbox">
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
							<div class="item avatar"><?php echo strtoupper(substr($value["full_name"], 0, 1))   ?></div>
							<div class="item desc">
								<a href="account/edit/<?php echo  $value["id"] ?>"><b><?php echo $value["full_name"] ?></b></a><br><?php echo $value["username"] ?>
							</div>
						</div>
					</td>
					<td><?php echo $value["email"] ?></td>
					<td class="text-center"><a href="<?php echo $class_name ?>/action/<?php echo ($value["flag"]  == 0) ? "blocked" : "active" ?>/<?php echo $value["id"] ?>" class="bullet <?php echo ($value["flag"]  == 0) ? "green" : "red" ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo ($value["flag"] == 0) ? "Active" : "Blocked" ?>"></a><span class="hidden"><?php echo ($value["flag"] == 0) ? "Active" : "Blocked" ?></span></td>
					<td><?php echo ($value["role"]  == 0) ? "Superadmin" : "Admin" ?></td>
				</tr>
				<?php $i++ ?>
			<?php endforeach ?>	
			</tbody>
		</table>
	</div>
</div>
