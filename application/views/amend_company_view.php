<?php 
	if ($action == 'edit_company') {
		$row = $company_result->first_row();
		$id = $row->id;
		$company_name = $row->company_name;
		$abbr_name = $row->abbr_name;
		$company_type = $row->company_type;
	} else {
		$company_name = '';
		$abbr_name = '';
		$company_type = 1;
	}
?>
<?php if ($action == 'edit_company') { ?>
	<input type="hidden" id="company_id" name="company_id" value="<?php echo $id; ?>" />
<?php } ?>
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/company.js'; ?>"></script>
<input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
<div class="profile">
	<div class="title">
		<?php 
			if ($action == 'edit_company') {
				echo '修改公司信息';
			} else {
				echo '添加公司信息';
			}
		?>
		<a href="<?php echo PROJECT_ROOT_URL.'/company'?>" class="button" style="margin:0 0 0 10px">返回公司信息</a>
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
				<td>
					<select id="company_type" name="company_type">
						<option value="1" <?php if ($company_type == 1) echo 'selected'; ?>>私企</option>
						<option value="2" <?php if ($company_type == 2) echo 'selected'; ?>>国企</option>
						<option value="3" <?php if ($company_type == 3) echo 'selected'; ?>>外企</option>
					</select>
				</td>
			</tr>
			<tr>
				<th></th>
				<td><a href="javascript:amend_company();" id="amend_company_link" class="button save">
					<?php 
						if ($action == 'edit_company') {
							echo '修改';
						} else {
							echo '添加';
						}
					?>
				</a></td>
			</tr>
		</tbody>
	</table>
</div>
