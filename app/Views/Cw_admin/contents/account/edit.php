<div class="row">
	<form class="form-horizontal " role="form" action="<?php echo $class_name ?>/edit<?php echo (!empty($row["id"])) ? '/'.$row["id"] : '' ?>" method="post" autocomplete="off" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="box-desc">
				<div class="item">
					<div class="desc-table"><?php echo $title_for ?> Account</div>
				</div>
				
			</div>
		</div>
		<div class="col-md-6">
			<div class="pull-right">
				<a href="<?php echo $class_name ?>" class="btn btn-inna btn-outlined mr5">CLOSE</a>
				<a href="" class="btn btn-inna js-send">SAVE</a>
			</div>
		</div>
		<div class="col-md-12 mt25"></div>
        <div class=" col-md-3 text-left">
            <div class="box-avatar">
                <div class="avatar">
                    <b>?</b>
                </div>
                <div class="box-copy">
                    <div class="full-name"></div>
                    <a class="email"></a>
                </div>
            </div>  
        </div>
		<div class="col-md-6">
			<div class="form-group">
                <label class="col-lg-3 col-sm-3 control-label text-left">Username</label>
                <div class="col-lg-9">
                    <input class="form-control" type="text" name="username" value="<?php echo (set_value('username'))?set_value('username'):$row["username"] ?>" required>
                    
                    <?php if (\Config\Services::validation()->getError('username')): ?>
                        <label class="error"><?php echo \Config\Services::validation()->getError('username'); ?></label>
                    <?php endif ?>
                </div>
            </div>
			<div class="form-group">
                <label class="col-lg-3 col-sm-3 control-label text-left">Name</label>
                <div class="col-lg-9">
                    <input class="form-control" type="text" name="full_name" value="<?php echo (set_value('full_name'))?set_value('full_name'):$row["full_name"] ?>" required>
                    <?php if (\Config\Services::validation()->getError('full_name')): ?>
                        <label class="error"><?php echo \Config\Services::validation()->getError('full_name'); ?></label>
                    <?php endif ?>
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 col-sm-3 control-label text-left">Email</label>
                <div class="col-lg-9">
                    <input class="form-control" type="email" name="email" value="<?php echo (set_value('email'))?set_value('email'):$row["email"] ?>" required>
                    <?php if (\Config\Services::validation()->getError('email')): ?>
                        <label class="error"><?php echo \Config\Services::validation()->getError('email'); ?></label>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 col-sm-3 control-label text-left">Password</label>
                <div class="col-lg-9">
                    <input class="form-control" type="password" name="password">
                    <?php if (\Config\Services::validation()->getError('password')): ?>
                        <label class="error"><?php echo \Config\Services::validation()->getError('password'); ?></label>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Status</label>
                <div class="col-lg-8">
                    <?php $flag = (set_value('flag'))?set_value('flag'):$row["flag"] ?>
                    <div class="radio">
                        <label class="i-checks">
                            <input name="flag" value="1" <?php echo ($flag == 1) ? "checked" : "" ?> type="radio">
                            <i></i>
                            Blocked
                        </label>
                    </div>
                    <div class="radio">
                        <label class="i-checks">
                            <input name="flag" value="0" <?php echo ($flag == 0) ? "checked" : "" ?> type="radio">
                            <i></i>
                            Active
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group hidden">
                <label class="col-sm-3 control-label">Roles</label>
                <div class="col-lg-8">
                    <?php $role = (set_value('role'))?set_value('role'):$row["role"] ?>
                    <div class="radio">
                        <label class="i-checks">
                            <input name="role" <?php echo ($role == 0) ? "checked" : "" ?>  value="0"  type="radio">
                            <i></i>
                            Superadmin
                        </label>
                    </div>
                    <div class="radio">
                        <label class="i-checks">
                            <input name="role" <?php echo ($role == 1) ? "checked" : "" ?>  value="1" type="radio">
                            <i></i>
                            Admin
                        </label>
                    </div>

                    

                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 col-sm-3 control-label text-left">Last login</label>
                <label class="col-lg-9 control-label text-left"><?php echo ($row["last_login"]) ? date("d M Y H:i:s",strtotime($row["last_login"])) : "Never" ?></label>
            </div>
            <div class="form-group">
                <label class="col-lg-3 col-sm-3 control-label text-left">Updated since</label>
                <label class="col-lg-9 control-label text-left"><?php echo ($row["updated_at"]) ? date("d M Y H:i:s",strtotime($row["updated_at"])) : ""  ?></label>
            </div>
            <div class="form-group">
                <label class="col-lg-3 col-sm-3 control-label text-left">Registered since</label>
                <label class="col-lg-9 control-label text-left"><?php echo ($row["created_at"]) ? date("d M Y H:i:s",strtotime($row["created_at"])) : ""  ?></label>
            </div>
		</div>
		
	</form>
</div>