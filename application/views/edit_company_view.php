<?php 
	$row = $company_result->first_row();
	$id = $row->id;
	$company_name = $row->company_name;
	$abbr_name = $row->abbr_name;
	$company_type = $row->company_type;
?>
<input type="hidden" id="company_id" name="company_id" value="<?php echo $id; ?>" />
<div class="profile">
	<div class="title">
		添加公司信息
		<a href="<?php echo PROJECT_ROOT_URL.'/company'?>" class="button" style="margin: 0 0 0 10px">返回公司信息</a>
		<span class="required_remind"><span class="required">*</span>为必填项</span>
	</div>
	<table>
		<tbody>
			<tr>
				<th><span class="required">*</span>公司名称:</th>
				<td><input type="text" id="company_name" name="company_name" value="<?php echo $company_name;?>" /> <span
					class="error_message" id="company_name_message"></span>
				</td>
			</tr>
			<tr>
				<th>公司简称:</th>
				<td><input type="text" id="abbr_name" name="abbr_name" value="<?php echo $abbr_name;?>"/>
				</td>
			</tr>
			<tr>
				<th><span class="required">*</span>公司类型:</th>
				<td><select id="company_type" name="company_type">
						<option value="1" <?php if($company_type == 1) echo 'selected'; ?>>私企</option>
						<option value="2" <?php if($company_type == 2) echo 'selected'; ?>>国企</option>
						<option value="3" <?php if($company_type == 3) echo 'selected'; ?>>外企</option>
				</select></td>
			</tr>
			<tr>
				<th></th>
				<td><a href="javascript:edit_company();" id="edit_company_link"
					class="button save">修改</a></td>
			</tr>
		</tbody>
	</table>
</div>
