<script type="text/javascript">
$(document).ready(function(){
	$('#old_password').blur(function(){
		$('#old_password_message').replaceWith('');
		var old_password = $('#old_password').val();
		if(old_password != ""){
			$.post('<?php echo PROJECT_ROOT_URL.'/user/ajax_check_password'; ?>', 
					{'old_password' : old_password},
					function(result){
						if(result != 1){
							$('#old_password').after('<span id="old_password_message" class="error_message">密码错误</span>');
						}
					}
				);
		}
	});
});
function valid_password(){
	var is_old_password_valid = false;
	var is_new_password_valid = false;
	var is_re_password_valid = false;
	
	$('#old_password_message').replaceWith('');
	if($('#old_password_message').text() == ''){
		$('#old_password').after('<span id="old_password_message" class="error_message">旧密码不能为空</span>');
		is_old_password_valid = true;
	} else {
		is_old_password_valid = false;
	}
	
	$('#new_password_message').replaceWith('');
	if($.trim($('#new_password').val()) == ''){
		$('#new_password').after('<span id="new_password_message" class="error_message">新密码不能为空</span>');
		is_new_password_valid = false;
	} else {
		is_new_password_valid = true;
	}
	
	$('#re_password_message').replaceWith('');
	if($.trim($('#re_password').val()) == ''){
		$('#re_password').after('<span id="re_password_message" class="error_message">确认密码不能为空</span>');
		is_re_password_valid = false;
	} else {
		if($('#re_password').val() != $('#new_password').val()){
			$('#re_password').after('<span id="re_password_message" class="error_message">两次密码输入不同</span>');
			is_re_password_valid = false;
		} else {
			is_re_password_valid = true;
		}
	}

	return is_old_password_valid && is_new_password_valid && is_re_password_valid;
}
</script>
<div class="profile">
	<table>
		<tbody>
			<tr>
				<th>旧密码</th>
				<td>
					<input type="password" id="old_password" name="old_password" autofocus="autofocus"/>
				</td>
			</tr>
			<tr>
				<th>新密码</th>
				<td>
					<input type="password" id="new_password" name="new_password" />
				</td>
			</tr>
			<tr>
				<th>确认新密码</th>
				<td>
					<input type="password" id="re_password" name="re_password" />
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<a href="javascript:update_password();" id="update_password_link" name="update_password_link" class="button save">修改密码</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
