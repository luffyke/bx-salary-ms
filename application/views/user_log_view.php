<script type="text/javascript">
$(document).ready(function(){
	$('.odd_even_table tr:even').css('background-color','#EAEAEA');
	$('.odd_even_table tr:odd').css('background-color','#FFF');
	$('.odd_even_table').css('font-size','16px');
});
</script>
<div class="user_log">
	<table class="odd_even_table">
		<?php foreach($user_log_result->result() as $row) { ?>
		<tr>
			<td><?php echo $row->log_date; ?></td>
			<td>
				<?php
					echo "<span style='margin-left:10px; font: bold 13px sans-serif'>"; 
					$log_type = $row->log_type;
					if($log_type == 1){
						echo '登录系统';
					} elseif($log_type == 2){
						echo '注册系统';
					} elseif($log_type == 3){
						echo '修改个人资料';
					} elseif($log_type == 4){
						echo '修改密码';
					}
					echo "</span>";
				?>
			</td>
		</tr>
		<?php } ?>
	</table>
<?php
	// page record
	if($page > $page_count){
		$page = $page_count;
	}
	
	// set url
	$link_url = PROJECT_ROOT_URL.'/user_log';
	$link_url_with_page = PROJECT_ROOT_URL.'/user_log/page/';
	
	// set pager parameter
	$pager['page'] = $page;
	$pager['page_count'] = $page_count;
	$pager['link_url'] = $link_url;
	$pager['link_url_with_page'] = $link_url_with_page;
?>
<?php $this->load->view('pager.php', $pager);?>
</div>