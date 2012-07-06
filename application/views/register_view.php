<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>bx-salary-ms</title>
<link rel="stylesheet" type="text/css" href="<?php echo PROJECT_ROOT_URL.'/css/login.css'; ?>">
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery-1.7.2.js'; ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	var is_valid = false;
	// check if username exist
	$('#username').blur(function(){
		var username = $('#username').val();
		$.post('<?php echo PROJECT_ROOT_URL.'/user/ajax_check_username'; ?>',
				{'username':username},
				function(result){
					$('#username_message').replaceWith('');
					if(result){
						$('#username').after('<div id="username_message" class="error_message">' +
								'<p>用户名已存在</p></div>');
						is_valid = false;
					} else {
						is_valid = true;
					}
				}
		);
	});
	
	// check if two password eqaul
	$('#re_password').blur(function(){
		$('#password_message').replaceWith('');
		if($('#re_password').val() != $('#password').val()){
			$('#re_password').after('<div id="password_message" class="error_message">' +
					'<p>两次密码输入不同</p></div>');
			is_valid = false;
		} else {
			is_valid = true;
		}
	});
	
	$('#reg_button').click(function(){
		return is_valid ? true : false;
	});
});
</script>
</head>
<body>
	<div class="wrapper">
		<form action="<?php echo PROJECT_ROOT_URL.'/user/register_action'; ?>" method="post">
			<div class="login_box">
				<div class="login_box_center">
					<p>
						<label for="username">用户名：</label>
						<a class="register" href="/bx-salary-ms/user/login">登录</a>
					</p>
					<p>
						<input id="username" name="username" class="login_input"
							autofocus="autofocus" required="required" autocomplete="off"
							placeholder="请输入用户名" value="" />
					</p>
					<p>
						<label for="email">邮箱：</label>
					</p>
					<p>
						<input type="email" id="email" name="email" class="login_input"
							required="required" autocomplete="off" placeholder="请输入邮箱地址" value="" />
					</p>
					<p>
						<label for="password">密码：</label>
					</p>
					<p>
						<input type="password" id="password" name="password"
							class="login_input" required="required" placeholder="请输入密码" value="" />
					</p>
					<p>
						<label for="re_password">确认密码：</label>
					</p>
					<p>
						<input type="password" id="re_password" name="re_password"
							class="login_input" required="required" placeholder="请输入确认密码" value="" />
					</p>
				</div>
				<div class="login_box_buttons">
					<button id="reg_button" class="login_button">注册</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>