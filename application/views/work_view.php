<?php
	if (isset($delete_message)) {
		echo "<div class='message'>".$delete_message."</div>";
	} 
?>
<?php if ($current_work_result->num_rows() > 0) { ?>
<div class="current_info_box">
	<div class="title">
		当前工作
		<a href="<?php echo PROJECT_ROOT_URL.'/work/add'; ?>" class="button add" style="margin : 0 20px">添加工作经历</a>
	</div>
	<table class="table_info">
		<tr style="font-weight:bold">
			<td>日期</td>
			<td>公司名称</td>
			<td>员工号码</td>
			<td>项目组</td>
			<td>开发组</td>
			<td>工作性质</td>
			<td>操作</td>
		</tr>
		<?php foreach ($current_work_result->result() as $row) { ?>
		<tr style="color:blue">
			<td>
				<?php 
					$to_date = $row->to_date;
					if ($to_date == "0000-00-00") {
						$to_date = '至今';
					}
					echo $row->from_date . ' - ' . $to_date;
				?>
			</td>
			<td><?php echo $row->company_name; ?></td>
			<td><?php echo $row->staff_id; ?></td>
			<td><?php echo $row->team_name; ?></td>
			<td><?php echo $row->sub_team_name; ?></td>
			<td><?php 
					$work_nature = $row->work_nature; 
					switch ($work_nature) {
						case '1':
							echo '全职';
							break;
						case '2':
							echo '兼职';
							break;
						case '3':
							echo '实习';
							break;
					}
				?></td>
			<td>
				<a href="<?php echo PROJECT_ROOT_URL.'/work/edit/'.$row->id ?>">编辑</a>
				<a href="javascript:delete_work(<?php echo $row->id; ?>)">删除</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php } else { ?>
	<div class="tip">无当前工作经历记录</div>
	<?php } ?>
</div>

<?php if ($history_work_result->num_rows() > 0) { ?>
<div class="history_info_box">
	<div class="title">工作经历</div>
	<table class="history_table_info">
		<tr style="font-weight:bold">
			<td>日期</td>
			<td>公司名称</td>
			<td>员工号码</td>
			<td>项目组</td>
			<td>开发组</td>
			<td>工作性质</td>
			<td>操作</td>
		</tr>
		<?php foreach ($history_work_result->result() as $row) { ?>
		<tr>
			<td>
				<?php 
					$to_date = $row->to_date;
					if ($to_date == "0000-00-00") {
						$to_date = '至今';
					}
					echo $row->from_date . ' - ' . $to_date;
				?>
			</td>
			<td><?php echo $row->company_name; ?></td>
			<td><?php echo $row->staff_id; ?></td>
			<td><?php echo $row->team_name; ?></td>
			<td><?php echo $row->sub_team_name; ?></td>
			<td><?php 
					$work_nature = $row->work_nature; 
					switch ($work_nature) {
						case '1':
							echo '全职';
							break;
						case '2':
							echo '兼职';
							break;
						case '3':
							echo '实习';
							break;
					}
				?></td>
			<td>
				<a href="<?php echo PROJECT_ROOT_URL.'/work/edit/'.$row->id ?>">编辑</a>
				<a href="javascript:delete_work(<?php echo $row->id; ?>)">删除</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php } else { ?>
	<div class="tip">无历史工作经历记录</div>
	<?php } ?>
</div>
