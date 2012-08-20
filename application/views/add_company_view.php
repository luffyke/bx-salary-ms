<?php if(!$has_company) { ?>
<div class="tip">当前无任何关于您的公司信息，请先添加公司信息</div>
<?php } ?>
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
				<td><input type="text" id="company_name" name="company_name" />
				<span class="error_message" id="company_name_message"></span></td>
			</tr>
			<tr>
				<th>公司简称:</th>
				<td><input type="text" id="abbr_name" name="abbr_name" /></td>
			</tr>
			<tr>
				<th><span class="required">*</span>公司类型:</th>
				<td><select id="company_type" name="company_type">
						<option value="1">私企</option>
						<option value="2">国企</option>
						<option value="3">外企</option>
				</select>
				</td>
			</tr>
			<tr>
				<th></th>
				<td><a href="javascript:add_company();" id="add_company_link"
					class="button save">添加</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
