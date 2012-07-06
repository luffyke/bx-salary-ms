<div class="work">
	<div class="title">
		当前工作
		<a href="<?php echo PROJECT_ROOT_URL.'/work/add'; ?>" class="button add" style="margin : 0 20px">添加工作经历</a>
	</div>
		<table class="table_info">
			<tr><td>日期</td><td>公司名称</td><td>员工号码</td><td>项目组</td><td>开发组</td><td>工作性质</td></tr>
			<?php foreach($current_work_result->result() as $row) { ?>
			<tr>
				<td>
					<?php 
						$to_date = $row->to_date;
						if($to_date == "0000-00-00"){
							$to_date = '至今';
						}
						echo $row->from_date . ' - ' . $to_date;
					?>
				</td>
				<td><?php echo $row->company_id; ?></td>
				<td><?php echo $row->staff_id; ?></td>
				<td><?php echo $row->team_name; ?></td>
				<td><?php echo $row->sub_team_name; ?></td>
				<td><?php echo $row->work_nature; ?></td>
			</tr>
			<?php } ?>
		</table>
</div>

<div class="work_history">
	<div class="title">工作经历</div>
	<table class="history_table_info">
			<tr><td>日期</td><td>公司名称</td><td>员工号码</td><td>项目组</td><td>开发组</td><td>工作性质</td></tr>
			<?php foreach($history_work_result->result() as $row) { ?>
			<tr>
				<td>
					<?php 
						$to_date = $row->to_date;
						if($to_date == "0000-00-00"){
							$to_date = '至今';
						}
						echo $row->from_date . ' - ' . $to_date;
					?>
				</td>
				<td><?php echo $row->company_id; ?></td>
				<td><?php echo $row->staff_id; ?></td>
				<td><?php echo $row->team_name; ?></td>
				<td><?php echo $row->sub_team_name; ?></td>
				<td><?php echo $row->work_nature; ?></td>
			</tr>
			<?php } ?>
		</table>
</div>
