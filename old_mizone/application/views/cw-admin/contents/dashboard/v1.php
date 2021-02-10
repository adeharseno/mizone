<div class="row">
<div class="hidden">
	<input type="text" name="href_orderby" value="<?php echo $class_name ?>/order">
</div>
	<!-- <a href="dashboard/export" class="paginate-button">EXPORT (.xlsx)</a> -->
	<div class="col-md-8">
		<div class="box-desc">
			<div class="item">
				<div class="desc-table"><span class="count"><?php echo count($messages) ?></span> Messages<span class="s"><?php //echo count($table) == 1 ? "" : "" ?></span></div>
			</div>
		</div>

	</div>
	<!-- <div class="row">
		<div class="col-md-6 mt20">
			<label>From</label>
			<input type="date" id="min" class="form-control"/>
		</div>
		<div class="col-md-6 mt20">
			<label>To</label>
			<input type="date" id="max" class="form-control"/>
		</div>
	</div> -->
	<div class="col-md-6">
	    <span id="date-label-from" class="date-label">From: </span><input type="date" id="datepicker_from"  class="form-control"/>
	    <span id="date-label-to" class="date-label">To: <input type="date" id="datepicker_to" class="form-control" />
	</div>
	<div class="col-md-12 mt20">
		<table class="table display" id="datatable">
			<thead>
				<tr>
					<td class="text-center">#</td>
					<td>Date</td>
					<td>Name</td>
					<td>Email</td>
					<td>Company</td>
					<td>Phone</td>
					<td>Topic</td>
					<td>Location</td>
					<td>Message</td>
					
				</tr>
			</thead>
			<tbody>
			<?php $i = 1 ?>
			
			<?php foreach ($messages as $key => $value): ?>
				<tr class="js-click-checkbox">
					<td class="reorder"><?php echo $i ?></td>
                    <td><?php echo date_format(date_create($value->created_at),"m/j/Y"); ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo $value->company_name; ?></td>
                    <td><?php echo $value->phone_number; ?></td>
                    <td><?php echo $value->topic; ?></td>
                    <td><?php echo $value->subject; ?></td>
                    <td><?php echo $value->message; ?></td>
				</tr>
				<?php $i++ ?>
			<?php endforeach ?>	
			</tbody>
		</table>
	</div>
</div>
