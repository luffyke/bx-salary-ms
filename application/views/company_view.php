<?php
	if (isset($delete_message)) {
		echo "<div class='message'>".$delete_message."</div>";
	} 
?>
<?php if (isset($current_company_result) && $current_company_result->num_rows() > 0) { ?>
<div class="current_info_box">
	<div class="title">
		当前公司信息
		<a href="<?php echo PROJECT_ROOT_URL.'/company/add'?>" class="button add" style="margin: 0 0 0 20px">添加公司信息</a>
		<?php if (isset($is_current) && $is_current) { ?>
			<a href="<?php echo PROJECT_ROOT_URL.'/company/history'?>" class="button" style="margin: 0 0 0 10px">显示历史公司信息</a>
		<?php } ?>
	</div>
	<table class="table_info">
		<tr style="font-weight:bold;">
			<td width="45%">公司名称</td>
			<td width="25%">公司简称</td>
			<td width="15%">公司性质</td>
			<td width="15%">操作</td>
		</tr>
		<?php $i = 0; ?>
		<?php foreach ($current_company_result->result() as $row) { ?>
			<?php if ($i < 5) { ?>
			<tr style="color:blue;">
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
						}
					?>
				</td>
				<td>
					<a href="<?php echo PROJECT_ROOT_URL.'/company/edit/'.$row->id; ?>">编辑</a>
					<a href="javascript:delete_company(<?php echo $row->id; ?>)">删除</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php } ?>
		<?php } ?>
	</table>
	<?php if ($current_company_result->num_rows() > 5 && !$is_current) { ?>
		<div class="show_more"><a href="<?php echo PROJECT_ROOT_URL.'/company/current'; ?>">更多...</a></div>
	<?php } ?>
	<?php 
		if ($is_current) {
			// page record
			if ($page > $page_count) {
				$page = $page_count;
			}
				
			// set url
			$link_url = PROJECT_ROOT_URL.'/company/current';
			$link_url_with_page = PROJECT_ROOT_URL.'/company/current/';
				
			// set pager parameter
			$pager['page'] = $page;
			$pager['page_count'] = $page_count;
			$pager['link_url'] = $link_url;
			$pager['link_url_with_page'] = $link_url_with_page;
				
			$this->load->view('pager.php', $pager);
		}
	?>
</div>
<?php } elseif ((isset($is_history) && !$is_history) || !isset($is_history)) { ?>
<div class="tip">无当前公司信息</div>
<?php } ?>

<?php if (isset($history_company_result) && $history_company_result->num_rows() > 0) { ?>
<?php if ($is_history) { ?>
<div class="current_info_box">
<?php } else { ?>
<div class="history_info_box">
<?php } ?>
	<div class="title">
		历史公司信息
		<?php if (isset($is_history) && $is_history) { ?>
			<a href="<?php echo PROJECT_ROOT_URL.'/company/add'?>" class="button add" style="margin: 0 0 0 20px">添加公司信息</a>
			<a href="<?php echo PROJECT_ROOT_URL.'/company/current'?>" class="button" style="margin: 0 0 0 10px">显示当前公司信息</a>
		<?php } ?>
	</div>
	<table class="history_table_info">
		<tr style="font-weight:bold;">
			<td width="45%">公司名称</td>
			<td width="25%">公司简称</td>
			<td width="15%">公司性质</td>
			<td width="15%">操作</td>
		</tr>

		<?php $j = 0; ?>
		<?php foreach ($history_company_result->result() as $row) { ?>
			<?php if ($j < 5) { ?>
			<tr>
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
						}
					?>
				</td>
				<td>
					<a href="<?php echo PROJECT_ROOT_URL.'/company/edit/'.$row->id; ?>">编辑</a>
					<a href="javascript:delete_company(<?php echo $row->id; ?>)">删除</a>
				</td>
			</tr>
			<?php $j++; ?>
			<?php } ?>
		<?php } ?>
	</table>
		<?php if ($history_company_result->num_rows() > 5 && !$is_history) { ?>
		<div class="show_more"><a href="<?php echo PROJECT_ROOT_URL.'/company/history'; ?>">更多...</a></div>
		<?php } ?>
		<?php 
			if ($is_history) {
				// page record
				if ($page > $page_count) {
					$page = $page_count;
				}
				
				// set url
				$link_url = PROJECT_ROOT_URL.'/company/history';
				$link_url_with_page = PROJECT_ROOT_URL.'/company/history/';
				
				// set pager parameter
				$pager['page'] = $page;
				$pager['page_count'] = $page_count;
				$pager['link_url'] = $link_url;
				$pager['link_url_with_page'] = $link_url_with_page;
				
				$this->load->view('pager.php', $pager);
			}
		?>
</div>
<?php } elseif ((isset($is_current) && !$is_current) || !isset($is_current)) { ?>
<div class="tip">无历史公司信息</div>
<?php } ?>
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery.hover.js'; ?>"></script>