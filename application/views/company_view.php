<div class="company">
	<div class="title">
		当前公司信息
		<a href="<?php echo PROJECT_ROOT_URL.'/company/add'?>" class="button add" style="margin: 0 0 0 20px">添加公司信息</a>
		<a href="javascript:delete_company();" class="button delete" style="margin: 0 0 0 10px">删除选中公司</a>
	</div>
	<?php if($current_company_result->num_rows() > 0) { ?>
	<table class="table_info">
		<tr><td></td><td>公司名称</td><td>公司简称</td><td>公司性质</td><td></td></tr>
		<?php foreach($current_company_result->result() as $row) { ?>
			<tr>
				<td><input id='<?php echo $row->id; ?>' type="checkbox" name='<?php echo $row->id; ?>' /></td>
				<td><?php echo $row->company_name; ?></td>
				<td><?php echo $row->abbr_name; ?></td>
				<td>
					<?php 
					$company_type = $row->company_type;
					switch ($company_type) {
						case '1':
							echo "私企";
							break;
						case '2':
							echo "国企";
							break;
						case '3':
							echo "外企";
							break;
					}?>
				</td>
				<td><a href="<?php echo PROJECT_ROOT_URL.'/company/edit/'.$row->id ?>">编辑</a></td>
			</tr>
		<?php } ?>
	</table>
	<?php } else { ?>
	<div class="tip">无当前公司信息</div>
	<?php } ?>
</div>

<div class="company_history">
	<div class="title">历史公司信息</div>
	<?php if($history_company_result->num_rows() > 0) { ?>
	<table class="history_table_info">
		<tr><td></td><td>公司名称</td><td>公司简称</td><td>公司性质</td></tr>
		<?php foreach($history_company_result->result() as $row) { ?>
			<tr>
				<td><input id='<?php echo $row->id; ?>' type="checkbox" name='<?php echo $row->id; ?>' /></td>
				<td><?php echo $row->company_name; ?></td>
				<td><?php echo $row->abbr_name; ?></td>
				<td>
					<?php 
					$company_type = $row->company_type;
					switch ($company_type) {
						case '1':
							echo "私企";
							break;
						case '2':
							echo "国企";
							break;
						case '3':
							echo "外企";
							break;
					}?>
				</td>
				<td><a href="<?php echo PROJECT_ROOT_URL.'/company/edit/'.$row->id ?>">编辑</a></td>
			</tr>
		<?php } ?>
	</table>
	<?php } else { ?>
	<div class="tip">无历史公司信息</div>
	<?php } ?>
</div>
