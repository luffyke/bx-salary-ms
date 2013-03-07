function update_password() {
	if (valid_password()) {
		var password = $('#new_password').val();
		$('#update_password_message').replaceWith('');
		$.post('/bx-salary-ms/user/change_password_action', {'password':password},
			function (result) {
				if (result != 1) {
					$('#update_password_link').after('<span id="update_password_message" class="error_message">修改失败</span>');
				} else {
					$('#old_password').val('');
					$('#new_password').val('');
					$('#re_password').val('');
					$('#update_password_link').after('<span id="update_password_message" class="message">修改成功</span>');
				}
			}
		);
	}
}