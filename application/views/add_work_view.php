<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery.date.js'; ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#from_date').date(null, null, null, 'from_year', 'from_month', 'from_day');
	$('#to_date').date(null, null, null, 'to_year', 'to_month', 'to_day');
	
	$('#is_current').change(function(){
		if($('#is_current').attr('checked') == 'checked') {
			$('#to_year').attr('disabled', true);
			$('#to_month').attr('disabled', true);
			$('#to_day').attr('disabled', true);
			if($('#to_date_message').text() != ''){
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
	<div class="title">添加工作信息<span class="required_remind"><span class="required">*</span>为必填项</span></div>
	<table>
		<tbody>
			<tr>
				<th><span class="required">*</span>公司名称:</th>
				<td>
					<select id="company_id" name="company_id">
						<?php foreach ($company_result->result() as $company_row) { ?>
							<option value="<?php echo $company_row->id ?>"><?php echo $company_row->company_name ?></option>
						<?php } ?>
					</select>
					<input type="checkbox" id="is_current" name="is_current" style="margin-right : 5px;">设为当前工作</input>
				</td>
			</tr>
			<tr>
				<th><span class="required">*</span>员工号码:</th>
				<td>
					<input type="text" name="staff_id" id="staff_id" />
					<span class="error_message" id="staff_id_message"></span>
				</td>
			</tr>
			<tr>
				<th><span class="required">*</span>工作性质:</th>
				<td>
					<select id='work_nature' name='work_nature'>
						<option value="1">全职</option>
						<option value="2">兼职</option>
						<option value="3">实习</option>
					</select>
				</td>
			</tr>
			<tr>
				<th><span class="required">*</span>项目组名:</th>
				<td>
					<input type="text" id="team_name" name="team_name" />
					<span class="error_message" id="team_name_message"></span>
				</td>
			</tr>
			<tr>
				<th>开发组名:</th>
				<td><input type="text" id="sub_team_name" name="sub_team_name" /></td>
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
					<a href="javascript:add_work();" id="add_work_link" class="button save">添加</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>