<?php
	if ($action == 'edit_work') {
		$work_row = $work_result->first_row();
		$work_id = $work_row->id;
		$company_id = $work_row->company_id;
		$staff_id = $work_row->staff_id;
		$team_name = $work_row->team_name;
		$sub_team_name = $work_row->sub_team_name;
		$from_date = $work_row->from_date;
		$to_date = $work_row->to_date;
		$work_nature = $work_row->work_nature;
		$is_current = $work_row->is_current;
	} else {
		$work_id = 0;
		$company_id = 0;
		$staff_id = '';
		$team_name = '';
		$sub_team_name = '';
		$from_date = 0;
		$to_date = 0;
		$work_nature = 1;
		$is_current = 0;
	}
?>
<?php if ($action == 'edit_work') { ?>
	<input type="hidden" id="work_id" name="work_id" value="<?php echo $work_id; ?>" />
	<input type="hidden" id="from_date_from_db" name="from_date_from_db" value="<?php echo $from_date; ?>" />
	<input type="hidden" id="to_date_from_db" name="to_date_from_db" value="<?php echo $to_date; ?>" />
<?php } ?>
<input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/work.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery.date.js'; ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	var action = $('#action').val();
	if (action == 'edit_work') {
		var from_date = $('#from_date_from_db').val();
		var to_date = $('#to_date_from_db').val();
		if (from_date == '0000-00-00') {
			$('#from_date').date(null, null, null, 'from_year', 'from_month', 'from_day');
		} else {
			var from_year = from_date.substr(0, 4);
			var from_month = from_date.substr(5, 2);
			var from_day = from_date.substr(8, 2);
			$('#from_date').date(from_year, from_month, from_day, 'from_year', 'from_month', 'from_day');
		}
		
		if (to_date == '0000-00-00') {
			$('#to_date').date(null, null, null, 'to_year', 'to_month', 'to_day');
		} else {
			var to_year = to_date.substr(0, 4);
			var to_month = to_date.substr(5, 2);
			var to_day = to_date.substr(8, 2);
			$('#to_date').date(to_year, to_month, to_day, 'to_year', 'to_month', 'to_day');
		}
	} else {
		$('#from_date').date(null, null, null, 'from_year', 'from_month', 'from_day');
		$('#to_date').date(null, null, null, 'to_year', 'to_month', 'to_day');
	}
	

	if ($('#is_current').attr('checked') == 'checked') {
		$('#to_year').attr('disabled', true);
		$('#to_month').attr('disabled', true);
		$('#to_day').attr('disabled', true);
		if ($('#to_date_message').text() != '') {
			$('#to_date_message').text('');
		}
	} else {
		$('#to_year').attr('disabled', false);
		$('#to_month').attr('disabled', false);
		$('#to_day').attr('disabled', false);
	}
	
	// is_current change function
	$('#is_current').change(function() {
		if ($('#is_current').attr('checked') == 'checked') {
			$('#to_year').attr('disabled', true);
			$('#to_month').attr('disabled', true);
			$('#to_day').attr('disabled', true);
			if ($('#to_date_message').text() != '') {
				$('#to_date_message').text('');
			}
		} else {
			$('#to_year').attr('disabled', false);
			$('#to_month').attr('disabled', false);
			$('#to_day').attr('disabled', false);
		}
	});
});
</script>

<div class="profile">
	<div class="title">
		<?php 
			if ($action == 'edit_work') {
				echo '修改工作信息';
			} else {
				echo '添加工作信息';
			}
		?>
		<a href="<?php echo PROJECT_ROOT_URL.'/work'?>" class="button" style="margin:0 0 0 10px">返回工作信息</a>
		<span class="required_remind"><span class="required">*</span>为必填项</span>
	</div>
	<table>
		<tbody>
			<tr>
				<th><span class="required">*</span>公司名称:</th>
				<td>
					<select id="company_id" name="company_id">
						<?php foreach ($company_result->result() as $company_row) { ?>
							<option value="<?php echo $company_row->id ?>" 
								<?php if ($company_row->id == $company_id) echo 'selected';?>>
								<?php echo $company_row->company_name ?>
							</option>
						<?php } ?>
					</select>
					<input type="checkbox" id="is_current" name="is_current" style="margin-right:5px;"
					<?php if ($is_current == 1) echo 'checked'; ?>>设为当前工作</input>
				</td>
			</tr>
			<tr>
				<th><span class="required">*</span>员工号码:</th>
				<td>
					<input type="text" name="staff_id" id="staff_id" value="<?php echo $staff_id;?>"/>
					<span class="error_message" id="staff_id_message"></span>
				</td>
			</tr>
			<tr>
				<th><span class="required">*</span>工作性质:</th>
				<td>
					<select id='work_nature' name='work_nature'>
						<option value="1" <?php if ($work_nature == 1) echo 'selected'; ?>>全职</option>
						<option value="2" <?php if ($work_nature == 2) echo 'selected'; ?>>兼职</option>
						<option value="3" <?php if ($work_nature == 3) echo 'selected'; ?>>实习</option>
					</select>
				</td>
			</tr>
			<tr>
				<th><span class="required">*</span>项目组名:</th>
				<td>
					<input type="text" id="team_name" name="team_name" value="<?php echo $team_name;?>"/>
					<span class="error_message" id="team_name_message"></span>
				</td>
			</tr>
			<tr>
				<th>开发组名:</th>
				<td><input type="text" id="sub_team_name" name="sub_team_name" value="<?php echo $sub_team_name;?>"/></td>
			</tr>
			<tr><th><span class="required">*</span>开始日期:</th>
				<td id="from_date"></td>
			</tr>
			<tr>
				<th><span class="required">*</span>结束日期:</th>
				<td id="to_date"></td>
			</tr>
			<tr>
				<th></th>
				<td>
					<a href="javascript:amend_work();" id="amend_work_link" class="button save">
					<?php 
						if ($action == 'edit_work') {
							echo '修改';
						} else {
							echo '添加';
						}
					?>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>